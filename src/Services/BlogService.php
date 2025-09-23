<?php

namespace App\Services;

use Symfony\Component\Finder\Finder;

class BlogService
{
    public function __construct(private BlogContentService $contentService)
    {
    }

    /**
     * Return all blog posts (not filtered), newest first.
     */
    public function getAllPosts(string $blogRootDir): array
    {
        return $this->contentService->listPosts($blogRootDir);
    }

    /**
     * Return featured blog posts limited by $limit.
     * Each item: post, title, description, published, tags, readingTime, metadata
     */
    public function getFeaturedPosts(string $blogRootDir, int $limit = 3): array
    {
        $all = $this->contentService->listPosts($blogRootDir);
        $featured = array_filter($all, function ($p) {
            return !empty($p['metadata']['featured']) && $p['metadata']['featured'] !== 'false';
        });
        // sort again by published just in case
        usort($featured, function ($a, $b) {
            return strtotime($b['published'] ?? '1970-01-01') <=> strtotime($a['published'] ?? '1970-01-01');
        });
        return array_slice($featured, 0, $limit);
    }
}
