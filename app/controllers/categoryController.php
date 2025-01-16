<?php
require_once __DIR__ . "/../models/Category.php";

class categoryController
{

    public function categoriesDashboardRendering()
    {
        if ($info = Category::categoriesDashboardRendering()) {
            extract($info);
            include __DIR__ . "/../views/categoriesManagement.php";
        }
    }

    public function categoriesDeletion(){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $category_id = $data['content'];
        category::categoriesDeletion($category_id);
    }

    public function categoriesAdding(){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $category = $data['content'];
        category::categoriesAdding($category);
    }
}
