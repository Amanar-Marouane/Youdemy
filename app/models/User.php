<?php

namespace app\models;

use core\Db;

class User
{

    public static function inscribe($full_name, $eamil, $acc_type, $password, $status, $profile_img)
    {
        $stmt = "INSERT INTO users (full_name, email, acc_type, password, acc_status, profile_img) VALUES (?, ?, ?, ?, ?, ?);";
        $bindParams = [$full_name, $eamil, $acc_type, $password, $status, $profile_img];
        $pdo = Db::getInstance();
        return $pdo->query($stmt, $bindParams);
    }

    public static function login($email, $password)
    {
        $stmt = "SELECT user_id, email, acc_type, acc_status, password FROM users WHERE email = ?";
        $bindParam = [$email];
        $pdo = Db::getInstance();
        if (!$row = $pdo->fetch($stmt, $bindParam)) {
            return false;
        }
        $hashedPassword = $row["password"];

        if (!password_verify($password, $hashedPassword)) {
            return false;
        }
        return $row;
    }

    public static function profileRendering($user_id)
    {
        $stmt = "SELECT user_id, email, full_name, acc_type, profile_img FROM users WHERE user_id = ?;";
        $bindParam = [$user_id];
        $instance = Db::getInstance();
        return $instance->fetch($stmt, $bindParam);
    }
}
