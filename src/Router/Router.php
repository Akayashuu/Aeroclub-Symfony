<?php 

Namespace App\Router;

class Router {
    private $routes;
    private $defaultDir;

    public function register(string $path, callable $action): void
    {
        $this->routes[$path] = $action;
    }

    public function resolve(string $uri)
    {
        $uri = $uri = str_replace($this->defaultDir, "", $uri);
        $path = explode('?', $uri)[0];
        $path = rtrim($path, "/");
        $action = $this->routes[$path] ?? null;
        if (!is_callable($action)) {
            $action = $this->routes["/"] ?? null;
            return  $action();
        }
        return $action();
    }

    public function setDefaultDir(string $defaultDir) {
        $this->defaultDir = $defaultDir;
    }
}