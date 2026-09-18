<?php
/**
 * Contact page.
 * The form itself lives in includes/contact-form.php and is shared with the
 * homepage, services page and the rest of the site.
 */

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/contact-form.php';
require_once __DIR__ . '/includes/floating-button.php';
require_once __DIR__ . '/includes/footer.php';

$schema = <<<'JSONLD'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "ContactPage",
      "@id": "https://fawazbhseo.in/contact#page",
      "url": "https://fawazbhseo.in/contact",
      "name": "Contact Fawaz BH, SEO, AEO and GEO consultant",
      "about": {"@id": "https://fawazbhseo.in/#fawaz"}
    },
    {
      "@type": "Person",
      "@id": "https://fawazbhseo.in/#fawaz",
      "name": "Fawaz BH",
      "jobTitle": "Independent SEO, AEO and GEO Consultant",
      "url": "https://fawazbhseo.in/",
      "telephone": "+91-94810-84038",
      "email": ["fawazbhseo@gmail.com", "admin@fawazbhseo.in"],
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Kushal Nagar",
        "addressLocality": "Kodagu",
        "addressRegion": "Karnataka",
        "postalCode": "571234",
        "addressCountry": "IN"
      },
      "sameAs": ["https://www.linkedin.com/in/fawazbh", "https://x.com/fawazbhseo"],
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+91-94810-84038",
        "contactType": "customer support",
        "email": ["fawazbhseo@gmail.com", "admin@fawazbhseo.in"],
        "areaServed": ["IN"],
        "availableLanguage": ["English", "Kannada"]
      }
    }
  ]
}
JSONLD;

render_head([
    'title'       => 'Contact Fawaz BH, SEO, AEO and GEO consultant in Kodagu',
    'description' => 'Contact Fawaz BH in Kushal Nagar, Kodagu, for a free website audit. Call or WhatsApp +91 94810 84038. Tell me about your business and what you need help with.',
    'canonical'   => 'https://fawazbhseo.in/contact',
    'schema'      => $schema,
]);

render_header('contact');
?>

<main id="main">

  <!-- HERO -->
  <section class="hero" aria-labelledby="hero-h">
    <div class="wrap hero__grid">

      <div class="hero__lead reveal">
        <p class="eyebrow">Get in touch</p>
        <h1 id="hero-h">Tell me about your business.</h1>
        <p class="hero__sub">I am Fawaz BH, an independent SEO, AEO and GEO consultant in Kushal Nagar, Kodagu. I help businesses get found on Google and in AI answers. Tell me what you would like to improve. I read and reply to your messages myself.</p>

        <div class="btn-row">
          <a class="btn btn--accent" href="https://wa.me/919481084038?text=Hi%20Fawaz%2C%20I%20would%20like%20a%20free%20audit" target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 21a9 9 0 1 0-8.5-6.1L2 22l6.5-1.6A9 9 0 0 0 12 21Z"/></svg>
            Message on WhatsApp
          </a>
          <a class="btn" href="tel:+919481084038">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z"/></svg>
            Call +91 94810 84038
          </a>
        </div>
      </div>

      <dl class="readout reveal">
        <div class="readout__row"><dt>Phone</dt><dd><a href="tel:+919481084038">+91 94810 84038</a><small>Also WhatsApp</small></dd></div>
        <div class="readout__row"><dt>Email</dt><dd><a class="notranslate" translate="no" href="mailto:fawazbhseo@gmail.com">fawazbhseo@gmail.com</a><small>Read personally</small></dd></div>
        <div class="readout__row"><dt>Admin email</dt><dd><a class="notranslate" translate="no" href="mailto:admin@fawazbhseo.in">admin@fawazbhseo.in</a></dd></div>
        <div class="readout__row"><dt>LinkedIn</dt><dd><a href="https://www.linkedin.com/in/fawazbh" target="_blank" rel="noopener">linkedin.com/in/fawazbh</a><small>Connect or message</small></dd></div>
        <div class="readout__row"><dt>Based in</dt><dd>Kushal Nagar<small>Kodagu, Karnataka 571234</small></dd></div>
        <div class="readout__row"><dt>Hours</dt><dd>Mon to Sat<small>India Standard Time</small></dd></div>
      </dl>

    </div>
  </section>

  <!-- TRUST STRIP -->
  <section class="trust" aria-label="Response promise">
    <div class="wrap">
      <p>From your first message to the work itself, <span class="accent">you speak with me directly.</span></p>
    </div>
  </section>

  <!-- WHAT HAPPENS NEXT -->
  <section class="section" id="what-happens" aria-labelledby="next-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">What happens next</p>
        <h2 id="next-h">From your first message to a clear plan</h2>
        <p class="lede">We start with what your business needs. I explain how I can help, and you decide whether to go ahead. There is no pressure to hire me.</p>
      </div>

      <div class="grid grid--2">
        <article class="step reveal">
          <p class="step__k">01, You write</p>
          <h3>Tell me what you need help with</h3>
          <p>Share your website, your city and what you would like to improve. A few words are enough to start. You do not need to know the technical terms or which service to choose.</p>
        </article>

        <article class="step reveal">
          <p class="step__k">02, I reply</p>
          <h3>I reply personally</h3>
          <p>I read your message and let you know whether I can help. If the work needs someone with different experience, I will tell you.</p>
        </article>

        <article class="step reveal">
          <p class="step__k">03, Free audit</p>
          <h3>A free review of your website</h3>
          <p>I check how your website works, how clearly its pages explain your business, and how it appears in local searches and AI answers. You get a written summary of the problems I find and what I recommend fixing first. You keep it even if you do not hire me.</p>
        </article>

        <article class="step reveal">
          <p class="step__k">04, You decide</p>
          <h3>Agree on the work and price</h3>
          <p>If you want to work together, we agree in writing on what I will do and what it will cost. That happens before any paid work starts or I send an invoice.</p>
        </article>
      </div>
    </div>
  </section>

  <hr class="rule">

  <!-- THE FORM -->
  <?php render_contact_form([
      'heading' => 'Tell me how I can help',
      'lede'    => 'Fill in the form to prepare a WhatsApp message. You can review and edit it in WhatsApp before sending it. Prefer to call or email? Use the contact details here.',
  ]); ?>

  <!-- FAQ -->
  <section class="section" id="faq" aria-labelledby="faq-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">Before you write</p>
        <h2 id="faq-h" style="margin-block:16px 20px">Questions before you get in touch</h2>
        <p class="lede">Here is what to expect when you contact me.</p>
      </div>

      <div class="faq">
        <details open>
          <summary>How quickly will I hear back?</summary>
          <div class="faq__body"><p><strong>Usually within a working day.</strong> I reply personally, so I may not respond straight away while I am working. If your question is urgent, please call me.</p></div>
        </details>

        <details>
          <summary>Is the audit really free?</summary>
          <div class="faq__body"><p><strong>Yes. The audit is free, and the written summary is yours to keep.</strong> You do not have to hire me afterwards. It helps you understand what needs attention before deciding whether to pay for any work.</p></div>
        </details>

        <details>
          <summary>What should I include in my first message?</summary>
          <div class="faq__body"><p><strong>Your website, your city and what you need help with.</strong> That is enough to start. If you use Google Search Console or Google Analytics to track your website, access to those reports can help later. You do not need them ready before getting in touch.</p></div>
        </details>

        <details>
          <summary>Can you take on every project?</summary>
          <div class="faq__body"><p><strong>Not always.</strong> I work with a small number of clients so I can give each project enough time. I will let you know if I am fully booked or if someone else would be a better fit.</p></div>
        </details>

        <details>
          <summary>Where does the form send my message?</summary>
          <div class="faq__body"><p><strong>It opens WhatsApp with your message filled in.</strong> The form does not submit your message to this website or save it here. You choose whether to send it in WhatsApp, and you can edit it first. WhatsApp is a separate service with its own privacy policy.</p></div>
        </details>
      </div>

    </div>
  </section>

</main>

<?php
render_floating_button();
render_footer();
