---
title: Enesance Corporate Website
description: A performant, content-focused corporate site with a lean publishing workflow.
client: Enesance AG
role: Full‑Stack Developer
tech: [PHP 8.2, Twig, Tailwind (utility subset), HTMX, Alpine.js, Vite, Netlify]
tags: [website, hydration, accessibility, performance]
published: 2025-03-02
---

## Overview

Enesance required a site refresh emphasizing clarity, accessibility, and fast editorial iteration. The prior CMS stack produced fragile plugin coupling and regressions on minor updates.

Delivered a **content-first static + dynamic hybrid**: pre-rendered editorial pages + progressively enhanced interactive fragments (contact form, timeline filters) with minimal JS.

## Problem / Context

- Legacy CMS upgrades triggered plugin breakage and hotfix churn.
- Excess JavaScript payload degraded engagement on mobile.
- Editorial workflow bottlenecked on technical staff for trivial content edits.

## Objectives

- Improve Core Web Vitals across primary landing pages.
- Simplify non-technical publishing via markdown + git workflow.
- Enforce WCAG AA contrast & robust keyboard navigation.
- Eliminate recurring CMS maintenance overhead.

---

## Architecture / Approach

### Content Pipeline

Markdown + front matter compiled into HTML partials at build. A small PHP layer injects dynamic pieces (news rollup, job listings) at request time. Build artifacts cache-busted by hash naming.

### Styling Strategy

Adopted a **Tailwind subset** (extracted only used utilities) to keep CSS under 25KB gzipped. Remaining bespoke components authored in SCSS modules and tree‑shaken.

### Progressive Enhancement

HTMX handles partial swaps (newsletter signup state machine, language toggle) without a SPA framework. Alpine.js augments disclosure widgets and mobile nav.

### Accessibility

- Automated axe-core run in CI.
- Manual screen reader pass (NVDA + VoiceOver) before release.
- Color decision matrix stored as design tokens to enforce contrast constraints.

---

## Impact / Results

| Metric | Before | After |
|--------|--------|-------|
| LCP (p75) | 3.4s | 1.6s |
| CLS | 0.14 | 0.02 |
| TTFB (avg EU) | 420ms | 120ms |
| Total JS (gz) | 310KB | 42KB |

Performance drivers: responsive image sets, reduced blocking scripts, critical CSS inlining.

---

## Editing Workflow

Non-technical staff edit markdown in a protected GitHub UI branch. A merge triggers a build pipeline (GitHub Actions) which runs link checks, accessibility lint, and deploys to Netlify with atomic swap.

---

## Key Contributions


- Replaced plugin-centric CMS with deterministic build pipeline.
- Introduced performance budgets baked into CI checks.
- Trained marketing team on structured markdown authoring.
- Implemented automated accessibility & link validation pipeline.

## Challenges & Resolutions

| Challenge | Resolution | Outcome |
|-----------|------------|---------|
| Bloated JS bundle | Utility subset Tailwind + deferred enhancement | 86% JS reduction |
| Plugin regression risk | Removed dynamic plugins; static pre-render + targeted hydration | Near-zero post-release hotfixes |
| Accessibility inconsistencies | Tokenized color matrix + axe-core CI | Consistent AA compliance |
| Editorial bottleneck | Git-based markdown workflow + guard rails | Faster publish cycle |

---

## Lessons Learned

- Early performance budgets prevent silent regressions.
- Progressive enhancement yields better perceived performance than premature SPA adoption.
- Color token governance simplifies long-term accessibility compliance.

## Roadmap / Next Steps

- Multi-language content fallback (graceful cascading strategy).
- Edge function personalization (geo-based hero assets).
- Scheduled publishing queue.

---

**Live:** <https://enesance.ch>
