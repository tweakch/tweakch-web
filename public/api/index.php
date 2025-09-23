<?php
/**
 * Minimal API Front Controller (Phase 1)
 * - Provides a /health endpoint now
 * - Placeholder structure for future routing/middleware
 */

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

// Basic routing (expand later with FastRoute)
if ($uri === '/api/health' && $method === 'GET') {
    echo json_encode([
        'status' => 'ok',
        'time' => gmdate('c'),
        'php' => PHP_VERSION,
    ]);
    exit;
}

http_response_code(404);

echo json_encode([
    'error' => [
        'type' => 'not_found',
        'message' => 'Route not found',
        'path' => $uri,
    ]
]);
