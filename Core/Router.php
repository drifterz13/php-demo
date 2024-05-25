<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    private $routes = [];

    private function addRoute(String $method, String $uri, String $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'middleware' => null
        ];

        return $this;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function get(String $uri, String $controller)
    {
        return $this->addRoute('GET', $uri, $controller);
    }


    public function post(String $uri, String $controller)
    {
        return $this->addRoute('POST', $uri, $controller);
    }

    public function patch(String $uri, String $controller)
    {
        return $this->addRoute('PATCH', $uri, $controller);
    }


    public function delete(String $uri, String $controller)
    {
        return $this->addRoute('DELETE', $uri, $controller);
    }

    public function only(String $key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public static function abort($code = Response::NOT_FOUND)
    {
        http_response_code($code);
        require base_path("views/$code.view.php");

        die();
    }

    public static function redirect($path)
    {
        header("Location: $path");
        exit();
    }

    public function prevUrl()
    {
        return $_SERVER['HTTP_REFERER'];
    }

    public function route(String $uri, String $method)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === strtoupper($method) && $route['uri'] === $uri) {
                Middleware::resolve($route['middleware']);

                return require_once base_path('Http/controllers/' . $route['controller']);
            }
        }

        self::abort(404);
    }
}
