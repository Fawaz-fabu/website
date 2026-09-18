<?php
require_once __DIR__ . '/../includes/head.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/floating-button.php';
require_once __DIR__ . '/../includes/footer.php';
$schema = <<<'JSONLD'
{
  "@context":"https://schema.org",
  "@graph":[
    {"@type":"BlogPosting","@id":"https://fawazbhseo.in/blogs/measure-ai-search-visibility#article","headline":"How to measure AI search visibility: mentions, citations and recommendations","description":"A repeatable manual method for testing AI visibility, with explicit denominators, sample prompts and a blank CSV tracking sheet.","mainEntityOfPage":"https://fawazbhseo.in/blogs/measure-ai-search-visibility","inLanguage":"en-IN","author":{"@type":"Organization","name":"FawazBHSEO","url":"https://fawazbhseo.in/about"},"publisher":{"@type":"Organization","name":"FawazBHSEO","url":"https://fawazbhseo.in/"},"isPartOf":{"@id":"https://fawazbhseo.in/blog#blog"}},
    {"@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"https://fawazbhseo.in/"},{"@type":"ListItem","position":2,"name":"Guides","item":"https://fawazbhseo.in/blog"},{"@type":"ListItem","position":3,"name":"Measure AI visibility","item":"https://fawazbhseo.in/blogs/measure-ai-search-visibility"}]}
  ]
}
JSONLD;
render_head([
    'title' => 'How to Measure AI Search Visibility + CSV Log | FawazBHSEO',
    'description' => 'Track AI mentions, citations and recommendations separately. Use a repeatable prompt sample, clear reporting limits and a free blank CSV visibility log.',
    'canonical' => 'https://fawazbhseo.in/blogs/measure-ai-search-visibility',
    'og_type' => 'article',
    'schema' => $schema,
]);
render_header('blog');
?>
<main id="main" class="guide">
  <article class="wrap guide__wrap" aria-labelledby="guide-title">
    <header class="guide__header">
      <nav class="guide__breadcrumb" aria-label="Breadcrumb"><a href="/">Home</a><span aria-hidden="true"> / </span><a href="/blog">Guides</a><span aria-hidden="true"> / </span><span aria-current="page">Measure AI visibility</span></nav>
      <p class="eyebrow">Measurement, not guesswork</p>
      <h1 id="guide-title">How to measure AI search visibility</h1>
      <p class="lede">Keep the questions consistent. Save the answers. Separate a mention from a citation, and both from a customer enquiry.</p>
      <p class="guide__meta">A <a href="/about">FawazBHSEO</a> guide. Prepared <time datetime="2026-09-11">11 September 2026</time>.</p>
      <p class="guide__disclosure">Prepared with AI assistance. The example calculations and prompts are illustrative, not measured client results.</p>
    </header>
    <aside class="card card--featured guide__answer" aria-labelledby="short-answer">
      <h2 id="short-answer">The short answer</h2>
      <p><strong>Measure AI visibility with a fixed set of relevant questions, repeated under recorded conditions in each engine.</strong> Save the response and linked sources, then record whether the business was mentioned, cited or recommended. Report the sample size and failed tests. A few favourable answers are not evidence of visibility across the whole market.</p>
    </aside>
    <nav class="guide__contents" aria-label="In this guide"><p class="ui"><strong>In this guide</strong></p><ol><li><a href="#definitions">Define the outcomes</a></li><li><a href="#sample">Build a useful prompt sample</a></li><li><a href="#protocol">Run a repeatable test</a></li><li><a href="#metrics">Calculate without overstating</a></li><li><a href="#download">Download the blank log</a></li><li><a href="#questions">Common questions</a></li></ol></nav>

    <section id="definitions" class="guide__section" aria-labelledby="definitions-h">
      <h2 id="definitions-h">What counts as a mention or citation?</h2>
      <dl class="guide__definitions">
        <dt>Brand mention</dt><dd>The response names the business. Check that it means the correct business, not a similarly named company. Record positive, neutral, negative or unclear context.</dd>
        <dt>Linked citation to your site</dt><dd>A visible source link points to your domain or one of its pages. Open it and save the actual URL. A source link alone does not prove that the response recommends the business.</dd>
        <dt>Third-party source about the business</dt><dd>The answer cites another site that discusses the business. Record that separately from a link to your own site, then check whether the third-party page really supports the statement.</dd>
        <dt>Recommendation</dt><dd>The answer explicitly suggests the business as a fit for the user's request. A name in a source list or a warning is not a recommendation.</dd>
        <dt>Referral or enquiry</dt><dd>A visit or contact that can be attributed to the source using available evidence. Missing referrer information and consent limits mean not every visit can be identified. A prompt test cannot measure sales.</dd>
      </dl>
      <p>These categories can overlap. A response can recommend a business without linking to it, or cite a page without naming the business in the answer. Do not add the categories together and call the total unique visibility.</p>
    </section>

    <section id="sample" class="guide__section" aria-labelledby="sample-h">
      <h2 id="sample-h">Choose questions that a customer might really ask</h2>
      <p>Begin with sales conversations, support questions and relevant Search Console queries. Group questions by the service, place and buying decision they represent. Label suggested prompts as candidates unless you have actual evidence that customers ask them.</p>
      <p><strong>Illustrative prompts for an independent search consultant:</strong></p>
      <ul><li>What should a local SEO audit include for a homestay in Kodagu?</li><li>How can a small Karnataka business compare SEO consulting proposals?</li><li>What is the difference between AEO and GEO services?</li><li>How should a business measure whether ChatGPT cites its website?</li></ul>
      <p>Keep branded questions in a separate group. “Tell me about Fawaz BH” tests identity and accuracy; it does not test whether the business is discovered without a brand cue. Do not improve the apparent result by adding your name or asking the engine to recommend you.</p>
      <p>A manageable pilot could use 20 questions with two repeats per engine. That is a practical starting sample, not a statistical standard. Preserve question IDs and a sample version so a changed set cannot silently replace the baseline.</p>
    </section>

    <section id="protocol" class="guide__section" aria-labelledby="protocol-h">
      <h2 id="protocol-h">A repeatable manual test</h2>
      <ol>
        <li><strong>Record the conditions.</strong> Save the engine, displayed model if available, search or browsing mode, date and time, language, region and whether the session is signed in. Record unknown fields as unknown rather than guessing.</li>
        <li><strong>Use a fresh conversation.</strong> Enter the exact saved prompt without earlier messages that name the business. A fresh conversation reduces conversational influence but does not eliminate personalisation.</li>
        <li><strong>Save the full answer and sources.</strong> Keep a screenshot or permitted response export with an evidence ID. Avoid uploading confidential customer information. Store raw responses in a private workspace, not in a public audit folder.</li>
        <li><strong>Classify what happened.</strong> Mark mentions, direct-site citations, third-party citations and recommendations independently. Check the linked page and any factual errors.</li>
        <li><strong>Keep failures visible.</strong> Distinguish a timeout, refusal, unavailable search feature and a valid answer with no citation. A failed request is not proof of absence; a valid uncited answer is a real observation.</li>
        <li><strong>Repeat on the same schedule.</strong> Use comparable settings and keep the negative results. Record site changes and prompt-set changes alongside each run.</li>
      </ol>
      <p>This guide provides a manual workflow and a static worksheet. It does not connect to AI APIs or run automated prompts. If you later use a monitoring product, check its collection method, terms, locations and repeat policy before comparing its results with your manual sample.</p>
    </section>

    <section id="metrics" class="guide__section" aria-labelledby="metrics-h">
      <h2 id="metrics-h">Use a denominator people can inspect</h2>
      <p>For one engine, one mode and one sample version:</p>
      <ul><li><strong>Mention rate:</strong> valid responses mentioning the correct business ÷ all valid responses × 100.</li><li><strong>Direct citation rate:</strong> valid responses linking to your site ÷ all valid responses × 100.</li><li><strong>Recommendation rate:</strong> valid responses explicitly recommending the business ÷ all valid responses × 100.</li><li><strong>Test completion:</strong> valid responses ÷ attempted tests × 100.</li></ul>
      <p><strong>Illustrative calculation:</strong> 20 questions tested twice create 40 attempts. If four attempts fail and nine of the 36 valid responses mention the business, the observed mention rate is 25%, with 90% test completion. It is not a 25% share of all customer prompts. Repeats are not necessarily independent observations, so this simple rate is descriptive rather than a confidence estimate.</p>
      <p>Show engine-level counts before any summary. Keep answers without citations in the valid-response denominator. If you choose a different definition, state it and use it consistently. Report branded and unbranded groups separately.</p>
      <p>Compare equivalent periods, but do not automatically attribute a change to your latest article. Engine updates, source availability, test location and ordinary response variation can change the result. Combine this log with relevant search data and qualified enquiries rather than replacing them.</p>
    </section>

    <section id="download" class="guide__section" aria-labelledby="download-h">
      <h2 id="download-h">Download a blank AI visibility log</h2>
      <p>The CSV contains a header row only. Add one row per prompt attempt, including failures. It is free to download without a form, email address or account.</p>
      <a class="btn btn--accent" href="/assets/downloads/ai-visibility-log.csv" download>Download CSV tracking sheet</a>
      <p>Use <code>valid</code>, <code>timeout</code>, <code>refusal</code> or <code>unavailable</code> for status. For outcome columns use <code>yes</code>, <code>no</code> or <code>unclear</code>. Store evidence privately and place its reference in the sheet. If an answer has several citation URLs, separate them inside the cell with a vertical bar.</p>
      <p>When importing text from an AI response or an external source into a spreadsheet, treat it as plain text. Some spreadsheet applications interpret cells beginning with symbols such as <code>=</code> as formulas. The downloadable blank file contains no formulas, scripts or external connections.</p>
    </section>

    <section id="questions" class="guide__section guide__questions" aria-labelledby="questions-h">
      <h2 id="questions-h">Common measurement questions</h2>
      <details><summary>Can I measure ChatGPT visibility from Google Search Console?</summary><p>Not from Google query performance alone. Search Console describes Google Search activity, not every ChatGPT answer. Use the reporting tools available for each platform, referral evidence where available and a separately labelled prompt log. Do not infer ChatGPT recommendations from conversational Google queries.</p></details>
      <details><summary>Can I tell whether a page was retrieved but not cited?</summary><p>Usually not from a normal answer interface. The visible response and sources show what was displayed, not a complete retrieval trace. Record retrieval as unknown unless a trustworthy tool explicitly exposes that information.</p></details>
      <details><summary>Does one successful prompt prove GEO is working?</summary><p>No. It is one observation worth saving. Repeat comparable questions, preserve misses and check whether the answer is accurate and relevant. A selected screenshot is not a performance trend.</p></details>
      <details><summary>What should I do when an AI answer gets the business wrong?</summary><p>Save the evidence, check the sources it links to and correct information you control. Request corrections from legitimate third-party publishers where appropriate. Use an engine's feedback process if available, but do not promise that feedback will change future answers.</p></details>
    </section>
    <section class="guide__section" aria-labelledby="sources-h"><h2 id="sources-h">Sources and limits</h2><p><a href="https://developers.google.com/search/docs/appearance/ai-features">Google Search Central's AI features guidance</a> explains its own website and reporting context. The test protocol and calculations above are a proposed practical method, not an official platform metric or an independently validated market-share model.</p><p>For the service definitions, read <a href="/blogs/seo-aeo-geo-differences">SEO vs AEO vs GEO</a>. For implementation support, see <a href="/geo-consultant">GEO consulting</a> and <a href="/aeo-consultant">AEO consulting</a>.</p></section>
    <aside class="card guide__next" aria-labelledby="next-h"><h2 id="next-h">Make the baseline useful before scaling</h2><p>Bring your priority customer questions and current evidence. The next step is to agree on the engines, sample and outcomes that matter to your business.</p><a class="btn btn--accent" href="/contact">Discuss AI visibility</a><p><a href="/blog">All search guides</a></p></aside>
  </article>
</main>
<?php
render_floating_button();
render_footer();
