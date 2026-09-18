<?php
/**
 * SEO consultant in Kodagu (Coorg), hyperlocal page.
 *
 * Copy carried over verbatim from the previous seo-consultant-kodagu page.
 * Changes made: every em dash removed and rewritten into plain punctuation,
 * and the retired decorative modules (aurora background, orbit canvas,
 * capability ticker, scroll rail) dropped.
 * No claim or client quote has been altered.
 */

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/contact-form.php';
require_once __DIR__ . '/includes/floating-button.php';
require_once __DIR__ . '/includes/footer.php';

/* ── Identity readout ─────────────────────────────────────────────────── */
$identity = [
    ['Based in',   'Kushalnagar',        'Kodagu, Karnataka'],
    ['Certified',  'Ahrefs and Semrush', 'SEO, AI search, technical'],
    ['Serving',    'All of Kodagu',      'Madikeri to Virajpet'],
    ['Engagement', 'Direct',             'No agency middlemen'],
];

/* ── What I do for Kodagu businesses ──────────────────────────────────── */
$services = [
    [
        'featured' => true,
        'title' => 'SEO for Kodagu (Coorg)',
        'tags'  => ['Local SEO', 'Google Business Profile', 'Map pack', 'Technical SEO'],
        'body'  => 'Rank for how people here actually search, from &#8220;homestay near Madikeri&#8221; and &#8220;restaurant Kushalnagar&#8221; to &#8220;coffee estate Somwarpet.&#8221; I handle Google Business Profile optimisation, local citations, on-page and technical fixes, and the bilingual Kannada and English queries that generic national playbooks miss. The goal is simple: show up in the Google map pack and on page one when a customer in or near Kodagu is looking for you.',
    ],
    [
        'featured' => false,
        'title' => 'Google and Meta Ads (SEM and PPC)',
        'tags'  => ['Google Ads', 'Instagram ads', 'Seasonal budgets'],
        'body'  => 'Coorg demand is seasonal. I build paid campaigns that spend when Bengaluru and Mysuru travellers are actually searching, and pull back during the monsoon lull, so budget goes to bookings instead of guesswork.',
    ],
    [
        'featured' => false,
        'title' => 'SXO: pages that convert',
        'tags'  => ['Core Web Vitals', 'Mobile-first', 'Conversion'],
        'body'  => 'Fast, mobile-first pages that load on weak Western Ghats signal and turn a WhatsApp tap into an enquiry. Good experience is a ranking signal now, so speed, clarity and clean layout are built in, not patched on later.',
    ],
    [
        'featured' => false,
        'title' => 'AEO: win the direct answer',
        'tags'  => ['Snippets', 'AI Overviews'],
        'body'  => 'Answer-first content and FAQ schema that win featured snippets and Google AI Overviews for Kodagu queries, so you are the box at the top, not a link buried below it.',
    ],
    [
        'featured' => false,
        'title' => 'GEO: get named by AI',
        'tags'  => ['Entity SEO', 'Citations'],
        'body'  => 'When someone asks ChatGPT, Perplexity, Gemini or Claude for a Coorg recommendation, structured, corroborated content makes your business the one they name and cite as the source.',
    ],
    [
        'featured' => false,
        'title' => 'Web development',
        'tags'  => ['Fast sites', 'Schema-ready'],
        'body'  => 'Fast, schema-ready websites built to rank from launch day. WhatsApp CTAs, direct booking and clean structured data come standard, not as a paid extra.',
    ],
    [
        'featured' => true,
        'title' => 'Digital marketing',
        'tags'  => ['Strategy', 'SEO plus Ads plus content', 'One roadmap'],
        'body'  => 'For businesses that want the whole picture handled, not just one channel. Search, paid ads, content and social run off a single Kodagu-specific roadmap tuned to your niche, your season and your competitors, so every channel reinforces the others instead of pulling in different directions.',
    ],
    [
        'featured' => true,
        'title' => 'Social media marketing and management',
        'tags'  => ['Instagram', 'Facebook', 'Reels and content', 'Management'],
        'body'  => 'Kodagu is one of the most photogenic places in India, and that is a marketing advantage most businesses waste. I plan and manage Instagram and Facebook content, Reels and posting schedules that turn coffee estates, misty hills and homestay views into real bookings and enquiries, aligned to the seasons that drive Coorg demand.',
    ],
];

/* ── Towns served ─────────────────────────────────────────────────────── */
$towns = [
    [
        'tier'  => 'Madikeri and Suntikoppa',
        'title' => 'The district hub',
        'featured' => true,
        'body'  => 'Madikeri is the commercial, healthcare and tourist base for all of Kodagu, which means intense map-pack competition around Raja&#8217;s Seat and the fort. Clinics, restaurants, travel desks and shops need strong Google Business Profiles and steady reviews to be the one a Friday-evening Bengaluru arrival actually calls. Suntikoppa businesses on the approach road capture the same on-the-road traffic.',
        'places' => ['Madikeri', 'Suntikoppa', 'Napoklu'],
        'page'   => ['/seo-services-madikeri', 'SEO services in Madikeri'],
    ],
    [
        'tier'  => 'Kushalnagar',
        'title' => 'The eastern gateway, my home base',
        'featured' => true,
        'body'  => 'Kushalnagar is the first major town on the NH275 route from Bengaluru, and where I am based. Hotels, restaurants and resort offices here win travellers who have not pre-booked, plus the eco and cultural tourism searches around Nisargadhama and the Bylakuppe Tibetan settlement. Being local means I understand this traffic first-hand, not from a dashboard 135 kilometres away.',
        'places' => ['Kushalnagar', 'Kudige', 'Nisargadhama corridor'],
        'page'   => ['/seo-services-kushalnagar', 'SEO services in Kushal Nagar'],
    ],
    [
        'tier'  => 'Virajpet and south Kodagu',
        'title' => 'Coffee trade and wildlife tourism',
        'featured' => false,
        'body'  => 'Virajpet serves southern Kodagu including Gonikoppal, Ponnampet and Ammathi, with coffee trading and Nagarhole proximity defining the market. Coffee exporters need English-language sites that reach international buyers, and wildlife resorts compete for high-value &#8220;stay near Nagarhole&#8221; searches from metro travellers. Both are winnable with the right content and structured data.',
        'places' => ['Virajpet', 'Gonikoppal', 'Ponnampet', 'Ammathi'],
        'page'   => ['/seo-services-virajpet', 'SEO services in Virajpet'],
    ],
    [
        'tier'  => 'Somwarpet',
        'title' => 'Estate country',
        'featured' => false,
        'body'  => 'Somwarpet holds the highest concentration of coffee-estate homestays in Kodagu, targeting premium travellers who search for &#8220;authentic&#8221; off-beat stays and book earlier and at higher rates. Estate storytelling, harvest-season content and clean booking pages let these properties earn direct bookings and skip OTA commission entirely.',
        'places' => ['Somwarpet', 'Shanivarsanthe', 'Kodlipet'],
        'page'   => ['/seo-services-somwarpet', 'SEO services in Somwarpet'],
    ],
];

/* ── Why a Kodagu-based consultant ────────────────────────────────────── */
$why = [
    ['Genuinely based in Kodagu', 'Not a Mangaluru or Bangalore office with a Coorg page. I live and work in Kushalnagar, so local knowledge is first-hand, not researched from a distance.'],
    ['You work with me, directly', 'Every audit, call and change runs through one person. No account managers, no junior handoffs, no part-time attention split across two states.'],
    ['Certified and current', 'Ahrefs and Semrush certified, with an Advanced Diploma in Digital Marketing, kept current with how Google and AI answer engines actually work today.'],
    ['A real Kodagu case study', 'Documented results for Green Coorg Spices, a Kushalnagar brand, not stock testimonials. Proof from the same market you operate in.'],
    ['Built for the AI era', 'An early practitioner of AEO and GEO, so your business is structured to be cited by ChatGPT and Perplexity, not just ranked on Google.'],
];

/* ── FAQ ──────────────────────────────────────────────────────────────── */
$faqs = [
    [
        'q' => 'Who is the best SEO consultant in Kodagu?',
        'a' => ['<strong>Fawaz BH is an SEO consultant based in Kushalnagar, Kodagu, who works with Coorg businesses directly and is certified by Ahrefs and Semrush.</strong> Unlike agencies that serve Kodagu from offices in Mangaluru or Bangalore, he lives in the district, so local knowledge is first-hand. He has a documented result for Green Coorg Spices, a Kushalnagar brand, and covers SEO, Google Ads, social media, AEO and GEO. When choosing, look for a genuinely local base, verifiable certifications, direct access and real proof rather than a bare best SEO expert claim.'],
        'open' => true,
    ],
    [
        'q' => 'How much does SEO cost in Coorg?',
        'a' => ['<strong>SEO for a small Kodagu business generally starts in the low thousands of rupees per month for local SEO and Google Business Profile work, with fuller packages covering ads, content and social costing more.</strong> The exact figure depends on your goals, your competition and how much needs fixing. I price every engagement against a defined scope agreed after the free audit, so you always know what you are paying for before anything starts. Ask for a scoped quote rather than a fixed price for undefined work. Published starting rates are on the <a href="/seo-services">services and pricing page</a>.'],
    ],
    [
        'q' => 'How long does SEO take to show results in Kodagu?',
        'a' => ['<strong>For local SEO in Kodagu, meaningful movement usually appears within a few months, because tier-2 markets like Coorg are far less competitive than metros like Bangalore.</strong> Google Business Profile and map-pack improvements can show faster, sometimes in weeks, while broader organic rankings take longer. Timelines depend on your starting point, your competition and how quickly changes can be shipped. Answer-engine visibility through GEO can sometimes surface quickly on recency-sensitive engines like Perplexity.'],
    ],
    [
        'q' => 'Is it worth hiring an SEO consultant for a small Coorg business?',
        'a' => ['<strong>Yes, if you rely on customers finding you online, because most Kodagu searches now happen on Google Maps and mobile.</strong> A homestay that wins one direct booking a week instead of paying 15 to 25 percent OTA commission usually covers its SEO cost several times over. A clinic, shop or coffee brand that appears in the map pack captures customers who would otherwise call a competitor. The return depends on your margins, but for most local businesses being invisible online costs more than being found.'],
    ],
    [
        'q' => 'Do you only do SEO, or also ads and social media?',
        'a' => ['<strong>I offer SEO, Google and Meta ads, social media marketing and management, web development, AEO and GEO, all handled by one person.</strong> Many Kodagu businesses need more than rankings, so I run these as one connected strategy rather than separate services. You can start with just SEO or hand over the full digital marketing picture, whichever fits your business and budget.'],
    ],
    [
        'q' => 'Can you manage social media for a Kodagu business?',
        'a' => ['<strong>Yes. I plan and manage Instagram and Facebook content, Reels and posting schedules for Kodagu businesses, especially homestays, resorts, cafes and produce brands.</strong> Coorg&#8217;s landscapes make it one of the strongest visual-marketing opportunities in India, and I align content to the seasons that actually drive bookings and enquiries. WhatsApp is usually the closing channel here, so social and enquiry capture are set up to work together.'],
    ],
    [
        'q' => 'How is a local consultant different from a Mangaluru or Bangalore agency?',
        'a' => ['<strong>A Kodagu-based consultant gives you first-hand local knowledge and direct access, while most agencies serve Coorg remotely through a location landing page.</strong> I live in Kushalnagar, so I understand town-level search behaviour, seasonal tourism patterns and bilingual queries directly. You work with me on every part of the engagement, with no account managers, no junior handoffs and no attention split across other regions.'],
    ],
    [
        'q' => 'How can my Kodagu business get cited by ChatGPT and Perplexity?',
        'a' => ['<strong>AI engines cite businesses that are fact-dense, clearly structured with Schema.org markup, backed by clear entity signals, and corroborated by third-party mentions and reviews.</strong> In practice that means a clean Google Business Profile, consistent name, address and phone data everywhere, answer-first content, and genuine mentions elsewhere. Perplexity favours fresh content, so a well-structured page can appear relatively quickly. No one can guarantee a citation, but you can make yourself the easiest and most trustworthy source for an AI to quote.'],
    ],
];

/* ── Structured data ──────────────────────────────────────────────────── */
$faq_ld = [];
foreach ($faqs as $f) {
    $plain = trim(html_entity_decode(strip_tags(implode(' ', $f['a'])), ENT_QUOTES, 'UTF-8'));
    $faq_ld[] = [
        '@type' => 'Question',
        'name'  => html_entity_decode($f['q'], ENT_QUOTES, 'UTF-8'),
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $plain],
    ];
}

$schema = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'WebPage',
            '@id'   => 'https://fawazbhseo.in/seo-consultant-kodagu#page',
            'url'   => 'https://fawazbhseo.in/seo-consultant-kodagu',
            'name'  => 'SEO consultant in Kodagu (Coorg), Fawaz BH',
            'about' => ['@id' => 'https://fawazbhseo.in/#fawaz'],
        ],
        [
            '@type'    => 'Person',
            '@id'      => 'https://fawazbhseo.in/#fawaz',
            'name'     => 'Fawaz BH',
            'jobTitle' => 'Independent SEO, AEO and GEO Consultant',
            'url'      => 'https://fawazbhseo.in/',
            'image'    => 'https://fawazbhseo.in/assets/images/fawazbh.webp',
            'telephone'=> '+91-94810-84038',
            'email'    => ['fawazbhseo@gmail.com', 'admin@fawazbhseo.in'],
            'address'  => [
                '@type' => 'PostalAddress',
                'streetAddress'   => 'Kushal Nagar',
                'addressLocality' => 'Kodagu',
                'addressRegion'   => 'Karnataka',
                'postalCode'      => '571234',
                'addressCountry'  => 'IN',
            ],
            'sameAs' => ['https://www.linkedin.com/in/fawazbh', 'https://x.com/fawazbhseo'],
        ],
        [
            '@type'      => 'ProfessionalService',
            '@id'        => 'https://fawazbhseo.in/seo-consultant-kodagu#practice',
            'name'       => 'FawazBHSEO, SEO consultant in Kodagu',
            'founder'    => ['@id' => 'https://fawazbhseo.in/#fawaz'],
            'url'        => 'https://fawazbhseo.in/seo-consultant-kodagu',
            'telephone'  => '+91-94810-84038',
            'priceRange' => 'Scoped per engagement',
            'geo'        => ['@type' => 'GeoCoordinates', 'latitude' => 12.4574, 'longitude' => 75.9608],
            'areaServed' => [
                'Kushalnagar', 'Madikeri', 'Virajpet', 'Somwarpet', 'Suntikoppa',
                'Napoklu', 'Gonikoppal', 'Ponnampet', 'Ammathi', 'Kodagu',
            ],
        ],
        [
            '@type' => 'FAQPage',
            '@id'   => 'https://fawazbhseo.in/seo-consultant-kodagu#faq',
            'mainEntity' => $faq_ld,
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

render_head([
    'title'       => 'SEO consultant in Kodagu (Coorg) | Fawaz BH, FawazBHSEO',
    'description' => 'SEO consultant in Kodagu based in Kushalnagar. Fawaz BH does SEO, AEO, GEO, Google Ads, social media and web development for Coorg businesses. Free audit.',
    'canonical'   => 'https://fawazbhseo.in/seo-consultant-kodagu',
    'schema'      => $schema,
]);

render_header('cities');
?>

<main id="main">

  <!-- 1. HERO -->
  <section class="hero" aria-labelledby="hero-h">
    <div class="wrap hero__grid">

      <div class="hero__lead reveal">
        <p class="eyebrow">Based in Kushalnagar, serving all of Kodagu (Coorg)</p>
        <h1 id="hero-h">SEO consultant in Kodagu, based in Kodagu.</h1>
        <p class="hero__sub">I am <strong>Fawaz BH</strong>, an SEO, AEO and GEO consultant living and working in Kushalnagar, Coorg. I help Kodagu businesses rank on Google, win the local map pack, and get named by AI answer engines like ChatGPT and Perplexity. Certified by Ahrefs and Semrush, working with you directly, with no agency layers and no Mangaluru or Bangalore commute between us.</p>

        <div class="btn-row">
          <a class="btn btn--accent" href="https://wa.me/919481084038?text=Hi%20Fawaz%2C%20I%20am%20a%20Kodagu%20business%20and%20I%20would%20like%20a%20free%20SEO%20audit" target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 21a9 9 0 1 0-8.5-6.1L2 22l6.5-1.6A9 9 0 0 0 12 21Z"/></svg>
            Get a free Kodagu audit
          </a>
          <a class="btn" href="/seo-services">View services and pricing</a>
        </div>

        <p class="eyebrow" style="margin-top:26px">One consultant, every discipline your Kodagu business needs</p>
        <ul class="tags" style="margin-top:12px">
          <li class="tag">SEO</li>
          <li class="tag">Google and Meta Ads</li>
          <li class="tag">AEO</li>
          <li class="tag">GEO</li>
          <li class="tag">Web development</li>
          <li class="tag">Social media management</li>
        </ul>
      </div>

      <div class="hero__figure reveal">
        <figure>
          <img src="/assets/images/fawazbh.webp"
               alt="Fawaz BH, SEO, AEO and GEO consultant based in Kodagu, Karnataka"
               width="440" height="440" fetchpriority="high" decoding="async">
          <figcaption>Fawaz BH, Kushalnagar, Kodagu</figcaption>
        </figure>
        <dl class="readout" style="margin-top:20px">
          <?php foreach ($identity as $row): ?>
          <div class="readout__row">
            <dt><?php echo $row[0]; ?></dt>
            <dd><?php echo $row[1]; ?><small><?php echo $row[2]; ?></small></dd>
          </div>
          <?php endforeach; ?>
        </dl>
      </div>

    </div>
  </section>

  <!-- 2. TRUST STRIP -->
  <section class="trust" aria-label="Local positioning">
    <div class="wrap">
      <p>Madikeri to Virajpet. Kushalnagar to Somwarpet. <span class="accent">A consultant who actually lives here.</span></p>
    </div>
  </section>

  <!-- 3. SERVICES -->
  <section class="section" id="services" aria-labelledby="svc-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">What I do for Kodagu businesses</p>
        <h2 id="svc-h">Everything your business needs to be found</h2>
        <p class="lede">SEO is the core, but a homestay, coffee brand, clinic or shop in Kodagu usually needs more than rankings. I run search, ads, content, social and the website itself as one connected system, so nothing works against anything else.</p>
      </div>

      <div class="grid grid--3">
        <?php $n = 1; foreach ($services as $s): ?>
        <article class="card<?php echo $s['featured'] ? ' card--featured' : ''; ?> reveal">
          <span class="card-index"><?php echo str_pad((string) $n, 2, '0', STR_PAD_LEFT); ?></span>
          <h3><?php echo $s['title']; ?></h3>
          <p><?php echo $s['body']; ?></p>
          <ul class="tags">
            <?php foreach ($s['tags'] as $t): ?>
            <li class="tag"><?php echo $t; ?></li>
            <?php endforeach; ?>
          </ul>
        </article>
        <?php $n++; endforeach; ?>
      </div>

      <div class="btn-row reveal" style="margin-top:clamp(34px,4vw,48px)">
        <a class="btn" href="/seo-services">See full services and pricing</a>
      </div>
    </div>
  </section>

  <!-- 4. TOWNS SERVED -->
  <section class="section section--alt" id="areas" aria-labelledby="areas-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">Every corner of the district</p>
        <h2 id="areas-h">Kodagu is not one market</h2>
        <p class="lede">A homestay in Somwarpet, a clinic in Madikeri and a coffee brand in Virajpet do not search the same way or compete for the same customers. I build strategy town by town, because I live here and I know the difference.</p>
      </div>

      <div>
        <?php foreach ($towns as $i => $t): ?>
        <article class="card<?php echo $t['featured'] ? ' card--featured' : ''; ?> reveal"<?php echo $i ? ' style="margin-top:22px"' : ''; ?>>
          <span class="card-index"><?php echo $t['tier']; ?></span>
          <h3><?php echo $t['title']; ?></h3>
          <p><?php echo $t['body']; ?></p>
          <ul class="tags" style="margin-top:16px;margin-bottom:0">
            <?php foreach ($t['places'] as $p): ?>
            <li class="tag"><?php echo $p; ?></li>
            <?php endforeach; ?>
          </ul>
          <?php if (!empty($t['page'])): ?>
          <p style="margin-top:18px">
            <a class="link-arrow" href="<?php echo $t['page'][0]; ?>"><?php echo $t['page'][1]; ?>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
          </p>
          <?php endif; ?>
        </article>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!-- 5. WHY LOCAL MATTERS -->
  <section class="section" id="why" aria-labelledby="why-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">Why local matters</p>
        <h2 id="why-h">A consultant who actually lives here</h2>
        <p class="lede">Most Coorg digital marketing comes from agencies in Mangaluru or Bangalore renting a location page. I am not a landing page. I live in Kushalnagar, I know these towns, and you work with me directly.</p>
      </div>

      <ol class="why-list reveal">
        <?php $n = 1; foreach ($why as $w): ?>
        <li>
          <span class="idx"><?php echo str_pad((string) $n, 2, '0', STR_PAD_LEFT); ?></span>
          <div>
            <h3><?php echo $w[0]; ?></h3>
            <p><?php echo $w[1]; ?></p>
          </div>
        </li>
        <?php $n++; endforeach; ?>
      </ol>

    </div>
  </section>

  <!-- 6. PROCESS -->
  <section class="section section--alt" id="process" aria-labelledby="proc-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">How we work together</p>
        <h2 id="proc-h">From free audit to steady results</h2>
        <p class="lede">Clear steps, clear expectations, and a scope agreed before anything starts. No surprise invoices and no black-box reporting.</p>
      </div>

      <div class="grid grid--2">
        <article class="step reveal">
          <p class="step__k">01 &nbsp; AUDIT</p>
          <h3>Free discovery audit</h3>
          <p>A focused review of your site, Google Business Profile, local rankings and AI visibility that surfaces the real gaps and the fastest wins for your Kodagu market.</p>
        </article>
        <article class="step reveal">
          <p class="step__k">02 &nbsp; PLAN</p>
          <h3>Scoped roadmap</h3>
          <p>A prioritised plan built around your town, niche, competitors and season, with a clear scope and price agreed up front before work begins.</p>
        </article>
        <article class="step reveal">
          <p class="step__k">03 &nbsp; EXECUTE</p>
          <h3>Hands-on delivery</h3>
          <p>Technical fixes, content, structured data, ads and social, carried out directly by me, not passed down a chain of juniors.</p>
        </article>
        <article class="step reveal">
          <p class="step__k">04 &nbsp; GROW</p>
          <h3>Report and refine</h3>
          <p>Plain-English reporting on rankings, traffic, enquiries and AI-citation visibility, with continuous optimisation as the season and the engines shift.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- 7. CASE STUDY -->
  <section class="section" id="case-study" aria-labelledby="case-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Proof from Kodagu</p>
        <h2 id="case-h">Green Coorg Spices, a local result</h2>
      </div>

      <div class="grid grid--2">
        <figure class="card card--featured quote reveal">
          <span class="card-index">Case study, Kushalnagar, Kodagu</span>
          <blockquote>&#8220;We went from page one being a distant dream to real online orders coming in from Bangalore and Mysore. Fawaz understood the Kodagu market in a way no one else we spoke to did.&#8221;</blockquote>
          <figcaption>
            <cite>Green Coorg Spices</cite>
            <span class="biz">Spice and produce brand, Kushalnagar, Kodagu</span>
          </figcaption>
          <div class="btn-row" style="margin-top:22px">
            <a class="btn" href="https://greencoorgspices.in" target="_blank" rel="noopener">Visit Green Coorg Spices</a>
          </div>
        </figure>

        <div>
          <article class="card reveal">
            <h3>Local intent, wider reach</h3>
            <p>A Kodagu spice brand structured to sell beyond the district, reaching buyers in Bangalore and Mysuru through search.</p>
          </article>
          <article class="card reveal" style="margin-top:22px">
            <h3>Real orders, not vanity metrics</h3>
            <p>The measure that mattered was online orders coming in, not impressions on a chart.</p>
          </article>
          <article class="card reveal" style="margin-top:22px">
            <h3>Market understanding as the edge</h3>
            <p>The difference the client named was genuine Kodagu context, the thing distant agencies could not offer.</p>
          </article>
        </div>
      </div>

      <div class="btn-row reveal" style="margin-top:clamp(30px,3.5vw,42px)">
        <a class="link-arrow" href="/case-studies">Read the full case study</a>
      </div>
    </div>
  </section>

  <!-- 8. FAQ -->
  <section class="section section--alt" id="faq" aria-labelledby="faq-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">Kodagu SEO questions</p>
        <h2 id="faq-h">Straight answers</h2>
        <p class="lede">Written answer-first, so a real business owner gets a useful reply and answer engines can quote them cleanly.</p>
      </div>

      <div>
        <?php foreach ($faqs as $f): ?>
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

  <!-- 9. CONTACT -->
  <?php render_contact_form([
      'heading' => 'Let us get your Kodagu business found',
      'lede'    => 'Send the form or reach me directly. I reply personally, usually the same day.',
      'id'      => 'contact',
  ]); ?>

</main>

<?php
render_floating_button('Hi Fawaz, I am a Kodagu business and I would like a free audit.');
render_footer();
