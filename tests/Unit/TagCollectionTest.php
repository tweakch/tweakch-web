<?php
use PHPUnit\Framework\TestCase;
use App\Domain\ValueObject\TagCollection;
use App\Domain\ValueObject\Tag;

class TagCollectionTest extends TestCase
{
    public function testDeduplicatesAndNormalizes(): void
    {
        $collection = TagCollection::fromArray(['PHP', 'php', '  Twig  ', 'twig']);
        $names = $collection->toNameArray();
        sort($names);
        $this->assertSame(['php','twig'], $names);
    }

    public function testEmptyOnNull(): void
    {
        $collection = TagCollection::fromArray(null);
        $this->assertTrue($collection->isEmpty());
    }
}
