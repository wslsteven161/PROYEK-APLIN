<?php
    require_once("..\Connection.php");

    $res = $pdo->query("SELECT * FROM reciepes")->fetchAll();
    echo json_encode($res);
?>