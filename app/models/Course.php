<?php
require_once __DIR__ . "/../../core/Db.php";

class Course
{

    public static function coursesDashboardRenderingT()
    {
        $info = [];
        $instance = Db::getInstance();

        $tags = "SELECT * FROM tags";
        $info["tags"] = $instance->fetchAll($tags);

        $categories = "SELECT * FROM categories";
        $info["categories"] = $instance->fetchAll($categories);

        $courses = "SELECT courses.course_id, courses.course_title, courses.course_desc, courses.course_type, courses.created_at, categories.category FROM courses JOIN categories ON categories.category_id = courses.category_id";
        $info["courses"] = $instance->fetchAll($courses);

        return $info;
    }

    public static function courseAdd($title, $descreption, $type, $url, $category, $tags, $author_id) {}

    public static function courseRemove($course_id)
    {
        $instance = Db::getInstance();

        $stmt = "DELETE FROM courses WHERE course_id = ?";
        $bindParam = [$course_id];

        return $instance->query($stmt, $bindParam);
    }

    public static function courseEdit($course_id)
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
}
