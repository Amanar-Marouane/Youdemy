<?php
require_once __DIR__ . "/../models/Auth.php";

class authController
{

    public function create()
    {
        $acc_type = $_POST["acc_type"];
        $status = "Activated";
        $profile_img = __DIR__ . "/../../public/assets/student.jfif";
        if ($acc_type === "Teacher") {
            $status = "Pending";
            $profile_img = __DIR__ . "/../../public/assets/teacher.jfif";
        }
        Auth::inscribe($_POST['fullname'], $_POST['email'], $acc_type, $password, $status, $profile_img);
    }
}
