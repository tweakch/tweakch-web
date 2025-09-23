<?php
namespace App\Domain\Entity;

use App\Domain\ValueObject\Slug;
use App\Domain\ValueObject\Title;
use App\Domain\ValueObject\Tag;
use App\Domain\ValueObject\SeoMeta;
use DateTimeImmutable;

final class PortfolioProject
{
    /** @param Tag[] $tags */
    private function __construct(
        private Slug $slug,
        private Title $title,
        private string $summary,
        private string $markdown,
        private DateTimeImmutable $publishedAt,
        private array $tags,
        private bool $featured,
        private SeoMeta $seo
    ) {}

    /** @param string[] $tagNames */
    public static function create(
        string $slug,
        string $title,
        string $summary,
        string $markdown,
        ?string $publishedAt,
        array $tagNames = [],
        bool $featured = false,
        ?string $description = null,
        array $keywords = []
    ): self {
        $tags = array_map(fn($t) => Tag::fromString($t), $tagNames);
        $date = $publishedAt ? new DateTimeImmutable($publishedAt) : new DateTimeImmutable('@0');
        $seo = SeoMeta::create($description, $keywords);
        return new self(
            Slug::fromString($slug),
            Title::fromString($title),
            $summary,
            $markdown,
            $date,
            $tags,
            $featured,
            $seo
        );
    }

    public function slug(): string { return (string)$this->slug; }
    public function title(): string { return (string)$this->title; }
    public function summary(): string { return $this->summary; }
    public function markdown(): string { return $this->markdown; }
    public function publishedAt(): DateTimeImmutable { return $this->publishedAt; }
    /** @return Tag[] */
    public function tags(): array { return $this->tags; }
    public function isFeatured(): bool { return $this->featured; }
    public function seo(): SeoMeta { return $this->seo; }
}
