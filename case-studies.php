<?php
/** Client engagement notes and owner-confirmed, WhatsApp-approved testimonials. */

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
      "@type": "CollectionPage",
      "@id": "https://fawazbhseo.in/case-studies#page",
      "url": "https://fawazbhseo.in/case-studies",
      "name": "SEO case studies and client testimonials from Kodagu and Karnataka",
      "about": {
        "@id": "https://fawazbhseo.in/#fawaz"
      }
    },
    {
      "@type": "Article",
      "@id": "https://fawazbhseo.in/case-studies#green-coorg-spices",
      "headline": "Green Coorg Spices, engagement notes and client-approved testimonial",
      "author": {
        "@id": "https://fawazbhseo.in/#fawaz"
      },
      "publisher": {
        "@id": "https://fawazbhseo.in/#fawaz"
      },
      "about": "Local SEO, AEO and GEO for an organic spice brand in Kushal Nagar, Kodagu, Karnataka"
    },
    {
      "@type": "FAQPage",
      "@id": "https://fawazbhseo.in/case-studies#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Are these real clients?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Green Coorg Spices is a client based in Kushal Nagar, Kodagu. The testimonials published on this site were approved by the clients over WhatsApp. Other engagements are identified separately as in progress."
          }
        },
        {
          "@type": "Question",
          "name": "How do I know these SEO results are real, and can I trust them?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Separate the work described from measured results and client feedback. The testimonials were approved by the clients over WhatsApp. No numerical client performance results are published here; an approved quote does not establish an independently measured metric."
          }
        },
        {
          "@type": "Question",
          "name": "How is a case study different from a testimonial?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "A testimonial is the client's approved statement about their experience. A case study describes an engagement and its work. Approval of a testimonial does not independently verify a numerical ranking, traffic, sales or citation claim."
          }
        },
        {
          "@type": "Question",
          "name": "Are the numbers in these case studies verified?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "No numerical client performance results are published on this page. The client-approved testimonials are retained verbatim and should not be treated as quantified performance evidence."
          }
        },
        {
          "@type": "Question",
          "name": "How long does local SEO take to show results in Kodagu?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "There is no fixed result date. Timing depends on the starting site, competition, scope and implementation. A testimonial is not a timeline guarantee for another business."
          }
        },
        {
          "@type": "Question",
          "name": "Can a small Kodagu business outrank bigger Bengaluru or Mysuru brands?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Business size alone does not determine a search result. Assess the query, competition and the usefulness of the site. No particular ranking or competitive outcome is promised."
          }
        },
        {
          "@type": "Question",
          "name": "Can I see more results, or speak to a reference?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Contact Fawaz directly to discuss the published engagement and whether a reference conversation can be arranged with the client's permission. In-progress engagements are not presented as completed results."
          }
        },
        {
          "@type": "Question",
          "name": "Can I get results like these for my business?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Begin with a discovery audit to assess the starting point and agree the scope. Client testimonials describe their own experience and do not guarantee a similar outcome for another business."
          }
        }
      ]
    }
  ]
}
JSONLD;

render_head([
    'title'       => 'SEO case studies and client testimonials from Kodagu and Karnataka',
    'description' => 'SEO, AEO and GEO engagement notes from Kodagu and Karnataka, including Green Coorg Spices, with client-approved testimonials and no unsupported performance figures.',
    'canonical'   => 'https://fawazbhseo.in/case-studies',
    'schema'      => $schema,
]);

render_header('cases');
?>

<main id="main">

  <!-- HERO -->
  <section class="hero" aria-labelledby="hero-h">
    <div class="wrap hero__grid">

      <div class="hero__lead reveal">
        <p class="eyebrow">SEO case studies, real client engagements, Kodagu, Karnataka</p>
        <h1 id="hero-h">Real businesses. Client-approved testimonials. The work, documented.</h1>
        <p class="hero__sub">A working record of what SEO, AEO and GEO look like in practice across <strong>Kodagu, Karnataka and India</strong>. From a Kodagu spice brand competing against bigger-city rivals in Bengaluru and Mysuru, to live engagements still in progress. The testimonials are client-approved; no numerical performance results are published.</p>

        <div class="btn-row">
          <a class="btn btn--accent" href="https://wa.me/919481084038?text=Hi%20Fawaz%2C%20I%20want%20results%20like%20your%20case%20studies" target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 21a9 9 0 1 0-8.5-6.1L2 22l6.5-1.6A9 9 0 0 0 12 21Z"/></svg>
            Get results like these
          </a>
          <a class="btn" href="#cases">
            Read the case studies
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 5v14M6 13l6 6 6-6"/></svg>
          </a>
        </div>

        <div style="margin-top:34px">
          <p class="footer-h" style="margin-bottom:11px">Tracked on the surfaces that matter</p>
          <ul class="tags">
            <li class="tag">Google Search and Local Pack</li>
            <li class="tag">ChatGPT</li>
            <li class="tag">Perplexity</li>
            <li class="tag">Gemini and AI Overviews</li>
            <li class="tag">Google Business Profile</li>
          </ul>
        </div>
      </div>

      <dl class="readout reveal">
        <div class="readout__row"><dt>Focus</dt><dd>SEO, AEO, GEO<small>One connected strategy</small></dd></div>
        <div class="readout__row"><dt>Published study</dt><dd>1 documented<small>Kushal Nagar, Kodagu</small></dd></div>
        <div class="readout__row"><dt>Markets</dt><dd>Karnataka and India<small>2+ campaigns live</small></dd></div>
        <div class="readout__row"><dt>Data source</dt><dd>GSC, GA4, GBP<small>No fabricated stats</small></dd></div>
        <div class="readout__row"><dt>Engagement</dt><dd>Founder led<small>No agency middlemen</small></dd></div>
      </dl>

    </div>
  </section>

  <!-- TRUST STRIP -->
  <section class="trust" aria-label="Reporting standard">
    <div class="wrap">
      <p>Client-approved testimonials. <span class="accent">No unsupported performance figures.</span></p>
    </div>
  </section>

  <!-- HOW TO READ THESE -->
  <section class="section" id="how-to-read" aria-labelledby="read-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">How to read these</p>
        <h2 id="read-h" style="margin-block:16px 20px">Documented work, not vanity claims</h2>
        <p class="lede">Each SEO case study follows the same structure: the challenge as the client actually faced it, the strategy and hands-on execution, and the outcome. Quantified results appear only where a real, tracked number exists. Everything else is left honestly open, so you get genuine proof of SEO results rather than marketing spin.</p>

        <div style="margin-top:30px">
          <p class="footer-h" style="margin-bottom:11px">Who is behind this work</p>
          <ul class="tags">
            <li class="tag">Ahrefs Academy certified</li>
            <li class="tag">Semrush AI Visibility Essentials</li>
            <li class="tag">Semrush Technical SEO and AI Search Essentials</li>
            <li class="tag">Advanced Diploma in Digital Marketing, Adrex Media School</li>
            <li class="tag">Founder led, direct access</li>
          </ul>
          <p class="field-note" style="margin-top:14px;max-width:54ch">Fawaz BH started in SEO in early 2025 and expanded into AEO and GEO as those disciplines emerged, so every engagement below is delivered directly by the practitioner doing the work, not handed down through agency layers.</p>
        </div>
      </div>

      <div class="grid">
        <article class="card reveal">
          <span class="card-index">The client and context</span>
          <h3>Who, where, and the situation</h3>
          <p>Every study names the real business, its industry and its location in Kodagu, Karnataka or the wider India market, and describes the starting point plainly: the visibility gap, the competitors, and what was being lost while the business stayed invisible.</p>
        </article>

        <article class="card reveal">
          <span class="card-index">The work</span>
          <h3>Challenge, strategy, execution, result</h3>
          <p>A repeatable four-step structure runs through each engagement, so you can see exactly what was diagnosed, what was planned, what was actually shipped, and what changed as a result. No black boxes.</p>
        </article>

        <article class="card reveal">
          <span class="card-index">The evidence</span>
          <h3>Feedback is not a metric</h3>
          <p>Client testimonials describe the client experience. They are not a substitute for independently measured results. No numerical client performance results are published on this page.</p>
        </article>

        <article class="card reveal">
          <span class="card-index">The voice</span>
          <h3>Client quotes, honestly labelled</h3>
          <p>The testimonials published on this site were approved by the clients over WhatsApp. Their wording is retained as approved.</p>
        </article>
      </div>

    </div>
  </section>

  <hr class="rule">

  <!-- FLAGSHIP CASE STUDY -->
  <section class="section section--alt" id="cases" aria-labelledby="cases-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">The case study</p>
        <h2 id="cases-h">One flagship case study, more in progress</h2>
        <p class="lede">The Green Coorg Spices engagement is described below alongside its client-approved testimonial. Other engagements are listed separately as in progress, without performance projections.</p>
      </div>

      <article class="card card--featured reveal" aria-labelledby="cs1">
        <ul class="tags">
          <li class="tag">Spice brand</li>
          <li class="tag">Kushal Nagar, Kodagu</li>
          <li class="tag">Local SEO</li>
          <li class="tag">AEO and GEO</li>
        </ul>
        <span class="card-index">Case Study 01, organic spice brand, Kushal Nagar, Kodagu</span>
        <h3 id="cs1">Green Coorg Spices</h3>
        <p>Green Coorg Spices is a spice brand in Kushal Nagar, Kodagu. This write-up describes the engagement and includes the client-approved testimonial below.</p>

        <p class="field-note" style="margin-top:18px">Read the work described below and the client-approved testimonial. No numerical performance claim is attached to this engagement.</p>
      </article>
    </div>
  </section>

  <!-- CASE STUDY 01, PROCESS AND RESULTS -->
  <section class="section" id="cs1-detail" aria-labelledby="cs1d-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Case Study 01, Green Coorg Spices</p>
        <h2 id="cs1d-h">The work and the client testimonial</h2>
        <p class="lede">Challenge, strategy, execution, result.</p>
      </div>

      <div class="grid grid--2">
        <article class="step reveal">
          <p class="step__k">01, Challenge</p>
          <h3>The search context</h3>
          <p>The engagement concerned how a Kodagu spice brand presents its products and business information to people searching online.</p>
        </article>

        <article class="step reveal">
          <p class="step__k">02, Strategy</p>
          <h3>Hyperlocal-first plan</h3>
          <p>Fix the technical foundation, then dominate locally with Google Business Profile, Kodagu-specific landing pages and citations, before layering in answer-engine-ready content.</p>
        </article>

        <article class="step reveal">
          <p class="step__k">03, Execution</p>
          <h3>Audit to local to content</h3>
          <p>Site audit and technical fixes, Core Web Vitals and conversion tracking set up; Google Business Profile optimised and local citations built; geo-targeted landing pages and pillar articles with FAQ schema and entity-rich AEO formatting published.</p>
        </article>

        <article class="step reveal">
          <p class="step__k">04, Feedback</p>
          <h3>Client feedback</h3>
          <p>The client-approved testimonial below records the client experience in their own words. It is not presented as an independently measured ranking, traffic, order-growth or AI-citation result.</p>
        </article>
      </div>

      <div class="grid grid--2" style="margin-top:clamp(40px,6vw,64px)">
        <figure class="card card--featured quote reveal" style="margin:0">
          <blockquote>&#8220;Fawaz helped us reach the first page of Google, and our online orders from Bengaluru and Mysuru have grown. He genuinely understood the Kodagu market.&#8221;</blockquote>
          <figcaption>
            <cite>Green Coorg Spices</cite>
            <span class="biz">Spice brand, Kushal Nagar, Kodagu</span>
            <span class="badge">Client-approved testimonial</span>
          </figcaption>
        </figure>

        <figure class="card quote reveal" style="margin:0">
          <blockquote>The engagement write-up explains the work; the approved testimonial preserves the client voice. Neither supplies a numerical forecast for another business.</blockquote>
          <figcaption>
            <cite>Why it matters</cite>
            <span class="biz">Analysis, Fawaz BH</span>
          </figcaption>
        </figure>
      </div>
    </div>
  </section>

  <hr class="rule">

  <!-- IN PROGRESS -->
  <section class="section section--alt" id="in-progress" aria-labelledby="ip-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">In progress</p>
        <h2 id="ip-h">Live campaigns, publishing on completion</h2>
        <p class="lede">Active engagements across Karnataka and Bengaluru that will be written up in full once they hit a verifiable milestone, with real numbers rather than projections.</p>
      </div>

      <div class="grid grid--3">
        <article class="card reveal" aria-labelledby="ip1">
          <span class="card-index">Campaign active</span>
          <h3 id="ip1">Hospitality and homestay, Madikeri</h3>
          <p>A hospitality and homestay client in Madikeri, Kodagu, with a campaign actively underway. The full case study publishes once a verifiable milestone is reached and results are confirmed.</p>
          <ul class="tags" style="margin:16px 0 0">
            <li class="tag">Hospitality</li>
            <li class="tag">Madikeri, Kodagu</li>
          </ul>
        </article>

        <article class="card reveal" aria-labelledby="ip2">
          <span class="card-index">Campaign active</span>
          <h3 id="ip2">Multi-speciality healthcare clinic, Karnataka</h3>
          <p>A multi-speciality healthcare clinic in Karnataka with a local ranking campaign in progress. A detailed case study is scheduled for publication once the engagement&#8217;s results are confirmed.</p>
          <ul class="tags" style="margin:16px 0 0">
            <li class="tag">Healthcare</li>
            <li class="tag">Karnataka</li>
          </ul>
        </article>

        <article class="card reveal" aria-labelledby="ip3">
          <span class="card-index">Campaign active</span>
          <h3 id="ip3"><a href="https://neelachandra.com" target="_blank" rel="noopener nofollow">Neelachandra Construction and Interiors</a>, Bengaluru</h3>
          <p>A construction and interiors business in Bengaluru with a live engagement covering web development and digital marketing, including SEO, technical fixes and social content. The full case study publishes once the engagement reaches a verifiable milestone.</p>
          <ul class="tags" style="margin:16px 0 0">
            <li class="tag">Construction and interiors</li>
            <li class="tag">Bengaluru</li>
          </ul>
        </article>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="section" id="faq" aria-labelledby="faq-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">Questions</p>
        <h2 id="faq-h" style="margin-block:16px 20px">About these results</h2>
        <p class="lede">Answer-first, and structured so answer engines can quote them cleanly, grounded in the documented engagements above.</p>
      </div>

      <div class="faq">
        <details open>
          <summary>Are these real clients?</summary>
          <div class="faq__body"><p>Yes. Green Coorg Spices is a client based in Kushal Nagar, Kodagu. The testimonials published on this site were approved by the clients over WhatsApp. Other engagements are identified separately as in progress.</p></div>
        </details>

        <details>
          <summary>How do I know these SEO results are real, and can I trust them?</summary>
          <div class="faq__body"><p>Separate the work described from measured results and client feedback. The testimonials were approved by the clients over WhatsApp. No numerical client performance results are published here; an approved quote does not establish an independently measured metric.</p></div>
        </details>

        <details>
          <summary>How is a case study different from a testimonial?</summary>
          <div class="faq__body"><p>A testimonial is the client's approved statement about their experience. A case study describes an engagement and its work. Approval of a testimonial does not independently verify a numerical ranking, traffic, sales or citation claim.</p></div>
        </details>

        <details>
          <summary>Are the numbers in these case studies verified?</summary>
          <div class="faq__body"><p>No numerical client performance results are published on this page. The client-approved testimonials are retained verbatim and should not be treated as quantified performance evidence.</p></div>
        </details>

        <details>
          <summary>How long does local SEO take to show results in Kodagu?</summary>
          <div class="faq__body"><p>There is no fixed result date. Timing depends on the starting site, competition, scope and implementation. A testimonial is not a timeline guarantee for another business.</p></div>
        </details>

        <details>
          <summary>Can a small Kodagu business outrank bigger Bengaluru or Mysuru brands?</summary>
          <div class="faq__body"><p>Business size alone does not determine a search result. Assess the query, competition and the usefulness of the site. No particular ranking or competitive outcome is promised.</p></div>
        </details>

        <details>
          <summary>Can I see more results, or speak to a reference?</summary>
          <div class="faq__body"><p>Contact Fawaz directly to discuss the published engagement and whether a reference conversation can be arranged with the client's permission. In-progress engagements are not presented as completed results.</p></div>
        </details>

        <details>
          <summary>Can I get results like these for my business?</summary>
          <div class="faq__body"><p>Begin with a discovery audit to assess the starting point and agree the scope. Client testimonials describe their own experience and do not guarantee a similar outcome for another business.</p></div>
        </details>
      </div>

    </div>
  </section>

  <?php render_contact_form([
      'heading' => 'Ready to be the next case study?',
      'lede'    => 'Book a free 30 minute audit. I will show you where you are losing visibility on Google and in AI answers, and the exact path to results like the ones above.',
  ]); ?>

</main>

<?php
render_floating_button();
render_footer();
