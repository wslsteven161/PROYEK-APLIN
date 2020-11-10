<?php
    session_start();

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "project";
    $charset = "utf8mb4";

    $dsn = "mysql:host=$hostname;dbname=$database;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try 
    {
        $pdo = new PDO($dsn, $username, $password, $options);
    }
    catch (PDOException $e) 
    {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
?>