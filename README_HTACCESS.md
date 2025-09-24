# .htaccess Configuration

This document explains the `.htaccess` configuration added to enable clean URLs and fix workflow smoketests.

## Purpose

The `.htaccess` file was added to solve the issue where workflow smoketests expected both legacy blog URLs (`/blog.php?post=slug`) and clean URLs (`/blog/slug`) to work, but only the legacy format was functional.

## Configuration Sections

### 1. PHP-FPM Configuration
```apache
<IfModule mod_fcgid.c>
    FcgidWrapper /usr/local/bin/php84-cgi .php
</IfModule>
```
- Configures the server to use PHP-FPM with PHP 8.4 as requested in the issue

### 2. URL Rewrite Rules
```apache
RewriteEngine On
RewriteRule ^blog/([a-z0-9-]+)/?$ blog.php?post=$1 [QSA,L]
```
- **Pattern**: `^blog/([a-z0-9-]+)/?$`
  - Matches URLs starting with `/blog/` followed by lowercase letters, numbers, and hyphens
  - Optional trailing slash
  - Captures the post slug in group `$1`
- **Target**: `blog.php?post=$1`
  - Rewrites to the legacy URL format that the application expects
- **Flags**: 
  - `[QSA]` - Query String Append: preserves any existing query parameters
  - `[L]` - Last rule: stops processing further rewrite rules

### 3. Security Rules
```apache
<FilesMatch "\.(md|yml|yaml|json|lock|txt|log|env)$">
    Require all denied
</FilesMatch>

<FilesMatch "^(composer\.(json|lock|phar)|package(-lock)?\.json)$">
    Require all denied
</FilesMatch>

RedirectMatch 403 ^/includes/.*$
RedirectMatch 403 ^/src/.*$
RedirectMatch 403 ^/templates/.*$
RedirectMatch 403 ^/tests/.*$
RedirectMatch 403 ^/var/.*$
```
- Blocks direct access to sensitive configuration files
- Protects application source code directories
- Prevents information disclosure

### 4. Performance Optimizations
```apache
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
    # ... more static assets
</IfModule>

<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/plain
    AddOutputFilterByType DEFLATE text/html
    # ... more content types
</IfModule>
```
- Sets appropriate cache headers for static assets
- Enables gzip compression for text-based files

## URL Examples

After deployment, these URLs will work identically:

| Clean URL | Legacy URL | Description |
|-----------|------------|-------------|
| `/blog/a-dotnet-developers-php-api` | `/blog.php?post=a-dotnet-developers-php-api` | Specific blog post |
| `/blog/layout-4-2-1-guideline` | `/blog.php?post=layout-4-2-1-guideline` | Another blog post |

## Testing

The rewrite logic has been tested with:
- Valid post slugs (lowercase, numbers, hyphens)
- Invalid patterns (uppercase, underscores, spaces)
- Edge cases (trailing slashes, empty slugs)

See `tests/Integration/HtaccessRewriteTest.php` for comprehensive test coverage.

## Deployment

When deployed to an Apache server with mod_rewrite enabled, this configuration will:
1. Fix the failing workflow smoketests
2. Enable clean, SEO-friendly URLs for blog posts
3. Maintain backward compatibility with existing legacy URLs
4. Enhance security and performance

## Future Extensions

The configuration includes a commented portfolio rewrite rule for future use:
```apache
# RewriteRule ^portfolio/([a-z0-9-]+)/?$ portfolio.php?post=$1 [QSA,L]
```

This can be uncommented when clean portfolio URLs are needed.