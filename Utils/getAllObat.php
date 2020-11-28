<?php
    require_once("..\Connection.php");

    $query = $pdo->query("SELECT * FROM obat")->fetchAll();
    echo json_encode($query);
?>