<?php
    require_once("..\Connection.php");

    $query = $pdo->query("SELECT * FROM barang")->fetchAll();
    echo json_encode($query);
?>