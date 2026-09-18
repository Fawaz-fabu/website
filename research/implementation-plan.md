# Implementation plan and technical findings

Date: 2026-09-10. Update 2026-09-11: implementation remains partial. Three supporting guides under `/blogs/<slug>`, the populated `/blog` archive, contextual links, discovery updates and selected copy/readability corrections are saved. See `optimization-release-2026-09-11.md`. Findings below describe the initial baseline unless updated; the blog is no longer empty in the working copy. Additional service pages, complete evidence review, live PHP validation and external outreach remain outstanding.

## 1. Confirmed crawl correction

The live robots snapshot in `sources/live-robots.txt` blocks language roots and subpaths. The shared page head emits noindex for non-indexable locales. Blocking crawling prevents a crawler from seeing that noindex directive. Google's official guidance confirms this; see T01 in `sources/manifest.md`.

Correction in the repo: remove language-path blocks from `robots.txt`, retain internal-directory exclusions, and use one wildcard group for consistent crawler behaviour. The English-only sitemap and existing page-level noindex are unchanged. The language switcher's existing nofollow links are hints, not a guarantee against crawling.

The previous claim that about 3,000 possible translated URLs exhausted the site's crawl allowance was not supported by logs or Search Console data. JavaScript-rendered content is not inherently impossible for Google to index, and machine translation is not automatically spam. Incomplete mixed-language pages should still not be promoted as fully reviewed translations.

Deploy the corrected robots file to the existing PHP-capable host, re-fetch it, then use URL Inspection to confirm Google can access representative locale pages and read their noindex. Do not request indexing of incomplete translations just to make exclusion reports disappear. No live deployment has been performed in this research pass.

## 2. Content and entity findings awaiting implementation

These are source findings, not changes already made:

- `seo-services.php` broadly lists FAQ/HowTo/Speakable deployment and Wikidata or Knowledge Graph inclusion. Other pages warn against treating special markup as an AI-citation requirement. Reconcile the scope and explain eligibility; do not promise third-party inclusion.
- The services page uses the older SGE name and claims chunking/scoring methods. Other pages say artificial chunking is unnecessary. Describe accessible useful content and measurable work consistently.
- AEO and GEO definitions overlap inconsistently across the hub and specialist pages. Give beginners clear definitions while acknowledging that the terminology overlaps across the industry.
- Numerical study scores, report names and assertions about engine internals on specialist pages need source-by-source verification. This pass did not verify those studies; do not reuse their figures as established research.
- Performance marketing and social media have published rate cards but no dedicated full service pages. The broader digital marketing offer is mixed into the Kodagu page. This is a targeting opportunity, not proof of a Google penalty.
- The blog has no published posts. Do not present it as a populated learning centre or publish thin pages just to increase URL count.
- Contact schema lists two languages while project documentation describes six working languages. Reconcile against actual consulting capability. Website translation is not evidence of fluency.
- The locale publication gate measures interface strings, not complete page-body translation. Reviewing a navigation file does not make every body paragraph reviewed or ready to index.
- The live sitemap snapshot contains 29 English content URLs. All lastmod values are the same date, and the generator uses filesystem modification times. Review whether uploads reset those dates before claiming substantive freshness.

## 3. Proposed service pages

These URLs are proposals, not created pages. Preserve current indexed URLs and rate-card anchors. Avoid generating a service-by-city matrix of near-duplicate pages.

### Performance marketing

Proposed URL: `/performance-marketing`
Candidate title: Performance Marketing Consultant in India | Fawaz BH
Candidate H1: Google Ads and Meta Ads, with a clear plan and budget.

Opening draft:

> I help businesses plan and manage paid campaigns on Google and Meta. We start with the customers you want to reach, the offer and the budget. Your proposal explains the work and management fee separately from the money paid to the advertising platform.

Content to prepare:
1. Who the work fits and when a business is not ready to spend.
2. Google versus Meta selection based on buyer intent, rather than a universal winner.
3. Agreed setup, targeting, testing and reporting scope from the current rate card.
4. Management fees, media spend and production costs clearly separated.
5. Account access and consent-aware measurement requirements.
6. A labelled illustrative decision example, not fabricated client results.
7. Approved paid-marketing evidence if available, plus useful FAQs and direct contact.

Owner checks: current fees, account ownership/access terms, production scope, measurement scope and case-study permission. Never guarantee CPA, ROAS, leads or sales.

### Social media marketing

Proposed URL: `/social-media-marketing`
Candidate title: Social Media Marketing Consultant | Fawaz BH
Candidate H1: Help people understand and remember your business.

Opening draft:

> I help businesses plan and manage content for their social channels. The right package depends on the platforms, the kind of content you need and how much support you want. We agree on what is included before the work starts.

Content to prepare:
1. Buyer fit: local presence, ongoing engagement and broader management.
2. Actual supported platforms and formats, confirmed by the owner.
3. Calendar, approvals, publishing and reporting responsibilities.
4. Existing rate-card tiers with clear inclusions and exclusions.
5. Organic posting versus paid social advertising.
6. Useful enquiries and audience relevance rather than followers alone.
7. Approved work samples, useful FAQs and direct contact.

Owner checks: asset production, approval turnaround, moderation scope, ownership terms and fees. Do not promise virality or sales from a fixed post count.

### Digital marketing consulting

Proposed URL: `/digital-marketing-consultant`
Candidate title: Digital Marketing Consultant in India | Fawaz BH
Candidate H1: Choose the marketing work your business needs next.

Opening draft:

> I am Fawaz BH, an independent consultant based in Kushal Nagar, Kodagu, Karnataka. I help businesses decide how search, paid advertising and social media can support their goals. We start with the problem and budget, then agree on a practical scope rather than add every service at once.

Content to prepare:
1. Goals, customers, offer and measurement baseline.
2. Simple channel comparison with links to the actual service pages.
3. Strategy advice versus implementation scope.
4. Package fees and separate platform costs.
5. Personal delivery, working languages, remote work and limits.
6. Real evidence, practical FAQs and an enquiry path.

Do not duplicate the national SEO page or invent an agency team. An Asia-wide ambition is not proof of a regional office network or market-leading track record.

## 4. Existing-page rollout order

1. Services hub: reconcile terminology and scope, add contextual links, keep pricing distinctions clear.
2. Homepage: preserve the personal identity and offer clear routes to actual services, not a keyword-heavy headline.
3. AEO/GEO pages: answer buyer questions early, verify citations and remove unsupported certainty.
4. India and Karnataka pages: support geographic consultant intent with genuine evidence.
5. About and case studies: verify credentials and results before adding stronger claims.
6. Local pages: improve genuine local context, preserving remote-delivery and language disclosures.
7. Blog: publish a substantial original guide based on a buyer question and actual experience.

Use the existing fawazbhseo-redesign system. Keep the warm-neutral palette, typography and flat offset shadows. Do not rebuild page layouts merely to change search copy.

## 5. Evidence-led guide backlog

- SEO versus paid ads for a small business: budget, urgency and demand.
- What an SEO audit includes: a redacted real example with permission.
- How to compare social media management quotes: inclusions and exclusions.
- How to measure mentions and citations in AI search: a repeatable method with honest limitations.
- Google Ads versus Meta Ads: a labelled decision scenario, not invented CPC figures.

These are ideas, not published articles or verified PAA demand. No fabricated dates, author credentials or article schema.

## 6. Required validation

Before saying the whole site is optimized:

- Render and lint actual PHP on a PHP-capable staging host.
- Check every sitemap URL for final HTTP status, canonical and intended robots directives; inspect response headers as well as HTML.
- Test real 404s and redirect variants, including language roots and deep paths.
- Inspect representative excluded URLs in Search Console. Separate discovered, crawled, duplicate, blocked, noindex and server-error cases.
- Validate schema against visible content and real business facts. No fake reviews, ratings or offices.
- Check actual desktop/mobile pages, FAQ interaction, accessible names, native controls, phone links and WhatsApp handoff.
- Obtain the real PageSpeed report and exact failing agentic-browsing check. No 3/3 score is claimed.
- Deploy to the actual PHP host, not a static environment that cannot execute PHP or Apache rewrites.
- Keep an annotated release log and compare query/page performance over sensible periods. Correlation after a change is not proof of causation.

## 7. Inputs still needed

- Search Console query/page/country/device exports and indexing reports, including example excluded URLs. No password or API key is needed.
- PageSpeed report link or screenshot with the failing audit expanded.
- Permissioned evidence for case studies, credential links, and confirmed current rates and scope.
- Native-language editorial review if indexable localized pages are required.

Research-file validation and robots-file checks do not establish rankings, AI recommendations, PHP correctness or live rendering. No complete multilingual rollout or ranking guarantee is claimed.
