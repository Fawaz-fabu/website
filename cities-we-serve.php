<?php
/**
 * Cities we serve.
 *
 * Tier order set by the site owner: Kodagu, then Karnataka, then South India,
 * then India, then Asia, then Europe.
 *
 * CONTENT NOTE: the Kodagu, Karnataka, South India and India tiers use copy
 * carried over verbatim from the previous site, with em dashes removed. The
 * Asia and Europe tiers did not exist on the previous site, so their copy is
 * new and is marked in the interface as pending your confirmation. Replace or
 * approve the two flagged blocks before treating them as final. The Swiss
 * mention reflects the upcoming client and carries no claim of a delivered
 * engagement.
 */

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/contact-form.php';
require_once __DIR__ . '/includes/floating-button.php';
require_once __DIR__ . '/includes/footer.php';

$schema = <<<'JSONLD'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "CollectionPage",
      "@id": "https://fawazbhseo.in/cities-we-serve#page",
      "url": "https://fawazbhseo.in/cities-we-serve",
      "name": "Cities served, SEO, AEO and GEO consulting from Kodagu outward",
      "about": {"@id": "https://fawazbhseo.in/#fawaz"}
    },
    {
      "@type": "ProfessionalService",
      "@id": "https://fawazbhseo.in/#practice",
      "name": "FawazBHSEO",
      "founder": {"@id": "https://fawazbhseo.in/#fawaz"},
      "url": "https://fawazbhseo.in/",
      "telephone": "+91-94810-84038",
      "priceRange": "Scoped per engagement",
      "geo": {"@type": "GeoCoordinates", "latitude": 12.4574, "longitude": 75.9608},
      "areaServed": [
        {"@type": "AdministrativeArea", "name": "Kodagu, Karnataka"},
        {"@type": "AdministrativeArea", "name": "Karnataka"},
        {"@type": "AdministrativeArea", "name": "South India"},
        {"@type": "Country", "name": "India"},
        {"@type": "Place", "name": "Asia"},
        {"@type": "Place", "name": "Europe"}
      ]
    }
  ]
}
JSONLD;

/**
 * Tier data. `flag` marks copy that is new rather than carried over.
 */
$tiers = [
    [
        'id'       => 'kodagu',
        'tier'     => 'Tier 01, hyperlocal',
        'title'    => 'SEO services in Kodagu and Coorg',
        'featured' => true,
        'flag'     => '',
        'body'     => 'SEO and digital marketing services based in Kushal Nagar, Kodagu, purpose-built for Coorg homestays, resorts, coffee estates, spice brands and local services that want to be found by visitors and locals alike.',
        'label'    => 'Cities',
        'places'   => ['Kushal Nagar', 'Madikeri', 'Virajpet', 'Somwarpet'],
        'link'     => ['href' => '/seo-consultant-kodagu', 'text' => 'SEO consultant in Kodagu'],
        'pages_label' => 'Town pages',
        'pages'    => [
            ['/seo-services-madikeri', 'SEO services in Madikeri'],
            ['/seo-services-kushalnagar', 'SEO services in Kushal Nagar'],
            ['/seo-services-virajpet', 'SEO services in Virajpet'],
            ['/seo-services-somwarpet', 'SEO services in Somwarpet'],
        ],
    ],
    [
        'id'       => 'karnataka',
        'tier'     => 'Tier 02, state',
        'title'    => 'SEO services in Bengaluru, Mysuru and Karnataka',
        'featured' => true,
        'flag'     => '',
        'body'     => 'Serving Karnataka&#8217;s major commercial hubs with technical SEO, local SEO, AEO and GEO, frameworks tailored for the competitive search markets of Bengaluru, Mysuru, Mangaluru and beyond.',
        'label'    => 'Cities',
        'places'   => ['Bengaluru', 'Mysuru', 'Mangaluru', 'Hubballi'],
        'link'     => ['href' => '/seo-consultant-karnataka', 'text' => 'SEO consultant in Karnataka'],
        'pages_label' => 'City pages',
        'pages'    => [
            ['/seo-services-bengaluru', 'SEO services in Bengaluru'],
            ['/seo-services-mysuru', 'SEO services in Mysuru'],
            ['/seo-services-mangaluru', 'SEO services in Mangaluru'],
            ['/seo-services-hubballi-dharwad', 'SEO services in Hubballi and Dharwad'],
        ],
    ],
    [
        'id'       => 'south-india',
        'tier'     => 'Tier 03, regional',
        'title'    => 'SEO services across South India',
        'featured' => false,
        'flag'     => '',
        'body'     => 'Extending Karnataka-tested SEO playbooks across Tamil Nadu, Kerala, Andhra Pradesh and Telangana, with multilingual SEO and regional schema strategies.',
        'label'    => 'Also serving',
        'places'   => ['Chennai', 'Hyderabad', 'Kochi', 'Coimbatore'],
        'link'     => null,
        'pages_label' => 'City pages',
        'pages'    => [
            ['/seo-services-chennai', 'SEO services in Chennai'],
            ['/seo-services-hyderabad', 'SEO services in Hyderabad'],
            ['/seo-services-kochi', 'SEO services in Kochi'],
            ['/seo-services-coimbatore', 'SEO services in Coimbatore'],
        ],
    ],
    [
        'id'       => 'india',
        'tier'     => 'Tier 04, national',
        'title'    => 'SEO services across India',
        'featured' => false,
        'flag'     => '',
        'body'     => 'Working with startups, SMEs and growing brands across India, from Mumbai e-commerce to Delhi SaaS to Pune professional services, delivered remotely with direct access.',
        'label'    => 'Also serving',
        'places'   => ['Mumbai', 'Delhi NCR', 'Pune', 'Pan-India'],
        'link'     => ['href' => '/seo-consultant-india', 'text' => 'SEO consultant in India'],
        'pages_label' => 'City pages',
        'pages'    => [
            ['/seo-services-mumbai', 'SEO services in Mumbai'],
            ['/seo-services-pune', 'SEO services in Pune'],
            ['/seo-services-delhi-ncr', 'SEO services in Delhi NCR'],
        ],
    ],
    [
        'id'       => 'asia',
        'tier'     => 'Tier 05, continental',
        'title'    => 'AEO and GEO work across Asia',
        'featured' => false,
        'flag'     => 'New copy, confirm wording',
        'body'     => 'A small number of answer engine and generative engine projects outside India, taken on remotely. Answer engines do not care where the consultant sits, so this work travels well. Local pack rankings still favour someone with feet on the ground, which is why the Asia work stays focused on AEO, GEO and technical SEO rather than local listings.',
        'label'    => 'Open to enquiries from',
        'places'   => ['Singapore', 'Dubai and the UAE', 'Malaysia', 'Sri Lanka'],
        'link'     => null,
    ],
    [
        'id'       => 'europe',
        'tier'     => 'Tier 06, international',
        'title'    => 'Search visibility work in Europe',
        'featured' => false,
        'flag'     => 'New copy, confirm wording',
        'body'     => 'The newest direction for the practice. An engagement with a client in Switzerland is upcoming, and further European enquiries are welcome for technical SEO, AEO and GEO. Time zones are handled with scheduled calls rather than an always-on promise I cannot honestly keep.',
        'label'    => 'Open to enquiries from',
        'places'   => ['Switzerland, upcoming client', 'Germany', 'United Kingdom', 'Netherlands'],
        'link'     => null,
        'pages_label' => 'Country pages',
        'pages'    => [
            ['/seo-services-switzerland', 'SEO services in Switzerland'],
        ],
    ],
];

render_head([
    'title'       => 'Cities served, SEO, AEO and GEO consulting from Kodagu outward',
    'description' => 'Where Fawaz BH works: Kodagu and Coorg first, then Karnataka, South India, the rest of India, and selected AEO and GEO projects across Asia and Europe.',
    'canonical'   => 'https://fawazbhseo.in/cities-we-serve',
    'schema'      => $schema,
]);

render_header('cities');
?>

<main id="main">

  <!-- HERO -->
  <section class="hero" aria-labelledby="hero-h">
    <div class="wrap hero__grid">

      <div class="hero__lead reveal">
        <p class="eyebrow">Geographic coverage</p>
        <h1 id="hero-h">SEO services from Kushal Nagar to all of India.</h1>
        <p class="hero__sub">Local roots, national reach. Every engagement is delivered with the same hands-on, founder-led attention, whether you&#8217;re a homestay in Madikeri, a retailer in Mysuru, or a SaaS startup in Bengaluru.</p>

        <div class="btn-row">
          <a class="btn btn--accent" href="https://wa.me/919481084038?text=Hi%20Fawaz%2C%20do%20you%20work%20with%20businesses%20in%20my%20city" target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 21a9 9 0 1 0-8.5-6.1L2 22l6.5-1.6A9 9 0 0 0 12 21Z"/></svg>
            Ask about your city
          </a>
        </div>
      </div>

      <dl class="readout reveal">
        <div class="readout__row"><dt>Home base</dt><dd>Kushal Nagar<small>Kodagu, Karnataka</small></dd></div>
        <div class="readout__row"><dt>In person</dt><dd>Kodagu<small>And reachable parts of Karnataka</small></dd></div>
        <div class="readout__row"><dt>Remote</dt><dd>India wide<small>South India and beyond</small></dd></div>
        <div class="readout__row"><dt>International</dt><dd>Selective<small>AEO and GEO projects</small></dd></div>
      </dl>

    </div>
  </section>

  <!-- TRUST STRIP -->
  <section class="trust" aria-label="Coverage">
    <div class="wrap">
      <p>Hyperlocal in Kodagu. Statewide across Karnataka. <span class="accent">Remote everywhere else.</span></p>
    </div>
  </section>

  <!-- WHY LOCATION MATTERS -->
  <section class="section" id="how-location-works" aria-labelledby="loc-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">How location actually matters</p>
        <h2 id="loc-h" style="margin-block:16px 20px">Some of this needs local knowledge. Most of it does not.</h2>
        <p class="lede">Local SEO benefits from local knowledge. Strategy, technical work and answer engine optimisation travel perfectly well remotely. The tiers below reflect that honestly rather than claiming an equal presence everywhere.</p>
      </div>

      <div class="grid grid--2">
        <article class="card reveal">
          <span class="card-index">Needs local context</span>
          <h3>Local pack, Maps and near me search</h3>
          <p>Google Business Profile work, local citations, review strategy and bilingual query mapping all improve when the person doing them understands how people in that market actually search. This is strongest in Kodagu and across Karnataka.</p>
        </article>

        <article class="card reveal">
          <span class="card-index">Travels remotely</span>
          <h3>Technical SEO, AEO and GEO</h3>
          <p>Site architecture, Core Web Vitals, structured data, entity clarity and answer engine citation work do not depend on being in the room. These are delivered the same way for a client in Kochi, Mumbai or Zurich.</p>
        </article>
      </div>

    </div>
  </section>

  <hr class="rule">

  <!-- TIERS -->
  <section class="section section--alt" id="tiers" aria-labelledby="tiers-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Where I work</p>
        <h2 id="tiers-h">Six tiers, closest first</h2>
        <p class="lede">The order is deliberate. Kodagu is home and gets the deepest local knowledge. Everything further out is served remotely, with the scope adjusted to match what can honestly be delivered from a distance.</p>
      </div>

      <div class="grid grid--2">
        <?php foreach ($tiers as $tier): ?>
        <article class="card<?php echo $tier['featured'] ? ' card--featured' : ''; ?> reveal" id="<?php echo htmlspecialchars($tier['id'], ENT_QUOTES, 'UTF-8'); ?>" aria-labelledby="<?php echo htmlspecialchars($tier['id'], ENT_QUOTES, 'UTF-8'); ?>-h">
          <span class="card-index"><?php echo htmlspecialchars($tier['tier'], ENT_QUOTES, 'UTF-8'); ?></span>
          <h3 id="<?php echo htmlspecialchars($tier['id'], ENT_QUOTES, 'UTF-8'); ?>-h"><?php echo $tier['title']; ?></h3>

          <?php if ($tier['flag'] !== ''): ?>
          <p style="margin-bottom:12px"><span class="placeholder-flag"><?php echo htmlspecialchars($tier['flag'], ENT_QUOTES, 'UTF-8'); ?></span></p>
          <?php endif; ?>

          <p><?php echo $tier['body']; ?></p>

          <p class="footer-h" style="margin:20px 0 9px"><?php echo htmlspecialchars($tier['label'], ENT_QUOTES, 'UTF-8'); ?></p>
          <ul class="tags" style="margin:0">
            <?php foreach ($tier['places'] as $place): ?>
            <li class="tag"><?php echo htmlspecialchars($place, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
          </ul>

          <?php if (!empty($tier['pages'])): ?>
          <p class="footer-h" style="margin:20px 0 9px"><?php echo htmlspecialchars($tier['pages_label'] ?? 'Detailed pages', ENT_QUOTES, 'UTF-8'); ?></p>
          <ul class="linklist" style="margin:0">
            <?php foreach ($tier['pages'] as $page): ?>
            <li><a href="<?php echo htmlspecialchars($page[0], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($page[1], ENT_QUOTES, 'UTF-8'); ?></a></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>

          <?php if ($tier['link'] !== null): ?>
          <p style="margin-top:18px">
            <a class="link-arrow" href="<?php echo htmlspecialchars($tier['link']['href'], ENT_QUOTES, 'UTF-8'); ?>">
              <?php echo htmlspecialchars($tier['link']['text'], ENT_QUOTES, 'UTF-8'); ?>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
          </p>
          <?php endif; ?>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="section" id="faq" aria-labelledby="faq-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">Questions</p>
        <h2 id="faq-h" style="margin-block:16px 20px">Working across distance</h2>
        <p class="lede">Answered directly, the way I would tell you on a call.</p>
      </div>

      <div class="faq">
        <details open>
          <summary>Do you work with businesses outside Karnataka?</summary>
          <div class="faq__body"><p><strong>Yes.</strong> While my local expertise is strongest in Kodagu and Karnataka, I take remote engagements across South India, including Hyderabad, Chennai, Kochi and Coimbatore, and the rest of India, and a small number of AEO and GEO projects beyond India. Local SEO benefits from local knowledge. Strategy, technical work and answer engine optimisation travel perfectly well remotely.</p></div>
        </details>

        <details>
          <summary>My city is not listed. Can you still help?</summary>
          <div class="faq__body"><p><strong>Probably, yes.</strong> The cities named on this page are examples, not a closed list. What matters more than the pin on the map is whether the work you need depends on local ground knowledge. Send me the city and what you are trying to fix, and I will tell you honestly whether I am the right person or whether someone local to you would serve you better.</p></div>
        </details>

        <details>
          <summary>Do you meet clients in person?</summary>
          <div class="faq__body"><p><strong>In Kodagu, yes, and in reachable parts of Karnataka by arrangement.</strong> Everywhere else the engagement runs on calls, shared documents and written reporting. That is not a compromise, it is how most of this work is done properly anyway, and it keeps the cost going into the work rather than into travel.</p></div>
        </details>

        <details>
          <summary>How do time zones work for international clients?</summary>
          <div class="faq__body"><p><strong>Calls are scheduled rather than on demand.</strong> I work from India Standard Time, and I book overlapping slots that suit your working day. I would rather agree a predictable weekly window than promise round the clock availability I cannot honestly keep.</p></div>
        </details>
      </div>

    </div>
  </section>

  <?php render_contact_form([
      'heading' => 'Tell me where you are',
      'lede'    => 'Send me your city and what you are trying to fix. The discovery audit is free wherever you are based, and you keep the written document either way.',
  ]); ?>

</main>

<?php
render_floating_button();
render_footer();
