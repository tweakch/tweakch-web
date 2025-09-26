<?php
// Start output buffering and session
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Router logging toggle: enable with env ROUTER_LOG=1 or query ?__rlog=1
$__ROUTER_LOG_ENABLED = (getenv('ROUTER_LOG') === '1') || (isset($_GET['__rlog']) && $_GET['__rlog'] === '1');
if ($__ROUTER_LOG_ENABLED) {
    // Log a one-liner at request start
    error_log('[router] request.start ' . json_encode([
        'method' => $_SERVER['REQUEST_METHOD'] ?? '',
        'uri' => $_SERVER['REQUEST_URI'] ?? '',
        'host' => $_SERVER['HTTP_HOST'] ?? ($_SERVER['SERVER_NAME'] ?? ''),
        'remote' => $_SERVER['REMOTE_ADDR'] ?? '',
        'script' => $_SERVER['SCRIPT_NAME'] ?? ''
    ]));
    // At shutdown, log response code and headers actually sent
    register_shutdown_function(function () {
        $code = http_response_code();
        $headers = function_exists('headers_list') ? headers_list() : [];
        error_log('[router] request.end ' . json_encode([
            'status' => $code,
            'headers' => $headers
        ]));
    });
}

/**
 * Simple yet modern router class
 */
class Router
{
    private $routes = [];
    private $basePath = '';
    private static $loggingEnabled = false;

    public function __construct($basePath = '')
    {
        $this->basePath = rtrim($basePath, '/');
    }

    public static function setLoggingEnabled(bool $enabled): void
    {
        self::$loggingEnabled = $enabled;
    }

    private function log(string $event, array $context = []): void
    {
        if (!self::$loggingEnabled) return;
        // Keep logs compact and safe
        foreach ($context as $k => $v) {
            if (is_string($v) && strlen($v) > 512) {
                $context[$k] = substr($v, 0, 512) . '…';
            }
        }
        error_log('[router] ' . $event . ' ' . json_encode($context));
    }

    /**
     * Add a route
     */
    public function add($pattern, $handler)
    {
        $this->routes[$pattern] = $handler;
    }

    /**
     * Get the current request URI
     */
    private function getCurrentUri()
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        
        // Remove query string
        if (($pos = strpos($uri, '?')) !== false) {
            $uri = substr($uri, 0, $pos);
        }
        
        // Remove base path
        if ($this->basePath && strpos($uri, $this->basePath) === 0) {
            $uri = substr($uri, strlen($this->basePath));
        }
        
        $normalized = rtrim($uri, '/') ?: '/';
        $this->log('uri.normalized', [
            'raw' => $_SERVER['REQUEST_URI'] ?? '',
            'normalized' => $normalized,
            'basePath' => $this->basePath,
        ]);
        return $normalized;
    }

    /**
     * Route the request
     */
    public function route()
    {
        $uri = $this->getCurrentUri();
        $this->log('route.start', [
            'method' => $_SERVER['REQUEST_METHOD'] ?? '',
            'uri' => $uri,
            'host' => $_SERVER['HTTP_HOST'] ?? '',
        ]);
        
        // Handle static assets first (CSS, JS, images, fonts, etc.)
        if ($this->isStaticAsset($uri)) {
            $filePath = __DIR__ . $uri;
            if (file_exists($filePath) && is_file($filePath)) {
                $this->log('static.serve', ['uri' => $uri, 'path' => $filePath]);
                $this->serveStaticFile($filePath);
                return;
            } else {
                // Static file not found
                $this->log('static.miss', ['uri' => $uri, 'path' => $filePath]);
                http_response_code(404);
                return;
            }
        }
        
        // Check for exact matches first
        if (isset($this->routes[$uri])) {
            $this->log('route.exact', ['uri' => $uri, 'handler' => $this->routes[$uri]]);
            return $this->executeHandler($this->routes[$uri], []);
        }
        
        // Check for pattern matches
        foreach ($this->routes as $pattern => $handler) {
            if ($this->matchPattern($pattern, $uri, $matches)) {
                $this->log('route.match', ['pattern' => $pattern, 'uri' => $uri, 'handler' => is_string($handler) ? $handler : 'callable']);
                return $this->executeHandler($handler, $matches);
            }
        }
        
        // No route found - 404
        $this->log('route.404', ['uri' => $uri]);
        $this->handle404();
    }

    /**
     * Check if URI is for a static asset
     */
    private function isStaticAsset($uri)
    {
        $staticExtensions = [
            'css', 'js', 'jpg', 'jpeg', 'png', 'gif', 'svg', 'ico', 'webp',
            'woff', 'woff2', 'ttf', 'eot', 'otf', 'pdf', 'txt', 'json', 'xml'
        ];
        
        $pathInfo = pathinfo($uri);
        $extension = strtolower($pathInfo['extension'] ?? '');
        
        return in_array($extension, $staticExtensions);
    }

    /**
     * Serve static files with appropriate headers
     */
    private function serveStaticFile($filePath)
    {
        $mimeTypes = [
            'css' => 'text/css',
            'js' => 'application/javascript',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'ico' => 'image/x-icon',
            'webp' => 'image/webp',
            'woff' => 'font/woff',
            'woff2' => 'font/woff2',
            'ttf' => 'font/ttf',
            'eot' => 'application/vnd.ms-fontobject',
            'otf' => 'font/otf',
            'pdf' => 'application/pdf',
            'txt' => 'text/plain',
            'json' => 'application/json',
            'xml' => 'application/xml'
        ];
        
        $pathInfo = pathinfo($filePath);
        $extension = strtolower($pathInfo['extension'] ?? '');
        $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';
        
    $this->log('static.headers', ['contentType' => $mimeType, 'file' => $filePath]);
    header('Content-Type: ' . $mimeType);
        header('Content-Length: ' . filesize($filePath));
        
        // Add cache headers for better performance
        $lastModified = filemtime($filePath);
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s T', $lastModified));
        header('Cache-Control: public, max-age=3600'); // Cache for 1 hour
        
        readfile($filePath);
    }

    /**
     * Match URI against pattern
     */
    private function matchPattern($pattern, $uri, &$matches)
    {
        // Convert pattern to regex
        $regex = str_replace(['/', '{id}', '{slug}', '{*}'], ['\/', '([^\/]+)', '([^\/]+)', '(.*)'], $pattern);
        $regex = '/^' . $regex . '$/';
        
        return preg_match($regex, $uri, $matches);
    }

    /**
     * Execute route handler
     */
    private function executeHandler($handler, $matches = [])
    {
        if (is_string($handler)) {
            // File path
            if (file_exists(__DIR__ . '/' . $handler)) {
                // Store original script name
                $originalScriptName = $_SERVER['SCRIPT_NAME'] ?? '';
                
                // Set script name to the target handler for nav_active to work
                $_SERVER['SCRIPT_NAME'] = '/' . $handler;
                
                // Pass route parameters as global variables
                if (!empty($matches)) {
                    $GLOBALS['route_params'] = array_slice($matches, 1);
                }
                
                // Include the target handler
                $this->log('handler.include', [
                    'file' => $handler,
                    'params' => $GLOBALS['route_params'] ?? [],
                ]);
                include __DIR__ . '/' . $handler;
                
                // Restore original script name
                $_SERVER['SCRIPT_NAME'] = $originalScriptName;
            } else {
                $this->log('handler.missing', ['file' => $handler]);
                $this->handle404();
            }
        } elseif (is_callable($handler)) {
            // Callable function
            $this->log('handler.callable', ['params' => array_slice($matches, 1)]);
            call_user_func_array($handler, array_slice($matches, 1));
        }
    }

    /**
     * Handle 404 errors
     */
    private function handle404()
    {
        http_response_code(404);
        
        // Check if we have a custom 404 page
        if (file_exists(__DIR__ . '/404.php')) {
            $this->log('handler.include', ['file' => '404.php']);
            include __DIR__ . '/404.php';
        } else {
            // Default 404 response - simple HTML without including config
            echo "<!DOCTYPE html><html><head><title>404 - Page Not Found</title></head><body><h1>404 - Page Not Found</h1><p>The requested page could not be found.</p></body></html>";
        }
    }
}

// Initialize router
$router = new Router();
Router::setLoggingEnabled($__ROUTER_LOG_ENABLED);

// Define routes
$router->add('/', 'home.php');                                    // Homepage
$router->add('/home', 'home.php');                               // Alternative home
$router->add('/blog', 'blog.php');                              // Blog listing
$router->add('/blog/{slug}', 'blog.php');                       // Individual blog post
$router->add('/portfolio', 'portfolio.php');                    // Portfolio listing  
$router->add('/portfolio/{slug}', 'portfolio.php');             // Individual portfolio item
$router->add('/left-sidebar', 'left-sidebar.php');              // Left sidebar layout
$router->add('/right-sidebar', 'right-sidebar.php');            // Right sidebar layout
$router->add('/no-sidebar', 'no-sidebar.php');                  // No sidebar layout

// API routes (if needed in the future)
$router->add('/api/{*}', function($path) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'API endpoint not implemented', 'path' => $path]);
});

// Execute routing
$router->route();

// End output buffering
ob_end_flush();
?>