<?php
    require_once("..\Connection.php");

    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']))
    {
        $q1 = $_POST['username'];
        $q2 = $_POST['email'];
        $q3 = $_POST['password'];
        $res = false;
        if (empty($q3))
        {
            $res = $pdo->query("UPDATE users SET email='$q2' WHERE username='$q1'");
        }
        else
        {
            $newpass = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $res = $pdo->query("UPDATE users SET email='$q2',password='$newpass' WHERE username='$q1'");
        }
        return $res;
    }
?>