<?php
/**
 * Dynamic XML sitemap.
 *
 * Why this exists alongside sitemap.xml: the static file has to be edited by
 * hand every time a page is added, and it had already fallen out of date once
 * (nine location pages existed but were missing from it, so nothing linked or
 * listed them). This version derives the URL list from one PHP array and takes
 * each <lastmod> from the actual file modification time on disk, so it cannot
 * silently drift from reality.
 *
 * Output is XML, so there must be no whitespace or markup before the opening
 * PHP tag above and nothing echoed before the header() call below.
 *
 * To add a page: add one line to $pages. Nothing else needs touching.
 *
 * THIS IS NOW THE ONLY SITEMAP. The static sitemap.xml has been deleted and
 * .htaccess section 2e serves this file at the familiar address:
 *
 *   RewriteRule ^sitemap\.xml$ /sitemap.php [L]
 *
 * So https://fawazbhseo.in/sitemap.xml is what crawlers and Search Console
 * request, and this file is what answers. Do not recreate a static
 * sitemap.xml: a real file on disk would take precedence over the rewrite and
 * silently start serving stale data again.
 *
 * MULTILINGUAL. Each URL carries xhtml:link alternates for every INDEXABLE
 * locale, which is a narrower set than "every locale that exists". A locale
 * qualifies only when it is published, past the machine translation stage, and
 * at least 90 percent complete. See fbh_available_locales().
 *
 * Machine drafts are deliberately absent. They are noindex, and listing a
 * noindex URL in a sitemap is a contradictory signal that wastes crawl budget.
 * More importantly, submitting a few hundred unreviewed machine translated URLs
 * is the textbook shape of scaled content abuse, and this site has only just
 * finished getting its location pages out of "discovered, currently not
 * indexed". The sitemap stays small and every URL in it is a page worth
 * ranking.
 *
 * So the count here grows only as translations are genuinely reviewed. English
 * being the only indexable locale today means this output is byte-for-byte what
 * it was, which is exactly what is wanted while reindexing is still settling.
 * Nothing needs editing here to add a language: review one, mark it published,
 * and its URLs appear.
 */

require_once __DIR__ . '/includes/i18n.php';

/* Each entry: slug (extensionless URL path), source file, changefreq, priority.
   The source file is only used to read its modification time. */
$pages = [
    // Core
    ['',                    'index.php',                      'monthly', '1.0'],
    ['seo-services',        'seo-services.php',               'monthly', '0.9'],
    ['aeo-consultant',      'aeo-consultant.php',             'monthly', '0.9'],
    ['geo-consultant',      'geo-consultant.php',             'monthly', '0.9'],
    ['ai-seo-expert-india', 'ai-seo-expert-india.php',        'monthly', '0.9'],
    ['case-studies',        'case-studies.php',               'monthly', '0.8'],
    ['cities-we-serve',     'cities-we-serve.php',            'monthly', '0.8'],
    ['about',               'about.php',                      'yearly',  '0.7'],
    ['contact',             'contact.php',                    'yearly',  '0.7'],
    ['blog',                'blog.php',                       'weekly',  '0.6'],

    // Editorial guides, distinct informational intent
    ['blogs/seo-aeo-geo-differences', 'blogs/seo-aeo-geo-differences.php', 'monthly', '0.6'],
    ['blogs/measure-ai-search-visibility', 'blogs/measure-ai-search-visibility.php', 'monthly', '0.6'],
    ['blogs/local-seo-checklist-karnataka', 'blogs/local-seo-checklist-karnataka.php', 'monthly', '0.6'],

    // Geographic hubs, closest first
    ['seo-consultant-kodagu',    'seo-consultant-kodagu.php',    'monthly', '0.9'],
    ['seo-consultant-karnataka', 'seo-consultant-karnataka.php', 'monthly', '0.8'],
    ['seo-consultant-india',     'seo-consultant-india.php',     'monthly', '0.8'],

    // Kodagu towns
    ['seo-services-madikeri',    'seo-services-madikeri.php',    'monthly', '0.8'],
    ['seo-services-kushalnagar', 'seo-services-kushalnagar.php', 'monthly', '0.8'],
    ['seo-services-virajpet',    'seo-services-virajpet.php',    'monthly', '0.8'],
    ['seo-services-somwarpet',   'seo-services-somwarpet.php',   'monthly', '0.8'],

    // Karnataka cities
    ['seo-services-bengaluru',        'seo-services-bengaluru.php',        'monthly', '0.8'],
    ['seo-services-mysuru',           'seo-services-mysuru.php',           'monthly', '0.8'],
    ['seo-services-mangaluru',        'seo-services-mangaluru.php',        'monthly', '0.8'],
    ['seo-services-hubballi-dharwad', 'seo-services-hubballi-dharwad.php', 'monthly', '0.8'],

    // South India
    ['seo-services-chennai',    'seo-services-chennai.php',    'monthly', '0.7'],
    ['seo-services-hyderabad',  'seo-services-hyderabad.php',  'monthly', '0.7'],
    ['seo-services-kochi',      'seo-services-kochi.php',      'monthly', '0.7'],
    ['seo-services-coimbatore', 'seo-services-coimbatore.php', 'monthly', '0.7'],

    // Rest of India
    ['seo-services-mumbai',    'seo-services-mumbai.php',    'monthly', '0.7'],
    ['seo-services-pune',      'seo-services-pune.php',      'monthly', '0.7'],
    ['seo-services-delhi-ncr', 'seo-services-delhi-ncr.php', 'monthly', '0.7'],

    // Europe
    ['seo-services-switzerland', 'seo-services-switzerland.php', 'monthly', '0.7'],
];

$base = 'https://fawazbhseo.in/';

/* Only locales that pass the indexing gate. See the header note. */
$published = fbh_indexable_locales();
$multi     = count($published) > 1;

header('Content-Type: application/xml; charset=UTF-8');
header('X-Robots-Tag: noindex');   // the sitemap itself should not be indexed

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
if ($multi) { echo ' xmlns:xhtml="http://www.w3.org/1999/xhtml"'; }
echo '>' . "\n";

foreach ($pages as $p) {
    list($slug, $file, $freq, $priority) = $p;

    /* Skip anything that is not actually on disk, so a deleted page can never
       be advertised to a crawler as a live URL. */
    $path = __DIR__ . '/' . $file;
    if (!is_file($path)) {
        continue;
    }

    $lastmod = gmdate('Y-m-d', filemtime($path));

    /* One <url> per published locale, each listing every locale as an
       alternate. Reciprocal alternates are required: if /kn/x lists /x but /x
       does not list /kn/x, Google ignores the pair. */
    foreach ($published as $code => $meta) {
        $prefix = ($code === 'en') ? '' : $code . '/';
        $loc    = $base . $prefix . $slug;

        echo "  <url>\n";
        echo '    <loc>' . htmlspecialchars($loc, ENT_QUOTES, 'UTF-8') . "</loc>\n";

        if ($multi) {
            foreach ($published as $altCode => $altMeta) {
                $altPrefix = ($altCode === 'en') ? '' : $altCode . '/';
                printf(
                    "    <xhtml:link rel=\"alternate\" hreflang=\"%s\" href=\"%s\"/>\n",
                    htmlspecialchars($altMeta['hreflang'], ENT_QUOTES, 'UTF-8'),
                    htmlspecialchars($base . $altPrefix . $slug, ENT_QUOTES, 'UTF-8')
                );
            }
            printf(
                "    <xhtml:link rel=\"alternate\" hreflang=\"x-default\" href=\"%s\"/>\n",
                htmlspecialchars($base . $slug, ENT_QUOTES, 'UTF-8')
            );
        }

        echo '    <lastmod>' . $lastmod . "</lastmod>\n";
        echo '    <changefreq>' . $freq . "</changefreq>\n";
        echo '    <priority>' . $priority . "</priority>\n";
        echo "  </url>\n";
    }
}

echo '</urlset>' . "\n";
