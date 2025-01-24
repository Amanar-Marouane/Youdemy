<?php
if (PHP_SESSION_NONE) session_start();
require_once __DIR__ . "/Functions.php";
require_once __DIR__ . "/Db.php";
require_once __DIR__ . "/Midleware.php";

class Router
{

    public static function URI_Handler()
    {
        $uri = getURI();
        $routes = require_once __DIR__ . "/Routes.php";
        if (!isset($_SESSION['error'])) {
            $_SESSION['error'] = "";
        }
        if (!isset($_SESSION['success'])) {
            $_SESSION['success'] = "";
        }

        $acc_type = get_acc_type();
        Midleware::permissionChecker($uri, $acc_type);
        
        if (key_exists($uri, $routes)) {
            if (is_array($routes[$uri])) {
                $path = $routes[$uri]['path'];
                $class = $routes[$uri]['class'];
                $method = $routes[$uri]['method'];
                include __DIR__ . "/../app/" . $path;
                $instance = new $class();
                $instance->$method();
            } else {
                include __DIR__ . "/../app/$routes[$uri]";
            }
        }
    }

    public static function get_acc_type()
    {
        if (!isset($_SESSION['acc_type'])) {
            return "Visitor";
        } else {
            return $_SESSION['acc_type'];
        }
    }
}
