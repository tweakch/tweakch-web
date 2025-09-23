<?php
use PHPUnit\Framework\TestCase;
use App\Domain\Entity\BlogPost;
use App\Domain\Entity\PortfolioProject;
use App\Domain\Service\RecentItemsAggregator;

class RecentItemsAggregatorTest extends TestCase
{
    private function blog(string $slug, string $date): BlogPost
    {
        return BlogPost::create($slug, ucfirst($slug), 'md', $date, [], false, null, [], 5);
    }

    private function project(string $slug, string $date): PortfolioProject
    {
        return PortfolioProject::create($slug, ucfirst($slug), 'sum', 'md', $date, [], false, null, []);
    }

    public function testAggregateOrdersAndLimits(): void
    {
        $blogs = [
            $this->blog('b1', '2024-01-01'),
            $this->blog('b2', '2025-01-01'),
        ];
        $projects = [
            $this->project('p1', '2024-06-01'),
            $this->project('p2', '2023-12-01'),
        ];

        $result = RecentItemsAggregator::aggregate($blogs, $projects, 3);
        $this->assertCount(3, $result);
        $this->assertSame('b2', $result[0]['slug']);
        $this->assertSame('p1', $result[1]['slug']);
        $this->assertSame('b1', $result[2]['slug']);
    }
}
