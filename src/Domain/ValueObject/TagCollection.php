<?php

namespace App\Domain\ValueObject;

use InvalidArgumentException;

class TagCollection implements \IteratorAggregate, \Countable
{
    /** @var Tag[] */
    private array $tags;

    private function __construct(array $tags)
    {
        $this->tags = $this->deduplicate($tags);
    }

    /**
     * @param string[]|Tag[]|null $raw
     */
    public static function fromArray(?array $raw): self
    {
        if ($raw === null) {
            return new self([]);
        }

        $tags = [];
        foreach ($raw as $value) {
            if ($value instanceof Tag) {
                $tags[] = $value;
                continue;
            }
            if (!is_string($value)) {
                throw new InvalidArgumentException('TagCollection expects string or Tag instances.');
            }
            $trimmed = trim($value);
            if ($trimmed === '') {
                continue;
            }
            $tags[] = Tag::fromString($trimmed);
        }

        return new self($tags);
    }

    /** @return Tag[] */
    public function all(): array
    {
        return $this->tags;
    }

    public function count(): int
    {
        return count($this->tags);
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->tags);
    }

    public function isEmpty(): bool
    {
        return $this->count() === 0;
    }

    public function toNameArray(): array
    {
        return array_map(static fn(Tag $t) => $t->name(), $this->tags);
    }

    private function deduplicate(array $tags): array
    {
        $seen = [];
        $unique = [];
        foreach ($tags as $tag) {
            $key = strtolower($tag->name());
            if (isset($seen[$key])) {
                continue;
            }
            $seen[$key] = true;
            $unique[] = $tag;
        }
        return $unique;
    }
}
