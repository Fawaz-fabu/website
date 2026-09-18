/* ---------------------------------------------------------------------------
   FULL PAGE TRANSLATION AT RUNTIME.

   WHAT THIS FILE IS FOR. The site has locale files for ten languages, and those
   only ever covered the interface: navigation, buttons, the language menu. Page
   bodies stayed in English. This file is what makes the whole page arrive in
   the chosen language, headings, paragraphs, lists, cards, FAQs, form labels
   and all, for every language in the registry rather than only the ten with a
   file.

   HOW. Google's free website translator script. It walks the rendered DOM and
   replaces text nodes in place, which is why layout, fonts, hard-edge shadows
   and dark mode all survive it untouched: nothing about the markup or the CSS
   changes, only the words inside the existing elements.

   WHY THIS AND NOT AN API. A translation API needs a key, and a key cannot live
   in a static front end without being handed to anyone who opens the source. On
   a PHP site with no translation backend this script is the only route to full
   page translation that does not publish a credential. The honest tradeoffs,
   written down so nobody has to rediscover them:

     - It is a third party dependency. If Google retires the script, translation
       stops working. The site does not break: it falls back to English body
       copy, and on the ten locales that have a file the interface is still
       translated from that file. Degradation, not failure.
     - Page text is sent to Google to be translated. There is nothing private on
       this site, so that is acceptable here. It would not be on a page behind a
       login.
     - The output is machine translation. That is exactly what the notice under
       the header says it is, and every such page is noindex. Nothing here
       pretends to be Fawaz's own writing in a language he cannot read.

   WHAT IT NEVER TOUCHES. Anything carrying translate="no" or class notranslate:
   the brand name, the wordmark, phone numbers, the email address, the footer
   specialism anchors, and on a locale that has a file, the interface strings
   the server already translated. Sending Kannada text through an English to
   Kannada pass is how good copy gets turned into nonsense, so the server's own
   work is fenced off from this script rather than translated twice.

   NO LANGUAGE LIST LIVES HERE. The target code arrives on <html data-mt>,
   resolved server side by fbh_mt_code(). Adding a language is still a registry
   row and nothing else.
   --------------------------------------------------------------------------- */
(function () {
  'use strict';

  var root = document.documentElement;

  /* The engine's code for the active language, for example "de", "zh-CN",
     "iw". Absent or "en" means there is nothing to do: English pages are the
     source and must never be run through a translation pass. */
  var target = (root.getAttribute('data-mt') || '').trim();
  if (!target || target === 'en') return;

  /* Whether the server already translated the interface from a locale file.
     Only used for the status line wording. The actual protection is the
     translate="no" attributes the server printed. */
  var hasFile = root.getAttribute('data-mt-file') === '1';

  /* -------------------------------------------------------------------------
     1. Tell the widget what to do before it loads

     The script reads its instruction from the googtrans cookie on startup.
     Setting it first is what makes translation automatic: the visitor clicked a
     language, the page they land on is already being translated, and there is
     no second control to find and no dropdown to operate.

     Written at three scopes because which one sticks depends on how the site is
     served. Host-only covers localhost and a bare domain, the explicit host
     covers a subdomain, and the registrable domain covers fawazbhseo.in when
     the request arrives on www. A cookie that fails to stick means a page that
     silently stays English, so all three are set rather than guessed at.
     -------------------------------------------------------------------------- */
  function setPair(value) {
    var host = location.hostname;
    var bits = ['googtrans=' + value, 'path=/'];

    try { document.cookie = bits.join(';'); } catch (e) {}

    if (!host || /^[0-9.]+$/.test(host)) return;   /* an IP takes no domain attribute */

    try { document.cookie = bits.concat('domain=' + host).join(';'); } catch (e) {}

    var parts = host.split('.');
    if (parts.length > 2) {
      var registrable = '.' + parts.slice(-2).join('.');
      try { document.cookie = bits.concat('domain=' + registrable).join(';'); } catch (e) {}
    }
  }

  setPair('/en/' + target);

  /* -------------------------------------------------------------------------
     2. Mount point and status

     The widget needs an element to attach to. It is visually hidden rather
     than absent, because the script errors out if its container is missing,
     and hidden rather than display:none so the script can still measure it.

     Google's own dropdown and top banner are suppressed in CSS. They are a
     grey Material-styled bar that has nothing to do with this site's warm
     neutral palette, and the header already has a language control that does
     the same job in the site's own design.
     -------------------------------------------------------------------------- */
  var mount = document.getElementById('fbhTranslate');
  if (!mount) {
    mount = document.createElement('div');
    mount.id = 'fbhTranslate';
    mount.className = 'notranslate fbh-translate-mount';
    mount.setAttribute('aria-hidden', 'true');
    document.body.appendChild(mount);
  }

  /* A page mid-translation flickers between two languages as the script works
     down the DOM. This class lets the stylesheet settle body text for the
     second or two that takes, without hiding anything: text stays readable and
     selectable throughout, it just does not jump. */
  root.classList.add('is-translating');

  var settled = false;
  function settle() {
    if (settled) return;
    settled = true;
    root.classList.remove('is-translating');
    root.classList.add('is-translated');
  }

  /* The widget gives no completion callback, so completion is observed: it
     wraps every translated run in <font> elements, and the first one appearing
     means text has started landing. A timeout backs that up so the class can
     never get stuck on if translation fails or is blocked. */
  if ('MutationObserver' in window) {
    var seen = new MutationObserver(function () {
      if (document.querySelector('font[style], .translated-ltr, .translated-rtl')) {
        seen.disconnect();
        window.setTimeout(settle, 260);
      }
    });
    seen.observe(document.body, { childList: true, subtree: true });
  }
  window.setTimeout(settle, 4500);

  /* -------------------------------------------------------------------------
     3. Load the widget

     Deferred to idle time. Translation is important but it is not the first
     paint: the page renders in English, in the right layout, with the right
     fonts, and the words change a moment later. Blocking the first paint on a
     third party script to avoid that moment would be a worse trade, and it is
     the trade that wrecks Core Web Vitals.
     -------------------------------------------------------------------------- */
  window.googleTranslateElementInit = function () {
    try {
      new window.google.translate.TranslateElement({
        pageLanguage: 'en',      /* the source is always English, whatever <html lang> says */
        autoDisplay: false       /* no Google banner, no Google dropdown */
      }, 'fbhTranslate');
    } catch (e) {
      settle();
    }
  };

  function load() {
    var s = document.createElement('script');
    s.src = 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
    s.async = true;
    s.onerror = settle;   /* blocked, offline or retired: stay in English rather than hang */
    document.head.appendChild(s);
  }

  if ('requestIdleCallback' in window) window.requestIdleCallback(load, { timeout: 1500 });
  else window.setTimeout(load, 400);

  /* hasFile is read above and kept deliberately: it is the flag that decides
     whether the interface was already translated server side, and the notice
     under the header words itself from the same fact. Referenced here so the
     intent survives a future edit that would otherwise drop the attribute. */
  if (hasFile) root.setAttribute('data-mt-interface', 'server');
})();
