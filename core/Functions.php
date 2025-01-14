<?php

function dd($value)
{
    var_dump($value);
    die();
}

function getURI(){
    return strtolower(trim($_SERVER['REQUEST_URI'], "/"));
}