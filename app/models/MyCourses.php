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

    public static function getAllCourses($user_id)
    {
        $info = [];
        $instence = Db::getInstance();
        $bindParam = [$user_id];

        $stmt = "SELECT courses.*, users.full_name
                 FROM my_courses
                 JOIN courses ON courses.course_id = my_courses.course_id
                 JOIN users ON users.user_id = courses.author_id
                 WHERE my_courses.user_id = ?";
        $info['courses'] = $instence->fetchAll($stmt, $bindParam);

        return $info;
    }
}
