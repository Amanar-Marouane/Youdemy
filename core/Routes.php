<?php
require_once __DIR__ . "/../core/Router.php";

use app\controllers\{courseController, tagController, categoryController, userController, MyCoursesController};

$router = new Router;

$router->URI_Handler('home', "views/home.view.php");
$router->URI_Handler('auth', "views/auth/auth.view.php");
$router->URI_Handler('auth/register', '', new userController(), "register");
$router->URI_Handler('auth/login', '', new userController(), "login");
$router->URI_Handler('profile', '', new userController(), "profileRendering");
$router->URI_Handler('logout', '', new userController(), "logout");
$router->URI_Handler('admin/accounts', '', new userController(), "accountsDashboardRendering");
$router->URI_Handler('account/validation', '', new userController(), "accountValidation");
$router->URI_Handler('account/reactivation', '', new userController(), "accountActivation");
$router->URI_Handler('account/suspension', '', new userController(), "accountSuspension");
$router->URI_Handler('admin/categories', '', new categoryController(), "categoriesDashboardRendering");
$router->URI_Handler('dashboard/categories/delete', '', new categoryController(), "categoriesDeletion");
$router->URI_Handler('dashboard/categories/add', '', new categoryController(), "categoriesAdding");
$router->URI_Handler('admin/tags', '', new tagController(), "tagsDashboardRendering");
$router->URI_Handler('dashboard/tags/delete', '', new tagController(), "tagDeletion");
$router->URI_Handler('dashboard/tags/add', '', new tagController(), "tagAdding");
$router->URI_Handler('teacher/courses', '', new courseController(), "coursesDashboardRenderingT");
$router->URI_Handler('teacher/courses/add', '', new courseController(), "courseAdd");
$router->URI_Handler('dashboard/courses/session', '', new courseController(), "courseSession");
$router->URI_Handler('dashboard/courses/update', '', new courseController(), "courseUpdate");
$router->URI_Handler('course/details', '', new courseController(), "courseDetails");
$router->URI_Handler('courses/{index}', '', new courseController(), "getAllCourses");
$router->URI_Handler('course/enroll', '', new MyCoursesController(), "enroll");
$router->URI_Handler('course/unenroll', '', new MyCoursesController(), "unenroll");
$router->URI_Handler('mycourses', '', new MyCoursesController(), "getAllCourses");
$router->URI_Handler('teacher/analytics', '', new courseController(), "coursesAnalyticsDashboardT");
$router->URI_Handler('admin/courses', '', new courseController(), "adminCoursesManage");
$router->URI_Handler('admin/analytics', '', new courseController(), "adminaAnalytics");
