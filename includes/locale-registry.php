<?php
/**
 * LOCALE REGISTRY. The catalogue of languages the site knows how to render.
 *
 * This file answers one question only: "if a translation existed for this
 * language, how would we render it?" It says nothing about whether a
 * translation exists, whether it is any good, or whether it may be indexed.
 * Those are separate concerns handled in i18n.php, deliberately, so that
 * adding a language never means touching rendering logic.
 *
 * ADDING A LANGUAGE IS ONE STEP: add a row below. The language then appears in
 * the switcher and the whole site is readable in it, because assets/js/
 * translate.js translates the document at runtime. No core file changes, no
 * template edits, no .htaccess edit.
 *
 * A translation file at locales/<code>.php is optional and is an upgrade: it
 * supplies hand written interface strings and is what makes a locale eligible
 * for indexing. THIS FILE IS NOW THE THING THAT MAKES A LANGUAGE EXIST, not
 * the locales directory. Do not reintroduce a locale-file test into routing;
 * doing so is what once 404'd every language that had no file.
 *
 * A row here is offered only if a machine translation exists for it, which
 * fbh_mt_code() in i18n.php decides. Tulu and Tibetan have rows and are
 * deliberately not offered, because listing a language that quietly serves
 * English is worse than not listing it.
 *
 * Each row: [ native name, English name, hreflang, script, direction ]
 *   native    what speakers call the language, shown first in the switcher
 *   english   the English exonym, shown as the secondary line so a visitor who
 *             cannot yet read the script can still find their language
 *   hreflang  the BCP 47 tag emitted in <link rel="alternate">. Region
 *             subtags are used ONLY where they carry real meaning, for
 *             example pt-BR against pt-PT, or the Indian languages where
 *             the audience is unambiguously in India.
 *   script    drives which webfont is loaded. See fbh_script_font().
 *   dir       ltr or rtl. Anything rtl gets dir="rtl" on <html> and the
 *             logical-property CSS block in site.css section 19d.
 *
 * The list is intentionally long. It is a catalogue, not a workload: an entry
 * here costs nothing until a translation file appears next to it.
 */

if (!function_exists('fbh_locale_registry')) {

function fbh_locale_registry() {
    static $r = null;
    if ($r !== null) return $r;

    $r = [
        // Source language
        'en'      => ['English',        'English',            'en',      'latin',       'ltr'],

        // India, in the order Fawaz's market matters
        'kn'      => ['ಕನ್ನಡ',           'Kannada',            'kn-IN',   'kannada',     'ltr'],
        'hi'      => ['हिन्दी',           'Hindi',              'hi-IN',   'devanagari',  'ltr'],
        'ml'      => ['മലയാളം',         'Malayalam',          'ml-IN',   'malayalam',   'ltr'],
        'ta'      => ['தமிழ்',           'Tamil',              'ta-IN',   'tamil',       'ltr'],
        'te'      => ['తెలుగు',          'Telugu',             'te-IN',   'telugu',      'ltr'],
        'mr'      => ['मराठी',           'Marathi',            'mr-IN',   'devanagari',  'ltr'],
        'bn'      => ['বাংলা',           'Bengali',            'bn',      'bengali',     'ltr'],
        'gu'      => ['ગુજરાતી',         'Gujarati',           'gu-IN',   'gujarati',    'ltr'],
        'pa'      => ['ਪੰਜਾਬੀ',          'Punjabi',            'pa-IN',   'gurmukhi',    'ltr'],
        'or'      => ['ଓଡ଼ିଆ',           'Odia',               'or-IN',   'oriya',       'ltr'],
        'as'      => ['অসমীয়া',         'Assamese',           'as-IN',   'bengali',     'ltr'],
        'ur'      => ['اردو',            'Urdu',               'ur',      'arabic',      'rtl'],
        'ne'      => ['नेपाली',          'Nepali',             'ne',      'devanagari',  'ltr'],
        'si'      => ['සිංහල',          'Sinhala',            'si',      'sinhala',     'ltr'],
        'sd'      => ['سنڌي',            'Sindhi',             'sd',      'arabic',      'rtl'],
        'ks'      => ['कॉशुर',           'Kashmiri',           'ks',      'devanagari',  'ltr'],
        'kok'     => ['कोंकणी',          'Konkani',            'kok',     'devanagari',  'ltr'],
        'mai'     => ['मैथिली',          'Maithili',           'mai',     'devanagari',  'ltr'],
        'sa'      => ['संस्कृतम्',        'Sanskrit',           'sa',      'devanagari',  'ltr'],
        'tcy'     => ['ತುಳು',           'Tulu',               'tcy',     'kannada',     'ltr'],

        // Europe
        'es'      => ['Español',         'Spanish',            'es',      'latin',       'ltr'],
        'fr'      => ['Français',        'French',             'fr',      'latin',       'ltr'],
        'de'      => ['Deutsch',         'German',             'de',      'latin',       'ltr'],
        'de-CH'   => ['Schweizerdeutsch','Swiss German',       'de-CH',   'latin',       'ltr'],
        'it'      => ['Italiano',        'Italian',            'it',      'latin',       'ltr'],
        'pt'      => ['Português',       'Portuguese',         'pt-PT',   'latin',       'ltr'],
        'pt-BR'   => ['Português (BR)',  'Portuguese (Brazil)','pt-BR',   'latin',       'ltr'],
        'nl'      => ['Nederlands',      'Dutch',              'nl',      'latin',       'ltr'],
        'pl'      => ['Polski',          'Polish',             'pl',      'latin',       'ltr'],
        'ru'      => ['Русский',         'Russian',            'ru',      'cyrillic',    'ltr'],
        'uk'      => ['Українська',      'Ukrainian',          'uk',      'cyrillic',    'ltr'],
        'ro'      => ['Română',          'Romanian',           'ro',      'latin',       'ltr'],
        'el'      => ['Ελληνικά',        'Greek',              'el',      'greek',       'ltr'],
        'cs'      => ['Čeština',         'Czech',              'cs',      'latin',       'ltr'],
        'sk'      => ['Slovenčina',      'Slovak',             'sk',      'latin',       'ltr'],
        'hu'      => ['Magyar',          'Hungarian',          'hu',      'latin',       'ltr'],
        'sv'      => ['Svenska',         'Swedish',            'sv',      'latin',       'ltr'],
        'da'      => ['Dansk',           'Danish',             'da',      'latin',       'ltr'],
        'fi'      => ['Suomi',           'Finnish',            'fi',      'latin',       'ltr'],
        'nb'      => ['Norsk bokmål',    'Norwegian',          'nb',      'latin',       'ltr'],
        'bg'      => ['Български',       'Bulgarian',          'bg',      'cyrillic',    'ltr'],
        'hr'      => ['Hrvatski',        'Croatian',           'hr',      'latin',       'ltr'],
        'sr'      => ['Српски',          'Serbian',            'sr',      'cyrillic',    'ltr'],
        'sl'      => ['Slovenščina',     'Slovenian',          'sl',      'latin',       'ltr'],
        'lt'      => ['Lietuvių',        'Lithuanian',         'lt',      'latin',       'ltr'],
        'lv'      => ['Latviešu',        'Latvian',            'lv',      'latin',       'ltr'],
        'et'      => ['Eesti',           'Estonian',           'et',      'latin',       'ltr'],
        'is'      => ['Íslenska',        'Icelandic',          'is',      'latin',       'ltr'],
        'ga'      => ['Gaeilge',         'Irish',              'ga',      'latin',       'ltr'],
        'cy'      => ['Cymraeg',         'Welsh',              'cy',      'latin',       'ltr'],
        'ca'      => ['Català',          'Catalan',            'ca',      'latin',       'ltr'],
        'eu'      => ['Euskara',         'Basque',             'eu',      'latin',       'ltr'],
        'gl'      => ['Galego',          'Galician',           'gl',      'latin',       'ltr'],
        'sq'      => ['Shqip',           'Albanian',           'sq',      'latin',       'ltr'],
        'mk'      => ['Македонски',      'Macedonian',         'mk',      'cyrillic',    'ltr'],
        'mt'      => ['Malti',           'Maltese',            'mt',      'latin',       'ltr'],

        // Middle East, Central Asia, Caucasus
        'ar'      => ['العربية',          'Arabic',             'ar',      'arabic',      'rtl'],
        'he'      => ['עברית',           'Hebrew',             'he',      'hebrew',      'rtl'],
        'fa'      => ['فارسی',           'Persian',            'fa',      'arabic',      'rtl'],
        'ps'      => ['پښتو',            'Pashto',             'ps',      'arabic',      'rtl'],
        'ku'      => ['Kurdî',           'Kurdish',            'ku',      'latin',       'ltr'],
        'tr'      => ['Türkçe',          'Turkish',            'tr',      'latin',       'ltr'],
        'az'      => ['Azərbaycanca',    'Azerbaijani',        'az',      'latin',       'ltr'],
        'hy'      => ['Հայերեն',         'Armenian',           'hy',      'armenian',    'ltr'],
        'ka'      => ['ქართული',        'Georgian',           'ka',      'georgian',    'ltr'],
        'kk'      => ['Қазақша',         'Kazakh',             'kk',      'cyrillic',    'ltr'],
        'uz'      => ['Oʻzbekcha',       'Uzbek',              'uz',      'latin',       'ltr'],
        'ky'      => ['Кыргызча',        'Kyrgyz',             'ky',      'cyrillic',    'ltr'],
        'tg'      => ['Тоҷикӣ',          'Tajik',              'tg',      'cyrillic',    'ltr'],
        'tk'      => ['Türkmençe',       'Turkmen',            'tk',      'latin',       'ltr'],
        'mn'      => ['Монгол',          'Mongolian',          'mn',      'cyrillic',    'ltr'],

        // East and Southeast Asia
        'zh-Hans' => ['简体中文',         'Chinese (Simplified)','zh-Hans','han-sc',      'ltr'],
        'zh-Hant' => ['繁體中文',         'Chinese (Traditional)','zh-Hant','han-tc',     'ltr'],
        'ja'      => ['日本語',           'Japanese',           'ja',      'japanese',    'ltr'],
        'ko'      => ['한국어',           'Korean',             'ko',      'korean',      'ltr'],
        'th'      => ['ไทย',             'Thai',               'th',      'thai',        'ltr'],
        'vi'      => ['Tiếng Việt',      'Vietnamese',         'vi',      'latin',       'ltr'],
        'id'      => ['Bahasa Indonesia','Indonesian',         'id',      'latin',       'ltr'],
        'ms'      => ['Bahasa Melayu',   'Malay',              'ms',      'latin',       'ltr'],
        'fil'     => ['Filipino',        'Filipino',           'fil',     'latin',       'ltr'],
        'my'      => ['မြန်မာ',          'Burmese',            'my',      'myanmar',     'ltr'],
        'km'      => ['ខ្មែរ',            'Khmer',              'km',      'khmer',       'ltr'],
        'lo'      => ['ລາວ',             'Lao',                'lo',      'lao',         'ltr'],
        'bo'      => ['བོད་སྐད་',          'Tibetan',            'bo',      'tibetan',     'ltr'],

        // Africa
        'sw'      => ['Kiswahili',       'Swahili',            'sw',      'latin',       'ltr'],
        'am'      => ['አማርኛ',           'Amharic',            'am',      'ethiopic',    'ltr'],
        'ti'      => ['ትግርኛ',           'Tigrinya',           'ti',      'ethiopic',    'ltr'],
        'ha'      => ['Hausa',           'Hausa',              'ha',      'latin',       'ltr'],
        'yo'      => ['Yorùbá',          'Yoruba',             'yo',      'latin',       'ltr'],
        'ig'      => ['Igbo',            'Igbo',               'ig',      'latin',       'ltr'],
        'zu'      => ['isiZulu',         'Zulu',               'zu',      'latin',       'ltr'],
        'xh'      => ['isiXhosa',        'Xhosa',              'xh',      'latin',       'ltr'],
        'af'      => ['Afrikaans',       'Afrikaans',          'af',      'latin',       'ltr'],
        'so'      => ['Soomaali',        'Somali',             'so',      'latin',       'ltr'],
        'rw'      => ['Kinyarwanda',     'Kinyarwanda',        'rw',      'latin',       'ltr'],
        'mg'      => ['Malagasy',        'Malagasy',           'mg',      'latin',       'ltr'],
        'sn'      => ['ChiShona',        'Shona',              'sn',      'latin',       'ltr'],
        'ny'      => ['Chichewa',        'Chichewa',           'ny',      'latin',       'ltr'],

        // Americas and Pacific
        'ht'      => ['Kreyòl ayisyen',  'Haitian Creole',     'ht',      'latin',       'ltr'],
        'qu'      => ['Runa Simi',       'Quechua',            'qu',      'latin',       'ltr'],
        'gn'      => ['Avañeẽ',          'Guarani',            'gn',      'latin',       'ltr'],
        'mi'      => ['Te Reo Māori',    'Maori',              'mi',      'latin',       'ltr'],
        'sm'      => ['Gagana Samoa',    'Samoan',             'sm',      'latin',       'ltr'],
        'haw'     => ['ʻŌlelo Hawaiʻi',  'Hawaiian',           'haw',     'latin',       'ltr'],
    ];

    return $r;
}

}

if (!function_exists('fbh_script_font')) {

/**
 * Which webfont a script needs, or null when the existing UI face covers it.
 *
 * Inter already carries Latin, Cyrillic and Greek, so those load nothing extra.
 * Everything else needs a Noto face or the glyphs render as tofu boxes.
 *
 * CJK is deliberately null. A full Chinese, Japanese or Korean webfont is
 * several megabytes, which would wreck the performance work done for
 * PageSpeed. Those scripts fall back to the platform's own CJK face, which
 * every CJK-capable device already has and which users generally prefer. The
 * stack is defined in site.css.
 */
function fbh_script_font($script) {
    $map = [
        'latin'      => null,
        'cyrillic'   => null,
        'greek'      => null,
        'han-sc'     => null,
        'han-tc'     => null,
        'japanese'   => null,
        'korean'     => null,
        'devanagari' => 'Noto+Sans+Devanagari:wght@400;600',
        'kannada'    => 'Noto+Sans+Kannada:wght@400;600',
        'tamil'      => 'Noto+Sans+Tamil:wght@400;600',
        'telugu'     => 'Noto+Sans+Telugu:wght@400;600',
        'malayalam'  => 'Noto+Sans+Malayalam:wght@400;600',
        'bengali'    => 'Noto+Sans+Bengali:wght@400;600',
        'gujarati'   => 'Noto+Sans+Gujarati:wght@400;600',
        'gurmukhi'   => 'Noto+Sans+Gurmukhi:wght@400;600',
        'oriya'      => 'Noto+Sans+Oriya:wght@400;600',
        'sinhala'    => 'Noto+Sans+Sinhala:wght@400;600',
        'arabic'     => 'Noto+Sans+Arabic:wght@400;600',
        'hebrew'     => 'Noto+Sans+Hebrew:wght@400;600',
        'thai'       => 'Noto+Sans+Thai:wght@400;600',
        'lao'        => 'Noto+Sans+Lao:wght@400;600',
        'khmer'      => 'Noto+Sans+Khmer:wght@400;600',
        'myanmar'    => 'Noto+Sans+Myanmar:wght@400;600',
        'ethiopic'   => 'Noto+Sans+Ethiopic:wght@400;600',
        'armenian'   => 'Noto+Sans+Armenian:wght@400;600',
        'georgian'   => 'Noto+Sans+Georgian:wght@400;600',
        'tibetan'    => 'Noto+Serif+Tibetan:wght@400;600',
    ];
    return $map[$script] ?? null;
}

}
