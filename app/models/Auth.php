<?php
require_once __DIR__ . "/../../core/Db.php";

class Auth
{

    public static function inscribe($full_name, $eamil, $acc_type, $password, $status, $profile_img)
    {
        $stmt = "INSERT INTO users (full_name, email, acc_type, password, acc_status, profile_img) VALUES (?, ?, ?, ?, ?, ?);";
        $bindParams = [$full_name, $eamil, $acc_type, $password, $status, $profile_img];
        $pdo = Db::getInstance();
        return $pdo->query($stmt, $bindParams);
    }
}
