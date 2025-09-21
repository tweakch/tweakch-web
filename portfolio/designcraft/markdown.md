---
title: DesignCraft Platform
description: A modular SaaS platform enabling designers to prototype, iterate, and ship brand assets faster.
client: Internal Product
role: Lead Engineer & Product Architect
tech: [PHP 8.2, Twig, Symfony Components, Alpine.js, MySQL, Redis, Docker]
tags: [saas, design, platform, performance]
published: 2025-05-12
---

## Overview

DesignCraft is a multi-tenant SaaS accelerating design-to-development handoff. It centralizes **component specs**, **asset versioning**, and **live style guides** so teams preserve brand consistency while shipping quickly.

## Problem / Context

Teams relied on static PDFs and loosely versioned design tokens; drift between design intent and production CSS created rework, inconsistent branding, and slow handoffs.

## Objectives

- Replace static style guides with an always-current, generated source.
- Normalize heterogeneous Figma exports into a canonical token graph.
- Enable flexible exporter plugins (SCSS, CSS vars, Tailwind, JSON).
- Reduce cycle time from design update to dev-ready artifacts.
- Provide deterministic, cache-friendly build outputs.

## Architecture / Approach

---

### Architecture Highlights

| Aspect | Approach |
|--------|---------|
| Multi‑Tenancy | Schema-per-tenant tables + shared catalog tables |
| Rendering | Twig for server-side + progressive Alpine.js sprinkles |
| Auth | JWT (API) + HTTP-only session cookie (app UI) |
| Caching | Redis layered: token manifests + compiled export bundles |
| Extensibility | Event dispatcher + plugin registry (YAML descriptors) |

The platform deliberately avoids a heavy SPA; most pages stream HTML quickly while selectively hydrating interactive regions (token diff viewer, preview sandbox) via small Alpine controllers.

---

## Key Contributions

### 1. Token Orchestration

- Normalized ingest from Figma REST exports.
- Enforced naming convention validation (BEM-like scoping) early.
- Emitted canonical JSON snapshot for all downstream exporters.

### 2. Live Style Guide

- Implemented async regeneration pipeline (HTML + hashed assets) on token change.
- Added signed invalidation map for zero-downtime asset switching.

### 3. Export Pipelines

Implemented exporters:

- SCSS variables + partial segmentation by domain.
- CSS custom properties (light/dark themes) with fallbacks.
- Tailwind preset generator (injecting tokens into `theme.extend`).
- W3C draft design token JSON for external consumers.

Plugin system: service-tag discovery + compile queue fan-out with aggregated timing metrics.

### 4. Component Snapshot Diffing

- Headless Chromium worker renders component states per iteration.
- Pixel diffs filtered to significant structural deltas, minimizing blob storage churn.

## Challenges & Resolutions

| Challenge | Resolution | Outcome |
|-----------|------------|---------|
| Token ordering instability | Introduced deterministic sort + hash validation | Reproducible exports, cleaner diffs |
| Export pipeline contention | Queued fan-out with concurrency caps | Stable latency under burst edits |
| Style guide cache invalidation | Signed map + atomic pointer swap | Zero broken asset windows |
| Visual diff noise | Thresholding + region focus | 60% blob size reduction |

## Performance & Scaling

### Metrics

- Cold start HTML TTFB: ~65ms (local baseline) after opcode & Twig cache warm.
- Token bundle generation (avg): 420ms (parallelized exporters).
- Redis hit ratio ~92% on manifest lookups.
- Background workers (Supervisor) isolated from web FPM pool for predictable latency.

---

## Security & Reliability

- Strict Content Security Policy blocking inline scripts (nonce for minimal Alpine bootstraps).
- Disallowed raw HTML in markdown content ingestion (leveraging the same sanitizer pattern as blog).
- Rate limiting on design asset uploads (sliding window Redis script).
- Daily integrity verification for token history via hashed chain.

---

## My Role

Led domain modeling, platform architecture, exporter abstraction, and progressive enhancement strategy. Mentored contributors on bundle reduction and deterministic token ordering for reproducible builds.

---

## Impact / Results

- Reduced style guide drift incidents by 80% (support ticket trend).
- Cut handoff cycle time from ~3 days to a few hours.
- Established single source-of-truth token graph (improved cross-team alignment).

---

## Lessons Learned

- Deterministic ordering early simplifies caching and test baselines.
- Light progressive enhancement outperformed a full SPA for time-to-first-artifact.
- Export plugin contracts benefit from strict versioning to avoid silent drift.

## Roadmap / Next Steps

- Webhook-driven delta exports instead of full regeneration.
- GraphQL API surface for selective token queries.
- In-browser accessibility contrast matrix auto-generation.

---

**Links:** <https://designcraft.ch>
