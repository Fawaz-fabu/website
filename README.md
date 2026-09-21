# fawazbhseo.in

Full visual redesign of the site for **Fawaz BH**, an independent SEO, AEO and GEO consultant based in Kushal Nagar, Kodagu, Karnataka, India.

Built as PHP pages with function-wrapped shared includes. The design follows the `fawazbhseo-redesign` design system: editorial print aesthetic, hard-edge offset shadows, no gradients, no glassmorphism, no glow, no icon-in-circle grids, no stock photography.

---

## 1. Project goals

- Move the site off the retired "dark luxury" theme (Three.js starfield, gold/teal/violet, glassmorphic panels) onto a flat, editorial, human-feeling design.
- Preserve factual claims and the established identity. On 2026-09-11 the owner authorised broader content additions and revisions without approval for each edit. Ask before removing a major page or feature. Research drafts are not automatically published page copy, and commercial claims still require evidence.
- Zero em dashes anywhere on the site, including titles, meta descriptions, alt text and JSON-LD.
- Human-first content. Nothing that reads as machine-generated.
- Keep browser interactions lightweight, with no server-side mail transport or database added. The current PHP templates and Apache rewrite rules require a PHP-capable host; a static-only host cannot execute them.

---

## 2. Currently completed

### Section 4.2: navigation and contextual internal links

This release is limited to navigation and internal linking. It supersedes older navigation descriptions below. No page, offer, price, research claim or testimonial was rewritten, and no page was added or removed.

- Desktop and mobile primary navigation: AEO, GEO, Services & pricing, Work, Guides, About, Contact. Destinations are `/aeo-consultant`, `/geo-consultant`, `/seo-services`, `/case-studies`, `/blog`, `/about`, `/contact`. The logo remains the homepage link. Specialist pages now mark their own menu item active.
- Existing language-aware `fbh_link()` routing is retained. AEO/GEO acronyms are protected from translation. New English navigation labels use the existing runtime translator; About and Contact retain `t()` and their per-label translation protection. No locale file, i18n function, route or translation JavaScript changed. New English labels remain readable if third-party translation is unavailable.
- Existing homepage AEO/GEO service descriptions now link to their specialist pages. The local-SEO description also links to `/cities-we-serve`, and Service areas is explicitly retained in the footer. `/ai-seo-expert-india` retains contextual links from the AEO page and comparison guide, and its existing footer link.
- `/seo-services#aeo` and `#geo` link from their existing descriptions to their specialist pages. The comparison guide links from its AEO/GEO explanation rows, not just the later service paragraph. About's statement describing its expansion into Answer Engine Optimisation and Generative Engine Optimisation links to both pages.
- `/ai-seo-expert-india#service-choice` adds only this navigation sentence after the overlap/dependency explanation: "Choose the scope you want to explore: AEO for direct answers, GEO for AI-generated visibility, or SEO foundations and deliverables." Its links target `/aeo-consultant`, `/geo-consultant`, `/seo-services#technical-seo`.
- The AEO/GEO pages already contain reciprocal contextual links in their comparison sections; those links and their wording are preserved rather than duplicated. All 12 newly added body anchors have distinct wording.
- Validation passed: 54 PHP syntax checks; 33 English and 33 Kannada template renders; correct desktop/mobile order, active items and locale-prefixed navigation; all new link targets and the SEO fragment; preserved reciprocal links; unchanged existing body text except the one added link-choice sentence; unchanged testimonials, head metadata, canonicals and JSON-LD; identical sitemap output; all other tracked files unchanged except this README.
- Unchanged: `includes/i18n.php`, locale files, routing code, `sitemap.php`, `robots.txt`, all LLM summaries, assets and backend/API paths. No Node, npm, package file, build step, runtime dependency or storage service was added.
- Source limitation: implemented against local commit `6223eef`. The owner reports `.htaccess` is now committed remotely, but GitHub authorization remains unavailable in this session and the dotfile is absent locally. No remote fetch, ancestry confirmation, merge, push or deployment was possible/performed; this release does not create, replace or remove `.htaccess`.
- Manual upload set (preserve paths): `includes/header.php`, `includes/footer.php`, `index.php`, `seo-services.php`, `ai-seo-expert-india.php`, `blogs/seo-aeo-geo-differences.php`, `about.php`, `aeo-consultant.php`, `geo-consultant.php`. README and all private QA/release materials are not public upload files. Keep the existing Hostinger `.htaccess` and backend intact.
- Post-upload: verify the seven-item menu on desktop and mobile; click the logo; check AEO/GEO active states; follow each new contextual link and the SEO fragment; confirm AI SEO and service-area access from both body/footer links; test the language switcher and locale-preserving navigation; check the unchanged canonical/robots output and 32-URL `/sitemap.xml`; check keyboard focus/menu operation, light/dark layout and absence of PHP errors. Live Apache rewrites, browser layout and the external translation service still require host-level checks.
- Next steps remain owner review and manual Hostinger upload. The broader service structure plan, copy revisions and new service/location pages are not implemented by this release.

### Approved wording fixes and bounded full/chat summaries

This release supersedes the older summary sizes and testing-date snapshot notes below.

- `about.php`: replaced the residual Coorg-homestay client sentence with the approved current domains, explicitly identifying ILMERA as the co-founder's own venture whose digital work he runs, not an arm's-length client. All other paragraph wording is unchanged.
- `geo-consultant.php`: removed only the arbitrary `Reviewed July 2026` engine-table caption suffix. No other page wording, research assertion or page-level review date changed.
- `llms-full.txt`: reduced from 539,059 to 138,683 UTF-8 bytes (138.683 decimal kB; 74.27% smaller). Common identity/contact/credential furniture is centralised, 19 geographic pages are condensed to context/coverage/delivery differences, and three guides have linked summaries instead of full extracts. Published prices and package inclusions, AEO/GEO workstreams, research paragraphs with their source attributions and qualifications, and historical case-study status remain. This is editorial condensation, not an independent revalidation of research claims.
- `llms-chat.txt`: now 23,861 characters / 23,889 UTF-8 bytes, below the 40,000-character backend limit. It includes the approved dated personal testing statement, all three approved current domains, ILMERA's relationship, and Green Coorg Spices' historical result plus expired-hosting/offline/rebuild status.
- Single editable testing-date source remains `$ai_testing_as_of` in `index.php`. The full/chat snapshots now include its rendered date, obtained from that variable rather than manually hardcoded in the maintenance script. After a real re-test, change the variable, regenerate the two static snapshots, and upload them. They do not update automatically when PHP changes. `llms.txt` remains unchanged and still refers to the dated homepage statement. The local maintenance/test scripts are private QA artifacts, not a runtime dependency or site build step.
- Validation: 54 PHP syntax checks; 33 English template renders; five approved testimonial instances preserved; 91 catalogue/package entries checked; 46 AEO/GEO research paragraphs/source attributions and all eight workstream bodies retained; 37 complete selected source sections retained; 19 location summaries and three linked guide summaries; exact two-edit PHP scope checked. All other tracked site files are unchanged, including chat.php/API paths, index.php, llms.txt, routing, canonicals, i18n and the 32-entry undated sitemap.
- The owner reports prior releases are live, but public homepage/case-study requests from this environment still returned older content, including on a cache-busted retry. This release uses the approved repository and owner-supplied facts; external deployment was not independently verified.
- Manual release: upload only about.php, geo-consultant.php, llms-full.txt and llms-chat.txt. Keep README, research and .audit-work private. No GitHub push, Hostinger upload or backend changes were performed. Verify the About wording, removed caption date, summary sizes and testing/status facts after upload; inspect hosting/CDN caches if the old content remains visible.

### Compact chat grounding and repo-only coverage report

- Added `/llms-chat.txt` as a static grounding resource: 22,662 characters and 22,684 UTF-8 bytes, below the owner's 40,000-character backend truncation limit. It covers 32 page purposes, services, published package prices/inclusions, service areas, contact, background and case-study facts; it does not reproduce long-form guides.
- All 32 live URLs returned HTTP 200 during source checking, but the public site was still behind the corrected repository. The chat file therefore uses live-page-supported facts, excludes owner-rejected claims still present there, and omits newer unpublished repository-only testing/status/engagement details. Reconcile those details after the corrected pages are uploaded; do not restore rejected claims merely because stale live copy contains them.
- The owner will repoint the chat backend. No chat.php, /api/ file, PHP page, existing LLM summary, asset, routing, canonical, i18n or sitemap was changed in this task. No runtime dependency, build step or storage service was added.
- Added private `research/service-coverage-report.md`: repo-only scope/location mapping for seven requested service categories, 105 exact quoted scope/package entries, all 32 page classifications (4 service, 19 location, 3 guide, 6 other), current specialist headings/FAQs/schema types and body-link coverage. A residual Coorg-homestay client assertion on About is flagged for review rather than silently edited.
- Deployment remains manual Hostinger upload. Upload only llms-chat.txt for this addition; do not upload research, README or .audit-work. No hosting deployment or GitHub push was performed. The existing full text was analysed but left unchanged.

### Owner-approved restoration and corrected engagement facts

This release supersedes earlier descriptions of the removed AI-testing statement, starting-price schema and shortened LLM summaries below. It remains plain PHP, manually uploaded to Apache/Hostinger, without new runtime dependencies or a build step.

- Restored `From INR 14999 per month` in the shared location ProfessionalService schema (16 city pages) and Karnataka's ProfessionalService schema. The one-practice identity, confirmed address, service areas and no-coordinate policy are unchanged.
- `index.php` contains the single editable `$ai_testing_as_of` value for the owner's personal testing statement. Update it only after re-testing. The statement names ChatGPT, Gemini and Google AI Overviews, says this is the owner's own testing, and warns that answers vary by prompt and change over time. It does not claim independent endorsement. Both static LLM resources link to `https://fawazbhseo.in/#ai-testing` for the current date instead of hardcoding copies. This date does not set reviewed_on, dateModified or sitemap lastmod.
- Current work is listed as neelachandra.com, neelachandrainteriors.com and ilmerastudyabroad.com. ILMERA is explicitly the co-founder's own venture whose digital work he runs, not an arm's-length client. The former hospitality/homestay and clinic cards were replaced to match the owner's supplied current roster. General market descriptions and explicitly illustrative homestay examples remain; they are not claims of client engagements.
- Green Coorg Spices is described as having had no prior website or digital presence; Fawaz built its site, which reached first-page Google rankings. The historical result is accompanied by the current status: offline because hosting expired, with a rebuilt version in progress. External links/cite URLs to the offline site are removed or disabled. Approved testimonial wording remains unchanged.
- The order-growth multiple, four-month ranking timeframe, superior-product wording, larger-budget case-study conclusion and removed Karnataka timeline claim remain absent. The five arbitrary hard-coded review dates and all 16 location review fields remain absent/null.
- Case-study cross-references no longer incorrectly imply there is no separately stated ranking result. They identify the approved historical result and its offline/rebuild status; they do not add traffic, sales or time-to-rank figures.
- `llms.txt` restores the earlier detailed directory and market descriptions, updated for the final decisions. `llms-full.txt` now provides source-linked English page extracts so retained research statistics, citations, market detail, service/pricing commitments, credentials and background are not silently dropped. It is larger (about 540 KB) than the shortened summary. These remain static text files; routine page changes require text maintenance, while the testing date is maintained only in the PHP statement they reference. The optional text fallback remains lazy/disabled automatically; no chat endpoint or grounding source was changed.
- Validation: 54 PHP syntax checks, 33 English and 32 Kannada renders, five unchanged approved quote instances, 17 restored schema-price instances, eight case-study FAQ/schema matches, a one-variable date-change fixture, 3,855 retained editorial passages represented in the full text, and 33 protected-file hash comparisons. The sitemap still has 32 English URLs and no lastmod entries with current undated metadata.
- Routing, canonicals, i18n, sitemap, service rate card, assets and blog source files are unchanged. All research statistics retained from the site remain the site's assertions, not new independent verification. No other factual assertion should be removed or reworded without the owner's explicit decision; flag concerns for review instead.
- Release status: local only, no GitHub push or Hostinger upload. Upload only the changed PHP/TXT website files together; keep README and `.audit-work` private. After upload, check `/`, `/case-studies`, the three SEO hub pages, `/seo-services-kushalnagar`, `/llms.txt`, `/llms-full.txt`, and `/sitemap.xml`. Verify the personal-testing date/names/caveat, current roster, offline status/disabled links, unchanged quotes, restored schema prices and English/Kannada canonical/robots behaviour. Actual Apache redirects and browser layout require host-level verification.

### Owner-approved audit corrections, ranks 2 to 5

This section supersedes historical descriptions of client metrics, testimonial approval, business coordinates and review dates below. The site remains plain PHP on Apache/Hostinger, uploaded manually. No routing, canonical or i18n implementation was changed. The original ranks 2 to 5 implementation left the sitemap untouched; the separately authorised sitemap follow-up is documented below.

- Removed the order-growth multiple and unsupported separate client performance counters/claims, including the four-month ranking claim and the homepage claim that AI engines recommend the consultant. Existing client testimonial wording remains verbatim, approved by the clients over WhatsApp as confirmed by the owner. There are no pending-approval labels for those testimonials.
- `includes/head.php` provides optional `reviewed_on` validation and rendering. In each of the 16 existing location PHP files, `reviewed_on` is explicitly null. After an actual editorial review, replace null with that review's YYYY-MM-DD date. Missing or invalid dates output neither the visible review line nor WebPage dateModified. Older fixed review dates on discipline/hub pages were also replaced with null manual values. No request time, file time or upload time is used as a fallback. Guide preparation dates are unchanged.
- AI SEO India's description and authorship explanation now agree with the site's AI-assisted writing/editing disclosure.
- The one practice is `FawazBHSEO`, ID `https://fawazbhseo.in/#practice`, URL `https://fawazbhseo.in/`. Its only address is Kushalnagar, Kodagu, Karnataka, India, 571234. PostalAddress combines locality and district in `addressLocality`; no street address or coordinates are supplied. City services reference this same provider and use areaServed, not separate local-business entities. Geo-position/ICBM tags and market-coordinate configuration were removed.
- Both existing LLM summaries were synchronised with these decisions, the current 32-page directory and unchanged published prices. They remain static summaries; they do not automatically update the primary chat endpoint.

Verification: all 54 PHP files pass syntax checks; all 32 public content templates plus the 404 page render; all 32 Kannada variants retain their existing canonical/noindex behaviour; five Green Coorg Spices quote instances match the pre-edit markup exactly; all business schemas share one practice ID and the confirmed address; nine synthetic date cases pass. Protected sitemap, robots and locale implementation/data files are byte-identical. The generated sitemap still contains 32 entries. Public URLs and storage architecture are unchanged; no database or runtime dependency was introduced.

Status: tested locally, not uploaded to Hostinger or pushed to GitHub. After manual upload, check homepage/case-study layout, the absence of result counters and review dates, client quotes, address/schema, existing canonical/robots output, language selection, the sitemap and ordinary navigation/forms. Actual Apache redirects and browser interactions need that host-level check. The original implementation left the sitemap using file modification times; the subsequent correction below supersedes that behaviour.

### Separately authorised sitemap follow-up

- Only `sitemap.php` is a new runtime replacement in this follow-up. It uses the existing validator in `includes/head.php` from ranks 2 to 5, so that earlier file must also be present on the host.
- All 32 English source entries, their order, HTTPS non-www extensionless URLs, changefreq and priority are preserved. Translation URLs are explicitly excluded regardless of future locale publication. XML remains at `/sitemap.xml` through the existing Hostinger rewrite; no Apache rules were changed or added.
- Date priority: the page's literal `reviewed_on`, then a manually supplied `updated_on`, then `published_on` in the filename-keyed `$editorial_dates` map inside `sitemap.php`. Invalid or absent values fall through; if none is valid, lastmod is omitted. All currently supplied values are absent/null, so the initial output has zero lastmod elements. Do not copy illustrative test dates into production.
- Existing page date declarations remain the source of truth. The sitemap tokenises PHP source rather than running pages; only a single literal YYYY-MM-DD assignment or location-array field is accepted. Expressions and multiple declarations are ignored. The host needs the standard PHP tokenizer extension. Supply only dates of actual substantive reviews/updates or genuine publication, never upload, file, request or guide-preparation dates.
- Local checks: 54 PHP syntax checks; 24 date cases; XML parsing; exact 32-entry URL-table comparison; real page review-date and manual fallback fixtures; file timestamps changed to 2000 and 2030 without changing XML; a fixture offering additional published locales still produces English only. Actual Apache rewrite and HTTP headers need verification after upload.
- No factual page copy or LLM summaries changed in this follow-up. The separate removal ledger compares `9449a32` to `e7d79cc`, including broad LLM-summary omissions. Those additional editorial removals were not independently proven false and await owner review; nothing has been restored or additionally removed here.
- Status: local only, no GitHub push or Hostinger upload. Upload `sitemap.php` after the prior dependencies, purge relevant cache and inspect `/sitemap.xml`. Do not upload `.audit-work`, the ledger, test fixtures or README. No new runtime service, database, framework or build step.

### Endpoint-based chat frontend, 2026-09-15

**Latest narrow fix:** a successful automatic keyword fallback now suppresses the current question's 429 notice in both the visible thread and screen-reader status. The quota notice is deferred until fallback resolves, so it does not flash or get announced before an answer arrives. Disabled, missing, failed or empty fallback still shows the 429 message and contact link, never a retry. This revision changes only `assets/js/assistant.js`, `includes/head.php` (cache version), and this README; upload the two runtime files after the previous release. No CSS, backend, endpoint, secret, route or storage changes. The second requested adjustment was an unspecified placeholder and has not been inferred or implemented.

**Verification of this fix:** 63 mocked checks passed, including delayed successful fallback without transient quota/error announcements, disabled/missing/rejected/null/empty fallback, one primary request per submission, and no 429 retry. Desktop and phone screenshots confirmed a successful fallback reply and muted note without the quota notice. No live endpoint or AI provider requests were made. Temporary QA files were removed. Production remains `https://fawazbhseo.in/` and requires manual upload and live verification; `/api/chat.php` and optional `/llms-full.txt` remain the existing frontend request paths. History payload and page-memory storage are unchanged.


**Retry/fallback follow-up:** this adjustment changes only `assets/js/assistant.js`, `assets/css/site.css`, `includes/head.php` (cache version) and this README. If the preceding widget release is already uploaded, upload those three runtime files. `/api/chat.php`, private configuration, provider logic and secrets were not touched. The live site remains unchanged until you upload.

- No automatic endpoint retries. A real `Retry once` button appears only after the first timeout or HTTP 500-599 failure. One click permits one additional attempt for that logical question; another failure cannot offer another retry. Duplicate clicks and detached/stale retry controls cannot add attempts.
- HTTP 400-499 never receives a retry, including 408 and 429. A known 4xx stays non-retryable even if reading its body times out. Generic connection failures without a timeout, malformed successful responses and application errors in HTTP 2xx are also non-retryable.
- HTTP 429 shows: "The assistant is busy right now — please try again in a minute, or contact Fawaz directly", with a `/contact` link, only when automatic fallback is disabled or fails to produce an answer. A successful fallback displays only its answer and muted keyword-match note. The explicitly requested error wording is retained for the unrecovered case.
- Starting a new submission removes stale retry buttons from earlier errors. A separately typed new question is a new submission, not an automatic retry; the frontend does not implement server rate limiting.
- **209 follow-up checks passed** with mocked HTTP responses and fallback functions, including both boolean settings, multiple 4xx/5xx codes, timeouts, 4xx body timeouts, failed/missing fallback, retry limits, stale controls, and the exact second-message payload. The actual backend and provider were never called.
- Desktop (1280px) and phone (390px) screenshots confirmed the 429/contact state without retry controls and the successful fallback state with its muted note. The tests enabled fallback only in a temporary copy; the saved production flag is `false`. Temporary QA files were removed after testing.


**Current widget implementation:** the primary chat path is now the owner's same-origin `/api/chat.php` endpoint. This supersedes historical descriptions below of the widget searching `llms-full.txt` on every question. The proposed guided-question flow was not implemented; the owner's later free-text endpoint request replaced it.

**Access and scope:** files are edited in this project's Git working copy, not directly in Hostinger `public_html`. Upload the six runtime files listed below manually to the existing PHP host. No deployment, backend endpoint, provider SDK, API key, secret/config file or browser-to-provider request was created. Existing unrelated scripts and page structure were left intact.

**Files to upload together:**
1. `assets/js/assistant.js`: primary chat controller; editable `SUGGESTED_QUESTIONS` array at the top contains exactly four initial shortcuts.
2. `assets/js/assistant-fallback.js`: new local file preserving the original text matcher and exposing `window.fawazTextMatchingFallback(question)`.
3. `includes/ai-assistant.php`: widget markup, accessible conversation/status regions, 500-character input, send control and the required AI/confidentiality notice.
4. `includes/footer.php`: site-wide loading of the local fallback script followed by the primary chat script. Existing third-party scripts were not added to or required by this widget.
5. `assets/css/site.css`: widget-scoped disabled/hidden states, readable reply line breaks, focus/touch-target adjustments and dynamic viewport height support. Existing styling is retained.
6. `includes/head.php`: asset-version bump to `20260915-chat-fallback-notice`, so old cached widget assets are not reused.

`README.md` is also updated for documentation; it is not required on the public host. Do not overwrite your separately managed `/api/chat.php` or any private configuration when uploading these files.

#### Request and response contract

Both shortcut clicks and typed questions run through the same form submission handler and POST JSON to `/api/chat.php`:

```json
{
  "message": "What happens next?",
  "history": [
    {"role": "user", "content": "What happens in the free audit?"},
    {"role": "assistant", "content": "Please share your website and goals."}
  ]
}
```

The example above is the literal payload captured on the second message in a mocked test, whose first endpoint reply was `Please share your website and goals.` Actual values are the visitor's question and your endpoint's previous reply. History roles are exactly `user` and `assistant`, with a string `content` field. No `system`, `model`, provider-specific `parts`, or keys are sent by this widget.

- First request: `history: []`.
- Later requests: up to the last 12 messages (six successful user/assistant pairs), in chronological order, excluding the current `message`. Failed attempts, error notices, greeting and optional fallback extracts are not sent as model history.
- Successful response: HTTP 2xx with `{"reply":"...","error":null}`. The reply must be a non-empty string.
- Errors: non-2xx responses, a non-empty `error` value, a JSON error string, short plain-text errors, invalid response bodies, empty replies, network failure and timeout enter the error/contact path or optional local fallback. Retry availability is restricted by the policy above; an error does not automatically trigger another POST.
- Endpoint replies and error text are inserted with `textContent`, not executed or interpreted as HTML. Newlines are preserved. The backend should return user-safe errors; avoid returning diagnostics or private details.
- Timeout: 45 seconds. The send button and suggestions are disabled while busy; input is temporarily read-only. Typing animation plus a screen-reader status announce waiting. All paths restore the controls.
- An eligible failed message can be retried once without duplicating its user bubble. Every new submission retires older retry buttons. After the one allowed retry is consumed, another timeout/5xx offers contact but no further retry.
- Full conversation remains displayed and scrollable for the current page session. Closing/reopening the panel preserves it; reload/navigation resets it. No conversation is written to cookies, localStorage, sessionStorage or any additional analytics endpoint by this frontend.
- Backend history validation, server-side limits, rate limits, provider processing, grounding and data retention remain owner-managed and were not tested or altered here. A grounded system prompt does not establish an infallibility guarantee.

#### Optional legacy text-matching fallback

The old retrieval algorithm remains available, but does not fetch the corpus on page load or on normal endpoint requests. It is not enabled automatically after errors by default.

```javascript
const match = await window.fawazTextMatchingFallback('What is the email address?');
// match: { reply: '...', link: [url, label] | null, score: number }
// null means no match met the original threshold; loading errors reject.
```

The named function loads `/llms-full.txt` lazily with a ten-second timeout, preserves the original parser/scoring/sentence-selection/topic-context logic, and serialises concurrent calls. Its old DOM controller is retained as inactive reference code behind an unconditional return, so it never attaches duplicate widget handlers.

The single clearly commented switch at the top of `assets/js/assistant.js` is:

```javascript
const AUTO_FALLBACK = false;
```

- **`false` (default):** never automatically calls the matcher. Show the appropriate error with contact, plus the one manual retry only when eligible.
- **`true`:** after an endpoint error or timeout, call `window.fawazTextMatchingFallback(question)`. If a non-empty `reply` is returned, show it under the small muted prefix `Basic keyword match from site text, not an AI answer.` No further endpoint request or retry control is added after a successful fallback. For HTTP 429, successful fallback suppresses the separate busy notice and clears its screen-reader status. The notice is rendered only if fallback cannot provide an answer.
- If the function is absent, rejects, or returns no match, retain the normal error/contact path and the same restricted retry policy. A failed fallback does not broaden retry eligibility or reset the retry count.
- Fallback replies, error notices and failed exchanges are excluded from history sent to the backend. The named function remains callable directly whether the switch is on or off. It performs local site-text retrieval, not another AI API request.

#### Verification and remaining checks

- Initial widget release: **42 frontend checks passed, none failed**, using intercepted/mock `/api/chat.php` responses. The later 209-check run above verifies the tightened retry and automatic-fallback policy. Tests covered suggestions using the shared POST path, payload shape, empty/oversized input, busy/typing states, duplicate-submit prevention, recent-history limit, preserved thread, HTTP/JSON/plain-text/network/timeout errors, retry behaviour, safe text rendering, Escape/focus restoration, and explicit lazy fallback operation against the actual saved corpus.
- No request was made to the live chat endpoint or to an AI provider during these tests. Timeout tests accelerated the frontend's timer only in the temporary test fixture; production remains 45 seconds.
- Screenshots of the actual saved widget markup and shared CSS passed at desktop (1280px) and phone (390px) widths for the four-shortcut opening state. A phone screenshot also confirmed two displayed exchanges and the required privacy line without overlap or horizontal overflow.
- This is frontend/source-snapshot validation, not PHP execution, assistive-technology certification or verification of your server's actual response/grounding. The automatic fallback option remains off; its named function was tested explicitly.
- After upload, purge any Hostinger/CDN cache, verify the deployed versioned assets and perform a two-turn chat plus error-path test on `https://fawazbhseo.in/`. Confirm your endpoint accepts the exact `message`/`history` contract above. Actual live behaviour remains unverified until then.

**Entry URIs and storage:** widget launcher on all pages using `render_footer()`, `POST /api/chat.php` (owner-owned endpoint, no file added here), and optional `GET /llms-full.txt`. No new public content-page routes, table schemas or database/storage services were introduced. Runtime state is in page memory; server-side storage, if any, belongs to the owner's endpoint. Temporary QA files were removed after testing.


### Article-folder migration and second email, 2026-09-11

- Moved all three new article source files into `blogs/`, with parent-relative shared includes. Public article paths are `/blogs/seo-aeo-geo-differences`, `/blogs/measure-ai-search-visibility` and `/blogs/local-seo-checklist-karnataka`.
- Updated article canonicals, JSON-LD IDs and breadcrumbs, cross-links, homepage/blog/service links, sitemap paths and source filenames, and both llms summaries. `/blog` remains the archive. The saved Apache rules redirect `/blogs` to `/blog` and old root-level article paths (including .php/slash variants) to their new paths; a corresponding language-prefixed legacy rule is also present. These rules need verification on the actual Apache/PHP host.
- Added `admin@fawazbhseo.in` alongside `fawazbhseo@gmail.com` in the Contact-page readout, shared contact section, shared footer, 404-page contacts and relevant Person/ProfessionalService/ContactPoint structured data. Both addresses remain separate `mailto:` links; neither replaces the other. Public text summaries include both.
- Added email wrapping and LTR isolation for narrow/RTL contact areas. Current asset version is `20260911-blogs-email`.
- Latest source/snapshot run: **143 checks passed, none failed**, including PHP grammar for **40 files**, new path/canonical/include checks, source-backed links, redirect regex cases, both email links and JSON email arrays. This is not PHP execution, Apache testing or mailbox-delivery testing.
- Actual Contact markup with current shared CSS passed desktop (1280px) and phone (390px) snapshot checks: both email addresses were visible without clipping or overlap. The initial scrolled screenshot missed the email rows; the subsequent top/full-page captures are the relevant evidence. Temporary QA files were removed after verification.
- No mailbox, mail server, MX/SPF/DKIM/DMARC records, authentication or mail-sending endpoint was created. Configure and test the admin mailbox with the email provider separately. The enquiry form still hands off to WhatsApp.
- Production remains `https://fawazbhseo.in/` and is unchanged by these working-copy edits. Release the moved article files, updated shared templates/assets, sitemap, text summaries and `.htaccess` together to the existing PHP host. Remove obsolete root article files from the deployed copy as part of the move, keep private research out of deployment, and verify redirects, language routes and both mail links there.
- Storage remains Git-backed page/template files, CSS, text summaries and the static CSV worksheet. No new table models, databases, API endpoints or visitor-data storage. Further live performance/indexing checks and the wider optimisation backlog remain open.


### Search guides and discovery release, 2026-09-11

**Current status:** the first three-guide content batch, contextual links, shared readability improvements and selected wording corrections are saved. This is not a live deployment or a claim that the entire site is optimised. The owner's broader copy permission supersedes earlier notes that the Contact pilot must be approved before other content can change.

**New entry URIs** (extensionless, intended for the existing PHP host):
- `/blogs/seo-aeo-geo-differences`: comparison, example, prioritisation and four FAQs.
- `/blogs/measure-ai-search-visibility`: manual prompt-test method, outcome definitions, sample arithmetic, limitations and four FAQs.
- `/blogs/local-seo-checklist-karnataka`: business profiles, useful local pages, languages, reviews, enquiries and four FAQs.
- `/assets/downloads/ai-visibility-log.csv`: ungated, header-only, 22-field tracking worksheet. No email collection, formulas, measured results or AI automation.

All three guides have unique metadata, canonical URLs, BlogPosting/BreadcrumbList JSON-LD, visible AI-assistance disclosures, sources and clearly labelled illustrative examples. Their preparation dates are not represented as verified live publication dates. No new client results, credentials, reviews, offices or press endorsements were invented.

**Discovery and existing content:** populated `/blog`; added homepage guide cards and contextual links on Services, AEO, GEO, Karnataka and AI SEO India pages; added the three guides to the sitemap source (32 distinct English source-page entries); updated `llms.txt` and `llms-full.txt`. These text summaries are not guaranteed ranking mechanisms. Services scope wording was corrected around third-party inclusion, schema eligibility and artificial chunking. AI SEO India's false blanket human-only authorship claim was corrected. Existing prices, major pages and main features were retained.

**Frontend:** shared editorial guide styles, native FAQ controls and scrollable comparison table; existing typography and warm color system retained. Fourteen remaining shared muted-text color declarations now use the existing secondary text color. Dark guide reading links use the existing brighter accent-hover shade after the initial contrast check failed. Current `FBH_ASSET_VER`: `20260911-blogs-email`. No new production JavaScript or backend feature was added.

**Validation:** `php-parser` accepted 37 source files; this is a browser-based PHP grammar check, not execution with PHP. The guide run passed 126 source/interaction/selected-contrast checks; the blog run passed 121 checks. The new guides' canonical/schema identities, H1/IDs, 12 FAQ controls, internal links, discovery references and CSV structure were checked. Guide navigation link contrast is 5.24:1 light and 5.20:1 dark after correction. Source snapshots showed clean comparison and Karnataka-guide heroes at desktop/phone widths, dark measurement-guide desktop hero and phone body, and the desktop blog archive. Further visual and live-host checks are tracked in the release report. No PageSpeed improvement, actual indexing, AI citation or referral uplift is claimed.

**Public URLs and storage:** production remains `https://fawazbhseo.in/`; new public paths above will work only after release to that PHP-capable host. Existing service, contact and locale paths and `/robots.txt` remain unchanged. No new route parameters or API endpoints. Content is stored in Git-backed PHP templates, CSS and text files; the worksheet is a static CSV. There are no new tables, databases, uploads, credentials or visitor records.

**Not yet completed / next steps:** execute and lint the actual PHP, verify live HTTP/redirect/canonical/robots/CSV behaviour and sitemap XML, rerun cold-load desktop/mobile PageSpeed, continue the specialist-page evidence audit, and measure Search Console and AI results after release. Full site-wide copy revision, native-language editorial review, external outreach and additional service landing pages remain unfinished. Permission to edit does not supply missing evidence or make third-party results controllable.

Release details, evidence, checks and deployment exclusions: `research/optimization-release-2026-09-11.md`. Upload the intended source and shared assets together to the existing PHP host; exclude private research, raw audits and QA files. A static Hosted Deploy cannot execute this site's PHP templates. No deployment was performed.


### Targeted font-loading and contrast changes, 2026-09-10

- Activated the approved `fawazbhseo-redesign` skill. Page copy, layout structure, translation behavior and backend logic are unchanged.
- Self-hosted Big Shoulders Display 700 as three WOFF2 subsets under `assets/fonts/`, with the SIL OFL license and source notes. Shared CSS declares `font-display: optional`; the shared head preloads the 14,424-byte Latin subset. Removed the duplicate Google request for this face. Extended Latin and Vietnamese subsets load only when needed.
- Tradeoff: on a slow first visit, optional display can retain the existing fallback for that navigation instead of swapping late. This mitigates headline font-swap reflow without hiding content, reserving arbitrary heights or forcing line breaks. Newsreader, Inter and locale-specific font loading are unchanged and can still contribute shifts.
- Changed only `.hero__figure figcaption`, `.footer-h` and `.site-footer__bottom p` from `--text-muted` to the design system's existing `--text-2`. No new colors or global token changes. Other muted text is outside this targeted pass.
- Bumped `FBH_ASSET_VER` to `20260910-font-contrast` in the shared head.
- Browser checks on a temporary downloaded production homepage snapshot using the updated repo assets: display face loaded, no desktop horizontal overflow, preload present, duplicate Google headline request removed, and clean final console. Light-mode hero screenshots passed at desktop (1280px) and phone (390px); dark-mode phone footer rendering also passed. These are snapshot checks, not PHP execution or live-site verification.
- Computed contrast ratios for the caption: **8.77:1 light / 8.57:1 dark**. Footer headings and copyright: **7.69:1 light / 8.32:1 dark**. All six targeted combinations exceed 4.5:1.
- Test-environment notes: root-relative paths and cache query strings initially failed in the preview proxy. Temporary snapshot paths were normalized for that proxy only; production URL conventions were not changed. Browser service saturation prevented the additional dark-desktop footer capture; that visual check remains pending. Successful checks supersede the initial unstyled snapshot, not the live site. Temporary QA HTML/JS files were removed after testing.
- Remaining work: live cold-cache desktop/mobile CLS and LCP tests, slow-network/fallback and non-Latin checks, a full accessibility audit, and approval before any site-wide copy rollout. One snapshot load still recorded a small shift affecting the button row/portrait; no zero-CLS claim, before/after benchmark or improved PageSpeed score is made.
- Functional entry URIs and public URLs remain `https://fawazbhseo.in/`, `/contact`, existing service and locale routes, `/robots.txt`, `/sitemap.xml`. Added static resources at `/assets/fonts/*.woff2`; no new application routes, parameters or API endpoints. Storage is Git-backed PHP/HTML templates, CSS and font binaries, with no tables, databases or visitor data added.
- Release next steps: deploy the changed shared CSS, head template and complete font directory together to the existing PHP-capable host; check asset MIME types/preload reuse and caching, then rerun live PageSpeed. No deployment was performed, and static Hosted Deploy cannot execute this site's PHP templates.


### Search Console export review, 2026-09-10

- Completed a source review of the seven supplied CSV exports. Findings and prioritised actions: `research/search-console-review-2026-09-10.md`.
- Device totals: 47 clicks, 851 impressions, calculated CTR 5.52%. Chart rows cover July 8 through September 8, 2026, despite the filter label Last 6 months. India contributes 46 clicks.
- Priorities: existing Karnataka, GEO, AI SEO India, India SEO and AEO pages. Query and page exports are independent aggregates, not a measured query-to-page mapping. Slash variants warrant live inspection, not an automatic duplicate-content diagnosis.
- Confirmed the saved robots policy still allows locale paths so crawlers can read noindex. Do not restore the superseded language blocks described in historical notes.
- Follow-up: design-skill use is approved and targeted font/contrast changes are saved (see above). Independent PageSpeed audit extraction, measured live CLS diagnosis and actual PHP-host checks remain pending. No improved PageSpeed score is claimed. The Contact pilot still needs approval before site-wide copy rollout.
- Functional routes and public URLs are unchanged: production `https://fawazbhseo.in/`, `/contact`, existing service routes, `/robots.txt` and `/sitemap.xml`. No new route parameters or API endpoints.
- Storage: existing Git-backed `_audit/` CSV/TXT inputs and a Markdown research report. No database, table model, authentication or runtime integration added. Keep raw audit/research files out of public deployment; robots.txt is not access control.
- Next: validate the saved frontend changes on the actual PHP host at desktop/mobile widths and rerun live PageSpeed. No deployment performed.

### Search research and crawl correction, 2026-09-10

**Current status:** the initial research pack and a robots.txt correction are saved. New service pages, a site-wide content rollout, native-language review and live deployment are not completed. No #1 ranking, AI recommendation, indexing outcome or PageSpeed score is guaranteed.

Research entry points:
- `research/README.md`: method, evidence limits, findings and validation results.
- `research/keyword-map.csv`: 50 observed/candidate keyword entries, prioritised by service fit rather than invented volume.
- `research/page-map.csv`: one primary intent for each of the 29 content URLs in the retrieved live sitemap.
- `research/questions-and-answer-briefs.md`: 30 buyer questions across six disciplines, with observations separated from editorial candidates. This is not a verified People Also Ask export.
- `research/ai-prompt-test-set.csv`: 30 synthetic, unbranded evaluation prompts, not actual user query logs or measured AI recommendations.
- `research/ai-observation-template.csv`: empty results template for manual testing.
- `research/implementation-plan.md`: confirmed findings, staged changes and three proposed service-page briefs. The proposed URLs `/performance-marketing`, `/social-media-marketing` and `/digital-marketing-consultant` do not exist yet.
- `research/sources/manifest.md` and raw autocomplete JSON: 14 public Google autocomplete requests with English/India parameters and traceable source IDs. Search volumes, difficulty, CPC and actual rankings remain unknown.

**Correction to previous crawl/indexing advice:** locale paths are no longer blocked in the repo robots.txt. Crawlers must be able to fetch a page to read its noindex directive. The old language blocks prevented that. The earlier assertion that possible locale URLs consumed the site's entire crawl allowance was not established by logs or Search Console data. Nofollow is a hint, not guaranteed crawl prevention. Google can render some JavaScript; runtime content is not categorically impossible to index, and machine translation is not automatically spam. Full translated-page quality still needs review before promotion, not just review of interface strings. These corrections supersede categorical historical statements below.

The corrected robots file keeps a single wildcard group and five internal-path exclusions. This also avoids named crawler groups bypassing the wildcard exclusions. Public English pages, language routes and rendering assets remain crawlable. Existing noindex directives on incomplete translations and the English-only sitemap were not changed. The live robots snapshot in `research/sources/live-robots.txt` is historical evidence, not the corrected file to publish.

**Validation:** 19 checks passed against actual saved files: CSV structure and counts, unique IDs, exact source matches for observed keywords, complete mapping of the 29 sitemap paths, synthetic prompt labelling, empty observation results, and the saved robots rules. The temporary HTML/JS validator was deleted. No PHP execution, new page rendering or live indexing outcome was tested. There were no site layout changes in this pass.

**Public URLs and storage:** production remains `https://fawazbhseo.in/`; crawl files are `/robots.txt` and `/sitemap.xml`. Research is stored as Git-backed Markdown, CSV and JSON files, with historical TXT/XML snapshots. No table schemas, databases, protected APIs, credentials or visitor tracking were introduced. Autocomplete requests were research-time downloads, not an integration added to visitor pages.

**Next steps:** upload only the intended site changes to the actual PHP host, re-fetch live robots.txt, inspect affected URLs in Search Console, then implement and test the service/content briefs page by page. Obtain the PageSpeed report's actual failing audit before claiming an agentic-browsing fix. Confirm rates, credentials and permissioned case-study evidence before reusing them in stronger commercial copy.


### Contact page plain-language pilot (Option A)

The user approved a one-page copy rewrite as an exception to the original preserve-copy rule. This pilot changes only `contact.php`, not the other pages or shared templates.

- Updated the introduction, four process steps, form introduction, five FAQ answers and meta description.
- Replaced phrases such as "triaging enquiries", "nurture campaign" and "discovery audit" with everyday language. Kept Fawaz BH's first-person voice and explained the work in practical terms.
- Preserved contact details, location, existing response-time wording, free-audit offer, document ownership and written agreement before paid work. No new results or guarantees were added.
- Clarified that the form prepares a WhatsApp message rather than sending it automatically. Removed the misleading claim that no third-party tool is involved: WhatsApp is a separate service.
- Entry URI: `/contact` on `https://fawazbhseo.in`, backed by `contact.php`; existing language-prefixed routes and `#what-happens`, `#contact`, `#faq` anchors are unchanged. No new parameters or APIs.
- Data and storage: unchanged. The existing browser script constructs a `https://wa.me/919481084038?text=...` URL. No database or server-side form submission was added.
- Checks: reviewed the edited source, confirmed contact actions and canonical are unchanged, checked the WhatsApp handler against the FAQ wording, and found no em or en dash characters in `contact.php`.
- Verification limit: the browser tool refused `contact.php` because it supports HTML files only. No PHP execution or desktop/mobile rendering of this revision has been verified. Do not treat source review as a passing browser test.
- Not yet implemented: rollout of this tone to other pages, translated-copy editorial review, or deployment of this pilot. The PageSpeed "agentic browsing" failing item still needs the actual report; this copy change does not establish a score improvement or guarantee indexing.
- Next steps: review this sample wording, upload it to the existing PHP-capable host, inspect the actual Contact page at desktop and phone widths, then approve or adjust the tone before continuing page by page.


### Shared includes (`includes/`)
All five are function-wrapped and guarded with `function_exists`, so they are safe to require more than once.

| File | Function | Purpose |
|---|---|---|
| `head.php` | `render_head(array $meta)` | DOCTYPE, `<html lang>` set from the active locale, meta, Open Graph, Twitter, geo tags, hreflang set, per-locale Indic font, stylesheet, pre-paint theme script, optional JSON-LD, skip link, language offer bar. Keys: `title`, `description`, `canonical`, `robots`, `schema`, `geo_region`, `geo_placename`, `geo_position`, `og_type`. |
| `header.php` | `render_header($active_page)`, `fbh_nav_items()`, `fbh_logo($label)` | Sticky header, inline FS logo SVG, nav with `aria-current`, light/dark toggle, free-audit button, mobile drawer. |
| `contact-form.php` | `render_contact_form(array $opts)` | Contact block and enquiry form. Keys: `heading`, `lede`, `id`. **Both `heading` and `lede` are run through `htmlspecialchars()`, so pass plain text, never HTML entities.** |
| `floating-button.php` | `render_floating_button($message)` | Mobile-only floating WhatsApp button with a prefilled message. |
| `footer.php` | `render_footer()` | Footer, the site-wide AI assistant, GSAP + ScrollTrigger CDN scripts, `site.js`, `assistant.js`, closing tags. **This is the single wiring point for the assistant**, so no page needs to include it individually. |
| `ai-assistant.php` | `render_ai_assistant()` | Floating answer assistant: launcher button plus a dialog panel with a scope note, a log region, suggestion chips, an input form and WhatsApp/phone fallback links. |
| `location-page.php` | `render_location_page(array $loc)`, `fbh_location_schema(array $loc)` | Shared renderer driving every city page from one data array. Ten sections plus a full JSON-LD graph. The `$loc` contract is documented in the file header. |
| `i18n.php` | `fbh_lang()`, `fbh_locale()`, `t($key)`, `fbh_available_locales()`, `fbh_indexable_locales()`, `fbh_link()`, `fbh_locale_url()`, `fbh_render_hreflang()`, `fbh_render_lang_switcher()`, `fbh_render_translation_notice()`, `fbh_render_lang_offer()`, `fbh_current_path()` | The multilingual layer. Detects the active language, merges its strings over English, builds localised URLs, and renders hreflang, the header switcher, the provenance notice and the offer bar. Contains **no language list**. |
| `locale-registry.php` | `fbh_locale_registry()`, `fbh_script_font()` | Catalogue of ~110 languages: native name, English name, hreflang tag, script and text direction. Answers only "if a translation existed, how would we render it?" Says nothing about whether one exists. |

### Multilingual (open ended, English authoritative)

**The site is available in any language, and the whole page is translated, not just the navigation.** Pick any language in the switcher and the entire document arrives in it: headings, body copy, cards, FAQs, form labels, the footer. There is no fixed list and no ceiling.

An earlier version of this system restricted the locales to the six languages Fawaz personally speaks. That was wrong, and the error is worth naming because it is easy to repeat: it conflated **what language a visitor can read the site in** with **what languages Fawaz delivers consulting in**. Those are separate facts. A German speaker reading the site in German is not a claim that anyone here speaks German. Honesty is satisfied by *labelling translations accurately*, not by refusing to have them.

#### The three things kept deliberately apart

| Concern | Where it lives | Rule |
|---|---|---|
| **Can we render this language?** | `includes/locale-registry.php` | ~110 languages catalogued with script and direction. A row is all a language needs to be offered. |
| **Is the interface pre-translated?** | `locales/<code>.php` | Optional now, not required. Where a file exists the interface comes from it and is fenced off from the runtime engine. |
| **What does Fawaz actually speak?** | `fbh_service_languages()` | English, Kannada, Malayalam, Hindi, Tamil, Telugu. A fact about the consultant. **Never grow this to match the locale count.** |

#### Adding a language is one step

Add a row to `locale-registry.php`. That is it. The language appears in the switcher and the whole site is readable in it immediately, because `assets/js/translate.js` translates the document at runtime.

Optionally, copy `locales/_template.php` to `locales/<code>.php` to hand-translate the interface strings. That upgrades the language: the nav, buttons and notices come out of the file instead of the engine, and once reviewed and published the locale becomes indexable. No edit to `i18n.php`, `head.php`, `.htaccess`, `sitemap.php` or the CSS is needed for either step.

#### Three tiers, all fully readable

| Tier | Interface from | Body copy from | Indexable |
|---|---|---|---|
| File, reviewed or human, published | `locales/<code>.php` | Runtime engine | **Yes** |
| File, machine | `locales/<code>.php` | Runtime engine | No |
| No file | Runtime engine | Runtime engine | No |

The only registry rows not offered are those with no machine translation available at all, currently Tulu and Tibetan (`fbh_mt_code()` returns `null`). Listing those would put a language in the menu that quietly serves English, which is worse than not listing it.

#### Availability and indexability are separate

- **Availability.** Every language in the registry is fully readable by anyone who selects it. Always.
- **Indexability.** Requires all four: **a locale file** **and** `published` **and** provenance past `machine` **and** coverage ≥ 90% (`FBH_MIN_COVERAGE`). A runtime-translated page has no translated HTML to serve a crawler, so it can never be a search result. This is what keeps ~100 machine-translated pages out of the index and the sitemap.

#### Provenance has three states, declared per file

| State | Served? | Indexed? | On-page notice |
|---|---|---|---|
| `machine` | Yes | **Never** | Full warning + "AI" badge in the menu |
| `reviewed` | Yes | Yes, if published and complete | Short note |
| `human` | Yes | Yes, if published and complete | None |

**Why machine drafts are not indexed:** not modesty, mechanics. Google's spam policy targets *scaled content abuse*, meaning pages generated in bulk mainly to rank. Pushing a hundred unread machine translations into the index is exactly that pattern, on a site that only just finished digging its location pages out of "discovered, currently not indexed". Review is a **promotion gate for indexing, never a gate on existence**.

#### Currently shipping

**103 languages readable**, the whole registry minus Tulu and Tibetan. Ten of them (Kannada, Hindi, Malayalam, Tamil, Telugu, German, French, Spanish, Arabic, Simplified Chinese) also have hand-written interface files, all `machine` and unpublished. **Only English is indexable today**, so the sitemap and hreflang output are byte-for-byte unchanged, which is what is wanted while reindexing settles.

#### Implementation notes

**URLs.** English stays at the root (`/seo-services`) because those URLs are already indexed and ranking. Others take a prefix (`/kn/seo-services`). `/en/...` 301s back to the clean path. One set of PHP files renders every language.

**Canonicals.** A non-indexable locale self-canonicals rather than pointing at English. Pointing it at English would contradict the `noindex` and invite Google to merge the two. Self-canonical plus `noindex` is unambiguous.

**Scope: the full page.** `assets/js/translate.js` walks the rendered DOM and replaces text in place, so layout, fonts, hard-edge shadows and dark mode all survive untouched. Every such page is `noindex` and carries the machine-translation notice, so nothing here is presented as Fawaz's own writing in a language he cannot read.

**Why a browser-side engine and not a translation API.** An API needs a key, and a key cannot live in a static front end without being handed to anyone who opens the page source. On a PHP site with no translation backend this is the only route to full-page translation that does not publish a credential. The honest tradeoffs, written down so nobody has to rediscover them:

- It is a third-party dependency. If the script is retired, translation stops. The site does not break: body copy falls back to English, and on the ten locales with a file the interface is still translated from that file. Degradation, not failure. **Verified by test**, not assumed.
- Page text is sent to Google to be translated. Nothing on this site is private, so that is acceptable here. It would not be behind a login.
- The output is machine translation, which is exactly what the notice says.

**Protected terms.** `translate="no"` plus `class="notranslate"` on: the wordmark, "Fawaz BH", "FawazBHSEO", `SEO`/`AEO`/`GEO`, ILMERA, the phone number, the email address, the footer specialism anchors, language names in the switcher, and on a locale that has a file, every interface string the server already translated. That last one matters most: sending Kannada through an English-to-Kannada pass is how good copy becomes nonsense, so the server's own work is fenced off rather than translated twice.

**English pays nothing.** `translate.js` reads `<html data-mt>` and returns immediately on `en`: no cookie, no mount, no third-party request. Verified by test.

**Region detection offers, never redirects.** Reasons in `assets/js/i18n.js`: Googlebot crawls mostly from the US, so redirecting by region can hide pages from it or serve it something different from a human (cloaking); many people in Karnataka, Kerala and Tamil Nadu prefer English; and a first-paint redirect is a CWV regression. **No IP geolocation** either. The offer bar also flags when what it is offering is a machine translation.

**No language list in the JavaScript.** `i18n.js` reads the available set from `#langOffer[data-locales]`; `translate.js` reads its target from `<html data-mt>`. The old version hardcoded six locales and had to be kept in sync with the PHP by hand.

**The offer payload is compact, and it had to become so.** That JSON used to describe ten locales and now describes a hundred, inside an HTML attribute where every quote costs six characters as `&quot;`. Left as it was it would have added roughly 20 KB to every page. Two cuts: `native` and `english` are gone because the script never read them, and the offer copy is sent only where a locale file actually translated it, so ~95 languages no longer each carry an identical copy of the same English sentence. `i18n.js` refills the defaults from `data-text`, `data-switch` and `data-dismiss` on the element. One copy instead of ninety.

**The switcher scales, and now has to.** Past eight languages a search field appears and filters on native name, English name and code together, so a Greek speaker finds their language by typing `ell`, `greek` or `el`. Enter picks the first match. The list scrolls at `min(46vh, 340px)`. Without JavaScript the field stays hidden and the full list is still there, because the items are plain crawlable links. Measured at the real 103-language size: height bounded, scrolls internally, not clipped at either edge on a 390px phone.

**A code-shaped path that is not a language is a 404.** The Apache rule cannot read the registry, so it accepts any short prefix and leaves the judgement to `fbh_guard_lang_prefix()`. Without it, `/xx/about` would quietly serve the English about page at a second URL, which is duplicate content generated by a typo. Real pages whose names are code-shaped are excluded first, and the guard latches so it cannot recurse inside its own 404 page. It checks **availability, not registry membership**: `/tcy` 404s because Tulu has a row but no machine translation, so the switcher never offers it.

#### The 404 regression, and the assumption that caused it

**Symptom:** most languages returned 404. Only the ten with a locale file worked.

**Cause, and it was mine.** `.htaccess` section 2e2 gated its language rewrite on `RewriteCond %{DOCUMENT_ROOT}/locales/$1.php -f`. That was correct when a locale file was what made a language readable. Full-page translation removed that requirement in PHP but I left the routing untouched, so the ~93 languages without a file matched no language rule, fell through to the extensionless rule in 2f, found no `/ja.php` on disk and 404'd. **The switcher offered them and the server refused them.**

**Fix.** The filesystem test is gone. Routing accepts any code-shaped prefix; PHP decides what is real from `fbh_available_locales()`, which is the same function the switcher renders from, so the two cannot disagree again. Apache cannot read the registry and should not be made to guess at it.

**The real lesson, recorded because it is the reusable part:** a locale file is no longer what makes a language exist, a registry row is. Three file headers still said otherwise (`i18n.php`, `locale-registry.php`, `_template.php`) and have been corrected, because a stale comment asserting the old model is exactly what would cause someone to reintroduce this. **Do not put a locale-file test back into routing.**

**Verified by simulation, 68/68.** Apache does not run in the authoring environment, so the rule sequence in 2e2 and 2f was simulated in order against the repo's real file list: every offered language without a file routes at both root and deep paths, the ten with files still work, `zh-Hans` / `pt-BR` / `de-CH` and three-letter codes work, `/en/...` still 301s, bogus codes and unoffered registry rows 404, real pages are never mistaken for prefixes, and missing pages still 404 in every language.

**Typography is keyed on script, not language**, so twenty Devanagari languages share one CSS rule. **CJK deliberately loads no webfont** (multi-megabyte files would undo the PageSpeed work); platform stacks are used instead.

**RTL** is driven by `dir` on `<html>` from the registry. Section 19e fixes the places written with physical left/right values, including flipping the offset shadow, since a shadow pointing the wrong way makes an RTL page look subtly wrong without it being obvious why.

**One anchor-text exception:** the footer "Specialisms" links stay in English in every locale. "SEO expert in India" and the rest are the exact queries those pages target, so they are ranking signals rather than interface labels. The path is localised; the words are not.

#### Verified by test and screenshot

PHP does not execute in the authoring environment, so the translated states were reproduced exactly as a browser sees them: the real stylesheet, the `<font>` wrappers the engine injects with inline colour, the `.translated-ltr` / `.translated-rtl` class it sets, and the grey banner it tries to insert above the header.

- **Translated page, desktop and phone:** no Google banner, no top gap, wheat background with umber text, no white highlight boxes, headings condensed uppercase, body italic serif, hard-edge shadows intact, long German compounds wrapping rather than overflowing.
- **Arabic RTL, desktop and phone:** layout mirrored, shadows flipped, nothing clipped, real Arabic glyphs not tofu.
- **Engine logic, 9/9:** cookie set to `/en/<target>`, mount created and measurable, init callback exposed, remote script requested at idle, and critically **the failure path**: with the remote script unreachable the transition class still clears and body copy stays readable.
- **English untouched, 6/6:** no cookie, no mount, no classes, no callback, **zero third-party requests**.
- **Offer bar with the compact payload, 11/11:** defaults refilled correctly, German offered from its own locale-file copy, AI badge present, no redirect.
- **Switcher at the real 103-language size, 15/15:** height bounded, scrolls internally, not clipped at either edge, `ger` → exactly `de` and `de-CH`, native `ಕನ್ನಡ` → Kannada, `zh` → both Chinese variants, `zzzz` → 0 with the empty message, cleared → all 103.

**Four real bugs caught this way rather than by reasoning:**
1. The old heading rule was `html:not([lang^="en"])`, which stripped the Big Shoulders display face from **German, French and Spanish** headings even though it renders Latin perfectly well. Now keyed on the non-Latin scripts that genuinely need it.
2. The logo `href` was hardcoded to `/`, which threw a visitor reading in Arabic back to the English homepage on the most obvious thing to click. Now goes through `fbh_link()`.
3. **The phone number was being corrupted on every RTL page.** `unicode-bidi: isolate` stopped a protected run disturbing the Arabic around it, but the run still inherited `direction: rtl`, so `+91 94810 84038` rendered as `84038 94810 91+`: every group reversed and the plus stranded on the wrong end. Section 19f now sets `direction: ltr` on protected runs in RTL context, excluding the language-menu label, whose whole job is to show each language in its own script. This was invisible to reasoning and obvious on screen.
4. The engine's `<font>` wrappers carry inline `color` and `background-color`, which beat the palette and dropped warm-neutral text onto white highlight boxes. Forced back to `inherit`.

### The location page architecture

Every city page is a thin data file that builds one `$loc` array and calls `render_location_page($loc)`. There is no duplicated markup: a design change to the city pages is a one-file edit in `includes/location-page.php` rather than a sweep across every city.

**On thin content, deliberately.** Google treats near-duplicate location pages as doorway pages, and mass-produced city pages are the standard way sites get that whole set discounted. So the shared parts of a city page are only the chrome, the four-stage process and the credentials, which are legitimately identical because they describe one consultant's actual working method. Every `$loc` must carry genuinely city-specific `intro`, `market`, `sectors` and `faqs`. Each page currently written has its own real market analysis, its own sector list, its own FAQ set, real coordinates and an honest note on travel distance from Kushal Nagar.

Useful `$loc` keys beyond the required ones: `readout` (hero definition list), `places` (areas covered, rendered as tags), `distance` (the working-arrangement card), `parent` and `siblings` (cross-links), `geo_*` and `latitude`/`longitude`, and `local_seo`. Setting `local_seo => false` swaps service card 01 from "Local SEO and Google Business Profile" to "Technical SEO and site architecture", which is what the Asia and Europe pages will need, since local pack work is not honestly deliverable remotely.

### The floating AI assistant

A floating assistant appears on every page. It is wired once inside `render_footer()`, and all 15 page entry points were confirmed by grep to call `render_footer()`, so coverage is complete without touching each page.

**It is a retrieval engine over `llms-full.txt`, not a generative chatbot, and that boundary is a hosting constraint rather than a design preference.** A static site cannot call an LLM API without shipping a secret key in client-side JavaScript, and a key in client JS is a key given away. There is no server here to hold one. Separately, a generative chatbot on a consultancy site can invent a price, a timeline or a client result, and this site's whole standard is that only verified figures get published.

So it is extractive: every sentence a visitor sees was written by Fawaz. What it is *not* any more is a canned FAQ picker. The previous version had 20 hardcoded question entries and could only answer what was anticipated. The current version:

- **Fetches `/llms-full.txt` at runtime** (on first panel open, so it costs nothing on page load) and parses the whole document into passages, carrying each passage's heading trail and list label.
- Builds an **IDF-weighted index** over those passages, so rare words count for more than common ones.
- Scores questions as **concepts, not tokens**. Each concept is a group of acceptable surface forms, so matching any one form satisfies it once. This matters: an earlier attempt simply appended synonyms to the query, which made results *worse*, because every added synonym also grew the scoring denominator and penalised passages for not containing all of them.
- Uses a **synonym map** for the gap between how people ask and how Fawaz wrote. A visitor types "how much does it cost"; the pricing section says "starting rates" and never uses the word "cost".
- **Condenses** the winning passage to the sentences that actually answer the question, so a reply is an answer rather than a pasted wall.
- Has a **numeric-answer guarantee**: if the question asks what something costs and the best passage holds no figure, it promotes the passage in the same section that does.
- Handles **follow-ups** ("and for social media") by borrowing the previous topic, but only after a query fails unaided, only when the phrasing actually looks like a continuation, and only if a word the visitor really typed appears in the result. Without those three guards, "what is your favourite colour" inherited the prior question and confidently answered with a price.
- Keeps a **0.30 confidence threshold**. Below it the assistant says it does not know and offers WhatsApp rather than guessing.
- Strips em and en dashes from every string on the way out, so nothing with an em dash can reach a visitor even if the source file regains one.
- Builds replies from **DOM nodes, never HTML strings**, so visitor text is never interpolated into markup.

**Maintenance changed:** there is no answer list in the JS to keep in sync any more. Update `llms-full.txt` and the assistant updates with it.

#### Typed output, not pasted answers

Replies stream in a few characters per animation frame with a blinking caret, instead of appearing as a finished block. Details that matter if you touch it:

- The answer is **fully resolved before the first character appears**, so streaming is presentation only and nothing can half fail midway through a reply.
- It types **a small chunk per animation frame, not one character per timer**. One timer per character is hundreds of timers and hundreds of layout passes per reply, for an identical result.
- **Accessibility:** the log is `aria-live="polite"`, so streaming raw text nodes into it would make a screen reader announce fragments continuously. The bubble is therefore built with `aria-hidden="true"` while typing and the attribute is removed once, at the end, so assistive tech receives one clean announcement.
- `prefers-reduced-motion: reduce` **skips the animation entirely** and appends the whole reply at once, via the original `addReply()`.
- Speed is `CPS = 62` characters per second in `assistant.js`, tuned to just outpace comfortable reading. Paragraphs are separated by a 180ms beat so a multi-part answer reads as separate thoughts.

#### The assistant has its own design system

The panel deliberately **does not** use the site's design tokens. The site is flat cream paper, hard 1.5px edges, zero-blur offset shadows and an italic serif body face. The panel is the opposite on purpose: a dark instrument panel (`--a-bg: #17161F`), 16px radii, violet accent (`--a-accent: #7C7BF5`), Inter throughout, and a genuine soft drop shadow. A visitor should be able to tell at a glance that this is a tool talking to them and not another block of the website.

Those `--a-*` variables are **scoped to `.assistant-panel`** so they cannot leak into the site. Do not replace them with `--surface`, `--text` or `--accent`: doing exactly that is what made the panel look like a site card before. This is the same documented exemption the launcher already had, now extended to the panel. It is the **one** place in the codebase where blurred shadows are allowed, because a floating tool needs real elevation to read as an overlay.

Panel furniture: a violet gradient bot avatar and a green live dot in the header, asymmetric chat radii (the corner nearest the speaker is squared), pill suggestion chips, a circular gradient send button echoing the launcher, and a slim custom scrollbar.

**The launcher** is a 60px circle, bottom **left**, dark with an inline-SVG bot face, a breathing float (`fbh-float`, `translateY(-5px)`, 3.6s), blinking eyes and one expanding pulse ring. `prefers-reduced-motion` kills all three animations. It sits on the left specifically so it never competes with the WhatsApp fab on the right.

**Verified:** a 17-case retrieval harness driving the real form with real questions. It found and fixed four genuine bugs that reasoning alone had missed: list labels like "Social Media Marketing:" were parsed as passages and dropped, so social-media pricing was unreachable; synonym expansion was inflating the denominator; the follow-up merge was firing before scoring and sabotaging short complete questions like "do you speak Tamil"; and a heading match scored 0.95, nearly as strong as a body match, which made every section's framing sentence outrank the section's own content.

The panel's redesign and the typewriter were verified the same way: a harness proved that 300ms into a reply only `"Monthly SEO retaine"` had rendered with a caret present, and that the caret was removed on completion. That is the difference between streaming and pasting, and it is measurable rather than assumed. The retrieval suite was then re-run against the real `assistant.js`, because making replies asynchronous was a genuine integration risk.

**Non-bug, measured, do not chase:** a screenshot of a scrolled panel can look like the grey scope banner overlaps the first message. It does not. The banner and log abut exactly (`scope.bottom == log.top`) and the banner's text fits its own box; what looks like a collision is a message clipped mid-line at the log's scroll edge, which is correct for any scrolling log. There is a comment in `site.css` saying so.

### Pages (20 total)

| Page | Status |
|---|---|
| `index.php` | Done. Seven sections in the required order: hero, trust strip, six service cards, four process steps, Green Coorg Spices case study, about/credibility, CTA/contact. |
| `seo-services.php` | Done. All services with the real published rate card (see section 6). |
| `about.php` | Done. |
| `case-studies.php` | Done. Verified figures only, unverified marked pending. |
| `cities-we-serve.php` | Done, with two blocks flagged (see section 6). Tier order: Kodagu towns, Karnataka, South India, India, Asia, Europe. Switzerland noted. |
| `blog.php` | Structure only, as requested. Renders an honest empty state. Add entries to the `$posts` array to activate the grid. |
| `contact.php` | Done. |
| `aeo-consultant.php` | Done. 13 sections, answer pipeline, evidence stats, 8 FAQ. |
| `geo-consultant.php` | Done. 13 sections, five-engine grounding table, 9 evidence cards, 8 FAQ. |
| `seo-consultant-kodagu.php` | Done. 8 services, 4 town markets, Green Coorg Spices quote, 8 FAQ. |
| `seo-consultant-karnataka.php` | Done. 4 markets, 6 buyer criteria, 4 client cards, 8 FAQ. |
| `seo-consultant-india.php` | Done. 5 surfaces, 4 delivery tiers, 6 criteria, six 2026 shifts, 8 FAQ. |
| `404.php` | Done. Full site index plus direct contact routes. |

### Location pages (16)

Ordered by the stated geographic priority: Kodagu, then Karnataka, then South India, then India, then Asia, then Europe. All 16 are listed in `sitemap.xml` and `llms.txt`, and all are linked from `cities-we-serve.php` plus the relevant hub page, so none are orphaned.

| Page | Market focus |
|---|---|
| `seo-services-madikeri.php` | Kodagu, 35 km. The most contested local pack in the district, aggregator competition, OTA commission at 15 to 25 percent, severe seasonality, three query language forms. |
| `seo-services-kushalnagar.php` | Home base. Pre-arrival traveller demand on the NH275 route, Nisargadhama and Bylakuppe queries, spice and coffee sellers who need commerce rather than local SEO. Carries the confirmed Green Coorg Spices result. |
| `seo-services-virajpet.php` | South Kodagu, 70 km. Coffee export aimed at buyers outside India, plus Nagarhole tourism. Two different strategies in one town. |
| `seo-services-somwarpet.php` | North Kodagu, 25 km. Highest concentration of estate homestays in the district, premium direct-booking demand, Mallalli and Pushpagiri trek queries, estate access questions. |
| `seo-services-bengaluru.php` | Neighbourhood-level local intent, agency-saturated results, unaudited technical debt, B2B and SaaS journeys. References the live Nelamangala client. |
| `seo-services-mysuru.php` | 100 km. Trilingual query behaviour, heritage tourism, education and coaching, Ayurveda and wellness, silk and handicraft commerce. |
| `seo-services-mangaluru.php` | Coastal, 150 km, includes Udupi and Manipal. Medical travel and education demand originating outside the city, Gulf NRI buyers, port logistics B2B, six languages in the mix. |
| `seo-services-hubballi-dharwad.php` | North Karnataka, 550 km, so remote. The least contested market in the state, two economies in one twin city, wholesale and distribution B2B, north Karnataka dialect. Says "realistically no" on regular travel. |
| `seo-services-chennai.php` | South India, `local_seo => false`. Manufacturing and auto-ancillary B2B specification search, medical travel from outside India, the OMR corridor. |
| `seo-services-hyderabad.php` | South India, `local_seo => false`. Pharma and life sciences, B2B SaaS, real estate at locality level. English and Hindi carry the commercial volume. |
| `seo-services-kochi.php` | South India, `local_seo => false`. Spice and seafood export, Ayurveda inbound, Gulf NRI demand, backwater trip planning, Infopark. |
| `seo-services-coimbatore.php` | South India, `local_seo => false`. Pumps, motors and castings bought on specification, Tiruppur knitwear compliance, the dealer discovery gap. |
| `seo-services-mumbai.php` | India, `local_seo => false`. Micro-locality intent in a linear city, ecommerce architecture and faceted navigation, author identity in BFSI. ~1,000 km, no visits. |
| `seo-services-pune.php` | India, `local_seo => false`. Three markets in one city: Chakan manufacturing, Hinjewadi IT, national education intake. Specification locked in PDF catalogues cannot rank. |
| `seo-services-delhi-ncr.php` | India, `local_seo => false`. Four jurisdictions Google treats as four places, Hindi at commercial scale, inherited link damage and penalty diagnosis, export houses. ~2,000 km, no visits. |
| `seo-services-switzerland.php` | Europe, `geo_region: CH`, `local_seo => false`. States plainly that the Swiss engagement is **upcoming, not an established client base**. Four national languages as four markets, Swiss German treated as distinct from German German, low volume changing the economics, AI visibility as the remote opening, Swiss data protection. Strategy and structure by Fawaz, final wording by a native speaker. |

### Assets
- `assets/css/site.css`: single universal stylesheet, numbered sections, CSS custom properties for both modes. Section 19b is the circular assistant launcher.
- `assets/js/site.js`: theme toggle with `localStorage`, mobile nav, GSAP scroll reveals, `prefers-reduced-motion` respected. `initReveals()` pre-hides **only** off-screen elements (see Performance below).
- `assets/js/assistant.js`: the retrieval assistant. No answer text lives here; it reads `llms-full.txt`.
- `assets/js/i18n.js`: language-menu filter and the browser-language offer bar. Refills the compact offer payload's omitted defaults. Never redirects.
- `assets/js/translate.js`: full-page runtime translation. Reads `<html data-mt>`, exits immediately on English, defers its third-party request to idle, and settles via a timeout if that request never lands.
- `assets/images/fawazbh.webp`: portrait, used in the hero of the homepage and every location page.
- `favicon.svg`: 907 bytes, listed first in `head.php`. Same FS mark geometry as `header.php`; keep the two in sync.
- `favicon.ico`: **still 269 KB and still wants a proper 32x32 re-export.** Modern browsers take the SVG above, so this only affects old browsers and crawlers probing `/favicon.ico` directly. Not fixable in this sandbox, which has no ICO encoder.
- `og-fawazbhseo.webp`: 164 KB, refresh still outstanding.

### Asset cache busting
`FBH_ASSET_VER` in `includes/head.php` (currently `'20260905'`) is appended as `?v=` to the CSS and JS URLs. **Bump it whenever you edit `site.css`, `site.js`, `assistant.js`, `i18n.js` or `translate.js`,** otherwise returning visitors keep the cached copy. This is why no stylesheet or script should ever carry inline "safety net" overrides.

### Housekeeping done
- All Phase-1 `.html` pages deleted after their copy was ported.
- `_tmp/` scratch directory deleted.
- `assets/css/chrome.css` and `assets/js/chrome.js` (retired theme) deleted after confirming nothing references them.
- **`sitemap.xml` deleted.** `sitemap.php` is now the only sitemap and is served at `/sitemap.xml` by the rewrite in `.htaccess` section 2e. Do not recreate a static `sitemap.xml`: a real file takes precedence over the rewrite and would silently serve stale URLs.
- `.htaccess` created. See the Indexing section below; this was the root-cause fix for the location pages.
- `llms.txt` rewritten: extensionless URLs, correct contact email, em dashes removed, all 16 location pages listed with their market focus under Kodagu, Karnataka, South India, rest of India and Europe sections.
- New `.linklist` CSS component for stacked internal link lists inside a card, used on all three hub pages. Verified rendering at desktop and 390px.
- **FAQ CSS bug fixed.** Two FAQ markup conventions exist on the site: form A is a `<div class="faq">` wrapping bare `<details>` children, form B is `<details class="faq">` siblings. Every array-driven page and the location renderer emit form B, where the `details` *is* the `.faq`, so `.faq details` and `.faq details[open] summary::after` could not match. Six pages were silently losing their separator rules and their open/close indicator. Added `details.faq` rules and confirmed both forms render identically.
- `robots.txt` points at `/sitemap.xml`, which the rewrite maps to `sitemap.php`.
- **Em dash sweep complete site-wide.** Zero matches for the em dash, en dash, `&mdash;`, `&ndash;`, `&#8212;` or `&#8211;` across every `.php`, `.css`, `.js` **and `llms-full.txt`**. The `llms-full.txt` sweep was the last outstanding breach and is now done, which matters more than before because visitors read that file through the assistant. `clean()` in `assistant.js` also strips dashes from every string it outputs, so a future regression in the source cannot reach a visitor.
- `llms-full.txt` factual corrections: the stale nine-language claim (which listed Spanish, Arabic and Italian) is gone, replaced with the six real working languages: English, Kannada, Malayalam, Hindi, Tamil, Telugu. The Marathi exclusion is now documented explicitly.
- Nav gained an 8th item, "AI SEO" → `/ai-seo-expert-india`. **A ninth will overflow the desktop row.**
- `sameAs` consolidated to LinkedIn + `x.com/fawazbhseo` across all 11 entity declarations, so every page asserts one identical identity set.

### Extensionless URLs and the indexing fix (done)
Every internal link, canonical and schema `@id` is extensionless, while the files on disk are `.php`. **There was no `.htaccess`, so those URLs returned 404**, which is exactly the "Discovered, currently not indexed" symptom reported for the location pages. Google had found the URLs in the sitemap and could not fetch them. `sitemap.xml`'s own comment referenced rewrite rules that did not exist.

`.htaccess` now provides:
- **2f, the critical rule:** map an extensionless request to `$1.php` when that file exists.
- 2a HTTPS (checks both `%{HTTPS}` and `X-Forwarded-Proto` so a proxy cannot cause a redirect loop), 2b www-less host, 2c strip a visible `.php` via `THE_REQUEST`, 2d drop trailing slashes. Result: exactly one canonical URL per page.
- 2e `/sitemap.xml` → `sitemap.php`; 2g blocks `/includes/`.
- **2e2 language prefixes.** `/kn/about` serves `about.php` with `FBH_LANG=kn`. This block **must stay before 2f**: if the extensionless rule ran first it would look for a literal `kn/about.php`, fail and 404. `/en/...` 301s back to the clean path. A `SetEnvIf` fallback is included because some FastCGI and LiteSpeed setups drop the `E=` variable, and `fbh_lang()` also honours `?lang=` as a last resort.
- Brotli/Deflate, `Expires` with `Cache-Control: immutable` for versioned assets, `no-cache` for `.php`, `X-Content-Type-Options`, `Referrer-Policy`, and `AddType text/plain .txt` with a UTF-8 charset so the assistant's corpus fetch parses correctly.

On Nginx the equivalent is `try_files $uri $uri.php $uri/ =404;`.

**This cannot be confirmed from the sandbox.** After deploying, fetch a location URL and confirm HTTP 200, then request reindexing in Search Console.

### Performance (done, needs live re-measurement)
Reported at ~72 in PageSpeed. The primary defect was a blanket `.js .reveal { opacity: 0 }`: **an element at `opacity: 0` is not a Largest Contentful Paint candidate,** so the hero's paint was deferred until two third-party CDN scripts (GSAP + ScrollTrigger) had loaded and run.

Fixed by making the hide opt-in. `initReveals()` measures each element and applies `.reveal--hold` **only** when it starts below 92% of the viewport height, so above-the-fold content paints with the document. **Never reintroduce a blanket `.reveal { opacity: 0 }`.** There is a comment in `site.css` saying so.

Also: font payload trimmed to only the weights actually used and made non-blocking via `media="print" onload="this.media='all'"` with a `<noscript>` fallback; the 907 b `favicon.svg` replaces the 269 KB `.ico` for modern browsers; compression and long-lived immutable caching added in `.htaccess`.

PageSpeed and the agentic-browsing score cannot be measured from this sandbox. Re-run both on the live host after deploying.

### Light default theme (done)
Light is now the unconditional default for every visitor. The pre-paint script in `head.php` applies dark **only** when `localStorage['fbh-theme']` is already `'dark'`, meaning the visitor previously chose it with the toggle. `prefers-color-scheme` is deliberately never consulted, so the operating system setting cannot make a first visit render dark. Zero `prefers-color-scheme` matches remain in the codebase. `applyTheme(mode, persist)` takes a persist flag so the initial state sync does not write to storage, and the `theme-color` meta is rewritten by JS on toggle rather than duplicated in the markup.

---

## 3. Functional entry URIs

All paths are extensionless. The file on disk is the same name with `.php`.

**Language prefixes.** Every path below also exists at `/kn/`, `/hi/`, `/ml/`, `/ta/` and `/te/`, for example `/kn/seo-services`. English is unprefixed and `/en/...` 301s to the clean path. Prefixed URLs are currently `noindex` until each language is reviewed and its `published` flag is flipped in `includes/i18n.php`. `?lang=kn` works as a fallback if a host strips the rewrite's environment variable.

| Path | Notes |
|---|---|
| `/` | Homepage (`index.php`) |
| `/seo-services` | Services and rate card |
| `/case-studies` | Client results |
| `/cities-we-serve` | Geographic coverage, six tiers, links out to every city page |
| `/about` | Background and credentials |
| `/contact` | Contact page |
| `/aeo-consultant` | AEO discipline page |
| `/geo-consultant` | GEO discipline page |
| `/blog` | Blog index, no posts yet |
| `/seo-consultant-kodagu` | Kodagu hub, links to all four town pages |
| `/seo-consultant-karnataka` | State hub, links to the Karnataka city pages |
| `/seo-consultant-india` | National hub |
| `/seo-services-madikeri` | Kodagu town page |
| `/seo-services-kushalnagar` | Kodagu town page, home base |
| `/seo-services-virajpet` | Kodagu town page |
| `/seo-services-somwarpet` | Kodagu town page |
| `/seo-services-bengaluru` | Karnataka city page |
| `/seo-services-mysuru` | Karnataka city page |
| `/seo-services-mangaluru` | Karnataka city page |
| `/seo-services-hubballi-dharwad` | Karnataka city page, north |
| `/seo-services-chennai` | South India city page |
| `/seo-services-hyderabad` | South India city page |
| `/seo-services-kochi` | South India city page |
| `/seo-services-coimbatore` | South India city page |
| `/seo-services-mumbai` | India city page |
| `/seo-services-pune` | India city page |
| `/seo-services-delhi-ncr` | India city page |
| `/seo-services-switzerland` | Europe country page, upcoming client |
| `/404` | Error page |
| `/sitemap.xml`, `/robots.txt`, `/llms.txt`, `/llms-full.txt` | Crawler and answer-engine files |

**In-page anchors** used by hero buttons and cross-links: `#main`, `#contact`, `#services`, `#process`, `#faq`, `#criteria`, `#judge`, `#method`, `#why`, `#credentials`, `#proof`, `#clients`, `#surfaces`, `#national`, `#whats-changed`, `#site-index`.

**Server configuration needed on your host** (Apache `.htaccess`): you have already written the extensionless rewrite rules. The one line still worth confirming is the error document:

```apache
ErrorDocument 404 /404.php
```

One thing to check on your rewrite: make sure a request to `/seo-services.php` **301 redirects** to `/seo-services` rather than serving the same page at both addresses. If both URLs return 200 you have duplicate content on every page. The canonicals point at the extensionless form, so Google will resolve it correctly either way, but a redirect is cleaner.

---

## 4. Data models and storage

**No database and no table storage is used.** Every page is self-contained PHP.

Page content is declared as PHP arrays at the top of each file, then looped in the markup. This keeps the verbatim copy in one auditable place per page. Typical arrays: `$services`, `$faqs`, `$method`, `$why`, `$stats`, `$identity`, `$criteria`, `$markets`, `$clients`, `$surfaces`, `$shifts`, `$creds`. Location pages use a single `$loc` array instead, passed straight to `render_location_page()`.

**JSON-LD pattern:** schema graphs are built as PHP arrays and emitted with
`json_encode($array, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)`.
FAQ schema is derived from the same `$faqs` array that renders the visible `<details>` list, so the page copy and the structured data cannot drift apart.

**Contact form:** the form collects name, business, city, service and message client-side, then hands off to WhatsApp with a prefilled message. There is no server mail transport, so nothing needs configuring. If you later want email delivery, that requires a PHP mail handler, which is a server-side addition to this static structure.

---

## 5. Markup contracts (important if you edit pages)

- `.readout` must be `<dl class="readout">` then `<div class="readout__row">` then `<dt>` and `<dd>`, with an optional `<small>` inside the `<dd>`. Do not use `<span>` children.
- `.stat-stack` is the container for a vertical run of `.stat` cards. Do not use `.readout` for that.
- `.data-table` must sit inside `.table-wrap` so it scrolls horizontally on mobile.
- Card variants: `.card`, `.card--featured`, `.card--link`. Index label is `.card-index`. Status pills are `.badge` and `.badge--accent`.
- Never write the literal sequences `</script>`, `<script>` or `<!--` inside inline JavaScript.
- `render_contact_form()` runs `htmlspecialchars()` on `heading` and `lede`, so pass plain text to those two keys, never HTML entities. The location renderer decodes city names before passing them in for this reason.
- Use `&#8217;` for apostrophes in page copy, not a straight `'`, so the typography matches the rest of the site.
- `.linklist` is the stacked internal-link list used inside cards on the hub pages. Pair it with an optional `pages_label` key so the heading reads "Town pages", "City pages" or "Country pages" as appropriate, rather than being hardcoded.
- Two FAQ markup forms exist and **both are styled**: form A is `<div class="faq">` wrapping bare `<details>`, form B is `<details class="faq">` siblings. Array-driven pages and the location renderer emit form B. If you add FAQ markup, either form now works.

---

## 6. Three items that need your decision

**1. Pricing correction, please read.**
Earlier in this project I told you the live site published no pricing, and I built the services page with six invented placeholder figures. **That was wrong.** My search had missed the prices because they were encoded as `&#8377;` rather than a literal rupee symbol. I later found the real four-block rate card on the live site and replaced every invented figure with it. The rates now published on `seo-services.php`, and repeated in the Karnataka and India FAQ blocks, are your real ones: **₹14,999 per month Starter local SEO, ₹29,999 per month Growth full-stack SEO plus AEO, and custom quote for Enterprise SEO plus AEO plus GEO**, plus the social, performance-marketing and website-design tiers. No invented figure remains anywhere. I should have told you at the time rather than only correcting it silently, and I am flagging it now so you can verify the rate card against what you actually charge.

**2. Two flagged copy blocks on `cities-we-serve.php`.**
Your geographic focus order was Kodagu, Karnataka, South India, India, Asia, Europe. The live site had verbatim copy for the first four tiers only. The **Asia** and **Europe** blocks had no source copy to carry over, so rather than inventing claims about markets and clients, I marked them with `.placeholder-flag` and wrote only what you told me directly, which is that a Switzerland client is upcoming. **Those two blocks need your words before the site goes live.** Send me what you want them to say and I will drop it in verbatim.

**3. A language contradiction I introduced, and it needs your answer.**
While writing the four South India pages I wrote that you do **not** speak or write Tamil, Telugu or Malayalam, and advised the reader to hire a local-language specialist for that portion of the work. My intention was to keep the pages honest about scope. **But that was my assumption, not your words, and your own site contradicts it.** `seo-consultant-india.php` lists your working languages as *English, Kannada, Malayalam, Hindi, Tamil, Telugu*, and `llms-full.txt` lists nine, adding Spanish, Arabic and Italian.

I should not have asserted a personal fact about you that your site already answers differently. I have removed the blanket claim from `llms.txt`, which answer engines read as authoritative, and replaced it with the bilingual Kannada and English statement the rest of the site makes consistently. **The claims are still sitting in the page copy** of `seo-services-chennai.php`, `seo-services-hyderabad.php`, `seo-services-kochi.php` and `seo-services-coimbatore.php`, including a dedicated FAQ on each and two sibling-link notes that say "with an honest note on Tamil".

Tell me which is true and I will make the whole site agree:
- **If you do work in those languages**, I will strip the disclaimers and the four FAQs and rewrite those sections around what you actually offer.
- **If you do not**, the disclaimers stay and I will instead correct the India page's language list and `llms-full.txt`, which are then the inaccurate files.

Either way the site currently says two different things about your languages, so this one should not wait.

**Update:** the nine-language claim is gone. `llms-full.txt` now states the six working languages (English, Kannada, Malayalam, Hindi, Tamil, Telugu) and records the Marathi exclusion, and the old contradiction note in that file is marked RESOLVED. **The four South India page disclaimers are still live and still need your answer.** Note this is about the *consulting* languages, which are separate from how many languages the site can be read in. If you do work in Tamil, Telugu and Malayalam, the disclaimers should go.

**4. Review the five interface translations you can actually read, so they can be published.**
`locales/kn.php`, `hi.php`, `ml.php`, `ta.php` and `te.php` are **machine first drafts for you to correct, not finished translations**. Roughly 22 strings each: nav labels, two button labels, the skip link, the language-menu wording and the provenance notices. All are `provenance => 'machine'`, so they are `noindex`, excluded from the sitemap, and carry a visible AI notice. Nothing half-finished can be indexed.

To publish one: open `locales/<code>.php`, fix anything that reads awkwardly, then set `'provenance' => 'reviewed'`, `'published' => true` and put your name in `'reviewer'`. Those edits add it to hreflang and the sitemap, remove the `noindex`, and soften the notice. **Kannada is the obvious first**, given Karnataka is the primary market.

The other locales (`de`, `fr`, `es`, `ar`, `zh-Hans`) should **stay `machine`** unless a speaker of that language reviews them. They are readable and honestly labelled as they are. Do not mark a language reviewed that nobody has read: that is the one thing in this system that would actually be dishonest.

---

## 7. Not yet done

- **Visual QA on a real PHP host.** PHP does not execute in this build environment, so not one page has been rendered and screenshotted. Everything has been checked at source level for markup contracts, escaping rules, class existence and em dashes, but the pages have not been *seen*. This is the single biggest open risk on the project. Please upload to your host and send me screenshots, or tell me anything that looks off, and I will fix it.
- **The floating assistant has never been rendered inside an actual PHP page.** Its markup and JavaScript were verified in standalone HTML harnesses loading the real `site.css` and the real `assistant.js`: 17/17 retrieval cases, plus the circular launcher confirmed as a true circle with a legible bot face in light and dark at both 60px desktop and 54px mobile. But because PHP does not execute here, `render_ai_assistant()` itself has not run. Please confirm on your host that the launcher appears on every page, that it does not collide with the WhatsApp button on a phone, and that the corpus actually loads (open the panel, ask "what do you charge", and check you get a figure rather than the WhatsApp fallback; if every answer falls back, `/llms-full.txt` is not being served).
- **Remaining location pages.** Written so far: 16, covering four Kodagu towns, four Karnataka cities, four South India cities, three India metros and Switzerland. Still available in your stated order: the rest of Karnataka (Udupi, Belagavi, Shivamogga, Davangere, Nelamangala), more of India (Ahmedabad, Kolkata, Indore, Jaipur), the Asia tier (Singapore, Dubai and the UAE, Malaysia, Sri Lanka) and more of Europe (Germany, United Kingdom, Netherlands). The renderer is built, so each new page is a data file rather than a rebuild.
- **A South India regional hub page** does not exist. There are hubs for Kodagu, Karnataka and India, so the four South India city pages currently roll up to the India hub rather than to a regional one. Worth adding if you want to target "SEO consultant in South India" as its own query.
- Asia and Europe copy on `cities-we-serve.php` (see section 6).
- Blog posts. The structure is ready and waiting on the `$posts` array.
- OG image refresh. `og-fawazbhseo.webp` is the old artwork and still carries the retired theme's look.
- `favicon.ico` is still 269 KB. `favicon.svg` (907 b) is listed first so modern browsers never fetch the ICO, which removes the practical cost, but a proper 32x32 re-export is still worth doing. This sandbox has no ICO encoder, so it needs to be done with an image tool.
- **PageSpeed and agentic browsing have not been re-measured.** The known defects are fixed (see Performance above) but neither score can be produced from this sandbox. Re-run `pagespeed.web.dev` on the live host after deploying and send me the numbers if anything is still short of 3/3.
- **Translated page bodies.** Only the interface is translated. Every page body is still English in all six locales, by design, with a banner saying so. Translating the bodies is a writing job for a person, not a job for a machine; the honest order is to publish the interface first, then translate the highest-value pages (homepage, services, contact, Kodagu hub) properly.
- **The five draft locales are unreviewed.** See item 4 in section 6. They are safely `noindex` until you sign them off.

---

## 8. Recommended next steps

1. **Upload `.htaccess` along with the pages.** It is a dotfile, so many FTP clients hide it by default and will silently skip it. Nothing else in this list works without it. `ErrorDocument 404 /404.php` is already included.
2. Confirm a location URL such as `/seo-services-madikeri` returns HTTP 200, then that `/seo-services.php` redirects to `/seo-services` rather than serving both. Then request reindexing for the location pages in Search Console.
3. Check every page visually on desktop and phone, in both light and dark mode, and send me anything that needs correcting. Confirm specifically that a fresh visit renders light even on a device set to dark mode.
4. Verify the rate card in section 6 against what you actually charge.
5. **Answer the language question in section 6.** The site currently contradicts itself on Tamil, Telugu and Malayalam.
6. Send me the Asia and Europe copy.
7. Tell me which cities to prioritise next, or say continue and I will work outward in your stated order.
8. Resubmit `sitemap.xml` in Google Search Console and Bing Webmaster Tools, now that it lists all 16 location pages and the URLs actually resolve.
9. Re-run PageSpeed on the live host and confirm agentic browsing reads 3/3.
10. Replace the OG image with artwork matching the new design, and shrink the 269 KB favicon.

---

## 9. Public URLs

- Production: `https://fawazbhseo.in/`
- No API endpoints. The site makes no server calls at runtime.
