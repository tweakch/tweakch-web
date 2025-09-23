<?php
namespace App\Domain\Mapper;

use App\Domain\Entity\BlogPost;
use App\Domain\ValueObject\TagCollection;

class BlogPostMapper
{
    /**
     * @param array $data Parsed metadata + content shape
     * Expected keys: slug, title, markdown, published, tags, featured, description, keywords, word_count
     */
    public static function fromArray(array $data): BlogPost
    {
        $slug = $data['slug'] ?? 'unknown-slug';
        $title = $data['title'] ?? 'Untitled';
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
        $wordCount = $data['word_count'] ?? null;

        return BlogPost::create(
            $slug,
            $title,
            $markdown,
            $published,
            $tags,
            $featured,
            $description,
            $keywords,
            $wordCount
        );
    }
}
