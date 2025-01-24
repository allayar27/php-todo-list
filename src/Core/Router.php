<?php

namespace Core;

class Router
{
    private static array $routes = [];

    public static function get($path, $callback)
    {
        self::$routes['GET'][$path] = $callback;
    }
 
    public static function post($path, $callback)
    {
        self::$routes['POST'][$path] = $callback;
    }

    public static function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        // var_dump($path);

        if (isset(self::$routes[$method][$path])) {
            $callback = self::$routes[$method][$path];
            var_dump($callback);
            if (is_array($callback) && is_string($callback[0])) {
                $controller = new $callback[0];
                $callback[0] = $controller;
            }

           call_user_func($callback);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}
