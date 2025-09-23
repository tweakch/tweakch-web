# API Skeleton (Phase 1)

This introduces a minimal public API surface under `public/api` while keeping legacy PHP page entry points intact.

## Current Endpoints

- `GET /api/health` – Returns basic uptime + PHP version JSON.

## Directory Layout

```text
public/api/index.php      # Front controller (temp hand-rolled router)
src/Domain/               # Pure business logic (entities, value objects, domain services)
src/Application/          # Use cases / orchestrators (invoke domain, return DTOs)
src/Infrastructure/       # External adapters (persistence, filesystem, HTTP clients)
src/Http/Controller/      # Controller classes (1 per route group eventually)
src/Http/Middleware/      # Future PSR-15 style middleware (auth, errors, logging)
src/Http/DTO/             # Request/Response DTOs
src/Http/Routing/         # Router/Route definitions (planned: FastRoute integration)
```

## Incremental Roadmap

1. Add `nikic/fast-route` + `nyholm/psr7` for PSR-7 request/response abstraction.
2. Introduce an ErrorHandlingMiddleware mapping exceptions -> JSON Problem responses.
3. Implement Blog endpoints: `GET /api/v1/blog/featured`, `GET /api/v1/blog/{slug}`.
4. Introduce simple DI container (manual array map or PHP-DI) to remove ad hoc `new` usage.
5. Add OpenAPI spec (`openapi.yaml`) and validate responses in CI.
6. Add auth placeholder + rate limiting for mutating endpoints (future).

## Conventions

- Responses: `{ "data": ..., "meta": { ... } }` (to be enforced once controllers are formalized)
- Dates: ISO8601 UTC (`gmdate('c')`).
- Errors: Will migrate to `application/problem+json` when middleware layer added.

## Testing Locally

```bash
php -S localhost:8000 -t public
curl http://localhost:8000/api/health
```

## Next Suggested Step

Add routing + PSR-7 abstraction to decouple from `$_SERVER` and enable middleware pipeline.
