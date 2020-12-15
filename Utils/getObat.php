<?php
    require_once("..\Connection.php");
    // if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = $pdo->query("SELECT * FROM obat where id='$id'")->fetchAll();
        echo json_encode($query);
    // }
?>