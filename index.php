<?php
    // Required once every page
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
                    <li><a href="#Home">Home</a></li>
                    <li><a href="#">About</a></li>
                    <!-- <li><a href="#">Contact us</a></li> -->
                    <?php 
                    if (isset($_COOKIE['User_LoggedIn']))
                    {
                    ?>
                    <li><a href="#"><i class="fas fa-user-circle"></i> Profile</a></li>
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

    <div style="position:relative">
        <div style="position:fixed">
            <div data-component="sidebar">
                <div class="sidebar" style="margin-top: 60px;">
                    <ul class="list-group flex-column d-inline-block first-menu">
                        <li class="list-group-item" style="padding-left: 25px; padding-top:15px; padding-bottom:15px;">
                            <a href="#"><i class="fas fa-user-circle"></i><span class="ml-2 align-middle">1</span></a>
                        </li> 

                        <li class="list-group-item" style="padding-left: 25px; padding-top:15px; padding-bottom:15px;">
                            <a href="#"><i class="fas fa-user-circle"></i><span class="ml-2 align-middle">2</span></a>
                        </li> 

                        <li class="list-group-item" style="padding-left: 25px; padding-top:15px; padding-bottom:15px;">
                            <a href="#"><i class="fas fa-user-circle"></i><span class="ml-2 align-middle">3</span></a>
                        </li>

                        <li class="list-group-item" style="padding-left: 25px; padding-top:15px; padding-bottom:15px;">
                            <a href="#"><i class="fas fa-user-circle"></i><span class="ml-2 align-middle">4</span></a>
                        </li>

                        <li class="list-group-item" style="padding-left: 25px; padding-top:15px; padding-bottom:15px;">
                            <a href="#"><i class="fas fa-user-circle"></i><span class="ml-2 align-middle">5</span></a>
                        </li>

                        <li class="list-group-item" style="padding-left: 25px; padding-top:15px; padding-bottom:15px;">
                            <a href="#"><i class="fas fa-user-circle"></i><span class="ml-2 align-middle">6</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div id="LOGO" class="logo-section container d-flex align-items-center flex-column">
        <img src="http://4.bp.blogspot.com/-IbE-rDL1Cnc/TrFVePsQgPI/AAAAAAAAA2E/3gXwAmXMTTs/s1600/logo-hkn-hari-kesehatan-nasional-2011.bmp" alt="">
        <br>
        <button class="btn btn-info button-browse-reciepe">Browse Reciepe</button>
    </div>

    <div class="FRONT-PAGE">
        <div class="container">

            <section id="Home">
                <!-- <h1>HOME</h1> -->
            </section>
            
            <section id="Penawaran">
                <div class="penawaran-title">
                    <h1>PENAWARAN OBAT DAN SUPLEMEN</h1>
                </div>
            </section>

        </div>
    </div>

    <div style="height:900px;"></div>

</body>

<script>
    $(document).ready(function() {
        //swal("Hello world!");
    });
</script>
</html>