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
            $target_dir = __DIR__ . "/../../public/assets";
            if (isset($_FILES['course_content']) && $_FILES['course_content']['error'] === UPLOAD_ERR_OK) {
                $file_extension = strtolower(pathinfo($_FILES['course_content']['name'], PATHINFO_EXTENSION));
                $unique_file_name = uniqid() . '.' . $file_extension;
                $filePath = $target_dir . '/' . $unique_file_name;
                if (!move_uploaded_file($_FILES['course_content']['tmp_name'], $filePath)) {
                    $_SESSION["error"] = "Failed to upload the file";
                } else {
                    if (!CourseDoc::courseAdd($_POST['course_title'], $_POST['course_desc'], $filePath, $_POST['category_id'], $_POST['tags'])) {
                        $_SESSION["error"] = "Something Went wrong";
                    }
                }
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
            $info = Course::courseSession($course_id);
            include_once __DIR__ . "/../views/courseEditForm.view.php";
        }
    }

    public function courseUpdate()
    {
        $course_type = $_POST['course_type'];
        if ($course_type === "Video") {
            if (!CourseVideo::courseUpdate($_POST['course_title'], $_POST['course_desc'], $_POST['course_content'], $_POST["category_id"], $_POST["course_id"], $_POST['tags'])) {
                $_SESSION["error"] = "Something Went wrong";
                header("Location: /teacher/courses");
                exit();
            }
        } else {
            $target_dir = __DIR__ . "/../../public/assets";
            if (isset($_FILES['course_content']) && $_FILES['course_content']['error'] === UPLOAD_ERR_OK) {
                $file_extension = strtolower(pathinfo($_FILES['course_content']['name'], PATHINFO_EXTENSION));
                $unique_file_name = uniqid() . '.' . $file_extension;
                $filePath = $target_dir . '/' . $unique_file_name;
                if (!move_uploaded_file($_FILES['course_content']['tmp_name'], $filePath)) {
                    $_SESSION["error"] = "Failed to upload the file";
                    header("Location: /teacher/courses");
                    exit();
                }
            } else {
                $filePath = null;
            }
            if (!CourseDoc::courseUpdate($_POST['course_title'], $_POST['course_desc'], $filePath, $_POST["category_id"], $_POST["course_id"], $_POST['tags'])) {
                $_SESSION["error"] = "Something Went wrong";
                header("Location: /teacher/courses");
                exit();
            }
        }
        $_SESSION["success"] = "Course has been updated successfuly!";
        header("Location: /teacher/courses");
    }

    public function courseDetails()
    {
        $course_id = $_POST['course_id'];
        $course_type = $_POST['course_type'];
        $user_id = $_SESSION['user_id'];

        if ($course_type === "Video") {
            $info = CourseVideo::courseDetails($course_id, $user_id);
        } else {
            $info = CourseDoc::courseDetails($course_id, $user_id);
        }
        extract($info);
        include __DIR__ . "/../views/courseDetails.view.php";
    }

    public function getAllCourses()
    {
        $search = "%";
        if (isset($_POST["search"])) $search = "%" . $_POST["search"] . "%";

        $index = getCurrentPageIndex();
        $info = Course::getAllCourses($index, $search);
        extract($info);
        if ($index < 1 || $index > $total_pages) {
            header("Location: /courses");
            $_SESSION["error"] = "Nothing Found";
            exit();
        }
        if ($search === "%") {
            $search = "";
        }

        $search = trim($search, "%");

        include __DIR__ . "/../views/courses.view.php";
    }

    public function coursesAnalyticsDashboardT(){
        $teacher_id = $_SESSION['user_id'];
        if ($info = Course::coursesAnalyticsDashboardT($teacher_id)) {
            extract($info);
            extract($courses_statics);
            extract($students_statics);
            include __DIR__ . "/../views/teacherAnalytics.view.php";
        }
    }
}
