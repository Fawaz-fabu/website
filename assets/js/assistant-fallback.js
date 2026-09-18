/* Optional legacy text-matching fallback, not the primary chat path.
   The existing parser, scoring, sentence selection and topic context are
   preserved below. Nothing is fetched until fawazTextMatchingFallback() is
   explicitly called. This is retrieval from site text, not generated advice.
   The current widget UI and endpoint requests live in assistant.js. */
(function () {
  'use strict';

  var WA       = 'https://wa.me/919481084038';
  var CORPUS   = '/llms-full.txt';
  var THRESHOLD = 0.30;   // below this, admit ignorance instead of guessing

  /* ---------------------------------------------------------------
     Text normalising
     --------------------------------------------------------------- */

  /* The corpus still contains some em dashes and markdown. Nothing with an em
     dash may ever reach a visitor on this site, so every string is cleaned on
     the way out regardless of what the source file happens to hold. */
  function clean(s) {
    return String(s)
      .replace(/\s*\u2014\s*/g, ', ')     // em dash becomes a comma
      .replace(/\s*\u2013\s*/g, ' to ')   // en dash is nearly always a range
      .replace(/\*\*/g, '')
      .replace(/`/g, '')
      .replace(/^\s*[-*]\s+/, '')
      .replace(/^\s*\d+\.\s+/, '')
      .replace(/\s+/g, ' ')
      .trim();
  }

  function norm(s) {
    return String(s).toLowerCase()
      .replace(/[^a-z0-9\s]/g, ' ')
      .replace(/\s+/g, ' ')
      .trim();
  }

  var STOP = (' a an and are as at be been but by can could do does did for from get got had has have how i if in into is it its me my no not of on or our so than that the their them then there these they this to too us want was we were what when where which who why will with would you your ').split(' ');

  function tokens(s) {
    return norm(s).split(' ').filter(function (t) {
      return t.length > 1 && STOP.indexOf(t) === -1;
    });
  }

  /* Crude but effective suffix stripping, so "pricing" matches "price" and
     "certifications" matches "certification". A real stemmer is not worth the
     bytes here. */
  function stem(t) {
    return t
      .replace(/(ations|ation|ings|ing|ies|ers|er|es|s)$/, function (m) {
        return t.length - m.length >= 4 ? '' : m;
      });
  }

  function stems(list) {
    return list.map(stem);
  }

  /* Query expansion.

     Lexical matching alone fails on the most natural way to ask things. A
     visitor types "how much does it cost", but the pricing section says
     "starting rates" and never once says "cost". Without this map the engine
     confidently returns a passage about OTA commission instead, because that
     is where the word "cost" happens to appear.

     Each entry adds terms to the query; it never replaces them. Keys are
     stemmed forms. Keep this list about vocabulary, not about intent: it maps
     the words people use to the words Fawaz wrote. */
  var SYNONYMS = {
    cost:      ['price', 'rate', 'fee', 'month', 'rupee', 'starting'],
    charge:    ['price', 'rate', 'fee', 'month', 'rupee'],
    price:     ['rate', 'fee', 'month', 'rupee', 'starting'],
    /* "rate" and "rates" are how people most often ask, but the tier lines
       themselves say "rupees per month" and never use the word "rate". Without
       this the priced tiers score near zero on a rates question. */
    rate:      ['price', 'fee', 'month', 'rupee', 'starting'],
    rupee:     ['price', 'rate', 'fee', 'month'],
    inr:       ['price', 'rate', 'rupee', 'month'],
    expensive: ['price', 'rate', 'fee'],
    budget:    ['price', 'rate', 'fee'],
    afford:    ['price', 'rate', 'fee'],
    certifi:   ['certification', 'credential', 'qualification', 'ahref', 'semrush', 'diploma'],
    certified: ['certification', 'credential', 'qualification', 'ahref', 'semrush', 'diploma'],
    qualifi:   ['certification', 'credential', 'qualification', 'diploma'],
    coorg:     ['kodagu'],
    kodagu:    ['coorg'],
    bangalore: ['bengaluru'],
    bengaluru: ['bangalore'],
    website:   ['design', 'site', 'build', 'web'],
    web:       ['website', 'design', 'site'],
    speak:     ['language', 'bilingual', 'kannada'],
    languag:   ['bilingual', 'kannada', 'transliterated'],
    long:      ['month', 'week', 'timeline', 'time'],
    /* NOTE: 'month' is deliberately NOT a synonym of 'result'. Every pricing
       tier says "rupees per month", so mapping result -> month made "when will
       i see results" tie with the rate card and lose on corpus order. Timeline
       vocabulary only. */
    result:    ['ranking', 'traffic', 'timeline', 'movement', 'week'],
    guarantee: ['guaranteed', 'promise', 'honest'],
    hire:      ['engagement', 'scope', 'audit'],
    contact:   ['whatsapp', 'phone', 'email'],
    chatgpt:   ['openai', 'engine', 'cited'],
    social:    ['media', 'instagram', 'platform']
  };

  /* Turn a token list into CONCEPTS. Each concept is one thing the visitor
     asked about, expressed as a list of acceptable surface forms.

     This structure matters. An earlier version simply appended synonyms to the
     query, which made the engine worse rather than better: every added synonym
     also grew the scoring denominator, so a passage that matched "rate" was
     penalised for not also containing "fee", "rupee" and "month". Grouping
     alternates means matching ANY form satisfies the concept once, and the
     denominator stays the number of things actually asked about. */
  function concepts(qt) {
    return qt.map(function (t) {
      var forms = [t];
      Object.keys(SYNONYMS).forEach(function (key) {
        if (t === key || (t.length > 3 && (t.indexOf(key) === 0 || key.indexOf(t) === 0))) {
          SYNONYMS[key].forEach(function (syn) {
            var s = stem(syn);
            if (forms.indexOf(s) === -1) forms.push(s);
          });
        }
      });
      return forms;
    });
  }

  /* ---------------------------------------------------------------
     Corpus parsing. Produces one record per passage, carrying the
     heading trail it sat under so headings can be scored too.
     --------------------------------------------------------------- */
  var passages = [];
  var idf      = {};
  var ready    = false;
  var failed   = false;

  function parseCorpus(text) {
    var lines = text.split(/\r?\n/);
    var h1 = '', h2 = '', h3 = '';
    var label = '';
    var buf = [];
    var out = [];

    function flush() {
      if (!buf.length) return;
      var body = clean(buf.join(' '));
      buf = [];
      if (body.length < 40) return;          // skip stubs
      out.push({ h1: h1, h2: h2, h3: h3, label: label, text: body });
    }

    for (var i = 0; i < lines.length; i++) {
      var raw  = lines[i];
      var line = raw.trim();

      if (!line) { flush(); label = ''; continue; }

      if (/^#\s+/.test(line))   { flush(); h1 = clean(line.replace(/^#\s+/, '')); h2 = ''; h3 = ''; label = ''; continue; }
      if (/^##\s+/.test(line))  { flush(); h2 = clean(line.replace(/^##\s+/, '')); h3 = ''; label = ''; continue; }
      if (/^###\s+/.test(line)) { flush(); h3 = clean(line.replace(/^###\s+/, '')); label = ''; continue; }

      /* A short line ending in a colon is a list label, for example
         "Social Media Marketing:" or "Website Design (one-time build):".
         It is NOT a passage of its own, and critically the bullets beneath it
         never repeat it, so without carrying it forward a question about
         social media pricing can never match the social media prices. */
      if (/:$/.test(line) && line.length < 70 && !/^\s*([-*]|\d+\.)\s+/.test(raw)) {
        flush();
        label = clean(line.replace(/:$/, ''));
        continue;
      }

      /* A bullet is its own idea, so it becomes its own passage rather than
         being glued to the paragraph above it. That keeps replies tight. */
      if (/^\s*([-*]|\d+\.)\s+/.test(raw)) {
        flush();
        buf.push(line);
        flush();
        continue;
      }

      if (/^>\s+/.test(line)) { line = line.replace(/^>\s+/, ''); }

      buf.push(line);
    }
    flush();

    /* Precompute tokens and the document frequency table. */
    var df = {};
    out.forEach(function (p) {
      p.toks = stems(tokens(p.text));
      /* The heading trail and the list label both describe what this passage
         is ABOUT, which is often vocabulary the passage body never repeats. */
      p.head = stems(tokens([p.h1, p.h2, p.h3, p.label].join(' ')));
      p.url  = (p.text.match(/https?:\/\/[^\s)]+/) || [null])[0];
      var seen = {};
      p.toks.forEach(function (t) {
        if (seen[t]) return;
        seen[t] = 1;
        df[t] = (df[t] || 0) + 1;
      });
    });

    var N = out.length || 1;
    Object.keys(df).forEach(function (t) {
      idf[t] = Math.log(1 + N / df[t]);
    });

    passages = out;
    return out.length > 0;
  }

  /* ---------------------------------------------------------------
     Scoring
     --------------------------------------------------------------- */
  function weight(t) {
    /* An unseen term is rare by definition, so give it a high but bounded
       weight rather than zero. */
    return idf[t] || Math.log(1 + passages.length);
  }

  /* `cons` is a list of concepts, each being a list of acceptable forms.
     A concept scores once, on its best-matching form. */
  function scorePassage(cons, p) {
    var total = 0, got = 0;
    var body = ' ' + p.toks.join(' ') + ' ';
    var head = ' ' + p.head.join(' ') + ' ';

    cons.forEach(function (forms) {
      /* The concept is weighted by its primary term, so a rare word the
         visitor actually typed still dominates a common one. */
      var w = weight(forms[0]);
      total += w;

      var best = 0;
      for (var i = 0; i < forms.length; i++) {
        var t = forms[i];
        // The typed term counts full; a synonym counts slightly less, so an
        // exact vocabulary match always outranks an inferred one.
        var factor = i === 0 ? 1 : 0.82;

        if (body.indexOf(' ' + t + ' ') !== -1) {
          best = Math.max(best, factor);
        } else if (t.length > 4 && body.indexOf(' ' + t.slice(0, t.length - 1)) !== -1) {
          best = Math.max(best, factor * 0.7);   // inflection tolerant
        }
        if (head.indexOf(' ' + t + ' ') !== -1) {
          /* A heading or list-label hit is real evidence of topic, but it must
             stay clearly WEAKER than the passage body actually containing the
             word. At 0.95 it was nearly as strong as a body match, which made
             every section's framing sentence outrank the section's own
             content: "what are your seo rates" returned "figures are
             published, starting rates in INR" instead of the tier with the
             actual number in it, because that intro inherited "SEO" from the
             document title. 0.5 keeps headings useful for disambiguation
             without letting them beat substance. */
          best = Math.max(best, factor * 0.5);
        }
      }
      got += w * best;
    });

    if (!total) return 0;
    return got / total;
  }

  /* Pull the sentences that actually answer the question out of a long
     passage, keeping their original order so the prose still reads. */
  function condense(text, cons, maxSentences) {
    if (text.length < 300) return [text];

    var parts = text.match(/[^.!?]+[.!?]+(\s|$)/g);
    if (!parts || parts.length < 3) return [text];

    var scored = parts.map(function (s, i) {
      var st = stems(tokens(s));
      var hay = ' ' + st.join(' ') + ' ';
      var hit = 0;
      cons.forEach(function (forms) {
        for (var j = 0; j < forms.length; j++) {
          if (hay.indexOf(' ' + forms[j] + ' ') !== -1) {
            hit += weight(forms[0]) * (j === 0 ? 1 : 0.82);
            break;                    // one hit per concept
          }
        }
      });
      return { i: i, s: s.trim(), hit: hit };
    });

    var keep = scored.slice().sort(function (a, b) { return b.hit - a.hit; })
      .slice(0, maxSentences || 3)
      .filter(function (x) { return x.hit > 0; });

    if (!keep.length) return [text];

    keep.sort(function (a, b) { return a.i - b.i; });
    return [keep.map(function (x) { return x.s; }).join(' ')];
  }

  /* Map a passage back to the page a visitor should read next. */
  var SECTION_LINKS = [
    [/pricing|rate|price/i,                 '/seo-services',            'See the full rate card'],
    [/credential|certification/i,           '/about',                   'See the credentials'],
    [/service/i,                            '/seo-services',            'All services in detail'],
    [/kodagu|coorg/i,                       '/seo-consultant-kodagu',   'SEO consultant in Kodagu'],
    [/karnataka/i,                          '/seo-consultant-karnataka','SEO consultant in Karnataka'],
    [/\bindia\b/i,                          '/seo-consultant-india',    'SEO consultant in India'],
    [/aeo|answer engine/i,                  '/aeo-consultant',          'How AEO works'],
    [/geo|generative/i,                     '/geo-consultant',          'How GEO works'],
    [/\bai\b|chatgpt|perplexity/i,          '/ai-seo-expert-india',     'AI SEO expert in India'],
    [/location|city|cities/i,               '/cities-we-serve',         'Cities served'],
    [/overview|about|entity/i,              '/about',                   'About Fawaz BH']
  ];

  function linkFor(p) {
    var hay = [p.h3, p.h2, p.text].join(' ');
    /* Prefer a real URL printed in the corpus itself. */
    if (p.url && p.url.indexOf('fawazbhseo.in') !== -1) {
      var path = p.url.replace(/^https?:\/\/[^/]+/, '').replace(/\/$/, '');
      if (path && path.length > 1) return [path, 'Read the full page'];
    }
    for (var i = 0; i < SECTION_LINKS.length; i++) {
      if (SECTION_LINKS[i][0].test(hay)) {
        return [SECTION_LINKS[i][1], SECTION_LINKS[i][2]];
      }
    }
    return null;
  }

  /* ---------------------------------------------------------------
     Answering
     --------------------------------------------------------------- */
  var lastTopic = '';

  /* Questions about the assistant itself are not in the corpus, and answering
     them honestly matters more than answering them from source. */
  function metaAnswer(q) {
    var n = norm(q);
    if (/\b(are you|is this) (a |an )?(real |actual )?(ai|bot|chatbot|human|person|robot|gpt|llm)\b/.test(n) ||
        /\bwho am i (talking|speaking) to\b/.test(n) ||
        /\bhow (does|do) (this|you) work\b/.test(n)) {
      return [
        'Honestly: not a language model writing new text. This site is hosted statically, so there is no server here that could hold an API key, and putting one in the browser would hand it to every visitor.',
        'What I actually do is read everything Fawaz has published about his work, find the passage that matches your question and show you that. The upside is that I cannot invent a price or a promise. The limit is that if something has not been written down, I will tell you so and pass you to Fawaz rather than guess.'
      ];
    }
    return null;
  }

  /* Does this read like a follow up rather than a new question? A genuine
     continuation either opens with a joining word ("and for social media",
     "what about Mysuru") or is a bare fragment carrying no question word of
     its own. "What is your favourite colour" is a complete question, so it
     must stand or fall on its own words rather than inheriting context. */
  function isContinuation(q) {
    var n = norm(q);
    if (/^(and|also|what about|how about|or|plus|then|for)\b/.test(n)) return true;
    // A fragment with no interrogative of its own, for example "social media".
    return !/\b(what|which|who|why|when|where|how|is|are|do|does|can|should)\b/.test(n);
  }

  function answer(query) {
    var base = stems(tokens(query));
    if (!base.length) return null;

    var qt = concepts(base);

    var ranked = passages.map(function (p) {
      return { p: p, s: scorePassage(qt, p) };
    }).sort(function (a, b) { return b.s - a.s; });

    var top = ranked[0];

    /* Only NOW consider the previous topic, and only to rescue a query that
       genuinely failed on its own.

       This context merge used to run BEFORE scoring on any query of two words
       or fewer, which silently sabotaged short but complete questions: "do you
       speak tamil" reduces to two content words, so the previous question's
       tokens got mixed in and diluted the real match below the threshold.

       It also has to be guarded on the way in. Borrowing the last topic for
       ANY short failed query meant "what is your favourite colour" inherited
       the previous question's words and confidently answered with a price.
       Two guards prevent that:
         1. The query must look like a continuation, not a fresh question.
         2. At least one word the visitor ACTUALLY typed must appear in the
            winning passage, so the reply is never built purely from
            remembered context. */
    if ((!top || top.s < THRESHOLD) && lastTopic && isContinuation(query) && base.length <= 3) {
      var merged = concepts(base.concat(stems(tokens(lastTopic))));
      var reranked = passages.map(function (p) {
        return { p: p, s: scorePassage(merged, p) };
      }).sort(function (a, b) { return b.s - a.s; });

      if (reranked[0] && reranked[0].s >= THRESHOLD &&
          scorePassage(qt, reranked[0].p) > 0) {
        ranked = reranked;
        top = reranked[0];
        qt = merged;
      }
    }

    if (!top || top.s < THRESHOLD) return null;

    lastTopic = query;

    var paras = condense(top.p.text, qt, 3);

    /* A question containing a number word deserves an answer containing a
       number. The winning passage is often a section's framing sentence
       ("figures are published, starting rates in INR, confirmed after a free
       audit"), which is true but unhelpful on its own. When the visitor asked
       what something costs and the best passage has no figure in it, promote
       the highest-scoring passage that does. */
    var wantsFigure = /\b(cost|price|pricing|rate|rates|charge|fee|much|budget|afford|expensive|cheap)\b/i.test(query);
    var hasFigure   = function (s) { return /\d[\d,]{2,}/.test(s); };

    if (wantsFigure) {
      /* Re-rank specifically for "which passage best answers a money question".
         A pricing question must be answered with a price. Relying on the
         general ranking is not enough in either direction:

         - "how much does it cost" matches the literal word "cost" in a Kodagu
           passage about OTA commission, which has a percentage but no rate.
         - "what are your seo rates" matches the Pricing section's framing
           sentence, which is about how pricing works and carries no figure.

         So candidates are restricted to passages that actually contain a
         currency-sized number, then scored normally. The winning general
         passage is kept as lead context only when it also carries a figure. */
      /* "one time" and "one-time" must be in this list. A brochure-site build
         is quoted as "34,999 one time" under the label "Website Design
         (one-time build)" and says neither "rupee" nor "month", so without
         those terms the only passage that answers "website design cost" was
         filtered out and the monthly SEO tiers answered instead. */
      var priced = ranked.filter(function (r) {
        return hasFigure(r.p.text) &&
          /rupee|inr|month|price|rate|fee|quote|one[\s-]?time|onetime|per\s+page/i
            .test(r.p.text + ' ' + r.p.label);
      });

      /* Among priced passages, prefer the one whose LABEL matches the subject
         the visitor named. "website design cost" and "social media pricing"
         both reduce to money words plus one subject word, and the money words
         match every tier equally, so without this the subject is ignored and
         whichever tier happens to rank first answers every question.

         Only the non-money query terms are considered, since those are what
         identify the subject. */
      if (priced.length > 1) {
        var moneyish = /^(cost|price|pricing|rate|fee|charge|much|budget|rupee|inr|month|starting)/;
        var subject = base.filter(function (t) { return !moneyish.test(t); });
        if (subject.length) {
          priced = priced.slice().sort(function (a, b) {
            function labelHit(r) {
              var hay = ' ' + norm(r.p.label + ' ' + (r.p.h2 || '') + ' ' + (r.p.h3 || '')) + ' ';
              var n = 0;
              subject.forEach(function (t) {
                if (hay.indexOf(t.slice(0, Math.max(4, t.length - 1))) !== -1) n++;
              });
              return n;
            }
            var d = labelHit(b) - labelHit(a);
            return d !== 0 ? d : b.s - a.s;
          });
        }
      }

      if (priced.length) {
        var lead = condense(priced[0].p.text, qt, 3);
        // Replace rather than append, so the figure is the answer, not a
        // footnote after an unrelated paragraph.
        if (!hasFigure(paras.join(' '))) {
          paras = lead;
        }
        // Add one sibling tier for useful contrast, for example Starter and
        // Growth, when there is room.
        for (var f = 1; f < priced.length && paras.length < 3; f++) {
          if (priced[f].p.label !== priced[0].p.label) break;
          var fig = condense(priced[f].p.text, qt, 2)[0];
          if (fig && paras.join(' ').indexOf(fig.slice(0, 40)) === -1) paras.push(fig);
        }
      }
    }

    /* Add the next best passage when it is genuinely close and not repeating
       the winner. Two angles on one question reads like an answer; five reads
       like a search results page. */
    for (var i = 1; i < ranked.length && paras.length < 3; i++) {
      var cand = ranked[i];
      if (cand.s < top.s * 0.72 || cand.s < THRESHOLD) break;
      var extra = condense(cand.p.text, qt, 2)[0];
      if (extra && paras.join(' ').indexOf(extra.slice(0, 45)) === -1) {
        paras.push(extra);
      }
    }

    return { paras: paras, link: linkFor(top.p), score: top.s };
  }

  /* Public, opt-in API. Resolves to {reply, link, score} or null when no
     passage qualifies. Rejects if the corpus cannot load; a later call retries.
     Concurrent calls are serialised to protect the legacy topic context. */
  var fallbackCorpus = null;
  var fallbackQueue = Promise.resolve();
  window.fawazTextMatchingFallback = function fawazTextMatchingFallback(question) {
    var query = String(question || '').trim().slice(0, 500);
    if (!query) return Promise.resolve(null);
    var job = fallbackQueue.catch(function () {}).then(function () {
      if (!fallbackCorpus) {
        var controller = new AbortController();
        var timer = setTimeout(function () { controller.abort(); }, 10000);
        fallbackCorpus = fetch(CORPUS, { credentials: 'same-origin', signal: controller.signal })
          .then(function (response) {
            if (!response.ok) throw new Error('Fallback text unavailable');
            return response.text();
          })
          .then(function (source) {
            ready = parseCorpus(source);
            if (!ready) throw new Error('Fallback text is empty');
          })
          .catch(function (error) { fallbackCorpus = null; throw error; })
          .finally(function () { clearTimeout(timer); });
      }
      return fallbackCorpus.then(function () {
        var result = answer(query);
        return result ? { reply: result.paras.map(clean).join('\n\n'), link: result.link || null, score: result.score } : null;
      });
    });
    fallbackQueue = job;
    return job;
  };

  // The previous UI is retained below for reference, but never initialised.
  // Only assistant.js may attach handlers to the current widget.
  return;

  /* ---------------------------------------------------------------
     Legacy DOM (inactive)
     --------------------------------------------------------------- */
  var launcher = document.getElementById('assistantLauncher');
  var panel    = document.getElementById('assistantPanel');
  var closeBtn = document.getElementById('assistantClose');
  var form     = document.getElementById('assistantForm');
  var input    = document.getElementById('assistantInput');
  var log      = document.getElementById('assistantLog');
  var chips    = document.getElementById('assistantSuggest');

  if (!launcher || !panel || !form || !input || !log) return;

  function el(tag, cls, text) {
    var n = document.createElement(tag);
    if (cls) n.className = cls;
    if (text) n.textContent = text;
    return n;
  }

  function scrollLog() {
    window.requestAnimationFrame(function () { log.scrollTop = log.scrollHeight; });
  }

  function addUser(text) {
    var row = el('div', 'assistant-msg assistant-msg--user');
    row.appendChild(el('p', null, text));
    log.appendChild(row);
    scrollLog();
  }

  /* DOM nodes, never HTML strings, so nothing a visitor types can become
     markup. */
  function addReply(paragraphs, link, waText) {
    var row = el('div', 'assistant-msg assistant-msg--bot');
    paragraphs.forEach(function (p) { row.appendChild(el('p', null, clean(p))); });

    if (link) {
      var a = el('a', 'assistant-link', link[1]);
      a.href = link[0];
      row.appendChild(a);
    }
    if (waText) {
      var wa = el('a', 'assistant-link', 'Ask Fawaz on WhatsApp');
      wa.href = WA + '?text=' + encodeURIComponent(waText);
      wa.target = '_blank';
      wa.rel = 'noopener';
      row.appendChild(wa);
    }
    log.appendChild(row);
    scrollLog();
    return row;
  }

  /* -----------------------------------------------------------------
     Typed output.

     The reply is streamed a few characters at a time instead of being
     appended whole. This is presentation only: the answer is already
     fully resolved before the first character appears, so nothing can
     half fail midway and the aria-live region still announces once.

     Why not one character per timer tick: at a readable speed that is
     hundreds of timers per reply and a layout thrash on each one. A
     small chunk per frame is visually identical and far cheaper.

     Accessibility: the log is aria-live="polite", so streaming text
     node by node would make a screen reader announce fragments. The
     paragraph is therefore built inside an aria-hidden container while
     typing, and the finished text is written once to a live node at the
     end. Anyone who prefers reduced motion skips the animation
     entirely and gets the whole reply immediately.
     ----------------------------------------------------------------- */
  var reduceMotion = window.matchMedia
    ? window.matchMedia('(prefers-reduced-motion: reduce)').matches
    : false;

  var CPS = 62;   /* characters per second, tuned to just outpace reading */

  function typeInto(node, text, done) {
    var i = 0;
    var caret = el('span', 'assistant-cursor');
    var span = document.createTextNode('');
    node.appendChild(span);
    node.appendChild(caret);

    var last = 0;
    function step(now) {
      if (!last) last = now;
      var due = Math.max(1, Math.round((now - last) / 1000 * CPS));
      last = now;
      i = Math.min(text.length, i + due);
      span.nodeValue = text.slice(0, i);
      scrollLog();
      if (i < text.length) {
        window.requestAnimationFrame(step);
      } else {
        if (caret.parentNode) caret.parentNode.removeChild(caret);
        done();
      }
    }
    window.requestAnimationFrame(step);
  }

  /* Types each paragraph in turn, then reveals any links. Returns nothing;
     callers that need the finished row already have it. */
  function addTypedReply(paragraphs, link, waText) {
    if (reduceMotion) { addReply(paragraphs, link, waText); return; }

    var row = el('div', 'assistant-msg assistant-msg--bot');
    /* Hidden from assistive tech while characters stream in. */
    row.setAttribute('aria-hidden', 'true');
    log.appendChild(row);
    scrollLog();

    var texts = paragraphs.map(function (p) { return clean(p); });

    function next(n) {
      if (n >= texts.length) {
        if (link) {
          var a = el('a', 'assistant-link', link[1]);
          a.href = link[0];
          row.appendChild(a);
        }
        if (waText) {
          var wa = el('a', 'assistant-link', 'Ask Fawaz on WhatsApp');
          wa.href = WA + '?text=' + encodeURIComponent(waText);
          wa.target = '_blank';
          wa.rel = 'noopener';
          row.appendChild(wa);
        }
        /* Hand the finished text to assistive tech exactly once. */
        row.removeAttribute('aria-hidden');
        scrollLog();
        return;
      }
      var p = el('p');
      row.appendChild(p);
      typeInto(p, texts[n], function () {
        /* A beat between paragraphs, so a multi part answer reads as
           separate thoughts rather than one run on block. */
        window.setTimeout(function () { next(n + 1); }, 180);
      });
    }
    next(0);
  }

  /* A thinking pause. Retrieval is instant, but an answer that appears in the
     same frame as the question reads like a lookup table rather than a reply,
     and it also gives the aria-live region time to announce properly. */
  function addTyping() {
    var row = el('div', 'assistant-msg assistant-msg--bot assistant-typing');
    for (var i = 0; i < 3; i++) row.appendChild(el('span', 'assistant-dot'));
    log.appendChild(row);
    scrollLog();
    return row;
  }

  var FALLBACK = [
    'I could not find that in what Fawaz has written on this site, and I am not going to invent an answer for you.',
    'Fawaz will though, usually the same day. He answers WhatsApp himself.'
  ];

  function respond(q) {
    var pending = addTyping();

    setTimeout(function () {
      pending.remove();

      var meta = metaAnswer(q);
      if (meta) { addTypedReply(meta, null, null); return; }

      if (failed) {
        addTypedReply([
          'My knowledge file did not load, so I cannot search it right now. That is my problem, not yours.',
          'Fawaz can answer directly in the meantime.'
        ], null, 'Hi Fawaz, I had a question on your site: ' + q);
        return;
      }

      var res = answer(q);
      if (!res) {
        addTypedReply(FALLBACK, null, 'Hi Fawaz, I have a question about your SEO work: ' + q);
        return;
      }
      addTypedReply(res.paras, res.link, null);
    }, 420 + Math.random() * 280);
  }

  /* ---------------------------------------------------------------
     Suggestion chips
     --------------------------------------------------------------- */
  var SUGGEST = [
    'What does it cost?',
    'What are your certifications?',
    'What is the difference between SEO, AEO and GEO?',
    'How long does SEO take?',
    'Which cities do you work in?',
    'What happens in the free audit?'
  ];

  function buildChips() {
    if (!chips) return;
    chips.textContent = '';
    SUGGEST.forEach(function (q) {
      var b = el('button', 'assistant-chip', q);
      b.type = 'button';
      b.addEventListener('click', function () {
        addUser(q);
        chips.hidden = true;
        respond(q);
      });
      chips.appendChild(b);
    });
  }

  /* ---------------------------------------------------------------
     Corpus loading, deferred until the panel is first opened so it
     never costs anything on page load.
     --------------------------------------------------------------- */
  var loading = false;

  function loadCorpus(then) {
    if (ready || failed) { then(); return; }
    if (loading) return;
    loading = true;

    /* The QA harness injects the corpus directly, because fetch cannot read a
       relative path from a file:// page. */
    if (window.FBH_CORPUS_TEXT) {
      ready = parseCorpus(window.FBH_CORPUS_TEXT);
      failed = !ready;
      loading = false;
      then();
      return;
    }

    fetch(CORPUS, { credentials: 'same-origin' })
      .then(function (r) {
        if (!r.ok) throw new Error('HTTP ' + r.status);
        return r.text();
      })
      .then(function (t) {
        ready = parseCorpus(t);
        failed = !ready;
      })
      .catch(function () { failed = true; })
      .then(function () { loading = false; then(); });
  }

  var greeted = false;

  function greet() {
    if (greeted) return;
    greeted = true;
    addTypedReply([
      'Ask me anything about Fawaz&#8217;s work, pricing, credentials or the cities he covers.',
      'I search what he has actually published, so I will not make a number up. If I do not know, I will say so and hand you to him.'
    ].map(function (s) { return s.replace(/&#8217;/g, '\u2019'); }), null, null);
    buildChips();
  }

  function open() {
    panel.hidden = false;
    launcher.setAttribute('aria-expanded', 'true');
    launcher.classList.add('is-hidden');
    loadCorpus(function () { greet(); });
    setTimeout(function () { input.focus(); }, 60);
  }

  function close() {
    panel.hidden = true;
    launcher.setAttribute('aria-expanded', 'false');
    launcher.classList.remove('is-hidden');
    launcher.focus();
  }

  launcher.addEventListener('click', open);
  if (closeBtn) closeBtn.addEventListener('click', close);

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && !panel.hidden) close();
  });

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    var q = input.value.trim();
    if (!q) return;
    input.value = '';
    if (chips) chips.hidden = true;
    addUser(q);
    loadCorpus(function () { respond(q); });
  });
})();
