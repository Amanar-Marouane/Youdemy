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
        if (!CourseVideo::courseAdd($_POST['course_title'], $_POST['course_desc'], $_POST['course_type'], $_POST['course_content'], $_POST['category_id'], $_POST['tags'], $_POST['author_id'])) {
            $_SESSION["error"] = "Something Went wrong";
        }
        header("Location: /teacher/courses");
    }
}
