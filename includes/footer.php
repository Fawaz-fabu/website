<?php
/**
 * Site footer plus the closing scripts and document tags.
 * GSAP is loaded here, deferred, and used for scroll reveals only.
 */

require_once __DIR__ . '/header.php';        // for fbh_logo() and fbh_nav_items()
require_once __DIR__ . '/ai-assistant.php'; // rendered on every page from here

if (!function_exists('render_footer')) {

function render_footer() {
    $items = fbh_nav_items();
    $year  = date('Y');
    ?>
    <footer class="site-footer">
      <div class="wrap">

        <div class="site-footer__top">
          <div class="site-footer__brand">
            <?php fbh_logo(); ?>
            <p class="site-footer__tag">Independent SEO, AEO and GEO consultant based in Kushal Nagar, Kodagu. Ranking businesses on Google and getting them cited by AI answer engines across Karnataka, South India and beyond.</p>
          </div>

          <nav class="footer-col" aria-label="Site pages">
            <p class="footer-h">Explore</p>
            <ul>
              <?php foreach ($items as $item): ?>
              <li><a href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?></a></li>
              <?php endforeach; ?>
            </ul>
          </nav>

          <?php
          /* This column used to be a plain text list of engine names, which
             gave the discipline pages no internal links at all. Those pages
             are the ones meant to rank for the expert queries, so they now get
             a link from every page on the site instead. */
          ?>
          <?php
          /* Anchor text stays in English in every locale, and that is
             deliberate. These six are the exact queries these pages are built
             to rank for ("SEO expert in India" and so on), so the anchors are
             ranking signals rather than interface labels. Translating them
             would dilute the very links added to fix the ranking problem. The
             path is localised so a Kannada visitor stays in Kannada; the words
             are not. */
          $lp = fbh_is_default_lang() ? '' : '/' . fbh_lang();
          ?>
          <?php
          /* class="notranslate" for the same reason the anchors stay English.
             These six are ranking anchors, not interface labels, so the runtime
             translation engine is told to leave them exactly as written. The
             heading above them is ordinary interface text and does translate. */
          ?>
          <nav class="footer-col" aria-label="Specialisms">
            <p class="footer-h">Specialisms</p>
            <ul class="notranslate" translate="no">
              <li><a href="<?php echo $lp; ?>/seo-consultant-india">SEO expert in India</a></li>
              <li><a href="<?php echo $lp; ?>/geo-consultant">GEO expert in India</a></li>
              <li><a href="<?php echo $lp; ?>/ai-seo-expert-india">AI SEO expert in India</a></li>
              <li><a href="<?php echo $lp; ?>/aeo-consultant">AEO consultant</a></li>
              <li><a href="<?php echo $lp; ?>/seo-consultant-karnataka">SEO expert in Karnataka</a></li>
              <li><a href="<?php echo $lp; ?>/seo-consultant-kodagu">SEO consultant in Kodagu</a></li>
            </ul>
          </nav>

          <div class="footer-col">
            <p class="footer-h">Get in touch</p>
            <?php
            /* Contact details are never translated. A machine translation pass
               can reformat a phone number, transliterate the digits into
               another numeral system, or translate the word WhatsApp into a
               description of it. Any of those makes the one thing on the page
               a visitor most needs unusable, so the whole list is fenced off. */
            ?>
            <ul class="notranslate" translate="no">
              <li><a href="tel:+919481084038">+91 94810 84038</a></li>
              <li><a href="mailto:fawazbhseo@gmail.com">fawazbhseo@gmail.com</a></li>
              <li><a href="mailto:admin@fawazbhseo.in">admin@fawazbhseo.in</a></li>
              <li><a href="https://wa.me/919481084038" target="_blank" rel="noopener">WhatsApp</a></li>
              <li><a href="https://www.linkedin.com/in/fawazbh" target="_blank" rel="noopener">LinkedIn</a></li>
            </ul>
          </div>
        </div>

        <div class="site-footer__bottom">
          <p>&copy; <?php echo $year; ?> <span class="notranslate" translate="no">Fawaz BH, FawazBHSEO</span>. All rights reserved.</p>
          <p>Kushal Nagar, Kodagu, Karnataka, India</p>
        </div>

      </div>
    </footer>

    <?php
    /* The assistant is site-wide, so it is rendered here rather than being
       added page by page. Every page calls render_footer(). */
    render_ai_assistant();
    ?>

    <?php $v = defined('FBH_ASSET_VER') ? FBH_ASSET_VER : '1'; ?>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>
    <script src="/assets/js/site.js?v=<?php echo $v; ?>" defer></script>
    <script src="/assets/js/assistant-fallback.js?v=<?php echo $v; ?>" defer></script>
    <script src="/assets/js/assistant.js?v=<?php echo $v; ?>" defer></script>
    <script src="/assets/js/i18n.js?v=<?php echo $v; ?>" defer></script>
    <?php
    /* FULL PAGE TRANSLATION. Loaded on every page and every language, because
       it decides for itself whether there is anything to do: it reads
       <html data-mt> and returns immediately on English. Kept last in the
       order so it never delays the site's own scripts, and it defers its own
       third party request to idle time on top of that. */
    ?>
    <script src="/assets/js/translate.js?v=<?php echo $v; ?>" defer></script>
    </body>
    </html>
    <?php
}

}
