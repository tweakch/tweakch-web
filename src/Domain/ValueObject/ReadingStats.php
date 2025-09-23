<?php
namespace App\Domain\ValueObject;

final class ReadingStats
{
    private int $wordCount;
    private int $minutes;

    private function __construct(int $wordCount, int $minutes)
    {
        $this->wordCount = max(0, $wordCount);
        $this->minutes = max(1, $minutes);
    }

    public static function fromCounts(int $wordCount, int $wpm = 200): self
    {
        $minutes = (int)ceil($wordCount / max(1, $wpm));
        return new self($wordCount, $minutes);
    }

    public function wordCount(): int { return $this->wordCount; }
    public function minutes(): int { return $this->minutes; }
    public function label(): string { return $this->minutes . ' min read'; }
}
