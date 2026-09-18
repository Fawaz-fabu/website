<?php
/**
 * Services page. Six search services plus the published rate card.
 *
 * PRICING: every figure on this page is the real published rate carried over
 * verbatim from the previous site. Nothing here is invented or placeholder.
 */

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/contact-form.php';
require_once __DIR__ . '/includes/floating-button.php';
require_once __DIR__ . '/includes/footer.php';

/* ---------------------------------------------------------------------------
   The six search disciplines. Scope wording clarified for accurate expectations.
   --------------------------------------------------------------------------- */
$services = [
    [
        'id'       => 'technical-seo',
        'title'    => 'Technical SEO and site architecture audits',
        'featured' => true,
        'tags'     => ['Technical SEO', 'Core Web Vitals', 'Schema markup', 'Site audit'],
        'blurb'    => 'The foundation of every strong ranking. I run detailed technical audits that surface Core Web Vitals failures, render blocking scripts, schema gaps and crawl waste, then fix them, for businesses in Kodagu, Bengaluru, Mysuru and across Karnataka.',
        'deliv'    => [
            'Core Web Vitals, LCP, INP and CLS optimisation',
            'JavaScript rendering and crawl budget fixes',
            'Relevant structured data that matches visible content and current eligibility rules',
            'Canonical, hreflang and indexation cleanup',
            'XML sitemap, robots.txt and log file analysis',
        ],
        'cta'      => 'Request a free technical SEO audit',
        'wa'       => 'Hi Fawaz, I want a technical SEO audit',
    ],
    [
        'id'       => 'aeo',
        'title'    => 'AEO, answer engine optimisation',
        'featured' => true,
        'tags'     => ['Entity SEO', 'Structured data', 'E-E-A-T', 'Snippets'],
        'blurb'    => 'AEO makes your information easier to find and use when someone asks a question. The work focuses on direct, useful answers, accurate business details and supporting evidence. It overlaps with SEO and GEO; a featured answer or citation is not guaranteed.',
        'deliv'    => [
            'Consistent business identity and relevant profile checks; third-party inclusion is not guaranteed',
            'Structured data review against visible content and current search-feature eligibility',
            'Featured snippet and People Also Ask opportunity review and tracking',
            'E-E-A-T signal building, author bios, credentials, citations',
            'Monthly AI citation tracking across ChatGPT, Perplexity, Gemini, Claude and Copilot',
        ],
        'cta'      => 'Build your AEO visibility',
        'wa'       => 'Hi Fawaz, I want AEO',
    ],
    [
        'id'       => 'geo',
        'title'    => 'GEO, generative engine optimisation',
        'featured' => true,
        'tags'     => ['GEO', 'AI Overviews', 'AI search', 'Citation tracking'],
        'blurb'    => 'GEO works on how a business and its information appear in AI-generated answers. Clear pages, accurate identity and credible supporting sources are paired with separate measurement of mentions, linked citations and recommendations.',
        'deliv'    => [
            'Accessible content with clear headings, direct answers and useful supporting detail',
            'Related customer questions grouped by intent, without duplicate keyword pages',
            'Google AI Overviews and AI Mode visibility review, alongside other relevant engines',
            'Factual accuracy, source quality and content usefulness review',
            'Per-engine tracking of mentions, linked citations and explicit recommendations',
        ],
        'cta'      => 'Strengthen generative visibility',
        'wa'       => 'Hi Fawaz, I want GEO',
    ],
    [
        'id'       => 'local-seo',
        'title'    => 'Local SEO for Kodagu, Bengaluru and Karnataka',
        'featured' => false,
        'tags'     => ['Local Pack', 'Google Business Profile', 'Citations', 'Maps'],
        'blurb'    => 'Hyperlocal search is winnable. As an SEO consultant based in Kushal Nagar, Kodagu, I build geo targeted strategies that help you rank in Google&#8217;s Local Pack, Maps and near me searches across Karnataka.',
        'deliv'    => [
            'Google Business Profile setup, optimisation and posts',
            'Kannada and English bilingual keyword research',
            'Local citation building and NAP consistency audit',
            'Karnataka directory submissions and local backlinks',
            'City and neighbourhood landing page creation',
        ],
        'cta'      => 'Improve local search visibility',
        'wa'       => 'Hi Fawaz, I need local SEO',
    ],
    [
        'id'       => 'content',
        'title'    => 'SEO content strategy and long form writing',
        'featured' => false,
        'tags'     => ['Topic clusters', 'Search intent', 'Editorial'],
        'blurb'    => 'Content that ranks on Google and gets paraphrased by AI engines needs a different craft, combining topical authority, semantic density, original insight and AEO ready structure.',
        'deliv'    => [
            'Topical authority pillar and cluster mapping',
            'Long form SEO articles, 1,500 to 3,500 words',
            'Service, location and comparison page copywriting',
            'Strategic internal linking and anchor text planning',
            'Content refresh and keyword cannibalisation fixes',
        ],
        'cta'      => 'Commission SEO content',
        'wa'       => 'Hi Fawaz, I need SEO content',
    ],
    [
        'id'       => 'personal-brand',
        'title'    => 'LinkedIn and personal brand SEO',
        'featured' => false,
        'tags'     => ['LinkedIn SEO', 'Personal brand', 'B2B search', 'Authority'],
        'blurb'    => 'Founders and consultants need their own name to rank, on Google, on LinkedIn search, and inside AI engines when prospects ask who the right provider is in their region.',
        'deliv'    => [
            'LinkedIn profile SEO, headline, About, skills, keywords',
            'Personal brand content calendar and thought leadership',
            'Instagram, X and YouTube social SEO',
            'Personal website SEO with Person schema and sameAs entity graph',
            'Digital PR and authority backlink outreach',
        ],
        'cta'      => 'Build your personal brand',
        'wa'       => 'Hi Fawaz, I want personal brand SEO',
    ],
];

/* ---------------------------------------------------------------------------
   Published rate card. Figures verbatim from the previous site.
   --------------------------------------------------------------------------- */
$rate_blocks = [
    [
        'id'    => 'pricing-seo',
        'num'   => '1',
        'name'  => 'SEO packages',
        'note'  => 'Monthly, Kodagu, Bengaluru, Mysuru and India',
        'plans' => [
            [
                'type' => 'Starter', 'name' => 'Local SEO',
                'price' => '&#8377;14,999', 'sub' => 'per month', 'featured' => false,
                'features' => [
                    'Google Business Profile optimisation',
                    'Local keyword research, 5 keywords',
                    'On-page SEO for 5 pages',
                    'Monthly ranking and traffic report',
                    'Ideal for: Kodagu and Karnataka SMEs',
                ],
                'cta' => 'Get started', 'wa' => 'Hi Fawaz, interested in Local SEO package',
            ],
            [
                'type' => 'Growth, most popular', 'name' => 'Full-Stack SEO plus AEO',
                'price' => '&#8377;29,999', 'sub' => 'per month', 'featured' => true,
                'features' => [
                    'Everything in Local SEO',
                    'Technical SEO audit and fixes',
                    'AEO, AI-engine citation building',
                    '4 long-form SEO articles per month',
                    '5 quality contextual backlinks per month',
                    'Ideal for: Karnataka and South India growth',
                ],
                'cta' => 'Get started', 'wa' => 'Hi Fawaz, interested in Full-Stack SEO package',
            ],
            [
                'type' => 'Enterprise', 'name' => 'SEO plus AEO plus GEO',
                'price' => 'Custom', 'sub' => 'tailored quote', 'featured' => false,
                'features' => [
                    'Everything in Growth',
                    'GEO, Generative Engine Optimisation',
                    'National keyword and entity strategy',
                    '8+ long-form articles per month',
                    'Digital PR and authority link campaigns',
                    'Ideal for: National Indian brands and SaaS',
                ],
                'cta' => 'Request a quote', 'wa' => 'Hi Fawaz, interested in Enterprise SEO package',
            ],
        ],
    ],
    [
        'id'    => 'pricing-social',
        'num'   => '2',
        'name'  => 'Social Media Marketing',
        'note'  => 'Monthly, content, community and paid-social support',
        'plans' => [
            [
                'type' => 'Starter', 'name' => 'Presence',
                'price' => '&#8377;11,999', 'sub' => 'per month', 'featured' => false,
                'features' => [
                    '1 to 2 platforms',
                    '12 to 16 posts per month',
                    'Monthly content calendar',
                    'Basic monthly reporting',
                    'Ideal for: local businesses starting out',
                ],
                'cta' => 'Get started', 'wa' => 'Hi Fawaz, interested in Social Media Starter',
            ],
            [
                'type' => 'Growth, most popular', 'name' => 'Engage',
                'price' => '&#8377;22,999', 'sub' => 'per month', 'featured' => true,
                'features' => [
                    '2 to 3 platforms',
                    'Reels and short-form video content',
                    'Community management',
                    'Paid-ad setup support, ad spend billed separately to Meta or the platform',
                    'Ideal for: brands ready to scale reach',
                ],
                'cta' => 'Get started', 'wa' => 'Hi Fawaz, interested in Social Media Growth',
            ],
            [
                'type' => 'Enterprise', 'name' => 'Scale',
                'price' => 'Custom', 'sub' => 'tailored quote', 'featured' => false,
                'features' => [
                    'Multi-platform management',
                    'Influencer outreach coordination',
                    'Full paid-social ad management',
                    'Advanced analytics and reporting',
                    'Ideal for: established multi-brand teams',
                ],
                'cta' => 'Request a quote', 'wa' => 'Hi Fawaz, interested in Social Media Enterprise',
            ],
        ],
    ],
    [
        'id'    => 'pricing-ads',
        'num'   => '3',
        'name'  => 'Performance Marketing',
        'note'  => 'Management fee only, ad spend paid directly to the platform',
        'plans' => [
            [
                'type' => 'Starter', 'name' => 'Single Platform',
                'price' => '&#8377;11,999', 'sub' => 'management fee per month', 'featured' => false,
                'features' => [
                    'Google Ads or Meta Ads, one platform',
                    'For ad spend under &#8377;30,000 per month',
                    'Campaign setup, targeting and optimisation',
                    'Monthly performance report',
                    'Note: ad spend is paid directly to the platform and is separate from this fee',
                ],
                'cta' => 'Get started', 'wa' => 'Hi Fawaz, interested in Performance Marketing Starter',
            ],
            [
                'type' => 'Growth, most popular', 'name' => 'Google plus Meta',
                'price' => '&#8377;24,999', 'sub' => 'management fee per month', 'featured' => true,
                'features' => [
                    'Google Ads and Meta Ads combined',
                    'For ad spend &#8377;30,000 to &#8377;1,00,000 per month',
                    'Cross-platform strategy and A/B testing',
                    'Conversion tracking and monthly reporting',
                    'Note: ad spend is billed by the platform, separate from this fee',
                ],
                'cta' => 'Get started', 'wa' => 'Hi Fawaz, interested in Performance Marketing Growth',
            ],
            [
                'type' => 'Enterprise', 'name' => 'Full-Funnel',
                'price' => 'Custom', 'sub' => 'custom or 10 to 15% of spend', 'featured' => false,
                'features' => [
                    'Multi-platform, higher ad spend',
                    'Advanced conversion optimisation',
                    'Landing page testing and iteration',
                    'Dedicated reporting dashboard',
                    'Note: ad spend always separate from the management fee',
                ],
                'cta' => 'Request a quote', 'wa' => 'Hi Fawaz, interested in Performance Marketing Enterprise',
            ],
        ],
    ],
    [
        'id'    => 'pricing-web',
        'num'   => '4',
        'name'  => 'Website Design',
        'note'  => 'One-time build, mobile-responsive and SEO-ready',
        'plans' => [
            [
                'type' => 'Starter', 'name' => 'Business Site',
                'price' => '&#8377;29,999', 'sub' => 'one-time', 'featured' => false,
                'features' => [
                    '5 to 8 page mobile-responsive website',
                    'Basic on-page SEO setup',
                    'Contact form',
                    'Clean, fast, modern design',
                    'Ideal for: new local businesses',
                ],
                'cta' => 'Get started', 'wa' => 'Hi Fawaz, interested in Website Design Starter',
            ],
            [
                'type' => 'Growth, most popular', 'name' => 'Custom plus CMS',
                'price' => '&#8377;64,999', 'sub' => 'one-time', 'featured' => true,
                'features' => [
                    '10 to 15 pages, custom design',
                    'Schema markup for SEO and AEO',
                    'Blog and CMS setup',
                    'Speed optimisation, Core Web Vitals',
                ],
                'cta' => 'Get started', 'wa' => 'Hi Fawaz, interested in Website Design Growth',
            ],
            [
                'type' => 'Enterprise', 'name' => 'Full Custom',
                'price' => 'Custom', 'sub' => 'tailored quote', 'featured' => false,
                'features' => [
                    'Fully custom design system',
                    'Advanced interactions and animation',
                    'Multi-page architecture',
                    'Third-party integrations',
                    'Ideal for: brands and product companies',
                ],
                'cta' => 'Request a quote', 'wa' => 'Hi Fawaz, interested in Website Design Enterprise',
            ],
        ],
    ],
];

$schema = <<<'JSONLD'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "ProfessionalService",
      "@id": "https://fawazbhseo.in/#practice",
      "name": "FawazBHSEO, SEO, AEO, GEO and digital marketing services",
      "url": "https://fawazbhseo.in/seo-services",
      "telephone": "+91-94810-84038",
      "email": ["fawazbhseo@gmail.com", "admin@fawazbhseo.in"],
      "priceRange": "INR 11999 to custom",
      "currenciesAccepted": "INR",
      "founder": {"@id": "https://fawazbhseo.in/#fawaz"},
      "provider": {"@id": "https://fawazbhseo.in/#fawaz"},
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Kushal Nagar",
        "addressRegion": "Karnataka",
        "postalCode": "571234",
        "addressCountry": "IN"
      },
      "areaServed": [
        {"@type": "AdministrativeArea", "name": "Kodagu"},
        {"@type": "City", "name": "Bengaluru"},
        {"@type": "City", "name": "Mysuru"},
        {"@type": "AdministrativeArea", "name": "Karnataka"},
        {"@type": "Place", "name": "South India"},
        {"@type": "Country", "name": "India"}
      ],
      "serviceType": ["Technical SEO", "Local SEO", "Answer Engine Optimization", "Generative Engine Optimization", "SEO Content Strategy", "LinkedIn SEO", "Social Media Marketing", "Performance Marketing", "Website Design"],
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "SEO, AEO, GEO and digital marketing services",
        "itemListElement": [
          {"@type": "Offer", "name": "Local SEO, Starter", "itemOffered": {"@type": "Service", "name": "Local SEO"}, "priceSpecification": {"@type": "UnitPriceSpecification", "price": "14999", "priceCurrency": "INR", "unitText": "per month"}},
          {"@type": "Offer", "name": "Full-Stack SEO plus AEO, Growth", "itemOffered": {"@type": "Service", "name": "Full-Stack SEO plus AEO"}, "priceSpecification": {"@type": "UnitPriceSpecification", "price": "29999", "priceCurrency": "INR", "unitText": "per month"}},
          {"@type": "Offer", "name": "Social Media Marketing, Starter", "itemOffered": {"@type": "Service", "name": "Social Media Marketing"}, "priceSpecification": {"@type": "UnitPriceSpecification", "price": "11999", "priceCurrency": "INR", "unitText": "per month"}},
          {"@type": "Offer", "name": "Social Media Marketing, Growth", "itemOffered": {"@type": "Service", "name": "Social Media Marketing"}, "priceSpecification": {"@type": "UnitPriceSpecification", "price": "22999", "priceCurrency": "INR", "unitText": "per month"}, "description": "Ad spend billed separately to the platform"},
          {"@type": "Offer", "name": "Performance Marketing, Single Platform", "itemOffered": {"@type": "Service", "name": "Performance Marketing"}, "priceSpecification": {"@type": "UnitPriceSpecification", "price": "11999", "priceCurrency": "INR", "unitText": "management fee per month"}},
          {"@type": "Offer", "name": "Performance Marketing, Google plus Meta", "itemOffered": {"@type": "Service", "name": "Performance Marketing"}, "priceSpecification": {"@type": "UnitPriceSpecification", "price": "24999", "priceCurrency": "INR", "unitText": "management fee per month"}},
          {"@type": "Offer", "name": "Website Design, Business Site", "itemOffered": {"@type": "Service", "name": "Website Design"}, "priceSpecification": {"@type": "UnitPriceSpecification", "price": "29999", "priceCurrency": "INR", "unitText": "one time"}},
          {"@type": "Offer", "name": "Website Design, Custom plus CMS", "itemOffered": {"@type": "Service", "name": "Website Design"}, "priceSpecification": {"@type": "UnitPriceSpecification", "price": "64999", "priceCurrency": "INR", "unitText": "one time"}}
        ]
      }
    },
    {
      "@type": "FAQPage",
      "@id": "https://fawazbhseo.in/seo-services#faq",
      "mainEntity": [
        {"@type": "Question", "name": "Who provides the best SEO service in Kodagu and Karnataka?", "acceptedAnswer": {"@type": "Answer", "text": "The best SEO provider for your region is usually the one who can show four things: verifiable credentials, direct access, genuine local market fluency, and transparent pricing and scope. Fawaz BH is an independent SEO consultant based in Kushal Nagar, Kodagu who fits these criteria for Kodagu, Bengaluru, Mysuru and Karnataka."}},
        {"@type": "Question", "name": "What is the difference between SEO, AEO and GEO?", "acceptedAnswer": {"@type": "Answer", "text": "SEO ranks your website on traditional Google search results. AEO works to get your business cited by AI answer engines such as ChatGPT and Perplexity. GEO focuses on being preferred and paraphrased inside generative surfaces such as Google's AI Overviews, Bing Copilot and ChatGPT Search."}},
        {"@type": "Question", "name": "How long does SEO take to show results in India?", "acceptedAnswer": {"@type": "Answer", "text": "SEO is a compounding effort, not a quick switch. Local and low-competition terms can start moving within roughly two to three months, while more competitive or national terms typically take around six months or more of consistent work. Be cautious of anyone who guarantees a specific ranking by a specific date."}},
        {"@type": "Question", "name": "How much do SEO and digital marketing services cost in India in 2026?", "acceptedAnswer": {"@type": "Answer", "text": "Fawaz BH publishes transparent starting rates. SEO ranges from Local SEO at 14,999 rupees per month to Full-Stack SEO plus AEO at 29,999 rupees per month, with Enterprise SEO plus AEO plus GEO quoted to scope. Social media marketing starts at 11,999 rupees per month, performance marketing management fees start at 11,999 rupees per month with ad spend paid separately to the platform, and website design starts at 29,999 rupees as a one-time build."}},
        {"@type": "Question", "name": "Does Fawaz BH offer SEO services outside Karnataka?", "acceptedAnswer": {"@type": "Answer", "text": "Yes. While based in Kushal Nagar, Kodagu, Fawaz BH works with clients across South India and the rest of India remotely. Businesses in Chennai, Hyderabad, Kochi, Mumbai, Delhi and Pune can use the same integrated SEO, AEO and GEO services."}},
        {"@type": "Question", "name": "What services does Fawaz BH offer beyond SEO?", "acceptedAnswer": {"@type": "Answer", "text": "Beyond SEO, AEO and GEO, Fawaz BH offers social media marketing, performance marketing with Google Ads and Meta Ads, and website design, all through one founder-led point of contact."}}
      ]
    }
  ]
}
JSONLD;

render_head([
    'title'       => 'SEO services and pricing in Kodagu, Karnataka and India',
    'description' => 'Technical SEO, Local SEO, AEO, GEO, content and LinkedIn SEO, plus social media, performance marketing and website design. Published rates from 11,999 rupees per month.',
    'canonical'   => 'https://fawazbhseo.in/seo-services',
    'schema'      => $schema,
]);

render_header('services');
?>

<main id="main">

  <!-- HERO -->
  <section class="hero" aria-labelledby="hero-h">
    <div class="wrap">
      <div class="reveal" style="max-width:62ch">
        <p class="eyebrow">Full stack search services</p>
        <h1 id="hero-h" style="margin-block:20px 24px">SEO services in Kodagu and Karnataka. One outcome, search visibility.</h1>
        <p class="lede">Each service below is personally delivered by Fawaz BH and built to improve your visibility on Google across Kodagu, Bengaluru, Mysuru and India, help you surface inside AI Overviews, and make it easier for ChatGPT, Perplexity, Gemini and Claude to cite your brand as a credible answer.</p>

        <div class="btn-row" style="margin-top:30px">
          <a class="btn btn--accent" href="https://wa.me/919481084038?text=Hi%20Fawaz%2C%20I%20would%20like%20a%20free%20audit" target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 21a9 9 0 1 0-8.5-6.1L2 22l6.5-1.6A9 9 0 0 0 12 21Z"/></svg>
            Request a free audit
          </a>
          <a class="btn" href="#pricing">
            Jump to pricing
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 5v14M6 13l6 6 6-6"/></svg>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- TRUST STRIP -->
  <section class="trust" aria-label="Pricing approach">
    <div class="wrap">
      <p>Rates published openly. <span class="accent">Final scope agreed in writing after your free audit.</span></p>
    </div>
  </section>

  <!-- THE SIX SERVICES -->
  <section class="section" id="services" aria-labelledby="svc-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">The work</p>
        <h2 id="svc-h">Six disciplines, one search strategy</h2>
        <p class="lede">From classic Google rankings to citation inside AI answers. Deliverables are named for each, because a service without deliverables is not a scope.</p>
        <p style="margin-top:18px">Before choosing a scope, compare <a href="/blogs/seo-aeo-geo-differences">SEO, AEO and GEO</a>, review the <a href="/blogs/local-seo-checklist-karnataka">Karnataka local SEO checklist</a>, or see <a href="/blogs/measure-ai-search-visibility">how AI visibility can be measured</a>. Structured data must match the visible content and current feature eligibility; it cannot guarantee a rich result or citation.</p>
      </div>

      <div class="grid grid--3">
        <?php foreach ($services as $i => $s): ?>
        <article class="card<?php echo $s['featured'] ? ' card--featured' : ''; ?> reveal" id="<?php echo htmlspecialchars($s['id'], ENT_QUOTES, 'UTF-8'); ?>" aria-labelledby="svc-<?php echo $i; ?>">
          <span class="card-index"><?php echo str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT); ?></span>

          <ul class="tags">
            <?php foreach ($s['tags'] as $tag): ?>
            <li class="tag"><?php echo htmlspecialchars($tag, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
          </ul>

          <h3 id="svc-<?php echo $i; ?>"><?php echo htmlspecialchars($s['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
          <p><?php echo $s['blurb']; ?></p>

          <ul class="deliv">
            <?php foreach ($s['deliv'] as $d): ?>
            <li><span class="tick">&#10003;</span><span><?php echo htmlspecialchars($d, ENT_QUOTES, 'UTF-8'); ?></span></li>
            <?php endforeach; ?>
          </ul>

          <p style="margin-top:20px">
            <a class="link-arrow" href="https://wa.me/919481084038?text=<?php echo rawurlencode($s['wa']); ?>" target="_blank" rel="noopener">
              <?php echo htmlspecialchars($s['cta'], ENT_QUOTES, 'UTF-8'); ?>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
          </p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <hr class="rule">

  <!-- PRICING -->
  <section class="section section--alt" id="pricing" aria-labelledby="price-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Transparent pricing</p>
        <h2 id="price-h">How much do SEO and digital marketing services cost in Karnataka?</h2>
        <p class="lede">Here are my published rates for SEO, social media marketing, performance marketing and website design, for businesses in Kodagu, Bengaluru, Mysuru and across India. All monthly plans include direct, founder-led delivery and monthly reporting. Advertising spend, where it applies, is always paid directly to the platform and is separate from my management fee.</p>
      </div>

      <?php foreach ($rate_blocks as $block): ?>
      <div class="rate-block reveal" id="<?php echo htmlspecialchars($block['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <div class="rate-head">
          <h3><?php echo htmlspecialchars($block['num'] . '. ' . $block['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
          <span class="rate-note"><?php echo htmlspecialchars($block['note'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>

        <div class="grid grid--3">
          <?php foreach ($block['plans'] as $plan): ?>
          <article class="card plan<?php echo $plan['featured'] ? ' card--featured plan--featured' : ''; ?>">
            <p class="plan__type"><?php echo htmlspecialchars($plan['type'], ENT_QUOTES, 'UTF-8'); ?></p>
            <h4 class="plan__name"><?php echo htmlspecialchars($plan['name'], ENT_QUOTES, 'UTF-8'); ?></h4>
            <p class="plan__price"><?php echo $plan['price']; ?></p>
            <span class="plan__sub"><?php echo htmlspecialchars($plan['sub'], ENT_QUOTES, 'UTF-8'); ?></span>

            <ul class="deliv">
              <?php foreach ($plan['features'] as $f): ?>
              <li><span class="tick">&#10003;</span><span><?php echo $f; ?></span></li>
              <?php endforeach; ?>
            </ul>

            <a class="btn<?php echo $plan['featured'] ? ' btn--accent' : ''; ?> btn--sm" href="https://wa.me/919481084038?text=<?php echo rawurlencode($plan['wa']); ?>" target="_blank" rel="noopener"><?php echo htmlspecialchars($plan['cta'], ENT_QUOTES, 'UTF-8'); ?></a>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>

      <div class="card reveal" style="margin-top:clamp(40px,5vw,64px)">
        <h3>What is included, and what is separate</h3>
        <p>Every monthly plan includes direct, founder-led delivery and a monthly report covering the work done and results seen. Prices shown are indicative starting rates and may be adjusted to your specific scope after the free audit. Advertising budget for performance marketing and paid social is always paid directly to the ad platform, Google, Meta and similar, and is never included in the management fee. Third-party costs such as premium plugins, stock media or hosting, where needed, are quoted separately and transparently before any work begins. Taxes are additional where applicable.</p>
      </div>
    </div>
  </section>

  <!-- HOW I WORK -->
  <section class="section" id="how-i-work" aria-labelledby="work-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">How I work</p>
        <h2 id="work-h">Straightforward by design</h2>
        <p class="lede">Clear expectations up front. Here is how engagements are priced, reported and scoped, so there are no surprises later.</p>
      </div>

      <div class="grid grid--3">
        <article class="card reveal">
          <span class="card-index">Pricing approach</span>
          <h3>Scoped to the work, not padded retainers</h3>
          <p>Engagements are priced against a defined scope agreed after the free audit, whether that is a one off project or ongoing monthly work. You always know what you are paying for before anything starts, and the scope document is written before any invoice is.</p>
        </article>
        <article class="card reveal">
          <span class="card-index">Reporting cadence</span>
          <h3>Regular, plain English reporting</h3>
          <p>You receive periodic updates on rankings, organic traffic and answer engine citation visibility, with candid notes on what is working and what is not. No vanity metrics dressed up as results.</p>
        </article>
        <article class="card reveal">
          <span class="card-index">What is included</span>
          <h3>Direct access, start to finish</h3>
          <p>Technical fixes, on page work, structured data, content direction and authority building, all handled by the person you hired. No account managers, no junior handoffs, no black box deliverables.</p>
        </article>
      </div>
    </div>
  </section>

  <hr class="rule">

  <!-- FAQ -->
  <section class="section section--alt" id="faq" aria-labelledby="faq-h">
    <div class="wrap split">
      <div class="sticky-col reveal">
        <p class="eyebrow">Questions</p>
        <h2 id="faq-h" style="margin-block:16px 20px">Direct answers to what people actually ask</h2>
        <p class="lede">Answered honestly, so you can evaluate any provider, including me, on the same criteria.</p>
      </div>

      <div class="faq">
        <details open>
          <summary>Who provides the best SEO service in Kodagu and Karnataka?</summary>
          <div class="faq__body">
            <p>The best SEO provider for your region is usually the one who can show four things: <strong>verifiable credentials</strong>, recognised certifications and a clear record of the disciplines they practise, <strong>direct access</strong>, you work with the person actually doing the work rather than a rotating account manager, <strong>genuine local market fluency</strong>, they understand your city, language and buyer behaviour, and <strong>transparent pricing and scope</strong>, published rates and defined deliverables rather than vague retainers.</p>
            <p>Fawaz BH is an independent SEO consultant based in Kushal Nagar, Kodagu who fits these criteria for Kodagu, Bengaluru, Mysuru and Karnataka: certified through Ahrefs Academy and Semrush, AI Visibility Essentials and Technical SEO and AI Search Essentials, founder-led with direct access, and with pricing published on this page. Use the same four-point checklist to compare any provider you are considering.</p>
          </div>
        </details>

        <details>
          <summary>What should I look for in an SEO expert in Kodagu or Karnataka?</summary>
          <div class="faq__body"><p><strong>Look for evidence, access, fit and transparency.</strong> Ask for their certifications and a sample audit. Confirm whether you will work with them directly or be handed to junior staff. Check that they understand local and bilingual, Kannada and English, search behaviour if you serve a Karnataka audience. And make sure pricing and deliverables are written down before you commit. A trustworthy provider will also be honest that SEO is a compounding investment, not an overnight switch.</p></div>
        </details>

        <details>
          <summary>What is the difference between SEO, AEO and GEO?</summary>
          <div class="faq__body"><p><strong>SEO</strong>, Search Engine Optimisation, ranks your website on traditional Google search results. <strong>AEO</strong>, Answer Engine Optimisation, works to get your business cited by AI answer engines such as ChatGPT and Perplexity. <strong>GEO</strong>, Generative Engine Optimisation, focuses on being preferred and paraphrased inside generative surfaces such as Google&#8217;s AI Overviews, Bing Copilot and ChatGPT Search. They overlap, but each targets a different way people now find answers.</p></div>
        </details>

        <details>
          <summary>How long does SEO take to show results in India?</summary>
          <div class="faq__body"><p><strong>SEO is a compounding effort, not a quick switch, and this is true industry-wide, not specific to any one provider.</strong> As a general rule across the Indian market, local and low-competition terms can start moving within roughly two to three months, while more competitive or national terms typically take around six months or more of consistent work to show meaningful traffic gains. Timelines depend heavily on your starting point, competition, budget and how much content and technical work is needed. Be cautious of anyone who guarantees a specific ranking by a specific date, because no one can honestly promise that.</p></div>
        </details>

        <details>
          <summary>How do I get my business cited by ChatGPT and Perplexity?</summary>
          <div class="faq__body"><p><strong>To improve your chances of being cited by AI answer engines, focus on four things:</strong> a clear entity presence on sources such as Wikidata and authoritative directories; structured data such as FAQPage, Article and Person schema; verifiable E-E-A-T signals including author credentials and citations; and links and mentions from sources these models already trust. There are no guarantees with AI engines, but building these signals is the recognised, honest way to make your content easier for them to find and attribute. This is what Fawaz BH builds as part of an AEO engagement.</p></div>
        </details>

        <details>
          <summary>How much do SEO and digital marketing services cost in India in 2026?</summary>
          <div class="faq__body"><p><strong>Fawaz BH publishes transparent starting rates on this page.</strong> SEO ranges from Local SEO at &#8377;14,999 per month to Full-Stack SEO plus AEO at &#8377;29,999 per month, with Enterprise SEO plus AEO plus GEO quoted to scope. Social media marketing starts at &#8377;11,999 per month, performance marketing management fees start at &#8377;11,999 per month, with ad spend paid separately to the platform, and website design starts at &#8377;29,999 as a one-time build. Final pricing is confirmed after a free audit and depends on your scope, competition and goals.</p></div>
        </details>

        <details>
          <summary>Does Fawaz BH offer SEO services outside Karnataka?</summary>
          <div class="faq__body"><p><strong>Yes.</strong> While based in Kushal Nagar, Kodagu, Fawaz BH works with clients across South India and the rest of India remotely. Businesses in Chennai, Hyderabad, Kochi, Mumbai, Delhi and Pune can use the same integrated SEO, AEO and GEO services, delivered with the same direct, founder-led access.</p></div>
        </details>

        <details>
          <summary>What services does Fawaz BH offer beyond SEO?</summary>
          <div class="faq__body"><p><strong>Beyond SEO, AEO and GEO, Fawaz BH offers social media marketing, performance marketing, Google Ads and Meta Ads, and website design.</strong> This means a business in Kodagu, Bengaluru or Mysuru can cover search, social, paid advertising and its website through one founder-led point of contact, with pricing for each published on this page.</p></div>
        </details>
      </div>
    </div>
  </section>

  <?php render_contact_form([
      'heading' => 'Not sure which service you need?',
      'lede'    => 'Start with the free audit. I will tell you which of these actually moves your numbers, and which you can skip for now.',
  ]); ?>

</main>

<?php
render_floating_button();
render_footer();
