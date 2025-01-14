<?php

class Db
{
    private $pdo;
    private static $instance = null;

    public function __construct()
    {
        $config = include __DIR__ . "/../app/config/Db.php";
        extract($config);
        $dsn = "mysql:host=$servername;dbname=$dbname";
        $this->pdo = new PDO($dsn, $username, $password, $options);
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function query($query, $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetchAll($query, $params = [])
    {
        return $this->query($query, $params)->fetchAll();
    }

    public function fetch($query, $params = [])
    {
        return $this->query($query, $params)->fetch();
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
}
