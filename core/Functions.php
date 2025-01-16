<?php

function dd($value)
{
    var_dump($value);
    die();
}

function getURI()
{
    return strtolower(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/"));
}

function emailValidation($email)
{
    if (!empty($email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        }
    }
    return false;
}

function passwordValidation($password)
{
    if (!empty($password)) {
        if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/", $password)) {
            return $password;
        }
    }
    return false;
}

function fullnameValidation($fullname)
{
    if (!empty($fullname)) {
        if (preg_match("/^[A-Za-z]{2,50}(?: [A-Za-z]+)*$/", $fullname)) {
            return $fullname;
        }
    }
    return false;
}