<?php

namespace App\Services;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\i18n\Language;
use App\Services\BlogContentService;
use App\Services\BlogService;
use App\Services\PortfolioService;
use App\Services\PostService;

/**
 * Twig template rendering service
 */
class TemplateService
{
    private Environment $twig;
    private Language $language;

    public function __construct()
    {
        // Create Twig loader pointing to templates directory
        $loader = new FilesystemLoader(__DIR__ . '/../../templates');
        
        // Determine if twig cache should be disabled (e.g. local dev)
        $disableCache = getenv('DISABLE_TWIG_CACHE') === '1';
        $twigOptions = [
            'debug' => true,
            'auto_reload' => true,
        ];
        if (!$disableCache) {
            $twigOptions['cache'] = __DIR__ . '/../../var/cache/twig';
        }
        $this->twig = new Environment($loader, $twigOptions);

        // Get language instance
        $this->language = Language::getInstance();

        // Add global variables available in all templates
        $this->addGlobalVariables();
    }

    /**
     * Render a template with data
     */
    public function render(string $template, array $data = []): string
    {
        return $this->twig->render($template, $data);
    }

    /**
     * Add global variables available in all templates
     */
    private function addGlobalVariables(): void
    {
        // Get site information from translations
        $this->twig->addGlobal('site', [
            'name' => $this->language->get('site.name'),
            'description' => $this->language->get('site.description'),
            'author' => $this->language->get('site.author'),
        ]);

        $this->twig->addGlobal('lang', $this->language);
        
        $this->twig->addGlobal('current_page', basename($_SERVER['SCRIPT_NAME'] ?? ''));
        
        // Add navigation structure
        $this->twig->addGlobal('navigation_items', $this->getNavigationStructure());

        // Recent posts aggregate (blog + portfolio)
        try {
            $content = new BlogContentService();
            $blogService = new BlogService($content);
            $portfolioService = new PortfolioService($content);
            $postService = new PostService(
                $blogService,
                $portfolioService,
                __DIR__ . '/../../blog',
                __DIR__ . '/../../portfolio'
            );
            $recent = $postService->getRecentItems(5);
        } catch (\Throwable $e) {
            $recent = [];
        }
        $this->twig->addGlobal('recent_posts', $recent);
    }

    /**
     * Get the navigation structure for the website
     */
    private function getNavigationStructure(): array
    {
        return [
            [
                'label' => 'nav.home',
                'url' => 'index.php',
                'route' => 'index.php'
            ],
            [
                'label' => 'nav.portfolio',
                'url' => 'portfolio.php',
                'route' => 'portfolio.php'
            ],
            [
                'label' => 'nav.blog',
                'url' => 'blog.php',
                'route' => 'blog.php'
            ],
            [
                'label' => 'Development',
                'url' => '#',
                'children' => [
                    ['label' => 'Lorem ipsum dolor', 'url' => '#'],
                    ['label' => 'Magna phasellus', 'url' => '#'],
                    [
                        'label' => 'Layouts',
                        'url' => '#',
                        'children' => [
                            ['label' => 'nav.left_sidebar', 'url' => 'left-sidebar.php', 'route' => 'left-sidebar.php'],
                            ['label' => 'nav.right_sidebar', 'url' => 'right-sidebar.php', 'route' => 'right-sidebar.php'],
                            ['label' => 'nav.no_sidebar', 'url' => 'no-sidebar.php', 'route' => 'no-sidebar.php']
                        ]
                    ],
                ]
            ]
        ];
    }

    /**
     * Add a custom function to Twig
     */
    public function addFunction(string $name, callable $callable): void
    {
        $function = new \Twig\TwigFunction($name, $callable);
        $this->twig->addFunction($function);
    }
}