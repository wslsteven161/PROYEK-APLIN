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

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="adminPageProfile.php">Profile</a></li>
                </ul>
            </nav>
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
            <a href="#">Lihat List User</a>
        </div>

        <div class="button" id="button-5">
            <div id="translate"></div>
            <a href="#">Tambah/Edit Obat</a>
        </div>

        <div class="button" id="button-6">
            <div id="spin"></div>
            <a href="#">Lihat Resep</a>
        </div>

        <div class="button" id="button-7">
            <div id="dub-arrow"><img src="#" alt="" /></div>
            <a href="#">ini saya bingung</a>
        </div>

    </div>

    <div class="container flex-container">
        <table class="table table-dark table-bordered table-hover" style="display:none;"> 
            <caption>List of users</caption>
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">-</th>
                </tr>
            </thead>
            <tbody id="user-table">

            </tbody>
        </table>

        <div class="container insertFormObat">
            <h1>H1</h1>
        </div>
    </div>

</body>
<script>
    function DisplayAllUsers()
    {
        $.ajax({
            url: "Utils/getAllUsers.php",
            data: {},
            method: "POST",
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
    function Hidetable()
    {
        $(".table").hide(500);
    }
    function Showtable()
    {
        $(".table").show(500);
    }
    function DisableAccount(data)
    {
        $.ajax({
            url: "Utils/alterUser.php",
            data: {"username" : data , "type" : "disable"},
            method: "POST",
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
            success: function(){
                swal("Success!", "User enabled successfully!", "success");
            },
            error: function(){
                swal("Error!", "Error executing function!", "error");
            }
        });
        DisplayAllUsers();
    }

    var listUser = false;
    $("#button-4").click(function(){
        listUser = !listUser;
        if (listUser)
        {
            Showtable();
            DisplayAllUsers();
        }
        else
        {
            Hidetable();
        }
    });

</script>
</html>