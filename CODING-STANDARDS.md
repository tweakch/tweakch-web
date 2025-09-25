# Coding Standards

These lightweight standards guide ongoing PHP changes.

## Target Runtime

- PHP 8.4+
- Nginx (reverse proxy) -> PHP-FPM upstream
- UTF-8 everywhere

## File & Directory

- Use lowercase with hyphens for standalone scripts if added (e.g., `contact-form.php`).
- Reusable logic should move toward `includes/` first; later can evolve into `src/` + autoload (Composer) if complexity grows.

## PHP Style

- Follow PSR-12 formatting style subset: 4 spaces indent, Unix line endings, `<?php` (no short tags), one class/function per file when introduced.
- Strict types may be introduced later (`declare(strict_types=1);`) once a front controller is added.
- Use meaningful variable names; avoid single letters (except for small loop indices).

## Security & Escaping

- Escape all untrusted output in HTML context with `htmlspecialchars($var, ENT_QUOTES, 'UTF-8')`.
- Never trust `$_GET`, `$_POST`, `$_COOKIE`; sanitize/validate before use.
- If forms are added: implement CSRF token (hidden input + session token comparison).
- Avoid eval / dynamic includes.

## Includes / Layout

- Each page sets `$pageTitle` and `$bodyClass` before including `includes/header.php`.
- Do not embed `<html>` or `<body>` again outside header/footer includes.

## Arrays & Data

- Prefer short array syntax: `[ 'key' => 'value' ]`.
- When generating repeated sections (portfolio/blog), isolate the data structure at the top of the file or in a dedicated include for clarity.

## Comments

- Keep comments minimal and purposeful (why > what). The template HTML is self-descriptive; avoid duplicating markup intent.

## Future Evolution Hooks

- When introducing routing: one front controller file in project root or `public/`.
- Add Composer when first external dependency is required (e.g., router, Twig).
- Introduce `strict_types` after ensuring existing dynamic behavior is stable.

## Git / Deployment

- (Future) Ignore `old/` folder in deployments if no longer needed.
- FTP deployment: only transfer `.php`, `assets/`, and required docs. Exclude local editor/project files.

## Licensing / Attribution

- Preserve original `LICENSE.txt` and attribution comments while template remains recognizable.

## Performance

- Defer premature optimization. Only add caching once dynamic content or heavier queries appear.

## Accessibility

- When modifying markup, retain semantic headings order and ensure `alt` attributes remain on images.
