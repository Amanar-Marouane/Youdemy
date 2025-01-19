<?php
require_once __DIR__ . "/../models/MyCourses.php";

class MyCoursesController
{

    public function enroll()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $course_id = $data['course_id'];
        $user_id = $data['user_id'];

        if (!MyCourses::enroll($course_id, $user_id)) {
            $_SESSION['error'] = "Something went wrong";
            return;
        }
        $_SESSION['success'] = "You have successfuly enrolled to this course";
    }

    public function unenroll()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $course_id = $data['course_id'];
        $user_id = $data['user_id'];

        if (!MyCourses::unenroll($course_id, $user_id)) {
            $_SESSION['error'] = "Something went wrong";
            return;
        }
        $_SESSION['success'] = "You have successfuly unenrolled from this course";
    }

    public function getAllCourses()
    {

        $user_id = $_SESSION['user_id'];

        if (!$info = MyCourses::getAllCourses($user_id)) {
            $_SESSION['error'] = "Something went wrong! Try again";
            header("Location: /home");
            exit();
        }
        extract($info);
        include __DIR__ . "/../views/studentCourses.view.php";
    }
}
