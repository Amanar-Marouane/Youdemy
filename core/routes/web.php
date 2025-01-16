<?php
return [
    "home" => "views/home.view.php",
    "auth" => "views/auth.view.php",
    "auth/register" => [
        "path" => "controllers/authController.php",
        "class" => "authController",
        "method" => "register",
    ],
    "auth/login" => [
        "path" => "controllers/authController.php",
        "class" => "authController",
        "method" => "login",
    ],
    "profile" => [
        "path" => "controllers/userController.php",
        "class" => "userController",
        "method" => "profileRendering",
    ],
    "logout" => [
        "path" => "controllers/authController.php",
        "class" => "authController",
        "method" => "logout",
    ]
];
