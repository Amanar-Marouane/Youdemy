<?php
require_once __DIR__ . "/../models/Auth.php";
require_once __DIR__ . "/../../core/Functions.php";

class authController
{

    public function register()
    {
        $fullname = fullnameValidation($_POST['fullname']);
        if(passwordValidation($_POST['password'])){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        $email = emailValidation($_POST['email']);
        $acc_type = $_POST["acc_type"];
        $status = "Activated";
        $profile_img = "\assets\student.png";
        if ($acc_type === "Teacher") {
            $status = "Pending";
            $profile_img = "\assets\\teacher.png";
        }
        if (!Auth::inscribe($fullname, $email, $acc_type, $password, $status, $profile_img)) {
            die("error something went wrong");
        }
        header("Location: /auth");
    }

    public function login()
    {
        $password = passwordValidation($_POST['password']);
        $email = emailValidation($_POST['email']);

        if (!$row = Auth::login($email, $password)) {
            die("Check your info");
        }
        extract($row);
        $_SESSION['user_id'] = $user_id;
        $_SESSION['acc_type'] = $acc_type;
        $_SESSION['acc_status'] = $acc_status;
        header("Location: /profile");
    }

    public function logout(){
        session_destroy();
        header("Location: /auth");
    }
}
