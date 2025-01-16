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
    "dashboard/accounts" => [
        "path" => "controllers/userController.php",
        "class" => "userController",
        "method" => "accountsDashboardRendering",
    ],
    "account/validation" => [
        "path" => "controllers/userController.php",
        "class" => "userController",
        "method" => "accountValidation",
    ],
    "account/reactivation" => [
        "path" => "controllers/userController.php",
        "class" => "userController",
        "method" => "accountActivation",
    ],
    "account/suspension" => [
        "path" => "controllers/userController.php",
        "class" => "userController",
        "method" => "accountSuspension",
    ],
    "dashboard/categories" => [
        "path" => "controllers/categoryController.php",
        "class" => "categoryController",
        "method" => "categoriesDashboardRendering",
    ],
    "dashboard/categories/delete" => [
        "path" => "controllers/categoryController.php",
        "class" => "categoryController",
        "method" => "categoriesDeletion",
    ],
    "dashboard/categories/add" => [
        "path" => "controllers/categoryController.php",
        "class" => "categoryController",
        "method" => "categoriesAdding",
    ],
];
