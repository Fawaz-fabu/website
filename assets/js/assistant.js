/* Endpoint-based chat UI. No provider SDK, secrets or browser-to-AI calls. */
(function () {
  'use strict';

  // SINGLE FALLBACK SWITCH: true uses the local keyword matcher after an error;
  // false shows the error instead. This never retries the AI endpoint.
  const AUTO_FALLBACK = false;

  // EDIT THESE FOUR LABELS: shortcuts use exactly the same form as typed input.
  var SUGGESTED_QUESTIONS = [
    'What SEO services do you offer?',
    'How much do your services cost?',
    'What happens in the free audit?',
    'How can I contact Fawaz?'
  ];
  var ENDPOINT = '/api/chat.php';
  var MAX_INPUT = 500;
  var HISTORY_MESSAGES = 12; // Last six successful user/assistant pairs.
  var REQUEST_TIMEOUT_MS = 45000;
  var RATE_LIMIT_MESSAGE = 'The assistant is busy right now \u2014 please try again in a minute, or contact Fawaz directly';

  var launcher = document.getElementById('assistantLauncher');
  var panel = document.getElementById('assistantPanel');
  var closeButton = document.getElementById('assistantClose');
  var form = document.getElementById('assistantForm');
  var input = document.getElementById('assistantInput');
  var sendButton = document.getElementById('assistantSend');
  var log = document.getElementById('assistantLog');
  var suggestions = document.getElementById('assistantSuggest');
  var status = document.getElementById('assistantStatus');
  if (!launcher || !panel || !closeButton || !form || !input || !sendButton || !log || !suggestions || !status) return;
  if (panel.dataset.chatInitialised === 'true') return;
  panel.dataset.chatInitialised = 'true';

  // Full thread stays in the DOM. Only successful exchanges enter API history.
  // Kept in memory for this page only: no cookies, localStorage or analytics.
  var history = [];
  var busy = false;
  var greeted = false;
  var retryButtons = [];
  input.maxLength = MAX_INPUT;

  function element(tag, className, text) {
    var node = document.createElement(tag);
    if (className) node.className = className;
    if (text !== undefined) node.textContent = text;
    return node;
  }

  function scrollThread() {
    window.requestAnimationFrame(function () { log.scrollTop = log.scrollHeight; });
  }

  function addMessage(role, text, error, note) {
    var row = element('div', 'assistant-msg assistant-msg--' + (role === 'user' ? 'user' : 'bot'));
    row.appendChild(element('span', 'visually-hidden', role === 'user' ? 'You: ' : (error ? 'Chat notice: ' : 'Assistant: ')));
    if (note) row.appendChild(element('p', 'assistant-fallback-note', note));
    row.appendChild(element('p', '', text)); // Never treat endpoint/user text as HTML.
    if (error) row.dataset.chatError = 'true';
    log.appendChild(row);
    scrollThread();
    return row;
  }

  function setBusy(value) {
    busy = value;
    sendButton.disabled = value;
    input.readOnly = value;
    form.setAttribute('aria-busy', value ? 'true' : 'false');
    Array.prototype.forEach.call(suggestions.querySelectorAll('button'), function (button) { button.disabled = value; });
    retryButtons.forEach(function (button) { button.disabled = value; });
  }

  function showTyping() {
    var row = element('div', 'assistant-msg assistant-msg--bot assistant-typing');
    row.setAttribute('aria-hidden', 'true');
    for (var i = 0; i < 3; i++) row.appendChild(element('span', 'assistant-dot'));
    log.appendChild(row);
    status.textContent = 'Waiting for an answer.';
    scrollThread();
    return row;
  }

  function publicError(value) {
    return typeof value === 'string' ? value.trim().slice(0, 500) : '';
  }

  async function requestReply(message, recentHistory, controller, requestState) {
    var response = await fetch(ENDPOINT, {
      method: 'POST',
      credentials: 'same-origin',
      cache: 'no-store',
      headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
      body: JSON.stringify({ message: message, history: recentHistory }),
      signal: controller.signal
    });
    // Preserve the HTTP status even if reading the body subsequently times out.
    requestState.httpStatus = response.status;
    if (response.status === 429) throw new Error(RATE_LIMIT_MESSAGE);
    var raw = await response.text();
    var data;
    try { data = JSON.parse(raw); }
    catch (error) {
      // Accept short plain-text error responses, but never show an HTML error page.
      if (raw.trim() && raw.length <= 500 && !/[<>]/.test(raw)) {
        throw new Error(publicError(raw));
      }
      throw new Error('The chat service returned an unreadable response. Please try again.');
    }
    if (typeof data === 'string') throw new Error(publicError(data) || 'The chat service could not answer.');
    if (!data || typeof data !== 'object' || Array.isArray(data)) throw new Error('The chat service returned an invalid response.');
    if (!response.ok) throw new Error(publicError(data.error) || 'The chat service is temporarily unavailable. Please try again.');
    if (data.error !== null && data.error !== undefined && data.error !== '') {
      throw new Error(publicError(data.error) || 'The chat service could not answer. Please try again.');
    }
    if (typeof data.reply !== 'string' || !data.reply.trim()) throw new Error('No answer was returned. Please try again.');
    return data.reply.trim();
  }

  async function submitMessage(message, reuseUserRow, retryCount) {
    if (busy) return;
    retryCount = retryCount || 0;
    message = String(message || '').trim();
    if (!message) {
      status.textContent = 'Please enter a question.';
      input.focus();
      return;
    }
    if (message.length > MAX_INPUT) {
      status.textContent = 'Please keep your question to 500 characters or fewer.';
      input.focus();
      return;
    }
    // Starting another submission retires stale retries from earlier failures.
    retryButtons.forEach(function (button) { button.remove(); });
    retryButtons = [];
    var recent = history.slice(-HISTORY_MESSAGES).map(function (item) { return { role: item.role, content: item.content }; });
    input.value = '';
    suggestions.hidden = true;
    if (!reuseUserRow) addMessage('user', message);
    setBusy(true);
    var typing = showTyping();
    var controller = new AbortController();
    var timedOut = false;
    var requestState = { httpStatus: null };
    var timer = setTimeout(function () { timedOut = true; controller.abort(); }, REQUEST_TIMEOUT_MS);
    try {
      var reply = await requestReply(message, recent, controller, requestState);
      typing.remove();
      addMessage('assistant', reply);
      history.push({ role: 'user', content: message }, { role: 'assistant', content: reply });
      status.textContent = '';
      // Retire old retries once a successful exchange changes the conversation.
      retryButtons.forEach(function (button) { button.remove(); });
      retryButtons = [];
    } catch (error) {
      typing.remove();
      clearTimeout(timer);
      var recovered = false;
      var httpStatus = requestState.httpStatus;
      var rateLimited = httpStatus === 429;
      var clientError = httpStatus >= 400 && httpStatus <= 499;
      var canRetry = retryCount < 1 && !clientError && (timedOut || (httpStatus >= 500 && httpStatus <= 599));
      // Resolve local fallback before rendering or announcing a quota error.
      if (AUTO_FALLBACK && typeof window.fawazTextMatchingFallback === 'function') {
        status.textContent = 'Checking published site text.';
        try {
          var fallback = await window.fawazTextMatchingFallback(message);
          if (fallback && typeof fallback.reply === 'string' && fallback.reply.trim()) {
            addMessage('assistant', fallback.reply, false, 'Basic keyword match from site text, not an AI answer.');
            recovered = true;
          }
        } catch (fallbackError) { /* Leave the normal retry/contact path available. */ }
      }
      if (!recovered && rateLimited) {
        var quotaRow = addMessage('assistant', RATE_LIMIT_MESSAGE, true);
        var quotaContact = element('a', 'assistant-link', 'Contact Fawaz');
        quotaContact.href = '/contact';
        quotaRow.appendChild(quotaContact);
      }
      if (!recovered && !rateLimited) {
        var explanation = timedOut ? 'The reply took too long. Please try again.' :
          (error instanceof TypeError ? 'I could not connect to the chat service. Please check your connection and try again.' : error.message);
        var row = addMessage('assistant', explanation || 'Something went wrong. Please try again.', true);
        // One manual retry only. Never retry automatically or for any HTTP 4xx.
        if (canRetry) {
          var retry = element('button', 'assistant-link', 'Retry once');
          var retryConsumed = false;
          retry.type = 'button';
          retry.addEventListener('click', function () {
            if (busy || retryConsumed || !retry.isConnected) return;
            retryConsumed = true;
            row.remove();
            retryButtons = retryButtons.filter(function (button) { return button !== retry; });
            submitMessage(message, true, retryCount + 1);
          });
          row.appendChild(retry);
          retryButtons.push(retry);
        }
        var contact = element('a', 'assistant-link', 'Contact Fawaz');
        contact.href = '/contact';
        row.appendChild(contact);
      }
      status.textContent = recovered ? '' : (rateLimited ? RATE_LIMIT_MESSAGE :
        (canRetry ? 'The request failed. You can retry once or contact Fawaz.' : 'The request failed. Please contact Fawaz if you need help.'));
    } finally {
      clearTimeout(timer);
      typing.remove();
      setBusy(false);
      scrollThread();
      // Do not steal focus from someone reading an earlier answer or using Close.
      if (!panel.hidden && (document.activeElement === input || document.activeElement === sendButton || document.activeElement === document.body)) input.focus();
    }
  }

  SUGGESTED_QUESTIONS.forEach(function (label) {
    var button = element('button', 'assistant-chip', label);
    button.type = 'button';
    button.addEventListener('click', function () {
      if (busy) return;
      input.value = label;
      input.focus();
      form.requestSubmit(); // Same submit handler and endpoint as a typed question.
    });
    suggestions.appendChild(button);
  });

  function openPanel() {
    panel.hidden = false;
    launcher.setAttribute('aria-expanded', 'true');
    launcher.classList.add('is-hidden');
    if (!greeted) {
      greeted = true;
      addMessage('assistant', 'Hi. Ask about Fawaz\'s services, pricing or how to get started.');
    }
    input.focus();
  }

  function closePanel() {
    panel.hidden = true;
    launcher.setAttribute('aria-expanded', 'false');
    launcher.classList.remove('is-hidden');
    launcher.focus();
  }

  launcher.addEventListener('click', openPanel);
  closeButton.addEventListener('click', closePanel);
  panel.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') { event.preventDefault(); closePanel(); }
  });
  form.addEventListener('submit', function (event) {
    event.preventDefault();
    submitMessage(input.value, false);
  });
})();
