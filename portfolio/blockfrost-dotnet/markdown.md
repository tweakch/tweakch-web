---
title: Blockfrost .NET SDK
description: A robust, strongly-typed .NET client SDK for the Blockfrost Cardano API enabling developers to build blockchain integrations quickly.
client: Open Source / Blockfrost Ecosystem
role: Creator & Core Contributor
tech: [.NET 8, C#, HTTP Client Factory, System.Text.Json, GitHub Actions, NuGet]
tags: [blockchain, sdk, dotnet, api, open-source]
published: 2021-04-04
---

## Overview

Production-grade .NET abstraction over the Blockfrost REST API enabling developers to focus on application logic instead of low-level HTTP plumbing, pagination, retry policies, and data contract drift.

## Problem / Context

- Direct `HttpClient` usage led to duplicated pagination & retry code.
- Evolving API fields risked silent incompatibilities.
- Lack of standardized resilience & telemetry patterns across adopters.

## Objectives

- Provide strongly-typed, discoverable API surface.
- Bake in resilient defaults (retry, circuit breaker, cancellation).
- Simplify pagination + rate limit awareness.
- Enable forward-compatible partial mapping of new fields.

---

## Key Features

| Feature | Details |
|---------|---------|
| Strong Typing | Comprehensive C# models for Cardano entities (blocks, addresses, assets, transactions) |
| Resilience | Built-in retry + backoff (Polly integration) for transient network errors |
| Pagination Helpers | Seamless iteration across paged endpoints with async enumerables |
| Rate Limit Surfacing | Exposes remaining quota + reset times via response metadata |
| Pluggable Serialization | Custom JSON converters for performance & future-proofing (e.g., big number handling) |
| Partial Response Mapping | Graceful forward compatibility when new fields appear |
| Testability | Interface-based clients + in-memory fake handlers for unit tests |
| CI Quality Gates | Static analysis, coverage thresholds, signature validation |

---

## Architecture / Design Principles

1. Minimal Surprises: API surface mirrors Blockfrost endpoints, but method names adopt .NET conventions (PascalCase, async suffix).
2. Cancellation First: All I/O methods accept `CancellationToken` parameters.
3. Low Allocation: Pooled `HttpClient` via `IHttpClientFactory`; avoids per-call overhead.
4. Extensible Pipelines: Delegating handlers stack (logging, metrics, auth header injection).
5. Backwards Compatible: Additive releases; breaking changes batched and versioned with semantic versioning discipline.

---

## Example Usage

```csharp
var services = new ServiceCollection();
services.AddBlockfrost(options =>
{
    options.ProjectId = Environment.GetEnvironmentVariable("BLOCKFROST_PROJECT_ID");
    options.Network = BlockfrostNetwork.Mainnet;
    options.RetryPolicy = RetryPolicies.ExponentialBackoff(retryCount: 3);
});

var provider = services.BuildServiceProvider();
var client = provider.GetRequiredService<IBlockfrostClient>();

// Fetch latest block
var latest = await client.Blocks.GetLatestAsync();
Console.WriteLine($"Latest Block: {latest.Hash} slot {latest.Slot}");

// Stream assets with pagination abstraction
await foreach (var asset in client.Assets.StreamAllAsync(pageSize: 100))
{
    Console.WriteLine(asset.AssetName);
}
```

---

## Resilience & Observability

- Polly-based policies (retry + circuit breaker) configurable per logical group (blocks, transactions, metadata).
- Structured logging (ILogger) with correlation IDs propagated through handler chain.
- Metrics hooks (counter + histogram delegates) allow plugging into OpenTelemetry exporters.

---

## Testing & Quality

| Layer | Technique |
|-------|----------|
| Models | Golden JSON fixture round-trip tests |
| HTTP Clients | Mock HTTP handler injecting canned responses |
| Pagination Helpers | Deterministic synthetic endpoint simulation |
| Retry Logic | Time-controlled tests using virtual scheduler |

Continuous integration validates schema drift by periodically hitting a subset of live endpoints (non-mutating) and comparing unknown fields logged for triage.

---

## Release & Distribution

- Automated GitHub Releases generated from Conventional Commit messages.
- NuGet package publishing (signed) with SBOM artifact attached.
- Changelog fragment aggregation ensures transparent diff per version.

---

## Challenges & Resolutions

| Challenge | Resolution | Outcome |
|-----------|------------|---------|
| Endpoint pagination boilerplate | Async enumerable pagination helpers | Cleaner consumer code |
| Transient network volatility | Polly retry + circuit breaker policies | Fewer manual retries |
| Evolving API schema | Partial tolerant JSON mapping + unknown field logging | Forward compatibility |
| Rate limit visibility | Exposed quota metadata on responses | Predictable throttling strategies |

## Impact / Results

- Accelerated prototype timelines: reduced onboarding due to discoverable method signatures (community feedback).
- ~40% boilerplate reduction vs. raw `HttpClient` (measured in internal sample apps).
- Community contributions merged <48h using structured PR templates.

## Lessons Learned

- Tolerant JSON parsing reduces urgent release pressure when upstream adds fields.
- Consistent handler pipeline (auth, logging, metrics) simplifies extension.
- Providing opinionated pagination & retry early avoids downstream fragmentation.

---

## Roadmap / Next Steps

- WebSocket streaming (pending Blockfrost event support).
- Source generators for model updates from OpenAPI-like definitions.
- GraphQL projection helper (if hybrid API emerges).
- BenchmarkDotNet suite published with each release.

---

## Links

**Repository:** <https://github.com/blockfrost/blockfrost-dotnet>  
**Docs:** <https://blockfrost.dev/sdks-dotnet>
