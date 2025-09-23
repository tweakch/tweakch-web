<?php
namespace App\Domain\Service;

use App\Domain\Entity\BlogPost;
use App\Domain\Entity\PortfolioProject;

class RecentItemsAggregator
{
    /**
     * @param BlogPost[] $blogPosts
     * @param PortfolioProject[] $projects
     * @return array<int, array{type:string, slug:string, title:string, date:\DateTimeImmutable}>
     */
    public static function aggregate(array $blogPosts, array $projects, int $limit = 5): array
    {
        $items = [];
        foreach ($blogPosts as $p) {
            $items[] = [
                'type' => 'blog',
                'slug' => $p->slug(),
                'title' => $p->title(),
                'date' => $p->publishedAt(),
            ];
        }
        foreach ($projects as $pr) {
            $items[] = [
                'type' => 'project',
                'slug' => $pr->slug(),
                'title' => $pr->title(),
                'date' => $pr->publishedAt(),
            ];
        }

        usort($items, static function(array $a, array $b) {
            return $b['date'] <=> $a['date'];
        });

        return array_slice($items, 0, $limit);
    }
}
