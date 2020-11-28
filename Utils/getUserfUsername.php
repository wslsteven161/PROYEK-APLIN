<?php
    require_once("..\Connection.php");

    if (isset($_POST['username']))
    {
        $q1 = $_POST['username'];
        $res = $pdo->query("SELECT * FROM USERS WHERE username = '$q1'")->fetch(PDO::FETCH_ASSOC);
        echo json_encode($res);
    }
?>