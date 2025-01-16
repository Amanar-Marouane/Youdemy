<?php
return [
    "home" => "views/home.view.php",
    "auth" => "views/auth.view.php",
    "auth/register" => [
        "path" => "controllers/userController.php",
        "class" => "userController",
        "method" => "register",
    ],
    "auth/login" => [
        "path" => "controllers/userController.php",
        "class" => "userController",
        "method" => "login",
    ],
    "profile" => [
        "path" => "controllers/userController.php",
        "class" => "userController",
        "method" => "profileRendering",
    ],
    "logout" => [
        "path" => "controllers/userController.php",
        "class" => "userController",
        "method" => "logout",
    ],
    "dashboard/admin" => [
        "path" => "controllers/userController.php",
        "class" => "userController",
        "method" => "adminDashboardRendering",
    ],
];
