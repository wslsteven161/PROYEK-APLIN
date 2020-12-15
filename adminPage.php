<?php 
    require_once("Connection.php");

    if (!isset($_COOKIE['admin']))
    {
        header("Location: index.php");
    }

    if (isset($_POST['btnSubmit']))
    {
        $Q1 = $_POST['nama_obat'];
        $Q2 = $_POST['harga_obat'];
        $Q3 = $_POST['stock_obat'];
        $Q4 = $_POST['deskripsi_obat'];
        //$Q5 = $_POST['image_obat'];

        if (isset($_FILES['image_obat']))
        {
            $target_dir = "uploads/obat/";
            $uploadOk = 0;

            $file_name  = $_FILES['image_obat']['name'];
            $file_size  = $_FILES['image_obat']['size'];
            $file_tmp   = $_FILES['image_obat']['tmp_name'];
            $file_type  = $_FILES['image_obat']['type'];
            $tmp = explode('.', $file_name);
            $file_ext   = strtolower( end($tmp) ); /*strtolower( end( explode('.',$file_name ) ));*/
            $expensions= array("jpeg","jpg","png");
            if( in_array($file_ext,$expensions) === false )
            {
                echo "<script>swal('ERROR','Only Upload (jpg, png, jpeg)','error');</script>";
                $uploadOk = 1;
            }
            if($file_size > 5120000){
                echo 'File size must be less than 5 MB';
                $uploadOk = 1;
            }
            if($uploadOk == 0)
            {
                //move_uploaded_file($file_tmp, $target_dir . basename($file_name));
                $filedone = $Q1 . "" . "." . $file_ext;
                move_uploaded_file($file_tmp, $target_dir . $filedone);
                $pdo->query("INSERT INTO obat(nama_obat, harga_obat, stock_obat, deskripsi, image_name) VALUES ('$Q1','$Q2','$Q3','$Q4','$filedone')");
            }
        }
    }   

    if (isset($_POST['btnSubmitCabang']))
    {
        $Q1 = $_POST['nama_barang'];
        $Q2 = $_POST['nama_jalan'];
        $Q3 = $_POST['nomor_telepon'];

        if (isset($_FILES['image_cabang']))
        {
            $target_dir = "uploads/cabang/";
            $uploadOk = 0;

            $file_name  = $_FILES['image_cabang']['name'];
            $file_size  = $_FILES['image_cabang']['size'];
            $file_tmp   = $_FILES['image_cabang']['tmp_name'];
            $file_type  = $_FILES['image_cabang']['type'];
            $tmp = explode('.', $file_name);
            $file_ext   = strtolower( end($tmp) ); /*strtolower( end( explode('.',$file_name ) ));*/
            $expensions= array("jpeg","jpg","png");
            if( in_array($file_ext,$expensions) === false )
            {
                echo "<script>swal('ERROR','Only Upload (jpg, png, jpeg)','error');</script>";
                $uploadOk = 1;
            }
            if($file_size > 5120000){
                echo 'File size must be less than 5 MB';
                $uploadOk = 1;
            }
            if($uploadOk == 0)
            {
                //move_uploaded_file($file_tmp, $target_dir . basename($file_name));
                $filedone = $Q1 . "" . "." . $file_ext;
                move_uploaded_file($file_tmp, $target_dir . $filedone);
                $pdo->query("INSERT INTO cabang(nama, jalan, nomortelpon, foto) VALUES ('$Q1','$Q2','$Q3','$filedone')");
            }
        }
    }   
    if (isset($_POST['btnSubmitBarang']))
    {
        $Q1 = $_POST['nama_barang'];
        $Q2 = $_POST['harga_barang'];
        $Q3 = $_POST['stock_barang'];
        $Q4 = $_POST['deskripsi_barang'];

        if (isset($_FILES['image_barang']))
        {
            $target_dir = "uploads/barang/";
            $uploadOk = 0;

            $file_name  = $_FILES['image_barang']['name'];
            $file_size  = $_FILES['image_barang']['size'];
            $file_tmp   = $_FILES['image_barang']['tmp_name'];
            $file_type  = $_FILES['image_barang']['type'];
            $tmp = explode('.', $file_name);
            $file_ext   = strtolower( end($tmp) ); /*strtolower( end( explode('.',$file_name ) ));*/
            $expensions= array("jpeg","jpg","png");
            if( in_array($file_ext,$expensions) === false )
            {
                echo "<script>swal('ERROR','Only Upload (jpg, png, jpeg)','error');</script>";
                $uploadOk = 1;
            }
            if($file_size > 5120000){
                echo 'File size must be less than 5 MB';
                $uploadOk = 1;
            }
            if($uploadOk == 0)
            {
                //move_uploaded_file($file_tmp, $target_dir . basename($file_name));
                $filedone = $Q1 . "" . "." . $file_ext;
                move_uploaded_file($file_tmp, $target_dir . $filedone);
                $pdo->query("INSERT INTO barang(nama, stok, harga, foto, deskripsi) VALUES ('$Q1','$Q3','$Q2','$filedone','$Q4')");
            }
        }
    }   
    if (isset($_POST['btnSubmitSupplier']))
    {
        $Q1 = $_POST['nama_supplier'];
        $Q2 = $_POST['alamat'];
        $Q3 = $_POST['telepon'];
        $pdo->query("INSERT INTO supplier(nama, nomortelepon, alamat) VALUES ('$Q1','$Q3','$Q2')");
    }   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <!-- JQUERY -->
    <script src="js/jquery-3.5.1.min.js"></script>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/all.min.css">
    <script src="js/all.min.js"></script>

    <!-- STYLE -->
    <link rel="stylesheet" href="css/style.css">

    <!-- LITTLE <3 ICON -->
    <link href="images/favicon.ico" rel="icon" type="image/x-icon" />

    <!-- SWEET ALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        .adm-front{
            margin: 100px auto;
            text-align: center;
            justify-content: center;
            color: #EF8354;
        }
        body {
            background: #2D3142;
            font-family: 'Raleway', sans-serif;
        }
        .flex-container{
            width: 100%;
            margin: 0 auto;
            padding: 50px 0 150px 0;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
        }
        .button {
            display: inline-flex;
            height: 40px;
            width: 150px;
            border: 2px solid #BFC0C0;
            margin: 20px 20px 20px 20px;
            color: #BFC0C0;
            text-transform: uppercase;
            text-decoration: none;
            font-size: .8em;
            letter-spacing: 1.5px;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        a {
            color: #BFC0C0;
            text-decoration: none;
            letter-spacing: 1px;
        }
        #button-2 {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        #button-2 a {
            position: relative;
            transition: all .35s ease-Out;
        }
        #slide {
            width: 100%;
            height: 100%;
            left: -200px;
            background: #BFC0C0;
            position: absolute;
            transition: all .35s ease-Out;
            bottom: 0;
        }
        #button-2:hover #slide {
            left: 0;    
        }

        #button-2:hover a {
            color: #2D3142;
        }
        /* Third Button */

        #button-3 {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        #button-3 a {
            position: relative;
            transition: all .45s ease-Out;
        }

        #circle {
            width: 0%;
            height: 0%;
            opacity: 0;
            line-height: 40px;
            border-radius: 50%;
            background: #BFC0C0;
            position: absolute;
            transition: all .5s ease-Out;
            top: 20px;
            left: 70px;
        }

        #button-3:hover #circle {
            width: 200%;
            height: 500%;
            opacity: 1;
            top: -70px;
            left: -70px;
        }

        #button-3:hover a {
            color: #2D3142;
        }


        /* Fourth Button */

        #button-4 {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        #button-4 a {
            position: relative;
            transition: all .45s ease-Out;
        }

        #underline {
            width: 100%;
            height: 2.5px;
            margin-top: 15px;
            align-self: flex-end;
            left: -200px;
            background: #BFC0C0;
            position: absolute;
            transition: all .3s ease-Out;
            bottom: 0;
        }

            #button-4:hover #underline {
            left: 0;
        }


        /* Fifth Button */

        #button-5 {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        #button-5 a {
            position: relative;
            transition: all .45s ease-Out;
        }

        #translate {
            transform: rotate(50deg);
            width: 100%;
            height: 250%;
            left: -200px;
            top: -30px;
            background: #BFC0C0;
            position: absolute;
            transition: all .3s ease-Out;
        }

        #button-5:hover #translate {
            left: 0;
        }

        #button-5:hover a {
            color: #2D3142;
        }


        /* Sixth Button */

        #button-6 {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        #button-6 a {
            position: relative;
            transition: all .45s ease-Out;
        }

        #spin {
            width: 0;
            height: 0;
            opacity: 0;
            left: 70px;
            top: 20px;
            transform: rotate(0deg);
            background: none;
            position: absolute;
            transition: all .5s ease-Out;
        }

        #button-6:hover #spin {
            width: 200%;
            height: 500%;
            opacity: 1;
            left: -70px;
            top: -70px;
            background: #BFC0C0;
            transform: rotate(80deg);
        }

        #button-6:hover a {
            color: #2D3142;
        }


        /* Seventh Button */

        #button-7 {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        #button-7 a {
            position: relative;
            left: 0;
            transition: all .35s ease-Out;
        }

        #dub-arrow {
            width: 100%;
            height: 100%;
            background: #BFC0C0;
            left: -200px;
            position: absolute;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .35s ease-Out;
            bottom: 0;
        }

        #button-7 img {
            width: 20px;
            height: auto;
        }

        #button-7:hover #dub-arrow {
            left: 0;
        }

        #button-7:hover a {
            left: 150px;
        }

        /* button delapan */

        #button-8 {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        #button-8 a {
            position: relative;
            left: 0;
            transition: all .35s ease-Out;
        }

        #dub-arrow {
            width: 100%;
            height: 100%;
            background: #BFC0C0;
            left: -200px;
            position: absolute;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .35s ease-Out;
            bottom: 0;
        }

        #button-8 img {
            width: 20px;
            height: auto;
        }

        #button-8:hover #dub-arrow {
            left: 0;
        }

        #button-8:hover a {
            left: 150px;
        }

        /* button sembilan */

        #button-9 {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        #button-9 a {
            position: relative;
            left: 0;
            transition: all .35s ease-Out;
        }

        #dub-arrow {
            width: 100%;
            height: 100%;
            background: #BFC0C0;
            left: -200px;
            position: absolute;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .35s ease-Out;
            bottom: 0;
        }

        #button-9 img {
            width: 20px;
            height: auto;
        }

        #button-9:hover #dub-arrow {
            left: 0;
        }

        #button-9:hover a {
            left: 150px;
        }

        .insertFormObat{
            background-color: white;
        }
    </style>
</head>
<body>
    <header class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center">
            <div class="logo mr-auto">
                <h1>APOTEK</h1>
                <!--a href="#"><img src="" alt="" class="img-fluid"></a-->
            </div>

            <!-- <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="adminPageProfile.php">Profile</a></li>
                </ul>
            </nav> -->
        </div>
    </header>

    <div class="FRONT-PAGE adm-front">
        <h1>Welcome, Admin!</h1>
    </div>

    <div class="container flex-container">
        
        <!-- <a class="button" id="button-1"  href="#">Let's Go!</a>
        <div class="button" id="button-2">
            <div id="slide"></div>
            <a href="#">Let's Go!</a>
        </div>

        <div class="button" id="button-3">
            <div id="circle"></div>
            <a href="#">Let's Go!</a>
        </div> -->

        <div class="button" id="button-4">
            <div id="underline"></div>
            <a href="javascript:void(0)">Lihat List User</a>
        </div>

        <div class="button" id="button-5">
            <div id="translate"></div>
            <a href="javascript:void(0)">Tambah/Edit Obat</a>
        </div>

        <div class="button" id="button-7">
            <div id="translate"></div>
            <a href="javascript:void(0)">Cabang</a>
        </div>

        <div class="button" id="button-6">
            <div id="spin"></div>
            <a href="adminResep.php">Lihat Resep</a>
        </div>

        <div class="button" id="button-8">
            <div id="translate"></div>
            <a href="javascript:void(0)">Tambah/Edit Barang</a>
        </div>

        <div class="button" id="button-9">
            <div id="translate"></div>
            <a href="javascript:void(0)">Supplier</a>
        </div>

        <!-- <div class="button" id="button-7"> -->
        <div class="button" id="button-5">
            <!-- <div id="dub-arrow"><img src="#" alt="" /></div> -->
            <div id="translate"></div>
            <a href="admin.php?logout=1">LogOut</a>
        </div>

    </div>

    <div class="container flex-container">
        <table class="table table-dark table-bordered table-hover" style="display:none;" id="tableUser"> 
            <caption>List of users</caption>
            <thead>
                <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="user-table">

            </tbody>
        </table>

        <div style="width:1000px;display:none;" id="FormObat">
            <label style="color:white;">Form Obat</label>
            <div class="container insertFormObat">
                <form id="form-obat" method="POST" action="adminPage.php?Obat=1" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control" placeholder="ex. Bodreksin">
                    </div>
                    <div class="form-group">
                        <label>Harga Obat</label>
                        <input type="number" name="harga_obat" class="form-control" placeholder="Rp. ">
                    </div>
                    <div class="form-group">
                        <label>Stock Obat</label>
                        <input type="number" name="stock_obat" class="form-control" placeholder="ex. 7">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Obat</label>
                        <textarea name="deskripsi_obat" class="form-control" rows="3" placeholder="ex. Obat Batuk"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Input foto obat</label>
                        <input type="file" name="image_obat" class="form-control-file" id="image_obat">
                    </div>
                    <!-- <div class="form-group">
                        <img width="100" style="border:#000; z-index:1;position: relative; border-width:2px; float:left" height="100px" src="" id="thumbnail"/>
                    </div> -->
                    <button type="submit" class="btn btn-success" style="float:right;margin-bottom:20px;" name="btnSubmit">Submit</button>
                </form>
            </div>

            <h1 style="color:gray;">List Obat</h1>
            <table class="table table-dark table-bordered table-hover">
                <caption>List of obat</caption>
                <thead>
                    <tr>
                        <th>Nama Obat</th>
                        <th>Stock</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="obat-table">

                    <!-- <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                    </tr> -->

                </tbody>
            </table>
        </div>

        <div style="width:1000px;display:none;" id="FormCabang">
            <label style="color:white;">Form Cabang</label>
            <div class="container insertFormObat">
                <form id="form-cabang" method="POST" action="adminPage.php?Cabang=1" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Cabang</label>
                        <input type="text" name="nama_cabang" class="form-control" placeholder="Nama Cabang">
                    </div>
                    <div class="form-group">
                        <label>Nama Jalan</label>
                        <input type="text" name="nama_jalan" class="form-control" placeholder="Jl. ">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="number" name="nomor_telepon" class="form-control" placeholder="0123456789">
                    </div>
                    <div class="form-group">
                        <label>Input Foto Cabang</label>
                        <input type="file" name="image_cabang" class="form-control-file" id="image_cabang">
                    </div>
                    <!-- <div class="form-group">
                        <img width="100" style="border:#000; z-index:1;position: relative; border-width:2px; float:left" height="100px" src="" id="thumbnail"/>
                    </div> -->
                    <button type="submit" class="btn btn-success" style="float:right;margin-bottom:20px;" name="btnSubmitCabang">Submit</button>
                </form>
            </div>

            <h1 style="color:gray;">List Cabang</h1>
            <table class="table table-dark table-bordered table-hover">
                <caption>List of Cabang</caption>
                <thead>
                    <tr>
                        <th>Nama Cabang</th>
                        <th>Jalan</th>
                        <th>Nomor Telepon</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="cabang-table">

                    <!-- <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                    </tr> -->

                </tbody>
            </table>
        </div>
        <div style="width:1000px;display:none;" id="FormBarang">
            <label style="color:white;">Form Barang</label>
            <div class="container insertFormObat">
                <form id="form-barang" method="POST" action="adminPage.php?Barang=1" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" placeholder="ex. Bodreksin">
                    </div>
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <input type="number" name="harga_barang" class="form-control" placeholder="Rp. ">
                    </div>
                    <div class="form-group">
                        <label>Stock Barang</label>
                        <input type="number" name="stock_barang" class="form-control" placeholder="ex. 7">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Barang</label>
                        <textarea name="deskripsi_Barang" class="form-control" rows="3" placeholder="ex. Obat Batuk"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Input foto barang</label>
                        <input type="file" name="image_barang" class="form-control-file" id="image_barang">
                    </div>
                    <!-- <div class="form-group">
                        <img width="100" style="border:#000; z-index:1;position: relative; border-width:2px; float:left" height="100px" src="" id="thumbnail"/>
                    </div> -->
                    <button type="submit" class="btn btn-success" style="float:right;margin-bottom:20px;" name="btnSubmitBarang">Submit</button>
                </form>
            </div>
            <h1 style="color:gray;">List Barang</h1>
            <table class="table table-dark table-bordered table-hover">
                <caption>List of barang</caption>
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Stock</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="barang-table">

                    <!-- <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                    </tr> -->

                </tbody>
            </table>
        </div>
        <div style="width:1000px;display:none;" id="FormSupplier">
            <label style="color:white;">Form Supplier</label>
            <div class="container insertFormObat">
                <form id="form-cabang" method="POST" action="adminPage.php?Cabang=1" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" name="nama_supplier" class="form-control" placeholder="Nama Supplier">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Jl. ">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="number" name="telepon" class="form-control" placeholder="0123456789">
                    </div>
                    <!-- <div class="form-group">
                        <img width="100" style="border:#000; z-index:1;position: relative; border-width:2px; float:left" height="100px" src="" id="thumbnail"/>
                    </div> -->
                    <button type="submit" class="btn btn-success" style="float:right;margin-bottom:20px;" name="btnSubmitSupplier">Submit</button>
                </form>
            </div>

            <h1 style="color:gray;">List Supplier</h1>
            <table class="table table-dark table-bordered table-hover">
                <caption>List of Supplier</caption>
                <thead>
                    <tr>
                        <th>Nama Cabang</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="supplier-table">

                    <!-- <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                    </tr> -->

                </tbody>
            </table>
        </div>
    </div>

</body>
<script>
    function deleteObat(id)
    {
        swal({
                title: "Apakah anda yakin?",
                text: "Tidak bisa di revert back!",
                icon: "warning",
                buttons: ['No','Yes'],
                dangerMode: true,
            }).then(function(isYes){
                if (isYes)
                {
                    $.ajax({
                        url: "Utils/deleteObat.php",
                        data: {"id" : id},
                        type: "POST",
                        success: function(data, status){
                            //console.log(data);
                            if (data == "ok"){
                                swal("Success","Success delete Obat !", "success");
                            }
                            else{
                                swal("Error","Something wrong !", "error");
                            }
                            DisplayAllObat();
                        }
                    });
                }
            });
    }
    function deleteCabang(id)
    {
        swal({
                title: "Apakah anda yakin?",
                text: "Tidak bisa di revert back!",
                icon: "warning",
                buttons: ['No','Yes'],
                dangerMode: true,
            }).then(function(isYes){
                if (isYes)
                {
                    $.ajax({
                        url: "Utils/deleteCabang.php",
                        data: {"id" : id},
                        type: "POST",
                        success: function(data, status){
                            //console.log(data);
                            if (data == "ok"){
                                swal("Success","Success delete Cabang!", "success");
                            }
                            else{
                                swal("Error","Something wrong!", "error");
                            }
                            DisplayAllCabang();
                        }
                    });
                }
            });
    }
    function deleteBarang(id)
    {
        swal({
                title: "Apakah anda yakin?",
                text: "Tidak bisa di revert back!",
                icon: "warning",
                buttons: ['No','Yes'],
                dangerMode: true,
            }).then(function(isYes){
                if (isYes)
                {
                    $.ajax({
                        url: "Utils/deleteBarang.php",
                        data: {"id" : id},
                        type: "POST",
                        success: function(data, status){
                            //console.log(data);
                            if (data == "ok"){
                                swal("Success","Success delete Cabang!", "success");
                            }
                            else{
                                swal("Error","Something wrong!", "error");
                            }
                            DisplayAllBarang();
                        }
                    });
                }
            });
    }
    function deleteSupplier(id)
    {
        swal({
                title: "Apakah anda yakin?",
                text: "Tidak bisa di revert back!",
                icon: "warning",
                buttons: ['No','Yes'],
                dangerMode: true,
            }).then(function(isYes){
                if (isYes)
                {
                    $.ajax({
                        url: "Utils/deleteSupplier.php",
                        data: {"id" : id},
                        type: "POST",
                        success: function(data, status){
                            //console.log(data);
                            if (data == "ok"){
                                swal("Success","Success delete Cabang!", "success");
                            }
                            else{
                                swal("Error","Something wrong!", "error");
                            }
                            DisplayAllSupplier();
                        }
                    });
                }
            });
    }
    function DisplayAllObat()
    {
        $.ajax({
            url: "Utils/getAllObat.php",
            data: {},
            type: "POST",
            success: function(data, status){
                //console.log(data);
                let obats = JSON.parse(data);

                $("#obat-table").empty();
                obats.forEach(element => {
                    $("#obat-table").append(`
                    <tr>
                        <td>${element['nama_obat']}</td>
                        <td>${element['stock_obat']}</td>
                        <td>Rp. ${element['harga_obat']},-</td>
                        <td>${element['deskripsi']}</td>
                        <td><img src="uploads/obat/${element['image_name']}" alt="IMG" width="100" height="100"></td>
                        <td><button type="button" class="btn btn-danger btn-rounded" onClick="deleteObat('${element['id']}')">Delete</button></td>
                    </tr>
                    `); 
                });

            }
        });
    }
    function DisplayAllCabang()
    {
        $.ajax({
            url: "Utils/getAllCabang.php",
            data: {},
            type: "POST",
            success: function(data, status){
                //console.log(data);
                let obats = JSON.parse(data);
                $("#cabang-table").empty();
                obats.forEach(element => {
                    $("#cabang-table").append(`
                    <tr>
                        <td>${element['nama']}</td>
                        <td>${element['jalan']}</td>
                        <td>${element['nomortelpon']}</td>
                        <td><img src="uploads/cabang/${element['foto']}" alt="IMG" width="100" height="100"></td>
                        <td><button type="button" class="btn btn-danger btn-rounded" onClick="deleteCabang('${element['id']}')">Delete</button></td>
                    </tr>
                    `); 
                });

            }
        });
    }
    function DisplayAllUsers()
    {
        $.ajax({
            url: "Utils/getAllUsers.php",
            data: {},
            type: "POST",
            success: function(result){

                // METHOD 1
                // $("#user-table").html('');
                // userdata = JSON.parse(result);
                // $.each(userdata, function(key, val){
                //     $("#user-table").append(`
                //         <tr>
                //             <th scope="row">${key + 1}</th>
                //             <td>${val['username']}</td>
                //             <td>${val['email']}</td>
                //             <td><button type="button" class="btn btn-danger">Disable Account</button></td>
                //         </tr>
                //     `);
                // });

                // METHOD 2
                $("#user-table").html(result);
            },
            error: function(){

            }
        });
    }
    function DisplayAllBarang()
    {
        $.ajax({
            url: "Utils/getAllBarang.php",
            data: {},
            type: "POST",
            success: function(data, status){
                //console.log(data);
                let obats = JSON.parse(data);

                $("#barang-table").empty();
                obats.forEach(element => {
                    $("#barang-table").append(`
                    <tr>
                        <td>${element['nama']}</td>
                        <td>${element['stok']}</td>
                        <td>Rp. ${element['harga']},-</td>
                        <td>${element['deskripsi']}</td>
                        <td><img src="uploads/obat/${element['image_name']}" alt="IMG" width="100" height="100"></td>
                        <td><button type="button" class="btn btn-danger btn-rounded" onClick="deleteBarang('${element['id']}')">Delete</button></td>
                    </tr>
                    `); 
                });

            }
        });
    }
    function DisplayAllSupplier()
    {
        $.ajax({
            url: "Utils/getAllSupplier.php",
            data: {},
            type: "POST",
            success: function(data, status){
                //console.log(data);
                let obats = JSON.parse(data);
                $("#supplier-table").empty();
                obats.forEach(element => {
                    $("#supplier-table").append(`
                    <tr>
                        <td>${element['nama']}</td>
                        <td>${element['alamat']}</td>
                        <td>${element['nomortelepon']}</td>
                        <td><button type="button" class="btn btn-danger btn-rounded" onClick="deleteSupplier('${element['id']}')">Delete</button></td>
                    </tr>
                    `); 
                });

            }
        });
    }
    function Hidetable()
    {
        $("#tableUser").hide(500);
    }
    function Showtable()
    {
        $("#tableUser").show(500);
    }
    function DisableAccount(data)
    {
        $.ajax({
            url: "Utils/alterUser.php",
            data: {"username" : data , "type" : "disable"},
            method: "POST",
            type: 'POST',
            success: function(){
                swal("Success!", "User disabled successfully!", "success");
            },
            error: function(){
                swal("Error!", "Error executing function!", "error");
            }
        });
        DisplayAllUsers();
    }
    function EnableAccount(data)
    {
        $.ajax({
            url: "Utils/alterUser.php",
            data: {"username" : data , "type" : "enable"},
            method: "POST",
            type: 'POST',
            success: function(){
                swal("Success!", "User enabled successfully!", "success");
            },
            error: function(){
                swal("Error!", "Error executing function!", "error");
            }
        });
        DisplayAllUsers();
    }

    function HideFromObat()
    {
        $("#FormObat").hide(500);
    }
    function ShowFromObat()
    {
        $("#FormObat").show(500);
        DisplayAllObat();
    }

    function HideFromCabang()
    {
        $("#FormCabang").hide(500);
    }
    function ShowFromCabang()
    {
        $("#FormCabang").show(500);
        DisplayAllCabang();
    }

    function HideFromBarang()
    {
        $("#FormBarang").hide(500);
    }
    function ShowFromBarang()
    {
        $("#FormBarang").show(500);
        DisplayAllBarang();
    }
    function HideFromSupplier()
    {
        $("#FormSupplier").hide(500);
    }
    function ShowFromSupplier()
    {
        $("#FormSupplier").show(500);
        DisplayAllSupplier();
    }
    // JAVASCRIPT START HERE
    var listUser = false;
    $("#button-4").click(function(){
        listUser = !listUser;
        if (listUser)
        {
            Showtable();
            DisplayAllUsers();

            formObat = false;
            HideFromObat();
        }
        else
        {
            Hidetable();
        }
    });

    var formObat = false;
    $("#button-5").click(function(){
        formObat = !formObat;
        if (formObat)
        {
            ShowFromObat();

            listUser = false;
            Hidetable();
        }
        else
        {
            HideFromObat();
        }
    });

    var formCabang = false;
    $("#button-7").click(function(){
        formCabang = !formCabang;
        if (formCabang)
        {
            ShowFromCabang();

            listUser = false;
            formObat = false;
            Hidetable();
            HideFromObat();
        }
        else
        {
            HideFromCabang();
        }
    });

    var formBarang = false;
    $("#button-8").click(function(){
        formBarang = !formBarang;
        if (formBarang)
        {
            ShowFromBarang();

            listUser = false;
            formObat = false;
            formCabang = false;
            Hidetable();
            HideFromObat();
            HideFromCabang();
        }
        else
        {
            HideFromBarang();
        }
    });

    var formSupplier = false;
    $("#button-9").click(function(){
        formSupplier = !formSupplier;
        if (formSupplier)
        {
            ShowFromSupplier();

            listUser = false;
            formObat = false;
            formCabang = false;
            formBarang = false;
            Hidetable();
            HideFromObat();
            HideFromCabang();
            HideFromBarang();
        }
        else
        {
            HideFromSupplier();
        }
    });
    var timer;
    $(document).ready(function(){
        timer = setInterval(() => {
            DisplayAllUsers();
        }, 3000);

        <?php
            if (isset($_GET['Obat']))
            {
        ?>
            formObat = true;
            ShowFromObat();
        <?php 
            }
        ?>

        // $("#form-obat").on("submit", function(e){
        //     e.preventDefault();
        //     var formData = new FormData(this);

        //     $.ajax({
        //         url: "Utils/ObatUtil.php",
        //         type: "POST",
        //         dataType: "JSON",
        //         cache:false,
        //         contentType: false,
        //         processData: false,
        //         data: formData,
        //         success: function(data, status){
        //             console.log("success");
        //             $("#thumbnail").attr('src',data);
        //             console.log(data);
        //         },
        //         error: function(data){
        //             console.log("error");
        //             console.log(data);
        //         }
        //     });
        // });

        
    });



</script>
</html>