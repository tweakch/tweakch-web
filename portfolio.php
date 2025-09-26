<?php
include __DIR__ . '/includes/config.php';

use App\Services\BlogContentService; // Reuse for markdown/front matter parsing
use Symfony\Component\Finder\Finder;

$service = new BlogContentService();
$projectSlug = $_GET['project'] ?? '';
$portfolioRoot = __DIR__ . '/portfolio';

// Helper: sanitize slug
function isValidSlug(string $slug): bool {
    return (bool) preg_match('/^[a-z0-9-]+$/', $slug);
}

// List all projects if no specific project requested
if ($projectSlug === '') {
    $projects = [];
    if (is_dir($portfolioRoot)) {
        $finder = new Finder();
        $finder->files()->in($portfolioRoot)->name('markdown.md')->depth('== 1');
        foreach ($finder as $file) {
            $slug = basename($file->getPath());
            $parsed = $service->parseFile($file->getRealPath());
            $meta = $parsed['metadata'];
            // Normalize tech list if provided as string
            if (isset($meta['tech']) && is_string($meta['tech'])) {
                $meta['tech'] = array_filter(array_map('trim', explode(',', $meta['tech'])));
            }
            $projects[] = [
                'slug' => $slug,
                'title' => $meta['title'] ?? 'Untitled Project',
                'description' => $meta['description'] ?? '',
                'client' => $meta['client'] ?? '',
                'role' => $meta['role'] ?? '',
                'tech' => $meta['tech'] ?? [],
                'tags' => $meta['tags'] ?? [],
                'metadata' => $meta,
            ];
        }
        // Sort: optional by title for now
        usort($projects, fn($a,$b) => strcasecmp($a['title'], $b['title']));
    }

    echo $twig->render('pages/portfolio-index.html.twig', [
        'page_title' => 'Portfolio | ' . $SITE_NAME,
        'body_class' => 'portfolio-index is-preload',
        'projects' => $projects,
        'current_page' => 'portfolio.php',
    ]);
    exit;
}

// Detail view
if (!isValidSlug($projectSlug)) {
    http_response_code(404);
    echo '404 - Project not found';
    exit;
}

$projectDir = $portfolioRoot . '/' . $projectSlug;
$markdownFile = $projectDir . '/markdown.md';
if (!file_exists($markdownFile)) {
    http_response_code(404);
    echo '404 - Project not found';
    exit;
}

$parsed = $service->parseFile($markdownFile);
$meta = $parsed['metadata'];
$contentHtml = $parsed['html'];

// Normalize tech list
if (isset($meta['tech']) && is_string($meta['tech'])) {
    $meta['tech'] = array_filter(array_map('trim', explode(',', $meta['tech'])));
}

// Details (metadata) placement variant: inline | left | right (A/B test like blog)
$validVariants = ['inline','left','right'];
$detailsVariant = null;
if (isset($_GET['details_variant']) && in_array($_GET['details_variant'], $validVariants, true)) {
    $detailsVariant = $_GET['details_variant'];
    setcookie('details_variant', $detailsVariant, time()+60*60*24*30, '/');
}
if (!$detailsVariant && isset($_COOKIE['details_variant']) && in_array($_COOKIE['details_variant'], $validVariants, true)) {
    $detailsVariant = $_COOKIE['details_variant'];
}
if (!$detailsVariant) {
    $detailsVariant = $validVariants[array_rand($validVariants)];
    setcookie('details_variant', $detailsVariant, time()+60*60*24*30, '/');
}

// Render details component for sidebar & inline placement
$detailsSidebarHtml = $twig->render('components/portfolio/_details.html.twig', [
    'project' => [
        'client' => $meta['client'] ?? '',
        'role' => $meta['role'] ?? '',
        'tech' => $meta['tech'] ?? [],
        'tags' => $meta['tags'] ?? [],
    ],
    'placement' => 'sidebar'
]);

$detailsInlineHtml = $detailsSidebarHtml;
if ($detailsVariant === 'inline') {
    $detailsInlineHtml = $twig->render('components/portfolio/_details.html.twig', [
        'project' => [
            'client' => $meta['client'] ?? '',
            'role' => $meta['role'] ?? '',
            'tech' => $meta['tech'] ?? [],
            'tags' => $meta['tags'] ?? [],
        ],
        'placement' => 'inline'
    ]);
}

// Aggregate sidebars (details only for now; extend later for TOC or related projects)
$sidebarLeft = '';
$sidebarRight = '';
if ($detailsVariant === 'left') {
    $sidebarLeft .= $detailsSidebarHtml;
} elseif ($detailsVariant === 'right') {
    $sidebarRight .= $detailsSidebarHtml;
}

// Simple SEO metadata
$seo = [
    'title' => $meta['title'] ?? 'Project',
    'description' => $meta['description'] ?? '',
    'keywords' => isset($meta['tech']) && is_array($meta['tech']) ? implode(', ', $meta['tech']) : ''
];

echo $twig->render('pages/portfolio-project.html.twig', [
    'page_title' => ($meta['title'] ?? 'Project') . ' | ' . $SITE_NAME,
    'body_class' => 'portfolio-project is-preload',
    'current_page' => 'portfolio.php',
    'project' => [
        'slug' => $projectSlug,
        'title' => $meta['title'] ?? 'Untitled Project',
        'description' => $meta['description'] ?? '',
        'client' => $meta['client'] ?? '',
        'role' => $meta['role'] ?? '',
        'tech' => $meta['tech'] ?? [],
        'tags' => $meta['tags'] ?? [],
        'content' => $contentHtml,
    ],
    'details_variant' => $detailsVariant,
    'details_html' => $detailsInlineHtml,
    'sidebar_left' => $sidebarLeft ?: null,
    'sidebar_right' => $sidebarRight ?: null,
    'seo' => $seo,
]);
?>
