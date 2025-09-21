<?php
// blog.php - Dynamic blog engine
include __DIR__ . '/includes/config.php';

use App\Services\BlogContentService;

$service = new BlogContentService();

// Get the blog post post from URL
$post = $_GET['post'] ?? '';

// If no post provided, show blog index page
if (empty($post)) {
    // Show blog index with all posts
    $blogDir = __DIR__ . '/blog';
    $blogPosts = [];
    
    if (is_dir($blogDir)) {
        $blogPosts = $service->listPosts($blogDir);
    }
    
    // Render blog index page
    echo $twig->render('pages/blog-index.html.twig', [
        'page_title' => 'Blog | ' . $SITE_NAME,
        'body_class' => 'blog-index is-preload',
        'blog_posts' => $blogPosts,
        'current_page' => 'blog.php',
        'site' => [
            'name' => $SITE_NAME,
            'author' => $SITE_AUTHOR,
            'description' => 'Modern PHP development blog'
        ]
    ]);
    exit;
}

// Validate post (security and existence check)
if (!preg_match('/^[a-z0-9-]+$/', $post)) {
    http_response_code(404);
    echo "404 - Blog post not found";
    exit;
}

// Construct file path
$blogDir = __DIR__ . '/blog/' . $post;
$markdownFile = $blogDir . '/markdown.md';

// Check if blog post exists
if (!file_exists($markdownFile)) {
    http_response_code(404);
    echo "404 - Blog post not found";
    exit;
}

// Parse the blog post via service
$parsed = $service->parseFile($markdownFile);
$metadata = $parsed['metadata'];
$content = $parsed['html'];
$tableOfContents = $parsed['toc'];
$readingTime = $parsed['readingTime'];

// Build SEO data (simple mapping)
$seoData = [
    'title' => $metadata['title'] ?? 'Untitled Post',
    'subtitle' => $metadata['subtitle'] ?? '',
    'description' => $metadata['description'] ?? '',
    'keywords' => isset($metadata['seo']['keywords']) ? $metadata['seo']['keywords'] : (isset($metadata['tags']) ? implode(', ', (array)$metadata['tags']) : ''),
    'author' => $metadata['author'] ?? '',
    'published' => $metadata['published'] ?? '',
    'og_title' => $metadata['title'] ?? '',
    'og_description' => $metadata['description'] ?? '',
    'og_type' => 'article',
    'twitter_card' => 'summary_large_image'
];

// Get related posts based on tags
$relatedPosts = [];
$currentTags = $metadata['tags'] ?? [];

if (!empty($currentTags)) {
    $allBlogPosts = [];
    $directories = array_filter(scandir(__DIR__ . '/blog'), function($item) use ($post) {
        return is_dir(__DIR__ . '/blog/' . $item) && $item !== '.' && $item !== '..' && $item !== $post;
    });
    
    foreach ($directories as $directory) {
        $relatedMarkdownFile = __DIR__ . '/blog/' . $directory . '/markdown.md';
        if (file_exists($relatedMarkdownFile)) {
            $relParsed = $service->parseFile($relatedMarkdownFile);
            $relMeta = $relParsed['metadata'];
            $relTags = $relMeta['tags'] ?? [];
            $commonTags = array_intersect($currentTags, $relTags);
            if (!empty($commonTags)) {
                $allBlogPosts[] = [
                    'post' => $directory,
                    'title' => $relMeta['title'] ?? 'Untitled Post',
                    'subtitle' => $relMeta['subtitle'] ?? '',
                    'description' => $relMeta['description'] ?? '',
                    'tags' => $relTags,
                    'commonTagCount' => count($commonTags),
                    'readingTime' => $relParsed['readingTime']
                ];
            }
        }
    }
    
    // Sort by number of common tags (descending) and take top 3
    usort($allBlogPosts, function($a, $b) {
        return $b['commonTagCount'] - $a['commonTagCount'];
    });
    
    $relatedPosts = array_slice($allBlogPosts, 0, 3);
}

// IDs for headings already injected in service parsing phase (ensure uniqueness handled there if needed)

// Build TOC HTML once (unordered list) for component reuse
$tocHtml = '';
if (!empty($tableOfContents)) {
    $tocHtml .= '<ul class="toc-list">';
    foreach ($tableOfContents as $item) {
        $level = (int)($item['level'] ?? 2);
        $id = htmlspecialchars($item['id'] ?? '', ENT_QUOTES, 'UTF-8');
        $text = htmlspecialchars($item['text'] ?? '', ENT_QUOTES, 'UTF-8');
        $tocHtml .= '<li class="toc-level-' . $level . '"><a class="toc-link" href="#' . $id . '">' . $text . '</a></li>';
    }
    $tocHtml .= '</ul>';
}

// TOC placement variant (inline | left | right)
$validVariants = ['inline','left','right'];
$variant = null;

// 1. Explicit query param has highest priority
if (isset($_GET['toc_variant']) && in_array($_GET['toc_variant'], $validVariants, true)) {
    $variant = $_GET['toc_variant'];
    setcookie('toc_variant', $variant, time() + 60*60*24*30, '/');
}

// 2. Existing cookie
if (!$variant && isset($_COOKIE['toc_variant']) && in_array($_COOKIE['toc_variant'], $validVariants, true)) {
    $variant = $_COOKIE['toc_variant'];
}

// 3. Random assignment (simple even split)
if (!$variant) {
    $variant = $validVariants[array_rand($validVariants)];
    setcookie('toc_variant', $variant, time() + 60*60*24*30, '/');
}

// If there is no TOC data, force inline (means hidden) to avoid empty sidebars
if (empty($tocHtml)) {
    $variant = 'inline';
}

// Metadata placement variant (inline | left | right) mirrors TOC approach
$metadataValidVariants = ['inline','left','right'];
$metadataVariant = null;

if (isset($_GET['metadata_variant']) && in_array($_GET['metadata_variant'], $metadataValidVariants, true)) {
    $metadataVariant = $_GET['metadata_variant'];
    setcookie('metadata_variant', $metadataVariant, time() + 60*60*24*30, '/');
}
if (!$metadataVariant && isset($_COOKIE['metadata_variant']) && in_array($_COOKIE['metadata_variant'], $metadataValidVariants, true)) {
    $metadataVariant = $_COOKIE['metadata_variant'];
}
if (!$metadataVariant) {
    $metadataVariant = $metadataValidVariants[array_rand($metadataValidVariants)];
    setcookie('metadata_variant', $metadataVariant, time() + 60*60*24*30, '/');
}

// Render metadata component for sidebar & (optionally) inline placement
$metadataSidebarHtml = $twig->render('components/blog/_metadata.html.twig', [
    'post' => [
        'author' => $metadata['author'] ?? '',
        'published' => $metadata['published'] ?? '',
        'readingTime' => $readingTime,
        'tags' => $metadata['tags'] ?? []
    ],
    'placement' => 'sidebar'
]);

$metadataInlineHtml = $metadataSidebarHtml;
if ($metadataVariant === 'inline') {
    $metadataInlineHtml = $twig->render('components/blog/_metadata.html.twig', [
        'post' => [
            'author' => $metadata['author'] ?? '',
            'published' => $metadata['published'] ?? '',
            'readingTime' => $readingTime,
            'tags' => $metadata['tags'] ?? []
        ],
        'placement' => 'inline'
    ]);
}

// Render the blog post with variant context
// Aggregate sidebar HTML fragments based on both metadata + TOC variants
$sidebarLeft = '';
$sidebarRight = '';

// Desired sidebar stacking order: TOC first, then metadata boxes
if ($variant === 'left') {
    $sidebarLeft .= $twig->render('components/blog/_toc.html.twig', ['toc_html' => $tocHtml]);
}
if ($metadataVariant === 'left') {
    $sidebarLeft .= $metadataSidebarHtml;
}
if ($variant === 'right') {
    $sidebarRight .= $twig->render('components/blog/_toc.html.twig', ['toc_html' => $tocHtml]);
}
if ($metadataVariant === 'right') {
    $sidebarRight .= $metadataSidebarHtml;
}

echo $twig->render('pages/blog-post.html.twig', [
    'page_title' => ($metadata['title'] ?? 'Untitled Post') . ' | ' . $SITE_NAME,
    'body_class' => 'blog-post is-preload',
    'current_page' => 'blog.php',
    'post' => [
        'title' => $metadata['title'] ?? 'Untitled Post',
        'subtitle' => $metadata['subtitle'] ?? '',
        'content' => $content,
        'author' => $metadata['author'] ?? '',
        'published' => $metadata['published'] ?? '',
        'tags' => $metadata['tags'] ?? [],
        'description' => $metadata['description'] ?? '',
        'readingTime' => $readingTime,
        'post' => $post
    ],
    'seo' => $seoData,
    'tableOfContents' => $tableOfContents,
    'toc_html' => $tocHtml,
    'toc_variant' => $variant,
    'metadata_html' => $metadataInlineHtml,
    'metadata_variant' => $metadataVariant,
    // Provide raw sidebar fragments so flexible layout can detect presence
    'sidebar_left' => $sidebarLeft ?: null,
    'sidebar_right' => $sidebarRight ?: null,
    'relatedPosts' => $relatedPosts,
    'site' => [
        'name' => $SITE_NAME,
        'author' => $SITE_AUTHOR,
        'description' => 'Modern PHP development blog'
    ]
]);
?>