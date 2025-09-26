# Overview

This project is a modern PHP website built by progressively refactoring an HTML5UP "Dopetrope" template from static HTML into a dynamic, component-based architecture. The application features a markdown-powered blog system, multilingual support (i18n), and a modular Twig templating structure. It serves as both a personal portfolio site and a demonstration of modern PHP development practices, emphasizing incremental modernization over complete rewrites.

# User Preferences

Preferred communication style: Simple, everyday language.

# System Architecture

## Template Architecture
The application uses a **component-based Twig template system** with inheritance patterns:
- **Base Layout**: `templates/layouts/base.html.twig` provides the fundamental HTML structure with head, navigation, and footer
- **Flexible Layout**: `templates/layouts/flexible.html.twig` extends base layout and handles responsive sidebar configurations (0, 1, or 2 sidebars)
- **Page Templates**: Individual pages in `templates/pages/` extend appropriate layouts
- **Components**: Reusable UI components in `templates/components/` for blog elements, navigation, and content blocks

## Content Management
The system implements a **file-based content approach** rather than traditional database storage:
- **Blog Posts**: Stored as markdown files in `blog/<slug>/markdown.md` with YAML front matter for metadata
- **Portfolio Items**: Markdown files in `portfolio/<slug>/markdown.md` with project-specific metadata
- **Dynamic Processing**: Content parsed at request time using `league/commonmark` with custom extensions for TOC generation, heading permalinks, and code highlighting

## Internationalization (i18n)
**Language system** built around JSON translation files:
- Translation files stored in `includes/i18n/translations/<lang>.json`
- `App\i18n\Language` singleton class manages language detection and translation retrieval
- Language switching via URL parameter `?lang=<code>` with session persistence
- Twig globals provide easy access to translations throughout templates

## Services Layer
**Service-oriented architecture** with focused responsibilities:
- **BlogContentService**: Handles markdown parsing, front matter extraction, TOC generation, reading time calculation, and code block normalization
- **TemplateService**: Manages Twig environment initialization, global variable registration, and navigation structure
- **Language Service**: Manages translation loading and language detection logic

## Entry Point Strategy
The application maintains **legacy PHP entry points** at the project root while building toward modern architecture:
- Direct page files (`index.php`, `blog.php`, `left-sidebar.php`, etc.) serve as controllers
- Each entry point includes necessary services, sets template variables, and renders appropriate Twig templates
- Future evolution planned toward single front controller pattern with routing

## Experimental Features
**A/B Testing Variants** implemented for content layout optimization:
- Blog post TOC (Table of Contents) placement variants: inline, left sidebar, or right sidebar
- Variant selection via query parameters and cookie persistence
- Flexible layout system adapts column structure based on sidebar content

## Security Approach
**Defense-in-depth** with multiple layers:
- HTML output escaping via Twig's auto-escaping
- Markdown content filtered through `DisallowedRawHtml` extension blocking script/iframe/object/form tags
- `.htaccess` rules block direct access to sensitive files and directories
- Input validation and sanitization for user-controllable parameters

# External Dependencies

## Core PHP Dependencies
- **PHP 8.2+**: Modern PHP runtime with type declarations and performance improvements
- **Twig 3.x**: Template engine providing inheritance, components, and auto-escaping
- **league/commonmark**: Markdown parser with extensible architecture for TOC, permalinks, and security filtering
- **cocur/slugify**: URL-friendly slug generation for content routing
- **vlucas/phpdotenv**: Environment variable management for configuration
- **symfony/finder**: File system traversal for content discovery

## Development Tools
- **PHPStan**: Static analysis for type safety and code quality
- **PHPUnit**: Unit testing framework for service layer testing
- **Composer**: Dependency management and PSR-4 autoloading

## Frontend Assets
- **Font Awesome**: Icon library for UI elements
- **jQuery**: JavaScript library for DOM manipulation and AJAX
- **Highlight.js**: Client-side syntax highlighting for code blocks
- **Google Fonts**: Web fonts (Source Sans Pro family)
- **Responsive breakpoints**: Custom JavaScript for adaptive layout behavior

## Infrastructure
- **Nginx + PHP-FPM**: Production web server configuration
- **Docker**: Containerized development environment
- **Git**: Version control with `.htaccess` deployment rules
- **SASS**: CSS preprocessing for maintainable stylesheets (via Node.js)