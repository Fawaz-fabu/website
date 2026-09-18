<?php
/**
 * Site-wide chat UI, rendered by render_footer().
 * assets/js/assistant.js POSTs to the owner's /api/chat.php endpoint.
 * Backend implementation, provider requests and secrets are owner-managed
 * outside this project. This include contains markup only.
 * The optional legacy matcher is exposed separately and is not the primary UI.
 */

if (!function_exists('render_ai_assistant')) {

function render_ai_assistant() {
    ?>
    <?php
    /* Floating answer assistant launcher.
       Deliberately styled OUTSIDE the site's flat hard-edge design language:
       a round dark button with a bot face and a slow breathing float, so a
       visitor recognises it instantly as the assistant rather than as another
       site button. It sits bottom LEFT, which keeps it clear of the WhatsApp
       fab on the right.

       The bot mark is inline SVG rather than an image file: it costs no extra
       request, it inherits currentColor so it works in both themes, and there
       is no raster asset to go blurry on a high-density screen.

       Positioning lives entirely in site.css (section 19b). Do NOT add inline
       position styles as a "safety net" for stale caches: an inline value
       outranks the media queries and breaks the layout on phones. Stale CSS is
       handled by the ?v= asset version in head.php instead. */
    ?>
    <!-- Floating answer assistant -->
    <button class="assistant-launcher" id="assistantLauncher" type="button"
            aria-label="Ask the site assistant a question"
            aria-expanded="false" aria-controls="assistantPanel">
      <span class="assistant-launcher__pulse" aria-hidden="true"></span>
      <svg class="assistant-launcher__bot" viewBox="0 0 32 32" fill="none" aria-hidden="true" focusable="false">
        <!-- antenna -->
        <path d="M16 4.6V7.4" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"/>
        <circle cx="16" cy="3.5" r="1.7" fill="currentColor"/>
        <!-- head -->
        <rect x="6.2" y="7.8" width="19.6" height="15.4" rx="5.2"
              stroke="currentColor" stroke-width="1.9"/>
        <!-- eyes -->
        <circle class="assistant-launcher__eye" cx="12.1" cy="15.2" r="1.95" fill="currentColor"/>
        <circle class="assistant-launcher__eye" cx="19.9" cy="15.2" r="1.95" fill="currentColor"/>
        <!-- ears -->
        <path d="M3.4 13.4v4.2M28.6 13.4v4.2" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"/>
        <!-- mouth -->
        <path d="M12.6 19.4h6.8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
      </svg>
      <span class="visually-hidden">Ask AI</span>
    </button>

    <section class="assistant-panel" id="assistantPanel" role="dialog"
             aria-labelledby="assistantTitle" aria-describedby="assistantScope" hidden>

      <?php
      /* The panel has its OWN design system, scoped in site.css section 19b.
         It is deliberately dark, rounded and soft shadowed, which breaks the
         site's flat hard-edge rules on purpose so a visitor can tell at a
         glance that this is a tool and not another page section. Do not
         "correct" it back to the site tokens. */
      ?>
      <header class="assistant-panel__head">
        <div class="assistant-panel__id">
          <span class="assistant-panel__avatar" aria-hidden="true">
            <svg viewBox="0 0 32 32" fill="none" focusable="false">
              <path d="M16 4.6V7.4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
              <circle cx="16" cy="3.4" r="1.8" fill="currentColor"/>
              <rect x="6.2" y="7.8" width="19.6" height="15.4" rx="5.2" stroke="currentColor" stroke-width="2"/>
              <circle cx="12.1" cy="15.2" r="2" fill="currentColor"/>
              <circle cx="19.9" cy="15.2" r="2" fill="currentColor"/>
              <path d="M12.6 19.4h6.8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
          </span>
          <div>
            <p class="eyebrow">
              <span class="assistant-panel__status">
                <span class="assistant-panel__dot" aria-hidden="true"></span>Site assistant
              </span>
            </p>
            <h2 id="assistantTitle">Ask about the work</h2>
          </div>
        </div>
        <button class="assistant-close" id="assistantClose" type="button" aria-label="Close the assistant">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
        </button>
      </header>

      <p class="assistant-scope" id="assistantScope">
        Ask about services, pricing or getting started. Confirm important details
        directly with Fawaz before making a decision.
      </p>

      <div class="assistant-log" id="assistantLog" role="log" aria-label="Conversation" aria-live="polite" aria-relevant="additions" aria-atomic="false" tabindex="0"></div>
      <p id="assistantStatus" class="visually-hidden" role="status" aria-live="polite"></p>

      <div class="assistant-suggest" id="assistantSuggest" role="group" aria-label="Suggested questions"></div>

      <form class="assistant-form" id="assistantForm" autocomplete="off">
        <label class="visually-hidden" for="assistantInput">Type your question</label>
        <input class="assistant-input" id="assistantInput" name="q" type="text"
               placeholder="Type your question (up to 500 characters)" maxlength="500" aria-describedby="assistantPrivacy assistantStatus">
        <button class="assistant-send" id="assistantSend" type="submit" aria-label="Send question">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </button>
      </form>
      <p class="assistant-foot assistant-disclaimer" id="assistantPrivacy">AI-generated answers. Please don't share confidential information.</p>

      <p class="assistant-foot">
        Prefer a person? <a href="https://wa.me/919481084038?text=Hi%20Fawaz%2C%20I%20have%20a%20question%20about%20your%20SEO%20work." target="_blank" rel="noopener">Message Fawaz on WhatsApp</a>
        or call <a href="tel:+919481084038">+91 94810 84038</a>.
      </p>

    </section>
    <?php
}

}
