<?php
use PHPUnit\Framework\TestCase;
use App\Services\BlogContentService;
use App\Services\PortfolioService;

class PortfolioServiceTest extends TestCase
{
    public function testFeaturedProjectsOrderingAndLimit(): void
    {
        $base = sys_get_temp_dir() . '/portfolio_' . uniqid();
        mkdir($base);
        foreach ([
            ['p1','2024-05-01', true],
            ['p2','2025-01-10', true],
            ['p3','2024-12-31', false],
            ['p4','2023-11-11', true],
        ] as [$slug,$date,$feat]) {
            mkdir($base . '/' . $slug, 0777, true);
            $fm = "---\n" .
                "title: $slug\n" .
                "published: $date\n" .
                ($feat ? "featured: true\n" : "") .
                "---\n# Title\nBody";
            file_put_contents($base . '/' . $slug . '/markdown.md', $fm);
        }
        $svc = new PortfolioService(new BlogContentService());
        $featured = $svc->getFeaturedProjects($base, 2);
        $this->assertCount(2, $featured);
        $this->assertSame('p2', $featured[0]['slug']);
        $this->assertSame('p1', $featured[1]['slug']);
    }
}
