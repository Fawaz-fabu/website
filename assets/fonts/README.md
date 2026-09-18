# Big Shoulders Display 700

Locally served normal-weight-700 WOFF2 subsets for the existing display typeface. No new typeface has been introduced.

## Source and license

Downloaded on 2026-09-10 from Fontsource's jsDelivr font CDN:

- https://cdn.jsdelivr.net/fontsource/fonts/big-shoulders-display@latest/latin-700-normal.woff2
- https://cdn.jsdelivr.net/fontsource/fonts/big-shoulders-display@latest/latin-ext-700-normal.woff2
- https://cdn.jsdelivr.net/fontsource/fonts/big-shoulders-display@latest/vietnamese-700-normal.woff2

These are saved binary assets, not runtime requests to a mutable latest URL. Unicode ranges came from https://cdn.jsdelivr.net/npm/@fontsource/big-shoulders-display/700.css. License obtained from https://cdn.jsdelivr.net/npm/@fontsource/big-shoulders-display/LICENSE and retained as `OFL-big-shoulders-display.txt` (SIL Open Font License 1.1).

## Loading

`assets/css/site.css` defines all three subsets with `font-display: optional`. `includes/head.php` preloads the 14,424-byte Latin subset with `crossorigin`. Other subsets load only for matching glyphs. Body/UI and locale-specific font loading is unchanged.

Optional display deliberately keeps the existing fallback for a navigation if the font misses the browser's initial loading window. It avoids a late headline font swap, but does not guarantee that the custom face appears on a slow first visit. No JavaScript font gate, hidden heading, forced line break or fixed height was added.

Deploy this directory together with the shared CSS and head template to the existing PHP host. Check WOFF2 MIME type, CORS/preload reuse, caching and cold-load performance on that host. This is a frontend font-loading mitigation, not evidence of a passing live CLS score.
