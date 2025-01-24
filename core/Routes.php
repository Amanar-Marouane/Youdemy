<?php
return [
    "home" => "views/home.view.php",
    "auth" => "views/auth.view.php",
    "auth/register" => [
        "class" => "userController",
        "method" => "register",
    ],
    "auth/login" => [
        "class" => "userController",
        "method" => "login",
    ],
    "profile" => [
        "class" => "userController",
        "method" => "profileRendering",
    ],
    "logout" => [
        "class" => "userController",
        "method" => "logout",
    ],
    "admin/accounts" => [
        "class" => "userController",
        "method" => "accountsDashboardRendering",
    ],
    "account/validation" => [
        "class" => "userController",
        "method" => "accountValidation",
    ],
    "account/reactivation" => [
        "class" => "userController",
        "method" => "accountActivation",
    ],
    "account/suspension" => [
        "class" => "userController",
        "method" => "accountSuspension",
    ],
    "admin/categories" => [
        "class" => "categoryController",
        "method" => "categoriesDashboardRendering",
    ],
    "dashboard/categories/delete" => [
        "class" => "categoryController",
        "method" => "categoriesDeletion",
    ],
    "dashboard/categories/add" => [
        "class" => "categoryController",
        "method" => "categoriesAdding",
    ],
    "admin/tags" => [
        "class" => "tagController",
        "method" => "tagsDashboardRendering",
    ],
    "dashboard/tags/delete" => [
        "class" => "tagController",
        "method" => "tagDeletion",
    ],
    "dashboard/tags/add" => [
        "class" => "tagController",
        "method" => "tagAdding",
    ],
    "teacher/courses" => [
        "class" => "courseController",
        "method" => "coursesDashboardRenderingT",
    ],
    "teacher/courses/add" => [
        "class" => "courseController",
        "method" => "courseAdd",
    ],
    "dashboard/courses/session" => [
        "class" => "courseController",
        "method" => "courseSession",
    ],
    "dashboard/courses/update" => [
        "class" => "courseController",
        "method" => "courseUpdate",
    ],
    "course/details" => [
        "class" => "courseController",
        "method" => "courseDetails",
    ],
    "courses" => [
        "class" => "courseController",
        "method" => "getAllCourses",
    ],
    "course/enroll" => [
        "class" => "MyCoursesController",
        "method" => "enroll",
    ],
    "course/unenroll" => [
        "class" => "MyCoursesController",
        "method" => "unenroll",
    ],
    "mycourses" => [
        "class" => "MyCoursesController",
        "method" => "getAllCourses",
    ],
    "teacher/analytics" => [
        "class" => "courseController",
        "method" => "coursesAnalyticsDashboardT",
    ],
    "admin/courses" => [
        "class" => "courseController",
        "method" => "adminCoursesManage",
    ],
    "admin/analytics" => [
        "class" => "courseController",
        "method" => "adminaAnalytics",
    ],
    "404" => "views/404.view.php",
];
