<?php
    require_once("..\Connection.php");

    // $_FILES = $_POST['data'];

    if (isset($_FILES['fileup']))
    {
        $user_id = $_POST['user_id'];

        $target_dir = "../uploads/resep/";
        $uploadOk = 0;

        $file_name  = $_FILES['fileup']['name'];
        $file_size  = $_FILES['fileup']['size'];
        $file_tmp   = $_FILES['fileup']['tmp_name'];
        $file_type  = $_FILES['fileup']['type'];
        $tmp = explode('.', $file_name);
        $file_ext   = strtolower( end($tmp) ); /*strtolower( end( explode('.',$file_name ) ));*/
        $expensions= array("jpeg","jpg","png");
        if( in_array($file_ext,$expensions) === false )
        {
            echo "error";
            $uploadOk = 1;
        }
        if($file_size > 5120000){
            echo 'error2';
            $uploadOk = 1;
        }
        if($uploadOk == 0)
        {
            $date = new DateTime();
            //move_uploaded_file($file_tmp, $target_dir . basename($file_name));
            $filedone = $user_id . "_" . $date->getTimestamp() . "." . $file_ext;
            move_uploaded_file($file_tmp, $target_dir . $filedone);
            $pdo->query("INSERT INTO reciepes(user_id, picture) VALUES ('$user_id','$filedone')");
            //$id_history = $pdo->lastInsertId();
            //$pdo->query("INSERT INTO resepdetail(reciepes_id) VALUES('$id_history')");
            echo "success";
        }
    }
    else
    {
        echo "bye";
    }
?>