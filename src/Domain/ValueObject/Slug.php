<?php
namespace App\Domain\ValueObject;

final class Slug
{
    private string $value;

    private function __construct(string $value)
    {
        $normalized = strtolower(trim($value));
        if (!preg_match('/^[a-z0-9-]+$/', $normalized)) {
            throw new \InvalidArgumentException('Invalid slug: ' . $value);
        }
        $this->value = $normalized;
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
