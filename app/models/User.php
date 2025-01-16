<?php
require_once __DIR__ . "/../../core/Db.php";

class User{

    public static function profileRendering ($user_id){
        $stmt = "SELECT user_id, email, full_name, acc_type, profile_img FROM users WHERE user_id = ?;";
        $bindParam = [$user_id];
        $instance = Db::getInstance();
        return $instance->fetch($stmt, $bindParam);
    }
}