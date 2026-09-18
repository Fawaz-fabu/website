# Fawaz BH: search and AI discovery research

Research date: 2026-09-10.
Status: initial discovery plus a saved three-guide content release, not a completed ranking campaign. The owner's 2026-09-11 authorisation permits broader content revisions; earlier Contact-only approval notes are historical. See `optimization-release-2026-09-11.md` for current changes and verification limits. The original 29-URL map is a baseline; three guides now live in the working copy under `/blogs/<slug>`, and the sitemap source has 32 entries.

## Goal

Help relevant buyers find and evaluate Fawaz BH as an independent consultant based in Kushal Nagar, Kodagu, Karnataka. Cover SEO, AEO, GEO, performance marketing, social media marketing and broader digital marketing without changing the business into an agency or inventing offices, awards or results.

No ranking position, indexation date, AI recommendation or market leadership is guaranteed. "Best" is a comparison intent to address with evidence, not a status to award ourselves.

## Research method and limits

- Queried Google's public autocomplete endpoint for 14 English seeds with `hl=en&gl=in`. Saved the exact responses in `sources/autocomplete-*.json`.
- Autocomplete is a discovery signal. It is not search volume, ranking difficulty, a complete keyword universe, a representative demand survey, or proof that any one person searched a phrase. Location parameters do not guarantee a locally representative sample.
- Suggestions can contain irrelevant results. The sample includes Indianapolis, salaries, courses, unrelated employers, legal queries and international salary questions. These were deliberately excluded from buyer targeting.
- Initial autocomplete research did not access Search Console, Keyword Planner, Ahrefs or Semrush account data. A later review of user-supplied Search Console CSV exports is documented in `search-console-review-2026-09-10.md`; its historical observations do not provide search volume, difficulty, CPC or current live rankings.
- No live People Also Ask panel was collected. Questions in this pack are labelled either autocomplete observations or editorial buyer-question candidates. Do not describe the latter as real PAA results.
- AI prompts are authored evaluation scenarios. They are not scraped user conversations, measured AI prompt demand or verified mentions of Fawaz BH. No AI engines were queried for ranking positions.
- Downloaded the live robots file and sitemap from fawazbhseo.in. This confirms their retrieved content, not that every listed URL is healthy or indexed.
- Consulted Google's official noindex guidance. Source details and an exact short excerpt are in `sources/manifest.md`.

## Files

| File | Purpose |
|---|---|
| `search-console-review-2026-09-10.md` | Supplied GSC export findings, priorities, canonical checks and pending PageSpeed verification |
| `sources/manifest.md` | Source IDs, seed URLs, observations and limits |
| `sources/autocomplete-*.json` | Raw responses for reproducibility |
| `sources/live-robots.txt` | Live robots snapshot before this correction, not the desired production configuration |
| `sources/live-sitemap.xml` | Live sitemap snapshot, containing 29 English content URLs |
| `keyword-map.csv` | Prioritised observed and proposed keyword clusters, with evidence IDs and target URLs |
| `page-map.csv` | One primary search purpose for each of the 29 existing sitemap URLs |
| `questions-and-answer-briefs.md` | Buyer questions and plain-language answer direction for all six disciplines |
| `ai-prompt-test-set.csv` | 30 unbranded prompts for repeatable manual testing |
| `implementation-plan.md` | Technical findings, service-page briefs and rollout checks |
| `ai-observation-template.csv` | Empty measurement sheet, not a results report |

## Main findings

1. India and Bangalore consultant/service variants appear in this autocomplete sample. Keep Fawaz's consultant positioning. Do not target "agency" by pretending to be an agency.
2. AEO results include definition, examples and services. Separate "what is it?" from "what will you do for me?" within the existing AEO page.
3. GEO discovery contains meaning, strategies, tools and companies. The commercial page should explain eligibility, work, evidence and measurement rather than promise placement in AI answers.
4. Performance marketing services in India appears in the sample. The existing `/seo-services#pricing-ads` is useful for price discovery but is not a complete paid-marketing service explanation.
5. Social media service packages and monthly management cost are useful signals. Make deliverables, platforms, approvals, reporting and the distinction between management fees and paid advertising clear.
6. Digital marketing searches mix hiring, career and training intent. Exclude salaries, jobs and courses from the consultancy's primary targets.
7. The exact Karnataka seed returned an empty list. That is not proof of zero demand. Prioritise Karnataka because it is the real operating base and a stated market, then validate with Search Console and actual enquiries.
8. "Best in Asia" is an ambition, not substantiated evidence. Start with genuine Kodagu/Karnataka proof and remote India delivery. Asia-wide pages need real buyer needs and credible cross-border delivery evidence before expansion.

## Geographic priorities

- First: Kushal Nagar and Kodagu. Keep the spelling consistent in identity/address fields; use "Kushalnagar" and "Coorg" naturally where they help readers.
- Next: Karnataka, with distinct Bengaluru, Mysuru, Mangaluru and Hubballi-Dharwad context. Bangalore/Mysore/Mangalore variants belong on the existing city pages, not duplicate URLs.
- Then: India-wide remote consulting, with explicit delivery model, fit, exclusions and proof.
- Later: Asia and international work, based on actual capability, language coverage, client evidence and commercial fit. A service-area statement is not a local office.

## Evidence and conversion over keyword density

Every service page should answer: Who is this for? What problem does it solve? What is included? What does it cost? What access is needed? How are results assessed? What cannot be promised? How do I contact the person doing the work?

Use one strong primary page per intent cluster. Link the service explanation to its pricing, relevant local page, evidence and contact route. Do not insert every keyword into every title, FAQ or footer.

## Measurement

1. Export Search Console query/page/country/device data for the latest 90 days and the previous comparable period. Use 16 months where seasonality matters.
2. Check indexing reasons and Google-selected canonical for representative pages using URL Inspection. Separate discovered, crawled, duplicate, blocked, noindex and server-error cases.
3. Track qualified enquiries and sales alongside non-brand impressions/clicks. A rank without a relevant visitor is not the goal.
4. Run the 30-prompt set manually in each relevant engine with web search enabled when supported. Log exact prompt, timestamp, engine/model/mode, location, fresh-session state, answer, cited URLs and whether Fawaz is mentioned, cited or recommended. These are three different outcomes.
5. Repeat each prompt in three fresh sessions for a baseline and on a fixed monthly schedule. Keep engine-specific denominators; do not report a cross-engine average as a market share.
6. Measure service-by-service. Paid advertising impressions are not organic rankings; AI mentions are not necessarily website citations; citations are not automatically leads.

## Rollout status

Research and the non-visual crawl correction are saved. The implementation plan uses the existing design system. New service landing pages and the page-by-page content rollout have not been implemented in this pass. No site-wide copy rewrite, verified PAA export, native-language editorial review or PageSpeed score improvement is claimed. No deploy was performed.

## Validation of saved files

A browser-based validator fetched the actual project research files and current repo robots.txt, rather than hardcoding their contents. All 19 checks passed:

- The 14 autocomplete responses parse, and every keyword marked observed appears verbatim in its cited response.
- The keyword CSV contains 50 unique entries with volume and difficulty explicitly unknown.
- All 29 URLs in the saved live sitemap have one page-map entry; current keyword targets resolve to mapped paths.
- The 30 AI prompts have unique IDs, five per discipline, are labelled synthetic and do not instruct engines to recommend Fawaz. The observation template has no invented results.
- The saved robots file has one wildcard group, only the five intended internal-path blocks and the unchanged sitemap directive. All mapped public pages and representative locale paths remain crawlable under those saved rules.
- All four research documents exist and contain no em or en dash characters.

The temporary validator was removed after testing. These checks establish artifact consistency and the saved crawl rules only. They do not establish live server behaviour, PHP execution, indexing, rankings, AI recommendations or page rendering.
