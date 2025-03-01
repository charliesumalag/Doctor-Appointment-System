<?php

namespace Framework;

class Router
{
    protected $routes = [];

    public function registerRoutes($method, $uri, $action)
    {
        list($controller, $controllerMethod) = explode('@', $action);
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod,
        ];
    }

    public function get($uri, $controller)
    {
        $this->registerRoutes('GET', $uri, $controller);
    }

    public function route($uri, $method)
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $requestMethod) {

                $controller = 'app\\controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];

                // this is the end Note: backslash tau. double backslash

                echo $controller;
            }
        }
    }
}
