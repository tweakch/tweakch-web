<?php
include __DIR__ . '/includes/config.php';

// Page data
$pageTitle = $lang->get('nav.home') . ' | ' . $SITE_NAME;
$bodyClass = 'homepage is-preload';

// Prepare intro sections data
$introSections = [
    [
        'icon' => 'fa-user',
        'class' => 'first',
        'title' => $lang->get('sections.intro.section1.title'),
        'desc' => $lang->get('sections.intro.section1.description')
    ],  
    [
        'icon' => 'fa-code',
        'class' => 'middle',
        'title' => $lang->get('sections.intro.section2.title'),
        'desc' => $lang->get('sections.intro.section2.description')
    ],
    [
        'icon' => 'fa-envelope',
        'class' => 'last',
        'title' => $lang->get('sections.intro.section3.title'),
        'desc' => $lang->get('sections.intro.section3.description')
    ],
];

// Prepare portfolio data
$portfolio = [
    [
        'img' => 'pic02.png',
        'title' => $lang->get('portfolio.item1.title'),
        'desc' => $lang->get('portfolio.item1.description')
    ],
    [
        'img' => 'pic03.png',
        'title' => $lang->get('portfolio.item2.title'),
        'desc' => $lang->get('portfolio.item2.description')
    ],
    [
        'img' => 'pic04.png',
        'title' => $lang->get('portfolio.item3.title'),
        'desc' => $lang->get('portfolio.item3.description')
    ],
    [
        'img' => 'pic05.jpg',
        'title' => $lang->get('portfolio.item4.title'),
        'desc' => $lang->get('portfolio.item4.description')
    ],
    [
        'img' => 'pic06.jpg',
        'title' => $lang->get('portfolio.item5.title'),
        'desc' => $lang->get('portfolio.item5.description')
    ],
    [
        'img' => 'pic07.jpg',
        'title' => $lang->get('portfolio.item6.title'),
        'desc' => $lang->get('portfolio.item6.description')
    ],
];

// Prepare blog posts data
$blogPosts = [
    [
        'img' => 'pic08.jpg',
        'title' => $lang->get('blog.post1.title'),
        'time' => $lang->get('blog.post1.date'),
        'comments' => 33,
        'desc' => $lang->get('blog.post1.excerpt')
    ],
    [
        'img' => 'pic09.jpg',
        'title' => $lang->get('blog.post2.title'),
        'time' => $lang->get('blog.post2.date'),
        'comments' => 33,
        'desc' => $lang->get('blog.post2.excerpt')
    ],
];

// Render template
echo $twig->render('pages/homepage.html.twig', [
    'page_title' => $pageTitle,
    'body_class' => $bodyClass,
    'intro_sections' => $introSections,
    'portfolio' => $portfolio,
    'blog_posts' => $blogPosts,
]);