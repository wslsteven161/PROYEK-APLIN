<?php
    require_once("..\Connection.php");

    if (isset($_POST['username']))
    {
        if ($_POST['type'] == 'disable')
        {
            $q1 = $_POST['username'];
            $pdo->query("UPDATE users SET is_disabled = '1' WHERE users.username = '$q1' ");
            // $res = $pdo->query("DELETE FROM users WHERE users.username = '$q1' ");
        }

        if ($_POST['type'] == 'enable')
        {
            $q1 = $_POST['username'];
            $pdo->query("UPDATE users SET is_disabled = '0' WHERE users.username = '$q1' ");
        }
    }
?>