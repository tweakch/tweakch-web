<?php

namespace App\Services;

use Symfony\Component\Finder\Finder;
use App\Domain\Mapper\BlogPostMapper;
use App\Domain\Entity\BlogPost;

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
     * Return all blog posts as domain entities.
     * @return BlogPost[]
     */
    public function getAllPostEntities(string $blogRootDir): array
    {
        $raw = $this->contentService->listPosts($blogRootDir);
        $entities = [];
        foreach ($raw as $p) {
            $meta = $p['metadata'] ?? [];
            $entities[] = BlogPostMapper::fromArray([
                'slug' => $p['post'] ?? ($meta['slug'] ?? ''),
                'title' => $p['title'] ?? ($meta['title'] ?? ''),
                'markdown' => $p['raw_markdown'] ?? ($p['markdown'] ?? ''),
                'published' => $p['published'] ?? ($meta['published'] ?? null),
                'tags' => $meta['tags'] ?? [],
                'featured' => $meta['featured'] ?? false,
                'description' => $meta['description'] ?? null,
                'keywords' => $meta['keywords'] ?? [],
                'word_count' => $p['word_count'] ?? null,
            ]);
        }
        return $entities;
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
