<?php

namespace App\Services;

use Symfony\Component\Finder\Finder;

class PortfolioService
{
    public function __construct(private BlogContentService $contentService)
    {
    }

    /**
     * Reads portfolio entries similarly to blog posts.
     * Directory structure: portfolio/<project>/markdown.md
     * Front matter supports: title, description, published, featured, img(optional)
     */
    public function listProjects(string $portfolioRootDir): array
    {
        $projects = [];
        if (!is_dir($portfolioRootDir)) {
            return $projects;
        }
        $finder = new Finder();
        $finder->files()->in($portfolioRootDir)->name('markdown.md')->depth('== 1');
        foreach ($finder as $file) {
            $slug = basename($file->getPath());
            $data = $this->contentService->parseFile($file->getRealPath());
            $meta = $data['metadata'];
            $projects[] = [
                'slug' => $slug,
                'title' => $meta['title'] ?? 'Untitled Project',
                'description' => $meta['description'] ?? '',
                'published' => $meta['published'] ?? '',
                'img' => $meta['img'] ?? null,
                'metadata' => $meta,
                '_source_path' => $file->getRealPath(),
            ];
        }
        usort($projects, function ($a, $b) {
            return strtotime($b['published'] ?? '1970-01-01') <=> strtotime($a['published'] ?? '1970-01-01');
        });
        return $projects;
    }

    /**
     * All projects (alias for listProjects for symmetry with blog service).
     */
    public function getAllProjects(string $portfolioRootDir): array
    {
        return $this->listProjects($portfolioRootDir);
    }

    public function getFeaturedProjects(string $portfolioRootDir, int $limit = 6): array
    {
        $all = $this->listProjects($portfolioRootDir);
        $featured = array_filter($all, function ($p) {
            return !empty($p['metadata']['featured']) && $p['metadata']['featured'] !== 'false';
        });
        usort($featured, function ($a, $b) {
            return strtotime($b['published'] ?? '1970-01-01') <=> strtotime($a['published'] ?? '1970-01-01');
        });
        return array_slice($featured, 0, $limit);
    }
}
