<?php
    require_once("..\Connection.php");

    if (isset($_POST['data']))
    {
        $q1 = $data['nama_obat'];
        $q2 = $data['harga_obat'];
        $q3 = $data['stock_obat'];
        $q4 = $data['deskripsi_obat'];
        $q5 = $data['image_obat'];
        if (/*!empty($_FILES['image']['name'])*/ $q5['image']['name'])
        {
            $fileName = /*$_FILES['image']['name']*/ $q5['image']['name'];
            $fileExt = explode('.', $fileName);
            $fileActExt = strtolower(end($fileExt));
            $allowImg = array('png','jpeg','jpg');
            $fileNew = rand() . "." . $fileActExt;
            $filePath = 'uploads/'.$fileNew;
            if (in_array($fileActExt, $allowImg)) {
                if ($_FILES['image']['size'] > 0  && $_FILES['image']['error']==0) {
                    $query = "INSERT INTO obat(nama_obat, harga_obat, stock_obat, deskripsi, image_name) VALUES ('$q1','$q2','$q3','$q4','$fileNew')";
                    if ($pdo->query($query))
                    {
                        move_uploaded_file($_FILES['image']['tmp_name'], $filePath);
                        //echo '<img src="'.$filePath.'" style="width:320px; height:300px;"/>';
                    }
                }
            }
        }
    }
?>

