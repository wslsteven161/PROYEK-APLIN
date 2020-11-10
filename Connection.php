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

    // EXAMPLES 
    /*

    // QUERY

        // SELECT
    $result = $pdo->query('SELECT name FROM users');
    while ($row = $result->fetch())
    {
        echo $row['name'] . "\n";
    }

       // UPDATE
    $sql = "UPDATE users SET name = ? WHERE id = ?";
    $pdo->prepare($sql)->execute([$name, $id]); 

        // DELETE
    $stmt = $pdo->prepare("DELETE FROM goods WHERE category = ?");
    $stmt->execute([$cat]);
    $deleted = $stmt->rowCount();

    // PREPARE
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? AND status=?');
    $stmt->execute([$email, $status]);
    $user = $stmt->fetch();
    // or
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email AND status=:status');
    $stmt->execute(['email' => $email, 'status' => $status]);
    $user = $stmt->fetch();

    // GETTING DATA
    $stmt = $pdo->query('SELECT name FROM users');
    foreach ($stmt as $row)
    {
        echo $row['name'] . "\n";
    }

        // FETCH ASSOC
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // FETCH CLASS
        $news = $pdo->query('SELECT * FROM news')->fetchAll(PDO::FETCH_CLASS, 'News');

        // getting number of rows in the table utilizing method chaining
        $count = $pdo->query("SELECT count(*) FROM table")->fetchColumn();

        // FETCH ALL
        $data = $pdo->query('SELECT id, name FROM users')->fetchAll(PDO::FETCH_KEY_PAIR);

        
    */
?>