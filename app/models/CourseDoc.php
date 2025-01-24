<?php

namespace app\models;

use core\Db;

class CourseDoc extends Course
{

    public static function courseAdd($title, $descreption, $url, $category_id, $tags)
    {
        $instence = Db::getInstance();
        $author_id = $_SESSION['user_id'];

        $stmt = "INSERT INTO courses(author_id, course_title, course_desc, course_type, course_content, category_id)
                    VALUES (?, ?, ?, 'Document', ?, ?)";
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
        if (!is_null($content)) {
            $stmt = "SELECT course_content FROM courses WHERE course_id = ?";
            $bindParam = [$course_id];
            $old_course = $instance->fetch($stmt, $bindParam);
            unlink($old_course['course_content']);
        }

        $updateMainInfo = "UPDATE courses
                            set course_title = ?, course_desc = ?, course_type = 'Document', course_content = CASE WHEN ? IS NULL THEN course_content ELSE ? END, category_id = ?
                            WHERE course_id = ?";
        $bindParams = [$title, $description, $content, $content, $category_id, $course_id];
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

    public static function courseDetails($course_id, $user_id)
    {
        $instance = Db::getInstance();
        $info = [];
        $bindParam = [$course_id];

        $stmt = "SELECT courses.*, categories.category, users.full_name FROM courses
                JOIN categories ON categories.category_id = courses.category_id
                JOIN users ON users.user_id = courses.author_id
                WHERE course_id = ?";
        $info["courseInfo"] = $instance->fetch($stmt, $bindParam);

        $stmt = "SELECT tags.* FROM course_tags
                JOIN tags ON tags.tag_id = course_tags.tag_id
                WHERE course_tags.course_id = ?";
        $info["tags"] = $instance->fetchAll($stmt, $bindParam);

        $isEnrolled = "SELECT * FROM my_courses WHERE user_id = ? AND course_id = ?";
        $bindParams = [$user_id, $course_id];
        $isEnrolled = $instance->fetch($isEnrolled, $bindParams);
        $info["isEnrolled"] = $isEnrolled;

        return $info;
    }
}
