<?php
/**
 * About page.
 * Copy carried over verbatim from the previous about page, with em dashes
 * removed. Nothing here is rewritten or embellished.
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
      "@type": "AboutPage",
      "@id": "https://fawazbhseo.in/about#page",
      "url": "https://fawazbhseo.in/about",
      "name": "About Fawaz BH, SEO, AEO and GEO consultant in Kodagu, Karnataka",
      "mainEntity": {
        "@id": "https://fawazbhseo.in/#fawaz"
      }
    },
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
      "hasCredential": [
        {
          "@type": "EducationalOccupationalCredential",
          "name": "Ahrefs Academy Certification",
          "recognizedBy": {
            "@type": "Organization",
            "name": "Ahrefs"
          }
        },
        {
          "@type": "EducationalOccupationalCredential",
          "name": "Semrush AI Visibility Essentials",
          "recognizedBy": {
            "@type": "Organization",
            "name": "Semrush"
          }
        },
        {
          "@type": "EducationalOccupationalCredential",
          "name": "Semrush Technical SEO and AI Search Essentials",
          "recognizedBy": {
            "@type": "Organization",
            "name": "Semrush"
          }
        },
        {
          "@type": "EducationalOccupationalCredential",
          "name": "Advanced Diploma in Digital Marketing",
          "recognizedBy": {
            "@type": "Organization",
            "name": "Adrex Media School"
          }
        }
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
      "@type": "FAQPage",
      "@id": "https://fawazbhseo.in/about#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Who is Fawaz BH?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Fawaz BH is an independent SEO, AEO and GEO consultant based in Kushal Nagar, Kodagu, Karnataka, India. He helps businesses across Karnataka and South India rank on Google and structure their expertise so AI answer engines like ChatGPT, Perplexity and Gemini cite them as the source. Every engagement is handled directly by Fawaz, without agency layers."
          }
        },
        {
          "@type": "Question",
          "name": "What certifications does Fawaz BH have?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Fawaz BH holds an Ahrefs Academy certification, a Semrush AI Visibility Essentials certification, a Semrush Technical SEO and AI Search Essentials certification, and an Advanced Diploma in Digital Marketing from Adrex Media School."
          }
        },
        {
          "@type": "Question",
          "name": "Why work with an independent consultant instead of an agency?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "You work directly with one consultant on every part of the engagement. There are no account managers, no junior handoffs and no black-box reporting. The trade-off is deliberate scale: a small client list rather than a factory, which means deeper attention and hands-on execution on each project."
          }
        },
        {
          "@type": "Question",
          "name": "Does Fawaz BH work alone?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes, and that is a deliberate choice. You work directly with Fawaz on every part of an engagement: the audit, the strategy, the structured data, the content direction. The client list is kept small on purpose so each project gets real attention rather than being processed through a factory."
          }
        },
        {
          "@type": "Question",
          "name": "What is the background of Fawaz BH?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Fawaz BH started in SEO in early 2025, building a foundation in technical SEO, on-page architecture and local search, then expanded into AEO and GEO as those disciplines emerged. He now runs SEO, AEO and GEO as one connected strategy, backed by certifications from Ahrefs and Semrush and an Advanced Diploma in Digital Marketing from Adrex Media School."
          }
        },
        {
          "@type": "Question",
          "name": "Why is Fawaz BH based in Kodagu?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Being genuinely local somewhere makes Fawaz better at search everywhere. Kodagu is home, and living in a tier-2 market gives first-hand understanding of bilingual Kannada-English queries, seasonal tourism demand around Coorg, and how people here actually search."
          }
        },
        {
          "@type": "Question",
          "name": "Does Fawaz BH only work with businesses in Karnataka?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "No. The local expertise of Fawaz BH is strongest in Kodagu and Karnataka, but he takes remote engagements across South India, including Hyderabad, Chennai, Kochi and Coimbatore, and the rest of India, plus a small number of AEO and GEO projects beyond India."
          }
        },
        {
          "@type": "Question",
          "name": "How do I start working with Fawaz BH?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Reach out directly for a free discovery audit. Message Fawaz on WhatsApp or LinkedIn, or call, and he will review where you are losing visibility on Google and in AI answers, and lay out the path to fixing it before you commit to anything."
          }
        }
      ]
    }
  ]
}
JSONLD;

render_head([
    'title'       => 'About Fawaz BH, SEO, AEO and GEO consultant in Kodagu, Karnataka',
    'description' => 'Who is Fawaz BH? An independent SEO, AEO and GEO consultant based in Kushal Nagar, Kodagu, Karnataka. My story, certifications, method, and why I run every engagement directly.',
    'canonical'   => 'https://fawazbhseo.in/about',
    'schema'      => $schema,
]);

render_header('about');
?>

<main id="main">

  <!-- HERO -->
  <section class="hero" aria-labelledby="hero-h">
    <div class="wrap hero__grid">

      <div class="hero__lead reveal">
        <p class="eyebrow">The person behind the audits, Kushal Nagar, Kodagu, Karnataka</p>
        <h1 id="hero-h">I&#8217;m Fawaz BH. I make businesses the answer people are given.</h1>
        <p class="hero__sub">I&#8217;m <strong>Fawaz BH</strong>, an independent SEO, AEO and GEO consultant working from <strong>Kushal Nagar, Kodagu, in Karnataka</strong>. I got into search because I watched genuinely good local businesses stay invisible online, and I&#8217;ve spent my time since turning search visibility into something measurable, honest and personally owned. Every audit, every strategy, every line of structured data runs through me directly.</p>

        <div class="btn-row">
          <a class="btn btn--accent" href="https://wa.me/919481084038?text=Hi%20Fawaz%2C%20I%20would%20like%20to%20work%20with%20you" target="_blank" rel="noopener">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M12 21a9 9 0 1 0-8.5-6.1L2 22l6.5-1.6A9 9 0 0 0 12 21Z"/></svg>
            Message me on WhatsApp
          </a>
          <a class="btn" href="https://www.linkedin.com/in/fawazbh" target="_blank" rel="noopener">
            Connect on LinkedIn
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </a>
        </div>

        <div style="margin-top:34px">
          <p class="footer-h" style="margin-bottom:11px">The engines I optimise for, every day</p>
          <ul class="tags">
            <li class="tag">ChatGPT</li>
            <li class="tag">Perplexity</li>
            <li class="tag">Google Gemini and AI Overviews</li>
            <li class="tag">Claude</li>
            <li class="tag">Copilot</li>
          </ul>
        </div>
      </div>

      <div>
        <figure class="hero__figure reveal" style="margin-bottom:22px">
          <img src="/assets/images/fawazbh.webp"
               alt="Fawaz BH, independent SEO, AEO and GEO consultant based in Kushal Nagar, Kodagu, Karnataka"
               width="440" height="440" fetchpriority="high" decoding="async">
          <figcaption>Fawaz BH, Kushal Nagar, Kodagu</figcaption>
        </figure>

        <dl class="readout reveal">
          <div class="readout__row"><dt>Based in</dt><dd>Kushal Nagar<small>Kodagu, Karnataka</small></dd></div>
          <div class="readout__row"><dt>Background</dt><dd>SEO first<small>Then AEO and GEO</small></dd></div>
          <div class="readout__row"><dt>Focus</dt><dd>SEO, AEO, GEO<small>One connected strategy</small></dd></div>
          <div class="readout__row"><dt>Approach</dt><dd>Direct<small>Independent, hands on</small></dd></div>
        </dl>
      </div>

    </div>
  </section>

  <!-- TRUST STRIP -->
  <section class="trust" aria-label="Positioning">
    <div class="wrap">
      <p>One person on your account. <span class="accent">From the first audit to ongoing optimisation.</span></p>
    </div>
  </section>

  <!-- MY STORY -->
  <section class="section" id="story" aria-labelledby="story-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">My story</p>
        <h2 id="story-h" style="margin-block:16px 20px">Who is Fawaz BH, and where I&#8217;m going</h2>
        <p class="lede">I didn&#8217;t come to search through a big agency or a famous city. I came to it because I could see the gap between the quality of the businesses around me and how invisible they were online, and I wanted to close it.</p>
      </div>

      <div class="grid">
        <article class="card reveal">
          <span class="card-index">Where I started</span>
          <h3>Growing up in Kodagu</h3>
          <p>I grew up in Kushal Nagar, in Kodagu (Coorg), a region full of world-class homestays, spice brands and small boutiques that were quietly excellent and almost completely undiscoverable online. Watching genuinely good businesses lose customers to weaker, better-optimised competitors is the problem that pulled me into search in the first place. That is the origin of my work as an SEO consultant in Kodagu.</p>
        </article>

        <article class="card reveal">
          <span class="card-index">What I learned</span>
          <h3>SEO first, then AEO and GEO</h3>
          <p>I started in SEO in early 2025, building my foundation in the fundamentals: technical SEO, on-page architecture and local search, because they still decide who gets found. As <a href="/aeo-consultant">Answer Engine Optimisation</a> and <a href="/geo-consultant">Generative Engine Optimisation</a> emerged as distinct disciplines, I expanded into them: the newer skills that get a brand cited inside AI-generated answers, not just ranked in a list of blue links. Treating all of it as one connected system, rather than separate services, is the core of how I work as a combined SEO, AEO and GEO consultant.</p>
        </article>

        <article class="card reveal">
          <span class="card-index">Why Kodagu</span>
          <h3>Rooted on purpose</h3>
          <p>I could run this practice from anywhere, but I choose to run it from Kodagu. Living in a tier-2 market gives me something national agencies rarely have: a real, first-hand feel for bilingual Kannada-English search, seasonal tourism demand, and the specific way people here actually look for things. That instinct travels well, but it starts with being genuinely local somewhere. It is also why businesses look for an SEO consultant in Kushal Nagar and across Kodagu who understands the region from the inside.</p>
        </article>

        <article class="card reveal">
          <span class="card-index">What I do now</span>
          <h3>One person, whole strategy</h3>
          <p>My current engagements are neelachandra.com, neelachandrainteriors.com and ilmerastudyabroad.com. I am co-founder of ILMERA Study Abroad and run its digital work; it is my own venture, not an arm&#8217;s-length client. Every engagement is handled personally, end to end. No account managers, no junior handoffs, no diluted execution. Just me, your search visibility, and a method built for both Google and the answer engines. That is what being an independent SEO, AEO and GEO consultant in Karnataka means in practice.</p>
        </article>
      </div>

    </div>
  </section>

  <hr class="rule">

  <!-- CERTIFICATIONS -->
  <section class="section section--alt" id="credentials" aria-labelledby="cred-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">Certifications and training</p>
        <h2 id="cred-h">How I&#8217;m qualified</h2>
        <p class="lede">My method is grounded in formal training in search and digital marketing. These are the certifications and the diploma behind the work.</p>
      </div>

      <div class="grid grid--2">
        <article class="card card--featured reveal">
          <span class="card-index">Ahrefs</span>
          <h3>Ahrefs Academy Certification</h3>
          <p>Search engine optimisation training from Ahrefs, covering keyword research, on-page and technical SEO, and link analysis.</p>
        </article>

        <article class="card card--featured reveal">
          <span class="card-index">Semrush</span>
          <h3>Semrush AI Visibility Essentials</h3>
          <p>Certification from Semrush focused on brand visibility across AI answer engines, directly underpinning my AEO and GEO work.</p>
        </article>

        <article class="card reveal">
          <span class="card-index">Semrush</span>
          <h3>Semrush Technical SEO and AI Search Essentials</h3>
          <p>Certification from Semrush covering technical SEO fundamentals and optimisation for AI-driven search results.</p>
        </article>

        <article class="card reveal">
          <span class="card-index">Adrex Media School</span>
          <h3>Advanced Diploma in Digital Marketing</h3>
          <p>Awarded by Adrex Media School, providing the broader digital marketing foundation my SEO, AEO and GEO practice is built on.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- HOW ENGAGEMENTS RUN -->
  <section class="section" id="process" aria-labelledby="proc-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">How I work with you</p>
        <h2 id="proc-h">A clear path from audit to authority</h2>
      </div>

      <div class="grid grid--2">
        <article class="step reveal">
          <p class="step__k">01, Audit</p>
          <h3>Free discovery audit</h3>
          <p>A focused technical, on-page, local and answer-engine review that surfaces the real gaps and the fastest available wins for your market.</p>
        </article>

        <article class="step reveal">
          <p class="step__k">02, Strategy</p>
          <h3>Tailored roadmap</h3>
          <p>A prioritised SEO, AEO and GEO plan built around your city, niche, competitors and revenue goals. No recycled templates.</p>
        </article>

        <article class="step reveal">
          <p class="step__k">03, Execution</p>
          <h3>Hands-on implementation</h3>
          <p>Technical fixes, structured data, content and authority-building, carried out directly by me, not passed down a chain.</p>
        </article>

        <article class="step reveal">
          <p class="step__k">04, Compounding</p>
          <h3>Review and refine</h3>
          <p>Regular reporting on rankings, traffic and citation visibility, with continuous optimisation as the engines evolve.</p>
        </article>
      </div>
    </div>
  </section>

  <hr class="rule">

  <!-- PRINCIPLES -->
  <section class="section section--alt" id="principles" aria-labelledby="prin-h">
    <div class="wrap split">

      <div class="reveal">
        <p class="eyebrow">The principles behind my work</p>
        <h2 id="prin-h" style="margin-block:16px 20px">Local instinct. AI-ready method.</h2>

        <ul class="why-list">
          <li>
            <span class="idx">01</span>
            <div>
              <h3>You work with me, directly</h3>
              <p>Every audit, strategy call and implementation decision runs through one person, me. I don&#8217;t hand your project down a chain, and I don&#8217;t hide behind account managers or black-box reporting.</p>
            </div>
          </li>
          <li>
            <span class="idx">02</span>
            <div>
              <h3>Local knowledge is a real advantage</h3>
              <p>Because I actually live and work in Kodagu, I understand bilingual query behaviour and tier-2 market dynamics from the inside, the nuance a generic national playbook consistently misses.</p>
            </div>
          </li>
          <li>
            <span class="idx">03</span>
            <div>
              <h3>I build for answers, not just links</h3>
              <p>Structured data, entity clarity and fact-dense, quotable content are part of every project from day one, so answer engines can lift and attribute your expertise cleanly, not just so Google can rank it.</p>
            </div>
          </li>
          <li>
            <span class="idx">04</span>
            <div>
              <h3>Honesty over vanity metrics</h3>
              <p>I report real ranking, traffic and citation-visibility data, and I&#8217;m candid about what is and isn&#8217;t working. I&#8217;d rather tell you an uncomfortable truth than dress up an impression count as a result.</p>
            </div>
          </li>
          <li>
            <span class="idx">05</span>
            <div>
              <h3>I stay on the frontier</h3>
              <p>AEO and GEO are moving fast. I treat continuous testing, against algorithm changes, AI Overview behaviour and LLM citation patterns, as part of the job, not an optional extra.</p>
            </div>
          </li>
        </ul>
      </div>

      <div>
        <div class="grid grid--2">
          <div class="stat reveal">
            <p class="stat__val">#1</p>
            <p class="stat__label">Person you deal with</p>
            <p class="stat__note">Me, from the first audit to ongoing optimisation, with no handoffs.</p>
          </div>
          <div class="stat reveal">
            <p class="stat__val">5</p>
            <p class="stat__label">Answer engines targeted</p>
            <p class="stat__note">ChatGPT, Perplexity, Gemini, Claude and Copilot, treated as first-class surfaces.</p>
          </div>
          <div class="stat reveal">
            <p class="stat__val">3+</p>
            <p class="stat__label">Disciplines under one roof</p>
            <p class="stat__note">SEO, AEO and GEO run as a single connected strategy.</p>
          </div>
          <div class="stat reveal">
            <p class="stat__val">0</p>
            <p class="stat__label">Middlemen</p>
            <p class="stat__note">Direct consultant access, always.</p>
          </div>
        </div>

        <p class="field-note reveal" style="margin-top:18px;max-width:52ch">These numbers describe how I work, not results I&#8217;m claiming on your behalf. The case studies page contains engagement notes, client-approved testimonials and the historical first-page Google ranking for Green Coorg Spices, with its current offline/rebuild status.</p>
      </div>

    </div>
  </section>

  <!-- PHILOSOPHY -->
  <section class="section" id="philosophy" aria-labelledby="phil-h">
    <div class="wrap">
      <div class="section-head reveal">
        <p class="eyebrow">What I believe</p>
        <h2 id="phil-h">The idea I keep coming back to</h2>
      </div>

      <div class="grid grid--2">
        <figure class="card card--featured quote reveal" style="margin:0">
          <blockquote>&#8220;Search isn&#8217;t about tricking an algorithm. It&#8217;s about being the clearest, most trustworthy answer to a real question, so clearly that both Google and the machines have no reason to point anywhere else.&#8221;</blockquote>
          <figcaption>
            <cite>Fawaz BH</cite>
            <span class="biz">On how I approach every engagement</span>
          </figcaption>
        </figure>

        <figure class="card quote reveal" style="margin:0">
          <blockquote>&#8220;Being genuinely local somewhere is a strength, not a limitation. Deep roots in one place teach you how people actually search, and that instinct scales.&#8221;</blockquote>
          <figcaption>
            <cite>Fawaz BH</cite>
            <span class="biz">On why I stay based in Kodagu</span>
          </figcaption>
        </figure>
      </div>
    </div>
  </section>

  <hr class="rule">

  <!-- FAQ -->
  <section class="section section--alt" id="faq" aria-labelledby="faq-h">
    <div class="wrap split">

      <div class="sticky-col reveal">
        <p class="eyebrow">About the practice</p>
        <h2 id="faq-h" style="margin-block:16px 20px">The questions I get asked</h2>
        <p class="lede">Answered directly, the way I&#8217;d tell you on a call, and structured so answer engines can quote them cleanly.</p>
      </div>

      <div class="faq">
        <details open>
          <summary>Who is Fawaz BH?</summary>
          <div class="faq__body"><p><strong>Fawaz BH is an independent SEO, AEO and GEO consultant based in Kushal Nagar, Kodagu, Karnataka, India.</strong> He helps businesses across Karnataka and South India rank on Google and structure their expertise so AI answer engines like ChatGPT, Perplexity and Gemini cite them as the source. Every engagement is handled directly by Fawaz, without agency layers.</p></div>
        </details>

        <details>
          <summary>What certifications does Fawaz BH have?</summary>
          <div class="faq__body"><p><strong>Fawaz BH holds an Ahrefs Academy certification, a Semrush AI Visibility Essentials certification, a Semrush Technical SEO and AI Search Essentials certification, and an Advanced Diploma in Digital Marketing from Adrex Media School.</strong> These cover core and technical SEO, optimisation for AI-driven search, and broader digital marketing, which together underpin his combined SEO, AEO and GEO practice.</p></div>
        </details>

        <details>
          <summary>Why work with an independent consultant instead of an agency?</summary>
          <div class="faq__body"><p><strong>You work directly with one consultant on every part of the engagement.</strong> There are no account managers, no junior handoffs and no black-box reporting. The trade-off is deliberate scale: a small client list rather than a factory, which means deeper attention and hands-on execution on each project. Nothing about your search visibility gets diluted through a chain of handoffs.</p></div>
        </details>

        <details>
          <summary>Does Fawaz BH work alone?</summary>
          <div class="faq__body"><p><strong>Yes, and that&#8217;s a deliberate choice.</strong> You work directly with Fawaz on every part of an engagement: the audit, the strategy, the structured data, the content direction. The client list is kept small on purpose so each project gets real attention rather than being processed through a factory. The trade-off is scale; the payoff is that nothing about your search visibility gets diluted through a chain of handoffs.</p></div>
        </details>

        <details>
          <summary>What is Fawaz BH&#8217;s background?</summary>
          <div class="faq__body"><p><strong>Fawaz BH started in SEO in early 2025, building a foundation in technical SEO, on-page architecture and local search, then expanded into AEO and GEO as those disciplines emerged.</strong> Growing up in Kushal Nagar, Kodagu, he saw first-hand how excellent local businesses stayed invisible online, and that gap is what pulled him into search. He now runs SEO, AEO and GEO as one connected strategy, backed by certifications from Ahrefs and Semrush and an Advanced Diploma in Digital Marketing from Adrex Media School.</p></div>
        </details>

        <details>
          <summary>Why is Fawaz BH based in Kodagu?</summary>
          <div class="faq__body"><p><strong>Being genuinely local somewhere makes Fawaz better at search everywhere.</strong> Kodagu is home, and living in a tier-2 market gives first-hand understanding of bilingual Kannada-English queries, seasonal tourism demand around Coorg, and how people here actually search. That instinct informs how he approaches every market, and since strategy, technical work and answer-engine optimisation all travel remotely, his location never limits who he can help.</p></div>
        </details>

        <details>
          <summary>What made Fawaz BH specialise in AEO and GEO?</summary>
          <div class="faq__body">
            <p><strong>Search changed: more people stopped clicking through a list of links and started asking a question and taking the answer from ChatGPT, Perplexity, Gemini or an AI Overview.</strong> If a brand isn&#8217;t structured to be cited inside those answers, it slowly becomes invisible even when its traditional SEO is strong. AEO and GEO are how Fawaz keeps clients the source that gets quoted, not the source that gets skipped.</p>
            <p>They build on solid SEO fundamentals rather than replacing them, which is why he runs all three as one connected strategy.</p>
          </div>
        </details>

        <details>
          <summary>Does Fawaz BH only work with businesses in Karnataka?</summary>
          <div class="faq__body"><p><strong>No.</strong> Fawaz BH&#8217;s local expertise is strongest in Kodagu and Karnataka, but he takes remote engagements across South India (including Hyderabad, Chennai, Kochi and Coimbatore) and the rest of India, plus a small number of AEO and GEO projects beyond India. Local SEO benefits from local knowledge; everything else works well remotely.</p></div>
        </details>

        <details>
          <summary>How do I start working with Fawaz BH?</summary>
          <div class="faq__body"><p><strong>Reach out directly for a free discovery audit.</strong> Message Fawaz on WhatsApp or LinkedIn, or call, and he&#8217;ll review where you&#8217;re losing visibility on Google and in AI answers, and lay out the path to fixing it before you commit to anything.</p></div>
        </details>
      </div>

    </div>
  </section>

  <?php render_contact_form([
      'heading' => 'Want to see what I would do for you?',
      'lede'    => 'Book a free 30 minute audit. I will personally walk through where you are losing visibility on Google and in AI answers, and the exact path to fixing it.',
  ]); ?>

</main>

<?php
render_floating_button();
render_footer();
