# Search Console review, 2026-09-10

## Evidence and scope

Reviewed the seven saved exports in `_audit/`: `Chart.csv`, `Countries.csv`, `Devices.csv`, `Filters.csv`, `Pages.csv`, `Queries.csv`, and `Search-appearance.csv`. These are user-supplied historical exports, not a live Search Console connection.

Filters: Web search, Last 6 months. The actual chart rows span 2026-07-08 through 2026-09-08. Do not describe this as six complete months of observations. There is no comparable previous-period export, query-by-page breakdown, conversion data, URL Inspection result, indexing report or crawl log.

## Baseline

Device totals: **47 clicks / 851 impressions**, giving **5.52% CTR** when calculated from counts.

| Device | Clicks | Impressions | Export CTR | Average position |
|---|---:|---:|---:|---:|
| Desktop | 26 | 613 | 4.24% | 15.69 |
| Mobile | 21 | 236 | 8.9% | 6.65 |
| Tablet | 0 | 2 | 0% | 35.5 |

Mobile has higher observed CTR and better average position, but the query/country mix can differ. This is not evidence that desktop layout or speed caused lower CTR. Test both viewports.

India accounts for 46 of 47 clicks (97.9%) and 637 impressions. The US has 143 impressions and no clicks. Switzerland has one click from four impressions, too little evidence to prioritise international expansion. Country-specific query and page exports are needed to explain these differences.

## Query evidence

The query CSV contains a quoted multiline query. Use a real CSV parser, not line splitting, if processing it programmatically.

| Observed query | Clicks | Impressions | Average position | Interpretation |
|---|---:|---:|---:|---|
| best seo expert in karnataka | 3 | 9 | 3 | Relevant early non-brand signal, very small sample |
| seo karnataka | 1 | 22 | 6.91 | Supports strengthening the existing Karnataka page |
| fawaz bh | 0 | 40 | 2.98 | Investigate actual brand SERP and query-to-page mapping |
| fawazbhseo.in | 0 | 25 | 5.64 | Review brand results and chosen canonical, not an automatic title rewrite |
| geo expert in india | 0 | 27 | 23.96 | Relevant GEO visibility opportunity |
| aeo expert in india | 0 | 8 | 6.62 | Relevant AEO signal, too small for a reliable CTR benchmark |
| aeo expert | 0 | 5 | 8.2 | Supporting signal for the existing AEO page |
| ai seo expert india | 0 | 1 | 48 | Too little exact-query evidence for a standalone conclusion |

Visible query rows do not represent every query contributing to the property totals. Privacy filtering and aggregation differences mean that visible query clicks must not be treated as the full non-brand/brand split.

Conversational strings such as `who is the best choice?` or `compare them both`, and the string containing `claude responded`, do **not** prove Claude referrals, AI recommendations or AI prompt demand. These are exported Google Web query strings without their surrounding context. Do not turn ambiguous one-impression strings or unrelated person/place queries into new landing pages.

## Page priorities

These are independent page aggregates. The suggested query targets are editorial mappings, not a measured query-page join.

| Priority | Existing target | Observed page data | Next action |
|---|---|---|---|
| 1 | `/seo-consultant-karnataka` | 10 clicks, 183 impressions, 5.46% CTR, position 16.62; slash variant adds 1 click / 21 impressions | Preserve relevance; improve permissioned local proof, service fit and links to relevant work after copy approval |
| 2 | `/geo-consultant` | 2 clicks, 117 impressions, 1.71% CTR, position 13.19 | Review query-filtered results, then clarify deliverables, evidence, measurement and limitations |
| 3 | `/ai-seo-expert-india` | 0 clicks, 64 impressions, position 14.22 | Distinguish practical AI-assisted SEO work from GEO/AEO; inspect actual query mix before rewriting snippets |
| 4 | `/seo-consultant-india` | 4 clicks, 95 impressions, 4.21% CTR, position 14.65 | Explain remote delivery and genuine India-wide relevance without invented offices |
| 5 | `/aeo-consultant` | 0 clicks / 63 impressions at 19.52; slash variant 2 clicks / 17 impressions at 12.94 | Inspect canonical/redirect state, then clarify buyer intent on the existing page |
| 6 | `/case-studies` | 1 click, 73 impressions, 1.37% CTR, position 8.47 | Strengthen permissioned evidence and clarity; do not invent outcomes |

The homepage has 22 clicks, 410 impressions and 5.37% CTR at average position 3.95. Preserve its identity and core relevance while investigating technical improvements. Avoid a broad title/content rewrite based on this small sample alone.

The service page has slash/non-slash rows too: `/seo-services` has 0 clicks / 57 impressions, and `/seo-services/` has 1 click / 11 impressions. Review the combined intent and canonical state before judging either row separately.

## URL consistency checks, not confirmed bugs

Both slash and non-slash rows exist for About, AEO, Karnataka, Kodagu, Services, Case Studies and Blog. There is also one impression on `/seo-consultant-kodagu.php`. These can reflect historical URL handling. Their presence alone does not prove currently indexable duplicates or keyword cannibalisation.

On the actual PHP host:

1. Check live response status and redirect chain for representative variants.
2. Confirm one preferred URL, self-referencing canonical, matching internal links and sitemap entry.
3. Inspect Google's selected canonical and last crawl date in Search Console.
4. Inspect `/neptiq-ai/` separately: it has 1 click / 22 impressions but no matching root PHP file was found in the current project listing. Establish its live status and historical purpose. Redirect only if a genuinely equivalent replacement exists; otherwise an appropriate 404/410 may be correct. Do not redirect unrelated retired content to the homepage.

Page totals and property/device totals use different aggregation. Multiple page appearances can contribute differently. Do not add page rows and label the result unique property traffic.

## Search appearance

`Translated results` records 1 click / 4 impressions at average position 4.25. This is Google's search-appearance classification, not proof that the site's runtime language routes are indexed or that its translation widget works.

## Crawl-policy correction

The current repo `robots.txt` deliberately permits language routes so crawlers can read their page-level noindex. It contains only five internal-path exclusions under one wildcard group. This supersedes the older handoff describing extensive locale blocks. These performance exports provide no evidence of a crawl-budget crisis. Do not reinstate the old language blocks or treat nofollow as guaranteed crawl prevention.

## PageSpeed follow-up, still pending

Saved artifacts: `_audit/pagespeed-mobile.txt` and `_audit/pagespeed-desktop.txt`.

Provided report URLs:
- https://pagespeed.web.dev/analysis/https-fawazbhseo-in/sxo9jjrb66?hl=en_GB&form_factor=mobile
- https://pagespeed.web.dev/analysis/https-fawazbhseo-in/sxo9jjrb66?hl=en_GB&form_factor=desktop

The earlier handoff reports CLS 0.168, an affected `h1#hero-h`, and low contrast involving `#8b8270` on `#f7f1de` / `#ede2c8`. It also reports two passing Agentic Browsing checks. These details have **not been independently re-extracted or reproduced in this continuation**. An affected heading does not, by itself, establish webfont loading as the root cause.

Before claiming a fix: inspect the actual audit and font-loading source, confirm the design skill, apply the smallest appropriate change, check desktop/mobile and both themes, measure cold-load shifts on the PHP-rendered page, deploy to the existing host, then rerun the live reports. Do not promise a 3/3 score or infer a rendering pass from a clean console. The available local browser tool supports HTML, not PHP execution.

## Frontend mitigation saved, 2026-09-10

The user approved the design skill. Shared source inspection confirmed that the headline face was discovered through an asynchronous Google Fonts stylesheet with `display=swap`, a plausible source of late text reflow, not proof that it caused the entire reported 0.168 CLS.

Saved changes:
- Self-hosted Big Shoulders Display 700 with a Latin preload, optional display and on-demand extended subsets. Removed only that face from the Google request. Body/UI/locale font behavior is unchanged.
- Reused `--text-2` for the portrait caption, footer headings and footer copyright. Tokens and layout structure are unchanged.
- Versioned shared assets and retained the font license and source documentation.

A downloaded production homepage snapshot was rendered with the proposed repo assets. Light desktop/mobile hero views and dark mobile footer were visually checked; final console diagnostics confirmed the face loaded and the intended head markup was present. Targeted contrast ratios: caption 8.77:1 light and 8.57:1 dark; footer 7.69:1 light and 8.32:1 dark. Initial preview-proxy path/query failures were corrected only in the temporary test snapshot.

Limits: no PHP execution, live revision, PageSpeed rerun, throttled comparative benchmark or full accessibility audit. Optional display can retain the fallback on a slow first navigation. A small layout-shift entry remained in one snapshot load, so other sources still need investigation. The live site is unchanged. Release the head, stylesheet and font directory together on the existing PHP host, then measure the actual URL at both widths. This does not establish a passing Agentic Browsing score.

## Recommended measurement

- Obtain latest 28-day and previous 28-day exports using identical filters.
- Export queries filtered to each priority page, plus India/device breakdowns where useful.
- Track qualified enquiries separately from organic clicks; none are included here.
- Log change dates, compare like-for-like windows, and allow for small-sample volatility.
- Keep AI prompt testing separate from Search Console reporting.
- Site-wide human-first copy rollout remains pending approval of the Contact pilot.

## Storage and release

This review is Git-backed Markdown referencing CSV/TXT files. No APIs, databases, visitor tracking, new public application routes or deployment were added. Production remains https://fawazbhseo.in/. Raw exports may be commercially sensitive: keep `_audit/` and research artifacts out of the public deployment or protect them at the actual host. robots.txt is not access control.
