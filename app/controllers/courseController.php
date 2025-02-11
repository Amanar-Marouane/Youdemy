<?php

namespace app\controllers;

use app\models\{CourseVideo, CourseDoc, Course};

class courseController
{

    public function coursesDashboardRenderingT()
    {
        if ($info = Course::coursesDashboardRenderingT()) {
            extract($info);
            include __DIR__ . "/../views/dashboard/teacherCourses.view.php";
        }
    }

    public function courseAdd()
    {
        $regex = '/[<>$&\'";%(){}\[\]\\/|^`]/';
        if (preg_match($regex, $_POST['course_title']) || preg_match($regex, $_POST['course_desc'])) {
            $_SESSION['error'] = "Something went wrong, Try again!";
            header("Location: /teacher/courses");
            exit();
        }
        $course_type = $_POST['course_type'];
        if ($course_type === "Video") {
            if (filter_var($_POST['course_content'], PHP_URL_PATH)) {
                $_SESSION['error'] = "Something went wrong, Try again!";
                header("Location: /teacher/courses");
                exit();
            }
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
        $_SESSION['success'] = "Course has been added successfuly!";
        header("Location: /teacher/courses");
    }

    public function courseSession()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        if (isset($data["action"])) {
            $action = $data["action"];
            $course_id = $data['course_id'];
            $course_type = $data['course_type'];
        } else {
            $action = $_POST["action"];
            $course_id = $_POST['course_id'];
            $course_type = $_POST['course_type'];
        }
        if ($course_type === "Document") {
            $path = Course::getPdfPath($course_id);
            unlink($path["course_content"]);
        }

        if ($action === "delete") {
            if (Course::courseRemove($course_id)) echo "The course has been removed successfully";
        } else {
            $info = Course::courseSession($course_id);
            include_once __DIR__ . "/../views/courses/courseEditForm.view.php";
        }
    }

    public function courseUpdate()
    {
        $regex = '/[<>$&\'";%(){}\[\]\\/|^`]/';
        if (preg_match($regex, $_POST['course_title']) || preg_match($regex, $_POST['course_desc'])) {
            $_SESSION['error'] = "Something went wrong, Try again!";
            header("Location: /teacher/courses");
            exit();
        }
        $course_type = $_POST['course_type'];
        if ($course_type === "Video") {
            if (filter_var($_POST['course_content'], PHP_URL_PATH)) {
                $_SESSION['error'] = "Something went wrong, Try again!";
                header("Location: /teacher/courses");
                exit();
            }
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
        include __DIR__ . "/../views/courses/courseDetails.view.php";
    }

    public function getAllCourses($index)
    {
        $search = "%";
        if (isset($_POST["search"])) $search = "%" . $_POST["search"] . "%";

        $info = Course::getAllCourses($index, $search);
        extract($info);
        if ($index < 1 || $index > $total_pages && $total_pages != 0) {
            header("Location: /courses");
            $_SESSION["error"] = "Nothing Found";
            exit();
        }
        if ($search === "%") {
            $search = "";
        }

        $search = trim($search, "%");

        include __DIR__ . "/../views/courses/courses.view.php";
    }

    public function coursesAnalyticsDashboardT()
    {
        $teacher_id = $_SESSION['user_id'];
        if ($info = Course::coursesAnalyticsDashboardT($teacher_id)) {
            extract($info);
            extract($courses_statics);
            extract($students_statics);
            include __DIR__ . "/../views/dashboard/teacherAnalytics.view.php";
        }
    }

    public function adminCoursesManage()
    {
        $info = Course::adminCoursesManage();
        extract($info);
        extract($overview);
        include __DIR__ . "/../views/dashboard/adminCourses.view.php";
    }

    public function adminaAnalytics()
    {
        $info = Course::adminAnalyticsDashboard();
        extract($info);
        extract($courses_statics);
        extract($students_statics);
        include __DIR__ . "/../views/dashboard/adminAnalytics.view.php";
    }
}
