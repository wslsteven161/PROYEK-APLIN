<?php
    require_once("..\Connection.php");

    $query = $pdo->query("SELECT * FROM cabang")->fetchAll();
    echo json_encode($query);
?>