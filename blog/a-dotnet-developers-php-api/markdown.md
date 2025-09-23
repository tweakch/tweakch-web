---
title: Building a Modern PHP API as a .NET Developer
description: A practical migration mindset for .NET engineers designing clean, testable PHP APIs.
author: alex
published: 2025-09-23
tags: php, api, architecture, migration
featured: true
---

If you are used to ASP.NET (controllers, middleware pipelines, dependency injection, structured layers), modern PHP can feel both familiar and unexpectedly minimal. Below is a concise migration guide: how to think, what to adopt first, and how to avoid over‑engineering early.

## 1. Core Standards (PSRs) – Your Runtime Contract

In .NET you trust abstractions (HttpContext, IActionResult). PHP’s FIG group codified similar interoperability via PSRs. Start with:

- PSR‑4 autoloading (class → file resolution) – replaces manual include/require.
- PSR‑7 request/response objects – like HttpRequest/HttpResponse abstractions.
- PSR‑15 middleware – analogous to ASP.NET middleware pipeline.
- PSR‑17 factories – standardized object creation for PSR‑7 types.
- PSR‑11 containers – DI lookup (like IServiceProvider).
Adopt incrementally: begin with PSR‑4 (already via Composer), then PSR‑7/15 when you introduce a router + middleware.

## 2. Layered Architecture – Keep HTTP Out of Your Core

Map familiar layers:

- Domain: Pure business rules (no framework types).
- Application (Use Cases): Coordinates domain + repositories; returns simple result DTOs.
- Infrastructure: File system, database, external APIs, serialization details.
- HTTP Interface: Controllers + request mapping + response formatting.
This separation keeps your logic portable (CLI jobs, workers) and mirrors clean architecture you’d apply in .NET.

## 3. Minimal Directory Layout (Start Small)

A pragmatic starting tree:

```txt
src/
  Domain/
  Application/
  Infrastructure/
  Http/
    Controller/
    Middleware/
public/
  index.php
  api/index.php
```

Public files are your “wwwroot”; everything else is non-public. One front controller for pages (legacy can coexist) and one for API.

## 4. Request Lifecycle – Manual but Transparent

Front controller boots autoload + builds a PSR‑7 Request (via nyholm/psr7). Middleware pipeline decorates it (logging, auth, error handling). A router (nikic/fast-route) picks a handler. The controller maps input → DTO → use case, returns a domain result. A responder/serializer converts it into a JSON Response. Centralized error middleware converts exceptions into structured JSON. This explicit wiring is simpler than ASP.NET’s automatic conventions but very controllable.

## 5. Routing Choices – Pick the Lightest That Works

If you do not need a full framework, pair:

- nikic/fast-route for matching
- Custom dispatcher + minimal middleware loop
Upgrade path later: Slim, Mezzio, or Symfony HTTP Kernel if complexity justifies (events, DI, caching).

## 6. DTOs & Serialization – Avoid Leaking Internals

Return lightweight arrays or dedicated Response DTOs (hydrated into arrays) rather than dumping domain entities. You can add Symfony Serializer later if you hit nested graph complexity. Early clarity > heavy tooling.

## 7. Error Handling – One Translation Point

Central middleware catches:

- Validation or input errors → 400
- Not found → 404
- Domain rule violations (e.g., invariant failures) → 422
- Conflict (versioning / uniqueness) → 409
Wrap them in a consistent JSON envelope or RFC 7807 (application/problem+json). This avoids scattering try/catch blocks across controllers.

## 8. Validation – Keep It Close to the Edge

Parse & validate raw input in controller or a dedicated InputValidator before calling the use case. For richer rules later: symfony/validator. Do not embed raw $_GET / $_POST usage deep in services; normalize once.

## 9. Authentication & Authorization – Middleware First

Stateless Bearer tokens (JWT) keep the API horizontally scalable. Middleware resolves identity → attaches UserIdentity to Request attributes. Downstream authorization occurs either in a policy service or inside application layer methods (explicit guard calls). Mirrors ASP.NET’s ClaimsPrincipal pipeline.

## 10. Versioning – Plan Early, Implement Lightly

Simplest: prefix path `/api/v1/...`. Freeze contract per version; evolutionary changes stay backward compatible. Add a response header `X-API-Version: 1`. Defer media-type versioning unless real need emerges.

## 11. Caching – Leverage HTTP Properly

For read-heavy endpoints:

- ETag or Last-Modified on GET responses (based on content hash or updated_at).
- Respect If-None-Match / If-Modified-Since to return 304 quickly.
Server-side: PSR‑16 simple cache (filesystem or Redis) around pure read use cases. Avoid premature caching of personalized responses (Vary headers if needed).

## 12. Pagination & Query Consistency

Adopt predictable params:

- page (1-based), per_page (cap it), sort (field or -field for desc), filter[name]=value pattern.
Return meta:

```json
{
  "data": [...],
  "meta": { "page": 1, "per_page": 20, "total": 54, "total_pages": 3 }
}
```

This predictability reduces ad hoc branching later.

## 13. Security Foundations

Enforce HTTPS (terminate early if not). Strip or validate unknown query params to limit accidental surface. Sanitize output via JSON encoding (automatic). Rate limiting (simple token bucket in Redis) before business logic prevents accidental abuse. Log security-relevant denials uniformly.

## 14. Documentation – Contract as a Living Asset

Draft a slim OpenAPI spec as soon as first endpoint stabilizes. Even a partial document clarifies naming (snake_case vs camelCase), envelope structure, and error formats. Use it later for:

- Schema validation tests
- Client generation (TypeScript, C#)
Keep it versioned with the codebase—no hidden wiki drift.

## 15. Testing Strategy – Lean but Layered

- Domain & Application: pure unit tests (fast; no HTTP).
- HTTP Integration: spin kernel in-memory; assert status + JSON schema.
- Contract Tests: validate responses vs OpenAPI to avoid silent breaking changes.
Add mutation testing or static analysis (PHPStan) once green path stable.

## 16. Incremental Adoption Plan (Your First Week)

Day 1–2: Add dependencies (PSR‑7, fast-route). Create api/index.php with a single /health endpoint.
Day 3: Introduce Blog/Portfolio feature endpoints reusing existing services (wrap them with DTO mappers).
Day 4: Add error middleware + uniform JSON envelope + pagination pattern.
Day 5: Introduce OpenAPI draft + simple auth placeholder middleware.
Day 6: Add caching (ETag) to featured lists.
Day 7: Harden tests + refine directory structure; document contribution guidelines for endpoints.

## 17. Migration Mindset from .NET

Things you might miss:

- Convention-over-configuration scaffolding. (You wire more manually.)
- DI container magic. (Add PHP-DI or Symfony DI only when constructor lists grow.)
- Built-in model binding. (Write explicit mapping; it stays transparent.)
Upside: Extremely low abstraction overhead early on; performance and clarity are good; incremental complexity feels linear.

## 18. When to Add More Framework

Introduce heavier tools only at clear pain thresholds:

- Repetitive manual wiring → DI container.
- Sprawling serialization logic → Serializer component.
- Cross-cutting metrics/tracing growth → Observability middleware + OpenTelemetry SDK.

## 19. Deployment & Runtime Notes

API is just PHP scripts invoked by the web server (FPM). Ensure:

- Composer autoload optimized (`composer install --no-dev -o`).
- Opcache enabled in production.
- Separate `public/` as docroot (avoid leaking source).
Rolling updates = upload new code, let Opcache warm, optionally include a version endpoint.

## 20. Minimal Example Endpoint Shape (Conceptual)

Controller returns:

```json
{
  "data": { "id": "post-123", "title": "..." },
  "meta": { "request_id": "abc123", "generated_at": "2025-09-23T12:30:00Z" }
}
```

Errors:

```json
{
  "error": { "type": "validation_error", "message": "Invalid page size", "fields": { "per_page": "Must be <= 100" } }
}
```

Predictable envelopes reduce per-endpoint cognitive load.

---

Adopt only what solves today’s friction; keep the door open for structured evolution. Start tiny, standardize early naming, and let real usage drive each escalation (container, serializer, auth, versioning). That discipline prevents the “accidental monolith” feeling while still staying fast.

Happy building.
