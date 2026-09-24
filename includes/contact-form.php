<?php
/**
 * Shared contact section. Used on the homepage, the services page, and the
 * dedicated contact page.
 *
 * The form hands off to WhatsApp with the message prefilled, handled in
 * assets/js/site.js, so no mail transport or server endpoint is required.
 */

if (!function_exists('render_contact_form')) {

/**
 * @param array $opts heading, lede, and id.
 */
function render_contact_form(array $opts = []) {
    $heading = $opts['heading'] ?? 'Ready to be the answer people are given?';
    $lede    = $opts['lede']    ?? 'Book a free 30 minute audit. I will show you where you are losing visibility on Google and in AI answers, and the exact path to fixing it.';
    $id      = $opts['id']      ?? 'contact';
    ?>
    <section class="section contact" id="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>" aria-labelledby="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>-h">
      <div class="wrap contact__grid">

        <div class="reveal">
          <p class="eyebrow">Let us talk</p>
          <h2 id="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>-h" style="margin-block:16px 18px"><?php echo htmlspecialchars($heading, ENT_QUOTES, 'UTF-8'); ?></h2>
          <p class="lede"><?php echo htmlspecialchars($lede, ENT_QUOTES, 'UTF-8'); ?></p>

          <ul class="contact-list" style="margin-top:30px">
            <li><span class="k">Phone and WhatsApp</span><a href="tel:+919481084038">+91 94810 84038</a></li>
            <li><span class="k">Email</span><a class="notranslate" translate="no" href="mailto:fawazbhseo@gmail.com">fawazbhseo@gmail.com</a></li>
            <li><span class="k">Admin email</span><a class="notranslate" translate="no" href="mailto:admin@fawazbhseo.in">admin@fawazbhseo.in</a></li>
            <li><span class="k">LinkedIn</span><a href="https://www.linkedin.com/in/fawazbh" target="_blank" rel="noopener">linkedin.com/in/fawazbh</a></li>
            <li><span class="k">Based in</span><address style="font-style:normal;display:inline">Kushalnagar, Kodagu, Karnataka, India, 571234</address></li>
          </ul>
        </div>

        <div class="card reveal">
          <h3 style="margin-bottom:6px">Request your free audit</h3>
          <p style="color:var(--text-2);font-size:.95rem;margin-bottom:22px">Tell me what you need. I read every message myself and reply directly.</p>

          <p class="form-status" id="formStatus" role="status" hidden></p>

          <form id="contactForm" novalidate>
            <div class="field">
              <label for="cf-name">Your name</label>
              <input type="text" id="cf-name" name="name" autocomplete="name" placeholder="Fawaz BH" required>
            </div>

            <div class="field">
              <label for="cf-business">Business or website</label>
              <input type="text" id="cf-business" name="business" autocomplete="organization" placeholder="greencoorgspices.in">
            </div>

            <div class="field">
              <label for="cf-city">City</label>
              <input type="text" id="cf-city" name="city" placeholder="Kushal Nagar, Kodagu">
            </div>

            <div class="field">
              <label for="cf-service">What do you need</label>
              <select id="cf-service" name="service">
                <option value="">Not sure yet</option>
                <option>Technical SEO and site architecture audit</option>
                <option>Local SEO</option>
                <option>AEO, answer engine optimisation</option>
                <option>GEO, generative engine optimisation</option>
                <option>SEO content strategy</option>
                <option>LinkedIn and personal brand SEO</option>
              </select>
            </div>

            <div class="field">
              <label for="cf-message">What are you trying to fix</label>
              <textarea id="cf-message" name="message" placeholder="We rank on page three for our main keywords and get no orders from outside Kodagu." required></textarea>
              <p class="field-note">Sending this opens WhatsApp with your message ready to go.</p>
            </div>

            <button class="btn btn--accent" type="submit">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 21a9 9 0 1 0-8.5-6.1L2 22l6.5-1.6A9 9 0 0 0 12 21Z"/></svg>
              Send my request
            </button>
          </form>
        </div>

      </div>
    </section>
    <?php
}

}
