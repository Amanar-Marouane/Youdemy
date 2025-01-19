<?php
require_once __DIR__ . "/../models/Tag.php";

class tagController
{

    public function tagsDashboardRendering()
    {
        if ($info = Tag::tagsDashboardRendering()) {
            extract($info);
            include __DIR__ . "/../views/tagsManagement.view.php";
        }
    }

    public function tagDeletion(){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $tag_id = $data['content'];
        Tag::tagDeletion($tag_id);
    }

    public function tagAdding(){
        $tags = $_POST['tag_content'];
        Tag::tagAdding($tags);
        $_SESSION['success'] = "Tag has been added successfuly (Prevent duplication : ON)";
        header("Location: /dashboard/tags");
    }
}
