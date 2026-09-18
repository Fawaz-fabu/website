<?php
/**
 * French interface strings. Machine drafted, unreviewed, honestly labelled.
 * See locales/de.php for the reasoning on languages Fawaz does not speak.
 *
 * APOSTROPHES IN LOCALE FILES. Use the real character U+2019 here, not the
 * HTML entity &#8217; used in page markup. These strings are data: they pass
 * through htmlspecialchars() on output, which would turn an entity into a
 * literal, visible "&#8217;" on the page. The entity convention applies to
 * hand written HTML only.
 */

return [

    'meta' => [
        'provenance' => 'machine',
        'published'  => false,
        'reviewer'   => '',
        'updated'    => '2026-09-02',
    ],

    'strings' => [
        'nav.home'         => 'Accueil',
        'nav.services'     => 'Services',
        'nav.aiseo'        => 'AI SEO',
        'nav.cities'       => 'Villes',
        'nav.cases'        => 'Études de cas',
        'nav.blog'         => 'Blog',
        'nav.about'        => 'À propos',
        'nav.contact'      => 'Contact',

        'cta.audit'        => 'Audit gratuit',
        'cta.auditlong'    => 'Demander un audit gratuit',

        'a11y.skip'        => 'Aller au contenu',

        'lang.label'       => 'Langue',
        'lang.choose'      => 'Choisir une langue',
        'lang.search'      => 'Rechercher une langue',
        'lang.none'        => 'Aucune langue ne correspond.',

        'lang.machine'     => 'Cette page a été traduite de l’anglais par une machine et n’a pas encore été relue par une personne. Certaines formulations paraîtront étranges. La version anglaise fait foi.',
        'lang.reviewed'    => 'Cette page a été traduite de l’anglais puis relue par une personne. En cas de différence, la version anglaise fait foi.',
        'lang.readsource'  => 'Lire l’original en anglais',

        'lang.servicenote' => 'Vous pouvez lire ce site dans de nombreuses langues. Le conseil lui-même est assuré en anglais, kannada, malayalam, hindi, tamoul et télougou.',

        'offer.text'       => 'Ce site est aussi disponible dans votre langue.',
        'offer.switch'     => 'Changer',
        'offer.dismiss'    => 'Non merci',
    ],
];
