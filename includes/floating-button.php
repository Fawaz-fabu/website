<?php
/**
 * Floating WhatsApp action button. Shown on narrow viewports only,
 * where the header CTA is hidden behind the menu toggle.
 */

if (!function_exists('render_floating_button')) {

function render_floating_button($message = 'Hi Fawaz, I would like a free audit.') {
    $href = 'https://wa.me/919481084038?text=' . rawurlencode($message);
    ?>
    <a class="fab" href="<?php echo $href; ?>" target="_blank" rel="noopener">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 21a9 9 0 1 0-8.5-6.1L2 22l6.5-1.6A9 9 0 0 0 12 21Z"/></svg>
      Free audit
    </a>
    <?php
}

}
