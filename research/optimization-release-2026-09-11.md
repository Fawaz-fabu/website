# Search content release: 2026-09-11

## Scope and status

The owner authorised content additions and revisions without approval for each edit. Ask before removing a major page or feature. This approval does not make ranking outcomes, third-party coverage or AI recommendations controllable.

This is a saved content and frontend release, not a completed ranking campaign or a live deployment. The existing PHP template architecture was retained. No server application, authenticated integration, database or automated AI API was added.

## Folder and contact follow-up

All three article files now live in `blogs/` with parent-relative shared includes and canonical `/blogs/<slug>` paths. The archive remains `/blog`. Saved Apache rules redirect `/blogs` to the archive and the old article routes to the new destinations, including root .php/slash variants and a language-prefixed legacy pattern. Links, structured data identities, sitemap source filenames and text summaries were updated together. Redirect patterns were checked against source examples; Apache itself has not been executed here.

Both `fawazbhseo@gmail.com` and `admin@fawazbhseo.in` appear as separate contact links in the shared footer/contact section, Contact-page readout and 404 contacts. Existing email schema properties were updated to arrays, including the ContactPoint and shared location schema. Email wrapping and LTR isolation were added without changing the layout structure. The mailbox, email DNS and mail delivery are not provisioned or tested by this website edit.

The follow-up validation passed **143 checks with no failures**, including PHP grammar for **40 files**, new canonical/include paths, article links, redirect regex examples, visible email links and JSON email arrays. Desktop and phone Contact snapshots showed both addresses completely and legibly. These checks use actual source markup and current assets but are not PHP runtime, live-site or mailbox tests. The first scrolled screenshot omitted the email rows; the later desktop/top and mobile/full-page captures supply the visual evidence. Temporary QA files were removed.

Public deployment remains pending. Upload the moved article files and all dependent templates, CSS, sitemap/text files and `.htaccess` together; remove obsolete root article files on the PHP host as part of this migration. Do not deploy private research or QA material.

## New destinations

| Path | Intent | Supporting content | Commercial destination |
|---|---|---|---|
| `/blogs/seo-aeo-geo-differences` | Informational comparison | Definitions, comparison table, illustrative business example, prioritisation, reporting and four FAQs | `/seo-services`, `/aeo-consultant`, `/geo-consultant`, `/ai-seo-expert-india` |
| `/blogs/measure-ai-search-visibility` | Practical measurement method | Prompt sampling, conditions, outcome definitions, denominators, limitations and four FAQs | `/geo-consultant`, `/aeo-consultant`, `/contact` |
| `/blogs/local-seo-checklist-karnataka` | Local business implementation checklist | Profile eligibility, genuine service areas, local-page usefulness, languages, reviews, enquiries and four FAQs | `/seo-consultant-karnataka`, `/seo-consultant-kodagu`, `/contact` |
| `/assets/downloads/ai-visibility-log.csv` | Ungated reference worksheet | Header only, 22 fields, no fabricated results, formulas or external connections | Linked from the measurement guide |

The three guides contain approximately 1,077, 1,316 and 1,293 whitespace-delimited words respectively, including headings and navigational text. These counts describe the files, not a ranking target.

The comparison intent is supported by the earlier autocomplete research (`aeo vs seo vs geo`). Measurement and the Karnataka checklist are editorial needs informed by the prior research and genuine service fit, not claims of measured query volume. No new PAA export, keyword-volume dataset or AI prompt-demand dataset was obtained.

## Editorial treatment

- AI-assisted preparation is disclosed visibly. Illustrative businesses, prompts and arithmetic are not presented as client results.
- Brand-level authorship matches the visible FawazBHSEO byline. No invented reviewer, credential, press endorsement or human-only authorship claim was added.
- Each guide includes a unique title, description, canonical, BlogPosting JSON-LD and BreadcrumbList matching its identity, plus native HTML question disclosures.
- Preparation dates are labelled as preparation dates. No live publication date is claimed in the article schema before release.
- Existing commercial service pages retain their primary intent. The guides answer supporting informational needs rather than replacing those pages or creating city-name duplicates.

## Existing pages and discovery

- `/blog` now lists the three guides. The old empty state is retained only as an inactive fallback for an empty post array. Preparation method, CTA, status text and metadata were updated.
- The homepage includes a three-guide section. Existing major homepage sections were retained.
- Contextual links were added on Services, AEO, GEO, Karnataka and AI SEO India pages, with return links from the guides.
- `sitemap.php` now lists 32 distinct English source-page entries, up from 29. This is a source-array count; the XML generator still needs execution on the PHP host. The existing locale gate and robots policy were not changed.
- `llms.txt` and `llms-full.txt` link to the guides and worksheet. They are convenience summaries, not a guaranteed ranking or citation channel.
- Services wording no longer promises Wikidata/Knowledge Graph inclusion or treats arbitrary chunking and blanket schema deployment as requirements. Prices and major service offerings were not removed or changed.
- AI SEO India now acknowledges AI-assisted website writing. Client drafting, evidence and approval requirements are to be agreed in scope rather than inferred from this site.
- The GEO introduction now distinguishes a citation from a recommendation. The full specialist-page evidence audit is still outstanding.
- Incorrect statements in the long text summary that JavaScript translation can never be indexed, or that intended noindex proves absence from every index, were corrected. The actual translation implementation is unchanged.

## Frontend changes

All guide styles are in `assets/css/site.css`, using the approved warm palette, existing typefaces and flat card treatment. There are no new page-specific production scripts.

Fourteen existing shared stylesheet text-color declarations using `--text-muted` were moved to `--text-2` for legibility. The muted token itself was preserved. Guide links in dark mode use the existing brighter accent-hover shade after testing found the ordinary dark accent insufficient for small text.

The current shared asset version is `20260911-blogs-email`. The existing locally preloaded display font remains in use. These changes do not demonstrate a live CLS, LCP or PageSpeed score improvement.

## Evidence consulted

Saved research-only snapshots:
- `sources/google-ai-features-20260911.html`, https://developers.google.com/search/docs/appearance/ai-features. The retrieved article states that SEO best practices remain relevant to Google AI features and that there are no additional requirements or special optimisations necessary for AI Overviews/AI Mode (article body, lines 3873-3881 in the saved snapshot).
- `sources/google-structured-data-20260911.html`, https://developers.google.com/search/docs/appearance/structured-data/intro-structured-data. The article explains that structured data describes the page and should not describe information invisible to the user (lines 3898 and 3917-3919 in the saved snapshot).
- `sources/google-local-ranking-20260911.html`, https://support.google.com/business/answer/7091?hl=en. The article discusses complete business information, relevance, distance and prominence, and says a better local ranking cannot be requested or bought (lines 309-357).

The FAQ-specific documentation download was refused because of a redirect. No claim was made that its current contents were verified; the guides link to the retrieved general structured-data documentation instead. The business representation guideline is an additional reference link, not a fully audited source snapshot in this batch.

Keep research snapshots and private exports out of public deployment. Robots exclusions are not access control.

## Confirmed validation

A temporary browser harness fetched the actual repository files. `php-parser` 3.2.5 accepted the PHP grammar of all 32 sitemap page sources, the sitemap generator and four shared includes (37 files). This is a JavaScript syntax parser, not PHP interpreter execution or server integration testing.

The source-based guide validation passed 126 checks with no failures in the final captured run. Checks cover unique titles/canonicals, JSON-LD parsing and page identities, one H1/main, unique IDs, 12 native FAQ summaries, same-page anchor targets, source-backed internal links, sitemap/hub/homepage/summary discovery, CSV structure and selected corrected claims. Browser checks also exercised the native FAQ, theme switch and mobile-navigation state. The console tool's viewport was 800px; dedicated phone captures use 390px.

Computed ratios after correction:
- Guide navigation links: 5.24:1 light, 5.20:1 dark (dark previously 4.06:1).
- Guide metadata and footer headings: 7.69:1 light, 8.32:1 dark.
- FAQ question text: 12.81:1 in either theme.

These are selected checks, not a full accessibility certification.

Visual checks confirmed the comparison guide's light-mode hero at desktop and phone widths, plus AI measurement guide content at phone width in dark mode and its dark desktop hero. The attempted phone FAQ screenshot instead showed the metrics section, so it is not evidence of FAQ visual placement. Subsequent snapshots also confirmed the local-guide hero at desktop/phone widths and the desktop blog archive. The mobile archive, homepage-guide-section and dark-desktop-footer captures remain outstanding after browser service saturation; these are not claimed as visual passes.

Snapshots used each new guide's literal main markup, the current shared stylesheet and production-rendered shared header/footer markup. The blog fixture expands actual literal post/topic data for visual review. It does not execute PHP. Initial test harness issues (browser `process` shim, snapshot scrolling) were QA-only and are not site changes.

## Required release checks and remaining work

1. Upload the intended PHP pages/templates, shared assets, text summaries and sitemap source together to the existing PHP-capable host. Do not expose research exports or temporary QA files. Static Hosted Deploy cannot run this site's PHP templates.
2. Lint with the actual host PHP version and test the real routes. Confirm status 200, canonical, intended robots directives, JSON-LD and downloadable CSV; check invalid URLs return 404 and redirect variants do not loop.
3. Execute `/sitemap.xml` on that host and check the intended URLs and lastmod values. The existing filesystem-based lastmod policy can reflect upload times, so a content-date policy remains a follow-up.
4. Rerun real desktop/mobile rendering, keyboard interaction and cold-load performance on the live URLs. No live indexing result or improved PageSpeed score is claimed here.
5. Use Search Console URL Inspection and comparable-period query/page reports after release. Record the release date. Obtain indexing reports and current performance evidence before diagnosing an exclusion.
6. Continue the specialist-page evidence audit. Historical numerical studies, broad engine-mechanism assertions, citations of named reports and self-recommendation claims elsewhere on the site have not all been verified. Do not amplify them in new articles until substantiated.
7. Build permissioned first-party evidence and seek relevant third-party coverage through actual outreach. No directory submissions, reviews, press placements, external profile changes or AI recommendation tests were performed by this release.
8. Additional performance-marketing, social-media and digital-marketing service pages remain in the backlog. Confirm factual service scope and evidence before adding stronger commercial promises. Full multilingual editorial review and a site-wide copy rewrite are not completed.

Production remains https://fawazbhseo.in/. No new API endpoints, table schemas, visitor storage or database services were introduced. All new content is Git-backed source; the blank CSV downloads directly as a static asset.
