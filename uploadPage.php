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
        .upload-drop-zone {
            height: 200px;
            border-width: 2px;
            margin-bottom: 20px;
        }

        /* skin.css Style*/
        .upload-drop-zone {
            color: #ccc;
            border-style: dashed;
            border-color: #ccc;
            line-height: 200px;
            text-align: center
        }
        .upload-drop-zone.drop {
            color: #222;
            border-color: #222;
        }
        .image-preview-input {
            position: relative;
            overflow: hidden;
            margin: 0px;    
            color: #333;
            background-color: #fff;
            border-color: #ccc;    
        }
        .image-preview-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .image-preview-input-title {
            margin-left:2px;
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
                    <li><a href="about.php">About</a></li>
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

    <div class="container flex-container">

        <?php 
        if (!isset($_COOKIE['User_LoggedIn']))
        {
        ?>

        <div class="alert alert-danger" role="alert">
            Only Registered User can use this feature!
        </div>

        <?php 
        }
        else
        {
        ?>

        <div class="container"> <br />
            <div class="row">

                <div class="col-md-7">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Upload files</strong> <small> </small></div>
                        <div class="panel-body">
                            <div class="input-group image-preview">
                                <input placeholder="" type="text" class="form-control image-preview-filename" disabled="disabled">
                                <!-- don't give a name === doesn't send on POST/GET --> 
                                <span class="input-group-btn"> 
                                <!-- image-preview-clear button -->
                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;"> <span class="glyphicon glyphicon-remove"></span> Clear </button>
                                <!-- image-preview-input -->
                                <div class="btn btn-default image-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="image-preview-input-title">Browse</span>
                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/>
                                    <!-- rename it --> 
                                </div>
                                <button type="button" class="btn btn-labeled btn-default"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>
                                </span> </div>
                            <!-- /input-group image-preview [TO HERE]--> 
                            
                            <br />
                            
                            <!-- Drop Zone -->
                            <div class="upload-drop-zone" id="drop-zone"> Or drag and drop files here </div>
                            <br />
                            
                            <!-- Progress Bar
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> <span class="sr-only">60% Complete</span> </div>
                            </div>
                            <br /> -->

                            <!-- Upload Finished -->
                            <div class="js-upload-finished">
                                <h4>Upload history</h4>
                                <div class="list-group">
                                    <!-- <a href="#" class="list-group-item list-group-item-danger">
                                        <span class="badge alert-danger pull-right">23-11-2014</span>
                                        amended-catalogue-01.xls
                                    </a> 
                                    <a href="#" class="list-group-item list-group-item-success">
                                        <span class="badge alert-success pull-right">23-11-2014</span>
                                        amended-catalogue-01.xls
                                    </a> 
                                    <a href="#" class="list-group-item list-group-item-success">
                                        <span class="badge alert-success pull-right">23-11-2014</span>
                                        amended-catalogue-01.xls
                                    </a> 
                                    <a href="#" class="list-group-item list-group-item-success">
                                        <span class="badge alert-success pull-right">23-11-2014</span>
                                        amended-catalogue.xl
                                    </a>  -->
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Download files</strong> <small> </small></div>
                    <div class="panel-body">
                        <button type="button" class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-download"></i> </span>Download catalogue</button>
                        <button type="button" class="btn btn-labeled btn-info"> <span class="btn-label"><i class="glyphicon glyphicon-download"></i> </span>Download delta</button>
                        <br />
                    </div>
                    </div>
                </div>        
                
                
            </div>
        </div>

        <!-- /container --> 

        <?php 
        }
        ?>
    </div>
</body>
<script>
    var startUpload = function(files) {
        console.log(files);
    }

    $("#js-upload-form").on('submit', function(e){
        var uploadFiles = $('#js-upload-files').files;
        e.preventDefault();

        startUpload(uploadFiles);
    });

    $("#drop-zone").on('drop', function(e){
        e.preventDefault();
        e.stopPropagation();
        $(this).attr('class','upload-drop-zone');

        startUpload(e.dataTransfer.files)
    });
    $("#drop-zone").on('dragover', function(e){
        e.preventDefault();
        e.stopPropagation();
        $(this).attr('class','upload-drop-zone drop');

        //return false;
    });
    $("#drop-zone").on('dragleave', function(e){
        e.preventDefault();
        e.stopPropagation();
        $(this).attr('class','upload-drop-zone');

        //return false;
    });

</script>
</html>