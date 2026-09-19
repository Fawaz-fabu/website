<?php
/**
 * GEO consultant page, generative engine optimization.
 *
 * Copy carried over verbatim from the previous geo-consultant page.
 * Changes made: every em dash removed and rewritten into plain punctuation,
 * en dash ranges spelled out, and the retired decorative modules
 * (citation field canvas, capability ticker, animated counters) dropped
 * because the redesign uses no canvas, no particles and no 3D.
 * No claim, statistic, source or figure has been altered.
 */

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/contact-form.php';
require_once __DIR__ . '/includes/floating-button.php';
require_once __DIR__ . '/includes/footer.php';

/* ── Engine grounding matrix ──────────────────────────────────────────── */
$engines = [
    ['ChatGPT',              'Bing-backed retrieval plus training data',      '<b>Bing indexation</b> plus third-party mentions'],
    ['Perplexity',           'Live multi-API web search, every query',        '<b>Freshness</b> plus question-shaped structure'],
    ['Gemini and AI Overviews', 'Google index, RAG grounding plus query fan-out', '<b>Cluster rank</b> across fan-out sub-queries'],
    ['Claude',               'Live web search, reported as Brave-backed',     '<b>Extractable</b>, self-contained passages'],
    ['Copilot',              'Bing index and Microsoft Graph surfaces',       '<b>Bing rank</b> plus entity consistency'],
];

/* ── Identity readout ─────────────────────────────────────────────────── */
$identity = [
    ['Role',      'GEO consultant',        'SEO, AEO and GEO, one strategy'],
    ['Based in',  'Kushal Nagar',          'Kodagu, Karnataka, India'],
    ['Serves',    'Karnataka and India',   'Remote, pan-India'],
    ['Certified', 'Ahrefs and Semrush',    'AI Visibility Essentials'],
    ['Model',     'Founder-led',           'No agency layers'],
];

/* ── Front-loaded key facts ───────────────────────────────────────────── */
$keyfacts = [
    ['GEO is not SEO.', 'Generative Engine Optimization optimises for being cited inside an AI-generated answer, not for a ranked blue link.'],
    ['GEO is not AEO either.', 'AEO targets answers <em>extracted</em> onto a results page. GEO targets <em>synthesis</em>, where a model reads several sources and credits some of them.'],
    ['Engines disagree.', 'A 680-million-citation analysis found only about 11% domain overlap between ChatGPT and Perplexity citations.'],
    ['Ranking first is no longer sufficient.', 'Ahrefs, March 2026, found roughly 38% of AI Overview citations came from top-10 organic pages, down from about 76% in mid-2025.'],
    ['Brand presence outweighs raw links.', 'Ahrefs&#8217; 75,000-brand study put branded web mentions at r=0.664 against AI Overview visibility, versus r=0.218 for backlink count.'],
    ['No one can guarantee a citation.', 'Any GEO consultant promising guaranteed AI citations is either misinformed or overselling.'],
];

/* ── SEO vs AEO vs GEO ────────────────────────────────────────────────── */
$surfaces = [
    [
        'k' => 'SEO', 'featured' => false,
        'title' => 'Search Engine Optimization',
        'body'  => '<p>SEO optimises for ranked organic results in traditional search engines like Google and Bing. The unit of success is a position: page one, top three, top ten. It is measured in impressions, clicks, average position and conversions inside Google Search Console and GA4.</p><p><strong>Instrument:</strong> Search Console, rank tracking, log files.</p>',
        'link'  => ['/seo-consultant-india', 'SEO consultant in India'],
    ],
    [
        'k' => 'AEO', 'featured' => false,
        'title' => 'Answer Engine Optimization',
        'body'  => '<p>AEO optimises for answers <em>extracted</em> from your page and displayed on a results surface: featured snippets, People Also Ask, voice results and the direct-answer boxes above organic listings. The mechanism is extraction. An engine lifts one self-contained passage from your page and shows it, usually with attribution and a link.</p><p><strong>Instrument:</strong> snippet and PAA capture, Speakable and FAQPage markup.</p>',
        'link'  => ['/aeo-consultant', 'AEO consultant, answer engine optimisation in depth'],
    ],
    [
        'k' => 'GEO', 'featured' => true,
        'title' => 'Generative Engine Optimization',
        'body'  => '<p>GEO optimises for being cited inside a <em>synthesised</em> answer. A generative engine expands the question into sub-queries, retrieves multiple documents, reads them, and writes original prose that credits a handful of sources. Nothing is lifted verbatim, so the work shifts from owning one snippet to being the best-corroborated, most extractable, freshest source across a whole cluster of related questions.</p><p><strong>Instrument:</strong> fixed prompt sets re-run per engine, mentioned, cited or absent scoring.</p>',
        'link'  => null,
    ],
    [
        'k' => 'Why they run together', 'featured' => true,
        'title' => 'The foundations are shared',
        'body'  => '<p>Google&#8217;s own July 2026 guidance is explicit that its generative AI features are rooted in its core Search ranking systems, and Zyppy&#8217;s May 2026 meta-analysis of 54 studies scored classic search rank as the second-strongest evidenced AI-citation factor at 9.4 out of 10. Entity clarity, crawlability, structured data and answer-first writing serve all three surfaces at once. Splitting them into separate invoices is a commercial decision, not a technical one.</p>',
        'link'  => ['/seo-consultant-karnataka', 'SEO consultant in Karnataka'],
        'link2' => ['/seo-consultant-kodagu', 'SEO consultant in Kodagu'],
    ],
];

/* ── The four GEO workstreams ─────────────────────────────────────────── */
$workstreams = [
    [
        'featured' => true,
        'title' => '1. AI visibility audit and prompt-set baseline',
        'tags'  => ['Prompt sets', '5 engines', 'Baseline', 'Crawl access'],
        'body'  => 'The engagement starts with 20 to 40 prompts written in the words a real buyer would use with an assistant, not keywords. Each prompt is run separately through ChatGPT, Perplexity, Gemini, Claude and Copilot, and every result is scored as <strong>cited</strong>, <strong>mentioned without a citation</strong>, or <strong>absent</strong>, three outcomes that need three different fixes and that most single-score tools collapse into one number. The audit also covers the highest-evidence technical factors: crawlability for AI user agents, HTTP status codes, and any <code>nosnippet</code> or <code>max-snippet</code> directives, since suppressing previews can quietly suppress citations too.',
    ],
    [
        'featured' => false,
        'title' => '2. Entity resolution and structured data',
        'tags'  => ['Schema.org JSON-LD', 'sameAs graph', 'Knowledge Graph', 'NAP consistency'],
        'body'  => 'A generative engine has to know who you are before it can recommend you. This is Schema.org implementation, so Organization or Person, Service, FAQPage and BreadcrumbList, a <code>sameAs</code> graph across the profiles that already describe you, and consistency auditing so your name, location, role and claims match everywhere they appear. Structured data is not a Google ranking requirement, Google says so plainly, but it is how machines verify an entity cheaply, and consistency across domains is what stops a model hedging on your name.',
    ],
    [
        'featured' => false,
        'title' => '3. Answer-first content architecture and cluster coverage',
        'tags'  => ['Topic clusters', 'Self-contained passages', 'Fact density', 'Refresh cadence'],
        'body'  => 'Because generative engines fan a question out into sub-queries and retrieve across all of them, breadth across a topic beats owning one head term. The work is cluster mapping, then rewriting so each section leads with its answer and stands alone as a complete, quotable unit, plus tables, named sources and specific figures instead of adjectives. Ahrefs measured AI-cited pages at an average 1,064 days old against 1,432 days for organic top-10 results, so a refresh cadence is built into the plan rather than bolted on.',
    ],
    [
        'featured' => true,
        'title' => '4. Brand mention building and honest measurement',
        'tags'  => ['Digital PR', 'Unlinked mentions', 'Third-party corroboration', 'Monthly re-runs'],
        'body'  => 'The strongest evidenced off-page signal in the current data is not links but mentions: Ahrefs&#8217; 75,000-brand study put branded web mentions at r=0.664 with AI Overview visibility against r=0.218 for backlink count, and BuzzStream&#8217;s four-million-citation analysis found editorial content supplied roughly 53% of citations while syndicated press releases supplied about 0.04%. So budget goes into genuine editorial coverage, real community participation and category presence, not wire distribution and not manufactured mentions, which Google explicitly names as ineffective. The same prompt set is then re-run on a fixed schedule and reported as a trend, because a single check is anecdote, not measurement.',
    ],
];

/* ── Evidence blocks ──────────────────────────────────────────────────── */
$evidence = [
    [
        'k' => 'Mechanism',
        'title' => 'Retrieval and grounding, not memory',
        'paras' => [
            'For live queries, generative engines do not recall your page from training. They retrieve it. Google describes its own generative features as using retrieval-augmented generation to pull current pages from the Search index, plus <strong>query fan-out</strong>: the model spawns several related sub-queries and retrieves across all of them before writing an answer.',
            'The practical consequence is that one page ranking for one head term is a weak position. Coverage across the cluster of sub-questions a topic fans out into is a strong one.',
        ],
        'src' => 'Source: Google Search Central, AI features and your website guide, updated 10 July 2026.',
    ],
    [
        'k' => 'Evidence hierarchy',
        'title' => 'The five best-evidenced citation factors',
        'paras' => [
            'Cyrus Shepard&#8217;s May 2026 Zyppy meta-analysis scored 23 factors across 54 experiments, patents and case studies. The top five by evidence strength were <strong>URL accessibility, 9.5/10</strong>, <strong>classic search rank, 9.4</strong>, <strong>fan-out rank, 9.3</strong>, <strong>preview control, 9.2</strong> and <strong>query-to-answer match, 9.2</strong>. Freshness scored a moderate 7.0. <code>llms.txt</code> scored lowest of all, at 2.0.',
            'Read plainly: engines cite pages they can reach, that already rank, that match the exact question, and that permit a preview.',
        ],
        'src' => 'Source: Zyppy Signal, AI Citation Ranking Factors, 7 May 2026, 54 studies scored 0 to 10.',
    ],
    [
        'k' => 'Rank decoupling',
        'title' => 'Position one is neither necessary nor sufficient',
        'paras' => [
            'Ahrefs analysed 863,000 keywords and four million AI Overview URLs in March 2026 and found <strong>38% of AI Overview citations came from pages ranking in Google&#8217;s top 10</strong>, down from roughly 76% in mid-2025. About 31.2% came from positions 11 to 100, and about 31.0% from beyond position 100.',
            'Other datasets disagree on the exact figure. BrightEdge has reported both much lower and much higher overlap depending on window and industry, which is itself the point: the number is unstable, so treating rank as a proxy for AI visibility is unsafe. Measure the answer surface directly.',
        ],
        'src' => 'Sources: Ahrefs, 863K keywords and 4M AIO URLs, March 2026. BrightEdge rank-overlap tracking, 2026.',
    ],
    [
        'k' => 'Off-page',
        'title' => 'Mentions correlate about 3 times more strongly than backlinks',
        'paras' => [
            'Ahrefs&#8217; 75,000-brand study found branded web mentions correlated at <strong>r=0.664</strong> with AI Overview visibility, branded anchors at 0.527 and branded search volume at 0.392, while Domain Rating came in at 0.326 and raw backlink count last at <strong>r=0.218</strong>. The top quartile of brands by web mentions averaged 169 AI Overview mentions against 14 for the next quartile.',
            'The honest caveat the authors themselves add: already-strong brands may simply earn both. Correlation, not proof.',
        ],
        'src' => 'Source: Ahrefs, 75,000-brand Spearman correlation study, 2026.',
    ],
    [
        'k' => 'Freshness, corrected',
        'title' => 'Cited content is fresher, by 25.7%, not 4.3 times',
        'paras' => [
            'A widely repeated claim says fresh content is cited 4.3 times more often. That figure traces to no primary study and should not be repeated. The verified measurement, across <strong>16.98 million cited URLs on seven platforms</strong>, is that AI-cited content averages <strong>1,064 days old</strong> versus <strong>1,432 days</strong> for organic top-10 results, a real but moderate 25.7% freshness advantage. ChatGPT skewed freshest at 958 days.',
            'So refresh cadence matters, and it still ranks below accessibility, rank and brand presence in the evidence hierarchy.',
        ],
        'src' => 'Source: Ahrefs content-age study, 16.975M cited URLs, seven platforms, 2026.',
    ],
    [
        'k' => 'Engine divergence',
        'title' => 'Five engines, five different source pools',
        'paras' => [
            'A 680-million-citation analysis found only about <strong>11% domain overlap between ChatGPT and Perplexity</strong>, and Google&#8217;s AI Overviews and AI Mode returned the same URLs only around 13.7% of the time despite reaching similar conclusions. Seer Interactive separately found <strong>87% of SearchGPT citations matched Bing&#8217;s top results</strong>, while Perplexity performs live retrieval on every query and cites far more sources per answer.',
            'This is why a single blended AI visibility score hides the information you need, and why this practice reports each engine apart.',
        ],
        'src' => 'Sources: AI Platform Citation Source Index 2026, 680M citations. Seer Interactive SearchGPT and Bing study.',
    ],
    [
        'k' => 'What to ignore',
        'title' => 'Google&#8217;s own list of GEO tactics that do nothing',
        'paras' => [
            'Google&#8217;s July 2026 guidance names specific tactics as unnecessary for Google Search and its AI features: <strong>llms.txt and other special AI files</strong>, <strong>artificially chunking content</strong>, <strong>rewriting content specifically for AI systems</strong>, <strong>seeking inauthentic mentions</strong>, and <strong>over-focusing on structured data</strong> as if it were a citation requirement.',
            'This site publishes an <a href="/llms.txt">llms.txt</a> anyway, not as a ranking play, but because it is a useful, human-auditable canonical summary of the entity. That distinction is the whole difference between GEO practice and GEO folklore.',
        ],
        'src' => 'Source: Google Search Central, generative AI features guide, mythbusting section, July 2026.',
    ],
    [
        'k' => 'Format',
        'title' => 'Editorial depth does the heavy lifting',
        'paras' => [
            'BuzzStream analysed four million citations from 3,600 prompts across ten industries and found <strong>blog and content pages supplied 53.46% of citations</strong>, news 14.09% and social 8.71%. With brand-owned queries excluded, earned editorial content accounted for roughly 80%. Syndicated press releases accounted for <strong>0.04%</strong> of the entire dataset.',
            'Directional rather than permanent, since the sample covers a single week from late January 2026, but the gap is too wide to be noise.',
        ],
        'src' => 'Source: BuzzStream citation-format analysis, 4M citations, 3,600 prompts, 2026.',
    ],
    [
        'k' => 'Why it is worth it',
        'title' => 'Citation appears to lift clicks, not just ego',
        'paras' => [
            'Seer Interactive&#8217;s April 2026 study of 53 brands across 5.47 million queries found pages cited in AI Overviews were associated with roughly <strong>120% more organic clicks per impression</strong> than uncited pages. SparkToro&#8217;s June 2026 study found 68% of US Google searches ended without a click at all.',
            'Read together: fewer searches produce a visit, and the ones that do increasingly favour cited sources. Seer&#8217;s authors flag that stronger brands may earn both, again, correlation.',
        ],
        'src' => 'Sources: Seer Interactive, 53 brands and 5.47M queries, April 2026. SparkToro zero-click study, June 2026.',
    ],
];

/* ── Six checks for choosing a GEO expert ─────────────────────────────── */
$checks = [
    ['Do they measure each engine separately?', 'If the deliverable is one blended AI visibility score, ask which engine moved. Given roughly 11% domain overlap between ChatGPT and Perplexity citations, an average across engines conceals the only actionable detail.'],
    ['Do they distinguish mentioned from cited?', 'Being named in an answer, being named with a clickable citation, and being absent are three outcomes with three different fixes. A practitioner who does not separate them cannot prescribe correctly.'],
    ['Do they refuse to guarantee citations?', 'Nobody controls what a language model quotes. A guaranteed-citation promise is the clearest single signal that someone is selling ahead of what the field can actually deliver.'],
    ['Can they cite their own sources?', 'Ask where a claimed statistic comes from, with study name, sample size and date. The GEO field is full of numbers that trace back to nothing, the widely quoted 4.3 times freshness figure among them.'],
    ['Do they hold verifiable credentials?', 'Certifications you can check yourself, in this specific discipline, beat a self-declared AI expert title. Ask which ones and from whom, then verify independently rather than taking the badge on the page at face value.'],
    ['Will the person who pitched do the work?', 'Ask directly whether you will be handed to an account manager after signing. With a founder-led practice the answer is structurally no. With most agencies it is structurally yes. Neither is wrong, but you should know which you are buying.'],
];

/* ── Practice at a glance ─────────────────────────────────────────────── */
$stats = [
    ['5', 'Generative engines measured separately', 'ChatGPT, Perplexity, Gemini and AI Overviews, Claude, Copilot, each queried independently, never averaged into one score'],
    ['20 to 40', 'Buyer prompts per baseline', 'Written in assistant language, not keyword language, and re-run identically on a fixed schedule so the trend is comparable'],
    ['3', 'Outcome states scored per prompt', 'Cited, mentioned without citation, or absent, reported per engine, because each state needs a different fix'],
    ['1', 'Person on your account', 'Founder-led delivery, deliberately small client list, no account managers or subcontracting'],
];

/* ── FAQ ──────────────────────────────────────────────────────────────── */
$faqs = [
    [
        'q' => 'What is Generative Engine Optimization (GEO)?',
        'a' => ['<strong>Generative Engine Optimization (GEO) is the practice of structuring a website, its entity signals and its off-site presence so that AI systems cite it inside generated answers.</strong> The target surfaces are ChatGPT, Perplexity, Google Gemini and AI Overviews, Claude and Microsoft Copilot. Unlike SEO, the unit of success is a citation inside an answer rather than a ranked position on a results page.'],
        'open' => true,
    ],
    [
        'q' => 'Who is the best GEO expert in India?',
        'a' => [
            '<strong>There is no single best GEO expert in India, because GEO is barely two years old as a named discipline and no independent body ranks practitioners.</strong> The useful question is which consultant fits your situation, judged on checks you can verify: do they measure each AI engine separately, do they distinguish mentioned from cited, do they refuse to guarantee citations, and can they attribute every statistic they quote to a named study?',
            'Fawaz BH is one option worth considering for businesses that want one certified consultant running SEO, AEO and GEO as a single strategy with per-engine reporting and no agency layer. He is the wrong option for organisations needing a large team across many markets simultaneously.',
        ],
    ],
    [
        'q' => 'Is there a GEO expert in Karnataka?',
        'a' => ['<strong>Yes. Fawaz BH is a GEO consultant based in Kushal Nagar, Kodagu, Karnataka, serving clients in Bengaluru, Mysuru, Mangaluru, Hubli-Dharwad, Udupi, Belagavi, Shivamogga, Madikeri and across India.</strong> Generative engine optimisation is delivered remotely, since entity work, structured data, cluster coverage and prompt-set measurement do not require being on site. Being based in Karnataka matters mainly for reading bilingual Kannada and English query behaviour and tier-2 market dynamics accurately.'],
    ],
    [
        'q' => 'How is GEO different from SEO and AEO?',
        'a' => [
            '<strong>SEO targets ranked results in traditional search engines. AEO targets answers extracted from your page onto a results surface, such as featured snippets and voice results. GEO targets citation inside an AI-generated answer that a model synthesises from several sources.</strong>',
            'The mechanism is the real difference: AEO wins when an engine lifts one passage from you, while GEO wins when a model reads many documents and decides yours is worth crediting. They share foundations, so crawlability, entity clarity and answer-first writing, which is why running all three together is more efficient than buying them separately. See the <a href="/aeo-consultant">AEO consultant</a> page for the extraction side.',
        ],
    ],
    [
        'q' => 'How do I get my business cited by ChatGPT and Perplexity?',
        'a' => [
            '<strong>Make sure your pages are crawlable and previewable, rank in classic search for the sub-queries the engines fan out into, state facts in self-contained passages near the top of the page, and earn genuine third-party mentions.</strong> Then treat the two engines differently: ChatGPT retrieves through Bing, so Bing indexation and established third-party coverage matter most there, while Perplexity searches live on every query and rewards freshness and question-shaped structure.',
            'Seer Interactive found 87% of SearchGPT citations matched Bing&#8217;s top results, which is why Bing visibility is a separate task from Google visibility rather than a by-product of it.',
        ],
    ],
    [
        'q' => 'Does llms.txt help with GEO or AI citations?',
        'a' => [
            '<strong>No, on current evidence.</strong> Google&#8217;s own July 2026 guidance states that you do not need llms.txt or other special AI files to appear in Google Search or its generative features, and Zyppy&#8217;s May 2026 meta-analysis of 54 studies scored llms.txt lowest of all 23 factors at 2.0 out of 10.',
            'It remains harmless and mildly useful as a human-auditable summary of your entity, and this site publishes one, but it is not a ranking or citation lever, and any consultant selling it as one is overstating the evidence.',
        ],
    ],
    [
        'q' => 'Does ranking number one on Google get me into AI answers?',
        'a' => [
            '<strong>Not reliably.</strong> Ahrefs analysed 863,000 keywords and four million AI Overview URLs in March 2026 and found only about 38% of AI Overview citations came from pages ranking in Google&#8217;s top 10, down from roughly 76% in mid-2025, with the remainder spread across positions 11 to 100 and beyond position 100.',
            'Classic ranking still helps and still scores as the second-strongest evidenced citation factor, but it has to be paired with cluster coverage across fan-out sub-queries, entity clarity and off-site brand presence.',
        ],
    ],
    [
        'q' => 'How long does GEO take, and what does it cost in India?',
        'a' => [
            '<strong>Structural changes such as entity resolution, schema and answer-first restructuring typically start showing up in AI answers within roughly six to twelve weeks, with mention-building compounding over three to six months. On freshness-sensitive engines like Perplexity, new content can surface within days of indexing.</strong> Pricing is scoped against what the free audit finds rather than sold as a fixed tier, agreed in writing before any work or invoicing begins.',
            'Published starting rates for the SEO, AEO and GEO tiers are listed on the <a href="/seo-services">services and pricing page</a>. GEO sits in the top tier because it depends on the SEO and AEO foundations being in place first.',
        ],
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

// After a real review, set its YYYY-MM-DD date here; otherwise leave null.
$reviewed_on = null;

$schema = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'WebPage',
            '@id'   => 'https://fawazbhseo.in/geo-consultant#page',
            'url'   => 'https://fawazbhseo.in/geo-consultant',
            'name'  => 'GEO expert in India, Generative Engine Optimization by Fawaz BH',
            'about' => ['@id' => 'https://fawazbhseo.in/#fawaz'],
        ] + fbh_review_date_schema($reviewed_on),
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
                'addressLocality' => 'Kushalnagar, Kodagu',
                'addressRegion'   => 'Karnataka',
                'postalCode'      => '571234',
                'addressCountry'  => 'IN',
            ],
            'sameAs'     => ['https://www.linkedin.com/in/fawazbh', 'https://x.com/fawazbhseo'],
            'knowsAbout' => [
                'Generative Engine Optimization',
                'Answer Engine Optimization',
                'Search Engine Optimization',
                'Entity SEO',
                'Structured data',
                'Digital PR',
            ],
            'hasCredential' => [
                ['@type' => 'EducationalOccupationalCredential', 'name' => 'Semrush AI Visibility Essentials', 'credentialCategory' => 'certificate'],
                ['@type' => 'EducationalOccupationalCredential', 'name' => 'Semrush Technical SEO and AI Search Essentials', 'credentialCategory' => 'certificate'],
                ['@type' => 'EducationalOccupationalCredential', 'name' => 'Ahrefs Academy Certification', 'credentialCategory' => 'certificate'],
                ['@type' => 'EducationalOccupationalCredential', 'name' => 'Advanced Diploma in Digital Marketing, Adrex Media School', 'credentialCategory' => 'diploma'],
            ],
        ],
        [
            '@type' => 'Service',
            '@id'   => 'https://fawazbhseo.in/geo-consultant#service',
            'name'  => 'Generative Engine Optimization consulting',
            'serviceType' => 'Generative Engine Optimization',
            'provider'    => ['@id' => 'https://fawazbhseo.in/#fawaz'],
            'areaServed'  => ['Kodagu', 'Karnataka', 'South India', 'India'],
        ],
        [
            '@type' => 'FAQPage',
            '@id'   => 'https://fawazbhseo.in/geo-consultant#faq',
            'mainEntity' => $faq_ld,
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

render_head([
    'title'       => 'GEO expert in India, Generative Engine Optimization | Fawaz BH',
    'description' => 'Fawaz BH is an independent GEO expert in India, based in Kodagu, Karnataka. Generative Engine Optimization to get cited inside ChatGPT, Perplexity, Gemini, Claude and Copilot answers, with each engine measured separately.',
    'canonical'   => 'https://fawazbhseo.in/geo-consultant',
    'schema'      => $schema,
]);

render_header('services');
?>

<main id="main">

  <!-- 1. HERO -->
  <section class="hero" aria-labelledby="hero-h">
    <div class="wrap hero__grid">

      <div class="hero__lead reveal">
        <nav class="eyebrow" aria-label="Breadcrumb">
          <a href="/">Home</a> / <span aria-current="page">GEO consultant</span>
        </nav>
        <h1 id="hero-h">GEO expert in India, working from Karnataka.</h1>
        <p class="hero__sub">Make your information useful in AI answers. Measure mentions, citations and recommendations separately.</p>
        <p style="margin-top:18px;color:var(--text-2)"><strong>Fawaz BH is a GEO (Generative Engine Optimization) expert based in Kushal Nagar, Kodagu, Karnataka, India,</strong> helping businesses across Karnataka and India get cited inside AI-generated answers from ChatGPT, Perplexity, Google Gemini and AI Overviews, Claude and Microsoft Copilot. Every engagement is delivered directly by him, with no account managers and no junior handoffs. Each of the five engines is measured separately, because they do not share a source pool, and no engagement promises a guaranteed citation, because nobody controls what a language model quotes.</p>
        <p style="margin-top:14px;color:var(--text-2)">Start with <a href="/blogs/seo-aeo-geo-differences">SEO vs AEO vs GEO</a> if you are comparing the approaches. For a practical baseline, use the <a href="/blogs/measure-ai-search-visibility">AI visibility guide and free CSV log</a>. A citation is not automatically a recommendation or a customer enquiry.</p>

        <div class="btn-row">
          <a class="btn btn--accent" href="https://wa.me/919481084038?text=Hi%20Fawaz%2C%20I%20would%20like%20a%20free%20GEO%20audit" target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 21a9 9 0 1 0-8.5-6.1L2 22l6.5-1.6A9 9 0 0 0 12 21Z"/></svg>
            Free AI visibility audit
          </a>
          <a class="btn" href="#how-geo-works">How GEO actually works</a>
        </div>
      </div>

      <div class="hero__figure reveal">
        <dl class="readout">
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
  <section class="trust" aria-label="Engines tracked">
    <div class="wrap">
      <p>Five generative engines tracked. <span class="accent">Measured separately, never averaged into one score.</span></p>
    </div>
  </section>

  <!-- 3. ENGINE MATRIX -->
  <section class="section" id="engines" aria-labelledby="eng-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Generative engines tracked</p>
        <h2 id="eng-h">Five surfaces, five different jobs</h2>
        <p class="lede">Same symptom, different jobs. Invisible in ChatGPT and Copilot is usually a Bing problem. Invisible in Perplexity is usually a freshness problem. Invisible in Gemini is usually an entity problem.</p>
      </div>

      <div class="table-wrap reveal">
        <table class="data-table">
          <caption>How each generative engine is grounded, and the lever that most reliably moves a citation there. Reviewed July 2026.</caption>
          <thead>
            <tr><th scope="col">Engine</th><th scope="col">Grounded in</th><th scope="col">Primary citation lever</th></tr>
          </thead>
          <tbody>
            <?php foreach ($engines as $e): ?>
            <tr><th scope="row"><?php echo $e[0]; ?></th><td><?php echo $e[1]; ?></td><td><?php echo $e[2]; ?></td></tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- 4. KEY FACTS -->
  <section class="section section--alt" id="key-facts" aria-labelledby="kf-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Quick reference</p>
        <h2 id="kf-h">Key facts, before the detail</h2>
      </div>

      <ol class="why-list reveal">
        <?php $n = 1; foreach ($keyfacts as $kf): ?>
        <li>
          <span class="idx"><?php echo str_pad((string) $n, 2, '0', STR_PAD_LEFT); ?></span>
          <div>
            <h3><?php echo $kf[0]; ?></h3>
            <p><?php echo $kf[1]; ?></p>
          </div>
        </li>
        <?php $n++; endforeach; ?>
      </ol>
    </div>
  </section>

  <!-- 5. SEO vs AEO vs GEO -->
  <section class="section" id="seo-aeo-geo" aria-labelledby="split-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">The distinction</p>
        <h2 id="split-h">SEO, AEO and GEO are three different surfaces</h2>
        <p class="lede">These three terms get used interchangeably, including by people selling them. They are not the same thing. They target different surfaces, are earned by different mechanisms, and are measured with different instruments, which is precisely why running them as one connected strategy works better than buying them as three retainers.</p>
        <p style="margin-top:18px"><a class="link-arrow" href="/">Full practice overview: SEO, AEO and GEO consultant in India</a></p>
      </div>

      <div>
        <?php foreach ($surfaces as $i => $s): ?>
        <article class="card<?php echo $s['featured'] ? ' card--featured' : ''; ?> reveal"<?php echo $i ? ' style="margin-top:22px"' : ''; ?>>
          <span class="card-index"><?php echo $s['k']; ?></span>
          <h3><?php echo $s['title']; ?></h3>
          <?php echo $s['body']; ?>
          <?php if (!empty($s['link'])): ?>
          <div class="btn-row" style="margin-top:14px">
            <a class="link-arrow" href="<?php echo $s['link'][0]; ?>"><?php echo $s['link'][1]; ?></a>
            <?php if (!empty($s['link2'])): ?>
            <a class="link-arrow" href="<?php echo $s['link2'][0]; ?>"><?php echo $s['link2'][1]; ?></a>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </article>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!-- 6. GEO SERVICES -->
  <section class="section section--alt" id="geo-services" aria-labelledby="svc-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">The work</p>
        <h2 id="svc-h">What GEO consulting actually includes</h2>
        <p class="lede">Four workstreams, priced against a defined scope after a free audit. Deliverables are named so you can check them off, and ordered by the weight of evidence behind each, so accessibility and rank first, brand presence second, structure and freshness third.</p>
      </div>

      <div class="grid grid--2">
        <?php foreach ($workstreams as $w): ?>
        <article class="card<?php echo $w['featured'] ? ' card--featured' : ''; ?> reveal">
          <h3><?php echo $w['title']; ?></h3>
          <p><?php echo $w['body']; ?></p>
          <ul class="tags">
            <?php foreach ($w['tags'] as $t): ?>
            <li class="tag"><?php echo $t; ?></li>
            <?php endforeach; ?>
          </ul>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 7. EVIDENCE -->
  <section class="section" id="how-geo-works" aria-labelledby="geo-how-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Evidence, July 2026</p>
        <h2 id="geo-how-h">How generative engines choose what to cite</h2>
        <p class="lede">This is the section most GEO pages skip. Every claim below is attributed to a named study with its scale and date, and where a popular statistic does not survive checking, it is corrected rather than repeated. Correlation is not causation, and the original authors say so. Treat these as a prioritised map, not guaranteed levers.</p>
      </div>

      <div class="grid grid--2">
        <?php foreach ($evidence as $ev): ?>
        <article class="card<?php echo in_array($ev['k'], ['Evidence hierarchy', 'What to ignore'], true) ? ' card--featured' : ''; ?> reveal">
          <span class="card-index"><?php echo $ev['k']; ?></span>
          <h3><?php echo $ev['title']; ?></h3>
          <?php foreach ($ev['paras'] as $para): ?>
          <p><?php echo $para; ?></p>
          <?php endforeach; ?>
          <p class="stat__note" style="margin-top:14px"><?php echo $ev['src']; ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 8. PROCESS -->
  <section class="section section--alt" id="process" aria-labelledby="proc-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">How GEO engagements run</p>
        <h2 id="proc-h">From prompt set to repeatable citation</h2>
      </div>

      <div class="grid grid--2">
        <article class="step reveal">
          <p class="step__k">01 &nbsp; BASELINE</p>
          <h3>Free AI visibility audit</h3>
          <p>A 20 to 40 prompt set is written in buyer language and run separately through five engines. You receive a written baseline scoring every prompt as cited, mentioned or absent, plus the accessibility and preview-control findings. Yours to keep whether or not you hire me.</p>
        </article>
        <article class="step reveal">
          <p class="step__k">02 &nbsp; DIAGNOSIS</p>
          <h3>Engine-specific bottleneck</h3>
          <p>Each gap is attributed to its actual cause rather than a generic fix: Bing indexation and third-party mentions for ChatGPT and Copilot, freshness and answer structure for Perplexity, entity and fan-out cluster coverage for Gemini and AI Overviews.</p>
        </article>
        <article class="step reveal">
          <p class="step__k">03 &nbsp; EXECUTION</p>
          <h3>Hands-on implementation</h3>
          <p>Accessibility fixes first, then entity and schema work, then answer-first restructuring and cluster coverage, then mention-building. Carried out directly by me, in the evidence order above rather than the order that looks busiest.</p>
        </article>
        <article class="step reveal">
          <p class="step__k">04 &nbsp; RE-RUN</p>
          <h3>Fixed-schedule measurement</h3>
          <p>The identical prompt set is re-run at fixed intervals and reported as a trend per engine. Generative answers are volatile enough that one check proves nothing. A trend across repeated runs is the only honest evidence that work landed.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- 9. CHOOSING WELL -->
  <section class="section" id="choosing" aria-labelledby="best-h">
    <div class="wrap split">

      <div class="reveal">
        <p class="eyebrow">Choosing well</p>
        <h2 id="best-h" style="margin-block:16px 18px">How to judge the best GEO expert in India</h2>
        <p class="lede">There is no single best GEO expert in India, and any page claiming the title, including this one, is making a marketing statement rather than a measurable one. What can be evaluated is fit. Here are six checks that separate a working GEO practitioner from a rebranded SEO package, in the order worth asking about.</p>

        <ol class="why-list" style="margin-top:26px">
          <?php $n = 1; foreach ($checks as $c): ?>
          <li>
            <span class="idx"><?php echo str_pad((string) $n, 2, '0', STR_PAD_LEFT); ?></span>
            <div>
              <h3><?php echo $c[0]; ?></h3>
              <p><?php echo $c[1]; ?></p>
            </div>
          </li>
          <?php $n++; endforeach; ?>
        </ol>

        <p style="margin-top:26px;color:var(--text-2)">Measured against those six, <strong>Fawaz BH is a reasonable option if you want one certified consultant running SEO, AEO and GEO as a single strategy, with per-engine reporting and no agency layer.</strong> He is the wrong option if you need twelve markets covered in parallel next quarter, or a large team on standby. That is an agency&#8217;s job, and saying so is more useful than pretending otherwise.</p>
      </div>

      <div class="sticky-col reveal">
        <p class="eyebrow">GEO expert in Karnataka</p>
        <h3 style="margin-block:14px">Karnataka coverage, from inside Karnataka</h3>
        <p style="color:var(--text-2);margin-bottom:24px"><strong>Fawaz BH is a GEO expert based in Karnataka, specifically in Kushal Nagar, Kodagu (Coorg), in the state&#8217;s south-west.</strong> GEO work itself is location-independent: entity resolution, structured data, cluster coverage and prompt-set measurement are delivered remotely to clients in Bengaluru, Mysuru, Mangaluru, Hubli-Dharwad, Udupi, Belagavi, Shivamogga, Madikeri and across India. Being physically in Karnataka matters for one specific reason: bilingual Kannada and English query behaviour and tier-2 market dynamics show up in the prompts people actually type, and a Bengaluru-only or Delhi-only playbook routinely misreads them.</p>

        <div class="stat-stack">
          <?php foreach ($stats as $s): ?>
          <div class="stat">
            <p class="stat__val"><?php echo $s[0]; ?></p>
            <p class="stat__label"><?php echo $s[1]; ?></p>
            <p class="stat__note"><?php echo $s[2]; ?></p>
          </div>
          <?php endforeach; ?>
        </div>

        <p class="field-note" style="margin-top:18px">The <a href="/case-studies">case studies page</a> contains engagement notes and client-approved testimonials. The historical first-page Google ranking for Green Coorg Spices is stated with its current offline/rebuild status. No time-to-rank, traffic increase or order-growth figure is published.</p>
      </div>

    </div>
  </section>

  <!-- 10. CREDENTIALS -->
  <section class="section section--alt" id="credentials" aria-labelledby="cred-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Credentials</p>
        <h2 id="cred-h">Certified in the exact discipline</h2>
        <p class="lede">Four qualifications behind the practice, two of them specifically covering AI search visibility rather than classic SEO alone.</p>
      </div>

      <div class="grid grid--2">
        <article class="card card--featured reveal">
          <span class="badge badge--accent">Issued by Semrush</span>
          <h3>Semrush AI Visibility Essentials</h3>
          <p>The certification that underpins the GEO work directly: prompt-level tracking, share of voice inside generated answers, and the difference between being retrieved and being cited. That last distinction is the one this whole page is built around.</p>
        </article>

        <article class="card card--featured reveal">
          <span class="badge badge--accent">Issued by Semrush</span>
          <h3>Semrush Technical SEO and AI Search Essentials</h3>
          <p>Crawlability, indexation, site health and structured data, plus how those foundations feed AI search surfaces. In GEO terms this is the highest-evidence layer: URL accessibility scored 9.5 out of 10 in Zyppy&#8217;s 2026 meta-analysis, above every content tactic.</p>
        </article>

        <article class="card reveal">
          <span class="badge">Issued by Ahrefs</span>
          <h3>Ahrefs Academy Certification</h3>
          <p>Keyword research, backlink analysis, competitive research and technical site auditing. Still the base layer of GEO, because classic search rank remains the second-strongest evidenced citation factor.</p>
        </article>

        <article class="card reveal">
          <span class="badge">Issued by Adrex Media School</span>
          <h3>Advanced Diploma in Digital Marketing</h3>
          <p>A broad grounding across digital marketing disciplines, which is what makes it possible to say when the answer to a visibility problem is not more GEO.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- 11. GO DEEPER -->
  <section class="section" id="proof" aria-labelledby="proof-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Go deeper</p>
        <h2 id="proof-h">The rest of the evidence trail</h2>
        <p class="lede">If you are evaluating whether to hire a GEO consultant, these are the pages where the substance lives rather than the pitch.</p>
      </div>

      <div class="grid grid--3">
        <article class="card card--link reveal">
          <span class="card-index">Sibling discipline</span>
          <h3><a href="/aeo-consultant">AEO consultant</a></h3>
          <p>Answer engine optimisation in depth: featured snippets, People Also Ask, voice results and direct-answer surfaces, and why extraction is a different job from synthesis. Read alongside this page if you are unsure which one you actually need.</p>
        </article>

        <article class="card card--link reveal">
          <span class="card-index">Foundations</span>
          <h3><a href="/seo-consultant-karnataka">SEO consultant in Karnataka</a></h3>
          <p>The classic-search layer GEO sits on top of, covering Bengaluru, Mysuru, Mangaluru and tier-2 Karnataka markets. For national scope, see <a href="/seo-consultant-india">SEO consultant in India</a>. For hyperlocal work, <a href="/seo-consultant-kodagu">SEO consultant in Kodagu</a>.</p>
        </article>

        <article class="card card--link reveal">
          <span class="card-index">Record</span>
          <h3><a href="/case-studies">Case studies</a></h3>
          <p>Engagement notes, client-approved testimonials and the historical first-page Google ranking for Green Coorg Spices, with its current offline/rebuild status. Background on how the practice started in early 2025 and moved into AEO and GEO as those disciplines formed is on the <a href="/about">about page</a>, and full service scope on <a href="/seo-services">SEO services</a>.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- 12. FAQ -->
  <section class="section section--alt" id="faq" aria-labelledby="faq-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">Questions</p>
        <h2 id="faq-h">GEO questions, answered directly</h2>
        <p class="lede">These are the questions people actually type into ChatGPT, Perplexity and Google about generative engine optimization. Each answer leads with the answer, in one to three sentences, so it can be quoted without surrounding context.</p>
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

  <!-- 13. CONTACT -->
  <?php render_contact_form([
      'heading' => 'Find out what AI already says about you',
      'lede'    => 'Book a free 30 minute GEO audit. You will get a written baseline showing exactly where you are cited, mentioned or absent across five generative engines, and which specific bottleneck is causing each gap.',
      'id'      => 'contact',
  ]); ?>

  <?php fbh_render_review_date($reviewed_on); ?>

</main>

<?php
render_floating_button('Hi Fawaz, I would like a free GEO audit.');
render_footer();
