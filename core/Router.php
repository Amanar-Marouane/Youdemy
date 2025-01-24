<?php
if (PHP_SESSION_NONE) session_start();

require_once __DIR__ . "/Functions.php";
require_once __DIR__ . "/AutoLoader.php";

use core\{Db, Midleware};
use app\controllers\{courseController, tagController, categoryController, userController, MyCoursesController};

AutoLoader::autoloader();
class Router
{

    public static function URI_Handler()
    {
        $uri = getURI();
        $routes = require_once __DIR__ . "/Routes.php";
        messagesHandler();

        $acc_type = get_acc_type();
        Midleware::permissionChecker($uri, $acc_type);

        if (key_exists($uri, $routes)) {
            if (is_array($routes[$uri])) {
                $method = $routes[$uri]['method'];
                $class = $routes[$uri]['class'];
                $instance = self::controllersCaller($class);
                $instance->$method();
            } else {
                include __DIR__ . "/../app/$routes[$uri]";
            }
        }
    }

    public static function controllersCaller($class)
    {
        switch ($class) {
            case "courseController":
                return new courseController;
                break;

            case "tagController":
                return new tagController;
                break;

            case "categoryController":
                return new categoryController;
                break;

            case "userController":
                return new userController;
                break;

            case "MyCoursesController":
                return new MyCoursesController;
                break;
        }
    }
}
