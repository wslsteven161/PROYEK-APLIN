<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
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
                    <li><a href="#">Cabang</a></li>
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
                        <li><a href="signUpPage.php"><i class="fas fa-user-circle"></i> Sign up</a></li>
                    <?php
                    }
                    ?>

                </ul>
            </nav>
        </div>
    </header>
</body>
</html>