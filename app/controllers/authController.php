<?php
require_once __DIR__ . "/../models/Auth.php";
require_once __DIR__ . "/../../core/Functions.php";

class authController
{

    public function register()
    {
        $fullname = fullnameValidation($_POST['fullname']);
        $password = passwordValidation($_POST['password']);
        $email = emailValidation($_POST['email']);
        $acc_type = $_POST["acc_type"];
        $status = "Activated";
        $profile_img = "\assets\student.png";
        if ($acc_type === "Teacher") {
            $status = "Pending";
            $profile_img = "\assets\\teacher.png";
        }
        if (Auth::inscribe($fullname, $email, $acc_type, $password, $status, $profile_img)) {
            // error"something went wrong try again"
        }
        header("Location: /auth");
    }

    public function login()
    {
        $password = passwordValidation($_POST['password']);
        $email = emailValidation($_POST['email']);
    }
}
