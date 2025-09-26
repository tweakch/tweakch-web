<?php
/**
 * Modern Router for the Site
 * Handles all incoming requests and routes them to appropriate handlers
 */

// Start output buffering and session
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Simple yet modern router class
 */
class Router
{
    private $routes = [];
    private $basePath = '';

    public function __construct($basePath = '')
    {
        $this->basePath = rtrim($basePath, '/');
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
        
        return rtrim($uri, '/') ?: '/';
    }

    /**
     * Route the request
     */
    public function route()
    {
        $uri = $this->getCurrentUri();
        
        // Check for exact matches first
        if (isset($this->routes[$uri])) {
            return $this->executeHandler($this->routes[$uri], []);
        }
        
        // Check for pattern matches
        foreach ($this->routes as $pattern => $handler) {
            if ($this->matchPattern($pattern, $uri, $matches)) {
                return $this->executeHandler($handler, $matches);
            }
        }
        
        // No route found - 404
        $this->handle404();
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
                include __DIR__ . '/' . $handler;
                
                // Restore original script name
                $_SERVER['SCRIPT_NAME'] = $originalScriptName;
            } else {
                $this->handle404();
            }
        } elseif (is_callable($handler)) {
            // Callable function
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
            include __DIR__ . '/404.php';
        } else {
            // Default 404 response - simple HTML without including config
            echo "<!DOCTYPE html><html><head><title>404 - Page Not Found</title></head><body><h1>404 - Page Not Found</h1><p>The requested page could not be found.</p></body></html>";
        }
    }
}

// Initialize router
$router = new Router();

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