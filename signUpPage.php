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

    <!-- GOOGLE SIGN IN -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="564808401235-vgc234dnbiqgmotgd48m0gopt8f6dq1d.apps.googleusercontent.com">

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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div id="login-box" style="text-align: center;height:250px;">
        <h1>Sign in</h1>
        <input style="margin-left:200px;" type="text" name="email" placeholder="E-mail" id="signin-u"/>
        <input style="margin-left:200px;margin-top:30px;" type="password" name="password" placeholder="Password" id="signin-p"/>
        <input type="submit" name="signin_submit" value="Sign me in" id="signin-btn" />
    </div>
    <div id="login-box">
        <div class="left">
            <h1>Sign up</h1>
            <input type="text" name="username" placeholder="Username" id="signup-u"/>
            <input type="text" name="email" placeholder="E-mail" id="signup-e"/>
            <input type="password" name="password" placeholder="Password" id="signup-p"/>
            <input type="password" name="password2" placeholder="Retype password" id="signup-cp"/>
            <input type="submit" name="signup_submit" value="Sign me up" id="signup-btn"/>
        </div>
        <div class="or">OR</div>
        <div class="right">
            <span class="loginwith">Sign in with<br />Social network</span>
            <button><div class="g-signin2" data-onsuccess="onSignIn"></div></button>
            <!-- <button class="btn btn-google social-signin google" data-onsuccess="onSignIn">Log in with Google</button> -->
            <!-- <button class="btn btn-lg btn-google btn-block text-uppercase btn-outline">Log in with Google</button> -->
        </div>
    </div>

    <footer>

    </footer>
</body>
<script>
    $("#signin-btn").click(function(){                
        let data = {
            "username" : $("#signin-u").val(),
            "password" : $("#signin-p").val()
        };

        $.post('login_user.php', data, function(data,status) {
            let datas = JSON.parse(data);
            if (datas['status'] == 'true' || datas['status'] == true || datas['status'] === 'true')
            {
                swal("Success!", "User signed in!", "success").then((value) => {
                    window.location.replace("index.php");
                });
            }
            else if (datas['status'] == 'disabled' || datas['status'] === 'disabled')
            {
                swal("Failed!", "Account Disabled!", "error");
            }
            else
            {
                swal("Failed!", "User not recognized!", "error");
            }
        });
    });

    $("#signup-btn").click(function(){ 
        let data = {
            "username" : $("#signup-u").val(),
            "email" : $("#signup-e").val(),
            "password" : $("#signup-p").val(),
            "cpassword" : $("#signup-cp").val()
        }
        $.post('signup_user.php', data, function(data,status) {
            let datas = JSON.parse(data);
            if (datas['status'] == 'true' || datas['status'] == true || datas['status'] === 'true' )
            {
                swal("Success!", "User added!", "success");
                $("#signup-u").val('');$("#signup-e").val('');$("#signup-p").val('');$("#signup-cp").val('');
            }
            else if (datas['status'] == 'wrong_email' || datas['status'] === 'wrong_email' )
            {
                swal("Error!", "Email Already registered!", "error");
                $("#signup-u").val('');$("#signup-e").val('');$("#signup-p").val('');$("#signup-cp").val('');
            }
            else if (datas['status'] == 'user_registered' || datas['status'] === 'user_registered' )
            {
                swal("Error!", "Username Already registered!", "error");
                $("#signup-u").val('');$("#signup-e").val('');$("#signup-p").val('');$("#signup-cp").val('');
            }
            else
            {
                swal("Error!", "Some data wrong!", "error");
            }
        });
    });

</script>
</html>