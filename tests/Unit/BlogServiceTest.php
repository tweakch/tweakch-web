<?php
use PHPUnit\Framework\TestCase;
use App\Services\BlogContentService;
use App\Services\BlogService;

class BlogServiceTest extends TestCase
{
    private function makePost(string $slug, string $published, bool $featured): string
    {
        $dir = sys_get_temp_dir() . '/blog_' . uniqid();
        mkdir($dir);
        mkdir($dir . '/' . $slug, 0777, true);
        $fm = "---\n" .
            "title: Post $slug\n" .
            "published: $published\n" .
            ($featured ? "featured: true\n" : "") .
            "---\n# Heading\nBody";
        file_put_contents($dir . '/' . $slug . '/markdown.md', $fm);
        return $dir;
    }

    public function testFeaturedFilteringOrderingAndLimit(): void
    {
        $base = sys_get_temp_dir() . '/blogs_' . uniqid();
        mkdir($base);
        // create posts
        foreach ([
            ['a','2024-01-01', true],
            ['b','2025-02-01', true],
            ['c','2025-01-15', false],
            ['d','2023-12-01', true],
        ] as [$slug,$date,$feat]) {
            mkdir($base . '/' . $slug, 0777, true);
            $fm = "---\n" .
                "title: $slug\n" .
                "published: $date\n" .
                ($feat ? "featured: true\n" : "") .
                "---\n# H\nBody";
            file_put_contents($base . '/' . $slug . '/markdown.md', $fm);
        }
        $svc = new BlogService(new BlogContentService());
        $featured = $svc->getFeaturedPosts($base, 2);
        $this->assertCount(2, $featured);
        // Expect order by published desc among featured: b (2025-02-01), a (2024-01-01) vs d (2023-12-01)
        $this->assertSame('b', $featured[0]['post']);
        $this->assertSame('a', $featured[1]['post']);
    }
}
