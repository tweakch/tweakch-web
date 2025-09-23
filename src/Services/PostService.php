<?php

namespace App\Services;

use DateTimeImmutable;

class PostService
{
    public function __construct(
        private BlogService $blogService,
        private PortfolioService $portfolioService,
        private string $blogRootDir,
        private string $portfolioRootDir
    ) {
    }

    /**
     * Unified list of recent items (blog + portfolio) sorted by published desc.
     * Each item: type, slug, title, description, published(DateTimeImmutable), url
     */
    public function getRecentItems(int $limit = 5): array
    {
        $items = [];
        $blogPosts = $this->blogService->getAllPosts($this->blogRootDir);
        foreach ($blogPosts as $p) {
            $items[] = [
                'type' => 'blog',
                'slug' => $p['post'],
                'title' => $p['title'] ?? $p['post'],
                'description' => $p['description'] ?? '',
                'published' => $this->toDate($p['published'] ?? null),
                'url' => '/blog.php?post=' . rawurlencode($p['post']),
            ];
        }
        $projects = $this->portfolioService->getAllProjects($this->portfolioRootDir);
        foreach ($projects as $proj) {
            $items[] = [
                'type' => 'portfolio',
                'slug' => $proj['slug'],
                'title' => $proj['title'],
                'description' => $proj['description'] ?? '',
                'published' => $this->toDate($proj['published'] ?? null),
                'url' => '/portfolio.php?project=' . rawurlencode($proj['slug']),
            ];
        }
        usort($items, function ($a, $b) {
            return $b['published'] <=> $a['published'];
        });
        return array_slice($items, 0, $limit);
    }

    private function toDate(?string $value): DateTimeImmutable
    {
        if ($value) {
            try { return new DateTimeImmutable($value); } catch (\Throwable $e) {}
        }
        return new DateTimeImmutable('@0');
    }
}
