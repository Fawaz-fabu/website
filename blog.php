<?php
/**
 * Blog index.
 *
 * Practical guides with explicit editorial provenance and source links.
 * The existing empty state remains as a fallback if the post list is cleared.
 *
 * TO ADD A POST: append an entry to $posts below and create the matching
 * file. Once $posts is non-empty the grid renders automatically and the
 * empty state disappears. Each entry needs:
 *   title, href, excerpt, category, date (Y-m-d), read (reading time).
 */

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/contact-form.php';
require_once __DIR__ . '/includes/floating-button.php';
require_once __DIR__ . '/includes/footer.php';

/**
 * @var array $posts Guide metadata. Dates describe preparation, not a claimed live release.
 */
$posts = [
    [
        'title' => 'SEO vs AEO vs GEO: what is the difference?',
        'href' => '/blogs/seo-aeo-geo-differences',
        'excerpt' => 'Compare the outcomes, see a practical business example and decide what to improve first. No special-markup shortcuts or ranking promises.',
        'category' => 'Search fundamentals', 'date' => '2026-09-11', 'read' => '7 min read',
    ],
    [
        'title' => 'How to measure AI search visibility',
        'href' => '/blogs/measure-ai-search-visibility',
        'excerpt' => 'A repeatable manual method for separating mentions, linked citations and recommendations. Includes a free blank CSV tracking sheet.',
        'category' => 'AI visibility measurement', 'date' => '2026-09-11', 'read' => '8 min read',
    ],
    [
        'title' => 'A local SEO checklist for Karnataka businesses',
        'href' => '/blogs/local-seo-checklist-karnataka',
        'excerpt' => 'Check business profiles, useful local pages, Kannada and English research, genuine reviews and the route from search to enquiry.',
        'category' => 'Karnataka local SEO', 'date' => '2026-09-11', 'read' => '7 min read',
    ],
];

/* Topic areas the blog will cover. These are section labels, not posts. */
$topics = [
    ['name' => 'Technical SEO',  'note' => 'Site architecture, Core Web Vitals, crawl budget and the fixes that actually move rankings.'],
    ['name' => 'AEO',            'note' => 'How answer engines pick a source, and what makes content quotable rather than merely rankable.'],
    ['name' => 'GEO',            'note' => 'Getting cited inside AI Overviews, ChatGPT, Perplexity, Gemini and Copilot.'],
    ['name' => 'Local SEO',      'note' => 'Google Business Profile, local pack, and what works in tier two Karnataka markets.'],
    ['name' => 'Kodagu and Coorg', 'note' => 'Notes specific to homestays, spice brands and estates searching for customers locally.'],
    ['name' => 'Working solo',   'note' => 'How a one person consultancy runs, prices and reports, written plainly.'],
];

$schema = <<<'JSONLD'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Blog",
      "@id": "https://fawazbhseo.in/blog#blog",
      "url": "https://fawazbhseo.in/blog",
      "name": "Notes on SEO, AEO and GEO",
      "description": "Working notes on search visibility from an independent SEO, AEO and GEO consultant in Kodagu, Karnataka.",
      "author": {"@type": "Organization", "name": "FawazBHSEO", "url": "https://fawazbhseo.in/about"},
      "publisher": {"@type": "Organization", "name": "FawazBHSEO", "url": "https://fawazbhseo.in/"},
      "blogPost": [
        {"@id": "https://fawazbhseo.in/blogs/seo-aeo-geo-differences#article"},
        {"@id": "https://fawazbhseo.in/blogs/measure-ai-search-visibility#article"},
        {"@id": "https://fawazbhseo.in/blogs/local-seo-checklist-karnataka#article"}
      ]
    }
  ]
}
JSONLD;

render_head([
    'title'       => 'Blog, notes on SEO, AEO and GEO from Fawaz BH',
    'description' => 'Practical SEO, AEO, GEO and Karnataka local SEO guides. Compare search approaches, measure AI citations and download a free visibility tracking sheet.',
    'canonical'   => 'https://fawazbhseo.in/blog',
    'robots'      => 'index,follow,max-image-preview:large',
    'schema'      => $schema,
]);

render_header('blog');
?>

<main id="main">

  <!-- HERO -->
  <section class="hero" aria-labelledby="hero-h">
    <div class="wrap hero__grid">

      <div class="hero__lead reveal">
        <p class="eyebrow">Writing</p>
        <h1 id="hero-h">Practical guides to search visibility.</h1>
        <p class="hero__sub">Clear explanations of SEO, AEO and GEO, practical local-search checks, and a repeatable way to measure AI citations. Each guide explains its sources, examples and limits.</p>

        <div class="btn-row">
          <a class="btn btn--accent" href="#posts">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 21a9 9 0 1 0-8.5-6.1L2 22l6.5-1.6A9 9 0 0 0 12 21Z"/></svg>
            Explore the guides
          </a>
        </div>
      </div>

      <dl class="readout reveal">
        <div class="readout__row"><dt>Start here</dt><dd>Three practical guides<small>Comparison, measurement and local SEO</small></dd></div>
        <div class="readout__row"><dt>Editorial</dt><dd>FawazBHSEO<small>AI-assisted guides, with provenance stated</small></dd></div>
        <div class="readout__row"><dt>Topics</dt><dd>SEO, AEO, GEO<small>Plus local and Kodagu notes</small></dd></div>
        <div class="readout__row"><dt>Included</dt><dd>Free tracking sheet<small>No email address or account required</small></dd></div>
      </dl>

    </div>
  </section>

  <!-- TRUST STRIP -->
  <section class="trust" aria-label="Editorial standard">
    <div class="wrap">
      <p>Useful answers. Clear sources. <span class="accent">No invented results or ranking guarantees.</span></p>
    </div>
  </section>

  <!-- POSTS -->
  <section class="section" id="posts" aria-labelledby="posts-h">
    <div class="wrap">

      <?php if (empty($posts)): ?>

        <div class="section-head reveal">
          <p class="eyebrow">The archive</p>
          <h2 id="posts-h">Nothing published yet</h2>
          <p class="lede">This is deliberate rather than an oversight. I would rather launch with nothing than launch with filler. The first pieces are being written now, and they will go up here as they are finished.</p>
        </div>

        <div class="card card--featured reveal">
          <span class="card-index">Empty archive</span>
          <h3>Want to know when the first post goes up?</h3>
          <p>Send me a message and I will tell you directly. No mailing list, no automated sequence, just a note from me when there is something actually worth reading.</p>
          <p style="margin-top:18px">
            <a class="link-arrow" href="https://wa.me/919481084038?text=Hi%20Fawaz%2C%20tell%20me%20when%20you%20publish" target="_blank" rel="noopener">
              Message me on WhatsApp
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
          </p>
        </div>

      <?php else: ?>

        <div class="section-head reveal">
          <p class="eyebrow">The archive</p>
          <h2 id="posts-h">Latest posts</h2>
        </div>

        <div class="grid grid--3">
          <?php foreach ($posts as $post): ?>
          <article class="card card--link reveal">
            <span class="card-index"><?php echo htmlspecialchars($post['category'], ENT_QUOTES, 'UTF-8'); ?></span>
            <h3><a href="<?php echo htmlspecialchars($post['href'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?></a></h3>
            <p><?php echo htmlspecialchars($post['excerpt'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p class="field-note" style="margin-top:16px">
              Prepared <time datetime="<?php echo htmlspecialchars($post['date'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(date('j F Y', strtotime($post['date'])), ENT_QUOTES, 'UTF-8'); ?></time>,
              <?php echo htmlspecialchars($post['read'], ENT_QUOTES, 'UTF-8'); ?>
            </p>
          </article>
          <?php endforeach; ?>
        </div>

      <?php endif; ?>

    </div>
  </section>

  <hr class="rule">

  <!-- TOPICS -->
  <section class="section section--alt" id="topics" aria-labelledby="topics-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Topics covered and planned</p>
        <h2 id="topics-h">The six areas this covers</h2>
        <p class="lede">The archive starts with the three guides above. These wider topics guide future additions; a topic label is not a claim that an article already exists.</p>
      </div>

      <div class="grid grid--3">
        <?php $n = 1; foreach ($topics as $topic): ?>
        <article class="card reveal">
          <span class="card-index"><?php echo str_pad((string) $n, 2, '0', STR_PAD_LEFT); ?></span>
          <h3><?php echo htmlspecialchars($topic['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
          <p><?php echo htmlspecialchars($topic['note'], ENT_QUOTES, 'UTF-8'); ?></p>
        </article>
        <?php $n++; endforeach; ?>
      </div>
    </div>
  </section>

  <?php render_contact_form([
      'heading' => 'Rather just ask me directly?',
      'lede'    => 'If you have a question the blog has not answered yet, send it over. I answer every message myself, and a good question often becomes the next post.',
  ]); ?>

</main>

<?php
render_floating_button();
render_footer();
