<?php
use PHPUnit\Framework\TestCase;
use App\Services\BlogContentService;

class BlogContentServiceTest extends TestCase
{
    private function tempMarkdown(string $content): string
    {
        $dir = sys_get_temp_dir() . '/bcs_' . uniqid();
        mkdir($dir);
        $file = $dir . '/markdown.md';
        file_put_contents($file, $content);
        return $file;
    }

    public function testFrontMatterFallbacksAndTagsParsing(): void
    {
        $md = <<<MD
---
published: 2024-09-01
tags: php, twig, testing
---
# Sample Title

This is the first paragraph explaining things.

## Subheading
Content
MD;
        $file = $this->tempMarkdown($md);
        $svc = new BlogContentService();
        $parsed = $svc->parseFile($file);
        $meta = $parsed['metadata'];
        $this->assertSame('Sample Title', $meta['title']);
        // Description may have fallback ellipsis; ensure contains phrase
        if (isset($meta['description'])) {
            $this->assertStringContainsString('This is the first paragraph', $meta['description']);
        }
        $this->assertEquals(['php','twig','testing'], $meta['tags']);
        $this->assertMatchesRegularExpression('/^\d+ min read$/', $parsed['readingTime']);
    }

    public function testHeadingIdsAndTocExtraction(): void
    {
        $md = <<<MD
---
---
# Title

## First Section
Text

### Sub Part
More
MD;
        $file = $this->tempMarkdown($md);
        $svc = new BlogContentService();
        $parsed = $svc->parseFile($file);
        $toc = $parsed['toc'];
        $ids = array_column($toc, 'id');
        $this->assertContains('first-section', $ids);
        $this->assertContains('sub-part', $ids);
        $html = $parsed['html'];
    // HeadingPermalinkExtension wraps anchors differently; assert id attributes and text presence
    $this->assertMatchesRegularExpression('/<h2[^>]*>First Section.*<\/h2>/', $html);
    $this->assertMatchesRegularExpression('/<h3[^>]*>Sub Part.*<\/h3>/', $html);
    $this->assertStringContainsString('id="first-section"', $html);
    $this->assertStringContainsString('id="sub-part"', $html);
    }

    public function testCodeBlockNormalizationAddsHljs(): void
    {
        $md = <<<MD
---
---
# Title

```php
<?php echo 'hi';
```
MD;
        $file = $this->tempMarkdown($md);
        $svc = new BlogContentService();
        $parsed = $svc->parseFile($file);
        $this->assertStringContainsString('<code class="language-php hljs">', $parsed['html']);
    }
}
