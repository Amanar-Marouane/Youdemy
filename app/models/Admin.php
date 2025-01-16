<?php
require_once __DIR__ . "/../../core/Db.php";
require_once __DIR__ . "/User.php";

class Admin extends User
{

    public static function adminDashboardRendering()
    {
        $info = [];
        $secret_key = "analikayn";

        $overwiew = "SELECT COUNT(course_id) AS total_courses, 
                    (SELECT COUNT(user_id) FROM users) AS total_users, 
                    (SELECT COUNT(user_id) FROM users WHERE acc_status = 'Pending') AS total_pending, 
                    (SELECT COUNT(user_id) FROM users WHERE acc_type = 'Teacher') AS total_teachers, 
                    (SELECT COUNT(user_id) FROM users WHERE acc_type = 'Student') AS total_students 
                    FROM courses;";
        $instance = Db::getInstance();
        $info["overview"] = $instance->fetch($overwiew);

        $pending_accounts = "SELECT user_id, full_name, email, created_at FROM users WHERE acc_status = 'Pending';";
        $info["pending_accounts"] = $instance->fetchAll($pending_accounts);

        $sespended_accounts = "SELECT user_id, full_name, email, acc_type, suspension_date FROM users WHERE acc_status = 'Suspended';";
        $info["sespended_accounts"] = $instance->fetchAll($sespended_accounts);

        $activated_accounts = "SELECT user_id, full_name, email, acc_type, created_at FROM users WHERE acc_status = 'Activated' AND acc_type != 'Admin';";
        $info["activated_accounts"] = $instance->fetchAll($activated_accounts);

        return $info;
    }

    public static function accountDeletion($user_id)
    {
        $stmt = "DELETE FROM users WHERE user_id = ?";
        $bindParam = [$user_id];
        $instance = Db::getInstance();
        return $instance->query($stmt, $bindParam);
    }

    public static function accountActivation($user_id)
    {
        $stmt = "UPDATE users set acc_status = 'Activated' WHERE user_id = ?";
        $bindParam = [$user_id];
        $instance = Db::getInstance();
        return $instance->query($stmt, $bindParam);
    }

    public static function accountSuspension($user_id)
    {
        $stmt = "UPDATE users set acc_status = 'Suspended' , suspension_date = CURRENT_TIMESTAMP WHERE user_id = ?";
        $bindParam = [$user_id];
        $instance = Db::getInstance();
        return $instance->query($stmt, $bindParam);
    }
}
