<?php
/**
 * 404, page not found.
 *
 * Point your server at this file, for example in .htaccess:
 *   ErrorDocument 404 /404.php
 */

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/floating-button.php';
require_once __DIR__ . '/includes/footer.php';

if (!headers_sent()) {
    http_response_code(404);
}

/* Where people usually meant to go. */
$destinations = [
    ['Home',                  '/',                              'The overview of the practice: services, process, credentials and how engagements run.'],
    ['SEO services',          '/seo-services',              'Every service with what it includes and the published starting rates.'],
    ['Case studies',          '/case-studies',              'A working record of results, with unverified figures labelled as pending.'],
    ['Cities served',         '/cities-we-serve',           'Kodagu, Karnataka, South India and beyond, with what changes between them.'],
    ['About Fawaz BH',        '/about',                     'Who does the work, how I got into search, and the four named qualifications.'],
    ['Contact',               '/contact',                   'Phone, email, WhatsApp and a short form. I answer every message myself.'],
    ['AEO consultant',        '/aeo-consultant',            'Answer engine optimisation in detail: snippets, People Also Ask and AI Overviews.'],
    ['GEO consultant',        '/geo-consultant',            'Generative engine optimisation across ChatGPT, Perplexity, Gemini, Claude and Copilot.'],
    ['SEO in Kodagu',         '/seo-consultant-kodagu',     'Hyperlocal work in Kushal Nagar, Madikeri, Somwarpet and Virajpet.'],
    ['SEO in Karnataka',      '/seo-consultant-karnataka',  'State-level work across Bengaluru, Mysuru, Mangaluru and Hubballi-Dharwad.'],
    ['SEO in India',          '/seo-consultant-india',      'National, fully remote engagements across every Indian state.'],
    ['Blog',                  '/blog',                      'Working notes on search. Nothing published yet, and that is deliberate.'],
];

render_head([
    'title'       => 'Page not found | Fawaz BH, SEO, AEO and GEO consultant',
    'description' => 'That page does not exist on fawazbhseo.in. Here are the pages that do, including services, case studies, cities served and contact details.',
    'canonical'   => 'https://fawazbhseo.in/404',
    'robots'      => 'noindex,follow',
]);

render_header('');
?>

<main id="main">

  <!-- HERO -->
  <section class="hero" aria-labelledby="hero-h">
    <div class="wrap hero__grid">

      <div class="hero__lead reveal">
        <p class="eyebrow">Error 404</p>
        <h1 id="hero-h">That page is not here.</h1>
        <p class="hero__sub">Either the address has a typo in it, or the page moved when the site was rebuilt. Both are fixable in about five seconds.</p>
        <p style="margin-top:18px;color:var(--text-2)">If you followed a link from somewhere else and landed here, I would genuinely like to know so I can put a redirect in place. Send me the address you came from and I will sort it.</p>

        <div class="btn-row">
          <a class="btn btn--accent" href="/">Back to the homepage</a>
          <a class="btn" href="/contact">Report the broken link</a>
        </div>
      </div>

      <dl class="readout reveal">
        <div class="readout__row"><dt>Status</dt><dd>404<small>Page not found on this server</small></dd></div>
        <div class="readout__row"><dt>Likely cause</dt><dd>Typo or old address<small>The site moved to a new structure</small></dd></div>
        <div class="readout__row"><dt>Next step</dt><dd>Pick a page below<small>Everything on the site is listed</small></dd></div>
        <div class="readout__row"><dt>Or just ask</dt><dd>+91 94810 84038<small>WhatsApp, call or email</small></dd></div>
      </dl>

    </div>
  </section>

  <!-- TRUST STRIP -->
  <section class="trust" aria-label="Reassurance">
    <div class="wrap">
      <p>Nothing is lost. <span class="accent">Every page on the site is listed below.</span></p>
    </div>
  </section>

  <!-- SITE INDEX -->
  <section class="section" id="site-index" aria-labelledby="index-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Where you probably meant to go</p>
        <h2 id="index-h">The whole site, in one list</h2>
        <p class="lede">Twelve pages, no hidden sections. If what you were looking for is not here, it does not exist yet.</p>
      </div>

      <div class="grid grid--3">
        <?php $n = 1; foreach ($destinations as $d): ?>
        <article class="card card--link reveal">
          <span class="card-index"><?php echo str_pad((string) $n, 2, '0', STR_PAD_LEFT); ?></span>
          <h3><a href="<?php echo htmlspecialchars($d[1], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($d[0], ENT_QUOTES, 'UTF-8'); ?></a></h3>
          <p><?php echo htmlspecialchars($d[2], ENT_QUOTES, 'UTF-8'); ?></p>
        </article>
        <?php $n++; endforeach; ?>
      </div>
    </div>
  </section>

  <!-- DIRECT CONTACT -->
  <section class="section section--alt" id="direct" aria-labelledby="direct-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Faster than searching</p>
        <h2 id="direct-h">Or skip the site and ask me</h2>
        <p class="lede">If you came here looking for a price, a service or whether I work in your city, message me and I will answer it directly rather than sending you back into the navigation.</p>
      </div>

      <div class="grid grid--3">
        <article class="card card--featured reveal">
          <span class="card-index">WhatsApp</span>
          <h3>Quickest reply</h3>
          <p>Usually within a couple of hours during the working day.</p>
          <p style="margin-top:16px"><a class="link-arrow" href="https://wa.me/919481084038?text=Hi%20Fawaz%2C%20I%20hit%20a%20broken%20link%20on%20your%20site" target="_blank" rel="noopener">Message on WhatsApp</a></p>
        </article>

        <article class="card reveal">
          <span class="card-index">Phone</span>
          <h3>Call directly</h3>
          <p>You reach me, not a switchboard or a receptionist.</p>
          <p style="margin-top:16px"><a class="link-arrow" href="tel:+919481084038">+91 94810 84038</a></p>
        </article>

        <article class="card reveal">
          <span class="card-index">Email</span>
          <h3>Write it out</h3>
          <p>Best if you want to send a site address or a longer question.</p>
          <p style="margin-top:16px"><a class="link-arrow notranslate" translate="no" href="mailto:fawazbhseo@gmail.com">fawazbhseo@gmail.com</a></p>
          <p><a class="link-arrow notranslate" translate="no" href="mailto:admin@fawazbhseo.in">admin@fawazbhseo.in</a></p>
        </article>
      </div>
    </div>
  </section>

</main>

<?php
render_floating_button('Hi Fawaz, I hit a broken link on your site.');
render_footer();
