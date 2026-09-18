/* ==========================================================================
   fawazbhseo.in  |  Universal script
   Theme toggle, mobile nav, GSAP scroll reveals, contact form handling.
   ========================================================================== */
(function () {
  'use strict';

  document.documentElement.classList.add('js');

  /* ---------------------------------------------------------------
     Theme toggle. Reads the pre-paint value set inline in the head.
     --------------------------------------------------------------- */
  var root = document.documentElement;
  var toggle = document.querySelector('.theme-toggle');
  var themeMeta = document.querySelector('meta[name="theme-color"]');

  /* Light is the site default. Dark is opt-in via the toggle only, and the
     choice is remembered. The OS colour scheme is deliberately not consulted. */
  function applyTheme(mode, persist) {
    var dark = mode === 'dark';
    root.setAttribute('data-theme', dark ? 'dark' : 'light');
    if (persist) {
      try { localStorage.setItem('fbh-theme', dark ? 'dark' : 'light'); } catch (e) {}
    }
    if (themeMeta) themeMeta.setAttribute('content', dark ? '#241E17' : '#EDE2C8');
    if (toggle) {
      toggle.setAttribute('aria-pressed', dark ? 'true' : 'false');
      toggle.setAttribute('aria-label', dark ? 'Switch to light mode' : 'Switch to dark mode');
    }
  }

  // Sync the button state with whatever the pre-paint script decided.
  applyTheme(root.getAttribute('data-theme') === 'dark' ? 'dark' : 'light', false);

  if (toggle) {
    toggle.addEventListener('click', function () {
      applyTheme(root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark', true);
    });
  }

  /* ---------------------------------------------------------------
     Mobile navigation
     --------------------------------------------------------------- */
  var navBtn = document.querySelector('.nav-toggle');
  var drawer = document.getElementById('mobileNav');

  if (navBtn && drawer) {
    var setNav = function (open) {
      drawer.classList.toggle('is-open', open);
      navBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
    };
    navBtn.addEventListener('click', function () {
      setNav(!drawer.classList.contains('is-open'));
    });
    drawer.addEventListener('click', function (e) {
      if (e.target.closest('a')) setNav(false);
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') setNav(false);
    });
  }

  /* ---------------------------------------------------------------
     Scroll reveals. Fade and slide only, staggered for grids.

     PERFORMANCE: anything already inside the viewport on load is left
     completely alone, so it paints with the document and stays eligible to be
     the Largest Contentful Paint element. Only content below the fold is
     hidden and then revealed, and that hiding happens here in JS rather than
     in CSS, so a slow GSAP download can never leave the page blank.
     --------------------------------------------------------------- */
  function initReveals() {
    var items = document.querySelectorAll('.reveal');
    if (!items.length) return;

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var hasGsap = window.gsap && window.ScrollTrigger;

    // No animation wanted or possible: content is already visible, so stop.
    if (reduced || !hasGsap) return;

    var vh = window.innerHeight || 800;
    var deferred = [];

    items.forEach(function (el) {
      // getBoundingClientRect is read before any class is added, so this is a
      // single measurement pass with no forced reflow per element.
      if (el.getBoundingClientRect().top > vh * 0.92) {
        el.classList.add('reveal--hold');
        deferred.push(el);
      }
    });

    if (!deferred.length) return;

    gsap.registerPlugin(ScrollTrigger);

    // Group siblings so card grids stagger together rather than one by one.
    var groups = new Map();
    deferred.forEach(function (el) {
      var parent = el.parentElement;
      if (!groups.has(parent)) groups.set(parent, []);
      groups.get(parent).push(el);
    });

    groups.forEach(function (group) {
      gsap.to(group, {
        opacity: 1,
        y: 0,
        duration: 0.5,
        ease: 'power2.out',
        stagger: group.length > 1 ? 0.08 : 0,
        clearProps: 'transform',
        scrollTrigger: {
          trigger: group[0],
          start: 'top 92%',
          once: true
        }
      });
    });
  }

  /* GSAP is deferred, so it may not have executed yet when this file runs.
     Waiting for window load also keeps the reveal work off the critical path. */
  if (document.readyState === 'complete') {
    initReveals();
  } else {
    window.addEventListener('load', initReveals);
  }

  /* ---------------------------------------------------------------
     Contact form. Static hosting cannot process a POST, so the
     form hands off to WhatsApp with the message prefilled.
     --------------------------------------------------------------- */
  var form = document.getElementById('contactForm');
  if (!form) return;

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    var get = function (name) {
      var f = form.elements[name];
      return f ? f.value.trim() : '';
    };

    var name = get('name');
    var business = get('business');
    var city = get('city');
    var service = get('service');
    var message = get('message');

    var status = document.getElementById('formStatus');
    if (!name || !message) {
      if (status) {
        status.hidden = false;
        status.textContent = 'Please add your name and a short message so I know what you need.';
      }
      return;
    }

    var lines = [
      'Hi Fawaz, I would like a free audit.',
      '',
      'Name: ' + name
    ];
    if (business) lines.push('Business: ' + business);
    if (city) lines.push('City: ' + city);
    if (service) lines.push('Interested in: ' + service);
    lines.push('', message);

    window.open(
      'https://wa.me/919481084038?text=' + encodeURIComponent(lines.join('\n')),
      '_blank',
      'noopener'
    );

    if (status) {
      status.hidden = false;
      status.textContent = 'Opening WhatsApp with your message ready to send. If nothing happened, message me directly on +91 94810 84038.';
    }
  });
})();
