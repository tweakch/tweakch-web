<?php

declare(strict_types=1);

namespace Tests\Integration;

use PHPUnit\Framework\TestCase;

/**
 * Test the .htaccess rewrite rules logic
 * 
 * This tests the regex patterns and logic that would be applied by Apache
 * when processing clean URLs for blog posts.
 */
class HtaccessRewriteTest extends TestCase
{
    /**
     * Test data provider for URL rewrite scenarios
     */
    public static function urlRewriteProvider(): array
    {
        return [
            // [input_url, should_match, expected_post_slug]
            ['/blog/a-dotnet-developers-php-api', true, 'a-dotnet-developers-php-api'],
            ['/blog/layout-4-2-1-guideline', true, 'layout-4-2-1-guideline'],
            ['/blog/simple-post', true, 'simple-post'],
            ['/blog/test123', true, 'test123'],
            ['/blog/post-with-numbers-2024', true, 'post-with-numbers-2024'],
            ['/blog/valid-slug/', true, 'valid-slug'], // with trailing slash
            
            // Should NOT match
            ['/blog/Invalid-With-Caps', false, null],
            ['/blog/invalid_underscore', false, null],
            ['/blog/invalid space', false, null],
            ['/blog/', false, null],
            ['/blog', false, null],
            ['/blog/post/subpath', false, null],
            ['/portfolio/some-project', false, null], // different prefix
        ];
    }

    /**
     * Test the blog URL rewrite pattern
     * 
     * This simulates the Apache rewrite rule: ^blog/([a-z0-9-]+)/?$
     * 
     * @dataProvider urlRewriteProvider
     */
    public function testBlogUrlRewritePattern(string $url, bool $shouldMatch, ?string $expectedSlug): void
    {
        // The regex pattern from .htaccess: ^blog/([a-z0-9-]+)/?$
        // But we need to adapt it for PHP (remove ^ and add leading slash check)
        $pattern = '#^/blog/([a-z0-9-]+)/?$#';
        
        $matches = [];
        $matched = preg_match($pattern, $url, $matches);
        
        if ($shouldMatch) {
            $this->assertTrue((bool)$matched, "URL '$url' should match the rewrite pattern");
            $this->assertEquals($expectedSlug, $matches[1], "Extracted slug should match expected value");
        } else {
            $this->assertFalse((bool)$matched, "URL '$url' should NOT match the rewrite pattern");
        }
    }

    /**
     * Test that valid blog posts would be accessible via the rewrite
     */
    public function testValidBlogPostsRewrite(): void
    {
        $blogDir = __DIR__ . '/../../blog';
        
        if (!is_dir($blogDir)) {
            $this->markTestSkipped('Blog directory not found');
        }

        // Get actual blog posts
        $actualPosts = array_filter(scandir($blogDir), function($item) use ($blogDir) {
            return is_dir($blogDir . '/' . $item) && $item !== '.' && $item !== '..';
        });

        foreach ($actualPosts as $postSlug) {
            $cleanUrl = "/blog/$postSlug";
            $pattern = '#^/blog/([a-z0-9-]+)/?$#';
            
            $matches = [];
            $matched = preg_match($pattern, $cleanUrl, $matches);
            
            $this->assertTrue((bool)$matched, "Post '$postSlug' should have a valid clean URL");
            $this->assertEquals($postSlug, $matches[1], "Extracted slug should match the post directory name");
            
            // Verify the markdown file exists
            $markdownFile = $blogDir . '/' . $postSlug . '/markdown.md';
            $this->assertTrue(file_exists($markdownFile), "Markdown file should exist for post '$postSlug'");
        }
    }

    /**
     * Test security: ensure sensitive files would be blocked
     */
    public function testSensitiveFileBlocking(): void
    {
        $sensitivePatterns = [
            '\.md$',
            '\.yml$', 
            '\.yaml$',
            '\.json$',
            '\.lock$',
            '\.env$',
            '^composer\.(json|lock|phar)$',
        ];

        $testFiles = [
            'test.md',
            'config.yml',
            'settings.yaml', 
            'data.json',
            'composer.lock',
            '.env',
            'composer.json',
            'composer.phar',
        ];

        foreach ($testFiles as $file) {
            $shouldBeBlocked = false;
            foreach ($sensitivePatterns as $pattern) {
                if (preg_match("#$pattern#", $file)) {
                    $shouldBeBlocked = true;
                    break;
                }
            }
            
            $this->assertTrue($shouldBeBlocked, "File '$file' should be blocked by security patterns");
        }
    }
}