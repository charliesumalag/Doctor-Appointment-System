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

    public function post($uri, $controller)
    {
        $this->registerRoutes('POST', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        $this->registerRoutes('PUT', $uri, $controller);
    }


    public function delete($uri, $controller)
    {
        $this->registerRoutes('DELETE', $uri, $controller);
    }


    public function route($uri, $method)
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $requestMethod) {

                $controller = 'App\\controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];

                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod();
            }
        }
    }
}
