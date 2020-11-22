<?php
    require_once("Connection.php");

    $status = False;
    $dataUser;
    if ( isset($_POST['username']) && isset($_POST['password']) )
    {
        $q1 = $_POST['username'];
        $q2 = $_POST['password'];

        $res = $pdo->prepare("SELECT * FROM USERS WHERE username = :user or email = :email");
        $res->execute(array( ":user" => $q1, ":email" => $q1));
        $data = $res->fetchAll();

        foreach($data as $key => $val)
        {
            if ($val['is_disabled'] == 0)
            {
                if (password_verify($q2, $val['password']))
                {
                    $status = True;
                    $dataUser = $val;
                    break;
                }
            }
            else
            {
                $status = "disabled";
            }
        }
        if ($status)
        {
            setcookie("User_LoggedIn", $dataUser['username'], time() + (60*60*24) /* 24 jam */ );
        }
    }

    $data = array(
        "status" => $status
    );

    echo json_encode($data);
?>