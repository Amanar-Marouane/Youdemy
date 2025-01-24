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
    "admin/accounts" => [
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
    "admin/categories" => [
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
    "admin/tags" => [
        "path" => "controllers/tagController.php",
        "class" => "tagController",
        "method" => "tagsDashboardRendering",
    ],
    "dashboard/tags/delete" => [
        "path" => "controllers/tagController.php",
        "class" => "tagController",
        "method" => "tagDeletion",
    ],
    "dashboard/tags/add" => [
        "path" => "controllers/tagController.php",
        "class" => "tagController",
        "method" => "tagAdding",
    ],
    "teacher/courses" => [
        "path" => "controllers/courseController.php",
        "class" => "courseController",
        "method" => "coursesDashboardRenderingT",
    ],
    "teacher/courses/add" => [
        "path" => "controllers/courseController.php",
        "class" => "courseController",
        "method" => "courseAdd",
    ],
    "dashboard/courses/session" => [
        "path" => "controllers/courseController.php",
        "class" => "courseController",
        "method" => "courseSession",
    ],
    "dashboard/courses/update" => [
        "path" => "controllers/courseController.php",
        "class" => "courseController",
        "method" => "courseUpdate",
    ],
    "course/details" => [
        "path" => "controllers/courseController.php",
        "class" => "courseController",
        "method" => "courseDetails",
    ],
    "courses" => [
        "path" => "controllers/courseController.php",
        "class" => "courseController",
        "method" => "getAllCourses",
    ],
    "course/enroll" => [
        "path" => "controllers/myCoursesController.php",
        "class" => "MyCoursesController",
        "method" => "enroll",
    ],
    "course/unenroll" => [
        "path" => "controllers/myCoursesController.php",
        "class" => "MyCoursesController",
        "method" => "unenroll",
    ],
    "mycourses" => [
        "path" => "controllers/myCoursesController.php",
        "class" => "MyCoursesController",
        "method" => "getAllCourses",
    ],
    "teacher/analytics" => [
        "path" => "controllers/courseController.php",
        "class" => "courseController",
        "method" => "coursesAnalyticsDashboardT",
    ],
    "admin/courses" => [
        "path" => "controllers/courseController.php",
        "class" => "courseController",
        "method" => "adminCoursesManage",
    ],
    "admin/analytics" => [
        "path" => "controllers/courseController.php",
        "class" => "courseController",
        "method" => "adminaAnalytics",
    ],
    "404" => "views/404.view.php",
];
