<?php
use App\Core\Router;
use App\Core\RouteServiceProvider;

// Create router instance
$router = new Router();

// Create route service provider and load all routes
$routeProvider = new RouteServiceProvider($router);
$router = $routeProvider->loadRoutes();

// Add any additional global routes
$router->get('/', function() {
    header("Location: /login");
});

// Return configured router
return $router;