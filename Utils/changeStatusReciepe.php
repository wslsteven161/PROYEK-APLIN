<?php
    require_once("..\Connection.php");

    if (isset($_POST['id']))
    {
        $Q1 = $_POST['id'];
        $res = $pdo->query("UPDATE reciepes SET status=1 WHERE reciepes.id = $Q1");
        if ($res)
        {
            echo "ok";
        }
        else
        {
            echo "error";
        }
    }
?>