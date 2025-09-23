# Dopetrope PHP Conversion

This directory is a PHP-adapted version of the original static HTML5 UP "Dopetrope" template.

## Structure

- `index.php`, `left-sidebar.php`, `right-sidebar.php`, `no-sidebar.php` – Page entries using shared includes.
- `includes/config.php` – Basic site settings & helper.
- `includes/header.php` / `includes/footer.php` – Layout wrappers.
- Original `.html` files retained for reference (can be removed once no longer needed).

## How It Works

Each page sets `$pageTitle` and `$bodyClass` (optional) before including `includes/header.php`. Dynamic repeated blocks (portfolio & blog on `index.php`) are generated from PHP arrays to show how content can become data-driven later.

## Running Locally (Built-in PHP Server)

From this directory run:

```bash
php -S localhost:8000
```

### Running Tests

Install dependencies (including dev):

```bash
composer install
```

Run the test suite:

```bash
vendor/bin/phpunit
```

Static analysis (non-blocking in CI):

```bash
vendor/bin/phpstan analyse --no-progress
```

Then open: <http://localhost:8000/index.php>

## Next Steps (Suggested)

1. Introduce a simple front controller (`public/index.php`) and move pages into a `pages/` directory.
2. Add Composer + autoloading and possibly a lightweight router (FastRoute).
3. Replace ad-hoc arrays with database or JSON data source.
4. Implement a template engine (Twig) for cleaner separation & auto-escaping.
5. Add contact form and basic content management if required.

## Docker (Local Stack)

Services: Nginx (port 8080), PHP-FPM (internal), MariaDB, phpMyAdmin (port 8081).

1. Copy environment example:

```powershell
Copy-Item .env.example .env
```

1. Start stack:

```powershell
docker compose up -d --build
```

1. App: <http://localhost:8080>

1. phpMyAdmin: <http://localhost:8081> (use DB_USER / DB_PASSWORD from `.env`)

To stop & remove containers:

```powershell
docker compose down
```

Rebuild after changes to Dockerfile:

```powershell
docker compose build php
docker compose up -d
```

MariaDB data persists in named volume `db_data`.

## License

Original template license: see `LICENSE.txt` from HTML5 UP. Respect attribution if required by that license.
