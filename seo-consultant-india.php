<?php
/**
 * SEO, AEO and GEO expert in India, national page.
 *
 * Copy carried over verbatim from the previous seo-consultant-india page.
 * Changes made: every em dash and en dash removed and rewritten into plain
 * punctuation, and the retired decorative modules (particle hero canvas,
 * aurora background, capability ticker, scroll rail, animated counters)
 * dropped. No claim, statistic, source or client status has been altered.
 */

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/contact-form.php';
require_once __DIR__ . '/includes/floating-button.php';
require_once __DIR__ . '/includes/footer.php';

/* ── Search surfaces covered for clients across India ─────────────────── */
$surfaces = [
    ['Surface 01', 'Google organic',           'Technical, on-page and entity work for national keyword sets.'],
    ['Surface 02', 'AI Overviews and AI Mode', 'Query fan-out coverage and passage-level extractability.'],
    ['Surface 03', 'ChatGPT',                  'Bing-index eligibility plus third-party corroboration.'],
    ['Surface 04', 'Perplexity',               'Freshness, answer structure and citation-ready facts.'],
    ['Surface 05', 'Claude and Copilot',       'Tracked separately, because source pools barely overlap.'],
];

/* ── Practice facts. Label, value, supporting note. ───────────────────── */
$facts = [
    ['Certifications', '4 named',      'Ahrefs Academy, Semrush AI Visibility, Semrush Technical SEO and AI Search, Adrex diploma'],
    ['Engines tracked', '5 separately', 'ChatGPT, Perplexity, Gemini, Claude and Copilot queried and reported one by one'],
    ['Delivering',     '1 person',     'Audit, strategy and implementation by Fawaz BH, with no agency layer'],
    ['Coverage',       '100% remote',  'National engagements run from Kodagu, Karnataka, across every Indian state'],
];

/* ── National delivery blocks ─────────────────────────────────────────── */
$reach = [
    [
        'tier' => 'Tier 01',
        'title' => 'Metro India',
        'featured' => true,
        'body' => 'Mumbai, Delhi NCR, Bengaluru, Hyderabad, Chennai, Pune and Kolkata are the hardest commercial SERPs in the country: funded agencies, aggregators and marketplace listings holding years of link equity. Realistic national strategy here is entity strength plus long-tail and comparison coverage first, because head terms in these markets are won over quarters, not weeks.',
        'note_label' => 'Worked remotely:',
        'note' => 'Mumbai, Delhi NCR, Bengaluru, Hyderabad, Chennai, Pune, Kolkata, Ahmedabad',
        'link' => null,
        'pages_label' => 'City pages',
        'pages' => [
            ['/seo-services-mumbai', 'SEO services in Mumbai'],
            ['/seo-services-delhi-ncr', 'SEO services in Delhi NCR'],
            ['/seo-services-bengaluru', 'SEO services in Bengaluru'],
            ['/seo-services-hyderabad', 'SEO services in Hyderabad'],
            ['/seo-services-chennai', 'SEO services in Chennai'],
            ['/seo-services-pune', 'SEO services in Pune'],
        ],
    ],
    [
        'tier' => 'Tier 02',
        'title' => 'Tier-2 and tier-3 India',
        'featured' => true,
        'body' => 'Indore, Coimbatore, Kochi, Jaipur, Lucknow, Nagpur, Surat, Bhubaneswar and hundreds of smaller markets still have first pages populated by thin directory listings and unoptimised pages. My practice is physically based in a tier-2 district, so this is the pattern I know best: disciplined technical foundations plus specific, non-generic content still produce disproportionate returns here.',
        'note_label' => 'Also worked:',
        'note' => 'Indore, Coimbatore, Kochi, Jaipur, Lucknow, Nagpur, Surat, Bhubaneswar, Visakhapatnam',
        'link' => null,
        'pages_label' => 'City pages',
        'pages' => [
            ['/seo-services-coimbatore', 'SEO services in Coimbatore'],
            ['/seo-services-kochi', 'SEO services in Kochi'],
            ['/seo-services-hubballi-dharwad', 'SEO services in Hubballi and Dharwad'],
        ],
    ],
    [
        'tier' => 'Operating model',
        'title' => 'How remote delivery actually works',
        'featured' => false,
        'body' => 'Access-based, not location-based. I need Search Console, Analytics, CMS or developer access, and Business Profile manager access where relevant. Everything else runs over scheduled calls and written artefacts: an audit document, a prioritised roadmap, an implementation log, and a reporting pack. Nothing in that list requires me to be in your building, which is why national engagements cost the same to run as local ones.',
        'note_label' => 'Languages:',
        'note' => 'English, Kannada, Malayalam, Hindi, Tamil, Telugu',
        'link' => ['/', 'Back to the main SEO, AEO and GEO consultant page'],
    ],
    [
        'tier' => 'Answer engines',
        'title' => 'AEO and GEO are borderless by nature',
        'featured' => false,
        'body' => 'Answer-engine and generative-engine work has no local pack to fight over. The same signals that earn a citation for an Indian brand earn one anywhere English is the query language: unambiguous entity identity, structured data, self-contained answer passages and third-party corroboration. This is the part of the practice with the least geographic constraint and the fastest-moving research.',
        'note_label' => 'Deep dives:',
        'note' => '<a href="/aeo-consultant">AEO consultant in India</a> and <a href="/geo-consultant">GEO consultant in India</a>',
        'link' => null,
    ],
];

/* ── National workstreams ─────────────────────────────────────────────── */
$services = [
    [
        'title' => 'National keyword, entity and topical-authority strategy',
        'featured' => true,
        'body' => 'For a business selling India-wide, the unit of work is not a keyword list, it is a topic map plus an entity. I build a pillar-and-cluster architecture around commercial, informational and comparison intent, define the internal linking that concentrates authority on the pages that convert, and make the brand or founder resolvable as a single consistent entity across your site, your profiles and third-party mentions. Comparison and alternatives coverage is scoped deliberately, because that is the content format AI assistants disproportionately retrieve.',
        'tags' => ['National keyword sets', 'Entity SEO', 'Topical authority', 'Internal linking'],
        'link' => null,
    ],
    [
        'title' => 'Technical SEO for large and multi-location Indian sites',
        'featured' => false,
        'body' => 'Crawl budget, indexation logic, canonical and pagination handling, JavaScript rendering, Core Web Vitals (LCP, INP, CLS), log-file review and Schema.org deployment. Also AI crawler access checks, because a page that is technically fine for Googlebot can still be invisible to the crawlers that feed answer engines.',
        'tags' => ['Crawl and index', 'Core Web Vitals', 'Schema.org', 'Log files'],
        'link' => null,
    ],
    [
        'title' => 'AEO, answer engine optimisation',
        'featured' => false,
        'body' => 'Featured snippets, People Also Ask, voice results and AI Overviews. Delivered as question-shaped headings with self-contained answers, FAQPage, HowTo and Speakable markup, credential and author signals, and fact density in place of adjectives.',
        'tags' => ['Snippets and PAA', 'FAQ and Speakable', 'E-E-A-T signals'],
        'link' => ['/aeo-consultant', 'AEO consultant in India'],
    ],
    [
        'title' => 'GEO, generative engine optimisation across five engines',
        'featured' => true,
        'body' => 'The goal is being cited inside a generated answer, not just ranked beside one. Work covers LLM-friendly content chunking, semantic clustering, entity resolution across domains, freshness cadence, and earned third-party mentions, then measurement against a fixed set of 20 to 40 buyer-phrased prompts, re-run on schedule and reported per engine. ChatGPT, Perplexity, Gemini, Claude and Copilot are reported separately because their source pools barely overlap, and a single averaged AI visibility score hides the one thing you need to know.',
        'tags' => ['Prompt sets', 'Citation tracking', 'Fact density', 'Corroboration'],
        'link' => ['/geo-consultant', 'GEO consultant in India'],
    ],
];

/* ── How to judge best ────────────────────────────────────────────────── */
$criteria = [
    ['Certifications you can check yourself', 'Ask for issuers and dates, not badges. Mine are an Ahrefs Academy certification, Semrush AI Visibility Essentials, Semrush Technical SEO and AI Search Essentials, and an Advanced Diploma in Digital Marketing from Adrex Media School, all named, all verifiable with the issuing body.'],
    ['Whether the person pitching is the person working', 'The most common failure mode in Indian SEO buying is meeting a senior consultant and being handed to a junior executive after the invoice clears. Ask directly who does the implementation. Here it is one person on every task, which is also why my client list is deliberately short.'],
    ['Whether AEO and GEO are real capability or a rebranded add-on', 'Ask how they measure AI visibility. If the answer is a single score with no per-engine breakdown and no fixed prompt set, it is a dashboard, not a method. I run 20 to 40 buyer-phrased prompts across five engines and separate three outcomes: cited, mentioned without citation, and absent, because each requires a different fix.'],
    ['Whether they can describe your SERP, not SEO in general', 'A good diagnostic question: who currently ranks for my three main terms, and why? Anyone who can answer that specifically has looked. Anyone who answers with a generic funnel diagram has not.'],
    ['Reporting you can read without a glossary', 'Rankings, organic traffic, conversions, and per-engine citation results, plus what is not working. No impressions-only screenshots, no domain authority increased as a headline metric.'],
    ['Whether they refuse the work when it is wrong for them', 'If you need twelve markets covered simultaneously next quarter, or several specialisms staffed in parallel, an agency is the correct answer and I will say so. An independent consultant who never turns anything down is telling you something about how the work gets done.'],
];

/* ── This practice, measured against those criteria ───────────────────── */
$stats = [
    ['4',  'Named, verifiable qualifications',        'Ahrefs Academy, Semrush AI Visibility Essentials, Semrush Technical SEO and AI Search Essentials, Advanced Diploma in Digital Marketing from Adrex Media School'],
    ['5',  'Generative engines measured separately',  'ChatGPT, Perplexity, Gemini, Claude and Copilot, never averaged into one number'],
    ['40', 'Prompts in a standard benchmark set',     '20 to 40 buyer-phrased prompts written before work starts, then re-run on a fixed schedule so a real gain is distinguishable from ordinary volatility'],
    ['3',  'Disciplines, one scope document',         'SEO, AEO and GEO planned and reported together rather than sold as three retainers'],
    ['1',  'Person accountable',                      'Me. If you email me, I answer. That is the entire delivery model'],
];

/* ── What changed in Indian search through 2026 ───────────────────────── */
$shifts = [
    [
        'k' => 'Shift 01',
        'title' => 'Core updates now arrive roughly every six weeks',
        'body' => [
            'The March 2026 core update ran 27 March to 8 April; the next began 21 May, a 43-day gap, the tightest between two distinct broad core updates in the recorded series, against a 2019 to 2023 norm of one every three to four months.',
            'Practically, the window for post-update triage has closed. Work has to be built so each update reinforces your position instead of resetting it, which means E-E-A-T signals and first-party depth as ongoing operations rather than emergency projects.',
        ],
    ],
    [
        'k' => 'Shift 02',
        'title' => 'March 2026 was the most volatile core update measured',
        'body' => [
            'SE Ranking recorded 79.5% of top-three URLs changing position, up from 66.8% in December 2025, and 24.1% of top-ten pages falling out of the top 100 entirely. It also ran concurrently with a spam update, which made attribution harder for anyone hit by both.',
            'If your rankings moved in that window and nobody could tell you which system caused it, that is the reason.',
        ],
    ],
    [
        'k' => 'Shift 03',
        'title' => 'Intermediaries lost, first-party sources gained',
        'body' => [
            'Independent analyses converged on the same pattern: Aleyda Solis described a shift from aggregators toward destination brands and institutional sources; Lily Ray&#8217;s Amsive analysis called it a first-party correction; Sistrix framed it as &#8220;authority over interchangeability.&#8221;',
            'For an Indian service business, that is genuinely good news, because it favours being the actual source over out-ranking a directory. It also means thin, interchangeable service pages are now a liability rather than filler.',
        ],
    ],
    [
        'k' => 'Shift 04',
        'title' => 'Ranking top ten no longer wins the AI citation',
        'body' => [
            'Ahrefs&#8217; January 2026 analysis of 863,000 SERPs and roughly 4 million AI Overview URLs found only about 38% of AI-Overview-cited pages also ranked in the top ten for the same query, down from around 76% a year earlier. Google&#8217;s documentation confirms a &#8220;query fan-out&#8221; step that splits a search into sub-queries and draws sources from those results.',
            'So a page has to be relevant to the questions around your query, not only to the query itself. That is the practical definition of GEO work.',
        ],
    ],
    [
        'k' => 'Shift 05',
        'title' => 'Assistants overwhelmingly cite lists and third-party pages',
        'body' => [
            'Evertune&#8217;s review of roughly 25,000 of the most-cited URLs across six models found about half were listicles, and 63% of nearly 400 million citations pointed to listicle-format pages, ranging from 40% to 65% depending on the model, with Copilot lowest and Gemini highest.',
            'For a consultant or brand, this means your own site is only half the job: appearing credibly in independent roundups and comparisons matters as much as your own pages. Self-serving lists that rank you first are a separate risk, and Google has signalled intent to act on promotional listicles.',
        ],
    ],
    [
        'k' => 'Shift 06',
        'title' => 'Each engine rewards something different',
        'body' => [
            'Published research points to distinct profiles: ChatGPT&#8217;s retrieval leans on the Bing index and editorially authoritative sources, with Wikipedia alone at roughly 7.8% of its citations; Perplexity has the strongest recency bias of the major engines; Gemini-powered surfaces show the highest overlap with Google&#8217;s own results; and Copilot shares only about 4% to 6% of its most-cited URLs with any other model.',
            'Same symptom, different jobs. Invisible in ChatGPT is usually a Bing-indexing or third-party-mention problem; invisible in Perplexity is usually freshness or answer structure; invisible in Gemini and AI Overviews is usually entity or schema clarity.',
        ],
    ],
];

/* ── Credentials ──────────────────────────────────────────────────────── */
$creds = [
    ['Issued by Ahrefs', 'Ahrefs Academy Certification', 'Keyword research, backlink analysis, competitive research and technical site auditing. Every national audit is scoped against this framework.', true],
    ['Issued by Semrush', 'Semrush AI Visibility Essentials', 'Prompt-level tracking, share of voice inside generated answers, and the difference between being retrieved and being cited. This is the certification underpinning the GEO half of the work.', true],
    ['Issued by Semrush', 'Semrush Technical SEO and AI Search Essentials', 'Crawlability, indexation, site health and structured data, plus how those foundations feed modern AI search surfaces, which is the half of the job that decides whether anything else can be discovered.', false],
    ['Issued by Adrex Media School', 'Advanced Diploma in Digital Marketing', 'Broad grounding across digital channels, which is what lets me tell a client when the honest answer is that their problem is not an SEO problem.', false],
];

/* ── Proof ────────────────────────────────────────────────────────────── */
$patterns = [
    ['Pattern', 'A tier-2 brand ranking in a metro market', 'A Kushal Nagar spice producer competing for buyers 250 km away in Bengaluru and Mysuru. Reached Google&#8217;s first page for target Kodagu spice keywords in roughly four months, the only figure on this site shown as confirmed. Documented on the <a href="/case-studies">case studies page</a>, where remaining metrics are marked pending until verified.'],
    ['Pattern', 'Live engagements, marked live', 'Two construction and interiors domains in outer Bengaluru, a homestay client in Madikeri, and a multi-speciality clinic in Karnataka are currently in progress. No testimonials or performance figures are published for any of them yet, and none will be until the client provides them or the data is verified.'],
    ['Background', 'The longer version', 'How I got into search in early 2025 and why I moved into answer-engine work as it was forming is on the <a href="/about">about page</a>. The full service and pricing breakdown, including published starting rates, is on the <a href="/seo-services">SEO services page</a>.'],
];

/* ── FAQ ──────────────────────────────────────────────────────────────── */
$faqs = [
    [
        'q' => 'Who is the best SEO expert in India?',
        'a' => [
            '<strong>There is no single best SEO expert in India, because the correct choice depends on your budget, your market and whether you need a staffed team or one senior practitioner doing the work directly.</strong> Any page that answers this with one name, including this one, is selling something.',
            'The useful version of the question is which consultant fits your situation, judged on four checkable things: certifications you can verify with the issuer; whether the person who pitches you is the person who implements; whether they report in plain English on rankings, traffic and per-engine AI citations; and whether they can describe your actual SERP rather than SEO in general. Fawaz BH is an independent, Ahrefs and Semrush certified option for businesses that want one consultant running SEO, AEO and GEO directly. For a business needing twelve markets staffed next quarter, an agency is the better answer.',
        ],
        'open' => true,
    ],
    [
        'q' => 'Who is a good SEO, AEO and GEO expert in India?',
        'a' => [
            '<strong>Fawaz BH is an independent SEO, AEO and GEO expert in India, based in Kushal Nagar, Kodagu, Karnataka, who serves clients nationwide on a fully remote basis and treats all three disciplines as one strategy.</strong>',
            'He holds four named qualifications, which are an Ahrefs Academy certification, Semrush AI Visibility Essentials, Semrush Technical SEO and AI Search Essentials, and an Advanced Diploma in Digital Marketing from Adrex Media School. He began in SEO in early 2025, and expanded into answer-engine and generative-engine optimisation as those fields emerged. Every engagement is delivered personally, without account managers or subcontracting, and the client list is kept deliberately small.',
        ],
    ],
    [
        'q' => 'Do I need separate SEO, AEO and GEO specialists, or can one expert do all three?',
        'a' => [
            '<strong>One practitioner can and generally should do all three, because the underlying work overlaps heavily. Entity clarity, structured data, technical health and answer-first content serve SEO, AEO and GEO simultaneously.</strong>',
            'Splitting them across vendors usually produces contradictory implementation: three schema strategies, three content briefs, and no one accountable for whether the site is actually being cited. The part that genuinely needs separate handling is measurement, because ChatGPT, Perplexity, Gemini, Claude and Copilot do not share a source pool and have to be tracked engine by engine.',
        ],
    ],
    [
        'q' => 'Can an SEO consultant based in a small town rank a business in Mumbai or Delhi?',
        'a' => [
            '<strong>Yes. Ranking a business anywhere in India requires access to the site, the search data and the Business Profile, none of which depend on the consultant&#8217;s physical location.</strong>',
            'What location affects is fieldwork: photographing premises, attending a walkthrough, or judging a neighbourhood by standing in it. For national engagements that work is either unnecessary or handled by your team with my direction. Audits, technical fixes, structured data, content and reporting are remote as standard, and I work from Kodagu, Karnataka, with clients across India.',
        ],
    ],
    [
        'q' => 'How much does an SEO, AEO and GEO expert in India charge?',
        'a' => [
            '<strong>Rates vary widely across India by scope and market competitiveness. My published starting rates begin at &#8377;14,999 per month for a local SEO scope and &#8377;29,999 per month for full-stack SEO plus AEO, with combined SEO, AEO and GEO engagements quoted after the audit.</strong>',
            'Final pricing is confirmed against a defined scope agreed in writing after the free discovery audit, so the figure depends on what the audit finds. The audit itself is free and you keep the document either way. Where advertising is involved, ad spend is paid directly to the platform and is never bundled into a management fee. The full rate card is on the <a href="/seo-services">SEO services page</a>.',
        ],
    ],
    [
        'q' => 'Should an Indian business hire an SEO agency or an independent consultant?',
        'a' => [
            '<strong>Hire an agency if you need high content volume, several specialisms staffed in parallel, or guaranteed cover when one person is unavailable. Hire an independent consultant if you want the person who audited your site to also fix it, with direct access and no account-management layer.</strong>',
            'The real trade-off is capacity versus continuity, not quality. An agency can do more at once; one consultant can hold your whole situation in their head. I work independently with a short client list, and if I am at capacity I will say so rather than take the work and subcontract it.',
        ],
    ],
    [
        'q' => 'How long does SEO take to show results in India in 2026?',
        'a' => [
            '<strong>For competitive national keyword sets in India, meaningful movement typically takes six months or more; tier-2 city and lower-competition categories often move within two to four months.</strong> Anyone quoting a fixed timeline before seeing your site, category and competitors is guessing.',
            'Two 2026 conditions matter here. Google&#8217;s core updates now arrive roughly every six weeks, with March&#8217;s completing on 8 April and the next launching 21 May, so results have to be read as trends rather than post-update snapshots. And answer-engine visibility can surface faster than classic rankings on recency-weighted engines like Perplexity, though it still rests on technical and authority foundations.',
        ],
    ],
    [
        'q' => 'How do I get my business cited by ChatGPT, Perplexity and Google AI Overviews?',
        'a' => [
            '<strong>Be the most structurally quotable and best-corroborated source for a specific question: self-contained answer passages under question-shaped headings, clean Schema.org markup, unambiguous entity signals, specific sourced facts instead of adjectives, and genuine third-party mentions.</strong>',
            'Then treat the engines separately, because they select differently. ChatGPT&#8217;s retrieval leans on the Bing index and editorially authoritative sources; Perplexity weights recency and answer structure heavily; Gemini-powered surfaces including AI Overviews lean on entity verification and overlap most with Google&#8217;s own results; Copilot shares only around 4% to 6% of its most-cited URLs with any other model. Nobody controls what a language model quotes, so any guarantee of AI citations is a red flag. Detail on the <a href="/aeo-consultant">AEO consultant</a> and <a href="/geo-consultant">GEO consultant</a> pages.',
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

$schema = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'WebPage',
            '@id'   => 'https://fawazbhseo.in/seo-consultant-india#page',
            'url'   => 'https://fawazbhseo.in/seo-consultant-india',
            'name'  => 'SEO, AEO and GEO expert in India, Fawaz BH',
            'about' => ['@id' => 'https://fawazbhseo.in/#fawaz'],
            'inLanguage'   => 'en-IN',
            'dateModified' => '2026-07-30',
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id'   => 'https://fawazbhseo.in/seo-consultant-india#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Fawaz BH', 'item' => 'https://fawazbhseo.in/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'SEO consultant in India', 'item' => 'https://fawazbhseo.in/seo-consultant-india'],
            ],
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
            'knowsLanguage' => ['en', 'kn', 'ml', 'hi', 'ta', 'te'],
            'hasCredential' => [
                ['@type' => 'EducationalOccupationalCredential', 'name' => 'Ahrefs Academy Certification', 'credentialCategory' => 'certificate'],
                ['@type' => 'EducationalOccupationalCredential', 'name' => 'Semrush AI Visibility Essentials', 'credentialCategory' => 'certificate'],
                ['@type' => 'EducationalOccupationalCredential', 'name' => 'Semrush Technical SEO and AI Search Essentials', 'credentialCategory' => 'certificate'],
                ['@type' => 'EducationalOccupationalCredential', 'name' => 'Advanced Diploma in Digital Marketing, Adrex Media School', 'credentialCategory' => 'diploma'],
            ],
        ],
        [
            '@type'      => 'ProfessionalService',
            '@id'        => 'https://fawazbhseo.in/seo-consultant-india#practice',
            'name'       => 'FawazBHSEO, SEO consultant in India',
            'founder'    => ['@id' => 'https://fawazbhseo.in/#fawaz'],
            'url'        => 'https://fawazbhseo.in/seo-consultant-india',
            'telephone'  => '+91-94810-84038',
            'email'      => ['fawazbhseo@gmail.com', 'admin@fawazbhseo.in'],
            'priceRange' => 'From INR 14999 per month',
            'address'    => [
                '@type' => 'PostalAddress',
                'streetAddress'   => 'Kushal Nagar',
                'addressLocality' => 'Kodagu',
                'addressRegion'   => 'Karnataka',
                'postalCode'      => '571234',
                'addressCountry'  => 'IN',
            ],
            'geo'        => ['@type' => 'GeoCoordinates', 'latitude' => 12.4574, 'longitude' => 75.9608],
            'areaServed' => [
                ['@type' => 'Country', 'name' => 'India'],
                'Mumbai', 'Delhi NCR', 'Bengaluru', 'Hyderabad', 'Chennai',
                'Pune', 'Kolkata', 'Ahmedabad', 'Indore', 'Coimbatore',
                'Kochi', 'Jaipur', 'Lucknow', 'Nagpur', 'Surat',
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name'  => 'National SEO, AEO and GEO engagements',
                'itemListElement' => [
                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'National keyword, entity and topical-authority strategy']],
                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Technical SEO for large and multi-location Indian sites']],
                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Answer engine optimisation, AEO']],
                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Generative engine optimisation, GEO']],
                ],
            ],
        ],
        [
            '@type' => 'FAQPage',
            '@id'   => 'https://fawazbhseo.in/seo-consultant-india#faq',
            'mainEntity' => $faq_ld,
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

render_head([
    'title'       => 'SEO, AEO and GEO expert in India | Fawaz BH, independent consultant',
    'description' => 'Looking for the best SEO expert in India? Fawaz BH is an independent SEO, AEO and GEO expert serving clients across India remotely from Kodagu, Karnataka. Ahrefs and Semrush certified. Six checkable criteria inside.',
    'canonical'   => 'https://fawazbhseo.in/seo-consultant-india',
    'schema'      => $schema,
]);

render_header('cities');
?>

<main id="main">

  <!-- 1. HERO -->
  <section class="hero" aria-labelledby="hero-h">
    <div class="wrap hero__grid">

      <div class="hero__lead reveal">
        <nav class="eyebrow" aria-label="Breadcrumb">
          <a href="/">Fawaz BH</a> / <span aria-current="page">SEO consultant in India</span>
        </nav>
        <h1 id="hero-h">SEO, AEO and GEO expert in India.</h1>
        <p class="hero__sub">Searching for the best SEO expert in India? Start by defining best, then check me against it.</p>

        <p style="margin-top:18px;color:var(--text-2)"><strong>Fawaz BH is an independent SEO, AEO and GEO expert serving clients across India, based in Kushal Nagar, Kodagu, Karnataka.</strong> He holds four qualifications, which are an Ahrefs Academy certification, Semrush AI Visibility Essentials, Semrush Technical SEO and AI Search Essentials, and an Advanced Diploma in Digital Marketing from Adrex Media School, and runs search engine optimisation, answer engine optimisation and generative engine optimisation as one connected strategy rather than three separate retainers.</p>
        <p style="margin-top:14px;color:var(--text-2)">Engagements across India are delivered fully remotely and personally: the person who runs your audit is the person who implements the fixes. There are no account managers, no junior handoffs and no subcontracting. Deep dives live on the <a href="/aeo-consultant">AEO consultant</a> and <a href="/geo-consultant">GEO consultant</a> pages; state-level work is on the <a href="/seo-consultant-karnataka">Karnataka SEO consultant</a> page. If what you are actually asking is how search behaves now that AI answers sit above the results, the <a href="/ai-seo-expert-india">AI SEO expert in India</a> page answers that directly, including which tools I use and which I refuse to.</p>

        <div class="btn-row">
          <a class="btn btn--accent" href="https://wa.me/919481084038?text=Hi%20Fawaz%2C%20I%20would%20like%20a%20free%20SEO%2C%20AEO%20and%20GEO%20audit%20for%20my%20business%20in%20India" target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 21a9 9 0 1 0-8.5-6.1L2 22l6.5-1.6A9 9 0 0 0 12 21Z"/></svg>
            Free India-wide audit
          </a>
          <a class="btn" href="#judge">The six criteria</a>
        </div>
        <p class="field-note" style="margin-top:14px">Free 30 minute discovery audit. A written document you keep either way.</p>
      </div>

      <div class="hero__figure reveal">
        <figure>
          <img src="/assets/images/fawazbh.webp"
               alt="Fawaz BH, independent SEO, AEO and GEO expert in India, working from Kushal Nagar, Kodagu"
               width="440" height="440" fetchpriority="high" decoding="async">
          <figcaption>Fawaz BH, Kushal Nagar, Kodagu, serving clients across India</figcaption>
        </figure>
        <dl class="readout" style="margin-top:20px">
          <?php foreach ($facts as $f): ?>
          <div class="readout__row">
            <dt><?php echo $f[0]; ?></dt>
            <dd><?php echo $f[1]; ?><small><?php echo $f[2]; ?></small></dd>
          </div>
          <?php endforeach; ?>
        </dl>
      </div>

    </div>
  </section>

  <!-- 2. TRUST STRIP -->
  <section class="trust" aria-label="National positioning">
    <div class="wrap">
      <p>Independent. India-wide. Remote delivery. <span class="accent">One person accountable, five engines tracked.</span></p>
    </div>
  </section>

  <!-- 3. SEARCH SURFACES -->
  <section class="section" id="surfaces" aria-labelledby="surf-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Coverage</p>
        <h2 id="surf-h">The five surfaces covered for clients across India</h2>
        <p class="lede">Google is now one surface among several. Each of these is worked and reported on separately, because what earns a ranking is not always what earns a citation.</p>
      </div>

      <div class="grid grid--3">
        <?php foreach ($surfaces as $s): ?>
        <article class="card reveal">
          <span class="card-index"><?php echo $s[0]; ?></span>
          <h3><?php echo $s[1]; ?></h3>
          <p><?php echo $s[2]; ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 4. NATIONAL DELIVERY -->
  <section class="section section--alt" id="national" aria-labelledby="nat-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">National scale</p>
        <h2 id="nat-h">An SEO, AEO and GEO expert working across India, remotely</h2>
        <p class="lede">This page is about national engagements: one consultant, a defined scope, and delivery that does not depend on being in your city. Where local fieldwork genuinely matters, such as premises photography, walkthroughs and Google Business Profile verification, that is covered on the <a href="/seo-consultant-karnataka">Karnataka page</a>. Everything below travels.</p>
      </div>

      <div>
        <?php foreach ($reach as $i => $r): ?>
        <article class="card<?php echo $r['featured'] ? ' card--featured' : ''; ?> reveal"<?php echo $i ? ' style="margin-top:22px"' : ''; ?>>
          <span class="card-index"><?php echo $r['tier']; ?></span>
          <h3><?php echo $r['title']; ?></h3>
          <p><?php echo $r['body']; ?></p>
          <p class="field-note" style="margin-top:16px"><strong><?php echo $r['note_label']; ?></strong> <?php echo $r['note']; ?></p>
          <?php if (!empty($r['pages'])): ?>
          <p class="footer-h" style="margin:20px 0 9px"><?php echo htmlspecialchars($r['pages_label'] ?? 'City pages', ENT_QUOTES, 'UTF-8'); ?></p>
          <ul class="linklist" style="margin:0">
            <?php foreach ($r['pages'] as $page): ?>
            <li><a href="<?php echo htmlspecialchars($page[0], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($page[1], ENT_QUOTES, 'UTF-8'); ?></a></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
          <?php if (!empty($r['link'])): ?>
          <p style="margin-top:16px"><a class="link-arrow" href="<?php echo $r['link'][0]; ?>"><?php echo $r['link'][1]; ?></a></p>
          <?php endif; ?>
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
        <h2 id="svc-h">What a national SEO, AEO and GEO engagement actually contains</h2>
        <p class="lede">Four workstreams, scoped for businesses selling across India rather than in one postcode. Priced against a defined scope after the free audit.</p>
      </div>

      <div class="grid grid--2">
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
          <?php if (!empty($s['link'])): ?>
          <p><a class="link-arrow" href="<?php echo $s['link'][0]; ?>"><?php echo $s['link'][1]; ?></a></p>
          <?php endif; ?>
        </article>
        <?php $n++; endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 6. HOW TO JUDGE BEST -->
  <section class="section section--alt" id="judge" aria-labelledby="judge-h">
    <div class="wrap split">

      <div class="reveal">
        <p class="eyebrow">The honest version</p>
        <h2 id="judge-h" style="margin-block:16px 26px">How to judge the best SEO expert in India</h2>
        <p class="lede" style="margin-bottom:22px">There is no single best SEO expert in India, because the ranking depends entirely on your budget, market and whether you need a team or one senior practitioner. What does exist is a short list of things you can verify before signing anything. Here are six, and where I sit on each.</p>
        <ol class="why-list" aria-label="Criteria for choosing an SEO, AEO and GEO expert in India">
          <?php $n = 1; foreach ($criteria as $c): ?>
          <li>
            <span class="idx"><?php echo str_pad((string) $n, 2, '0', STR_PAD_LEFT); ?></span>
            <div>
              <h3><?php echo $c[0]; ?></h3>
              <p><?php echo $c[1]; ?></p>
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
        <p class="field-note" style="margin-top:18px">Client performance figures appear on the <a href="/case-studies">case studies page</a> only once verified against Google Search Console, GA4 or Business Profile data. No estimated or illustrative numbers are published anywhere on this site.</p>
      </div>

    </div>
  </section>

  <!-- 7. WHAT CHANGED IN 2026 -->
  <section class="section" id="whats-changed" aria-labelledby="chg-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Current conditions</p>
        <h2 id="chg-h">What actually changed in Indian search through 2026</h2>
        <p class="lede">Six shifts that change how a national SEO engagement should be scoped this year, with the source for each so you can check them rather than take my word.</p>
      </div>

      <div class="grid grid--2">
        <?php foreach ($shifts as $s): ?>
        <article class="card reveal">
          <span class="card-index"><?php echo $s['k']; ?></span>
          <h3><?php echo $s['title']; ?></h3>
          <?php foreach ($s['body'] as $para): ?>
          <p><?php echo $para; ?></p>
          <?php endforeach; ?>
        </article>
        <?php endforeach; ?>
      </div>

      <article class="card card--featured reveal" style="margin-top:26px">
        <span class="badge badge--accent">Honest correction</span>
        <h3>llms.txt is not a ranking factor</h3>
        <p>One honest correction while we are here: <strong>llms.txt does nothing for Google rankings or AI Overview visibility.</strong> Google has stated its Search systems do not use the file, and no major AI provider has confirmed acting on it. I publish one at fawazbhseo.in/llms.txt because it is a tidy machine-readable summary, not because it is a ranking factor. Anyone selling it as one is guessing.</p>
      </article>
    </div>
  </section>

  <!-- 8. PROCESS -->
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
          <p>A written technical, on-page, entity and answer-engine review of your site, benchmarked against the competitors actually beating you nationally. Yours to keep whether or not you hire me.</p>
        </article>
        <article class="step reveal">
          <p class="step__k">02 &nbsp; MAP</p>
          <h3>Topic and prompt mapping</h3>
          <p>Keyword research split by intent across your national market, plus the 20 to 40 buyer-phrased AI prompts that become your citation benchmark. Scope and price agreed in writing before anything else starts.</p>
        </article>
        <article class="step reveal">
          <p class="step__k">03 &nbsp; BUILD</p>
          <h3>Fix, structure, publish</h3>
          <p>Technical remediation first, then structured data and entity signals, then content and earned mentions, sequenced so compounding work ships before cosmetic work. Implemented by me directly.</p>
        </article>
        <article class="step reveal">
          <p class="step__k">04 &nbsp; MEASURE</p>
          <h3>Report and iterate</h3>
          <p>Rankings, organic traffic, conversions, Search Console&#8217;s AI-surface data, and the prompt set re-run per engine on a fixed schedule, so a real gain is distinguishable from ordinary volatility.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- 9. CREDENTIALS -->
  <section class="section" id="credentials" aria-labelledby="cred-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Credentials</p>
        <h2 id="cred-h">Certified, and checkable</h2>
        <p class="lede">Google&#8217;s quality guidance leans on experience, expertise, authoritativeness and trust. This is the verifiable half of that, named by issuer.</p>
      </div>

      <div class="grid grid--2">
        <?php foreach ($creds as $c): ?>
        <article class="card<?php echo $c[3] ? ' card--featured' : ''; ?> reveal">
          <span class="badge<?php echo $c[3] ? ' badge--accent' : ''; ?>"><?php echo $c[0]; ?></span>
          <h3><?php echo $c[1]; ?></h3>
          <p><?php echo $c[2]; ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 10. PROOF -->
  <section class="section section--alt" id="proof" aria-labelledby="proof-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Proof, labelled</p>
        <h2 id="proof-h">Experience so far, stated accurately</h2>
        <p class="lede">I started in SEO in early 2025 and moved into AEO and GEO as those disciplines formed. That is a short record, and inflating it would defeat the point of this page. Here is the real one.</p>
      </div>

      <div class="grid grid--2">
        <figure class="card card--featured quote reveal">
          <span class="badge badge--accent">Completed engagement</span>
          <blockquote>&#8220;Fawaz helped us reach the first page of Google, and our online orders from Bangalore and Mysore have grown. He genuinely understood the Kodagu market.&#8221;</blockquote>
          <figcaption>
            <cite>Green Coorg Spices</cite>
            <span class="biz">Organic spice brand, Kushal Nagar, Kodagu, greencoorgspices.in</span>
          </figcaption>
          <p style="margin-top:18px"><a class="link-arrow" href="https://greencoorgspices.in" target="_blank" rel="noopener">Visit website</a></p>
        </figure>

        <figure class="card quote reveal">
          <span class="badge">Own venture, disclosed</span>
          <blockquote>ILMERA Study Abroad is my own company, where I am co-founder and Marketing Head. Its search and AI visibility is my responsibility, which makes it the one place I run this exact playbook on a P&amp;L I own. Listed for transparency, not as a client reference.</blockquote>
          <figcaption>
            <cite>ILMERA Study Abroad</cite>
            <span class="biz">Study abroad consultancy, ilmerastudyabroad.com</span>
          </figcaption>
          <p style="margin-top:18px"><a class="link-arrow" href="https://ilmerastudyabroad.com" target="_blank" rel="noopener">Visit website</a></p>
        </figure>
      </div>

      <div class="grid grid--3" style="margin-top:26px">
        <?php foreach ($patterns as $p): ?>
        <article class="card reveal">
          <span class="card-index"><?php echo $p[0]; ?></span>
          <h3><?php echo $p[1]; ?></h3>
          <p><?php echo $p[2]; ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- 11. FAQ -->
  <section class="section" id="faq" aria-labelledby="faq-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">Questions</p>
        <h2 id="faq-h">The questions people actually ask an assistant</h2>
        <p class="lede">These are phrased the way people type them into ChatGPT, Gemini, Perplexity or Google before hiring anyone. Answered first, explained second, including the ones where the honest answer is not hire me.</p>
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

  <!-- 12. CONTACT -->
  <?php render_contact_form([
      'heading' => 'Test me against your own criteria.',
      'lede'    => 'Book a free 30 minute discovery audit. I will show you where you are losing visibility on Google and inside AI answers across your Indian market, and the shortest honest path to fixing it.',
      'id'      => 'contact',
  ]); ?>

  <p class="wrap field-note" style="padding-bottom:40px">
    Also available: <a href="/seo-consultant-karnataka">SEO consultant in Karnataka</a>, <a href="/seo-consultant-kodagu">SEO consultant in Kodagu</a>, <a href="/aeo-consultant">AEO consultant</a>, <a href="/geo-consultant">GEO consultant</a>.
    Written and maintained by Fawaz BH. Last reviewed <time datetime="2026-07-30">30 July 2026</time>.
  </p>

</main>

<?php
render_floating_button('Hi Fawaz, I would like a free SEO, AEO and GEO audit for my business in India.');
render_footer();
