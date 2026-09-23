<?php
/**
 * AEO consultant page.
 *
 * Copy carried over verbatim from the previous aeo-consultant page.
 * Changes made: every em dash removed and rewritten into plain punctuation,
 * en dash ranges spelled out, and the retired decorative modules
 * (orbit canvas, capability ticker, animated counters) dropped because the
 * redesign uses no canvas, no particles and no 3D.
 * No claim, statistic, source or figure has been altered.
 */

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/contact-form.php';
require_once __DIR__ . '/includes/floating-button.php';
require_once __DIR__ . '/includes/footer.php';

/* ── The answer pipeline, four stages ─────────────────────────────────── */
$pipeline = [
    ['k' => '01', 'stage' => 'Expand',     'title' => 'Query fan-out',
     'body' => 'Google confirms one question becomes a set of concurrent related sub-queries, each fetching its own results. You are no longer competing for one keyword.'],
    ['k' => '02', 'stage' => 'Retrieve',   'title' => 'Passage grounding',
     'body' => 'Retrieval-augmented generation pulls specific passages from indexed, snippet-eligible pages. Blocked, paywalled or <code>nosnippet</code> pages are simply skipped.'],
    ['k' => '03', 'stage' => 'Synthesise', 'title' => 'One answer, many sources',
     'body' => 'The model writes a single response from several retrieved passages. Self-contained passages that answer the exact phrasing survive this step. Context-dependent prose does not.'],
    ['k' => '04', 'stage' => 'Cite',       'title' => 'A handful get named',
     'body' => 'Only a few sources are linked. AEO is the discipline of engineering your page into that shortlist, and then measuring whether it worked, per engine.'],
];

/* ── The four delivered workstreams ───────────────────────────────────── */
$workstreams = [
    [
        'featured' => true,
        'title' => 'Entity clarity and structured-data foundation',
        'tags'  => ['Entity SEO', 'Schema.org', 'FAQPage', 'Speakable', 'Knowledge Graph'],
        'body'  => 'An answer engine can only name you if it knows unambiguously who you are. This workstream builds a consistent entity: Person, Organization or ProfessionalService schema with a real <code>sameAs</code> graph, FAQPage and HowTo markup where the content genuinely warrants it, Speakable markup for voice surfaces, credential markup, and NAP and name consistency across every profile that mentions you. Google is explicit that no special markup is <em>required</em> for AI features, so this is done for entity resolution and rich results, not as a hack.',
    ],
    [
        'featured' => false,
        'title' => 'Answer-first content architecture',
        'tags'  => ['Passage design', 'PAA capture', 'Fan-out coverage'],
        'body'  => 'Question-shaped H2s and H3s, the answer in the first 40 to 80 words of each section, self-contained passages that survive extraction, tables where comparison is the intent, and specific checkable claims instead of adjectives. Editorial content does the heavy lifting here: one 2026 analysis of 4 million citations found blog and content pages accounted for about 53% of all AI citations, while syndicated press releases accounted for 0.04%.',
    ],
    [
        'featured' => false,
        'title' => 'Per-engine citation measurement',
        'tags'  => ['Prompt sets', 'Cited vs mentioned', 'Trend, not snapshot'],
        'body'  => 'A fixed set of 20 to 40 buyer-language prompts, run separately through AI Overviews, AI Mode, ChatGPT, Perplexity, Gemini, Claude and Copilot, re-run on a schedule and reported per engine, never averaged. Cross-referenced against Search Console&#8217;s Generative AI performance report and Bing Webmaster Tools&#8217; AI Performance data.',
    ],
    [
        'featured' => true,
        'title' => 'Local AEO for Karnataka and Kodagu',
        'tags'  => ['Kannada and English', 'Google Business Profile', 'Near me intent', 'Local entities'],
        'body'  => 'Local questions are where answer engines are most decisive, because they usually return one recommendation rather than ten options. This workstream maps the bilingual Kannada and English questions people actually ask about your category, aligns your Google Business Profile, categories, services and reviews with the on-site entity, and builds location-question pages for Kushal Nagar, Madikeri, Bengaluru, Mysuru and Mangaluru. Google&#8217;s guidance is explicit that Business Profile and Merchant Center data can feed AI responses, so local AEO is partly a data-hygiene job, not only a content one.',
    ],
];

/* ── Method and evidence, six items in rough priority order ───────────── */
$method = [
    [
        'k' => 'Priority 01',
        'title' => 'Accessibility beats cleverness',
        'paras' => [
            '<strong>The highest-evidence AI citation factor is simply whether the URL can be reached and previewed.</strong> In Cyrus Shepard&#8217;s May 2026 meta-analysis of 54 studies, URL accessibility scored 9.5/10 and preview control 9.2/10, meaning a page blocked by robots.txt, returning a non-200, sitting behind a paywall, or suppressing snippets via <code>nosnippet</code> is excluded before any content quality is assessed.',
            'Google adds a second gate that is easy to miss: to be eligible for generative AI features, a page must be indexed, eligible to appear with a snippet, <em>and</em> the site must be included in Search generative AI features in Search Console.',
        ],
        'src' => 'Sources: Zyppy AI Citation Ranking Factors, May 2026. Google Search Central, AI optimisation guide, updated 10 July 2026.',
    ],
    [
        'k' => 'Priority 02',
        'title' => 'Classic ranking is still the base layer',
        'paras' => [
            '<strong>Search rank scored 9.4/10, the second-highest factor, so AEO does not replace SEO, it compounds it.</strong> But the relationship has loosened sharply: Ahrefs&#8217; analysis of 863,000 SERPs and 4 million AI Overview URLs found only 37.9% of cited URLs rank in the organic top 10, versus about 76% in mid-2025, with 31.2% ranking 11 to 100 and 31.0% outside the top 100 entirely.',
            'The practical consequence: ranking number one for a head term is neither necessary nor sufficient. Ranking respectably across the whole cluster of sub-questions is what earns repeat selection.',
        ],
        'src' => 'Sources: Ahrefs, AI Overview citations and top 10, 2026. Zyppy, May 2026.',
    ],
    [
        'k' => 'Priority 03',
        'title' => 'Fan-out means clusters, not keywords',
        'paras' => [
            '<strong>Google&#8217;s documentation confirms AI features use query fan-out: a set of concurrent related queries generated to fetch additional results before an answer is composed.</strong> Fan-out rank scored 9.3/10 and topic-cluster ranking 8.9/10 in the same meta-analysis, the strongest content-strategy signals measured.',
            'So AEO content planning starts from a question map, not a keyword list. Google also warns against the obvious abuse of this: spinning up a page per fan-out variant is scaled content abuse under its spam policies, and it does not work.',
        ],
        'src' => 'Sources: Google Search Central, AI features and AI optimisation guides. Zyppy, May 2026.',
    ],
    [
        'k' => 'Priority 04',
        'title' => 'Mentions outperform links',
        'paras' => [
            '<strong>Across 75,000 brands, branded web mentions correlated 0.664 with AI Overview visibility, against 0.218 for raw backlink counts, roughly 3 times stronger.</strong> Branded anchor text at 0.527 and branded search volume at 0.392 also outranked Domain Rating at 0.326.',
            'That reorders the budget: digital PR, genuine unlinked mentions, podcasts, community answers and category presence do more for AEO than link acquisition. Note the caveat the original authors state and I will repeat, these are correlations, and strong brands plausibly earn both.',
        ],
        'src' => 'Source: Ahrefs, 75,000-brand AI visibility correlation study.',
    ],
    [
        'k' => 'Priority 05',
        'title' => 'Structure, then freshness',
        'paras' => [
            '<strong>Answer-near-the-top scored 8.8/10, AI-ready structure 8.6/10, self-contained passages 8.0/10 and freshness only 7.0/10.</strong> Freshness is real but moderate: across 16.97 million cited URLs, AI-cited content averaged 1,064 days old against 1,432 days for Google&#8217;s organic top ten, a 25.7% advantage, not a multiplier.',
            'The widely repeated claim that fresh content is cited 4.3 times more does not trace to any primary study and should not be repeated. ChatGPT does skew freshest of the major engines at about 958 days.',
        ],
        'src' => 'Sources: Zyppy, May 2026. Ahrefs content-freshness study, 16.975M citations.',
    ],
    [
        'k' => 'The honest part',
        'title' => 'Three things I will not sell you',
        'paras' => [
            '<strong>No guaranteed AI citations.</strong> Nobody controls what a model quotes, and AI Overviews are probabilistic. The same query can return different sources hours apart.',
            '<strong>No llms.txt as a ranking factor.</strong> Google states plainly that Google Search does not use llms.txt, and it scored lowest of 23 factors at 2.0/10. I will implement one if you want it for other crawlers. I will not bill it as AEO.',
            '<strong>No AEO instead of SEO.</strong> Google&#8217;s position and the citation data agree: generative features are grounded in core Search systems. Anyone selling AEO as a replacement for SEO is selling you half a strategy.',
        ],
        'src' => 'Sources: Google Search Central AI optimisation guide, updated 10 July 2026. Zyppy, May 2026.',
    ],
];

/* ── Why hire an AEO specialist ───────────────────────────────────────── */
$why = [
    ['Every engine measured separately', 'ChatGPT, Perplexity, Gemini, Claude, Copilot and Google&#8217;s AI surfaces are queried independently, because they do not share a source pool. Independent 2026 studies put domain-citation overlap between ChatGPT and Perplexity at around 11%. A blended AI visibility score would hide exactly which engine is failing you.'],
    ['Diagnosis before prescription', 'Invisible in ChatGPT and Copilot usually points to a Bing indexing or third-party-mention gap. Invisible in Perplexity usually points to freshness or answer structure. Invisible in AI Overviews and Gemini usually points to entity or eligibility problems. Same symptom, three different jobs.'],
    ['An early practitioner, deliberately', 'I started in SEO in early 2025 and moved into AEO and GEO as those disciplines were forming rather than retrofitting them onto a decade of habits. Fewer years in the field, and the answer-engine half learned first-hand while it was being invented.'],
    ['Karnataka context, national scope', 'Bilingual Kannada and English question mapping and genuine tier-2 market knowledge from Kodagu, applied to clients anywhere in India who face the same dynamics. Local AEO benefits from local knowledge. Structure, schema and measurement travel fine remotely.'],
    ['Sources cited, claims checkable', 'Every statistic on this page names its study and sample size, and one popular statistic is corrected rather than repeated. That is not decoration. Citing sources internally is itself a scored citation factor, and it is the standard I hold client content to.'],
    ['You work with me, directly', 'Audit, prompt set, implementation and reporting all run through one person. No account managers, no junior handoffs. The client list is deliberately short, which is a real constraint as much as a selling point.'],
];

/* ── Practice at a glance ─────────────────────────────────────────────── */
$stats = [
    ['7', 'Answer surfaces tracked per client', 'Google AI Overviews, Google AI Mode, ChatGPT, Perplexity, Gemini, Claude and Microsoft Copilot, each queried and reported separately'],
    ['20 to 40', 'Prompts in a baseline set', 'Written in buyer language, clustered by sub-question theme, re-run on a fixed schedule so a real gain can be told apart from engine noise'],
    ['4', 'Certifications behind the practice', 'Semrush AI Visibility Essentials, Semrush Technical SEO and AI Search Essentials, Ahrefs Academy, and an Advanced Diploma in Digital Marketing'],
    ['3', 'Outcomes, never averaged', 'Cited with a link, mentioned without a citation, or absent. Three different diagnoses, three different fixes, reported separately'],
];

/* ── FAQ, verbatim answers ────────────────────────────────────────────── */
$faqs = [
    [
        'q' => 'What is Answer Engine Optimization (AEO)?',
        'a' => [
            '<strong>Answer Engine Optimization (AEO) is the practice of structuring content, entities and markup so that answer engines can extract a passage from a page and present it as the direct answer to a question.</strong> Where SEO competes for a ranked link someone clicks, AEO competes to be the answer itself, inside a featured snippet, a People Also Ask box, a voice response or a Google AI Overview.',
            'The working unit of AEO is the passage, not the page: a self-contained block of roughly 40 to 80 words that answers one question completely without depending on the text around it.',
        ],
        'open' => true,
    ],
    [
        'q' => 'Who is the best AEO expert in India?',
        'a' => [
            '<strong>There is no single best AEO expert in India, and any page claiming the title without evidence should be discounted. The useful approach is to test four things you can verify: whether they hold checkable AI-search certifications, whether they measure each answer engine separately rather than publishing one blended score, whether they distinguish being cited from being merely mentioned, and whether they refuse to guarantee AI citations.</strong>',
            'Fawaz BH is one option: an independent, Ahrefs and Semrush certified AEO consultant based in Kodagu, Karnataka, who runs a fixed prompt set across seven answer surfaces and reports each one separately. If you need several markets staffed in parallel next quarter, an agency is the better fit. That is a capacity limit, not modesty.',
        ],
    ],
    [
        'q' => 'Is there an AEO expert in Karnataka?',
        'a' => [
            '<strong>Yes. Fawaz BH is an AEO expert in Karnataka, based in Kushal Nagar, Kodagu, working with clients in Bengaluru, Mysuru, Mangaluru, Hubli-Dharwad and across the state, plus remote engagements throughout India.</strong> Karnataka-specific AEO work adds bilingual Kannada and English question mapping and local entity consistency across Google Business Profile, citations and the client&#8217;s own site.',
            'Local questions are where answer engines are most decisive, because they tend to return one recommendation instead of ten links, which makes local AEO higher-stakes than local SEO ever was.',
        ],
    ],
    [
        'q' => 'What is the difference between AEO, SEO and GEO?',
        'a' => [
            '<strong>SEO optimises for ranked positions in traditional search. AEO optimises for an answer extracted from your page and shown in place of a result, so featured snippets, People Also Ask, voice results and Google AI Overviews. GEO optimises for being cited inside a synthesised AI answer from a generative engine such as ChatGPT, Perplexity, Gemini or Claude.</strong>',
            'They share foundations but differ in selection mechanism, which is why all three are run as one strategy here rather than three separate retainers. Deeper breakdown on the <a href="/geo-consultant">GEO consultant</a> page, and a plain-language separation of all three on the <a href="/ai-seo-expert-india">AI SEO expert</a> page.',
        ],
    ],
    [
        'q' => 'How do you optimise a page for Google AI Overviews?',
        'a' => [
            '<strong>Google states that AI Overviews and AI Mode are grounded in its core Search ranking systems using retrieval-augmented generation and query fan-out, so a page must first be indexed, eligible to appear with a snippet, and included in Search generative AI features in Search Console.</strong> After that, the highest-leverage work is keeping URLs crawlable and previewable, ranking across the sub-queries fan-out expands into rather than one head term, and answering each question in a self-contained passage near the top of its section.',
            'Two 2026 numbers frame why breadth matters: only about 38% of AI Overview citations come from pages ranking in Google&#8217;s organic top 10, down from roughly 76% a year earlier, and nearly two-thirds of citations now go to pages outside the top 10.',
        ],
    ],
    [
        'q' => 'Do I need llms.txt or special schema markup for AEO?',
        'a' => [
            '<strong>No. Google&#8217;s official generative-AI optimisation guide states that Google Search does not use llms.txt files, does not require content chunking, and needs no special schema.org markup for AI features.</strong> In Cyrus Shepard&#8217;s May 2026 meta-analysis of 54 AI-citation studies, llms.txt scored lowest of 23 factors at 2.0 out of 10.',
            'Structured data is still worth implementing, for rich results, for entity resolution, and because other crawlers and engines behave differently from Google. Just do not buy it as an AI ranking hack.',
        ],
    ],
    [
        'q' => 'How long does AEO take to show results?',
        'a' => [
            '<strong>Extracted-answer wins such as featured snippets and People Also Ask placements can appear within a few weeks when an already-ranking page is restructured, while entity-level and brand-level AEO visibility typically takes three to six months.</strong> Recency-weighted engines move fastest: across nearly 17 million cited URLs, ChatGPT cited the freshest content of the major engines at about 958 days average age, versus 1,432 days for Google&#8217;s organic top ten.',
            'Generative answers are also volatile, the same prompt can return different sources hours apart, so a single check is anecdote. Only a repeated prompt set shows a trend.',
        ],
    ],
    [
        'q' => 'How much does an AEO expert in India charge?',
        'a' => [
            '<strong>Rates vary widely: published AEO and AI-visibility packages in India commonly run from roughly &#8377;15,000 to over &#8377;50,000 per month, while international AEO specialists typically bill $100 to $150 per hour.</strong> With Fawaz BH, full-stack SEO plus AEO starts at &#8377;29,999 per month, and AEO-only or enterprise SEO plus AEO plus GEO scopes are quoted after a free audit.',
            'The audit is free, you keep the written document either way, and scope and price are agreed in writing before any work or invoicing starts. Published starting rates are on the <a href="/seo-services">SEO services</a> page.',
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
            '@id'   => 'https://fawazbhseo.in/aeo-consultant#page',
            'url'   => 'https://fawazbhseo.in/aeo-consultant',
            'name'  => 'AEO expert in India and Karnataka, Answer Engine Optimization by Fawaz BH',
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
                'Answer Engine Optimization',
                'Generative Engine Optimization',
                'Search Engine Optimization',
                'Structured data',
                'Entity SEO',
                'Local SEO',
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
            '@id'   => 'https://fawazbhseo.in/aeo-consultant#service',
            'name'  => 'Answer Engine Optimization consulting',
            'serviceType' => 'Answer Engine Optimization',
            'provider'    => ['@id' => 'https://fawazbhseo.in/#fawaz'],
            'areaServed'  => ['Kodagu', 'Karnataka', 'South India', 'India'],
        ],
        [
            '@type' => 'FAQPage',
            '@id'   => 'https://fawazbhseo.in/aeo-consultant#faq',
            'mainEntity' => $faq_ld,
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

render_head([
    'title'       => 'AEO expert in India and Karnataka, Answer Engine Optimization | Fawaz BH',
    'description' => 'Fawaz BH is an independent AEO expert in India, based in Kodagu, Karnataka. Answer Engine Optimization for Google AI Overviews, ChatGPT, Perplexity, Gemini and Copilot, with each engine measured separately.',
    'canonical'   => 'https://fawazbhseo.in/aeo-consultant',
    'schema'      => $schema,
]);


/* Source context added for owner review. Existing claims/FAQ answers remain unchanged.
 * The source dates below are not page review dates or service commitments. */
$research_sources = json_decode(<<<'RESEARCH_SOURCES'
{
  "S01": {
    "title": "Google Search Central: AI features and your website",
    "url": "https://developers.google.com/search/docs/appearance/ai-features",
    "date": "Publication date not stated in the retrieved text; accessed 21 September 2026",
    "sample": "Official product guidance, not a study"
  },
  "S02": {
    "title": "Google Search Central: Optimizing your website for generative AI features",
    "url": "https://developers.google.com/search/docs/fundamentals/ai-optimization-guide",
    "date": "Last updated 10 July 2026, as displayed",
    "sample": "Official product guidance, not a study"
  },
  "S03": {
    "title": "Google Search Console: Generative AI performance report",
    "url": "https://support.google.com/webmasters/answer/16984139",
    "date": "Publication date not stated; rollout note dated 31 August 2026",
    "sample": "Official report documentation; impressions grouped by page, country, date and device"
  },
  "S04": {
    "title": "Google Search Console: Search generative AI control",
    "url": "https://support.google.com/webmasters/answer/16908024",
    "date": "Publication date not stated; rollout note dated 31 August 2026",
    "sample": "Official control documentation, not a study"
  },
  "S05": {
    "title": "Microsoft Bing: Intents, Topics, Citation Share and Compare",
    "url": "https://blogs.bing.com/search/June-2026/New-AI-Visibility-Insights-in-Bing-Webmaster-Tools-Intents-Topics-Citation-Share-Compare",
    "date": "16 June 2026",
    "sample": "Official announcement of four preview capabilities"
  },
  "S06": {
    "title": "Cyrus Shepard, Zyppy Signal: AI Citation Ranking Factors Analysis",
    "url": "https://signal.zyppy.com/p/ai-citation-ranking-factors",
    "date": "7 May 2026",
    "sample": "Synthesis of 54 selected experiments, studies, explainers and patents; 23 scored factors"
  },
  "S07": {
    "title": "Ahrefs: Update, 38% of AI Overview Citations Pull From the Top 10",
    "url": "https://ahrefs.com/blog/ai-overview-citations-top-10/",
    "date": "2 March 2026",
    "sample": "863,000 keyword SERPs; 4 million AI Overview URLs"
  },
  "S08": {
    "title": "Ahrefs: An Analysis of AI Overview Brand Visibility Factors",
    "url": "https://ahrefs.com/blog/ai-overview-brand-correlation/",
    "date": "26 May 2025",
    "sample": "75,000 brands selected; approximately 74% with mentions studied; DR above 40 and a high-volume top keyword used in selection"
  },
  "S09": {
    "title": "Ahrefs: Do AI Assistants Prefer to Cite Fresher Content?",
    "url": "https://ahrefs.com/blog/do-ai-assistants-prefer-to-cite-fresh-content/",
    "date": "28 July 2025",
    "sample": "16.975 million cited URLs; seven reported platform/citation categories"
  },
  "S10": {
    "title": "BuzzStream: What Kind of Content Does AI Cite, Based on Prompt Type?",
    "url": "https://www.buzzstream.com/blog/ai-citation-prompt-type-study/",
    "date": "Published 2 April 2026; updated 9 April 2026 (article metadata)",
    "sample": "4 million citations; 3,600 prompts; 10 industries; week starting 27 January 2026; ChatGPT, AI Mode, AI Overviews and Gemini"
  },
  "S11": {
    "title": "BuzzStream: The Role of News Publications in AI Citations",
    "url": "https://www.buzzstream.com/blog/news-publications-ai-citations/",
    "date": "Published 9 March 2026; updated 8 April 2026 (article metadata)",
    "sample": "4 million citations; 3,600 prompts; 10 industries; week starting 27 January 2026"
  },
  "S12": {
    "title": "Seer Interactive: AIO Impact on Google CTR, 2026 Update",
    "url": "https://www.seerinteractive.com/insights/aio-impact-on-google-ctr-2026-update",
    "date": "24 April 2026, displayed article date",
    "sample": "53 accounts; 5,471,127 queries; 2.43 billion organic impressions; January 2025 to February 2026 actuals"
  },
  "S13": {
    "title": "SparkToro: In 2026, Less Than One Third of Google Searches Still Send a Click",
    "url": "https://sparktoro.com/blog/in-2026-less-than-one-third-of-google-searches-still-send-a-click/",
    "date": "8 June 2026",
    "sample": "Similarweb US desktop/mobile-browser panel, January to April 2026; exact observation count not stated"
  },
  "S14": {
    "title": "Seer Interactive: 87% of SearchGPT Citations Match Bing's Top Results",
    "url": "https://www.seerinteractive.com/insights/87-percent-of-searchgpt-citations-match-bings-top-results",
    "date": "6 February 2025",
    "sample": "100 queries; more than 500 citations; many top/best queries"
  },
  "S15": {
    "title": "Ahrefs: Are AI Mode and AI Overviews Just Different Versions of the Same Answer?",
    "url": "https://ahrefs.com/blog/ai-overviews-vs-ai-mode/",
    "date": "15 December 2025",
    "sample": "September 2025 US data; 540,000 query pairs for URL/citation analysis and 730,000 for content similarity"
  },
  "S16": {
    "title": "BrightEdge: Rank Overlap After 16 Months of AI Overviews",
    "url": "https://www.brightedge.com/resources/weekly-ai-search-insights/rank-overlap-after-16-months-of-aio",
    "date": "18 September 2025",
    "sample": "Nine industries, May 2024 to September 2025; exact query count not stated"
  },
  "S17": {
    "title": "OpenAI: ChatGPT Search",
    "url": "https://help.openai.com/en/articles/9237897-chatgpt-search",
    "date": "Absolute publication/update date not stated in retrieved text; accessed 21 September 2026",
    "sample": "Official product documentation, not a study"
  },
  "S18": {
    "title": "Perplexity: How Does Perplexity Work?",
    "url": "https://www.perplexity.ai/help-center/en/articles/10352895-how-does-perplexity-work",
    "date": "Absolute publication/update date not stated in retrieved text; accessed 21 September 2026",
    "sample": "Official product documentation, not a study"
  },
  "S19": {
    "title": "Anthropic: Claude Can Now Search the Web",
    "url": "https://claude.com/blog/web-search",
    "date": "20 March 2025; availability update 27 May 2025",
    "sample": "Official product announcement, not a study"
  },
  "S20": {
    "title": "Microsoft Learn: Microsoft 365 Copilot Architecture",
    "url": "https://learn.microsoft.com/en-us/copilot/microsoft-365/microsoft-365-copilot-architecture",
    "date": "Publication date not established in this check; accessed 21 September 2026",
    "sample": "Official architecture documentation for the Microsoft 365 product context"
  },
  "S21": {
    "title": "Google Search Central: FAQ rich-result deprecation and documentation removal",
    "url": "https://developers.google.com/search/updates#removing-faq-rich-result",
    "date": "Deprecation notice 8 May 2026; documentation-removal entry 15 June 2026",
    "sample": "Official documentation changelog"
  },
  "S22": {
    "title": "Google Search Central: Speakable structured data",
    "url": "https://developers.google.com/search/docs/appearance/structured-data/speakable",
    "date": "Publication date not established in this check; accessed 21 September 2026",
    "sample": "Official beta feature documentation"
  }
}
RESEARCH_SOURCES
, true);
$research_rules = json_decode(<<<'RESEARCH_RULES'
[["Generative AI performance report|Search Console AI feature inclusion|included in Search generative AI", ["S01", "S02", "S03", "S04"]], ["Bing Webmaster|Intents|Citation Share", ["S05"]], ["37\\.9|38%|31\\.2|31\\.0|76%|863|4 million AI Overview|four million AI Overview", ["S07"]], ["0\\.664|0\\.218|0\\.527|0\\.392|0\\.326|169.*14|75,000|3 times.*strong|three times.*strong", ["S08"]], ["Zyppy|meta-analysis|9\\.5|9\\.4|9\\.3|9\\.2|8\\.9|8\\.8|8\\.6|8\\.0|7\\.0|2\\.0|highest-evidence|second-strongest|scored citation factor", ["S06"]], ["1,064|1,432|16\\.97|16\\.98|25\\.7|958|4\\.3|freshness.*moderate", ["S09"]], ["53\\.46|53%|0\\.04|80%|BuzzStream|3,600|4 million citations|four-million-citation", ["S10", "S11"]], ["120%|5\\.47|53 brands", ["S12"]], ["68%|SparkToro|zero.click", ["S13"]], ["87%|SearchGPT", ["S14"]], ["13\\.7", ["S15"]], ["BrightEdge", ["S16"]], ["Bing-backed|ChatGPT retrieves|Bing.*ChatGPT|ChatGPT.*Bing|Invisible in|engine-specific bottleneck|actual cause|specific bottleneck|lever that most reliably", ["S17", "S14"]], ["Perplexity.*(freshness|live|query)|freshness.*Perplexity|multi-API", ["S18"]], ["Brave-backed|Claude.*Live web", ["S19"]], ["Microsoft Graph|Copilot.*Bing index", ["S20"]], ["Google.*(documentation|guidance|explicit|confirms|states|position)|query fan-out|retrieval-augmented|RAG|Business Profile.*AI responses|no special markup|llms\\.txt.*(Google|ranking)|Google.*llms\\.txt", ["S01", "S02"]], ["AEO targets|AEO optimises|GEO optimises|different selection mechanisms|different surfaces|extracted.*synth|extraction.*synthesis|passage.*direct answer", ["S01", "S02"]], ["40 to 80|one recommendation|higher-stakes", ["S02"]], ["HowTo|FAQPage|Speakable", ["S02", "S21", "S22"]], ["paywalled|simply skipped|do not recall|Nothing is lifted verbatim|Context-dependent prose does not|zero out citations|excluded before any", ["S01", "S02", "S06"]]]
RESEARCH_RULES
, true);
$research_note = static function ($source_ids) use ($research_sources) {
    $ids = preg_split('/\s+/', trim($source_ids), -1, PREG_SPLIT_NO_EMPTY);
    if (!$ids) return;
    echo '<p class="field-note research-note">';
    if ($ids) {
        echo 'Source context: ';
        $links = [];
        foreach ($ids as $id) {
            $source = $research_sources[$id];
            $links[] = '<a href="' . htmlspecialchars($source['url'], ENT_QUOTES, 'UTF-8') . '">' . $id . '</a> (<a href="#source-' . $id . '">date and sample</a>)';
        }
        echo implode('; ', $links) . '.';
    }
    echo '</p>';
};
$research_context = static function ($text) use ($research_rules, $research_note) {
    $plain = html_entity_decode(strip_tags($text), ENT_QUOTES, 'UTF-8');
    $sources = [];
    foreach ($research_rules as $rule) {
        if (preg_match('~' . $rule[0] . '~i', $plain)) {
            $sources = array_merge($sources, $rule[1]);
        }
    }
    $sources = array_unique($sources);
    sort($sources);
    $research_note(implode(' ', $sources));
};

render_header('aeo');
?>

<main id="main">

  <section class="hero" aria-labelledby="hero-h">
    <div class="wrap hero__grid">

      <div class="hero__lead reveal">
        <p class="eyebrow">Answer Engine Optimization, India and Karnataka</p>
        <h1 id="hero-h">AEO expert in India, based in Karnataka. Built to be the answer.</h1>
        <p class="hero__sub">Clear answers, accurate business information and evidence customers can check.</p>
        <p style="margin-top:14px;color:var(--text-2)">New to the terminology? Read <a href="/blogs/seo-aeo-geo-differences">SEO vs AEO vs GEO, with examples</a>. To assess results, use the <a href="/blogs/measure-ai-search-visibility">AI mention and citation measurement guide</a>.</p>
        <p style="margin-top:18px;color:var(--text-2)">I am <strong>Fawaz BH</strong>, an independent Answer Engine Optimization consultant based in Kushal Nagar, Kodagu, Karnataka, working with clients across India. AEO is the work of making a page the <strong>answer</strong> rather than one of ten links: structured so Google AI Overviews, AI Mode, ChatGPT, Perplexity, Gemini, Claude and Microsoft Copilot can extract, trust and cite a specific passage. I am certified by Ahrefs Academy and Semrush, including <strong>AI Visibility Essentials</strong>, I query all five answer engines separately for every client because they do not share a source pool, and every engagement is delivered directly, with no account managers. This page is the demonstration: it is written, structured and marked up using exactly the method described below.</p>
          <?php $research_note('S18'); ?>

        <div class="btn-row">
          <a class="btn btn--accent" href="https://wa.me/919481084038?text=Hi%20Fawaz%2C%20I%20would%20like%20an%20AEO%20audit" target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 21a9 9 0 1 0-8.5-6.1L2 22l6.5-1.6A9 9 0 0 0 12 21Z"/></svg>
            Request a free AEO audit
          </a>
          <a class="btn" href="#aeo-vs">AEO vs SEO vs GEO</a>
        </div>
      </div>

      <figure class="hero__figure reveal">
        <img src="/assets/images/fawazbh.webp"
             alt="Fawaz BH, independent Answer Engine Optimization consultant in Kodagu, Karnataka"
             width="440" height="440" fetchpriority="high" decoding="async">
        <figcaption>Fawaz BH, Kushal Nagar, Kodagu</figcaption>
      </figure>

    </div>
  </section>


  <section class="section" id="service-overview" aria-labelledby="service-overview-h">
    <div class="wrap">
      <div class="section-head reveal"><h2 id="service-overview-h">What the AEO service is</h2></div>
<p class="lede">This service brings together question mapping, answer-first content, business-identity and structured-data work, and separate checks of answer-engine visibility. The published workstreams below describe the scope; the free audit is the starting point for deciding which work is needed.</p>
      <p><a href="#fit">Check the fit</a> · <a href="#handovers">See the supported handovers</a> · <a href="#scoping">Discuss scope</a> · <a href="#research-sources">Check sources and review status</a></p>
    </div>
  </section>


  <section class="section section--alt" id="what-is-aeo" aria-labelledby="def-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">Definitions first</p>
        <h2 id="def-h">What an AEO expert actually does</h2>
        <p class="lede">Answer Engine Optimization is a young enough discipline that most pages selling it never define it. This section defines it, states which surfaces it targets, explains how it is measured, and says plainly who does this work in Karnataka and India.</p>
      </div>

      <div>
        <article class="card card--featured reveal">
          <span class="card-index">Definition</span>
          <h3>Answer Engine Optimization, defined</h3>
          <p><strong>Answer Engine Optimization (AEO) is the practice of structuring content, entities and markup so that answer engines can extract a specific passage from a page and present it as the direct answer to a question.</strong> Where classic SEO competes for a ranked link that a person clicks, AEO competes to be the answer the person is given, inside a featured snippet, a People Also Ask box, a voice response, or a Google AI Overview.</p>
          <?php $research_note('S01 S02'); ?>
          <p>The practical unit of AEO is not the page. It is the <strong>passage</strong>: a self-contained block of 40 to 80 words that answers one question completely, without needing the paragraph above it for context.</p>
          <?php $research_note('S01 S02'); ?>
        </article>
      </div>

    </div>
  </section>


  <section class="section" id="fit" aria-labelledby="fit-h">
    <div class="wrap">
      <div class="section-head reveal"><h2 id="fit-h">Who this work suits, and when it does not</h2></div>
<div class="grid grid--2">
        <article class="card"><h3>A founder-led engagement</h3><p>Consider this scope if you want one consultant to connect your existing search foundations, business information and answer-engine visibility, with the work delivered directly rather than through an account-management layer.</p></article>
        <article class="card"><h3>Know the limits before starting</h3><p>This is not a fit if you require guaranteed citations or a large team covering many markets in parallel. If you are still choosing between disciplines, compare the <a href="/ai-seo-expert-india">AI SEO scope explanation</a> and the <a href="/seo-services">published service catalogue</a> before agreeing an engagement.</p></article>
      </div>
    </div>
  </section>


  <section class="section section--alt" id="services" aria-labelledby="svc-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">The AEO work</p>
        <h2 id="svc-h">Four workstreams, one answer strategy</h2>
        <p class="lede">Everything below is delivered directly by me. Deliverables are named because AI visibility services without deliverables is not a scope.</p>
      </div>

      <div class="grid grid--2">
        <?php $n = 1; foreach ($workstreams as $w): ?>
        <article class="card<?php echo $w['featured'] ? ' card--featured' : ''; ?> reveal">
          <span class="card-index"><?php echo str_pad((string) $n, 2, '0', STR_PAD_LEFT); ?></span>
          <h3><?php echo $w['title']; ?></h3>
          <p><?php echo $w['body']; ?></p>
          <?php $research_context($w['body']); ?>
          <ul class="tags">
            <?php foreach ($w['tags'] as $t): ?>
            <li class="tag"><?php echo $t; ?></li>
            <?php endforeach; ?>
          </ul>
        </article>
        <?php $n++; endforeach; ?>
      </div>
    </div>
  </section>


  <section class="section" id="handovers" aria-labelledby="handovers-h">
    <div class="wrap">
      <div class="section-head reveal"><h2 id="handovers-h">What the published scope supports handing over</h2></div>
<p>This is a practical reading of the work already described on this page, not a new package or an additional output allowance.</p>
      <div class="table-wrap"><table class="data-table"><caption>Existing scope and details to settle before work starts</caption><thead><tr><th scope="col">Work already described</th><th scope="col">Concrete output supported by the page</th><th scope="col">Confirm in the engagement scope</th></tr></thead><tbody>
        <tr><th scope="row">Discovery audit</th><td>A written audit or baseline that you keep whether or not you hire Fawaz.</td><td>Document format and the boundary between the free consultation and paid implementation.</td></tr>
        <tr><th scope="row">Prompt mapping</th><td>A buyer-language set of 20 to 40 prompts, with related questions grouped for the work.</td><td>Selected questions, products/modes, markets and access to the underlying prompt records.</td></tr>
        <tr><th scope="row">Content and identity work</th><td>The page describes content restructuring, entity/profile consistency work and structured-data implementation.</td><td>Which pages and profiles, who approves and publishes changes, and any revision or access limits.</td></tr>
        <tr><th scope="row">Reporting</th><td>Repeated observations reported separately by engine, using the outcome categories already described below.</td><td>Report format, review cadence, included evidence and the data available for your property.</td></tr>
      </tbody></table></div>
      <p class="field-note">File formats, revision counts, page quantities, turnaround times and additional reporting fields are not specified here. Agree them before work begins; they should not be inferred from an example or a research statistic.</p>
    </div>
  </section>



  <section class="section" id="inputs" aria-labelledby="inputs-h">
    <div class="wrap">
      <div class="section-head reveal"><h2 id="inputs-h">Inputs and responsibilities to discuss</h2></div>
<p>Use this as a pre-scope discussion checklist, not as a request to send passwords or confidential customer data.</p>
      <div class="grid grid--2">
        <article class="card"><h3>Business information and priorities</h3><ul><li>Public website and relevant business-profile URLs.</li><li>The services, locations and buyer questions you want to assess.</li><li>Accurate business facts and evidence you are willing to publish.</li><li>A person who can verify facts and approve changes.</li></ul></article>
        <article class="card"><h3>Access and implementation</h3><p>Discuss which analytics and search reports are available, which changes can be made within the agreed scope, and who can approve or publish them. The existing service description assigns audit, implementation and reporting to Fawaz; access permissions, approval timing and any client-side dependencies still need to be agreed.</p></article>
      </div>
    </div>
  </section>


  <section class="section section--alt" id="process" aria-labelledby="proc-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">How AEO engagements run</p>
        <h2 id="proc-h">From prompt set to cited source</h2>
      </div>

      <div class="grid grid--2">
        <article class="step reveal">
          <p class="step__k">01 &nbsp; AUDIT</p>
          <h3>Free AEO discovery audit</h3>
          <p>Accessibility and preview check first, so robots, status codes, <code>nosnippet</code>, snippet eligibility and Search Console AI feature inclusion, then entity, schema and passage review, then a baseline prompt run across all engines. Delivered as a written document you keep either way.</p>
          <?php $research_note('S01 S02 S03 S04'); ?>
        </article>
        <article class="step reveal">
          <p class="step__k">02 &nbsp; PROMPT SET</p>
          <h3>Buyer-language prompt map</h3>
          <p>20 to 40 prompts written the way your customers actually talk to an assistant, clustered into the sub-question themes fan-out is likely to expand into. Not a keyword list. The two produce different answers.</p>
        </article>
        <article class="step reveal">
          <p class="step__k">03 &nbsp; EXECUTION</p>
          <h3>Structure, markup, corroboration</h3>
          <p>Passage rewrites, question-shaped headings, structured data, entity cleanup across profiles, and third-party corroboration work, because branded web mentions correlate roughly 3 times more strongly with AI Overview visibility than raw backlink counts.</p>
          <?php $research_note('S08'); ?>
        </article>
        <article class="step reveal">
          <p class="step__k">04 &nbsp; RE-RUN</p>
          <h3>Trend reporting, per engine</h3>
          <p>The identical prompt set re-run on a fixed schedule, reported engine by engine and split into cited, mentioned-only and absent, cross-checked against Search Console and Bing Webmaster Tools first-party data.</p>
          <?php $research_note('S05'); ?>
        </article>
      </div>
    </div>
  </section>


  <section class="section" id="measurement" aria-labelledby="measurement-h">
    <div class="wrap">
      <div class="section-head reveal"><h2 id="measurement-h">How the work is measured</h2></div>
<p>The published method uses a repeatable prompt set, with results reported separately by engine. The existing categories are cited, mentioned without citation and absent. Use the <a href="/blogs/measure-ai-search-visibility">measurement guide and blank observation log</a> to see how the site distinguishes mentions, citations and recommendations.</p>
      <article class="card"><h3>Illustration only: reading an observation</h3><p>If an answer names a business but provides no link to its website, record a mention without a citation. If it links to a page, record that citation. A recommendation is a separate observation about what the answer actually says. This is an explanation of the categories, not a client result, a measured improvement or a promise that an answer will appear.</p></article>
<article class="card reveal" style="margin-top:22px">
          <span class="card-index">Measurement</span>
          <h3>How AEO gets measured honestly</h3>
          <p><strong>AEO is measured with a fixed prompt set, re-run on a schedule, reported per engine and split three ways: cited, mentioned-without-citation, and absent.</strong> Those three outcomes have three different causes and three different fixes, and any tool that averages them into a single AI visibility score hides the thing you needed to know.</p>
          <?php $research_note('S01 S02'); ?>
          <p>First-party data now exists for both major ecosystems: Google Search Console has a Generative AI performance report, and Bing Webmaster Tools&#8217; AI Performance report added Intents, Topics, Citation Share and period Compare in preview in June 2026. I use both alongside manual prompt testing rather than relying on a single third-party score.</p>
          <?php $research_note('S01 S02 S03 S04 S05'); ?>
        </article>
    </div>
  </section>



  <section class="section" id="evidence" aria-labelledby="evidence-h">
    <div class="wrap">
      <div class="section-head reveal"><h2 id="evidence-h">Evidence, mechanisms and background</h2></div>
<p>Read the research alongside its linked publication dates and samples. Existing factual wording is retained pending the owner decisions noted below; a citation link is not an approval of every inference.</p>
    </div>
  </section>


  <section class="trust" aria-label="Answer surfaces tracked">
    <div class="wrap">
      <p>Google AI Overviews. Google AI Mode. ChatGPT. Perplexity. Gemini. Claude. <span class="accent">Copilot. Each one measured separately.</span></p>
    </div>
  </section>


  <section class="section" id="answer-surfaces" aria-labelledby="answer-surfaces-h">
    <div class="wrap">
      <div class="section-head reveal"><h2 id="answer-surfaces-h">Answer surfaces and mechanism context</h2></div>
<article class="card reveal" style="margin-top:22px">
          <span class="card-index">Surfaces</span>
          <h3>The surfaces AEO targets</h3>
          <p>AEO work is aimed at every place a search system answers instead of listing: <strong>Google AI Overviews and AI Mode, featured snippets, People Also Ask, Google Assistant and voice results, Bing and Microsoft Copilot answers, and the direct-answer panels that now sit above organic results.</strong></p>
          <p>Two structural facts change the strategy. First, Google&#8217;s own documentation confirms AI Overviews and AI Mode are grounded in its core Search ranking systems using retrieval-augmented generation plus query fan-out. Second, Ahrefs&#8217; 2026 analysis of 4 million AI Overview URLs found only about 38% of cited pages rank in the organic top 10, with roughly 31% ranking 11 to 100 and another 31% not ranking in the top 100 at all. Breadth across a question cluster now beats owning one head term.</p>
          <?php $research_note('S01 S02 S07'); ?>
        </article>
    </div>
  </section>


  <section class="section" id="pipeline" aria-labelledby="pipe-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">The mechanism</p>
        <h2 id="pipe-h">How an answer engine builds an answer</h2>
        <p class="lede">Four stages sit between a typed question and a named source. AEO is the work of surviving all four. Sample query: <strong>best aeo expert in india</strong>.</p>
      </div>

      <div class="grid grid--2">
        <?php foreach ($pipeline as $p): ?>
        <article class="step reveal">
          <p class="step__k"><?php echo $p['k']; ?> &nbsp; <?php echo strtoupper($p['stage']); ?></p>
          <h3><?php echo $p['title']; ?></h3>
          <p><?php echo $p['body']; ?></p>
          <?php $research_context($p['body']); ?>
        </article>
        <?php endforeach; ?>
      </div>

      <div class="grid grid--3" style="margin-top:clamp(34px,4vw,52px)">
        <div class="stat reveal">
          <p class="stat__val">37.9%</p>
          <?php $research_note('S07'); ?>
          <p class="stat__label">of AI Overview citations come from pages ranking in Google&#8217;s organic top 10, down from roughly 76% in mid-2025.</p>
          <?php $research_note('S07'); ?>
          <p class="stat__note">Ahrefs, 863K SERPs and 4M AIO URLs</p>
          <?php $research_note('S07'); ?>
        </div>
        <div class="stat reveal">
          <p class="stat__val">0.664 vs 0.218</p>
          <?php $research_note('S08'); ?>
          <p class="stat__label">Correlation with AI Overview visibility: branded web mentions versus raw backlink count, roughly 3 times stronger.</p>
          <?php $research_note('S08'); ?>
          <p class="stat__note">Ahrefs, 75,000-brand study</p>
          <?php $research_note('S08'); ?>
        </div>
        <div class="stat reveal">
          <p class="stat__val">9.5/10</p>
          <?php $research_note('S06'); ?>
          <p class="stat__label">Evidence score for plain URL accessibility, the highest-rated AI citation factor of 23 assessed. <code>llms.txt</code> scored 2.0.</p>
          <?php $research_note('S06'); ?>
          <p class="stat__note">Zyppy meta-analysis of 54 studies, May 2026</p>
          <?php $research_note('S06'); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="aeo-vs" aria-labelledby="vs-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Terminology</p>
        <h2 id="vs-h">AEO vs SEO vs GEO, in one screen</h2>
        <p class="lede">These three terms are used interchangeably and should not be. They share foundations but target different selection mechanisms, which is why I run all three as one strategy instead of three retainers.</p>
          <?php $research_note('S01 S02'); ?>
      </div>

      <div class="grid grid--3">
        <article class="card reveal">
          <span class="card-index">SEO</span>
          <h3>Search Engine Optimization</h3>
          <p><strong>SEO optimises for ranked positions in traditional search results.</strong> The unit of success is a link in the top ten that someone clicks. The levers are crawlability, indexation, page experience, on-page relevance, internal linking and off-site authority.</p>
          <p>SEO is still the base layer, not a legacy channel: search rank scored 9.4/10 in the 2026 Zyppy evidence ranking of AI citation factors, second only to plain URL accessibility.</p>
          <?php $research_note('S06'); ?>
        </article>

        <article class="card card--featured reveal">
          <span class="card-index">AEO</span>
          <h3>Answer Engine Optimization</h3>
          <p><strong>AEO optimises for an answer that is <em>extracted</em> from your page and displayed in place of a result.</strong> The unit of success is a passage selected for a featured snippet, a People Also Ask entry, a voice response or a Google AI Overview.</p>
          <?php $research_note('S01 S02'); ?>
          <p>The work is question-shaped headings, answers placed near the top of each section, self-contained passages, unambiguous entity signals and clean structured data. This page is a live example of all five.</p>
        </article>

        <article class="card reveal">
          <span class="card-index">GEO</span>
          <h3>Generative Engine Optimization</h3>
          <p><strong>GEO optimises for being <em>cited inside</em> a synthesised AI answer from a generative engine such as ChatGPT, Perplexity, Gemini or Claude.</strong> The unit of success is your domain appearing as a named source in prose the model wrote itself.</p>
          <?php $research_note('S01 S02'); ?>
          <p>GEO leans harder on cross-domain entity resolution, third-party corroboration and freshness, because these engines do not share a source pool: independent 2026 analyses put domain-citation overlap between ChatGPT and Perplexity at roughly 11%, with about 71% of cited sources appearing on only one platform. Full breakdown on the <a href="/geo-consultant">GEO consultant</a> page.</p>
          <?php $research_note('S18'); ?>
        </article>
      </div>
    </div>
  </section>

  <section class="section" id="method" aria-labelledby="method-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Method and evidence</p>
        <h2 id="method-h">What actually gets a page selected as the answer</h2>
        <p class="lede">Six things the 2026 evidence supports, in rough priority order, with sources named. Where a popular claim does not survive checking, I say so, including where it costs me the easier sales pitch.</p>
      </div>

      <div class="grid grid--2">
        <?php foreach ($method as $m): ?>
        <article class="card<?php echo $m['k'] === 'The honest part' ? ' card--featured' : ''; ?> reveal">
          <span class="card-index"><?php echo $m['k']; ?></span>
          <h3><?php echo $m['title']; ?></h3>
          <?php foreach ($m['paras'] as $para): ?>
          <p><?php echo $para; ?></p>
          <?php $research_context($para); ?>
          <?php endforeach; ?>
          <p class="stat__note" style="margin-top:14px"><?php echo $m['src']; ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section" id="credentials" aria-labelledby="cred-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Credentials</p>
        <h2 id="cred-h">Certified for AI search, and verifiable</h2>
        <p class="lede">Four qualifications, two of them specifically about AI search and answer engines. Named issuers so you can check them rather than take my word for it.</p>
      </div>

      <div class="grid grid--2">
        <article class="card card--featured reveal">
          <span class="badge badge--accent">Issued by Semrush</span>
          <h3>Semrush AI Visibility Essentials</h3>
          <p>The certification that underpins the AEO practice directly: how brands earn visibility inside AI-driven search and answer engines, prompt-level tracking, share of voice inside generated answers, and the difference between being retrieved and being cited.</p>
        </article>

        <article class="card card--featured reveal">
          <span class="badge badge--accent">Issued by Semrush</span>
          <h3>Semrush Technical SEO and AI Search Essentials</h3>
          <p>Crawlability, indexation, site health and structured data, plus how those foundations feed modern AI search surfaces. This matters more than it sounds: URL accessibility is the single highest-evidence AI citation factor, and a stray <code>nosnippet</code> directive can zero out citations a page would otherwise have earned.</p>
          <?php $research_note('S01 S02 S06'); ?>
        </article>

        <article class="card reveal">
          <span class="badge">Issued by Ahrefs</span>
          <h3>Ahrefs Academy Certification</h3>
          <p>Keyword research, backlink analysis, competitive research and technical site auditing. AEO does not replace this layer. It sits on top of it, because classic ranking is still the second-strongest citation signal in the current evidence.</p>
          <?php $research_note('S06'); ?>
        </article>

        <article class="card reveal">
          <span class="badge">Issued by Adrex Media School</span>
          <h3>Advanced Diploma in Digital Marketing</h3>
          <p>A broad grounding across digital marketing disciplines, which is what lets me tell you when the answer to a visibility problem is not more AEO.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="section section--alt" id="why" aria-labelledby="why-h">
    <div class="wrap split">

      <div class="reveal">
        <p class="eyebrow">Choosing an AEO expert</p>
        <h2 id="why-h" style="margin-block:16px 26px">Why hire an AEO specialist in India?</h2>
        <ol class="why-list">
          <?php $n = 1; foreach ($why as $w): ?>
          <li>
            <span class="idx"><?php echo str_pad((string) $n, 2, '0', STR_PAD_LEFT); ?></span>
            <div>
              <h3><?php echo $w[0]; ?></h3>
              <p><?php echo $w[1]; ?></p>
          <?php $research_context($w[1]); ?>
            </div>
          </li>
          <?php $n++; endforeach; ?>
        </ol>
      </div>

      <div class="sticky-col reveal">
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

  <section class="section" id="proof" aria-labelledby="proof-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Go deeper</p>
        <h2 id="proof-h">The rest of the practice</h2>
        <p class="lede">AEO is one of three connected disciplines here. If you are evaluating whether to hire me, these are where the surrounding evidence lives.</p>
      </div>

      <div class="grid grid--3">
        <article class="card card--link reveal">
          <span class="card-index">Sibling discipline</span>
          <h3><a href="/geo-consultant">GEO consultant, generative engine optimization</a></h3>
          <p>Where AEO wins the extracted answer, GEO wins the citation inside a synthesised one. The <a href="/geo-consultant">GEO consultant page</a> covers engine-by-engine source selection, corroboration strategy and how citation share is tracked across ChatGPT, Perplexity, Gemini and Claude. If the three terms still blur together, the <a href="/ai-seo-expert-india">AI SEO expert in India</a> page separates them and says which one to spend on first.</p>
          <?php $research_note('S01 S02 S05'); ?>
        </article>

        <article class="card card--link reveal">
          <span class="card-index">Geographic scope</span>
          <h3>SEO foundations, state and nationwide</h3>
          <p>AEO rests on classic ranking, so the foundations matter. See <a href="/seo-consultant-karnataka">SEO consultant in Karnataka</a> for state-level and bilingual local work, <a href="/seo-consultant-india">SEO consultant in India</a> for remote nationwide engagements, or the <a href="/">Fawaz BH homepage</a> for how all three disciplines are run as one strategy.</p>
        </article>

        <article class="card card--link reveal">
          <span class="card-index">Evidence and background</span>
          <h3>Case studies and full background</h3>
          <p>Engagement notes and client-approved testimonials are on <a href="/case-studies">case studies</a>. How I got into search in early 2025 and moved into answer-engine work is on <a href="/about">about Fawaz BH</a>. Scopes and published starting rates are on <a href="/seo-services">SEO services</a>.</p>
        </article>
      </div>
    </div>
  </section>


  <section class="section" id="research-sources" aria-labelledby="research-sources-h">
    <div class="wrap">
      <div class="section-head reveal"><h2 id="research-sources-h">Source records</h2></div>

      <ol class="source-records">
        <?php foreach ($research_sources as $source_id => $source): ?>
        <li id="source-<?php echo $source_id; ?>" style="margin-bottom:18px">
          <strong><?php echo $source_id; ?>:</strong> <a href="<?php echo htmlspecialchars($source['url'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($source['title'], ENT_QUOTES, 'UTF-8'); ?></a>.
          <span><?php echo htmlspecialchars($source['date'], ENT_QUOTES, 'UTF-8'); ?>.</span>
          <span>Sample/type: <?php echo htmlspecialchars($source['sample'], ENT_QUOTES, 'UTF-8'); ?>.</span>
        </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </section>



  <section class="section" id="scoping" aria-labelledby="scoping-h">
    <div class="wrap">
      <div class="section-head reveal"><h2 id="scoping-h">Scoping and the next decision</h2></div>
<p>Start with the free audit and agree the work and price in writing before implementation or invoicing. Published packages remain on the <a href="/seo-services#pricing">services and pricing page</a>; this page does not add a new price or a separate package.</p>
      <p>Use the scope discussion to confirm priorities, pages and profiles, selected engines and modes, approval responsibilities, reporting cadence and any access constraints. The format and extent of handovers are to be agreed, rather than assumed from the workstream names.</p>
<article class="card card--featured reveal" style="margin-top:22px">
          <span class="card-index">Scope</span>
          <h3>AEO expert in Karnataka, serving all of India</h3>
          <p><strong>Fawaz BH is an AEO expert based in Kushal Nagar, Kodagu, Karnataka, delivering Answer Engine Optimization for clients across Karnataka, South India and the rest of India.</strong> Karnataka work adds two things a national vendor usually skips: bilingual Kannada and English question mapping, and local entity consistency across Google Business Profile, citations and the site itself, which is what lets an engine answer near me and in Bengaluru questions with your name.</p>
          <p><strong>Karnataka:</strong> Kushal Nagar, Madikeri, Kodagu (Coorg), Bengaluru, Mysuru, Mangaluru, Hubli-Dharwad, Udupi, Belagavi, Shivamogga.<br>
             <strong>Remote:</strong> Hyderabad, Chennai, Kochi, Coimbatore, Mumbai, Delhi NCR, Pune, pan-India.</p>
          <div class="btn-row" style="margin-top:18px">
            <a class="link-arrow" href="/seo-consultant-karnataka">SEO consultant in Karnataka</a>
            <a class="link-arrow" href="/seo-consultant-india">SEO consultant in India</a>
          </div>
        </article>
    </div>
  </section>


  <section class="section section--alt" id="faq" aria-labelledby="faq-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">Questions</p>
        <h2 id="faq-h">AEO questions, answered first</h2>
        <p class="lede">These are the questions people actually type into assistants about AEO, answered in one to three sentences, before any elaboration, so a person gets the answer immediately and an engine can lift it cleanly.</p>
      </div>

      <div>
        <?php foreach ($faqs as $f): ?>
        <details class="faq reveal"<?php echo !empty($f['open']) ? ' open' : ''; ?>>
          <summary><?php echo $f['q']; ?></summary>
          <div class="faq__body">
            <?php foreach ($f['a'] as $para): ?>
            <p><?php echo $para; ?></p>
          <?php $research_context($para); ?>
            <?php endforeach; ?>
          </div>
        </details>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!-- 13. CONTACT -->
  <?php render_contact_form([
      'heading' => 'Find out what the engines say about you now',
      'lede'    => 'Book a free 30 minute AEO audit. I will run a baseline prompt set across every answer engine, show you where you are cited, merely mentioned or absent, and name the specific fix for each.',
      'id'      => 'contact',
  ]); ?>

  <?php fbh_render_review_date($reviewed_on); ?>



</main>

<?php
render_floating_button('Hi Fawaz, I would like a free AEO audit.');
render_footer();
