<?php
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/Admin.php";
require_once __DIR__ . "/../models/Teacher.php";

class userController
{

    public function register()
    {
        $fullname = fullnameValidation($_POST['fullname']);
        if (passwordValidation($_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        $email = emailValidation($_POST['email']);
        $acc_type = $_POST["acc_type"];
        $status = "Activated";
        $profile_img = "https://media1.giphy.com/media/xUNd9AWlNxNgnxiIxO/200.webp?cid=790b7611t1g2yq5q33qrlqd4nwu34ijz68j6lmyg3abln5da&ep=v1_gifs_search&rid=200.webp&ct=g";
        if ($acc_type === "Teacher") {
            $status = "Pending";
            $profile_img = "https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExdXRueHhlYnp3cmVkZWE3aGh6bnh3dWVxdzRtamMzMXgwenJkZmZ4byZlcD12MV9naWZzX3NlYXJjaCZjdD1n/vVKqa0NMZzFyE/200.webp";
        }
        if (!User::inscribe($fullname, $email, $acc_type, $password, $status, $profile_img)) {
            $_SESSION['error'] = "error something went wrong";
            header("Location: /auth");
        }
        header("Location: /auth");
    }

    public function login()
    {
        $password = passwordValidation($_POST['password']);
        $email = emailValidation($_POST['email']);

        if (!$row = User::login($email, $password)) {
            $_SESSION['error'] = "Check your info";
            header("Location: /auth");
        }
        extract($row);
        if ($_SESSION['acc_status'] === "Activated") {
            header("Location: /profile");
            $_SESSION['error'] = "";
            $_SESSION['user_id'] = $user_id;
            $_SESSION['acc_type'] = $acc_type;
            $_SESSION['acc_status'] = $acc_status;
            exit();
        }
        if ($_SESSION['acc_status'] === "Pending") $_SESSION['error'] = "Your accout still pending, wait until it got approved!";
        if ($_SESSION['acc_status'] === "Suspended") $_SESSION['error'] = "Your accout is suspend, Try contact the client servie or revise your self first!";
        header("Location: /auth");
    }

    public function logout()
    {
        session_destroy();
        header("Location: /auth");
    }

    public function profileRendering()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /auth");
        }
        $user_id = $_SESSION['user_id'];
        $row = User::profileRendering($user_id);
        extract($row);
        include __DIR__ . "/../views/profile.view.php";
    }

    public function accountsDashboardRendering()
    {
        if ($info = Admin::accountsDashboardRendering()) {
            extract($info);
            include __DIR__ . "/../views/accManagement.view.php";
        }
    }

    public function accountValidation()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $user_id = (int) $data['user_id'];
        $action = $data['action'];

        if ($action === "approve") Admin::accountActivation($user_id);
        else Admin::accountDeletion($user_id);
    }

    public function accountActivation()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $user_id = (int) $data['user_id'];
        $action = $data['action'];

        if ($action === "activate") Admin::accountActivation($user_id);
        else Admin::accountDeletion($user_id);
    }

    public function accountSuspension()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $user_id = (int) $data['user_id'];
        $action = $data['action'];

        if ($action === "suspend") Admin::accountSuspension($user_id);
        else Admin::accountDeletion($user_id);
    }
}
