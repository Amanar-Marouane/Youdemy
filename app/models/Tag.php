<?php
require_once __DIR__ . "/../../core/Db.php";

class Tag
{

    public static function tagsDashboardRendering()
    {
        $info = [];
        $instance = Db::getInstance();

        $overwiew = "SELECT COUNT(tag_id) AS total_tags FROM tags;";
        $info["overview"] = $instance->fetch($overwiew);

        $categories = "SELECT tag_id, tag_content FROM tags";
        $info["tags"] = $instance->fetchAll($categories);

        return $info;
    }

    public static function tagDeletion($tag_id)
    {

        $instance = Db::getInstance();

        $delete = "DELETE FROM tags WHERE tag_id = ?;";
        $bindParam = [$tag_id];
        return $instance->query($delete, $bindParam);
    }

    public static function tagAdding($tags)
    {
        $instance = Db::getInstance();
        $tags = explode(", ", $tags);
        foreach ($tags as $tag) {
            $check = "SELECT tag_content FROM tags WHERE tag_content = ?";
            $bindParam = [$tag];
            $res = $instance->fetch($check, $bindParam);
            if (!$res) {
                $insert = "INSERT INTO tags (tag_content) VALUES (?);";
                $bindParam = [$tag];
                $instance->query($insert, $bindParam);
            }
        }
    }
}
