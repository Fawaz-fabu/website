<?php
/**
 * TRANSLATION FILE TEMPLATE. Copy this to locales/<code>.php and translate.
 *
 * The leading underscore keeps this file out of the language list: the loader
 * only ever looks for a file named after a registry code, so _template.php is
 * never served and never appears in the switcher.
 *
 * YOU DO NOT NEED THIS FILE TO ADD A LANGUAGE. A row in includes/locale
 * registry.php is enough: the language appears in the switcher and the whole
 * site is readable in it, translated in the browser at runtime.
 *
 * WHAT THIS FILE IS FOR IS UPGRADING ONE. Hand written interface strings
 * replace the engine's guesses for the nav, buttons and notices, and they are
 * fenced off from the engine with translate="no" so they are never translated
 * twice. It is also the ONLY route to being indexed: a page whose body was
 * translated in the browser has no translated HTML for a crawler to read.
 *
 * HOW TO UPGRADE A LANGUAGE
 *
 *   1. Check includes/locale-registry.php has a row for the code. If not, add
 *      one line: [native name, English name, hreflang, script, dir]. At that
 *      point the language already works, fully, with no file.
 *   2. cp locales/_template.php locales/<code>.php
 *   3. Translate the strings. Leave any string you are unsure of as English,
 *      it will fall back cleanly and only cost you coverage.
 *   4. Upload. The interface now comes from this file instead of the engine.
 *   5. To be indexed, have a speaker read it, then set provenance to
 *      'reviewed' and published to true. See the meta block below.
 *
 * No core file needs editing. Not i18n.php, not head.php, not .htaccess, not
 * sitemap.php. That is deliberate, so the language count can grow without the
 * system changing shape.
 *
 * THE META BLOCK IS THE PART THAT MATTERS
 *
 * provenance, one of three values, and be truthful about it:
 *
 *   'machine'   AI translated, nobody has read it. This is the correct value
 *               for a fresh file and it is not a problem. The page is served
 *               to anyone who asks for it, shows an "AI" badge in the
 *               switcher, carries a visible notice, and stays out of Google.
 *   'reviewed'  a person who reads the language has been through the machine
 *               draft and fixed it. Eligible for indexing.
 *   'human'     written or fully rewritten by a native speaker. Eligible for
 *               indexing, and the only state with no notice on the page.
 *
 * published, whether this translation is ready to be a public face of the site
 * in search results. It gates indexing only. It never gates access: a visitor
 * who explicitly chooses this language always gets it, published or not.
 *
 * A language is indexed only when published is true AND provenance is past
 * 'machine' AND at least 90 percent of the strings below are translated. All
 * three. Reason: an unread machine translation pushed into the index is
 * scaled content abuse under Google's spam policy, and this site is not doing
 * that. Review is a promotion gate for indexing, not permission to exist.
 *
 * reviewer, free text credit for whoever did the review. Leave it empty on a
 * machine draft. Do not put a name here for a language that person cannot
 * read.
 */

return [

    'meta' => [
        'provenance' => 'machine',   // machine | reviewed | human
        'published'  => false,       // true only once it is genuinely ready
        'reviewer'   => '',          // who checked it, if anyone has
        'updated'    => '',          // YYYY-MM-DD
    ],

    /**
     * Interface strings. English source text is in the comment on each line so
     * a translator never has to open another file.
     *
     * Do not translate: the brand name "Fawaz BH", place names, or the terms
     * SEO, AEO and GEO. Those are the industry's own words and clients search
     * for them in English even when they read everything else in their own
     * language. Translating them makes the site harder to find, not easier.
     */
    'strings' => [

        // Navigation
        'nav.home'         => '',   // Home
        'nav.services'     => '',   // Services
        'nav.aiseo'        => '',   // AI SEO
        'nav.cities'       => '',   // Cities
        'nav.cases'        => '',   // Case Studies
        'nav.blog'         => '',   // Blog
        'nav.about'        => '',   // About
        'nav.contact'      => '',   // Contact

        // Calls to action
        'cta.audit'        => '',   // Free audit
        'cta.auditlong'    => '',   // Request a free audit

        // Accessibility
        'a11y.skip'        => '',   // Skip to content

        // Language controls
        'lang.label'       => '',   // Language
        'lang.choose'      => '',   // Choose a language
        'lang.search'      => '',   // Search languages
        'lang.none'        => '',   // No language matches that.

        // Provenance notices. Translate these carefully. They are the site
        // telling the reader how much to trust the page they are on, so a
        // vague translation here is worse than leaving them in English.
        'lang.machine'     => '',   // This page was translated from English by machine and has not been checked by a person yet. Some wording will read oddly. The English original is the authoritative version.
        'lang.reviewed'    => '',   // This page was translated from English and checked by a person. Where the two differ, the English original is authoritative.
        'lang.readsource'  => '',   // Read the English original

        // Keep the meaning of this one exact. Reading the site in a language
        // is not the same as consulting being available in it, and this line is
        // what stops the translation implying a service that is not offered.
        'lang.servicenote' => '',   // You can read this site in many languages. Consulting itself is delivered in English, Kannada, Malayalam, Hindi, Tamil and Telugu.

        // The offer bar
        'offer.text'       => '',   // This site is also available in your language.
        'offer.switch'     => '',   // Switch
        'offer.dismiss'    => '',   // No thanks
    ],
];
