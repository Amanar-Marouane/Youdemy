<?php
require_once __DIR__ . "/../models/Auth.php";

class authController
{

    public function create()
    {
        $password = $_POST['password'];
        $acc_type = $_POST["acc_type"];
        $status = "Activated";
        $profile_img = __DIR__ . "/../../public/assets/student.jfif";
        if ($acc_type === "Teacher") {
            $status = "Pending";
            $profile_img = __DIR__ . "/../../public/assets/teacher.jfif";
        }
        if (Auth::inscribe($_POST['fullname'], $_POST['email'], $acc_type, $password, $status, $profile_img)) {
            // error"something went wrong try again"
        }
        header("Location: /auth");
    }
}
