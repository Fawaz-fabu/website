<?php
/**
 * Shared renderer for location landing pages.
 *
 * Every city page is a thin data file that builds one $loc array and calls
 * render_location_page($loc). This keeps 30 plus pages consistent without
 * duplicating 500 lines of markup each time, and means a design change is a
 * one-file edit rather than a 30-file sweep.
 *
 * IMPORTANT ON THIN CONTENT: Google treats near-duplicate location pages as
 * doorway pages. Every $loc must carry genuinely city-specific material in
 * 'intro', 'market', 'sectors' and 'faqs'. The shared parts are only the
 * chrome, the process and the credentials, which are legitimately identical
 * because they describe one consultant's actual working method.
 *
 * REQUIRED KEYS
 *   slug          string  URL path without extension or leading slash
 *   city          string  Display name, e.g. "Mysuru"
 *   region        string  e.g. "Karnataka" or "Tamil Nadu"
 *   country       string  e.g. "India"
 *   h1            string  Page H1
 *   title         string  <title>
 *   description   string  Meta description
 *   sub           string  Hero standfirst
 *   intro         array   Paragraphs of HTML, city-specific
 *   market        array   [ [heading, body], ... ] what makes this market different
 *   sectors       array   [ [name, body], ... ] industries served here
 *   faqs          array   [ ['q'=>..,'a'=>[..],'open'=>bool], ... ]
 *
 * OPTIONAL KEYS
 *   breadcrumbs   array   [ [label, href|null], ... ] defaults to Home / city
 *   parent        array   [href, text] link up to the region page
 *   siblings      array   [ [href, text], ... ] nearby city pages
 *   readout       array   [ [label, value, note], ... ] hero definition list
 *   languages     array   Languages used in keyword research here
 *   places        array   Neighbourhoods or nearby towns, rendered as tags
 *   distance      string  Honest note on travel and on-site availability
 *   trust         string  Trust strip line, city-specific
 *   reviewed_on   string|null  Real editorial review date in YYYY-MM-DD form.
 *                 Leave null until reviewed. Add a real date in the existing
 *                 location page data after reviewing it; never use filemtime,
 *                 the upload date or today's date as an automatic fallback.
 *                 Missing/invalid values emit no review line or dateModified.
 *   local_seo     bool    False for remote-only markets, changes the copy
 *   nav_active    string  Which nav item to highlight, defaults to 'cities'
 */

require_once __DIR__ . '/head.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/contact-form.php';
require_once __DIR__ . '/floating-button.php';
require_once __DIR__ . '/footer.php';

if (!function_exists('fbh_location_schema')) {

/**
 * Builds the JSON-LD graph for a location page.
 */
function fbh_location_schema(array $loc) {
    $base = 'https://fawazbhseo.in/';
    $url  = $base . $loc['slug'];

    $faq_ld = [];
    foreach ($loc['faqs'] as $f) {
        $plain = trim(html_entity_decode(strip_tags(implode(' ', $f['a'])), ENT_QUOTES, 'UTF-8'));
        $faq_ld[] = [
            '@type' => 'Question',
            'name'  => html_entity_decode($f['q'], ENT_QUOTES, 'UTF-8'),
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $plain],
        ];
    }

    // Breadcrumb trail, built from the same data the visible nav uses.
    $crumbs = [['Home', $base]];
    if (!empty($loc['parent'])) {
        $crumbs[] = [$loc['parent'][1], $base . ltrim($loc['parent'][0], '/')];
    }
    $crumbs[] = [$loc['city'], $url];

    $crumb_ld = [];
    foreach ($crumbs as $i => $c) {
        $crumb_ld[] = [
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => html_entity_decode($c[0], ENT_QUOTES, 'UTF-8'),
            'item'     => $c[1],
        ];
    }

    $areaServed = [$loc['city']];
    if (!empty($loc['places'])) {
        foreach ($loc['places'] as $p) {
            $areaServed[] = html_entity_decode($p, ENT_QUOTES, 'UTF-8');
        }
    }
    $areaServed[] = $loc['region'];

    // One practice at the owner-confirmed location, not one branch per market.
    // PostalAddress has no district field: locality includes Kushalnagar and Kodagu.
    $practice = [
        '@type'      => 'ProfessionalService',
        '@id'        => $base . '#practice',
        'name'       => 'FawazBHSEO',
        'founder'    => ['@id' => $base . '#fawaz'],
        'url'        => $base,
        'telephone'  => '+91-94810-84038',
        'email'      => ['fawazbhseo@gmail.com', 'admin@fawazbhseo.in'],
        'address'    => [
            '@type'           => 'PostalAddress',
            'addressLocality' => 'Kushalnagar, Kodagu',
            'addressRegion'   => 'Karnataka',
            'postalCode'      => '571234',
            'addressCountry'  => 'IN',
        ],
    ];
    $service = [
        '@type'      => 'Service',
        '@id'        => $url . '#service',
        'name'       => 'SEO, AEO and GEO consulting for ' . html_entity_decode($loc['city'], ENT_QUOTES, 'UTF-8'),
        'url'        => $url,
        'provider'   => ['@id' => $base . '#practice'],
        'areaServed' => array_values(array_unique($areaServed)),
    ];

    return json_encode([
        '@context' => 'https://schema.org',
        '@graph'   => [
            [
                '@type'        => 'WebPage',
                '@id'          => $url . '#page',
                'url'          => $url,
                'name'         => html_entity_decode($loc['h1'], ENT_QUOTES, 'UTF-8'),
                'about'        => ['@id' => $base . '#fawaz'],
                'inLanguage'   => 'en-IN',
            ] + fbh_review_date_schema($loc['reviewed_on'] ?? null),
            [
                '@type'           => 'BreadcrumbList',
                '@id'             => $url . '#breadcrumb',
                'itemListElement' => $crumb_ld,
            ],
            [
                '@type'    => 'Person',
                '@id'      => $base . '#fawaz',
                'name'     => 'Fawaz BH',
                'jobTitle' => 'Independent SEO, AEO and GEO Consultant',
                'url'      => $base,
                'image'    => $base . 'assets/images/fawazbh.webp',
                'telephone'=> '+91-94810-84038',
                'email'    => ['fawazbhseo@gmail.com', 'admin@fawazbhseo.in'],
                'sameAs'   => ['https://www.linkedin.com/in/fawazbh', 'https://x.com/fawazbhseo'],
                'hasCredential' => [
                    ['@type' => 'EducationalOccupationalCredential', 'name' => 'Ahrefs Academy Certification', 'credentialCategory' => 'certificate'],
                    ['@type' => 'EducationalOccupationalCredential', 'name' => 'Semrush AI Visibility Essentials', 'credentialCategory' => 'certificate'],
                    ['@type' => 'EducationalOccupationalCredential', 'name' => 'Semrush Technical SEO and AI Search Essentials', 'credentialCategory' => 'certificate'],
                    ['@type' => 'EducationalOccupationalCredential', 'name' => 'Advanced Diploma in Digital Marketing, Adrex Media School', 'credentialCategory' => 'diploma'],
                ],
            ],
            $practice,
            $service,
            [
                '@type'      => 'FAQPage',
                '@id'        => $url . '#faq',
                'mainEntity' => $faq_ld,
            ],
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}

}

if (!function_exists('render_location_page')) {

function render_location_page(array $loc) {

    $local = $loc['local_seo'] ?? true;
    $wa    = 'https://wa.me/919481084038?text=' . rawurlencode(
        'Hi Fawaz, I would like a free SEO audit for my business in ' . html_entity_decode($loc['city'], ENT_QUOTES, 'UTF-8') . '.'
    );

    render_head([
        'title'         => $loc['title'],
        'description'   => $loc['description'],
        'canonical'     => 'https://fawazbhseo.in/' . $loc['slug'],
        'schema'        => fbh_location_schema($loc),
    ]);

    render_header($loc['nav_active'] ?? 'cities');

    /* MULTILINGUAL. Internal links in this renderer are prefixed so a visitor
       reading in Kannada stays in Kannada instead of being dropped back into
       English on the first click. $lp is empty on English, so the markup these
       16 pages emit is byte-identical to before on the primary language.
       The canonical above is deliberately the English URL: render_head()
       replaces it with the per-locale canonical when a language is active. */
    $lp = fbh_is_default_lang() ? '' : '/' . fbh_lang();
    ?>

<main id="main">

  <!-- 1. HERO -->
  <section class="hero" aria-labelledby="hero-h">
    <div class="wrap hero__grid">

      <div class="hero__lead reveal">
        <nav class="eyebrow" aria-label="Breadcrumb">
          <a href="<?php echo $lp; ?>/">Fawaz BH</a> /
          <?php if (!empty($loc['parent'])): ?>
            <a href="<?php echo $lp . $loc['parent'][0]; ?>"><?php echo $loc['parent'][1]; ?></a> /
          <?php endif; ?>
          <span aria-current="page"><?php echo $loc['city']; ?></span>
        </nav>

        <h1 id="hero-h"><?php echo $loc['h1']; ?></h1>
        <p class="hero__sub"><?php echo $loc['sub']; ?></p>

        <?php foreach ($loc['intro'] as $para): ?>
        <p style="margin-top:16px;color:var(--text-2)"><?php echo $para; ?></p>
        <?php endforeach; ?>

        <div class="btn-row">
          <a class="btn btn--accent" href="<?php echo $wa; ?>" target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 21a9 9 0 1 0-8.5-6.1L2 22l6.5-1.6A9 9 0 0 0 12 21Z"/></svg>
            Free <?php echo $loc['city']; ?> audit
          </a>
          <a class="btn" href="#market">Why this market differs</a>
        </div>
        <p class="field-note" style="margin-top:14px">Free 30 minute discovery audit. A written document you keep either way.</p>
      </div>

      <div class="hero__figure reveal">
        <figure>
          <img src="/assets/images/fawazbh.webp"
               alt="Fawaz BH, SEO, AEO and GEO consultant serving <?php echo htmlspecialchars(html_entity_decode($loc['city'], ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8'); ?>"
               width="440" height="440" fetchpriority="high" decoding="async">
          <figcaption>Fawaz BH, working with <?php echo $loc['city']; ?> businesses from Kushalnagar, Kodagu</figcaption>
          <p class="field-note" style="padding:12px">The only business location is Kushalnagar, Kodagu, Karnataka, India, 571234. Other listed markets are service areas, not branch offices.</p>
        </figure>

        <?php if (!empty($loc['readout'])): ?>
        <dl class="readout" style="margin-top:20px">
          <?php foreach ($loc['readout'] as $row): ?>
          <div class="readout__row">
            <dt><?php echo $row[0]; ?></dt>
            <dd><?php echo $row[1]; ?><?php if (!empty($row[2])): ?><small><?php echo $row[2]; ?></small><?php endif; ?></dd>
          </div>
          <?php endforeach; ?>
        </dl>
        <?php endif; ?>
      </div>

    </div>
  </section>

  <!-- 2. TRUST STRIP -->
  <section class="trust" aria-label="Positioning">
    <div class="wrap">
      <p><?php echo $loc['trust'] ?? 'One consultant. Four named certifications.'; ?> <span class="accent">You work with me directly.</span></p>
    </div>
  </section>

  <!-- 3. WHAT MAKES THIS MARKET DIFFERENT -->
  <section class="section" id="market" aria-labelledby="market-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">The local picture</p>
        <h2 id="market-h">What search in <?php echo $loc['city']; ?> actually looks like</h2>
        <p class="lede">Generic SEO advice fails because it ignores the competitive set and the way people here phrase a query. This is what I look at first.</p>
      </div>

      <div class="grid grid--2">
        <?php $n = 1; foreach ($loc['market'] as $m): ?>
        <article class="card<?php echo $n === 1 ? ' card--featured' : ''; ?> reveal">
          <span class="card-index"><?php echo str_pad((string) $n, 2, '0', STR_PAD_LEFT); ?></span>
          <h3><?php echo $m[0]; ?></h3>
          <p><?php echo $m[1]; ?></p>
        </article>
        <?php $n++; endforeach; ?>
      </div>

      <?php if (!empty($loc['places'])): ?>
      <div class="reveal" style="margin-top:30px">
        <p class="eyebrow">Areas covered</p>
        <ul class="tags" style="margin-top:12px">
          <?php foreach ($loc['places'] as $p): ?>
          <li class="tag"><?php echo $p; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- 4. SECTORS -->
  <section class="section section--alt" id="sectors" aria-labelledby="sectors-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Who this suits</p>
        <h2 id="sectors-h">The <?php echo $loc['city']; ?> businesses this work fits</h2>
        <p class="lede">I am one person with a short client list, so I would rather be specific about where I add value than claim to serve everyone.</p>
      </div>

      <div class="grid grid--3">
        <?php foreach ($loc['sectors'] as $s): ?>
        <article class="card reveal">
          <h3><?php echo $s[0]; ?></h3>
          <p><?php echo $s[1]; ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 5. SERVICES -->
  <section class="section" id="services" aria-labelledby="svc-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">The work</p>
        <h2 id="svc-h">What I do for <?php echo $loc['city']; ?> clients</h2>
        <p class="lede">Four disciplines scoped as one connected strategy, because entity clarity, structured data and answer-first content earn Google rankings and AI citations with the same work.</p>
      </div>

      <div class="grid grid--2">
        <?php if ($local): ?>
        <article class="card card--featured reveal">
          <span class="card-index">01</span>
          <h3>Local SEO and Google Business Profile</h3>
          <p>Primary category accuracy, service and product listings, review velocity, posts, and NAP consistency across the Indian directories that actually feed the local pack. Plus location and neighbourhood pages that say something specific rather than swapping a city name into a template.</p>
          <ul class="tags"><li class="tag">Business Profile</li><li class="tag">Local pack</li><li class="tag">Citations</li><li class="tag">Review strategy</li></ul>
        </article>
        <?php else: ?>
        <article class="card card--featured reveal">
          <span class="card-index">01</span>
          <h3>Technical SEO and site architecture</h3>
          <p>Crawl budget, indexation logic, canonical and pagination handling, JavaScript rendering, Core Web Vitals and Schema.org deployment. Plus AI crawler access checks, because a page that is fine for Googlebot can still be invisible to the crawlers feeding answer engines.</p>
          <ul class="tags"><li class="tag">Crawl and index</li><li class="tag">Core Web Vitals</li><li class="tag">Schema.org</li><li class="tag">Log files</li></ul>
        </article>
        <?php endif; ?>

        <article class="card reveal">
          <span class="card-index">02</span>
          <h3>Technical SEO and content strategy</h3>
          <p>Site health, indexation and structured data first, then a topic map built around commercial, informational and comparison intent. Internal linking is planned so authority concentrates on the pages that actually convert.</p>
          <ul class="tags"><li class="tag">Site audit</li><li class="tag">Topic clusters</li><li class="tag">Internal linking</li></ul>
        </article>

        <article class="card reveal">
          <span class="card-index">03</span>
          <h3>AEO, answer engine optimisation</h3>
          <p>Featured snippets, People Also Ask, voice results and AI Overviews. Question-shaped headings with self-contained answers, FAQPage and Speakable markup, credential signals, and checkable facts instead of adjectives.</p>
          <ul class="tags"><li class="tag">Snippets and PAA</li><li class="tag">FAQ schema</li><li class="tag">E-E-A-T</li></ul>
          <p><a class="link-arrow" href="<?php echo $lp; ?>/aeo-consultant">AEO consultant in depth</a></p>
        </article>

        <article class="card card--featured reveal">
          <span class="card-index">04</span>
          <h3>GEO, generative engine optimisation</h3>
          <p>Being named inside a generated answer, not just ranked beside one. Measured against a fixed set of 20 to 40 buyer-phrased prompts, re-run on schedule and reported per engine across ChatGPT, Perplexity, Gemini, Claude and Copilot, never averaged into one score.</p>
          <ul class="tags"><li class="tag">Prompt sets</li><li class="tag">Citation tracking</li><li class="tag">Corroboration</li></ul>
          <p><a class="link-arrow" href="<?php echo $lp; ?>/geo-consultant">GEO consultant in depth</a></p>
        </article>
      </div>

      <p class="field-note reveal" style="margin-top:22px">Published starting rates are &#8377;14,999 per month for a Starter local SEO scope and &#8377;29,999 per month for full-stack SEO plus AEO, with combined SEO, AEO and GEO quoted after the audit. Full rate card on the <a href="<?php echo $lp; ?>/seo-services">services page</a>.</p>
    </div>
  </section>

  <!-- 6. PROCESS -->
  <section class="section section--alt" id="process" aria-labelledby="proc-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">How engagements run</p>
        <h2 id="proc-h">Four stages, each with a document you keep</h2>
      </div>

      <div class="grid grid--2">
        <article class="step reveal">
          <p class="step__k">01 &nbsp; AUDIT</p>
          <h3>Free discovery audit</h3>
          <p>A written technical, on-page, local and answer-engine review of your site, benchmarked against the competitors actually beating you in <?php echo $loc['city']; ?>. Yours to keep whether or not you hire me.</p>
        </article>
        <article class="step reveal">
          <p class="step__k">02 &nbsp; STRATEGY</p>
          <h3>Prioritised roadmap</h3>
          <p>Keyword research split by intent, plus the 20 to 40 buyer-phrased AI prompts that become your citation benchmark. Scope and price agreed in writing before anything else starts.</p>
        </article>
        <article class="step reveal">
          <p class="step__k">03 &nbsp; EXECUTION</p>
          <h3>Hands-on implementation</h3>
          <p>Technical fixes, structured data, content and entity work, carried out directly by me. No account managers, no junior handoffs, no subcontracting.</p>
        </article>
        <article class="step reveal">
          <p class="step__k">04 &nbsp; MEASURE</p>
          <h3>Report and iterate</h3>
          <p>Rankings, organic traffic, conversions and the prompt set re-run per engine on a fixed schedule, so a real gain is distinguishable from ordinary volatility.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- 7. CREDENTIALS -->
  <section class="section" id="credentials" aria-labelledby="cred-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Credentials</p>
        <h2 id="cred-h">Certified, and checkable</h2>
        <p class="lede">Four named qualifications from three named issuers. Ask for the issuer and the credential name from anyone you are considering, then verify it.</p>
      </div>

      <div class="grid grid--2">
        <article class="card card--featured reveal">
          <span class="badge badge--accent">Issued by Ahrefs</span>
          <h3>Ahrefs Academy Certification</h3>
          <p>Keyword research, backlink analysis, competitive research and technical site auditing. Every audit is scoped against this framework.</p>
        </article>
        <article class="card card--featured reveal">
          <span class="badge badge--accent">Issued by Semrush</span>
          <h3>Semrush AI Visibility Essentials</h3>
          <p>Prompt-level tracking, share of voice inside generated answers, and the difference between being retrieved and being cited. This underpins the GEO half of the work.</p>
        </article>
        <article class="card reveal">
          <span class="badge">Issued by Semrush</span>
          <h3>Semrush Technical SEO and AI Search Essentials</h3>
          <p>Crawlability, indexation, site health and structured data, plus how those foundations feed AI search surfaces.</p>
        </article>
        <article class="card reveal">
          <span class="badge">Issued by Adrex Media School</span>
          <h3>Advanced Diploma in Digital Marketing</h3>
          <p>Broad grounding across digital channels, which is what lets me say when the honest answer is that your problem is not an SEO problem.</p>
        </article>
      </div>

      <?php if (!empty($loc['distance'])): ?>
      <article class="card reveal" style="margin-top:26px">
        <span class="card-index">Working arrangement</span>
        <h3>How I work with <?php echo $loc['city']; ?> clients in practice</h3>
        <p><?php echo $loc['distance']; ?></p>
      </article>
      <?php endif; ?>
    </div>
  </section>

  <!-- 8. FAQ -->
  <section class="section section--alt" id="faq" aria-labelledby="faq-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">Questions</p>
        <h2 id="faq-h"><?php echo $loc['city']; ?> SEO questions, answered up front</h2>
        <p class="lede">Phrased the way people actually type them into Google and into AI assistants, including the ones where the honest answer is not hire me.</p>
      </div>

      <div>
        <?php foreach ($loc['faqs'] as $f): ?>
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

  <!-- 9. NEARBY AND RELATED -->
  <?php if (!empty($loc['siblings']) || !empty($loc['parent'])): ?>
  <section class="section" id="nearby" aria-labelledby="near-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Nearby and related</p>
        <h2 id="near-h">Other places I work</h2>
      </div>

      <div class="grid grid--3">
        <?php if (!empty($loc['parent'])): ?>
        <article class="card card--link card--featured reveal">
          <span class="card-index">Wider area</span>
          <h3><a href="<?php echo $lp . $loc['parent'][0]; ?>"><?php echo $loc['parent'][1]; ?></a></h3>
          <p>The regional view, including how strategy changes between markets and which towns are covered.</p>
        </article>
        <?php endif; ?>

        <?php foreach (($loc['siblings'] ?? []) as $s): ?>
        <article class="card card--link reveal">
          <span class="card-index">Nearby</span>
          <h3><a href="<?php echo $lp . $s[0]; ?>"><?php echo $s[1]; ?></a></h3>
          <p><?php echo $s[2] ?? 'Local SEO, AEO and GEO work in this market.'; ?></p>
        </article>
        <?php endforeach; ?>

        <article class="card card--link reveal">
          <span class="card-index">Everywhere</span>
          <h3><a href="<?php echo $lp; ?>/cities-we-serve">All locations served</a></h3>
          <p>The full list, from Kodagu towns outward through Karnataka, South India, the rest of India, Asia and Europe.</p>
        </article>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- 10. CONTACT -->
  <?php render_contact_form([
      'heading' => 'Ready to be the answer ' . html_entity_decode($loc['city'], ENT_QUOTES, 'UTF-8') . ' gets given?',
      'lede'    => 'Book a free 30 minute audit. I will show you where you are losing visibility on Google, where you are missing from AI answers, and the shortest honest path to fixing both.',
      'id'      => 'contact',
  ]); ?>

  <?php fbh_render_review_date($loc['reviewed_on'] ?? null); ?>

</main>

<?php
    render_floating_button('Hi Fawaz, I would like a free SEO audit for my business in ' . html_entity_decode($loc['city'], ENT_QUOTES, 'UTF-8') . '.');
    render_footer();
}

}
