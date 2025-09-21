# Copilot Project Instructions

Purpose: Give AI coding agents the minimal, project-specific context needed to make correct, maintainable changes quickly.

## 1. High-Level Architecture
- Origin: Static HTML5 UP "Dopetrope" template progressively converted to structured PHP + Twig.
- Entry scripts: Legacy page entrypoints remain at project root (`index.php`, `blog.php`, `left-sidebar.php`, etc.). A future front controller is not yet implemented.
- Templates: Central layout `templates/layouts/base.html.twig` plus `layouts/flexible.html.twig` for dynamic 0/1/2 sidebar pages. Page templates live under `templates/pages/`.
- Blog system: Markdown-based posts (`blog/<post>/markdown.md`) parsed at request time by `App\Services\BlogContentService` using league/commonmark.
- Services:
  - `BlogContentService`: Front matter parsing, Markdown -> HTML, heading ID injection, TOC extraction, reading time, code block normalization.
  - `TemplateService`: Initializes Twig, registers globals (site meta, navigation, language).
  - `App\i18n\Language`: Lightweight singleton loading JSON translation files from `includes/i18n/translations/`.
- A/B Variant: Blog post TOC placement (inline | left | right) controlled in `blog.php` via query param / cookie. Variants drive which sidebar (if any) renders.

## 2. Data & Content Conventions
- Blog post path pattern: `blog/<post>/markdown.md` (post folder name = URL `?post=<post>`).
- Front matter: Simple YAML-like block delimited by `---` at top; only flat key:value pairs & bracket arrays `[a, b]`. Parser is custom—avoid advanced YAML features.
- Supported metadata keys: `title`, `description`, `author`, `published`, `tags`, `seo.keywords` (flat key accepted as `seo: keywords: ...` is NOT parsed—only simple keys). Tags may be comma string or bracket array.
- TOC: Extracted from rendered HTML headings h2–h6; IDs slugified. Do not introduce a second TOC generator without removing existing logic.

## 3. Templating Patterns
- Always extend `layouts/base.html.twig` or `layouts/flexible.html.twig` (for sidebar control). Never reintroduce duplicate `<head>` markup.
- Core overridable blocks: `page_meta`, `page_styles`, `additional_css`, `page_scripts`, `content` (or `main_content` inside flexible layout), `sidebar_left`, `sidebar_right`.
- Blog post template (`pages/blog-post.html.twig`) uses `main_content` plus conditional sidebar blocks; TOC component reused via `components/blog/_toc.html.twig`.
- When adding a new sidebar-enabled page: extend `flexible.html.twig`; pass `sidebar_left` / `sidebar_right` vars or override the block(s). Layout computes responsive column widths automatically.

## 4. Variant & Sidebar Logic (Important)
- `blog.php` sets: `toc_variant`, `toc_html`, `sidebar_left`, `sidebar_right`.
- Flexible layout only renders a sidebar column if the corresponding variable is non-empty. Ensure controller sets them when introducing new sidebar content.
- If no TOC (no headings) variant is forcibly `inline` to avoid empty columns.

## 5. Markdown & Security
- Markdown rendered via league/commonmark with extensions: Core, TableOfContents (placeholder unused directly), HeadingPermalink, Autolink, DisallowedRawHtml.
- Disallowed tags: `script, iframe, object, form`. Do not relax without review.
- Additional raw HTML sanitization is minimal—keep disallowed list in sync if enabling richer embeds.

## 6. Code Blocks & Highlighting
- Post-processing adds `hljs` class to `<code>` inside `<pre>` if missing. Frontend highlight.js (GitHub Dark) initialized in `blog-post.html.twig` script block.
- When adding languages: include new CDN language module in `page_scripts` block; no backend change required.

## 7. i18n
- Translation JSON per language under `includes/i18n/translations/<lang>.json`.
- Access via Twig: `lang.get('site.name')` or global `site.*` (populated from translations). New keys must be added to all language files.
- Language detection: `?lang=de` overrides session. Keep parameter name `lang` consistent.

## 8. Navigation & Globals
- Navigation structure hard-coded in `TemplateService::getNavigationStructure()`. Modify there for structural nav changes (ensures every template sees update).
- Add new global values through `TemplateService::addGlobalVariables()`—avoid scattering repeated arrays across entry scripts.

## 9. Build & Run Workflows
- Local (PHP built-in) quick run (bypasses Twig cache differences): `php -S localhost:8000` (root directory) then `index.php` paths.
- Docker stack (preferred):
  - Start: `docker compose up -d --build`
  - Rebuild PHP image after dependency changes: `docker compose build php && docker compose up -d`
- Composer install/update: `php composer.phar install` (lock file present). Require new libs in `composer.json` + run install; keep PHP requirement (>=8.2).
- Twig cache at `var/cache/twig`; clear manually when altering core layouts.

## 10. Static Analysis / Quality
- PHPStan included (`vendor/bin/phpstan`). No config file added yet—default level. If adding one, place at project root.
- Follow `CODING-STANDARDS.md`; do not introduce strict_types yet unless coordinated.

## 11. Adding Features Safely
- Extend services rather than embedding logic in entry scripts; keep `blog.php` lean (controller-style orchestration only).
- For new content types (e.g., docs), prefer mirroring blog structure in a new directory and reusing `BlogContentService` or extracting shared parsing.
- Avoid duplicating TOC or heading logic—refactor into service if expanding.

## 12. Common Pitfalls Recap
- Missing sidebars: remember to set `sidebar_left` / `sidebar_right` context vars (truthy) or override blocks directly.
- Double `<head>`: never re-include old header includes; always via base layout.
- Incorrect TOC after edits: clear Twig cache if template block logic changes.
- Adding nested front matter data: current parser does NOT support nested YAML—keep it flat.

## 13. Example: Adding a FAQ Page With Right Sidebar
1. Create `templates/pages/faq.html.twig` extending `layouts/flexible.html.twig`.
2. In entry script/controller: build sidebar HTML (e.g., quick links) and pass as `sidebar_right`.
3. Override `main_content` block only—no need to compute grid classes.

## 14. When Unsure
- Prefer reading existing blog post flow (`blog.php` + `BlogContentService` + `pages/blog-post.html.twig`) before adding similar dynamic features.
- Keep changes minimal & composable; reuse component partials under `templates/components/`.

---
Feedback welcome: Clarify TOC/variant logic, Markdown limitations, or sidebar strategy if anything remains ambiguous.
