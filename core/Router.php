<?php
if (PHP_SESSION_NONE) session_start();
require_once __DIR__ . "/Functions.php";
require_once __DIR__ . "/Db.php";
class Router
{

    public static function URI_Handler()
    {
        $uri = getURI();
        $routes = require_once __DIR__ . "/routes/web.php";
        if (!isset($_SESSION['error'])) {
            $_SESSION['error'] = "";
        }
        if (!isset($_SESSION['success'])) {
            $_SESSION['success'] = "";
        }

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
        } else {
            include __DIR__ . "/../app/views/404.view.php";
        }
    }
}
