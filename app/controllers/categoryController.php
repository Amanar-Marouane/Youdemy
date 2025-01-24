<?php

namespace app\controllers;

use app\models\Category;

class categoryController
{

    public function categoriesDashboardRendering()
    {
        if ($info = Category::categoriesDashboardRendering()) {
            extract($info);
            include __DIR__ . "/../views/dashboard/categoriesManagement.view.php";
        }
    }

    public function categoriesDeletion()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $category_id = $data['content'];
        Category::categoriesDeletion($category_id);
    }

    public function categoriesAdding()
    {
        $category = $_POST['category_name'];
        if (Category::categoriesAdding($category)) $_SESSION["success"] = "Category has been added succesfuly";
        else $_SESSION["error"] = "Category has not been added succesfuly or it's already exist";
        header("Location: /admin/categories");
    }
}
