<?php
    require_once("..\Connection.php");
    // if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = $pdo->query("SELECT * FROM barang where id=$id")->fetchall();
        echo json_encode($query);
    // }
?>