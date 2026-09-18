<?php
/**
 * Shared document head plus the opening body tag.
 * Holds the font links, the universal stylesheet, and the pre-paint theme
 * script that prevents a flash of the wrong mode on load.
 */

require_once __DIR__ . '/i18n.php';

if (!function_exists('fbh_reviewed_on')) {
/**
 * Accept only a manually supplied, real YYYY-MM-DD calendar date.
 * Leave reviewed_on null until a review has actually taken place. Never derive
 * an editorial date from the request, file modification time or upload time.
 */
function fbh_reviewed_on($value) {
    if (!is_string($value) || !preg_match('/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/', $value, $parts)) {
        return null;
    }
    return checkdate((int) $parts[2], (int) $parts[3], (int) $parts[1]) ? $value : null;
}

function fbh_review_date_schema($value) {
    $reviewed = fbh_reviewed_on($value);
    return $reviewed === null ? [] : ['dateModified' => $reviewed];
}

function fbh_render_review_date($value) {
    $reviewed = fbh_reviewed_on($value);
    if ($reviewed === null) return;
    $date = DateTimeImmutable::createFromFormat('!Y-m-d', $reviewed);
    printf(
        '<p class="wrap field-note" style="padding-bottom:40px">Written and maintained by Fawaz BH. Last reviewed <time datetime="%s">%s</time>.</p>',
        htmlspecialchars($reviewed, ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($date->format('j F Y'), ENT_QUOTES, 'UTF-8')
    );
}
}

if (!function_exists('render_head')) {

/**
 * @param array $meta title, description, canonical, and optional schema (raw JSON-LD string).
 */
function render_head(array $meta = []) {
    /* A code shaped first path segment that is neither a language nor a real
       page is a 404, not a second copy of the English page. The Apache rule
       cannot read the registry, so this is where that judgement is made, and
       it runs before any output so the 404 can still send headers. */
    fbh_guard_lang_prefix();

    $title       = $meta['title']       ?? 'Fawaz BH, independent SEO, AEO and GEO consultant in India';
    $description = $meta['description'] ?? 'Independent SEO, AEO and GEO consultant based in Kushal Nagar, Kodagu, Karnataka. Ahrefs and Semrush certified. You work with him directly, with no agency layers.';
    $canonical   = $meta['canonical']   ?? 'https://fawazbhseo.in/';
    $robots      = $meta['robots']      ?? 'index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1';
    $schema      = $meta['schema']      ?? '';

    /* MULTILINGUAL. Any language with a translation file is served to any human
       who asks for it. Whether a crawler may index it is a separate question,
       already decided by fbh_available_locales(): a locale is indexable only
       when it is published, past the machine stage and complete enough. So a
       raw AI translation is fully readable and completely absent from search,
       which is the honest arrangement and also the one Google's scaled content
       policy requires.

       'follow' rather than 'none' on purpose. The page is not index-worthy, but
       its links are the normal navigation and should still pass through to the
       English pages that are. */
    $lang   = fbh_lang();
    $locale = fbh_locale();
    if (empty($locale['indexable'])) {
        $robots = 'noindex,follow';
    }

    /* Canonicals are per language. A non-indexable locale points at ITSELF, not
       at the English page. Pointing it at English would contradict the noindex
       and, worse, invite Google to treat the two as one page and pick whichever
       it prefers. A self canonical plus noindex is unambiguous: this URL exists,
       here is its address, do not index it. */
    if (!fbh_is_default_lang()) {
        $canonical = fbh_locale_url($lang, fbh_current_path());
    }

    // The only business location is Kushalnagar, Kodagu. Other markets are
    // service areas, not premises. The owner has not supplied coordinates.
    $geoRegion    = 'IN-KA';
    $geoPlacename = 'Kushalnagar, Kodagu, Karnataka, India';
    $ogType       = $meta['og_type']       ?? 'website';
    ?>
<!DOCTYPE html>
<?php
/* FULL PAGE TRANSLATION. data-mt carries the code the runtime engine needs for
   this language, and it is the single switch that turns the whole thing on:
   assets/js/translate.js reads it and translates the entire document body,
   not just the interface. English pages get "en" and the script exits at once,
   because the English copy is the source and must never be translated.

   data-mt-file says whether a locale file supplied the interface strings. Where
   it did, those strings are already in the target language and are fenced off
   from the engine with translate="no" so they are not translated a second time. */
$mtCode = $locale['mt'] ?? 'en';
$mtFile = !empty($locale['has_file']) && !fbh_is_default_lang();
?>
<html lang="<?php echo htmlspecialchars($lang === 'en' ? 'en-IN' : $lang, ENT_QUOTES, 'UTF-8'); ?>" dir="<?php echo htmlspecialchars($locale['dir'], ENT_QUOTES, 'UTF-8'); ?>" data-theme="light" data-mt="<?php echo htmlspecialchars($mtCode, ENT_QUOTES, 'UTF-8'); ?>" data-mt-file="<?php echo $mtFile ? '1' : '0'; ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">

<title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
<link rel="canonical" href="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="robots" content="<?php echo htmlspecialchars($robots, ENT_QUOTES, 'UTF-8'); ?>">
<?php fbh_render_hreflang(); ?>
<meta name="author" content="Fawaz BH">
<meta name="geo.region" content="<?php echo htmlspecialchars($geoRegion, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="geo.placename" content="<?php echo htmlspecialchars($geoPlacename, ENT_QUOTES, 'UTF-8'); ?>">

<meta property="og:type" content="<?php echo htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:title" content="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:locale" content="<?php echo htmlspecialchars(str_replace('-', '_', $lang === 'en' ? 'en_IN' : $locale['hreflang']), ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:image" content="https://fawazbhseo.in/og-fawazbhseo.webp">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="Fawaz BH, independent SEO, AEO and GEO consultant in India">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@fawazbhseo">
<meta name="twitter:creator" content="@fawazbhseo">
<meta name="twitter:image" content="https://fawazbhseo.in/og-fawazbhseo.webp">

<!-- Single value, because the site defaults to light regardless of OS setting.
     site.js rewrites this when the visitor toggles to dark. -->
<meta name="theme-color" content="#EDE2C8">

<?php
/* The SVG icon is listed first and is 907 bytes against favicon.ico's 269 KB.
   Browsers pick the first format they support, so every modern browser takes
   the SVG and never requests the .ico. The .ico stays only as a fallback for
   old browsers and for crawlers that probe /favicon.ico directly.
   Replacing that .ico with a properly sized 32x32 export is still worth doing;
   it is the single largest static asset on the site after the portrait. */
?>
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="icon" href="/favicon.ico" sizes="32x32">
<link rel="apple-touch-icon" href="/assets/images/fawazbh.webp">

<link rel="preload" href="/assets/fonts/big-shoulders-display-latin-700-normal.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php
/* PERFORMANCE. Big Shoulders Display 700 is self-hosted, declared in the
   shared stylesheet and preloaded above. font-display:optional avoids a late
   heading swap if the font misses the browser's brief initial loading window.
   In that case the existing fallback stays for this navigation, without hiding
   content or forcing a fixed heading height.

   Newsreader italic 400/600 and Inter 400/500/600 retain their existing
   non-blocking Google Fonts loading. Their swap-related shifts still need
   measurement on the real PHP host. The noscript link supports disabled JS. */
?>
<link rel="stylesheet" media="print" onload="this.media='all';this.onload=null"
      href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@1,6..72,400;1,6..72,600&family=Inter:wght@400;500;600&display=swap">
<noscript>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@1,6..72,400;1,6..72,600&family=Inter:wght@400;500;600&display=swap">
</noscript>
<?php
/* Script font, loaded ONLY on the locale that needs it, and resolved from the
   locale's script rather than from a per language setting, so twenty
   Devanagari languages share one font entry instead of twenty.

   Newsreader and Big Shoulders carry no Kannada, Devanagari, Arabic, Thai or
   Ethiopic glyphs, so without this the browser substitutes a system face and
   the typography falls apart. Loading every script on the English page would
   undo the font trimming done for performance, so this is strictly per page.

   fbh_script_font() returns null for Latin, Cyrillic and Greek because Inter
   already covers them, and for CJK because those webfonts run to several
   megabytes. Those cases load nothing and fall back to the stacks in
   site.css. */
if (!empty($locale['font'])):
?>
<link rel="stylesheet" media="print" onload="this.media='all';this.onload=null"
      href="https://fonts.googleapis.com/css2?family=<?php echo htmlspecialchars($locale['font'], ENT_QUOTES, 'UTF-8'); ?>&display=swap">
<noscript>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=<?php echo htmlspecialchars($locale['font'], ENT_QUOTES, 'UTF-8'); ?>&display=swap">
</noscript>
<?php endif; ?>

<?php
/* Cache-busting version string. Browsers and CDNs cache CSS and JS
   aggressively, so a returning visitor can keep being served a stale
   stylesheet after a deploy. That is what makes a newly styled component look
   broken or unstyled on the live site while it renders correctly locally.
   Bump FBH_ASSET_VER whenever site.css or a JS file changes. */
if (!defined('FBH_ASSET_VER')) { define('FBH_ASSET_VER', '20260915-chat-fallback-notice'); }
?>
<link rel="stylesheet" href="/assets/css/site.css?v=<?php echo FBH_ASSET_VER; ?>">

<script>
/* Applied before first paint so the correct mode renders immediately.
   Light is the default for everyone. Dark is used ONLY when the visitor has
   previously chosen it with the toggle, so the OS colour scheme is ignored
   on a first visit by design. */
(function(){try{if(localStorage.getItem('fbh-theme')==='dark'){document.documentElement.setAttribute('data-theme','dark');}}catch(e){}})();
</script>
<?php if ($schema !== ''): ?>
<script type="application/ld+json">
<?php echo $schema; ?>
</script>
<?php endif; ?>
</head>
<body>
<a class="skip-link" href="#main"><?php echo htmlspecialchars(t('a11y.skip'), ENT_QUOTES, 'UTF-8'); ?></a>
<?php fbh_render_lang_offer(); ?>
<?php
}

}
