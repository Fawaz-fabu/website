<?php
/**
 * Site header: logo lockup, primary navigation, theme toggle, mobile drawer.
 * The FS mark stays monochrome. Only "BH" in the wordmark carries the accent.
 */

require_once __DIR__ . '/i18n.php';

if (!function_exists('fbh_nav_items')) {

/**
 * Single source of truth for the primary navigation.
 */
function fbh_nav_items() {
    /* Kept deliberately short. "AI SEO" sits next to Services because it is the
       discipline page people arrive looking for by name, and until it was added
       here the only site-wide link to it was in the footer. Adding a ninth item
       will overflow the desktop row, so if something new has to go in, something
       existing has to come out. */
    /* Labels come from t() so the navigation is translated even while page
       bodies are still English. hrefs go through fbh_link(), so every link
       keeps the visitor inside their chosen language instead of dropping them
       back into English on the first click. */
    return [
        'home'     => ['label' => t('nav.home'),     'href' => fbh_link('/')],
        'services' => ['label' => t('nav.services'), 'href' => fbh_link('/seo-services')],
        'aiseo'    => ['label' => t('nav.aiseo'),    'href' => fbh_link('/ai-seo-expert-india')],
        'cities'   => ['label' => t('nav.cities'),   'href' => fbh_link('/cities-we-serve')],
        'cases'    => ['label' => t('nav.cases'),    'href' => fbh_link('/case-studies')],
        'blog'     => ['label' => t('nav.blog'),     'href' => fbh_link('/blog')],
        'about'    => ['label' => t('nav.about'),    'href' => fbh_link('/about')],
        'contact'  => ['label' => t('nav.contact'),  'href' => fbh_link('/contact')],
    ];
}

}

if (!function_exists('fbh_logo')) {

/**
 * The shared logo lockup. Used by both header and footer.
 */
function fbh_logo($label = 'FawazBHSEO, home') {
    /* Language aware. A hardcoded "/" here silently threw a visitor reading in
       Arabic back to the English homepage the moment they clicked the logo,
       which is the most obvious thing on the page to click. */
    $home = function_exists('fbh_link') ? fbh_link('/') : '/';
    ?>
    <a class="logo" href="<?php echo htmlspecialchars($home, ENT_QUOTES, 'UTF-8'); ?>" aria-label="<?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>">
      <svg class="logo__mark" viewBox="0 0 38 38" role="img" aria-hidden="true" focusable="false">
        <rect x="0" y="0" width="38" height="38"></rect>
        <!-- F -->
        <path d="M7 9h11v3.4h-7.2v3.6h6.4v3.4h-6.4V29H7z"></path>
        <!-- S -->
        <path d="M31 13.1h-3.7c0-1.1-.8-1.8-2.2-1.8-1.3 0-2.1.6-2.1 1.5 0 .8.6 1.2 2 1.6l1.9.5c2.7.7 4.1 2.1 4.1 4.5 0 3.1-2.4 5.1-6 5.1-3.7 0-6.1-2-6.1-5.2h3.8c0 1.3.9 2.1 2.4 2.1 1.4 0 2.2-.6 2.2-1.6 0-.8-.6-1.3-2-1.6l-1.9-.5c-2.7-.7-4.1-2.2-4.1-4.5 0-3 2.4-4.9 5.9-4.9 3.6 0 5.9 1.9 5.9 4.8z"></path>
      </svg>
      <?php
      /* The wordmark is a brand name, so translate="no" keeps the runtime
         translation engine off it. Without this, "Fawaz BH SEO" comes back from
         a translation pass with SEO rendered as a local phrase and the lockup
         reading as three unrelated words, on every page, in every language. */
      ?>
      <span class="logo__word notranslate" translate="no">Fawaz<span class="bh">BH</span>SEO</span>
    </a>
    <?php
}

}

if (!function_exists('render_header')) {

/**
 * @param string $active_page Key from fbh_nav_items(), used to set the active state.
 */
function render_header($active_page = '') {
    $items = fbh_nav_items();
    $wa    = 'https://wa.me/919481084038?text=' . rawurlencode('Hi Fawaz, I would like a free audit.');
    ?>
    <header class="site-header">
      <div class="wrap site-header__inner">

        <?php fbh_logo(); ?>

        <?php
        /* fbh_mt_attr() prints translate="no" only on a locale that has a
           file, where these labels came out of that file already translated.
           On a language with no file the labels are still English and the
           runtime engine is left free to translate them along with everything
           else, which is what makes every language in the menu work. */
        ?>
        <nav class="site-nav" aria-label="Primary"<?php echo fbh_mt_attr(); ?>>
          <ul>
            <?php foreach ($items as $key => $item): ?>
            <li>
              <a href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8'); ?>"<?php
                echo $key === $active_page ? ' aria-current="page"' : ''; ?>><?php
                echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?></a>
            </li>
            <?php endforeach; ?>
          </ul>
        </nav>

        <div class="header-actions">
          <?php fbh_render_lang_switcher(); ?>

          <button class="icon-btn theme-toggle" type="button" aria-pressed="false" aria-label="Switch to dark mode">
            <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><circle cx="12" cy="12" r="4.4"/><path d="M12 2v2.6M12 19.4V22M4.2 4.2l1.9 1.9M17.9 17.9l1.9 1.9M2 12h2.6M19.4 12H22M4.2 19.8l1.9-1.9M17.9 6.1l1.9-1.9"/></svg>
            <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M20 14.5A8.5 8.5 0 1 1 9.5 4a7 7 0 0 0 10.5 10.5Z"/></svg>
          </button>

          <a class="btn btn--accent btn--sm" href="<?php echo $wa; ?>" target="_blank" rel="noopener"<?php echo fbh_mt_attr(); ?>><?php echo htmlspecialchars(t('cta.audit'), ENT_QUOTES, 'UTF-8'); ?></a>

          <button class="icon-btn nav-toggle" type="button" aria-expanded="false" aria-controls="mobileNav" aria-label="Toggle navigation menu">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
          </button>
        </div>

      </div>

      <nav class="mobile-nav" id="mobileNav" aria-label="Primary, mobile"<?php echo fbh_mt_attr(); ?>>
        <div class="wrap">
          <ul>
            <?php $i = 1; foreach ($items as $key => $item): ?>
            <li>
              <a href="<?php echo htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8'); ?>"<?php
                echo $key === $active_page ? ' aria-current="page"' : ''; ?>>
                <span class="idx"><?php echo str_pad((string) $i, 2, '0', STR_PAD_LEFT); ?></span>
                <span><?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?></span>
              </a>
            </li>
            <?php $i++; endforeach; ?>
          </ul>
          <div class="mobile-nav__cta">
            <a class="btn btn--accent" href="<?php echo $wa; ?>" target="_blank" rel="noopener"><?php echo htmlspecialchars(t('cta.auditlong'), ENT_QUOTES, 'UTF-8'); ?></a>
          </div>
        </div>
      </nav>
    </header>

    <?php
    /* Provenance notice. If a visitor is reading a machine translation, or a
       reviewed one, say so at the top of the page rather than letting them
       work it out from the odd phrasing. Renders nothing for English or for a
       genuinely human written locale. This one function is what makes it
       honest to offer a language nobody here can read. */
    fbh_render_translation_notice();
}

}
