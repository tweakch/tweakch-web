---
title: Tweak Website Platform
description: Progressive refactor of an HTML5 UP template into a modular PHP + Twig content platform.
client: Personal Project
role: Architect & Full‑Stack Developer
tech: [PHP 8.2, Twig, CommonMark, Highlight.js, Docker, SCSS, Redis (planned)]
tags: [refactor, php, twig, content-platform, modernization]
published: 2025-09-10
featured: true
---

## Overview

Progressive refactor of an HTML5 UP “Dopetrope” theme into a maintainable, extensible PHP + Twig content platform—prioritizing incremental evolution over a high‑risk full rewrite.

## Problem / Context

- Repeated layout fragments increased change surface.
- Static blog pages blocked iteration and metadata enrichment.
- Mixed PHP + HTML logic reduced readability and testability.
- No mechanism to experiment with layout/UX variants safely.

## Objectives

- Centralize layout + navigation for single edit points.
- Introduce markdown-driven content pipeline (blog + portfolio).
- Enable A/B style component placement variants (TOC, metadata, details).
- Prepare for future i18n without premature complexity.
- Maintain deployable state at every refactor step.

---

## Modernization Strategy

| Legacy Concern | Action Taken | Result |
|----------------|-------------|--------|
| Repeated HTML layout fragments | Centralized in `layouts/base.html.twig` + `layouts/flexible.html.twig` | Single source of truth for head + grid |
| Inline + duplicated navigation | Navigation array in `TemplateService` | One edit updates all pages |
| Static blog HTML pages | Markdown content + `BlogContentService` | Faster iteration & richer metadata |
| Mixed PHP/HTML logic | Controller scripts + Twig templates | Readable, testable separation |
| No content variants | A/B placement variants (TOC & metadata) | Experiments without template sprawl |
| Ad‑hoc code block styling | Post‑processing adds `hljs` class | Consistent syntax highlighting |

---

## Key Contributions

### 1. Markdown Blog System

- Flat-file posts under `blog/<slug>/markdown.md`.
- Lightweight flat front matter parser (key:value + array brackets).
- Extracts TOC, heading IDs, reading time, sanitized HTML.

### 2. Portfolio Module

- Reuses parsing layer for case studies (`portfolio/<slug>/markdown.md`).
- Adds project metadata (client, role, tech) + variant sidebars.

### 3. Variant Experimentation

- Query/cookie controlled variants (`inline | left | right`).
- Extensible to future components (related content, subscription widgets).

### 4. Progressive Styling Evolution

- Retained initial CSS baseline, layered SCSS structure gradually.
- Added self-hosted font pipeline + Docker Sass compilation.

### 5. Internationalization (Planned)

- `Language` service loads translation JSON.
- Future: language switcher + negotiation.

---

## Architecture / Approach

| Layer | Responsibility | Notes |
|-------|---------------|-------|
| Entry Scripts | Lightweight controllers (`blog.php`, `portfolio.php`) | Orchestrate services + select template |
| Services | Parsing + template bootstrap | `BlogContentService`, `TemplateService` |
| Templates | Presentation | Layout inheritance + component partials |
| Content | Markdown + front matter | No database dependency |
| Assets | SCSS, webfonts, JS | Build via Docker Sass service |

The design intentionally defers a “front controller” until there is enough routing complexity to justify a single dispatch surface.

---

## Refactor Principles

- Prefer extraction over replacement (keep site functional each step).
- Introduce capability (e.g., variants) before removing older template branches.
- Keep front matter parser simple (no full YAML complexity) to maintain performance + predictability.
- Minimize global state; only `TemplateService` seeds Twig globals.

---

## Challenges & Resolutions

| Challenge | Resolution | Outcome |
|-----------|------------|---------|
| Template duplication | Introduced base + flexible layouts | Single source of truth |
| Metadata / TOC placement rigidity | Controller-driven variant aggregation | Safe A/B experimentation |
| Code block inconsistency | Post-processing adds `hljs` class | Uniform syntax highlighting |
| Font path issues | Adjusted relative build paths | Reliable self-hosted fonts |

## Impact / Results

- Reduced navigation/layout edit surface to centralized template definitions.
- Introduced portfolio system without duplicating parser logic.
- Enabled layout experimentation without template branching.
- Established extensible content model for future related-content features.

## Lessons Learned

- Controller aggregation simplifies variant experimentation vs. template branching.
- Keeping parser intentionally minimal avoids YAML edge case maintenance.
- Self-hosting fonts early prevents later cascade of CDN reliance.

## Roadmap / Next Steps

- Twig cache warming script.
- Optional Redis cache for parsed markdown.
- Critical CSS extraction for above-the-fold sections.
- WOFF2 subsetting for Nerd Font integration.

---

## Development Workflow

Docker Compose stack provides PHP-FPM + Nginx; a dedicated `sass` service performs on-demand compilation:

```bash
docker compose run --rm sass
```

Content additions require only creating a new directory with `markdown.md`; no DB migrations or CMS overhead.

---

## Additional Roadmap Ideas

- Front controller + simple router abstraction.
- Related content service (semantic tagging or embedding match).
- Search (static index generation; no heavy DB requirement).
- Live preview mode for draft markdown.
- Inline image optimization pipeline.

---

**Repository Context:** This site evolves incrementally; each change targets a single architectural friction to keep refactors low-risk and reviewable.

