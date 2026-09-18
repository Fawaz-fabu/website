<?php
/**
 * Simplified Chinese interface strings. Machine drafted, unreviewed, labelled.
 *
 * This locale exercises two things worth knowing about. First, a hyphenated
 * registry code, so the filename is zh-Hans.php and matching is case
 * insensitive: /zh-hans and /zh-Hans both resolve here. Second, the deliberate
 * absence of a webfont. fbh_script_font() returns null for Han, because a full
 * Chinese webfont runs to several megabytes and would undo the PageSpeed work.
 * The platform CJK stack in site.css handles it, and CJK users generally prefer
 * their system face anyway.
 */

return [

    'meta' => [
        'provenance' => 'machine',
        'published'  => false,
        'reviewer'   => '',
        'updated'    => '2026-09-02',
    ],

    'strings' => [
        'nav.home'         => '首页',
        'nav.services'     => '服务',
        'nav.aiseo'        => 'AI SEO',
        'nav.cities'       => '城市',
        'nav.cases'        => '案例研究',
        'nav.blog'         => '博客',
        'nav.about'        => '关于',
        'nav.contact'      => '联系',

        'cta.audit'        => '免费诊断',
        'cta.auditlong'    => '申请免费诊断',

        'a11y.skip'        => '跳到主要内容',

        'lang.label'       => '语言',
        'lang.choose'      => '选择语言',
        'lang.search'      => '搜索语言',
        'lang.none'        => '没有匹配的语言。',

        'lang.machine'     => '本页由英文机器翻译而成，尚未经人工校对，部分表述可能不自然。英文原文为准。',
        'lang.reviewed'    => '本页由英文翻译并经人工校对。如有差异，以英文原文为准。',
        'lang.readsource'  => '阅读英文原文',

        'lang.servicenote' => '本网站可用多种语言阅读。咨询服务本身以英语、卡纳达语、马拉雅拉姆语、印地语、泰米尔语和泰卢固语提供。',

        'offer.text'       => '本网站也提供您的语言版本。',
        'offer.switch'     => '切换',
        'offer.dismiss'    => '不用了',
    ],
];
