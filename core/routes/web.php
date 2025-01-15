<?php
return [
    "home" => "views/home.view.php",
    "auth" => "views/auth.view.php",
    "auth/register" => [
        "path" => "controllers/authController.php",
        "class" => "authController",
        "method" => "register",
    ],
    "profile" => "views/profile.view.php",
];
