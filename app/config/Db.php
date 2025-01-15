<?php

return [
    'servername' => 'localhost',
    'username' => 'root',
    'password' => 'analikayn',
    'dbname' => 'youdemy',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]
];
