<?php
require_once __DIR__ . "/../../core/Db.php";

class Auth
{

    public static function inscribe($full_name, $eamil, $acc_type, $password, $status, $profile_img)
    {
        // ("INSERT INTO users (full_name, email, acc_type, password, status, profile_img) VALUES (?, ?, ?, ?, ?, ?);");
        // execute([$full_name, $eamil, $acc_type, $password, $status, $profile_img])
    }
}
