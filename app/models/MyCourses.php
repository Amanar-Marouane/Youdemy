<?php

class MyCourses
{

    public static function enroll($course_id, $user_id)
    {
        $instence = Db::getInstance();
        $bindParams = [$course_id, $user_id];

        $stmt = "INSERT INTO my_courses (course_id, user_id) VALUES (?, ?)";
        if (!$instence->query($stmt, $bindParams)) {
            return false;
        }
        return true;
    }

    public static function unenroll($course_id, $user_id)
    {
        $instence = Db::getInstance();
        $bindParams = [$course_id, $user_id];

        $stmt = "DELETE FROM my_courses WHERE course_id = ? AND user_id = ?";
        if (!$instence->query($stmt, $bindParams)) {
            return false;
        }
        return true;
    }
}
