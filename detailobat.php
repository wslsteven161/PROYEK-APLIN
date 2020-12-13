<?php
    require_once("Connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APOTEK</title>

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
        .flex-container{
            width: 100%;
            margin: 50px auto;
            padding: 50px 0 150px 0;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
        }
        .upload-container{
            padding-bottom:20px;
            margin-top:10px;
            border-radius:5px;
        }
        .center{
            text-align:center;  
        }
        #top{
            margin-top:20px;  
        }
        .btn-container{
            background:#fff;
            border-radius:5px;
            padding-bottom:20px;
            margin-bottom:20px;
        }
        .black{
            color: black;
        }
        .imgupload{
            color:#1E2832;
            padding-top:40px;
            font-size:7em;
        }
        #namefile{
            color:black;
        }
        h4>strong{
            color:#24a0ed
        }
        .btn-primary{
            border-color: #24a0ed !important;
            color: #ffffff;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
            background-color: #24a0ed !important;
            border-color: #24a0ed !important;
        }

        /*these two are set to not display at start*/
        .imgupload.ok{
            display:none;
            color:green;
        }
        .imgupload.stop{
            display:none;
            color:red;
        }

        /*this sets the actual file input to overlay our button*/ 
        #fileup{
            opacity: 0;
            -moz-opacity: 0;
            filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0);
            width:200px;
            cursor: pointer;
            position:absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 40px;
            height: 50px;
        }

        /*switch between input and not active input*/
        #submitbtn{
            display:none;
        }
        #fakebtn{
            padding:5px 40px;
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

            <span style="color:black;margin-right:-235px;z-index:1">
                <i class="fas fa-search"></i>
            </span>

            <form action="" method="get">
                <div class="search">
                    <input type="text" placeholder="Cari Obat . . ." required></input>
                </div>
            </form>


            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="cabang.php">Cabang</a></li>
                    <!-- <li><a href="#">Contact us</a></li> -->

                    <?php 
                    if (isset($_COOKIE['User_LoggedIn']))
                    {
                    ?>
                        <li><a href="profileuser.php"><i class="fas fa-user-circle"></i><?php echo $_COOKIE['User_LoggedIn'] ?></a></li>
                    <?php                         
                    }
                    else
                    {
                    ?>
                        <li><a href="signUpPage.php"><i class="fas fa-user-circle"></i>Sign up</a></li>
                    <?php
                    }
                    ?>

                </ul>
            </nav>
        </div>
    </header>
    <h1 style="color:gray;">List Obat</h1>
    <table class="table table-dark table-bordered table-hover">
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Stock</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody id="obat-table">

        </tbody>
    </table>
</body>
<script>
    $(document).ready(function(){
        $.ajax({
            url: "Utils/getObat.php",
            data: {},
            type: "POST",
            success: function(data, status){
                console.log(data);
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
                    </tr>
                    `); 
                });
            }
        });
    });
</script>
</html>