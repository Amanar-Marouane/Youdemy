<?php
require_once __DIR__ . "/Functions.php";

class Router {

    public static function URI_Handler(){
        $uri = getURI();
        $routes = require_once __DIR__ . "/routes/web.php";

        if (key_exists($uri, $routes)) {
            include __DIR__ . "/../app/views/$routes[$uri]";
        }else {
            die("CHECK ROUTER");
        }
    }
}