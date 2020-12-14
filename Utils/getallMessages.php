<?php
    require_once("..\Connection.php");

    if (isset($_POST['id']))
    {
        $Q1 = $_POST['id'];
        $res = $pdo->query("SELECT * FROM resepdetail where reciepes_id = $Q1")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($res);
    }
?>