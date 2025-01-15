<?php

function dd($value)
{
    var_dump($value);
    die();
}

function getURI(){
    return strtolower(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/"));
}