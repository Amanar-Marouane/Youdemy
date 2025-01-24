<?php

namespace app\models;

use core\Db;

class category
{

    public static function categoriesDashboardRendering()
    {
        $info = [];
        $instance = Db::getInstance();

        $overwiew = "SELECT COUNT(category_id) AS total_categories FROM categories;";
        $info["overview"] = $instance->fetch($overwiew);

        $categories = "SELECT category_id, category FROM categories";
        $info["categories"] = $instance->fetchAll($categories);

        return $info;
    }

    public static function categoriesDeletion($category_id)
    {

        $instance = Db::getInstance();

        $delete = "DELETE FROM categories WHERE category_id = ?;";
        $bindParam = [$category_id];
        return $instance->query($delete, $bindParam);
    }

    public static function categoriesAdding($category)
    {
        $instance = Db::getInstance();

        $check = "SELECT category FROM categories WHERE category = ?";
        $bindParam = [$category];
        $res = $instance->fetch($check, $bindParam);
        if (!$res) {
            $insert = "INSERT INTO categories (category) VALUES (?);";
            $bindParam = [$category];
            return $instance->query($insert, $bindParam);
        }
        return false;
    }
}
