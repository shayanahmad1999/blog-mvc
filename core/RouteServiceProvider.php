<?php
namespace App\Core;

class RouteServiceProvider {
    private $router;

    public function __construct(Router $router) {
        $this->router = $router;
    }

    /**
     * Load and register all route files
     */
    public function loadRoutes() {
        $routeFiles = [
            'auth' => 'routes/auth.php',
            'posts' => 'routes/posts.php',
            'comments' => 'routes/comments.php',
        ];

        // Make router available globally for route files
        global $router;
        $router = $this->router;

        foreach ($routeFiles as $group => $file) {
            if (file_exists($file)) {
                require_once $file;
            } else {
                throw new \Exception("Route file not found: {$file}");
            }
        }

        // Register 404 handler
        $this->registerNotFoundHandler();

        return $this->router;
    }

    /**
     * Register the 404 not found handler
     */
    private function registerNotFoundHandler() {
        $this->router->setNotFound(function() {
            http_response_code(404);
            // Load 404 page without layout
            include 'views/404_standalone.php';
            exit();
        });
    }

    /**
     * Get route statistics
     */
    public function getRouteStats() {
        $routeFiles = glob('routes/*.php');
        $totalRoutes = 0;
        $routeGroups = count($routeFiles);

        foreach ($routeFiles as $file) {
            $content = file_get_contents($file);
            $totalRoutes += substr_count($content, '$router->');
        }

        return [
            'total_routes' => $totalRoutes,
            'route_groups' => $routeGroups,
            'route_files' => array_map('basename', $routeFiles)
        ];
    }
}