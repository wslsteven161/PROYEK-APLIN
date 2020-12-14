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

    <!-- JQUERY COOKIE PLUGIN -->
    <script src="js/js.cookie-2.2.1.min.js"></script>

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

    <?php 
        if (!isset($_COOKIE['User_LoggedIn']))
        {
        ?>
        <div class="container flex-container">
            <div class="alert alert-danger" role="alert">
                Only Registered User can use this feature!
            </div>
        </div>
        <?php 
        }
        else
        {
        ?>
            <div class="upload-container center" style="margin-top:100px">
                <div class="row">
                    <div class="col-md-12 text-black">
                        <h1 class="black">Upload Resep Dokter</h1>
                    </div>
                </div>

                <form name="upload" method="post" action="#" enctype="multipart/form-data" accept-charset="utf-8" id="upload-form">
                    <div class="row">
                        <div class="col-md-2 mx-auto">
                            <div class="btn-container bg-light">
                                <!--the three icons: default, ok file (img), error file (not an img)-->
                                <h1 class="imgupload"><i class="fa fa-file-image-o"></i></h1>
                                <h1 class="imgupload ok"><i class="fa fa-check"></i></h1>
                                <h1 class="imgupload stop"><i class="fa fa-times"></i></h1>
                                <!--this field changes dinamically displaying the filename we are trying to upload-->
                                <p id="namefile">Only pics allowed! (jpg,jpeg,bmp,png)</p>
                                <!--our custom btn which which stays under the actual one-->
                                <button type="button" id="btnup" class="btn btn-primary btn-lg">Browse for your pic!</button>
                                <!--this is the actual file input, is set with opacity=0 beacause we wanna see our custom one-->
                                <input type="file" value="" name="fileup" id="fileup" />
                            </div>
                        </div>
                    </div>
                    <!--additional fields-->
                    <div class="row">
                        <div class="col-md-12">
                            <!--the defauld disabled btn and the actual one shown only if the three fields are valid-->
                            <input type="submit" value="Submit!" class="btn btn-primary" id="submitbtn" />
                            <button type="button" class="btn btn-default" disabled="disabled" id="fakebtn">Submit! <i class="fa fa-minus-circle"></i></button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="container">
                <div class="js-upload-finished">
                    <h4>Upload history</h4>
                    
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Filename</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="upload-history">
                        </tbody>
                    </table>
			    	<!-- <div class="list-group"> 
                        <a href="#" class="list-group-item list-group-item-danger">
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
                            amended-catalogue.xls
                        </a>
                    </div> -->
			    </div>
            </div>
    <?php 
    }   
    ?>
    
</body>
<script>
    var startUpload = function(files) {
        console.log(files);
    }

    $('#upload-form').on('submit',function(e){
        e.preventDefault();
        let form = new FormData($(this)[0]);
        form.append('user_id', Cookies.get('User_LoggedIn'));
        // for(let [name, value] of form) {
        //     console.log((`${name} = ${value}`));
        // }
        $.ajax({
            url: "Utils/uploadReciepe.php",
            type: "POST",
            data: form,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            success: function(value){
                if (value != 'bye' || value != 'error' || value != 'error2')
                {
                    swal('Success!', 'Success Upload File','success');
                }
                else if (value == 'error2')
                {
                    swal('Error!', 'Max 5Mb','error');
                }
                else
                {
                    console.log(value);
                }
                $('#namefile').html('Only pics allowed! (jpg,jpeg,bmp,png)');
                $('#namefile').css({"color":"black","font-weight":""});
                $( ".imgupload" ).show("slow");
                $( ".imgupload.stop" ).hide("slow");
                $( ".imgupload.ok" ).hide("slow");
                $( "#submitbtn" ).hide();
                $( "#fakebtn" ).show();
                getAllUploadsUser();
            },
            error: function(){

            }
        });
    });

    $('#fileup').change(function(){
        var res=$('#fileup').val();
        var arr = res.split("\\");
        var filename=arr.slice(-1)[0];
        filextension=filename.split(".");
        filext="."+filextension.slice(-1)[0];
        valid=[".jpg",".png",".jpeg",".bmp"];
        // if file is not valid show the error icon, the red alert, and hide the submit button
        if (valid.indexOf(filext.toLowerCase())==-1){
            $( ".imgupload" ).hide("slow");
            $( ".imgupload.ok" ).hide("slow");
            $( ".imgupload.stop" ).show("slow");
        
            $('#namefile').css({"color":"red","font-weight":700});
            $('#namefile').html("File "+filename+" is not  pic!");

            $( "#submitbtn" ).hide();
            $( "#fakebtn" ).show();
        }else{
            //if file is valid show the green alert and show the valid submit
            $( ".imgupload" ).hide("slow");
            $( ".imgupload.stop" ).hide("slow");
            $( ".imgupload.ok" ).show("slow");
        
            $('#namefile').css({"color":"green","font-weight":700});
            $('#namefile').html(filename);
        
            $( "#submitbtn" ).show();
            $( "#fakebtn" ).hide();
        }
    });

    function getAllUploadsUser()
    {
        // $.ajax({
        //     url: "Utils/getUploadHistory.php",
        //     type: "POST",
        //     data: {"user_id" : Cookies.get('User_LoggedIn')},
        //     success: function(value){
        //         let datas = JSON.parse(value);
        //         $("#upload-history").empty();
        //         $.each(datas, function(index, value){
        //             $("#upload-history").append(`
        //                 <tr>
        //                     <th scope="row">${(index + 1)}</th>
        //                     <td><a href="uploads/resep/${value['picture']}" target="_blank">${value['picture']}</a></td>
        //                     <td>${value['status'] == 0 ? "<div class='alert alert-info' role='alert'>Please Wait for Reviewer!</div>" : "<div class='alert alert-success' role='alert'><a href='#' class='alert-link'>Click Here to see review</a></div>"}</td>
        //                     <td><button type="button" class="btn btn-danger">Delete</button></td>
        //                 </tr>
        //             `);
        //         });
        //     },
        //     error: function(){

        //     }
        // });


        $.ajax({
            url: "Utils/getUploadHistory.php",
            type: "POST",
            data: {"user_id" : Cookies.get('User_LoggedIn')},
            success: function(value){
                let datas = JSON.parse(value);
                $("#upload-history").empty();
                $.each(datas, function(index, value){
                    $("#upload-history").append(`
                        <tr>
                            <th scope="row">${(index + 1)}</th>
                            <td><a href="uploads/resep/${value['picture']}" target="_blank">${value['picture']}</a></td>
                            <td>${value['status'] == 0 ? "<div class='alert alert-info' role='alert'>Please Wait for Reviewer!</div>" : `<div class='alert alert-success' role='alert'><a href='#' class='alert-link'>Click Here to see review</a></div>`}</td>
                            <td>${value['status'] == 0 ? `<button type="button" class="btn btn-danger">Delete</button>` : ""}</td>
                        </tr>
                    `);
                });
            },
            error: function(){

            }
        });
    }

    $(document).ready(function(){
        getAllUploadsUser();
    });
</script>
</html>