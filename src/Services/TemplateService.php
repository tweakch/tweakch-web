<?php

namespace App\Services;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\i18n\Language;

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
        
        // Create Twig environment
        $this->twig = new Environment($loader, [
            'cache' => __DIR__ . '/../../var/cache/twig',
            'debug' => true, // Set to false in production
            'auto_reload' => true, // Set to false in production
        ]);

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