<?php
/**
 * Homepage.
 * Copy carried over verbatim from the previous site, with em dashes removed.
 */

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/contact-form.php';
require_once __DIR__ . '/includes/floating-button.php';
require_once __DIR__ . '/includes/footer.php';

// Single editable date for the personal AI-testing statement below.
// Update only after re-testing. Static LLM summaries link to #ai-testing instead
// of duplicating this date; this is not an editorial reviewed_on date.
$ai_testing_as_of = 'September 2026';

$schema = <<<'JSONLD'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Person",
      "@id": "https://fawazbhseo.in/#fawaz",
      "name": "Fawaz BH",
      "jobTitle": "Independent SEO, AEO and GEO Consultant",
      "url": "https://fawazbhseo.in/",
      "image": "https://fawazbhseo.in/assets/images/fawazbh.webp",
      "telephone": "+91-94810-84038",
      "email": [
        "fawazbhseo@gmail.com",
        "admin@fawazbhseo.in"
      ],
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Kushalnagar, Kodagu",
        "addressRegion": "Karnataka",
        "postalCode": "571234",
        "addressCountry": "IN"
      },
      "sameAs": [
        "https://www.linkedin.com/in/fawazbh",
        "https://x.com/fawazbhseo"
      ],
      "knowsAbout": [
        "Search Engine Optimization",
        "Answer Engine Optimization",
        "Generative Engine Optimization",
        "Local SEO",
        "Technical SEO"
      ],
      "worksFor": {
        "@id": "https://fawazbhseo.in/#practice"
      },
      "mainEntityOfPage": [
        "https://fawazbhseo.in/",
        "https://fawazbhseo.in/about"
      ]
    },
    {
      "@type": "ProfessionalService",
      "@id": "https://fawazbhseo.in/#practice",
      "name": "FawazBHSEO",
      "founder": {
        "@id": "https://fawazbhseo.in/#fawaz"
      },
      "url": "https://fawazbhseo.in/",
      "telephone": "+91-94810-84038",
      "priceRange": "Scoped per engagement",
      "areaServed": [
        "Kodagu",
        "Karnataka",
        "South India",
        "India"
      ],
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Kushalnagar, Kodagu",
        "addressRegion": "Karnataka",
        "postalCode": "571234",
        "addressCountry": "IN"
      },
      "alternateName": "Fawaz BH SEO",
      "email": [
        "fawazbhseo@gmail.com",
        "admin@fawazbhseo.in"
      ],
      "sameAs": [
        "https://www.linkedin.com/company/fawazbhseo/",
        "https://www.google.com/maps/place/FAWAZ+BH/@12.4545471,75.9570314,17z/data=!4m6!3m5!1s0x3ba509f61947deaf:0x8e001f641054a1df"
      ]
    },
    {
      "@type": "WebSite",
      "@id": "https://fawazbhseo.in/#website",
      "url": "https://fawazbhseo.in/",
      "name": "FawazBHSEO",
      "publisher": {
        "@id": "https://fawazbhseo.in/#fawaz"
      }
    }
  ]
}
JSONLD;

render_head([
    'title'       => 'Fawaz BH | Independent SEO Consultant, FawazBHSEO',
    'description' => 'Meet Fawaz BH, the independent consultant behind FawazBHSEO in Kushalnagar, Kodagu. Explore his SEO services, background and work, with direct personal delivery.',
    'canonical'   => 'https://fawazbhseo.in/',
    'schema'      => $schema,
]);

render_header('home');
?>

<main id="main">

  <!-- 1. HERO -->
  <section class="hero" aria-labelledby="hero-h">
    <div class="wrap hero__grid">

      <div class="hero__lead reveal">
        <p class="eyebrow">Independent SEO, AEO and GEO consultant, India</p>
        <h1 id="hero-h">Fawaz BH, your independent SEO consultant.</h1>
        <p class="hero__sub">I run FawazBHSEO from Kushalnagar, Kodagu, Karnataka. You work directly with me on technical SEO, content and local search, with AEO and GEO as connected parts of the practice. Explore my background, services and documented work here.</p>
        <p id="ai-seo-route" style="margin-top:18px">Looking specifically at AI search? Read about <a href="/ai-seo-expert-india">my AI SEO consulting approach</a>, including scope, tool use and measurement.</p>
        <div class="btn-row">
          <a class="btn btn--accent" href="https://wa.me/919481084038?text=Hi%20Fawaz%2C%20I%20would%20like%20an%20SEO%20audit" target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 21a9 9 0 1 0-8.5-6.1L2 22l6.5-1.6A9 9 0 0 0 12 21Z"/></svg>
            Request a free audit
          </a>
        </div>
      </div>

      <figure class="hero__figure reveal">
        <img src="/assets/images/fawazbh.webp"
             alt="Fawaz BH, independent SEO, AEO and GEO consultant in India"
             width="440" height="440" fetchpriority="high" decoding="async">
        <figcaption>Fawaz BH, Kushal Nagar, Kodagu</figcaption>
      </figure>

    </div>
  </section>

  <!-- 2. TRUST STRIP -->
  <section class="trust" aria-label="Positioning">
    <div class="wrap">
      <p>Hyperlocal in Kodagu. Certified statewide across Karnataka. <span class="accent">Working with clients nationwide.</span></p>
    </div>
  </section>

  <!-- 3. SERVICES -->
  <section class="section" id="services" aria-labelledby="svc-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">The work</p>
        <h2 id="svc-h">Six disciplines, one search strategy</h2>
        <p class="lede">From classic Google rankings to citation inside AI answers, treated as a single connected system rather than separate services bolted together. Full detail and pricing live on the services page.</p>
      </div>

      <div class="grid grid--3">

        <article class="card card--featured reveal">
          <span class="card-index">01</span>
          <h3>Technical SEO and site architecture audits</h3>
          <p>The foundation of every strong ranking. Detailed technical audits that surface Core Web Vitals failures, render blocking scripts, schema gaps and crawl waste, then fix them.</p>
        </article>

        <article class="card card--featured reveal">
          <span class="card-index">02</span>
          <h3>AEO, answer engine optimisation</h3>
          <p>A large and growing share of buyers now research on ChatGPT and Perplexity before they visit a website. AEO is the discipline of <a href="/aeo-consultant">becoming the answer those AI engines choose to cite</a>.</p>
        </article>

        <article class="card card--featured reveal">
          <span class="card-index">03</span>
          <h3>GEO, generative engine optimisation</h3>
          <p>The newest frontier of search, the discipline of <a href="/geo-consultant">being preferred, paraphrased and recommended by generative AI</a> inside Google's AI Overviews, Perplexity, ChatGPT Search and Bing Copilot.</p>
        </article>

        <article class="card reveal">
          <span class="card-index">04</span>
          <h3>Local SEO for Kodagu, Bengaluru and Karnataka</h3>
          <p>Hyperlocal search is winnable. Geo targeted strategies that help you rank in Google's Local Pack, Maps and near me searches <a href="/cities-we-serve">across Karnataka</a>.</p>
        </article>

        <article class="card reveal">
          <span class="card-index">05</span>
          <h3>SEO content strategy and long form writing</h3>
          <p>Content that ranks on Google and gets paraphrased by AI engines needs a different craft, combining topical authority, semantic density, original insight and AEO ready structure.</p>
        </article>

        <article class="card reveal">
          <span class="card-index">06</span>
          <h3>LinkedIn and personal brand SEO</h3>
          <p>Founders and consultants need their own name to rank, on Google, on LinkedIn search, and inside AI engines when prospects ask who the right provider is in their region.</p>
        </article>

      </div>

      <div class="btn-row reveal" style="margin-top:36px">
        <a class="btn" href="/seo-services">
          See all services, deliverables and pricing
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
      </div>
    </div>
  </section>

  <hr class="rule">

  <!-- 4. PROCESS -->
  <section class="section section--alt" id="process" aria-labelledby="proc-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">How engagements run</p>
        <h2 id="proc-h">A clear path from audit to authority</h2>
      </div>

      <div class="grid grid--2">
        <article class="step reveal">
          <p class="step__k">01, Audit</p>
          <h3>Free discovery audit</h3>
          <p>A focused technical, on page, local and answer engine review that surfaces the real gaps and the fastest available wins for your market. Delivered as a written document you keep, whether or not you hire me.</p>
        </article>

        <article class="step reveal">
          <p class="step__k">02, Strategy</p>
          <h3>Tailored roadmap</h3>
          <p>A prioritised SEO, AEO and GEO plan built around your city, niche, competitors and revenue goals, sequenced so the work that compounds gets shipped first. No recycled templates.</p>
        </article>

        <article class="step reveal">
          <p class="step__k">03, Execution</p>
          <h3>Hands on implementation</h3>
          <p>Technical fixes, structured data, content and authority building, carried out directly by me, not passed down a chain.</p>
        </article>

        <article class="step reveal">
          <p class="step__k">04, Reporting</p>
          <h3>Review and refine</h3>
          <p>Regular reporting on rankings, organic traffic and citation visibility across ChatGPT, Perplexity, Gemini and AI Overviews, with continuous optimisation as those engines change.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- 5. CASE STUDY -->
  <section class="section" id="case-study" aria-labelledby="case-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">Client work</p>
        <h2 id="case-h" style="margin-block:16px 20px">Green Coorg Spices, a local engagement</h2>
        <p class="lede">Green Coorg Spices had no prior website or digital presence. I built its website, which reached first-page Google rankings. Current engagements are neelachandra.com, neelachandrainteriors.com and ilmerastudyabroad.com. I am co-founder of ILMERA and run its digital work; it is not an arm&#8217;s-length client.</p>
        <div class="btn-row" style="margin-top:26px">
          <a class="link-arrow" href="/case-studies">
            Read the full case studies
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </a>
        </div>
      </div>

      <div>
        <figure class="card card--featured quote reveal" style="margin:0">
          <blockquote>"We went from page one being a distant dream to real online orders coming in from Bangalore and Mysore. Fawaz understood the Kodagu market in a way no one else we spoke to did."</blockquote>
          <figcaption>
            <cite>Green Coorg Spices</cite>
            <span class="biz">Spice brand, Kushal Nagar, Kodagu, greencoorgspices.in</span>
            <p class="field-note">The site is currently offline because hosting expired. A rebuilt version is in progress; the historical ranking is not a claim of current visibility.</p>
            <span class="badge badge--accent">Site offline; rebuild in progress</span>
          </figcaption>
        </figure>
      </div>

    </div>
  </section>

  <hr class="rule">

  <section class="section" id="search-guides" aria-labelledby="guides-h">
    <div class="wrap">
      <div class="section-head">
        <p class="eyebrow">Useful starting points</p>
        <h2 id="guides-h">Understand the work before you choose it</h2>
        <p class="lede">Practical guides with clear sources, labelled examples and no ranking promises.</p>
      </div>
      <div class="grid grid--3">
        <article class="card card--link">
          <span class="card-index">Search fundamentals</span>
          <h3><a href="/blogs/seo-aeo-geo-differences">SEO vs AEO vs GEO</a></h3>
          <p>Compare the approaches, see how they overlap and decide what your business should improve first.</p>
        </article>
        <article class="card card--link">
          <span class="card-index">Measurement</span>
          <h3><a href="/blogs/measure-ai-search-visibility">Measure AI search visibility</a></h3>
          <p>Separate mentions from citations and recommendations. Includes a free blank CSV tracking sheet.</p>
        </article>
        <article class="card card--link">
          <span class="card-index">Karnataka local SEO</span>
          <h3><a href="/blogs/local-seo-checklist-karnataka">Check your local search basics</a></h3>
          <p>Review your business profile, local pages, language needs, genuine reviews and enquiry route.</p>
        </article>
      </div>
      <p style="margin-top:28px"><a class="link-arrow" href="/blog">Browse all search guides</a></p>
    </div>
  </section>

  <!-- 6. ABOUT AND CREDIBILITY -->
  <section class="section section--alt" id="about" aria-labelledby="about-h">
    <div class="wrap split">

      <div class="reveal">
        <p class="eyebrow">Why work with me</p>
        <h2 id="about-h" style="margin-block:16px 20px">Local instinct. AI ready method.</h2>
        <p class="lede">I began in SEO in early 2025 and had mastered the full stack, including AEO and GEO, by December 2025. I work solo. There is no agency behind me and no junior team, which is a real constraint as much as it is a selling point.</p>

        <ul class="why-list" style="margin-top:30px">
          <li>
            <span class="idx">01</span>
            <div>
              <h3>You work with me, directly</h3>
              <p>Every audit, strategy call and implementation decision runs through one person. No account managers, no junior handoffs, no diluted execution. If you email me, I answer. That is the whole delivery model.</p>
            </div>
          </li>
          <li>
            <span class="idx">02</span>
            <div>
              <h3>All three disciplines, run as one strategy</h3>
              <p>SEO, AEO and GEO are treated as a single connected system here, not as three line items. Most practitioners in India lead with SEO and attach AI search as an upsell. The entity work, structured data and answer first content that earn AI citations are the same work that earns Google rankings, so I build them together from day one.</p>
            </div>
          </li>
          <li>
            <span class="idx">03</span>
            <div>
              <h3 id="ai-testing">My own AI-search testing</h3>
              <p>In my own testing as of <?php echo htmlspecialchars($ai_testing_as_of, ENT_QUOTES, 'UTF-8'); ?>, ChatGPT, Gemini and Google AI Overviews named me among SEO specialists for Kodagu and Karnataka. I re-test regularly. AI answers vary by prompt and change over time.</p>
              <p class="field-note">These are observations from my own testing, not an independent endorsement or a guarantee. The <a href="/blogs/measure-ai-search-visibility">AI visibility guide</a> explains how to distinguish mentions, citations and recommendations.</p>
            </div>
          </li>
          <li>
            <span class="idx">04</span>
            <div>
              <h3>Regional search fluency</h3>
              <p>Bilingual Kannada and English query mapping and genuine local context for Kodagu, Coorg and Karnataka's tier two markets, the nuance that generic national playbooks miss, applied to clients anywhere in India who face the same tier two dynamics.</p>
            </div>
          </li>
          <li>
            <span class="idx">05</span>
            <div>
              <h3>Transparent, honest reporting</h3>
              <p>Real ranking, traffic and citation visibility data, and candour about what is and is not working. No vanity metrics dressed up as results.</p>
            </div>
          </li>
          <li>
            <span class="idx">06</span>
            <div>
              <h3>I run this playbook on my own company</h3>
              <p>I am co-founder and Marketing Head at <a href="https://ilmerastudyabroad.com" target="_blank" rel="noopener">ILMERA Study Abroad</a>, my own business, not a client. Its search and AI visibility is my responsibility, which means I am running the same SEO, AEO and GEO work on something I own the P and L for.</p>
            </div>
          </li>
        </ul>
      </div>

      <div>
        <figure class="card reveal" style="margin:0 0 24px">
          <img src="/assets/images/fawazbh.webp"
               alt="Portrait of Fawaz BH, SEO consultant based in Kushal Nagar, Kodagu"
               width="440" height="440" loading="lazy" decoding="async"
               style="width:100%;aspect-ratio:1/1;object-fit:cover">
        </figure>

        <dl class="readout reveal">
          <div class="readout__row"><dt>Based in</dt><dd>Kushal Nagar<small>Kodagu, Karnataka</small></dd></div>
          <div class="readout__row"><dt>Certified</dt><dd>Ahrefs and Semrush<small>SEO, AI search, technical</small></dd></div>
          <div class="readout__row"><dt>Serving</dt><dd>Karnataka and India<small>Remote across South India</small></dd></div>
          <div class="readout__row"><dt>Engagement</dt><dd>Direct<small>No agency middlemen</small></dd></div>
        </dl>

        <div class="grid grid--2" style="margin-top:24px">
          <div class="stat reveal">
            <p class="stat__val">4</p>
            <p class="stat__label">Professional certifications</p>
            <p class="stat__note">Ahrefs Academy, Semrush AI Visibility Essentials, Semrush Technical SEO and AI Search Essentials, and an Advanced Diploma in Digital Marketing from Adrex Media School.</p>
          </div>
          <div class="stat reveal">
            <p class="stat__val">5</p>
            <p class="stat__label">Answer engines tracked per client</p>
            <p class="stat__note">ChatGPT, Perplexity, Gemini, Claude and Copilot, each queried separately, because they do not share a source pool.</p>
          </div>
        </div>

        <div class="btn-row reveal" style="margin-top:26px">
          <a class="link-arrow" href="/about">
            Read the full story
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- 7. CONTACT -->
  <?php render_contact_form(); ?>

</main>

<?php
render_floating_button();
render_footer();
