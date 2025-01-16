<?php
require_once __DIR__ . "/../../core/Db.php";
require_once __DIR__ . "/User.php";

class Admin extends User
{

    public static function adminDashboardRendering()
    {
        $info = [];

        $overwiew = "SELECT COUNT(course_id) AS total_courses, 
                    (SELECT COUNT(user_id) FROM users) AS total_users, 
                    (SELECT COUNT(user_id) FROM users WHERE acc_status = 'Pending') AS total_pending, 
                    (SELECT COUNT(user_id) FROM users WHERE acc_type = 'Teacher') AS total_teachers, 
                    (SELECT COUNT(user_id) FROM users WHERE acc_type = 'Student') AS total_students 
                    FROM courses;";
        $instance = Db::getInstance();
        $info["overview"] = $instance->fetch($overwiew);

        $pending_accounts = "SELECT full_name, email, created_at FROM users WHERE acc_status = 'Pending';";
        $info["pending_accounts"] = $instance->fetchAll($pending_accounts);

        $sespended_accounts = "SELECT full_name, email, acc_type, suspension_date FROM users WHERE acc_status = 'Suspended';";
        $info["sespended_accounts"] = $instance->fetchAll($sespended_accounts);

        return $info;
    }
}
