# Source manifest

Retrieved during this research pass on 2026-09-10. Autocomplete request settings: `client=firefox`, `hl=en`, `gl=in`. These are public discovery responses, not an authenticated analytics dataset. The provider may change this endpoint or its responses.

| ID | Seed | Saved file | Request URL |
|---|---|---|---|
| S01 | seo consultant india | autocomplete-seo-india.json | https://suggestqueries.google.com/complete/search?client=firefox&hl=en&gl=in&q=seo%20consultant%20india |
| S02 | answer engine optimization | autocomplete-aeo.json | https://suggestqueries.google.com/complete/search?client=firefox&hl=en&gl=in&q=answer%20engine%20optimization |
| S03 | generative engine optimization | autocomplete-geo.json | https://suggestqueries.google.com/complete/search?client=firefox&hl=en&gl=in&q=generative%20engine%20optimization |
| S04 | performance marketing services | autocomplete-performance.json | https://suggestqueries.google.com/complete/search?client=firefox&hl=en&gl=in&q=performance%20marketing%20services |
| S05 | social media marketing services | autocomplete-social.json | https://suggestqueries.google.com/complete/search?client=firefox&hl=en&gl=in&q=social%20media%20marketing%20services |
| S06 | digital marketing consultant | autocomplete-digital.json | https://suggestqueries.google.com/complete/search?client=firefox&hl=en&gl=in&q=digital%20marketing%20consultant |
| S07 | seo consultant karnataka | autocomplete-karnataka.json | https://suggestqueries.google.com/complete/search?client=firefox&hl=en&gl=in&q=seo%20consultant%20karnataka |
| S08 | how long does seo | autocomplete-seo-questions.json | https://suggestqueries.google.com/complete/search?client=firefox&hl=en&gl=in&q=how%20long%20does%20seo |
| S09 | how to get my business on chatgpt | autocomplete-geo-questions.json | https://suggestqueries.google.com/complete/search?client=firefox&hl=en&gl=in&q=how%20to%20get%20my%20business%20on%20chatgpt |
| S10 | how much does digital marketing | autocomplete-marketing-questions.json | https://suggestqueries.google.com/complete/search?client=firefox&hl=en&gl=in&q=how%20much%20does%20digital%20marketing |
| S11 | seo consultant bangalore | autocomplete-bengaluru.json | https://suggestqueries.google.com/complete/search?client=firefox&hl=en&gl=in&q=seo%20consultant%20bangalore |
| S12 | google ads vs facebook ads | autocomplete-ads-questions.json | https://suggestqueries.google.com/complete/search?client=firefox&hl=en&gl=in&q=google%20ads%20vs%20facebook%20ads |
| S13 | how much does social media management | autocomplete-social-questions.json | https://suggestqueries.google.com/complete/search?client=firefox&hl=en&gl=in&q=how%20much%20does%20social%20media%20management |
| S14 | aeo vs seo | autocomplete-aeo-questions.json | https://suggestqueries.google.com/complete/search?client=firefox&hl=en&gl=in&q=aeo%20vs%20seo |

S07 returned `[]`. Do not turn that into a volume estimate or a statement of no demand. Other seeds include unrelated and non-Indian results despite the locale parameters. Retain only commercially relevant suggestions, with their original wording, in the observation column.

## Technical sources

T01: Google Search Central, Block Search indexing with noindex.
URL: https://developers.google.com/search/docs/crawling-indexing/block-indexing
Retrieved and read directly during this pass. Short exact excerpt, with HTML formatting removed:

> For the noindex rule to be effective, the page or resource must not be blocked by a robots.txt file, and it has to be otherwise accessible to the crawler.

This supports removing the site's language-path crawl blocks while retaining the existing noindex on incomplete translations. It does not support claiming that doing so guarantees indexing or higher rankings. The downloaded full documentation HTML was removed after inspection to avoid publishing an unnecessary copy of Google's page.

T02: Live site robots file, https://fawazbhseo.in/robots.txt
Snapshot: `live-robots.txt`. Fetch succeeded. It contained language-prefix blocks in the wildcard group plus separate named bot groups permitting everything. Named groups can take precedence rather than inherit wildcard restrictions. The new repo robots file is not the same as this historical snapshot.

T03: Live XML sitemap, https://fawazbhseo.in/sitemap.xml
Snapshot: `live-sitemap.xml`. Fetch succeeded. Contains 29 English content URLs, no language-prefixed URLs and no 404 URL. All lastmod entries in this snapshot are 2026-09-10. A sitemap fetch does not verify each URL's response status, Google-selected canonical or index membership.

## First-party project evidence

F01: `seo-services.php`, source rate cards and service sections. Paid advertising management, social media packages and separate ad spend are explicitly present. Prices are existing published claims, not independently verified market rates.

F02: `contact.php`, consultant identity, address, contact details and first-person delivery model.

F03: `cities-we-serve.php` and the 16 city-page source files, local context and remote delivery disclosures. These are not proof of an office or client in every city.

F04: `includes/head.php`, `includes/i18n.php` and `sitemap.php`, indexability and metadata source. Source inspection is not PHP execution or live HTTP-header testing.

F05: `blog.php`, an empty article list and first-posts-coming copy. This is an editorial gap, not proof of an algorithmic penalty.

## Evidence labels

- `observed`: exact phrase found in a saved autocomplete response.
- `candidate`: authored from service fit or buyer intent, no observed demand claimed.
- `negative_observation`: the queried seed returned no suggestions in this sample.
- `editorial_question`: authored question to validate with PAA, sales calls or Search Console.
- `synthetic_prompt`: authored AI evaluation prompt, not an actual user's prompt or a test result.

No volumes, CPC, keyword difficulty, current ranks, PAA positions, competitor rankings or AI recommendation rates have been fabricated.
