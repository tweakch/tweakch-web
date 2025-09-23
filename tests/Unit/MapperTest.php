<?php
use PHPUnit\Framework\TestCase;
use App\Domain\Mapper\BlogPostMapper;
use App\Domain\Mapper\PortfolioProjectMapper;

class MapperTest extends TestCase
{
    public function testBlogPostMapper(): void
    {
        $entity = BlogPostMapper::fromArray([
            'slug' => 'hello-world',
            'title' => 'Hello World',
            'markdown' => '# Heading',
            'published' => '2024-01-01',
            'tags' => ['PHP','Twig'],
            'featured' => true,
            'description' => 'desc',
            'keywords' => ['a','b'],
            'word_count' => 10,
        ]);
        $this->assertSame('hello-world', $entity->slug());
        $this->assertSame('Hello World', $entity->title());
        $this->assertTrue($entity->isFeatured());
    }

    public function testPortfolioProjectMapper(): void
    {
        $entity = PortfolioProjectMapper::fromArray([
            'slug' => 'proj',
            'title' => 'Proj',
            'summary' => 'summary',
            'markdown' => 'body',
            'published' => '2024-02-01',
            'tags' => 'php,twig',
            'featured' => false,
        ]);
        $this->assertSame('proj', $entity->slug());
        $this->assertSame('Proj', $entity->title());
    }
}
