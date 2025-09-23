<?php
namespace App\Domain\ValueObject;

final class SeoMeta
{
    private string $description;
    /** @var string[] */
    private array $keywords;

    private function __construct(string $description, array $keywords)
    {
        $this->description = trim($description);
        $this->keywords = array_values(array_filter(array_map('trim', $keywords)));
    }

    public static function create(?string $description, array $keywords = []): self
    {
        return new self($description ?? '', $keywords);
    }

    public function description(): string { return $this->description; }
    /** @return string[] */
    public function keywords(): array { return $this->keywords; }
}
