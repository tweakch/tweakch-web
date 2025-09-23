<?php

namespace App\Services;

use DateTimeImmutable;
use App\Domain\Service\RecentItemsAggregator;

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
        $blogEntities = $this->blogService->getAllPostEntities($this->blogRootDir);
        $projectEntities = $this->portfolioService->getAllProjectEntities($this->portfolioRootDir);

        $aggregated = RecentItemsAggregator::aggregate($blogEntities, $projectEntities, $limit);

        $out = [];
        foreach ($aggregated as $row) {
            $out[] = [
                'type' => $row['type'] === 'project' ? 'portfolio' : $row['type'],
                'slug' => $row['slug'],
                'title' => $row['title'],
                'description' => '',
                'published' => $row['date'],
                'url' => $row['type'] === 'blog'
                    ? '/blog.php?post=' . rawurlencode($row['slug'])
                    : '/portfolio.php?project=' . rawurlencode($row['slug']),
            ];
        }
        return $out;
    }

    private function toDate(?string $value): DateTimeImmutable
    {
        if ($value) {
            try { return new DateTimeImmutable($value); } catch (\Throwable $e) {}
        }
        return new DateTimeImmutable('@0');
    }
}
