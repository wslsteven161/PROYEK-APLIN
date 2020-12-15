<?php
    require_once("..\Connection.php");

    $query = $pdo->query("SELECT * FROM supplier")->fetchAll();
    echo json_encode($query);
?>