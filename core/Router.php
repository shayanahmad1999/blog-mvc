<?php
namespace App\Core;

class Router {
    private $routes = [];
    private $notFoundCallback;

    public function get($path, $callback) {
        $this->addRoute('GET', $path, $callback);
    }

    public function post($path, $callback) {
        $this->addRoute('POST', $path, $callback);
    }

    public function any($path, $callback) {
        $this->addRoute('GET|POST|PUT|DELETE', $path, $callback);
    }

    public function setNotFound($callback) {
        $this->notFoundCallback = $callback;
    }

    private function addRoute($method, $path, $callback) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'callback' => $callback,
            'regex' => $this->convertToRegex($path)
        ];
    }

    private function convertToRegex($path) {
        $pattern = preg_replace('/\{([a-zA-Z_][a-zA-Z0-9_]*)\}/', '(?P<$1>[^/]+)', $path);
        $pattern = str_replace('/', '\/', $pattern);
        return '/^' . $pattern . '$/';
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $this->getCurrentUri();

        foreach ($this->routes as $route) {
            if ($this->matchRoute($route, $method, $uri)) {
                return $this->callCallback($route['callback'], $route['params'] ?? []);
            }
        }

        if ($this->notFoundCallback) {
            call_user_func($this->notFoundCallback);
        } else {
            $this->defaultNotFound();
        }
    }

    private function getCurrentUri() {
        $uri = $_SERVER['REQUEST_URI'];
        if (($pos = strpos($uri, '?')) !== false) {
            $uri = substr($uri, 0, $pos);
        }
        $basePath = dirname($_SERVER['SCRIPT_NAME']);
        if ($basePath !== '/' && strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }
        return '/' . ltrim($uri, '/');
    }

    private function matchRoute(&$route, $method, $uri) {
        if (!preg_match('/^(' . $route['method'] . ')$/', $method)) {
            return false;
        }

        if (preg_match($route['regex'], $uri, $matches)) {
            // Extract parameters in the order they appear in the route
            $route['params'] = [];
            preg_match_all('/\{([a-zA-Z_][a-zA-Z0-9_]*)\}/', $route['path'], $paramNames);

            if (!empty($paramNames[1])) {
                foreach ($paramNames[1] as $paramName) {
                    if (isset($matches[$paramName])) {
                        $route['params'][] = $matches[$paramName];
                    }
                }
            }
            return true;
        }

        return false;
    }

    private function callCallback($callback, $params = []) {
        if (is_callable($callback)) {
            return call_user_func_array($callback, $params);
        } elseif (is_string($callback)) {
            return $this->callControllerMethod($callback, $params);
        }
    }

    private function callControllerMethod($callback, $params) {
        list($controller, $method) = explode('@', $callback);
        $controllerClass = "App\\Controllers\\{$controller}";

        if (class_exists($controllerClass)) {
            $instance = new $controllerClass();
            if (method_exists($instance, $method)) {
                return call_user_func_array([$instance, $method], $params);
            }
        }

        throw new \Exception("Controller or method not found: {$callback}");
    }

    private function defaultNotFound() {
        http_response_code(404);
        echo "404 - Page Not Found";
    }
}