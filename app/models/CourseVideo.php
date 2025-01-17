<?php
require_once __DIR__ . "/../../core/Db.php";
require_once __DIR__ . "/Course.php";

class CourseVideo extends Course
{

    public static function courseAdd($title, $descreption, $url, $category_id, $tags)
    {
        $instence = Db::getInstance();
        $author_id = $_SESSION['user_id'];

        $stmt = "INSERT INTO courses(author_id, course_title, course_desc, course_type, course_content, category_id)
                    VALUES (?, ?, ?, 'Video', ?, ?)";
        $bindParams = [$author_id, $title, $descreption, $url, $category_id];

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

    public static function courseUpdate($title, $description, $content, $category_id, $course_id, $tags)
    {
        $instance = Db::getInstance();
        $instance->transaction();

        $updateMainInfo = "UPDATE courses
                            set course_title = ?, course_desc = ?, course_type = 'Video', course_content = ?, category_id = ?
                            WHERE course_id = ?";
        $bindParams = [$title, $description, $content, $category_id, $course_id];
        if (! $instance->query($updateMainInfo, $bindParams)) {
            $instance->rollback();
            return false;
        }

        $removeOldTags = "DELETE FROM course_tags WHERE course_id = ?";
        $bindParam = [$course_id];
        if (! $instance->query($removeOldTags, $bindParam)) {
            $instance->rollback();
            return false;
        }

        foreach ($tags as $tag) {
            $insertNewTags = "INSERT INTO course_tags (course_id, tag_id) VALUES (?, ?)";
            $bindParams = [$course_id, $tag];
            if (! $instance->query($insertNewTags, $bindParams)) {
                $instance->rollback();
                return false;
            }
        }

        $instance->commit();
        return true;
    }
}
