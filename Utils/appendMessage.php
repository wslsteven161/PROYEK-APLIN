<?php
    require_once("..\Connection.php");

    if (isset($_POST['id']))
    {
        $Q1 = $_POST['id'];
        $Q2 = $_POST['message'];
        $res = $pdo->query("INSERT INTO resepdetail VALUES ('$Q1','$Q2')");
        if ($res)
        {
            echo "ok";    
        }
    }
?>