<?php
// Start session before any output
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load Composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Use the new namespaced classes
use App\i18n\Language;
use App\Services\TemplateService;

// Initialize language system
$lang = Language::getInstance();

// Initialize template service
$twig = new TemplateService();

// Basic site configuration
$SITE_NAME = 'TWIːK';
$SITE_AUTHOR = 'tweakch';
$SITE_VERSION = '1.0.0-php';

// Simple helper to echo active class
function nav_active(string $target): string {
    $current = $_SERVER['SCRIPT_NAME'] ?? '';
    $currentBase = basename($current);
    return $currentBase === $target ? ' class="current"' : '';
}

// Allow pages to set $pageTitle before including header
if (!isset($pageTitle)) {
    $pageTitle = $SITE_NAME;
}
