<?php
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../../core/Functions.php";

class userController {

    public function profileRendering(){
        if (!isset($_SESSION['user_id'])) {
            header("Location: /auth");
        }
        $user_id = $_SESSION['user_id'];
        $row = User::profileRendering($user_id);
        extract($row);
        include __DIR__ . "/../views/profile.view.php";
    }
}