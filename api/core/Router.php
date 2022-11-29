<?php

namespace Core;

/**
 * manages the routing process in the application
 */
class Router
{
    //Request Types
    //Get Request
    protected static $get_route = array();
    //POST Request
    protected static $post_route = array();
    //PUT Request
    protected static $put_route = array();
    //DELETE Request
    protected static $delete_route = array();


    public static function redirect(): void
    {
        $request = $_SERVER['REQUEST_URI'];
        $routes = array();

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $routes = self::$get_route;
                break;
            case 'POST':
                $routes = self::$post_route;
                break;
            case 'PUT':
                $routes = self::$put_route;
                break;
            case 'DELETE':
                $routes = self::$delete_route;
                break;
        }

        if (empty($routes) || !array_key_exists($request, $routes)) {
            http_response_code(404);
            die('<h1>Page Not Exist</h1>');
        }

        $controller_namespace = 'Core\\Controller\\';
        $class_arr = explode('.', $routes[$request]);
        $class_name = ucfirst($class_arr[0]);
        $class = $controller_namespace . $class_name;

        $instance = new $class;

        if (count($class_arr) > 1) {
            call_user_func([$instance, $class_arr[1]]);
        }

        $instance->render();
    }

    public static function get($route, $controller): void
    {
        self::$get_route[$route] = $controller;
    }

    public static function post($route, $controller): void
    {
        self::$post_route[$route] = $controller;
    }

    public static function put($route, $controller): void
    {
        self::$put_route[$route] = $controller;
    }

    public static function delete($route, $controller): void
    {
        self::$delete_route[$route] = $controller;
    }
}
