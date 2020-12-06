<?php
    require_once("..\Connection.php");

    if (isset($_POST['user_id']))
    {
        $Q1 = $_POST['user_id'];
        $result = $pdo->query("SELECT * FROM reciepes,resepdetail WHERE reciepes.id = resepdetail.reciepes_id and reciepes.user_id = '$Q1'")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }
?>