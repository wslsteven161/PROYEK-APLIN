<?php
    require_once("Connection.php");

    $status = False;

    if ( isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpassword']) )
    {
        $q1 = $_POST['username'];
        $q2 = $_POST['email'];
        $q3 = $_POST['password'];
        $q4 = $_POST['cpassword'];

        if ($q3 == $q4)
        {
            $state = $pdo->prepare("INSERT INTO users(email, username, password) VALUES (:email,:user,:pass)");
            try
            {
                $insert = $state->execute(array(':email' => $q2, ':user' => $q1, ':pass' => password_hash($q3, PASSWORD_BCRYPT)));
                if ($insert)
                {
                    $status = True;
                }
            }
            catch(PDOException $e) {

            }
        }
    }

    $data = array(
        "status" => $status
    );

    echo json_encode($data);
?>