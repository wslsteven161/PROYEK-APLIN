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
                    <li><a href="signUpPage.php"><i class="fas fa-user-circle"></i> Sign up</a></li>
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

                <div class="row" id="produk-terlaris" style="margin: auto;margin-left:80px;">
                    <div class="col-md-15 ">
                        <div class="product_box">
                            <a href="https://www.k24klik.com/p/vitacimin-tab-str-2s-718">
                                <div class="offer">
                                    <div style="float:left;width:35px;height:35px;background:url('https://www.k24klik.com/images/product/obat-bebas.jpg') no-repeat center/50%" title="Obat Bebas">&nbsp;</div>
                                </div>
                                <img class="lazy img-responsive" data-original="https://images.k24klik.com/product/apotek_online_k24klik_201903010207474677_vitacimin.jpeg" alt="VITACIMIN TAB STR 2S" src="https://images.k24klik.com/product/apotek_online_k24klik_201903010207474677_vitacimin.jpeg" style="display: block;">
                                <div class="product_label">
                                    <div class="product_label_txt">VITACIMIN TAB STR 2S</div>
                                    <div class="product_price">
                                        <div class="product_price_old"></div>
                                        <div class="product_price_regular">Rp 2.064,-</div>
                                    </div>
                                </div>                                                    
                            </a>
                        </div>                    
                    </div>

                    <div class="col-md-15 ">
                        <div class="product_box">
                            <a href="https://www.k24klik.com/p/lacto-b-sach-796">
                                <div class="offer"></div>       
                                <img class="lazy img-responsive" data-original="https://images.k24klik.com/product/0113a0126.jpg" alt="LACTO B SACH" src="https://images.k24klik.com/product/0113a0126.jpg" style="display: block;">
                                <div class="product_label">
                                    <div class="product_label_txt">LACTO B SACH</div>
                                    <div class="product_price">
                                        <div class="product_price_old"></div>
                                        <div class="product_price_regular">Rp 7.888,-</div>
                                    </div>
                                </div>
                            </a>
                        </div>                    
                    </div>

                    <div class="col-md-15 ">
                        <div class="product_box">
                            <a href="https://www.k24klik.com/p/vicee-orange-tab-2s-strip-50s-1943">
                                <div class="offer">
                                    <div style="float:left;width:35px;height:35px;background:url('https://www.k24klik.com/images/product/obat-bebas.jpg') no-repeat center/50%" title="Obat Bebas">&nbsp;</div>
                                </div>       
                                <img class="lazy img-responsive" data-original="https://images.k24klik.com/product/0112c0003.jpg" alt="VICEE ORANGE TAB 2S STRIP 50S" src="https://images.k24klik.com/product/0112c0003.jpg" style="display: block;">
                                <div class="product_label">
                                    <div class="product_label_txt">VICEE ORANGE TAB 2S STRIP 50S</div>
                                    <div class="product_price">
                                        <div class="product_price_old"></div>
                                        <div class="product_price_regular">Rp 1.710,-</div>
                                    </div>
                                </div>
                            </a>
                        </div>                    
                    </div>

                    <div class="col-md-15 ">
                        <div class="product_box">
                            <a href="https://www.k24klik.com/p/sanmol-500mg-tab-4s-strip-25s-1622">
                                <div class="offer">
                                    <div style="float:left;width:35px;height:35px;background:url('https://www.k24klik.com/images/product/obat-bebas.jpg') no-repeat center/50%" title="Obat Bebas">&nbsp;</div>
                                </div>       
                                <img class="lazy img-responsive" data-original="https://images.k24klik.com/product/apotek_online_k24klik_20200810090629359225_SANMOL-4-TAB.jpg" alt="SANMOL 500MG TAB 4S STRIP 25S" src="https://images.k24klik.com/product/apotek_online_k24klik_20200810090629359225_SANMOL-4-TAB.jpg" style="display: block;">
                                <div class="product_label">
                                    <div class="product_label_txt">SANMOL 500MG TAB 4S STRIP 25S</div>
                                    <div class="product_price">
                                        <div class="product_price_old"></div>
                                        <div class="product_price_regular">Rp 1.817,-</div>
                                    </div>
                                </div>
                            </a>
                        </div>                    
                    </div>

                    <div class="col-md-15 ">
                        <div class="product_box">
                            <a href="https://www.k24klik.com/p/one-med-masker-sungkup-n95-20s-15873">
                                <div class="offer"></div>       
                                <img class="lazy img-responsive" data-original="https://images.k24klik.com/product/apotek_online_k24klik_201805230128334677_n95-onemed.jpg" alt="ONE MED MASKER SUNGKUP N95 20S" src="https://images.k24klik.com/product/apotek_online_k24klik_201805230128334677_n95-onemed.jpg" style="display: block;">
                                <div class="product_label">
                                    <div class="product_label_txt">ONE MED MASKER SUNGKUP N95 20S</div>
                                    <div class="product_price">
                                        <div class="product_price_old"></div>
                                        <div class="product_price_regular">Rp 39.902,-</div>
                                    </div>
                                </div>
                            </a>
                        </div>                    
                    </div>

                    <div class="col-md-15 ">
                        <div class="product_box">
                            <a href="https://www.k24klik.com/p/bear-brand-susu-189ml-803">
                                <div class="offer"></div>       
                                <img class="lazy img-responsive" data-original="https://images.k24klik.com/product/0115e0074.jpg" alt="BEAR BRAND SUSU 189ML" src="https://images.k24klik.com/product/0115e0074.jpg" style="display: block;">
                                <div class="product_label">
                                    <div class="product_label_txt">BEAR BRAND SUSU 189ML</div>
                                    <div class="product_price">
                                        <div class="product_price_old"></div>
                                        <div class="product_price_regular">Rp 11.143,-</div>
                                    </div>
                                </div>
                            </a>
                        </div>                    
                    </div>

                    <div class="col-md-15 ">
                        <div class="product_box">
                            <a href="https://www.k24klik.com/p/enervon-c-tab-str-4's-714">
                                <div class="offer">
                                    <div style="float:left;width:35px;height:35px;background:url('https://www.k24klik.com/images/product/obat-bebas.jpg') no-repeat center/50%" title="Obat Bebas">&nbsp;</div>                                                                                                            </div>       
                                <img class="lazy img-responsive" data-original="https://images.k24klik.com/product/apotek_online_k24klik_20200807023538359225_ENERVON-C-4-TAB.jpg" alt="ENERVON C TAB STR 4'S" src="https://images.k24klik.com/product/apotek_online_k24klik_20200807023538359225_ENERVON-C-4-TAB.jpg" style="display: block;">
                                <div class="product_label">
                                    <div class="product_label_txt">ENERVON C TAB STR 4'S</div>
                                    <div class="product_price">
                                        <div class="product_price_old"></div>
                                        <div class="product_price_regular">Rp 6.150,-</div>
                                    </div>
                                </div>
                            </a>
                        </div>                    
                    </div>

                    <div class="col-md-15 ">
                        <div class="product_box">
                            <a href="https://www.k24klik.com/p/sensi-mask-3-ply-earloop-surgical-face-mask-50s-21778">
                                <div class="offer"></div>       
                                <img class="lazy img-responsive" data-original="https://images.k24klik.com/product/apotek_online_k24klik_20190812112550209249_Sensi-50.jpg" alt="SENSI MASK 3 PLY EARLOOP SURGICAL FACE MASK 50S" src="https://images.k24klik.com/product/apotek_online_k24klik_20190812112550209249_Sensi-50.jpg" style="display: block;">
                                <div class="product_label">
                                    <div class="product_label_txt">SENSI MASK 3 PLY EARLOOP SURGICAL FACE MASK 50S</div>
                                    <div class="product_price">
                                        <div class="product_price_old"></div>
                                        <div class="product_price_regular">Rp 3.648,-</div>
                                    </div>
                                </div>
                            </a>
                        </div>                    
                    </div>

                    <div class="col-md-15 ">
                        <div class="product_box">
                            <a href="https://www.k24klik.com/p/dixol-hand-sanitizer-gel-250ml-pump-24043">
                                <div class="offer"></div>
                                <img class="lazy img-responsive" data-original="https://images.k24klik.com/product/apotek_online_k24klik_2020061809421023085_DIXOL-250ML-PUMP--2-.jpg" alt="DIXOL HAND SANITIZER GEL 250ML PUMP" src="https://images.k24klik.com/product/apotek_online_k24klik_2020061809421023085_DIXOL-250ML-PUMP--2-.jpg" style="display: block;">
                                <div class="product_label">
                                    <div class="product_label_txt">DIXOL HAND SANITIZER GEL 250ML PUMP</div>
                                    <div class="product_price">
                                        <div class="product_price_old"></div>
                                        <div class="product_price_regular">Rp 40.171,-</div>
                                    </div>
                                </div>
                            </a>
                        </div>                    
                    </div>

                    <div class="col-md-15 ">
                        <div class="product_box">
                            <a href="https://www.k24klik.com/p/ardium-500-mg-tab-56">
                                <div class="offer">
                                    <div style="float:left;width:35px;height:35px;background:url('https://www.k24klik.com/themes/booster/images/obat-jamu.png') no-repeat center/50%" title="Obat Jamu">&nbsp;</div>
                                </div>
                                <img class="lazy img-responsive" data-original="https://images.k24klik.com/product/apotek_online_k24klik_20190826111806209249_ARDIUM-500MG.jpg" alt="ARDIUM 500 MG TAB" src="https://images.k24klik.com/product/apotek_online_k24klik_20190826111806209249_ARDIUM-500MG.jpg" style="display: block;">
                                <div class="product_label">
                                    <div class="product_label_txt">ARDIUM 500 MG TAB</div>
                                    <div class="product_price">
                                        <div class="product_price_old"></div>
                                        <div class="product_price_regular">Rp 164.885,-</div>
                                    </div>
                                </div>
                            </a>
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