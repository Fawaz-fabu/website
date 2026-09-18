<?php
/**
 * MULTILINGUAL LAYER.
 *
 * The site is available in every language in the registry, and the WHOLE PAGE
 * is translated, not just the interface. Adding a language is ONE step and it
 * is not a change to this file: add a row to includes/locale-registry.php.
 *
 * A translation file at locales/<code>.php is OPTIONAL. It is an upgrade, not
 * the price of entry: where one exists the interface strings come from it
 * pre-translated and are fenced off from the runtime engine, and once reviewed
 * and published that locale becomes indexable.
 *
 * A LOCALE FILE IS NOT WHAT MAKES A LANGUAGE WORK. Read that twice before
 * changing anything here or in .htaccess. It used to be, and the leftover
 * assumption caused a real outage: .htaccess still gated its language rewrite
 * on locales/<code>.php existing, so after this file began offering all ~103
 * registry languages, the ninety-odd without a file fell through to the
 * extensionless rule, found no /ja.php on disk and returned 404. The switcher
 * offered them and the server refused them. Routing now accepts any code
 * shaped prefix and fbh_guard_lang_prefix() decides, from THIS file's
 * fbh_available_locales(), whether it is real. One source of truth.
 *
 * THE ONE DISTINCTION THAT MATTERS HERE.
 *
 * Two different questions get confused constantly, so they are kept apart on
 * purpose:
 *
 *   AVAILABILITY  can a visitor read the site in this language?
 *                 Yes, for every language in the registry that a machine
 *                 translation exists for. Always, whether or not it has a
 *                 locale file, because the body copy is translated in the
 *                 browser either way.
 *
 *   INDEXABILITY  may Google index this language and may it appear in hreflang
 *                 and the sitemap? Only when it is genuinely finished, which
 *                 now REQUIRES a locale file: a runtime translated page has no
 *                 translated HTML to serve a crawler at all. See
 *                 fbh_available_locales() for the exact gate.
 *
 * Those are separate, and a third thing is separate again: the languages Fawaz
 * personally works in as a consultant. That is fbh_service_languages(), and it
 * is a fact about him, not about the website. A visitor reading this site in
 * Japanese is not a claim that anyone here speaks Japanese, and the interface
 * never implies otherwise.
 *
 * TRANSLATION PROVENANCE has three states, declared per locale:
 *
 *   'machine'   produced by AI translation, nobody has read it yet.
 *               Served on request. Never indexed. Carries a visible notice.
 *   'reviewed'  a machine draft that a person has read and corrected.
 *               Indexable. Carries a softer notice.
 *   'human'     written or fully rewritten by a person in that language.
 *               Indexable. No notice.
 *
 * WHY MACHINE DRAFTS ARE NOT INDEXED. Not modesty, mechanics. Google's spam
 * policy targets scaled content abuse: pages generated in bulk mainly to rank.
 * Publishing a hundred unread machine translations into the index is precisely
 * that pattern, and this site has only just finished digging its location pages
 * out of "discovered, currently not indexed". So machine drafts exist, are
 * reachable, are honest about what they are, and stay out of the index until a
 * person has been through them. Review is a promotion gate for indexing, never
 * a gate on whether a language may exist.
 *
 * ENGLISH IS THE SOURCE. English keeps the unprefixed URLs, it is the canonical
 * target for every non-indexable locale, and every other language falls back to
 * it key by key. A missing translation degrades to readable English rather than
 * an empty button.
 */

require_once __DIR__ . '/locale-registry.php';

/**
 * How complete a translation must be before it is allowed into the index.
 * 0.9 means nine out of ten interface strings are translated. Below that a
 * page is visibly half English, which is a bad search result even if every
 * translated string in it is perfect.
 */
if (!defined('FBH_MIN_COVERAGE')) {
    define('FBH_MIN_COVERAGE', 0.9);
}

if (!function_exists('fbh_locales_dir')) {

function fbh_locales_dir() {
    return dirname(__DIR__) . '/locales';
}

}

if (!function_exists('fbh_service_languages')) {

/**
 * The languages Fawaz personally works in: talks to clients, reads their
 * existing copy, answers the phone. This is a claim about the consultant and
 * has nothing to do with how many languages the website is readable in. Keep
 * the two apart. Never grow this list to match the locale count.
 */
function fbh_service_languages() {
    return ['English', 'Kannada', 'Malayalam', 'Hindi', 'Tamil', 'Telugu'];
}

}

if (!function_exists('fbh_valid_lang_code')) {

/**
 * Shape check for a language code before it is ever used to build a file path.
 * Two or three letters, optional subtag. Nothing else gets near the filesystem.
 */
function fbh_valid_lang_code($code) {
    return (bool) preg_match('/^[A-Za-z]{2,3}(-[A-Za-z0-9]{2,8})?$/', (string) $code);
}

}

if (!function_exists('fbh_canonical_lang_code')) {

/**
 * Match a user supplied code against the registry without caring about case,
 * so /zh-hans, /ZH-Hans and /zh-Hans all resolve to the registry key zh-Hans.
 * Returns the canonical key, or null if the language is not in the registry.
 */
function fbh_canonical_lang_code($code) {
    static $map = null;
    if ($map === null) {
        $map = [];
        foreach (array_keys(fbh_locale_registry()) as $key) {
            $map[strtolower($key)] = $key;
        }
    }
    if (!fbh_valid_lang_code($code)) return null;
    $k = strtolower((string) $code);
    return $map[$k] ?? null;
}

}

if (!function_exists('fbh_mt_code')) {

/**
 * The code the runtime translation engine needs for this language.
 *
 * Registry codes are chosen for hreflang, which is not always what a machine
 * translation service calls the same language. Only the genuine mismatches are
 * listed; everything else falls through to its base subtag, so a new registry
 * row needs no entry here.
 *
 * A null means no machine translation exists for that language at all. Such a
 * language is only offered once a real translation file is written for it,
 * because offering it otherwise would serve an English page under a Tulu label.
 */
function fbh_mt_code($code) {
    static $map = [
        'zh-Hans' => 'zh-CN',
        'zh-Hant' => 'zh-TW',
        'pt-BR'   => 'pt',
        'de-CH'   => 'de',
        'he'      => 'iw',    // the service still uses the legacy Hebrew code
        'fil'     => 'tl',
        'nb'      => 'no',
        'tcy'     => null,    // no machine translation exists for Tulu
        'bo'      => null,    // nor for Tibetan
    ];

    $code = (string) $code;
    if (array_key_exists($code, $map)) return $map[$code];

    $parts = explode('-', strtolower($code));
    return $parts[0] !== '' ? $parts[0] : null;
}

}

if (!function_exists('fbh_mt_attr')) {

/**
 * Prints translate="no" on interface text that the server already translated.
 *
 * The runtime engine translates from English. Handing it a string that is
 * already Kannada would send Kannada through an English to Kannada pass, which
 * is how good text gets turned into nonsense. So anything coming out of t() on
 * a locale that has a real translation file is marked off limits, and the
 * engine leaves it exactly as the locale file wrote it.
 *
 * Empty for English, because there is nothing to translate on an English page,
 * and empty for a locale with no file, because there t() returned English and
 * the engine is the only thing that will ever translate it.
 */
function fbh_mt_attr() {
    if (fbh_is_default_lang()) return '';
    $loc = fbh_locale();
    return !empty($loc['has_file']) ? ' translate="no"' : '';
}

}

if (!function_exists('fbh_guard_lang_prefix')) {

/**
 * A code shaped first segment that is not a language and not a page is a 404.
 *
 * The Apache rule that powers /de/about cannot read the registry, so it accepts
 * any short prefix and leaves the judgement to PHP. Without this guard
 * /xx/about would quietly serve the English about page at a second URL, which
 * is duplicate content generated by a typo.
 *
 * The two early returns matter as much as the 404. A real page whose name
 * happens to be code shaped, /seo-services being the live example, must never
 * be mistaken for a language prefix.
 */
function fbh_guard_lang_prefix() {
    /* 404.php renders through render_head() like every other page, so it calls
       this function too, on the same unchanged request URI. Without this latch
       the guard would fire again inside its own error page and recurse until
       PHP ran out of memory. It runs once per request, and the second call is
       the error page rendering itself, which must be allowed through. */
    static $ran = false;
    if ($ran) return;
    $ran = true;

    $uri = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    $seg = strtok(ltrim($uri, '/'), '/');
    if ($seg === false || $seg === '') return;

    $seg = preg_replace('#\.php$#', '', $seg);
    if (!fbh_valid_lang_code($seg)) return;                            // not code shaped
    if (is_file(dirname(__DIR__) . '/' . $seg . '.php')) return;       // a real page

    /* AVAILABLE, not merely present in the registry. Those are different sets
       and the difference is load bearing. Tulu and Tibetan have registry rows
       but no machine translation, so fbh_available_locales() drops them and the
       switcher never offers them. Checking the registry here instead would let
       /tcy/about through, where fbh_lang() would fall back to English and serve
       the English page at a second URL. That is duplicate content, which is
       the exact problem this guard exists to prevent. */
    $canon = fbh_canonical_lang_code($seg);
    if ($canon !== null && isset(fbh_available_locales()[$canon])) return;   // a real language

    http_response_code(404);
    $page = dirname(__DIR__) . '/404.php';
    if (is_file($page)) { include $page; }
    exit;
}

}

if (!function_exists('fbh_load_locale')) {

/**
 * Load one translation file, or return null if there is not one.
 *
 * A locale file returns an array with two keys:
 *   'meta'    => ['provenance' => 'machine'|'reviewed'|'human',
 *                 'published'  => bool,
 *                 'reviewer'   => optional free text credit,
 *                 'updated'    => optional YYYY-MM-DD]
 *   'strings' => ['nav.home' => '...', ...]
 *
 * A malformed or missing file returns null and the site carries on in English.
 * A translation file must never be able to take a page down.
 */
function fbh_load_locale($code) {
    static $cache = [];

    $key = (string) $code;
    if (array_key_exists($key, $cache)) return $cache[$key];

    $canon = fbh_canonical_lang_code($key);
    if ($canon === null) return $cache[$key] = null;

    $file = fbh_locales_dir() . '/' . $canon . '.php';
    if (!is_file($file)) return $cache[$key] = null;

    $data = include $file;
    if (!is_array($data) || empty($data['strings']) || !is_array($data['strings'])) {
        return $cache[$key] = null;
    }

    $meta = isset($data['meta']) && is_array($data['meta']) ? $data['meta'] : [];
    $prov = isset($meta['provenance']) ? (string) $meta['provenance'] : 'machine';
    if (!in_array($prov, ['machine', 'reviewed', 'human'], true)) $prov = 'machine';

    $cache[$key] = [
        'provenance' => $prov,
        'published'  => !empty($meta['published']),
        'reviewer'   => isset($meta['reviewer']) ? (string) $meta['reviewer'] : '',
        'updated'    => isset($meta['updated'])  ? (string) $meta['updated']  : '',
        'strings'    => $data['strings'],
    ];
    return $cache[$key];
}

}

if (!function_exists('fbh_available_locales')) {

/**
 * Every language the site can actually be read in right now.
 *
 * WHICH IS NOW EVERY LANGUAGE IN THE REGISTRY, not just the ones with a
 * translation file. That is the change: a visitor picks any language in the
 * switcher and the whole page arrives in it, body copy included, because
 * assets/js/i18n.js translates the document at runtime. A locale file is no
 * longer the price of entry, it is an upgrade: where one exists the interface
 * comes out of it pre-translated and is fenced off from the runtime engine.
 *
 * So there are three tiers, and every one of them is fully readable:
 *   file + reviewed   interface from the file, body translated at runtime,
 *                     indexable
 *   file + machine    same, not indexable
 *   no file           whole page translated at runtime, not indexable
 *
 * The only rows dropped are those with no machine translation available at all
 * (fbh_mt_code() returns null). Listing those would put a language in the menu
 * that quietly serves English, which is worse than not listing it.
 *
 * Each entry carries flags that are not interchangeable:
 *   has_file   is there a locale file, so is the interface pre-translated
 *   mt         the code the runtime engine needs
 *   indexable  file AND published AND past machine AND complete enough
 *
 * Iteration order follows the registry, which is ordered by market priority:
 * English, then Kodagu and Karnataka, then the rest of India, then Europe and
 * outward. So the switcher lists languages in a useful order for free.
 */
function fbh_available_locales() {
    static $out = null;
    if ($out !== null) return $out;

    $base  = fbh_base_strings();
    $total = max(1, count($base));
    $out   = [];

    foreach (fbh_locale_registry() as $code => $row) {
        list($native, $english, $hreflang, $script, $dir) = $row;

        if ($code === 'en') {
            $out['en'] = [
                'code'       => 'en',
                'native'     => $native,
                'english'    => $english,
                'hreflang'   => $hreflang,
                'script'     => $script,
                'dir'        => $dir,
                'font'       => fbh_script_font($script),
                'provenance' => 'human',
                'published'  => true,
                'reviewer'   => '',
                'updated'    => '',
                'coverage'   => 1.0,
                'indexable'  => true,
                'source'     => true,
                'has_file'   => true,
                'mt'         => 'en',
            ];
            continue;
        }

        $mt = fbh_mt_code($code);
        if ($mt === null) continue;   // nothing can translate it, so do not offer it

        $loc      = fbh_load_locale($code);
        $coverage = 0.0;

        if ($loc !== null) {
            $done = 0;
            foreach ($base as $k => $_) {
                if (isset($loc['strings'][$k]) && trim((string) $loc['strings'][$k]) !== '') $done++;
            }
            $coverage = round($done / $total, 3);
        }

        $out[$code] = [
            'code'       => $code,
            'native'     => $native,
            'english'    => $english,
            'hreflang'   => $hreflang,
            'script'     => $script,
            'dir'        => $dir,
            'font'       => fbh_script_font($script),
            'provenance' => $loc === null ? 'machine' : $loc['provenance'],
            'published'  => $loc === null ? false    : $loc['published'],
            'reviewer'   => $loc === null ? ''       : $loc['reviewer'],
            'updated'    => $loc === null ? ''       : $loc['updated'],
            'coverage'   => $coverage,

            /* The indexing gate. All four conditions, no exceptions.
               file        a runtime translated page has no translated HTML to
                           serve a crawler, so it can never be a search result
               published   someone decided this is ready to be a public face
               provenance  an unread machine draft is never a search result
               coverage    a half English page is a bad search result       */
            'indexable'  => $loc !== null
                            && $loc['published']
                            && $loc['provenance'] !== 'machine'
                            && $coverage >= FBH_MIN_COVERAGE,

            'source'     => false,
            'has_file'   => $loc !== null,
            'mt'         => $mt,
        ];
    }

    return $out;
}

}

if (!function_exists('fbh_indexable_locales')) {

/**
 * The subset Google is allowed to see as separate pages. This is what feeds
 * hreflang and the sitemap. Everything else is reachable but noindex.
 */
function fbh_indexable_locales() {
    $out = [];
    foreach (fbh_available_locales() as $code => $loc) {
        if (!empty($loc['indexable'])) $out[$code] = $loc;
    }
    return $out;
}

}

if (!function_exists('fbh_lang')) {

/**
 * The active language code.
 *
 * Set by the .htaccess prefix rule as FBH_LANG. REDIRECT_FBH_LANG is checked
 * too because Apache renames the variable after an internal rewrite, and
 * ?lang= is honoured last for hosts that strip environment variables. Anything
 * unrecognised, or a language with no translation file, falls back to English
 * rather than erroring.
 */
function fbh_lang() {
    static $lang = null;
    if ($lang !== null) return $lang;

    $raw = '';
    foreach (['FBH_LANG', 'REDIRECT_FBH_LANG'] as $k) {
        if (!empty($_SERVER[$k])) { $raw = $_SERVER[$k]; break; }
    }
    if ($raw === '') {
        $env = getenv('FBH_LANG');
        if ($env !== false && $env !== '') $raw = $env;
    }
    if ($raw === '' && !empty($_GET['lang'])) $raw = $_GET['lang'];

    $canon = fbh_canonical_lang_code(substr((string) $raw, 0, 12));
    if ($canon === null || !isset(fbh_available_locales()[$canon])) {
        return $lang = 'en';
    }
    return $lang = $canon;
}

}

if (!function_exists('fbh_locale')) {

/**
 * The full record for the active language. Always returns something usable,
 * because head.php and header.php read fields off it unconditionally.
 */
function fbh_locale() {
    $all = fbh_available_locales();
    return $all[fbh_lang()] ?? $all['en'];
}

}

if (!function_exists('fbh_is_default_lang')) {

function fbh_is_default_lang() { return fbh_lang() === 'en'; }

}

if (!function_exists('fbh_is_rtl')) {

function fbh_is_rtl() {
    $loc = fbh_locale();
    return isset($loc['dir']) && $loc['dir'] === 'rtl';
}

}

if (!function_exists('fbh_base_strings')) {

/**
 * ENGLISH SOURCE STRINGS. The authoritative set.
 *
 * Every key here is what a translation file is measured against, so this array
 * defines both the vocabulary and the coverage denominator. Add a key here
 * first, in English, then translate it. Never add a key that only exists in a
 * translation: it would be invisible to the fallback and to coverage.
 *
 * Interface only. Page bodies are not in here. A translated navigation over an
 * English article is honest and useful; a machine translated 1,200 word article
 * presented as Fawaz's own writing is not, and the human first rule for this
 * site's copy is not negotiable.
 */
function fbh_base_strings() {
    static $s = null;
    if ($s !== null) return $s;

    $s = [
        'nav.home'        => 'Home',
        'nav.services'    => 'Services',
        'nav.aiseo'       => 'AI SEO',
        'nav.cities'      => 'Cities',
        'nav.cases'       => 'Case Studies',
        'nav.blog'        => 'Blog',
        'nav.about'       => 'About',
        'nav.contact'     => 'Contact',
        'cta.audit'       => 'Free audit',
        'cta.auditlong'   => 'Request a free audit',
        'a11y.skip'       => 'Skip to content',
        'lang.label'      => 'Language',
        'lang.choose'     => 'Choose a language',
        'lang.search'     => 'Search languages',
        'lang.none'       => 'No language matches that.',
        'lang.machine'    => 'This page was translated from English by machine and has not been checked by a person yet. Some wording will read oddly. The English original is the authoritative version.',
        'lang.reviewed'   => 'This page was translated from English and checked by a person. Where the two differ, the English original is authoritative.',
        'lang.readsource' => 'Read the English original',
        'lang.servicenote' => 'You can read this site in many languages. Consulting itself is delivered in English, Kannada, Malayalam, Hindi, Tamil and Telugu.',
        'offer.text'      => 'This site is also available in your language.',
        'offer.switch'    => 'Switch',
        'offer.dismiss'   => 'No thanks',
    ];
    return $s;
}

}

if (!function_exists('fbh_strings')) {

/**
 * The active language's strings merged over English, so a lookup can never
 * miss. Kept as a function because head.php calls t() before anything else has
 * initialised.
 */
function fbh_strings() {
    static $merged = null;
    if ($merged !== null) return $merged;

    $base = fbh_base_strings();
    $lang = fbh_lang();
    if ($lang === 'en') return $merged = $base;

    $loc = fbh_load_locale($lang);
    if ($loc === null) return $merged = $base;

    $out = $base;
    foreach ($base as $k => $_) {
        if (isset($loc['strings'][$k]) && trim((string) $loc['strings'][$k]) !== '') {
            $out[$k] = (string) $loc['strings'][$k];
        }
    }
    return $merged = $out;
}

}

if (!function_exists('t')) {

/**
 * Translate one interface key. Falls back to English, then to the key itself so
 * a typo is visible in testing rather than silently blank. Returns raw text:
 * escape at the point of output, as everywhere else in this codebase.
 */
function t($key) {
    $s = fbh_strings();
    if (isset($s[$key])) return $s[$key];
    $base = fbh_base_strings();
    return $base[$key] ?? $key;
}

}

if (!function_exists('fbh_current_path')) {

/**
 * The request path with any language prefix, .php extension and query string
 * removed, always with a single leading slash. This is the key that lets one
 * page work out its own address in every other language.
 *
 * The prefix pattern is built from the registry rather than hardcoded, so a new
 * language never needs this function edited.
 */
function fbh_current_path() {
    static $p = null;
    if ($p !== null) return $p;

    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    $uri = (string) parse_url($uri, PHP_URL_PATH);
    $uri = preg_replace('#\.php$#', '', $uri);

    $codes = array_map('preg_quote', array_keys(fbh_locale_registry()));
    $uri   = preg_replace('#^/(' . implode('|', $codes) . ')(?=/|$)#i', '', $uri);

    $uri = '/' . ltrim((string) $uri, '/');
    $p   = rtrim($uri, '/');
    if ($p === '') $p = '/';
    return $p;
}

}

if (!function_exists('fbh_locale_path')) {

/**
 * Root relative path for a given path in a given language. English keeps the
 * clean unprefixed path, because it is the source language and those are the
 * URLs already indexed and ranking. Do not change that.
 */
function fbh_locale_path($lang, $path = null) {
    $path = $path ?? fbh_current_path();
    $path = '/' . ltrim((string) $path, '/');
    if ($path === '/') $path = '';
    $prefix = ($lang === 'en') ? '' : '/' . $lang;
    return $prefix . ($path === '' ? '/' : $path);
}

}

if (!function_exists('fbh_locale_url')) {

function fbh_locale_url($lang, $path = null) {
    return 'https://fawazbhseo.in' . fbh_locale_path($lang, $path);
}

}

if (!function_exists('fbh_link')) {

/**
 * Prefix an internal link with the active language. Use this for every
 * hand written internal href so that a visitor reading in Polish stays in
 * Polish when they click through.
 */
function fbh_link($path) {
    return fbh_locale_path(fbh_lang(), $path);
}

}

if (!function_exists('fbh_render_hreflang')) {

/**
 * The hreflang set.
 *
 * Only indexable locales appear. Google is never pointed at an unread machine
 * draft or a half translated page, which is the whole reason the indexable flag
 * exists. If English is the only thing that qualifies, no alternates are
 * emitted at all: a single element hreflang set is noise, and x-default on a
 * page with no alternates says nothing.
 */
function fbh_render_hreflang() {
    $set = fbh_indexable_locales();
    if (count($set) < 2) return;

    $path = fbh_current_path();
    foreach ($set as $code => $loc) {
        printf(
            "<link rel=\"alternate\" hreflang=\"%s\" href=\"%s\">\n",
            htmlspecialchars($loc['hreflang'], ENT_QUOTES, 'UTF-8'),
            htmlspecialchars(fbh_locale_url($code, $path), ENT_QUOTES, 'UTF-8')
        );
    }
    printf(
        "<link rel=\"alternate\" hreflang=\"x-default\" href=\"%s\">\n",
        htmlspecialchars(fbh_locale_url('en', $path), ENT_QUOTES, 'UTF-8')
    );
}

}

if (!function_exists('fbh_render_lang_switcher')) {

/**
 * The language control in the header.
 *
 * A plain <details> holding real links. No JavaScript required, keyboard
 * operable for free, and every translation is a crawlable href rather than a JS
 * route. Once the list passes eight entries a search field appears above it and
 * i18n.js filters the items; without JavaScript the field is hidden and the
 * full list is still there to scroll. That is what makes this scale to a
 * hundred languages without becoming a different component.
 *
 * Machine drafts are listed with an "AI" badge rather than hidden. A visitor who
 * wants a rough Vietnamese version should be able to get one and should know
 * exactly what they are getting.
 */
function fbh_render_lang_switcher() {
    $locales = fbh_available_locales();
    if (count($locales) < 2) return;   // nothing to switch to yet

    $current = fbh_lang();
    $path    = fbh_current_path();
    $big     = count($locales) > 8;
    ?>
    <details class="lang-switch" id="langSwitch">
      <summary class="lang-switch__btn" aria-label="<?php echo htmlspecialchars(t('lang.choose'), ENT_QUOTES, 'UTF-8'); ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true" focusable="false">
          <circle cx="12" cy="12" r="9"/>
          <path d="M3 12h18M12 3c2.6 3 2.6 15 0 18M12 3c-2.6 3-2.6 15 0 18"/>
        </svg>
        <span class="lang-switch__code notranslate" translate="no"><?php echo htmlspecialchars(strtoupper($current), ENT_QUOTES, 'UTF-8'); ?></span>
      </summary>
      <div class="lang-switch__menu" role="group" aria-label="<?php echo htmlspecialchars(t('lang.label'), ENT_QUOTES, 'UTF-8'); ?>">
        <?php if ($big): ?>
        <div class="lang-switch__find" hidden data-lang-find>
          <label class="visually-hidden" for="langFilter"><?php echo htmlspecialchars(t('lang.search'), ENT_QUOTES, 'UTF-8'); ?></label>
          <input class="lang-switch__input" id="langFilter" type="search" autocomplete="off"
                 placeholder="<?php echo htmlspecialchars(t('lang.search'), ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <?php endif; ?>
        <div class="lang-switch__list<?php echo $big ? ' is-long' : ''; ?>" data-lang-list>
        <?php foreach ($locales as $code => $loc):
            $machine = ($loc['provenance'] === 'machine');
            $search  = strtolower($loc['native'] . ' ' . $loc['english'] . ' ' . $code);
        ?>
          <?php
          /* CRAWL BUDGET, AND THIS rel="nofollow" IS LOAD BEARING.
             Read this before removing it.

             This menu appears on all 31 pages. It now holds ~103 languages
             instead of 10, so it emits ~103 crawlable links per page. That is
             roughly 3,200 internal links pointing at URLs which are every one
             of them noindex, because a runtime translated page has no
             translated HTML for a crawler to read.

             Left followable, Googlebot would spend this site's entire crawl
             allowance fetching ~3,200 machine translated duplicates of 31 real
             pages, discovering noindex on arrival, and finding nothing worth
             keeping. On a site that only just clawed its location pages out of
             "discovered, currently not indexed", that is the single most
             expensive thing on the page.

             nofollow on the NON-INDEXABLE locales only. A reviewed, published
             translation is a real page that should be crawled and should
             receive internal link equity, so it keeps a normal followable
             link. Today that is English alone, which is why English is the
             only entry here without nofollow.

             This costs a visitor nothing: the links still work, still resolve,
             still carry hreflang and lang for assistive tech. It is purely an
             instruction to crawlers about where not to spend time. */
          $followable = !empty($loc['indexable']);
          ?>
          <a class="lang-switch__item<?php echo $code === $current ? ' is-current' : ''; ?>"
             href="<?php echo htmlspecialchars(fbh_locale_path($code, $path), ENT_QUOTES, 'UTF-8'); ?>"
             hreflang="<?php echo htmlspecialchars($loc['hreflang'], ENT_QUOTES, 'UTF-8'); ?>"
             lang="<?php echo htmlspecialchars($code, ENT_QUOTES, 'UTF-8'); ?>"
             dir="<?php echo htmlspecialchars($loc['dir'], ENT_QUOTES, 'UTF-8'); ?>"
             data-lang="<?php echo htmlspecialchars($code, ENT_QUOTES, 'UTF-8'); ?>"
             data-search="<?php echo htmlspecialchars($search, ENT_QUOTES, 'UTF-8'); ?>"<?php
             echo $followable ? '' : ' rel="nofollow"'; ?>
             <?php echo $code === $current ? ' aria-current="true"' : ''; ?>>
            <?php
            /* Language names are never translated. A menu that renders every
               language name in the language you are already reading defeats
               the point of the menu: a Kannada speaker looks for the word
               ಕನ್ನಡ, not for the German page's translation of "Kannada". */
            ?>
            <span class="lang-switch__label notranslate" translate="no">
              <span class="lang-switch__native"><?php echo htmlspecialchars($loc['native'], ENT_QUOTES, 'UTF-8'); ?></span>
              <span class="lang-switch__english"><?php echo htmlspecialchars($loc['english'], ENT_QUOTES, 'UTF-8'); ?></span>
            </span>
            <?php if ($machine): ?>
            <span class="lang-switch__badge" title="<?php echo htmlspecialchars(t('lang.machine'), ENT_QUOTES, 'UTF-8'); ?>">AI</span>
            <?php endif; ?>
          </a>
        <?php endforeach; ?>
        </div>
        <p class="lang-switch__empty" hidden data-lang-empty><?php echo htmlspecialchars(t('lang.none'), ENT_QUOTES, 'UTF-8'); ?></p>
      </div>
    </details>
    <?php
}

}

if (!function_exists('fbh_render_translation_notice')) {

/**
 * The provenance notice under the header.
 *
 * Nothing at all for English or a genuinely human written locale. A short line
 * for a reviewed translation. A plain warning for a machine draft. Every
 * version links back to the English original, because that is the version that
 * is actually correct and a reader deserves one click to reach it.
 *
 * This is the honesty mechanism for the whole multilingual system. It is what
 * makes it safe to offer a hundred languages: the site never pretends a machine
 * draft is Fawaz's own writing, and it never pretends he reviewed a language he
 * cannot read.
 */
function fbh_render_translation_notice() {
    $loc = fbh_locale();
    if ($loc['code'] === 'en' || $loc['provenance'] === 'human') return;

    /* Machine covers both cases that need the plain warning: an unreviewed
       locale file, and a language with no file at all whose body copy is being
       translated in the browser as the visitor reads it. Both are machine
       translation and both say so in the same words. */
    $machine = ($loc['provenance'] === 'machine');
    $text    = $machine ? t('lang.machine') : t('lang.reviewed');
    $href    = fbh_locale_path('en', fbh_current_path());
    ?>
    <div class="translation-note<?php echo $machine ? ' translation-note--machine' : ''; ?>" role="note"<?php echo fbh_mt_attr(); ?>>
      <div class="wrap translation-note__inner">
        <span class="translation-note__tag notranslate" translate="no"><?php echo $machine ? 'AI' : 'i'; ?></span>
        <p class="translation-note__text">
          <?php echo htmlspecialchars($text, ENT_QUOTES, 'UTF-8'); ?>
          <a class="translation-note__link" href="<?php echo htmlspecialchars($href, ENT_QUOTES, 'UTF-8'); ?>" hreflang="en" lang="en" dir="ltr"><?php echo htmlspecialchars(t('lang.readsource'), ENT_QUOTES, 'UTF-8'); ?></a>
        </p>
      </div>
    </div>
    <?php
}

}

if (!function_exists('fbh_render_lang_offer')) {

/**
 * The region aware offer bar. Rendered empty and filled by i18n.js only when
 * the visitor's browser language differs from the page they landed on and a
 * translation for it actually exists.
 *
 * data-locales carries the available set as JSON so the script does not need a
 * second copy of the language list. It is an offer, never a redirect: auto
 * redirecting by region hides content from crawlers, breaks shared links, and
 * annoys the many people in India who would rather read English anyway.
 *
 * The bar's own three strings travel in the payload per language, because a bar
 * written in English is useless to exactly the person it is meant to help. The
 * server has every locale file already, so it sends the copy rather than making
 * the script carry a duplicate of it.
 */
function fbh_render_lang_offer() {
    $base    = fbh_base_strings();
    $payload = [];

    /* PAYLOAD SIZE MATTERS NOW, AND IT DID NOT BEFORE.
       This used to run over ten locales. It now runs over every language in
       the registry, so anything sent per language is sent a hundred times, on
       every page, inside an HTML attribute where each quote costs six
       characters as &quot;. Left as it was, that was roughly 20 KB of
       attribute on a site whose performance budget was hard won.

       Two cuts, both safe because they remove only waste:

       1. native and english are gone. The script never read them. It builds
          the bar from text, go and no, and identifies the language by code.
       2. The offer copy is sent ONLY where a locale file actually translated
          it. Ninety-odd languages have no file, so they all fell back to the
          same English sentence, which was then serialised ninety-odd times.
          Those now send no copy at all and the script falls back to the one
          shared default already on the element as data-text, data-switch and
          data-dismiss. One copy instead of ninety. */
    foreach (fbh_available_locales() as $code => $loc) {
        if ($code === 'en') continue;

        $file = fbh_load_locale($code);

        /* Returns the locale file's own string, or null when there is not one,
           which is the signal to the script to use the shared default. */
        $pick = function ($key) use ($file) {
            if ($file && isset($file['strings'][$key]) && trim((string) $file['strings'][$key]) !== '') {
                return (string) $file['strings'][$key];
            }
            return null;
        };

        $entry = [
            'code' => $code,
            'href' => fbh_locale_path($code, fbh_current_path()),
        ];

        /* Only non-default values travel. dir is ltr for the large majority,
           and ai is true for the large majority, so both are sent only when
           they differ from that. */
        if ($loc['dir'] !== 'ltr')                 $entry['dir'] = $loc['dir'];
        if ($loc['provenance'] !== 'machine')      $entry['ai']  = false;

        $text = $pick('offer.text');
        $go   = $pick('offer.switch');
        $no   = $pick('offer.dismiss');
        if ($text !== null) $entry['text'] = $text;
        if ($go   !== null) $entry['go']   = $go;
        if ($no   !== null) $entry['no']   = $no;

        $payload[] = $entry;
    }
    if (!$payload) return;

    $json = json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    ?>
    <aside class="lang-offer" id="langOffer" hidden
           data-text="<?php echo htmlspecialchars($base['offer.text'], ENT_QUOTES, 'UTF-8'); ?>"
           data-switch="<?php echo htmlspecialchars($base['offer.switch'], ENT_QUOTES, 'UTF-8'); ?>"
           data-dismiss="<?php echo htmlspecialchars($base['offer.dismiss'], ENT_QUOTES, 'UTF-8'); ?>"
           data-locales="<?php echo htmlspecialchars($json, ENT_QUOTES, 'UTF-8'); ?>"
           aria-live="polite"></aside>
    <?php
}

}
