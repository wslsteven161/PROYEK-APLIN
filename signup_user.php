<?php
    require_once("Connection.php");

    $status = False;

    if ( isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpassword']) )
    {
        $q1 = $_POST['username'];
        $q2 = $_POST['email'];
        $q3 = $_POST['password'];
        $q4 = $_POST['cpassword'];


        $res = $pdo->prepare("SELECT * FROM USERS WHERE email = :email");
        $res->execute(array(":email" => $q2));
        $count = $res->rowCount();

        // Check Email is already registered or not
        if ($count <= 0)
        {
            // Check confirm password
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
                    $status = "user_registered";
                }
            }
            else 
            {
                $status = "wrong_password";
            }
        }
        else
        {
            $status = "wrong_email";
        }
    }

    $data = array(
        "status" => $status
    );

    echo json_encode($data);
?>