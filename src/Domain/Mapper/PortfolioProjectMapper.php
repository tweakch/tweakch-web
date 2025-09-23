<?php
namespace App\Domain\Mapper;

use App\Domain\Entity\PortfolioProject;
use App\Domain\ValueObject\TagCollection;

class PortfolioProjectMapper
{
    /**
     * Expected keys: slug, title, summary, markdown, published, tags, featured, description, keywords
     */
    public static function fromArray(array $data): PortfolioProject
    {
        $slug = $data['slug'] ?? 'unknown-project';
        $title = $data['title'] ?? 'Untitled';
        $summary = $data['summary'] ?? ($data['description'] ?? '');
        $markdown = $data['markdown'] ?? '';
        $published = $data['published'] ?? null;
        $tagsRaw = $data['tags'] ?? [];
        if (is_string($tagsRaw)) {
            $tagsRaw = array_filter(array_map('trim', explode(',', $tagsRaw)));
        }
        $tags = TagCollection::fromArray($tagsRaw)->toNameArray();
        $featured = (bool)($data['featured'] ?? false);
        $description = $data['description'] ?? null;
        $keywords = $data['keywords'] ?? [];
        if (is_string($keywords)) {
            $keywords = array_filter(array_map('trim', explode(',', $keywords)));
        }

        return PortfolioProject::create(
            $slug,
            $title,
            $summary,
            $markdown,
            $published,
            $tags,
            $featured,
            $description,
            $keywords
        );
    }
}
