<?php
/**
 * English-only XML sitemap, served by the existing Apache rewrite at
 * https://fawazbhseo.in/sitemap.xml. Do not create a static sitemap.xml.
 *
 * Editorial dates only: reviewed_on in each page takes precedence, then a
 * manually maintained updated_on or published_on in $editorial_dates below.
 * Missing/invalid dates omit lastmod. File, upload and request times are never
 * used. A review date must represent an actual substantive editorial review,
 * not just checking the page or uploading unchanged files.
 *
 * Page metadata must remain a literal 'YYYY-MM-DD' (single/double quotes) or
 * null: either $reviewed_on = ...; or 'reviewed_on' => ..., in location data.
 * Expressions and ambiguous multiple declarations are deliberately ignored.
 * Page source is tokenised, never included/executed to discover its date.
 *
 * The 32 explicit English entries are independent of translation publication.
 * This file does not change routing, canonical tags or locale configuration.
 */

// Defines the shared calendar-date validator without rendering a page.
require_once __DIR__ . '/includes/head.php';

/** Read only the existing literal metadata contract; never evaluate PHP. */
function fbh_sitemap_reviewed_on($source) {
    $tokens = array_values(array_filter(token_get_all($source), function ($token) {
        return !is_array($token) || !in_array($token[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT], true);
    }));
    $values = [];
    foreach ($tokens as $i => $token) {
        if (!is_array($token)) continue;
        $assignment = $token[0] === T_VARIABLE && $token[1] === '$reviewed_on'
            && ($tokens[$i + 1] ?? null) === '=';
        $key = $token[0] === T_CONSTANT_ENCAPSED_STRING
            && in_array($token[1], ["'reviewed_on'", '"reviewed_on"'], true)
            && is_array($tokens[$i + 1] ?? null)
            && $tokens[$i + 1][0] === T_DOUBLE_ARROW;
        if (!$assignment && !$key) continue;
        $value = $tokens[$i + 2] ?? null;
        $end = $tokens[$i + 3] ?? null;
        $validEnd = $assignment ? $end === ';' : in_array($end, [',', ']', ')'], true);
        $date = null;
        if ($validEnd && is_array($value) && $value[0] === T_CONSTANT_ENCAPSED_STRING
            && preg_match('/^[\'"]([0-9]{4}-[0-9]{2}-[0-9]{2})[\'"]$/', $value[1], $match)) {
            $date = fbh_reviewed_on($match[1]);
        }
        $values[] = $date;
    }
    return count($values) === 1 ? $values[0] : null;
}

function fbh_sitemap_lastmod($source, array $manual = []) {
    return fbh_sitemap_reviewed_on($source)
        ?? fbh_reviewed_on($manual['updated_on'] ?? null)
        ?? fbh_reviewed_on($manual['published_on'] ?? null);
}

/* Optional dates keyed by the exact source filename below (including blogs/).
 * Add only dates you can substantiate, as literal YYYY-MM-DD strings.
 * For example, add an entry of this shape and replace null only with real dates:
 * 'index.php' => ['updated_on' => null, 'published_on' => null],
 * updated_on is the last substantive content update, not the last upload.
 * published_on is the genuine initial publication date, not a draft date.
 * No dates have been supplied; do not infer them from guide preparation dates.
 */
$editorial_dates = [];

// Each entry: extensionless slug, source file, change frequency, priority.
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
header('Content-Type: application/xml; charset=UTF-8');
header('X-Robots-Tag: noindex');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($pages as $p) {
    list($slug, $file, $freq, $priority) = $p;
    $path = __DIR__ . '/' . $file;
    // Do not advertise a page that has been deleted.
    if (!is_file($path)) continue;
    $source = is_readable($path) ? file_get_contents($path) : false;
    $lastmod = fbh_sitemap_lastmod($source === false ? '' : $source, $editorial_dates[$file] ?? []);
    echo "  <url>\n";
    echo '    <loc>' . htmlspecialchars($base . $slug, ENT_QUOTES, 'UTF-8') . "</loc>\n";
    if ($lastmod !== null) {
        echo '    <lastmod>' . $lastmod . "</lastmod>\n";
    }
    echo '    <changefreq>' . $freq . "</changefreq>\n";
    echo '    <priority>' . $priority . "</priority>\n";
    echo "  </url>\n";
}
echo '</urlset>' . "\n";
