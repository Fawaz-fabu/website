<?php
/**
 * AI SEO expert in India.
 *
 * Why this page exists as its own page rather than a section elsewhere:
 * "AI SEO" is a distinct query with distinct intent. Someone searching it is
 * usually asking one of two different things, either "how do I stay visible
 * now that AI answers the query instead of listing my site" or "will you use
 * AI tools to do my SEO faster". Those are close to opposite concerns, and the
 * existing AEO and GEO pages answer only the first. Nothing on the site
 * addressed the second at all, which is a genuine content gap rather than a
 * keyword to be placed.
 *
 * This page therefore separates the three terms properly, states plainly where
 * AI is and is not used in the delivery of the work, and does not repeat the
 * AEO or GEO pages. It links to them for the deep dives.
 */

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/contact-form.php';
require_once __DIR__ . '/includes/floating-button.php';
require_once __DIR__ . '/includes/footer.php';

/* ── Identity readout ─────────────────────────────────────────────────── */
$identity = [
    ['Role',       'AI SEO consultant',   'Search, answer and generative engines'],
    ['Based',      'Kushal Nagar',        'Kodagu, Karnataka, India'],
    ['Certified',  'Two AI-specific',     'Semrush AI Visibility and Technical SEO'],
    ['Delivery',   'Personally',          'No account managers, no subcontracting'],
];

/* ── The three terms, separated ───────────────────────────────────────── */
$terms = [
    [
        'term' => 'SEO',
        'name' => 'Search Engine Optimisation',
        'q'    => 'Can people find my site in a list of results?',
        'body' => 'The original discipline and still the foundation. Crawlability, indexation, site speed, information architecture, internal linking, content that matches intent, and earned links. The measurable outcome is a ranking position and a click. Nothing in AI search has made this obsolete, and the evidence points the other way: classic ranking remains one of the strongest predictors of whether an AI engine cites you at all, because most engines retrieve from a search index before they generate anything.',
    ],
    [
        'term' => 'AEO',
        'name' => 'Answer Engine Optimisation',
        'q'    => 'Does the engine give my answer when someone asks a question?',
        'body' => 'Optimising to be the answer rather than a result. Question-shaped content, self-contained passages an engine can lift without needing the surrounding page, clean entity identity, structured data where it genuinely applies, and Google Business Profile accuracy for local questions. The outcome is being surfaced in an AI Overview, a featured snippet, a Copilot answer or a voice response. Often without a click, which is exactly why measurement has to change too.',
        'link' => ['/aeo-consultant', 'AEO consultant in India'],
    ],
    [
        'term' => 'GEO',
        'name' => 'Generative Engine Optimisation',
        'q'    => 'When a model recommends someone, is it my name?',
        'body' => 'The newest of the three and the least understood. Getting cited and recommended inside generated answers from ChatGPT, Perplexity, Gemini, Claude and Copilot. Each engine has a different source pool, so each has to be measured separately rather than treated as one channel. This depends heavily on off-site corroboration: what other credible sources say about you, not only what your own site claims.',
        'link' => ['/geo-consultant', 'GEO consultant in India'],
    ],
];

/* ── What actually changed about search ───────────────────────────────── */
$shifts = [
    ['Why might a search query produce an answer instead of a list?', 'For a growing share of informational queries the engine composes an answer instead of presenting ten links. If your visibility strategy is entirely built on ranking positions, part of your addressable demand has moved somewhere you are not measuring. The position may be unchanged while the click never happens.'],
    ['Why can impressions rise while clicks fall?', 'This is the pattern that worries people most, and it is worth understanding before panicking about it. Being cited in an answer can register as an impression while the user gets what they needed without visiting. That is a real loss of traffic and a real gain in influence at the same time. It needs different reporting rather than a different rank tracker.'],
    ['How do conversational questions affect content planning?', 'People type full questions and follow-up questions now, because the interface invites it. Short head terms still exist but a larger share of demand arrives as specific, qualified, sometimes multi-part questions. Content built only around head terms captures progressively less of it.'],
    ['Why consider what other sources say about a business?', 'When a model is deciding who to name, what independent sources say about you carries weight your own marketing copy cannot. Directory profiles, genuine press, association listings, review presence and credible third-party references all feed the picture. This is slower and less controllable than on-site work, and it is increasingly the part that separates two otherwise similar businesses.'],
    ['Can a consultant control what an AI model says?', 'You cannot buy a citation, guarantee one, or file a ticket when a model gets you wrong. You can make yourself the easiest correct answer to assemble. Anyone promising a guaranteed AI mention is selling something they cannot deliver, and that is worth knowing before you pay for it.'],
    ['Does AI SEO replace technical and content foundations?', 'The uncomfortable answer for anyone hoping AI search rewards a clever new tactic is that crawlability, clear structure, factual accuracy and genuine subject depth got more important rather than less. Most of what fails an AI visibility audit is ordinary technical and content debt, not a missing AI-specific trick.'],
];

/* ── How AI is used in delivery, honestly ─────────────────────────────── */
$tooling = [
    ['Which SEO tasks use AI assistance?', 'Clustering large query sets, spotting patterns across hundreds of URLs in a crawl, first-pass competitive comparison, and summarising research I then verify myself. Genuinely faster with no cost to quality, because the output gets checked before it is used. Client content methods and approvals are agreed in scope.'],
    ['How is content prepared and checked?', 'This website includes AI-assisted writing and editing, identified on the new guides. Tool use does not establish first-hand experience or verify a factual claim. Client content methods, specialist review and approval responsibilities should be agreed in the scope rather than inferred from this site.'],
    ['Who makes strategy and interpretation decisions?', 'Deciding strategy or interpreting client data. A model has no context on your market, your margins or what you can actually deliver operationally. Handing it that judgement produces plausible recommendations that quietly do not fit your business. Fawaz handles the strategy and implementation decisions directly.'],
];

/* ── Six things to check before hiring anyone for AI SEO ──────────────── */
$checks = [
    ['Can the consultant explain AEO and GEO clearly?', 'The fastest filter available to you. If the two terms collapse into one vague answer about AI, or into a repackaged description of ordinary SEO, the offer is a renamed retainer. They should also be able to say which engine each one primarily affects and why the measurement differs.'],
    ['Which engines are measured, and how?', 'ChatGPT, Perplexity, Gemini, Claude and Copilot do not share a source pool and do not respond to the same signals. Anyone treating AI visibility as one number has not looked closely. Ask specifically how they distinguish being retrieved from being cited, because those are different outcomes with different fixes.'],
    ['What will the consultant not promise?', 'This is more revealing than what they do promise. Citations cannot be guaranteed, timelines vary by engine, and freshness-sensitive engines behave differently from training-weighted ones. A practitioner who guarantees an AI mention either misunderstands the mechanism or is willing to mislead you, and neither is a good start.'],
    ['Can the consultant trace a statistic to its source?', 'AI search is full of confidently repeated numbers with no traceable source. Ask where a figure came from, who ran the study, on what sample. If nothing can be attributed, treat the whole assessment as decoration. Sources, examples and limitations should be clear before publication.'],
    ['Who supplies evidence and approves content?', 'Ask who supplies first-hand information, whether AI assists drafting, who checks sources and who approves publication. Judge the usefulness and accuracy of the result, not a blanket claim about the tool. Generated copy must not be presented as personal experience or a verified client result.'],
    ['Are the SEO foundations ready for additional AI visibility work?', 'If your site is slow, badly structured, thin on real detail or unclear about who you are, AEO and GEO work will underperform and the budget is better spent on the foundations first. Anyone who sells you the AI tier without checking this is prioritising their invoice over your outcome. My audit says which of the three you actually need, and sometimes the answer is that the newest one should wait.'],
];

/* ── FAQ ──────────────────────────────────────────────────────────────── */
$faqs = [
    [
        'q' => 'What is AI SEO?',
        'a' => [
            '<strong>AI SEO is the practice of staying findable as search shifts from listing results to generating answers. It covers three connected disciplines: SEO for ranked results, AEO for direct answers, and GEO for citations inside AI-generated responses.</strong>',
            'The term gets used loosely for two quite different things, so it is worth separating them at the start. Most people searching it mean the first sense, which is how to remain visible when an engine answers the question instead of sending a click. A smaller number mean the second sense, which is whether a consultant uses AI tools to produce the work faster. This page answers both, because the second one turns out to matter for the first.',
        ],
        'open' => true,
    ],
    [
        'q' => 'Who is an AI SEO expert in India?',
        'a' => [
            '<strong>Fawaz BH is an independent AI SEO consultant based in Kushal Nagar, Kodagu, Karnataka, working with clients across India remotely.</strong>',
            'He holds four named qualifications, two of which cover AI search specifically: Semrush AI Visibility Essentials and Semrush Technical SEO and AI Search Essentials, alongside an Ahrefs Academy certification and an Advanced Diploma in Digital Marketing from Adrex Media School. SEO, AEO and GEO are run as one connected strategy rather than three retainers, and every engagement is delivered personally with no account managers and no subcontracting. There is no claim here to being the single best practitioner in the country, because that is not a measurable statement and any page making it is marketing rather than informing.',
        ],
    ],
    [
        'q' => 'Is AI SEO different from normal SEO?',
        'a' => [
            '<strong>It is an extension rather than a replacement, and the foundations became more important rather than less.</strong>',
            'The additions are real: content structured so a passage can be lifted and still make sense, unambiguous entity identity, per-engine measurement, and off-site corroboration carrying more weight. But most of what fails an AI visibility audit is ordinary technical and content debt. Sites that cannot be crawled cleanly, pages with no specific information in them, unclear identity, no third-party corroboration. If someone tells you AI search has made technical SEO irrelevant, they are describing a market that does not exist. The retrieval layer of most engines is a search index.',
        ],
    ],
    [
        'q' => 'Do you use AI to write the content?',
        'a' => [
            '<strong>This website includes AI-assisted writing and editing. The new guides state this explicitly.</strong>',
            'AI assistance is not evidence of expertise and does not verify a fact. Sources, examples and limitations should be clear, and invented results or experience must not be published. For client work, agree on the drafting method, evidence, specialist review and approval responsibilities in the scope. Do not assume that every article on this site is a personally written field report.',
        ],
    ],
    [
        'q' => 'Will AI search reduce my website traffic?',
        'a' => [
            '<strong>For some query types, yes, and pretending otherwise would be dishonest.</strong>',
            'Informational queries that an engine can answer completely are the most exposed, particularly simple definitional and how-to content. Transactional, commercial and comparison queries are far more resilient, because the user still needs to evaluate, choose and buy. Local queries with real intent behind them still send people to businesses. The sensible response is to know which of those categories your traffic actually comes from before reacting. Some sites need to shift content strategy substantially, others are barely exposed, and I would rather tell you which you are than sell the same urgent package to both.',
        ],
    ],
    [
        'q' => 'Can you guarantee ChatGPT will recommend my business?',
        'a' => [
            '<strong>No, and nobody honestly can.</strong>',
            'No one controls the output of a language model. There is no submission process, no ranking dashboard and no support ticket when a model gets you wrong. What can be done is making your business the easiest correct answer to assemble: unambiguous identity, factual and specific content, consistent information across the sources that describe you, and credible third-party corroboration. That measurably improves the odds of being named. It is not a guarantee, and anyone offering one is either misinformed or willing to mislead you.',
        ],
    ],
    [
        'q' => 'How long does AI visibility work take to show results?',
        'a' => [
            '<strong>Structural work usually starts showing in roughly six to twelve weeks, with mention-building compounding over three to six months. Freshness-driven engines can pick up new content within days of indexing.</strong>',
            'The variation between engines is genuine rather than a hedge. Perplexity searches live on nearly every query, so well-structured new content can surface quickly. Engines weighted towards training data and established corroboration move much more slowly, because you are waiting on the wider web to reflect the change. Anyone quoting a single confident timeline across all five engines has not measured them separately.',
        ],
    ],
    [
        'q' => 'How much does AI SEO cost in India?',
        'a' => [
            '<strong>Published starting rates are &#8377;14,999 per month for a Starter local SEO scope and &#8377;29,999 per month for full-stack SEO plus AEO. Combined SEO, AEO and GEO is quoted after a free audit.</strong>',
            'GEO sits in the top tier for a structural reason rather than a commercial one: it depends on the SEO and AEO foundations being in place, so buying it first tends to waste money. The audit is free and it will tell you if the newest tier should wait. Full rate card on the <a href="/seo-services">services page</a>.',
        ],
    ],
];

/* ── Structured data ──────────────────────────────────────────────────── */
$faq_ld = [];
foreach ($faqs as $f) {
    $plain = trim(html_entity_decode(strip_tags(implode(' ', $f['a'])), ENT_QUOTES, 'UTF-8'));
    $faq_ld[] = [
        '@type' => 'Question',
        'name'  => html_entity_decode($f['q'], ENT_QUOTES, 'UTF-8'),
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $plain],
    ];
}

// After a real review, set its YYYY-MM-DD date here; otherwise leave null.
$reviewed_on = null;

$schema = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'WebPage',
            '@id'   => 'https://fawazbhseo.in/ai-seo-expert-india#page',
            'url'   => 'https://fawazbhseo.in/ai-seo-expert-india',
            'name'  => 'AI SEO expert in India, Fawaz BH',
            'about' => ['@id' => 'https://fawazbhseo.in/#fawaz'],
        ] + fbh_review_date_schema($reviewed_on),
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => 'https://fawazbhseo.in/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'AI SEO expert in India', 'item' => 'https://fawazbhseo.in/ai-seo-expert-india'],
            ],
        ],
        [
            '@type'    => 'Person',
            '@id'      => 'https://fawazbhseo.in/#fawaz',
            'name'     => 'Fawaz BH',
            'jobTitle' => 'Independent SEO, AEO and GEO Consultant',
            'url'      => 'https://fawazbhseo.in/',
            'image'    => 'https://fawazbhseo.in/assets/images/fawazbh.webp',
            'telephone'=> '+91-94810-84038',
            'email'    => ['fawazbhseo@gmail.com', 'admin@fawazbhseo.in'],
            'address'  => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Kushalnagar, Kodagu',
                'addressRegion'   => 'Karnataka',
                'postalCode'      => '571234',
                'addressCountry'  => 'IN',
            ],
            'sameAs' => ['https://www.linkedin.com/in/fawazbh', 'https://x.com/fawazbhseo'],
            'knowsLanguage' => ['en', 'kn', 'ml', 'hi', 'ta', 'te'],
            'knowsAbout' => [
                'Search Engine Optimization',
                'Answer Engine Optimization',
                'Generative Engine Optimization',
                'AI search visibility',
                'Technical SEO',
                'Structured data and entity SEO',
            ],
            'hasCredential' => [
                ['@type' => 'EducationalOccupationalCredential', 'name' => 'Semrush AI Visibility Essentials', 'credentialCategory' => 'certificate'],
                ['@type' => 'EducationalOccupationalCredential', 'name' => 'Semrush Technical SEO and AI Search Essentials', 'credentialCategory' => 'certificate'],
                ['@type' => 'EducationalOccupationalCredential', 'name' => 'Ahrefs Academy Certification', 'credentialCategory' => 'certificate'],
                ['@type' => 'EducationalOccupationalCredential', 'name' => 'Advanced Diploma in Digital Marketing, Adrex Media School', 'credentialCategory' => 'diploma'],
            ],
        ],
        [
            '@type'      => 'Service',
            '@id'        => 'https://fawazbhseo.in/ai-seo-expert-india#service',
            'name'       => 'AI SEO, AEO and GEO consulting',
            'serviceType'=> 'AI search visibility consulting',
            'provider'   => ['@id' => 'https://fawazbhseo.in/#fawaz'],
            'areaServed' => ['@type' => 'Country', 'name' => 'India'],
            'description'=> 'Consulting to keep businesses visible as search shifts from ranked results to generated answers, covering SEO, Answer Engine Optimisation and Generative Engine Optimisation as one strategy.',
        ],
        [
            '@type' => 'FAQPage',
            '@id'   => 'https://fawazbhseo.in/ai-seo-expert-india#faq',
            'mainEntity' => $faq_ld,
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

render_head([
    'title'       => 'AI SEO Expert & Consultant in India | Fawaz BH',
    'description' => 'Work directly with Fawaz BH, an AI SEO consultant in India. Explore search visibility work, AI-assisted workflows, scope and per-engine measurement.',
    'canonical'   => 'https://fawazbhseo.in/ai-seo-expert-india',
    'schema'      => $schema,
]);

render_header('aiseo');
?>

<main id="main">

  <!-- 1. HERO -->
  <section class="hero" aria-labelledby="hero-h">
    <div class="wrap hero__grid">

      <div class="hero__lead reveal">
        <nav class="eyebrow" aria-label="Breadcrumb">
          <a href="/">Fawaz BH</a> / <span aria-current="page">AI SEO expert in India</span>
        </nav>
        <h1 id="hero-h">AI SEO expert and consultant in India.</h1>
        <p class="hero__sub">AI SEO consulting for businesses assessing both their visibility in AI answers and how AI tools are used in search work.</p>

        <p style="margin-top:18px;color:var(--text-2)"><strong>Fawaz BH is an independent AI SEO consultant based in Kushal Nagar, Kodagu, Karnataka, working with businesses across India remotely.</strong> Four qualifications sit behind the practice, two of them covering AI search specifically, which are Semrush AI Visibility Essentials and Semrush Technical SEO and AI Search Essentials, alongside an Ahrefs Academy certification and an Advanced Diploma in Digital Marketing.</p>

        <p style="margin-top:14px;color:var(--text-2)">Two things are worth saying before anything else. <strong>This website includes AI-assisted writing and editing, with the new guides labelled accordingly.</strong> No engagement promises a guaranteed AI citation. What follows explains AI SEO and the questions worth asking before hiring a consultant. For a beginner-friendly comparison, read <a href="/blogs/seo-aeo-geo-differences">SEO vs AEO vs GEO</a>.</p>

        <div class="btn-row">
          <a class="btn btn--accent" href="https://wa.me/919481084038?text=Hi%20Fawaz%2C%20I%20would%20like%20a%20free%20AI%20search%20visibility%20audit" target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 21a9 9 0 1 0-8.5-6.1L2 22l6.5-1.6A9 9 0 0 0 12 21Z"/></svg>
            Free AI visibility audit
          </a>
          <a class="btn" href="#terms">What AI SEO actually means</a>
        </div>
      </div>

      <dl class="readout reveal">
        <?php foreach ($identity as $row): ?>
        <div class="readout__row">
          <dt><?php echo $row[0]; ?></dt>
          <dd><?php echo $row[1]; ?><small><?php echo $row[2]; ?></small></dd>
        </div>
        <?php endforeach; ?>
      </dl>

    </div>
  </section>

  <!-- 2. THE THREE TERMS -->
  <section class="section" id="terms" aria-labelledby="terms-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Definitions</p>
        <h2 id="terms-h">What does AI SEO mean for a business in India?</h2>
        <p class="lede">AI SEO covers search visibility as engines generate answers, as well as the use of AI tools within SEO delivery. Fawaz BH works across technical SEO, answer-focused content, entity information and per-engine observation. The sections below separate those activities so you can discuss the work you need rather than buy an undefined AI label.</p>
      </div>

      <div class="grid grid--3">
        <?php foreach ($terms as $t): ?>
        <article class="card reveal">
          <span class="card-index"><?php echo $t['term']; ?></span>
          <h3><?php echo $t['q']; ?></h3>
          <p><?php echo $t['body']; ?></p>
          <p class="field-note"><strong><?php echo $t['name']; ?></strong></p>
          <?php if (!empty($t['link'])): ?>
          <p style="margin-top:16px">
            <a class="link-arrow" href="<?php echo $t['link'][0]; ?>"><?php echo $t['link'][1]; ?>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
          </p>
          <?php endif; ?>
        </article>
        <?php endforeach; ?>
      </div>

      <p class="lede reveal" style="margin-top:28px">The order matters. GEO depends on AEO foundations, and AEO depends on SEO foundations. Buying the newest one first is the most common and most expensive mistake in this market, which is why the free audit says which of the three your money should go to rather than assuming it is all three.</p>
      <p id="service-choice" class="reveal" style="margin-top:18px">Choose the scope you want to explore: <a href="/aeo-consultant">AEO for direct answers</a>, <a href="/geo-consultant">GEO for AI-generated visibility</a>, or <a href="/seo-services#technical-seo">SEO foundations and deliverables</a>.</p>
    </div>
  </section>

  <!-- 3. WHAT CHANGED -->
  <section class="section section--alt" id="changed" aria-labelledby="changed-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">What actually changed</p>
        <h2 id="changed-h">What changes when a search engine answers the question?</h2>
        <p class="lede">Rankings, visits and appearances in generated answers describe different outcomes. AI SEO work considers answer visibility alongside the existing technical and content foundations, rather than treating a mention as a website visit. The points below explain the distinctions already covered by this practice and the limits on what a consultant can promise.</p>
      </div>

      <div>
        <ul class="why-list reveal">
          <?php foreach ($shifts as $i => $s): ?>
          <li>
            <span class="idx"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></span>
            <div>
              <h3><?php echo $s[0]; ?></h3>
              <p><?php echo $s[1]; ?></p>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

    </div>
  </section>

  <section class="section" id="ai-seo-scope" aria-labelledby="ai-seo-scope-h">
    <div class="wrap">
      <h2 id="ai-seo-scope-h">What can an AI SEO engagement include?</h2>
      <p class="lede">The existing service scope includes technical review, question and prompt mapping, answer-focused content, business-identity and structured-data work, and separate observations of AI visibility. The audit determines priorities; the written agreement defines what is included. An AI SEO label does not add a new package, page quantity, revision allowance or guaranteed result.</p>
      <p>Explore the <a href="/aeo-consultant#services">AEO workstreams</a>, <a href="/geo-consultant#geo-services">GEO workstreams</a> and <a href="/seo-services#pricing">published services and starting prices</a>. Technical foundations are described in the <a href="/seo-services#technical-seo">technical SEO service section</a>.</p>
    </div>
  </section>

  <section class="section section--alt" id="ai-seo-inputs" aria-labelledby="ai-seo-inputs-h">
    <div class="wrap">
      <h2 id="ai-seo-inputs-h">What information and decisions are needed before work starts?</h2>
      <p class="lede">Bring your public website and profile URLs, services, markets, buyer questions and the facts you can approve for publication. Identify who checks information and who approves or publishes changes. Available reports, access, reporting cadence and handover format are discussion points for the scope, not assumptions made from the AI SEO label.</p>
      <p>The existing <a href="/aeo-consultant#inputs">inputs and responsibilities checklist</a> and <a href="/geo-consultant#handovers">handover discussion</a> explain these boundaries. Do not send passwords or confidential customer data with an initial enquiry.</p>
    </div>
  </section>

  <section class="section" id="ai-seo-measurement" aria-labelledby="ai-seo-measurement-h">
    <div class="wrap">
      <h2 id="ai-seo-measurement-h">How are AI SEO observations measured?</h2>
      <p class="lede">Record mentions, linked citations and recommendations as separate observations, and keep each engine separate rather than combining them into one score. Read those observations alongside available rankings, traffic and enquiries. A business name in an answer is not automatically a website visit, a recommendation or a measured client outcome.</p>
      <p>The <a href="/blogs/measure-ai-search-visibility">AI search visibility guide</a> includes a blank observation log. The specialist pages explain <a href="/aeo-consultant#measurement">measurement categories</a> and <a href="/geo-consultant#scoping">how reporting is scoped</a>.</p>
    </div>
  </section>

  <!-- 4. HOW AI IS USED IN THE WORK -->
  <section class="section" id="tooling" aria-labelledby="tooling-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Straight answer</p>
        <h2 id="tooling-h">How is AI used in the SEO work?</h2>
        <p class="lede">AI assists query clustering, crawl-pattern analysis, comparisons and research summaries that Fawaz checks. This website also discloses AI-assisted writing and editing. That does not verify a claim or establish first-hand experience. For client content, the drafting method, evidence, specialist review and publication approval belong in the agreed scope.</p>
      </div>

      <div class="grid grid--3">
        <?php foreach ($tooling as $i => $t): ?>
        <article class="card<?php echo $i === 1 ? ' card--featured' : ''; ?> reveal">
          <span class="card-index"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></span>
          <h3><?php echo $t[0]; ?></h3>
          <p><?php echo $t[1]; ?></p>
        </article>
        <?php endforeach; ?>
      </div>

      <p class="lede reveal" style="margin-top:28px">Writing style does not establish authorship or verify a claim. This website includes AI-assisted writing and editing. Judge published information by its sources, disclosures and accuracy; agree the drafting, review and approval responsibilities for client work in the scope.</p>
    </div>
  </section>

  <!-- 5. SIX CHECKS -->
  <section class="section section--alt" id="checks" aria-labelledby="checks-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">Before you hire anyone</p>
        <h2 id="checks-h">How should you choose an AI SEO consultant in India?</h2>
        <p class="lede">Choose an AI SEO specialist by checking the proposed work, evidence and responsibilities, not the label alone. Ask which engines are observed, how results are recorded, who checks content and what is outside the scope. The questions below can be put to Fawaz directly before you decide whether the engagement fits.</p>
      </div>

      <div>
        <ul class="why-list reveal">
          <?php foreach ($checks as $i => $c): ?>
          <li>
            <span class="idx"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></span>
            <div>
              <h3><?php echo $c[0]; ?></h3>
              <p><?php echo $c[1]; ?></p>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

    </div>
  </section>

  <!-- 6. CREDENTIALS -->
  <section class="section" id="credentials" aria-labelledby="cred-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Credentials</p>
        <h2 id="cred-h">What qualifications does Fawaz BH hold for AI SEO work?</h2>
        <p class="lede">Fawaz lists Semrush AI Visibility Essentials, Semrush Technical SEO and AI Search Essentials, Ahrefs Academy Certification and an Advanced Diploma in Digital Marketing from Adrex Media School. These describe his training, not a promise of rankings or citations. His background and existing client-work notes are available separately on the About and case-study pages.</p>
      </div>

      <div class="grid grid--2">
        <article class="card card--featured reveal">
          <span class="badge badge--accent">Issued by Semrush</span>
          <h3>What does the Semrush AI Visibility Essentials qualification cover?</h3>
          <p>Prompt-level tracking, share of voice inside generated answers, and the distinction between being retrieved and being cited. This is the certification that underpins the AEO and GEO work directly, and that last distinction is the one most AI SEO offers never make.</p>
        </article>

        <article class="card card--featured reveal">
          <span class="badge badge--accent">Issued by Semrush</span>
          <h3>What does the Semrush Technical SEO and AI Search Essentials qualification cover?</h3>
          <p>Crawlability, indexation, site health and structured data, and how those foundations feed AI search surfaces. This is the certification that explains why AI visibility work keeps coming back to ordinary technical quality. The qualification is listed with the other training on the About page.</p>
        </article>

        <article class="card reveal">
          <span class="badge">Issued by Ahrefs</span>
          <h3>What does the Ahrefs Academy certification cover?</h3>
          <p>Keyword research, backlink analysis, competitive research and technical auditing. Still the base layer, because classic ranking remains one of the strongest predictors of whether an engine cites you at all. The About page also describes the on-page and technical SEO training behind this credential.</p>
        </article>

        <article class="card reveal">
          <span class="badge">Issued by Adrex Media School</span>
          <h3>What does the Advanced Diploma in Digital Marketing add?</h3>
          <p>Broad grounding across digital channels, which is what makes it possible to tell you when your visibility problem is not actually a search problem and the budget belongs somewhere else entirely. It was awarded by Adrex Media School and sits alongside the named search certifications.</p>
        </article>
      </div>

      <p class="lede reveal" style="margin-top:28px">Deep dives on the two newer disciplines live on the <a href="/aeo-consultant">AEO consultant page</a> and the <a href="/geo-consultant">GEO consultant page</a>. National SEO engagements are on the <a href="/seo-consultant-india">SEO consultant in India page</a>. Documented client work is on the <a href="/case-studies">case studies page</a>, where client-approved testimonials are kept separate from measured performance claims.</p>
    </div>
  </section>

  <!-- 7. FAQ -->
  <section class="section section--alt" id="faq" aria-labelledby="faq-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">Questions</p>
        <h2 id="faq-h">What else should you know before commissioning AI SEO?</h2>
        <p class="lede">Start with the distinction between AI search visibility and AI-assisted delivery, then discuss scope, evidence and cost. The answers below cover the existing service description, content disclosure, qualifications and published starting rates. They should be read alongside the written scope for your business, not as a guarantee that an engine will recommend it.</p>
      </div>

      <div>
        <?php foreach ($faqs as $f): ?>
        <details class="faq reveal"<?php echo !empty($f['open']) ? ' open' : ''; ?>>
          <summary><?php echo $f['q']; ?></summary>
          <div class="faq__body">
            <?php foreach ($f['a'] as $para): ?>
            <p><?php echo $para; ?></p>
            <?php endforeach; ?>
          </div>
        </details>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <?php
  render_contact_form([
      'heading' => 'How can you discuss an AI SEO project with Fawaz BH?',
      'lede'    => 'Contact Fawaz directly with your website, business location and the search problem you want to discuss. The existing free audit is the starting point for deciding priorities across SEO, AEO and GEO. Agree the work and price in writing before implementation; no AI citation is guaranteed.',
      'id'      => 'contact',
  ]);
  ?>

  <?php fbh_render_review_date($reviewed_on); ?>

</main>

<?php
render_floating_button('Hi Fawaz, I would like a free AI search visibility audit.');
render_footer();
