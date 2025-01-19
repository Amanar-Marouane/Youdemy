<?php
require_once __DIR__ . "/../../core/Db.php";

class Course
{

    public static function coursesDashboardRenderingT()
    {
        $info = [];
        $instance = Db::getInstance();

        $teacher_id = $_SESSION['user_id'];

        $tags = "SELECT * FROM tags";
        $info["tags"] = $instance->fetchAll($tags);

        $categories = "SELECT * FROM categories";
        $info["categories"] = $instance->fetchAll($categories);

        $courses = "SELECT courses.course_id, courses.course_title, courses.course_desc, courses.course_type, courses.created_at, categories.category FROM courses JOIN categories ON categories.category_id = courses.category_id WHERE author_id = ?";
        $bindParam = [$teacher_id];
        $info["courses"] = $instance->fetchAll($courses, $bindParam);

        return $info;
    }

    public static function courseAdd($title, $descreption, $url, $category_id, $tags) {}

    public static function courseRemove($course_id)
    {
        $instance = Db::getInstance();

        $stmt = "DELETE FROM courses WHERE course_id = ?";
        $bindParam = [$course_id];

        return $instance->query($stmt, $bindParam);
    }

    public static function courseSession($course_id)
    {
        $info = [];
        $instance = Db::getInstance();
        $bindParam = [$course_id];

        $course_tags = "SELECT tag_id FROM course_tags WHERE course_id = ?";
        $info["course_tags"] = $instance->fetchAll($course_tags, $bindParam);

        $tags = "SELECT * FROM tags";
        $info["tags"] = $instance->fetchAll($tags);

        $categories = "SELECT * FROM categories";
        $info["categories"] = $instance->fetchAll($categories);

        $course_info = "SELECT courses.*, categories.category AS category FROM courses LEFT JOIN categories ON categories.category_id = courses.category_id WHERE courses.course_id = ?";
        $info["course_info"] = $instance->fetch($course_info, $bindParam);

        return $info;
    }

    public static function courseUpdate($title, $description, $content, $category_id, $course_id, $tags) {}

    public static function courseDetails($course_id) {}

    public static function getAllCourses($index, $search)
    {
        $info = [];
        $instance = Db::getInstance();
        $limit = 6;
        $offset = $limit * ($index - 1);
        $bindParams = [$search, $limit, $offset];

        $stmt = "SELECT courses.*, users.full_name 
                 FROM courses
                 JOIN users ON users.user_id = courses.author_id
                 WHERE (courses.course_title LIKE ? OR courses.course_title IS NULL)
                 ORDER BY created_at 
                 LIMIT ? OFFSET ?";
        $info["courses"] = $instance->fetchAll($stmt, $bindParams);

        $stmt = "SELECT COUNT(course_id) as total_courses 
                 FROM courses 
                 WHERE course_title LIKE ?";
        $bindParam = [$search];
        $total_course = $instance->fetch($stmt, $bindParam);
        $info["total_pages"] = ceil((int) $total_course["total_courses"] / $limit);

        return $info;
    }
}
