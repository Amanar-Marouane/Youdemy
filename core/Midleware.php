<?php
namespace core;

class Midleware
{

    public static function permissionChecker($uri, $acc_type)
    {
        if ($acc_type === "Admin" || $acc_type === "Teacher") return;
        $permissions = require_once __DIR__ . "/UserPermissions.php";
        if (!in_array($uri, $permissions[$acc_type])) {
            header("Location: /404");
        }
    }
}
