/* ---------------------------------------------------------------------------
   Language switcher behaviour and the region aware language OFFER.

   TWO JOBS, BOTH SMALL:
     1. Filter a long language menu as you type.
     2. Offer the visitor their own language once, in a dismissible bar.

   NO LANGUAGE LIST LIVES IN THIS FILE. It used to, and that was a maintenance
   trap: adding a language meant editing PHP and JS and keeping two lists in
   sync. Everything now comes from the server, which already knows which
   translations exist:
     - the menu items are real <a> elements rendered by PHP, each carrying a
       data-search attribute
     - the offer payload arrives as JSON in #langOffer[data-locales], including
       each language's own offer copy
   So a new language needs no change here. That is the point.

   THIS SCRIPT NEVER REDIRECTS. Read this before changing it.

   1. Googlebot crawls predominantly from the United States. Redirect by region
      and you can hide translated pages from the crawler entirely, or worse,
      serve the crawler something different from what a human sees, which is
      cloaking.
   2. Plenty of people in Karnataka, Kerala and Tamil Nadu read technical and
      commercial content in English by preference. Forcing Kannada on someone
      because of their IP is an annoyance, not a feature. The same is true of a
      German speaker who would rather read the authoritative English than a
      machine translation.
   3. A redirect on first paint is a Core Web Vitals problem, and this site's
      performance work was hard won.

   So: detect, offer once, remember the choice, let the visitor decide. The
   <details> switcher in the header is the primary control and works fully with
   this script disabled.

   There is no IP geolocation either. That needs a third party API call on every
   page load, which costs a request, leaks visitor IPs to a vendor and can fail.
   navigator.languages is the visitor's own stated preference, which is better
   evidence of what they want to read than the country their network exits from.
   --------------------------------------------------------------------------- */
(function () {
  'use strict';

  var KEY  = 'fbh-lang-choice';
  var SEEN = 'fbh-lang-offered';

  function store(k, v) { try { localStorage.setItem(k, v); } catch (e) {} }
  function read(k) { try { return localStorage.getItem(k); } catch (e) { return null; } }

  /* The page's own language, full tag lowercased, e.g. "zh-hans". */
  var current = (document.documentElement.getAttribute('lang') || 'en').toLowerCase();
  var currentBase = current.split('-')[0];

  /* -------------------------------------------------------------------------
     1. The switcher
     ---------------------------------------------------------------------- */
  var sw = document.getElementById('langSwitch');

  if (sw) {
    /* Remember an explicit click so the offer never nags on later pages. */
    sw.addEventListener('click', function (e) {
      var a = e.target.closest ? e.target.closest('[data-lang]') : null;
      if (a) store(KEY, a.getAttribute('data-lang'));
    });

    /* <details> does not close on outside click or Escape by itself. */
    document.addEventListener('click', function (e) {
      if (sw.open && !sw.contains(e.target)) sw.open = false;
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && sw.open) sw.open = false;
    });

    /* The search field. Revealed only now, because without JavaScript a search
       box that does nothing is worse than no search box: the full list is still
       there to scroll, which is why the items are plain links. */
    var find  = sw.querySelector('[data-lang-find]');
    var list  = sw.querySelector('[data-lang-list]');
    var empty = sw.querySelector('[data-lang-empty]');
    var input = find ? find.querySelector('input') : null;

    if (find && list && input) {
      find.hidden = false;

      var items = [];
      var nodes = list.querySelectorAll('[data-search]');
      for (var n = 0; n < nodes.length; n++) {
        items.push({ el: nodes[n], hay: (nodes[n].getAttribute('data-search') || '') });
      }

      var filter = function () {
        /* Lowercased and trimmed. Matching is a plain substring test against
           native name, English name and code together, so a Greek speaker can
           find their language by typing "ell", "greek" or "el". */
        var q = input.value.toLowerCase().trim();
        var shown = 0;

        for (var i = 0; i < items.length; i++) {
          var hit = !q || items[i].hay.indexOf(q) !== -1;
          items[i].el.hidden = !hit;
          if (hit) shown++;
        }
        if (empty) empty.hidden = (shown !== 0);
      };

      input.addEventListener('input', filter);

      /* Enter goes to the first remaining match, so picking a language from a
         hundred is: open, type three letters, Enter. */
      input.addEventListener('keydown', function (e) {
        if (e.key !== 'Enter') return;
        for (var i = 0; i < items.length; i++) {
          if (!items[i].el.hidden) {
            e.preventDefault();
            items[i].el.click();
            return;
          }
        }
      });

      /* Reset on open, otherwise a stale filter hides most of the list. */
      sw.addEventListener('toggle', function () {
        if (!sw.open) return;
        input.value = '';
        filter();
        /* Not focused on touch: it would throw up the keyboard over the very
           list the visitor is trying to read. */
        if (window.matchMedia && window.matchMedia('(hover: hover)').matches) {
          input.focus();
        }
      });
    }
  }

  /* -------------------------------------------------------------------------
     2. The offer bar
     ---------------------------------------------------------------------- */
  var bar = document.getElementById('langOffer');
  if (!bar) return;

  /* Never offer twice, and never argue with a stated choice. */
  if (read(SEEN) === '1') return;
  var chosen = read(KEY);
  if (chosen && chosen.toLowerCase() === current) return;

  var locales = [];
  try {
    locales = JSON.parse(bar.getAttribute('data-locales') || '[]');
  } catch (e) {
    return;   /* Malformed payload is not worth a broken page over. */
  }
  if (!locales.length) return;

  /* COMPACT PAYLOAD. The site offers every language in the registry now, so
     the payload is sent with defaults omitted rather than repeating the same
     English sentence a hundred times inside an HTML attribute. Anything
     missing from an entry takes the shared default off the element itself.
     Defaults applied here, once, so the rest of the script below can keep
     reading want.text, want.dir and the rest without caring. */
  var fallback = {
    text: bar.getAttribute('data-text')    || '',
    go:   bar.getAttribute('data-switch')  || '',
    no:   bar.getAttribute('data-dismiss') || ''
  };

  for (var d = 0; d < locales.length; d++) {
    var L0 = locales[d];
    if (typeof L0.dir  !== 'string')  L0.dir  = 'ltr';   /* ltr is the common case */
    if (typeof L0.ai   !== 'boolean') L0.ai   = true;    /* machine is the common case */
    if (!L0.text) L0.text = fallback.text;
    if (!L0.go)   L0.go   = fallback.go;
    if (!L0.no)   L0.no   = fallback.no;
  }

  /* Index by full tag and by base, so a browser asking for de-AT matches the
     de translation, and one asking for zh-Hans matches zh-Hans exactly. */
  var byTag  = {};
  var byBase = {};
  for (var i = 0; i < locales.length; i++) {
    var L = locales[i];
    byTag[L.code.toLowerCase()] = L;
    var b = L.code.toLowerCase().split('-')[0];
    if (!byBase[b]) byBase[b] = L;   /* first wins, and the registry is ordered
                                        by market priority, so pt matches pt
                                        before pt-BR */
  }

  /* First available language in the visitor's own preference order. Exact tag
     beats base, so a zh-Hant preference is not answered with zh-Hans. */
  var prefs = navigator.languages || [navigator.language || 'en'];
  var want = null;

  for (var p = 0; p < prefs.length && !want; p++) {
    var tag = String(prefs[p]).toLowerCase();
    if (tag === current || tag.split('-')[0] === currentBase) break;  /* they already
                                                        prefer this page's
                                                        language: say nothing */
    want = byTag[tag] || byBase[tag.split('-')[0]] || null;
  }

  if (!want) return;
  if (want.code.toLowerCase() === current) return;
  if (chosen && chosen.toLowerCase() !== want.code.toLowerCase()) return;

  function build() {
    var text = document.createElement('p');
    text.className = 'lang-offer__text';
    text.setAttribute('lang', want.code);
    text.setAttribute('dir', want.dir || 'ltr');
    text.textContent = want.text;

    /* An unreviewed machine translation is flagged in the offer too, not just
       once the visitor is already on the page. Offering someone a rough
       translation is fine. Offering it without saying so is not. */
    if (want.ai) {
      var tag2 = document.createElement('span');
      tag2.className = 'lang-offer__ai';
      tag2.setAttribute('lang', 'en');
      tag2.setAttribute('dir', 'ltr');
      tag2.textContent = 'AI';
      text.appendChild(document.createTextNode(' '));
      text.appendChild(tag2);
    }

    var go = document.createElement('a');
    go.className = 'lang-offer__go';
    go.setAttribute('lang', want.code);
    go.setAttribute('dir', want.dir || 'ltr');
    go.setAttribute('hreflang', want.code);
    go.textContent = want.go;
    go.href = want.href;   /* built server side, already correct for this page */
    go.addEventListener('click', function () {
      store(KEY, want.code);
      store(SEEN, '1');
    });

    var no = document.createElement('button');
    no.className = 'lang-offer__no';
    no.type = 'button';
    no.setAttribute('lang', want.code);
    no.setAttribute('dir', want.dir || 'ltr');
    no.textContent = want.no;
    no.addEventListener('click', function () {
      store(SEEN, '1');
      store(KEY, current);
      bar.hidden = true;
    });

    bar.appendChild(text);
    bar.appendChild(go);
    bar.appendChild(no);
    bar.hidden = false;
  }

  /* Deferred to idle time: this is a courtesy, not content, and it must not
     compete with the first paint. */
  if ('requestIdleCallback' in window) window.requestIdleCallback(build, { timeout: 2200 });
  else window.setTimeout(build, 1200);
})();
