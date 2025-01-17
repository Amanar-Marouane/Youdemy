<?php
require_once __DIR__ . "/../../core/Db.php";
require_once __DIR__ . "/Course.php";

class CourseVideo extends Course
{

    public static function courseAdd($title, $descreption, $type, $url, $category_id, $tags, $author_id)
    {
        $instence = Db::getInstance();

        $stmt = "INSERT INTO courses(author_id, course_title, course_desc, course_type, course_content, category_id)
                    VALUES (?, ?, ?, ?, ?, ?)";
        $bindParams = [$author_id, $title, $descreption, $type, $url, $category_id];

        $instence->transaction();

        if ($instence->query($stmt, $bindParams)) {
            $course_id = $instence->lastInsertId();
            $stmt = "INSERT INTO course_tags(tag_id, course_id) VALUES (?, ?)";
            foreach ($tags as $tag) {
                $bindParams = [$tag, $course_id];
                if (!$instence->query($stmt, $bindParams)) {
                    $instence->rollback();
                    return false;
                }
            }
        } else {
            $instence->rollback();
            return false;
        }
        $instence->commit();
        return true;
    }
}
