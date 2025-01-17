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

    public static function courseAdd($title, $descreption, $type, $url, $category, $tags, $author_id){

    }
}
