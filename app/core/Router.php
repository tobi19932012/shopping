<?php

namespace Core;
require_once '../app/controllers/BaseController.php';

class Router
{
    // Mảng lưu trữ các route
    private static $routes = [
        'GET' => [],
        'POST' => [],
    ];

    // Đăng ký route GET
    public static function get($url, $action)
    {
        self::$routes['GET'][$url] = $action;
    }

    // Đăng ký route POST
    public static function post($url, $action)
    {
        self::$routes['POST'][$url] = $action;
    }

    // Xử lý route dựa trên phương thức HTTP
    public static function route($url, $method)
    {

//        var_dump(self::$routes[$method]);
//        die;
//        var_dump(self::$routes, $url);
//        die;
        if (isset(self::$routes[$method][$url])) {
            $action = self::$routes[$method][$url];
            $controllerName = $action['controller'];
            $actionName = $action['action'];

            // Include controller class
            $controllerName = "\\Controllers\\" . $controllerName;
            // Tạo đối tượng controller và gọi phương thức action
            $controller = new $controllerName();
            $controller->$actionName();
        } else {
            die("Route not found: $url with method $method");
        }
    }
}
