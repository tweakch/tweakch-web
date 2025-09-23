<?php

namespace App\Services;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\DisallowedRawHtml\DisallowedRawHtmlExtension;
use League\CommonMark\MarkdownConverter;
use League\Config\ConfigurationInterface;
use Symfony\Component\Finder\Finder;
use Cocur\Slugify\Slugify;

class BlogContentService
{
    private Environment $environment;
    private MarkdownConverter $converter;
    private Slugify $slugify;

    public function __construct()
    {
        $config = [
            'heading_permalink' => [
                'symbol' => '',
                'id_prefix' => '',
                'fragment_prefix' => '',
                'html_class' => 'heading-anchor',
                'insert' => 'after',
            ],
            'table_of_contents' => [
                'html_class' => 'toc-list',
                'position' => 'placeholder',
                'normalize' => 'relative',
                'min_heading_level' => 2,
                'max_heading_level' => 6,
            ],
            'disallowed_raw_html' => [
                'disallowed_tags' => ['script', 'iframe', 'object', 'form']
            ],
        ];

        $this->environment = new Environment($config);
        $this->environment->addExtension(new CommonMarkCoreExtension());
        $this->environment->addExtension(new TableOfContentsExtension());
        $this->environment->addExtension(new HeadingPermalinkExtension());
        $this->environment->addExtension(new AutolinkExtension());
        $this->environment->addExtension(new DisallowedRawHtmlExtension());

        $this->converter = new MarkdownConverter($this->environment);
        $this->slugify = new Slugify();
    }

    public function parseFile(string $markdownFile): array
    {
        $raw = file_get_contents($markdownFile);
        [$frontMatter, $markdown] = $this->extractFrontMatter($raw);

        $html = $this->converter->convert($markdown)->getContent();

        // Ensure code blocks have highlight.js compatible classes
        $html = $this->normalizeCodeBlocks($html);

    // Extract TOC headings and inject ids into HTML
    [$toc, $html] = $this->extractHeadings($html);

        $frontMatter = $this->enrichMetadata($frontMatter, $markdown, $html);

        return [
            'metadata' => $frontMatter,
            'html' => $html,
            'toc' => $toc,
            'readingTime' => $frontMatter['readingTime'] ?? $this->calculateReadingTime($html),
        ];
    }

    public function listPosts(string $blogRootDir): array
    {
        $posts = [];
        if (!is_dir($blogRootDir)) {
            return $posts;
        }

        $finder = new Finder();
        $finder->files()->in($blogRootDir)->name('markdown.md')->depth('== 1');

        foreach ($finder as $file) {
            $post = basename($file->getPath());
            $data = $this->parseFile($file->getRealPath());
            $meta = $data['metadata'];
            $posts[] = [
                'post' => $post,
                'title' => $meta['title'] ?? 'Untitled Post',
                'description' => $meta['description'] ?? '',
                'author' => $meta['author'] ?? '',
                'published' => $meta['published'] ?? '',
                'tags' => $meta['tags'] ?? [],
                'readingTime' => $data['readingTime'],
                'metadata' => $meta,
            ];
        }

        usort($posts, function ($a, $b) {
            return strtotime($b['published'] ?? '1970-01-01') <=> strtotime($a['published'] ?? '1970-01-01');
        });

        return $posts;
    }

    private function extractFrontMatter(string $raw): array
    {
        if (preg_match('/^---\s*\n(.*?)\n---\s*\n(.*)$/s', $raw, $m)) {
            $front = $this->parseFrontMatterBlock($m[1]);
            return [$front, $m[2]];
        }
        return [[], $raw];
    }

    private function parseFrontMatterBlock(string $block): array
    {
        $meta = [];
        foreach (preg_split('/\r?\n/', $block) as $line) {
            $line = trim($line);
            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }
            if (strpos($line, ':') !== false) {
                [$key, $value] = explode(':', $line, 2);
                $key = trim($key);
                $value = trim($value);
                $value = trim($value, "'\"");
                if (preg_match('/^\[(.*)\]$/', $value, $m)) {
                    $inner = $m[1];
                    $items = array_filter(array_map(function ($v) {
                        return trim(trim($v), "'\"");
                    }, explode(',', $inner)));
                    $value = $items;
                }
                $meta[$key] = $value;
            }
        }
        return $meta;
    }

    private function extractHeadings(string $html): array
    {
        $toc = [];
        if (preg_match_all('/<h([2-6])[^>]*>(.*?)<\/h\1>/', $html, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $text = strip_tags($match[2]);
                $id = $this->slugify->slugify($text);
                $toc[] = [
                    'level' => (int)$match[1],
                    'text' => $text,
                    'id' => $id,
                ];
            }
        }
        // Inject ids only where missing (first occurrence of each text)
        foreach ($toc as $entry) {
            $pattern = sprintf('/<h([2-6])(?![^>]*id=")(.*?)>%s<\/h\1>/', preg_quote($entry['text'], '/'));
            $replacement = sprintf('<h$1 id="%s"$2>%s</h$1>', $entry['id'], $entry['text']);
            $html = preg_replace($pattern, $replacement, $html, 1);
        }
        return [$toc, $html];
    }

    private function enrichMetadata(array $meta, string $markdown, string $html): array
    {
        if (!isset($meta['title'])) {
            if (preg_match('/^#\s+(.+)/m', $markdown, $m)) {
                $meta['title'] = trim($m[1]);
            }
        }
        if (!isset($meta['description'])) {
            if (preg_match('/\n\n([^\n]+)\n/', $markdown, $m)) {
                $meta['description'] = substr(trim($m[1]), 0, 160) . '...';
            }
        }
        if (!isset($meta['readingTime'])) {
            $meta['readingTime'] = $this->calculateReadingTime($html);
        }
        if (isset($meta['tags']) && is_string($meta['tags'])) {
            // Allow comma-separated string
            $meta['tags'] = array_filter(array_map('trim', explode(',', $meta['tags'])));
        }
        return $meta;
    }

    private function calculateReadingTime(string $html): string
    {
        $wordCount = str_word_count(strip_tags($html));
        $minutes = max(1, (int)ceil($wordCount / 200));
        return $minutes . ' min read';
    }

    private function normalizeCodeBlocks(string $html): string
    {
        // CommonMark renders fenced blocks to <pre><code class="language-xxx">...
        // Add a generic hljs class for styling and ensure inline code not affected
        $html = preg_replace_callback('/<pre><code([^>]*)>/', function ($m) {
            $attrs = $m[1];
            if (strpos($attrs, 'class=') === false) {
                return '<pre><code class="hljs">';
            }
            // Append hljs class if not present
            if (!preg_match('/hljs/', $attrs)) {
                $attrs = preg_replace('/class="([^"]+)"/', 'class="$1 hljs"', $attrs);
            }
            return '<pre><code' . $attrs . '>';
        }, $html);
        return $html;
    }
}
