<?php
    // Required once every page
    include_once("Connection.php");

    
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
                    <li><a href="#HOME">Home</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div id="HOME" class="home-section container d-flex align-items-center flex-column">
        <img src="http://4.bp.blogspot.com/-IbE-rDL1Cnc/TrFVePsQgPI/AAAAAAAAA2E/3gXwAmXMTTs/s1600/logo-hkn-hari-kesehatan-nasional-2011.bmp" alt="">
    </div>
    
</body>
</html>