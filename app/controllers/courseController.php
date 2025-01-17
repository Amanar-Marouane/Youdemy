<?php
require_once __DIR__ . "/../models/Course.php";
require_once __DIR__ . "/../models/CourseVideo.php";
require_once __DIR__ . "/../models/CourseDoc.php";

class courseController
{

    public function coursesDashboardRenderingT()
    {
        if ($info = Course::coursesDashboardRenderingT()) {
            extract($info);
            include __DIR__ . "/../views/teacherCourses.view.php";
        }
    }

    public function courseAdd()
    {
        $course_type = $_POST['course_type'];
        if ($course_type === "Video") {
            if (!CourseVideo::courseAdd($_POST['course_title'], $_POST['course_desc'], $_POST['course_content'], $_POST['category_id'], $_POST['tags'])) {
                $_SESSION["error"] = "Something Went wrong";
            }
        } else {
            if (!CourseDoc::courseAdd($_POST['course_title'], $_POST['course_desc'], $_POST['course_content'], $_POST['category_id'], $_POST['tags'])) {
                $_SESSION["error"] = "Something Went wrong";
            }
        }
        header("Location: /teacher/courses");
    }

    public function courseSession()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        if (isset($data["action"])) {
            $action = $data["action"];
            $course_id = $data['course_id'];
        } else {
            $action = $_POST["action"];
            $course_id = $_POST['course_id'];
        }

        if ($action === "delete") {
            if (Course::courseRemove($course_id)) echo "The course has been removed successfully";
        } else {
            $info = Course::courseEdit($course_id);
            include_once __DIR__ . "/../views/courseEditForm.view.php";
        }
    }
}
