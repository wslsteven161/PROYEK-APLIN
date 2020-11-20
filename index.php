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
                    <li><a href="#">Home</a></li>
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

    <div style="position:relative;display:none;">
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

            <section id="navigation-panel-1">
                <div class="container navigation-front-flex">
                    <div class="row">
                        <div class="col">
                            <a href="">
                                <div class="fixed">
                                    <img class="effect" src="images/medical-prescription.svg" alt="Card image cap">
                                    <h4>Upload Resep</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="">
                                <div class="fixed">
                                    <img class="effect" src="images/pills.svg" alt="Card image cap">
                                    <h4>Placeholder</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="">
                                <div class="fixed">
                                    <img class="effect" src="images/grid.svg" alt="Card image cap">
                                    <h4>Browse Item</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="Home">
                <!-- <h1>HOME</h1> -->
            </section>
            
            <section id="Penawaran">
                <div class="promosi-panel-1">
                    <div class="penawaran-title">
                        <h2>PENAWARAN OBAT DAN SUPLEMEN</h2>
                    </div>
                    <div class="penawaran-body">
                        <div class="row justify-content-center" id="HomePromotion">
                            <div class="col-sm-2"><h1>TEST1</h1></div>
                            <div class="col-sm-2"><h1>TEST2</h1></div>
                            <div class="col-sm-2"><h1>TEST3</h1></div>
                            <div class="col-sm-2"><h1>TEST4</h1></div>
                            <div class="col-sm-2"><h1>TEST5</h1></div>
                        </div>
                    </div>
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