<?php
namespace App\Domain\ValueObject;

final class Tag
{
    private string $name;

    private function __construct(string $name)
    {
        $name = strtolower(trim($name));
        if ($name === '') {
            throw new \InvalidArgumentException('Tag name empty');
        }
        $this->name = $name;
    }

    public static function fromString(string $name): self
    {
        return new self($name);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
