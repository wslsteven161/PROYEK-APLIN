<?php
    require_once("..\Connection.php");

    if (isset($_POST['id']))
    {
        $q1 = $_POST['id'];
        $res = $pdo->query("DELETE FROM barang WHERE id = $q1");
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