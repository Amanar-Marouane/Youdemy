<?php

class AutoLoader {

    public static function autoloader(){
        spl_autoload_register(function($class){
            $class = str_replace("\\", "/", $class);
            $path =  __DIR__ . "/../$class.php";
            require_once $path;
        });
    }
}