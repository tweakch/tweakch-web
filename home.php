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
        'icon' => 'fa-graduation-cap',
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

use App\Services\BlogContentService;
use App\Services\BlogService;
use App\Services\PortfolioService;

$contentService = new BlogContentService();
$blogService = new BlogService($contentService);
$portfolioService = new PortfolioService($contentService);

$blogDir = __DIR__ . '/blog';
$portfolioDir = __DIR__ . '/portfolio';

// Dynamic featured portfolio projects
$portfolioItems = $portfolioService->getFeaturedProjects($portfolioDir);
// Map to template shape expected
$portfolio = array_map(function ($p) {
    return [
        'img' => $p['img'] ?? 'pic02.png', // fallback image
        'title' => $p['title'],
        'desc' => $p['description'],
        'slug' => $p['slug'],
    ];
}, $portfolioItems);

// Dynamic featured blog posts
$blogPostsFeatured = $blogService->getFeaturedPosts($blogDir);
$blogPosts = array_map(function ($p) {
    return [
        'img' => 'pic08.jpg', // placeholder image until metadata supports it
        'title' => $p['title'],
        'time' => $p['published'],
        'link' => 'blog.php?post=' . urlencode($p['post']),
        'comments' => 0,
        'desc' => $p['description'],
        'post' => $p['post'],
    ];
}, $blogPostsFeatured);

// Render template
echo $twig->render('pages/homepage.html.twig', [
    'page_title' => $pageTitle,
    'body_class' => $bodyClass,
    'intro_sections' => $introSections,
    'portfolio' => $portfolio,
    'blog_posts' => $blogPosts,
]);