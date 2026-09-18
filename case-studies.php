<?php
/**
 * Case studies page.
 * Copy carried over verbatim from the previous case studies page, with em
 * dashes removed. The pending metric placeholders are kept exactly as they
 * were, because the standard on this page is verified figures or an explicit
 * placeholder, never an invented number.
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
      "@type": "CollectionPage",
      "@id": "https://fawazbhseo.in/case-studies#page",
      "url": "https://fawazbhseo.in/case-studies",
      "name": "SEO case studies, real client results from Kodagu and Karnataka",
      "about": {"@id": "https://fawazbhseo.in/#fawaz"}
    },
    {
      "@type": "Article",
      "@id": "https://fawazbhseo.in/case-studies#green-coorg-spices",
      "headline": "Green Coorg Spices, from invisible to page one in Kodagu",
      "author": {"@id": "https://fawazbhseo.in/#fawaz"},
      "publisher": {"@id": "https://fawazbhseo.in/#fawaz"},
      "about": "Local SEO, AEO and GEO for an organic spice brand in Kushal Nagar, Kodagu, Karnataka"
    },
    {
      "@type": "FAQPage",
      "@id": "https://fawazbhseo.in/case-studies#faq",
      "mainEntity": [
        {"@type": "Question", "name": "Are these real clients?", "acceptedAnswer": {"@type": "Answer", "text": "Yes. Green Coorg Spices is a genuine client based in Kushal Nagar, Kodagu. The engagement is documented with the actual challenge, the strategy and execution, and the outcome. Further live engagements in Madikeri, Karnataka and Bengaluru are listed as in progress and will publish once they reach a verifiable milestone."}},
        {"@type": "Question", "name": "How do I know these SEO results are real, and can I trust them?", "acceptedAnswer": {"@type": "Answer", "text": "You can trust an SEO case study only when every claim traces back to a real, checkable source, which is exactly the convention used on this page. Confirmed figures are shown as metrics tracked through Google Search Console, GA4 and Google Business Profile insights. Anything not yet verified is left as a clearly marked placeholder rather than a made-up number."}},
        {"@type": "Question", "name": "How is a case study different from a testimonial?", "acceptedAnswer": {"@type": "Answer", "text": "A testimonial is the client's short quote; a case study is the full record of the work behind it. Each case study here breaks the engagement into challenge, strategy, execution and result, and separates verified metrics from figures still being confirmed."}},
        {"@type": "Question", "name": "Are the numbers in these case studies verified?", "acceptedAnswer": {"@type": "Answer", "text": "Only confirmed figures are shown as metrics; anything not yet verified is left as a clearly marked placeholder rather than a made-up number. Results are tracked through Google Search Console, GA4 and Google Business Profile insights."}},
        {"@type": "Question", "name": "How long does local SEO take to show results in Kodagu?", "acceptedAnswer": {"@type": "Answer", "text": "For local businesses in Kodagu and tier-2 Karnataka markets, meaningful movement typically appears within a few months. The Green Coorg Spices engagement reached Google's first page for target spice keywords in roughly four months. Competitive metros like Bengaluru usually take longer."}},
        {"@type": "Question", "name": "Can a small Kodagu business outrank bigger Bengaluru or Mysuru brands?", "acceptedAnswer": {"@type": "Answer", "text": "Yes. The Green Coorg Spices case study shows a small Kushal Nagar brand ranking on page one against larger city competitors for its core searches. A hyperlocal strategy built around how people actually search in Kodagu can beat a bigger budget."}},
        {"@type": "Question", "name": "Can I see more results, or speak to a reference?", "acceptedAnswer": {"@type": "Answer", "text": "Two further engagements are active and will publish in full once they hit their milestones, a Madikeri hospitality and homestay campaign, a Karnataka multi-speciality healthcare clinic and a Bengaluru construction and interiors business. For a reference conversation the fastest route is a short WhatsApp message or a call."}},
        {"@type": "Question", "name": "Can I get results like these for my business?", "acceptedAnswer": {"@type": "Answer", "text": "The engagements start with a free discovery audit, followed by a tailored SEO, AEO and GEO roadmap for your city, niche and competitors, hands-on execution, and honest reporting. Every engagement is handled directly, with no agency layers."}}
      ]
    }
  ]
}
JSONLD;

render_head([
    'title'       => 'SEO case studies, real client results from Kodagu and Karnataka',
    'description' => 'Documented SEO, AEO and GEO engagements from Kodagu and Karnataka, including Green Coorg Spices. Verified figures only, with pending numbers marked rather than invented.',
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
        <h1 id="hero-h">Real businesses. Real rankings. The work, documented.</h1>
        <p class="hero__sub">A working record of what SEO, AEO and GEO look like in practice across <strong>Kodagu, Karnataka and India</strong>. From a Kodagu spice brand competing against bigger-city rivals in Bengaluru and Mysuru, to live engagements still in progress. Every study here is a genuine engagement, and numbers are shown only once verified.</p>

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
      <p>Verified figures only. <span class="accent">No fabricated stats, ever.</span></p>
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
          <h3>Numbers only when verified</h3>
          <p>Where a result is backed by tracked data from Google Search Console, GA4 or Google Business Profile insights, it is shown as a metric. Where a figure has not been confirmed yet, it is marked as a pending placeholder rather than invented. Verified-only reporting matters because a case study is only trustworthy if you can trace every claim back to a real source, which is exactly the standard used here. No fabricated stats, ever.</p>
        </article>

        <article class="card reveal">
          <span class="card-index">The voice</span>
          <h3>Client quotes, honestly labelled</h3>
          <p>Client testimonials tied to each study are shown as real quotes, and any wording still awaiting the client&#8217;s sign-off is clearly marked as pending approval. The same standard used across the rest of the site.</p>
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
        <p class="lede">A single fully documented engagement is published in detail below, with two further campaigns live and publishing on completion. This is real SEO client results from Kodagu, Karnataka. Numbers are tracked via Google Search Console, GA4 and Google Business Profile insights, and shown here only once verified.</p>
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
        <p>A premium organic spice brand in the heart of Kodagu&#8217;s spice country had near-zero online visibility. Despite superior product quality, competing brands from Bengaluru and Mysuru consistently outranked it on Google for high-intent searches like &#8220;coorg spices online&#8221; and &#8220;buy kodagu spices&#8221;, so ready-to-buy customers were being lost every day.</p>

        <div class="grid grid--2" style="margin-top:24px">
          <div class="stat">
            <p class="stat__label" style="margin-top:0">Before</p>
            <p class="stat__note">Near-invisible on Google; out-ranked by larger Bengaluru and Mysuru brands for its own core spice searches.</p>
          </div>
          <div class="stat">
            <p class="stat__label" style="margin-top:0">After</p>
            <p class="stat__note">Ranking on Google&#8217;s first page for target Kodagu spice keywords within roughly four months, with online orders growing and first AI-engine citations appearing.</p>
          </div>
        </div>

        <p class="field-note" style="margin-top:18px">Full approach in the process block below. Exact ranking positions, traffic and order figures are held for verification, shown in the results block.</p>
      </article>
    </div>
  </section>

  <!-- CASE STUDY 01, PROCESS AND RESULTS -->
  <section class="section" id="cs1-detail" aria-labelledby="cs1d-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Case Study 01, Green Coorg Spices</p>
        <h2 id="cs1d-h">From invisible to page one in Kodagu</h2>
        <p class="lede">Challenge, strategy, execution, result.</p>
      </div>

      <div class="grid grid--2">
        <article class="step reveal">
          <p class="step__k">01, Challenge</p>
          <h3>No visibility, strong product</h3>
          <p>A quality Kodagu spice brand ranking nowhere for its own high-intent searches, while Bengaluru and Mysuru competitors captured the demand it should have owned.</p>
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
          <p class="step__k">04, Result</p>
          <h3>First-page and first citations</h3>
          <p>Reached Google&#8217;s first page for target Kodagu spice keywords within roughly four months, with online orders growing and the brand starting to appear in AI answer engines.</p>
        </article>
      </div>

      <div class="split" style="margin-top:clamp(48px,7vw,84px)">

        <div class="reveal">
          <p class="eyebrow">Verified so far</p>
          <div class="stat" style="margin-top:18px">
            <p class="stat__val">~4 mo</p>
            <p class="stat__label">To first page</p>
            <p class="stat__note">Approx. time to reach Google page one for target Kodagu spice keywords.</p>
          </div>
          <p class="field-note" style="margin-top:16px;max-width:48ch">Only the timeframe is shown as a confirmed figure. Traffic, keyword counts, order growth and specific ranking positions are held pending verification, listed opposite.</p>
        </div>

        <div class="reveal">
          <p class="eyebrow">Awaiting verified data</p>
          <ul class="why-list" style="margin-top:14px">
            <li>
              <span class="idx">01</span>
              <div>
                <h3>Organic traffic increase</h3>
                <p><span class="placeholder-flag">Add verified metric</span> Organic traffic percentage from GA4 and Search Console.</p>
              </div>
            </li>
            <li>
              <span class="idx">02</span>
              <div>
                <h3>Keywords on page one</h3>
                <p><span class="placeholder-flag">Add verified metric</span> Number of target keywords ranking on Google page one.</p>
              </div>
            </li>
            <li>
              <span class="idx">03</span>
              <div>
                <h3>Online orders growth</h3>
                <p><span class="placeholder-flag">Add verified metric</span> Confirmed order or revenue growth multiple.</p>
              </div>
            </li>
            <li>
              <span class="idx">04</span>
              <div>
                <h3>AI-engine citations</h3>
                <p><span class="placeholder-flag">Add verified evidence</span> Which engines cite the brand, with a linkable example screenshot or URL.</p>
              </div>
            </li>
          </ul>
        </div>

      </div>

      <div class="grid grid--2" style="margin-top:clamp(40px,6vw,64px)">
        <figure class="card card--featured quote reveal" style="margin:0">
          <blockquote>&#8220;Fawaz helped us reach the first page of Google, and our online orders from Bengaluru and Mysuru have grown. He genuinely understood the Kodagu market.&#8221;</blockquote>
          <figcaption>
            <cite>Green Coorg Spices</cite>
            <span class="biz">Spice brand, Kushal Nagar, Kodagu</span>
            <span class="badge">Real client, wording pending approval</span>
          </figcaption>
        </figure>

        <figure class="card quote reveal" style="margin:0">
          <blockquote>A local Kodagu business competing against larger Bengaluru brands, and winning on Google, shows that a precise hyperlocal strategy can beat a bigger budget.</blockquote>
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
          <div class="faq__body"><p><strong>Yes. Green Coorg Spices is a genuine client based in Kushal Nagar, Kodagu.</strong> The engagement is documented above with the actual challenge, the strategy and execution, and the outcome. Further live engagements in Madikeri, Karnataka and Bengaluru are listed as in progress and will publish once they reach a verifiable milestone. Quotes are real; any wording still awaiting the client&#8217;s sign-off is clearly marked as pending approval.</p></div>
        </details>

        <details>
          <summary>How do I know these SEO results are real, and can I trust them?</summary>
          <div class="faq__body">
            <p><strong>You can trust an SEO case study only when every claim traces back to a real, checkable source, which is exactly the convention used on this page.</strong> Confirmed figures are shown as metrics tracked through Google Search Console, GA4 and Google Business Profile insights. Anything not yet verified is left as a clearly marked placeholder, for example &#8220;add verified metric&#8221;, rather than a made-up number.</p>
            <p>That verified-or-placeholder standard is the honest way to report results: it means the page will never show a statistic that cannot be backed up, so when you do see a number here, it is a real one.</p>
          </div>
        </details>

        <details>
          <summary>How is a case study different from a testimonial?</summary>
          <div class="faq__body"><p><strong>A testimonial is the client&#8217;s short quote; a case study is the full record of the work behind it.</strong> Each case study here breaks the engagement into challenge, strategy, execution and result, and separates verified metrics from figures still being confirmed. A testimonial tells you a client was happy; a case study shows you exactly what was done and what changed.</p></div>
        </details>

        <details>
          <summary>Are the numbers in these case studies verified?</summary>
          <div class="faq__body"><p><strong>Only confirmed figures are shown as metrics; anything not yet verified is left as a clearly marked placeholder rather than a made-up number.</strong> Results are tracked through Google Search Console, GA4 and Google Business Profile insights, and each study is updated as those figures are confirmed. This site does not publish fabricated statistics.</p></div>
        </details>

        <details>
          <summary>How long does local SEO take to show results in Kodagu?</summary>
          <div class="faq__body"><p><strong>For local businesses in Kodagu and tier-2 Karnataka markets, meaningful movement typically appears within a few months.</strong> The Green Coorg Spices engagement reached Google&#8217;s first page for target spice keywords in roughly four months. Exact timelines depend on competition, domain history, the technical starting point and how quickly work can be shipped; competitive metros like Bengaluru usually take longer.</p></div>
        </details>

        <details>
          <summary>Can a small Kodagu business outrank bigger Bengaluru or Mysuru brands?</summary>
          <div class="faq__body"><p><strong>Yes. The Green Coorg Spices case study shows a small Kushal Nagar brand ranking on page one against larger city competitors for its core searches.</strong> A hyperlocal strategy built around how people actually search in Kodagu can beat a bigger budget, because it targets intent and local relevance that broad national campaigns tend to miss.</p></div>
        </details>

        <details>
          <summary>Can I see more results, or speak to a reference?</summary>
          <div class="faq__body"><p><strong>Two further engagements are active and will publish in full once they hit their milestones</strong>, a Madikeri hospitality and homestay campaign, a Karnataka multi-speciality healthcare clinic and a Bengaluru construction and interiors business. For a reference conversation or to discuss which examples are closest to your situation, the fastest route is a short WhatsApp message or a call.</p></div>
        </details>

        <details>
          <summary>Can I get results like these for my business?</summary>
          <div class="faq__body"><p><strong>The engagements above start with a free discovery audit</strong>, followed by a tailored SEO, AEO and GEO roadmap for your city, niche and competitors, hands-on execution, and honest reporting. Every engagement is handled directly, with no agency layers. The fastest way to start is a short WhatsApp message or a call.</p></div>
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
