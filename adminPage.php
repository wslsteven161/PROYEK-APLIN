<?php 
    require_once("Connection.php");

    if (!isset($_COOKIE['admin']))
    {
        header("Location: index.php");
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
    </style>
</head>
<body>
    <header class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center">
            <div class="logo mr-auto">
                <h1>APOTEK</h1>
                <!--a href="#"><img src="" alt="" class="img-fluid"></a-->
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Profile</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="FRONT-PAGE adm-front">
        <h1>Welcome, Admin!</h1>
    </div>

    <div class="container">
        
        <a id="button-1" class="button" href="#">Let's Go!</a>
        <div class="button" id="button-2">
            <div id="slide"></div>
            <a href="#">Let's Go!</a>
        </div>

        <div class="button" id="button-3">
            <div id="circle"></div>
            <a href="#">Let's Go!</a>
        </div>

        <div class="button" id="button-4">
            <div id="underline"></div>
            <a href="#">Let's Go!</a>
        </div>

        <div class="button" id="button-5">
            <div id="translate"></div>
            <a href="#">Let's Go!</a>
        </div>

        <div class="button" id="button-6">
            <div id="spin"></div>
            <a href="#">Let's Go!</a>
        </div>

        <div class="button" id="button-7">
            <div id="dub-arrow"><img src="#" alt="" /></div>
            <a href="#">Let's Go!</a>
        </div>

    </div>

</body>
</html>