<?php 
    require_once("Connection.php");

    if (isset($_POST['btnAdminLogin']))
    {
        $q1 = $_POST['username'];
        $q2 = $_POST['pass'];

        if ($q1 == "admin" && $q2 == "admin")
        {
            setcookie("admin", "1", time() + (60*30) /* 30 Menit */);
            header("Location: adminPage.php");
        }
    }
    if (isset($_GET['logout']))
    {
        setcookie("admin", "", time() - 1);
        header("Location: index.php");
    }
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
        html { 
            overflow: hidden;
        }
        .container-delimiter-bg{
            background: url(images/admin-background.jpg) no-repeat center center fixed; 
            width: 100%;
            min-height: 100vh;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 15px;
            background-repeat: no-repeat;
            background-position: center;
            -o-background-size: cover;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            position: relative;
            z-index: 1;  
        }
        .container-delimiter-bg::before{
            content: "";
            display: block;
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0,0,0,0.65); 
        }
        .wrap-delimiter-bg{
            width: 390px;
            border-radius: 10px;
            overflow: hidden;
            background: transparent;
        }
        .form-admin-title{
            font-size: 28px;
            font-weight: bold;
            color: #fff;
            line-height: 1.2;
            text-align: center;
            text-transform: uppercase;
            display: block;
        }
        .form-admin{
            width: 100%;
            border-radius: 10px;
            background-color: #fff;
        }
        .wrap-input{
            width: 100%;
            position: relative;
            /* border-bottom: 1px solid #e6e6e6; */
            padding: 29px 0;
        }
        .input100{
            font-size: 20px;
            color: #555555;
            line-height: 1.2;
            display: block;
            width: 100%;
            height: 50px;
            background: transparent;
            padding: 0 10px 0 80px;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }
        .focus-input100 {
            position: absolute;
            display: block;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }
        .focus-input100 {
            position: absolute;
            display: block;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }
        .focus-input100::before {
            content: "";
            display: block;
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 0;
            height: 1px;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
            background: #d41872;
            background: -webkit-linear-gradient(left, #a445b2, #d41872, #fa4299);
            background: -o-linear-gradient(left, #a445b2, #d41872, #fa4299);
            background: -moz-linear-gradient(left, #a445b2, #d41872, #fa4299);
            background: linear-gradient(left, #a445b2, #d41872, #fa4299);
        }
        .focus-input100::after {
            font-size: 18px;
            color: #999999;
            content: attr(data-placeholder);
            display: block;
            width: 100%;
            position: absolute;
            top: 40px;
            left: 35px;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }
        .container-login100-form-btn {
            width: 100%;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .login100-form-btn {
            font-family: Ubuntu-Bold;
            font-size: 18px;
            color: #fff;
            line-height: 1.2;
            text-transform: uppercase;

            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 20px;
            min-width: 160px;
            height: 42px;
            border-radius: 21px;

            background: #d41872;
            background: -webkit-linear-gradient(left, #a445b2, #d41872, #fa4299);
            background: -o-linear-gradient(left, #a445b2, #d41872, #fa4299);
            background: -moz-linear-gradient(left, #a445b2, #d41872, #fa4299);
            background: linear-gradient(left, #a445b2, #d41872, #fa4299);
            position: relative;
            z-index: 1;

            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }

        .login100-form-btn::before {
            content: "";
            display: block;
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            border-radius: 21px;
            background-color: #555555;
            top: 0;
            left: 0;
            opacity: 0;

            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }

        .login100-form-btn:hover {
            background-color: transparent;
        }

        .login100-form-btn:hover:before {
            opacity: 1;
        }

        input[type="text"], input[type="password"]{
            display: block;
            margin-bottom: 20px;
            text-align: center;
            height: 32px;
            width: 100%;
            border: none;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            font-size: 15px;
            transition: 0.2s ease;
        }
    </style>
</head>
<body>
    <div class="container-delimiter-bg">
        <div class="wrap-delimiter-bg">
            <span class="form-admin-title">Admin Login</span>
            <form class="form-admin" action="" method="post">

                <div class="wrap-input" style="margin:auto;" data-validate="Enter username">
                    <input class="input100" type="text" name="username" placeholder="User name">
					<!-- <span class="focus-input100" data-placeholder="&#xe82a;"></span> -->
                </div>
                
                <div class="wrap-input" style="position: relative;" data-validate="Enter password">
					<input class="input100" type="password" name="pass" placeholder="Password">
					<!-- <span class="focus-input100" data-placeholder="&#xe80f;"></span> -->
				</div>

                <div class="container-login100-form-btn m-t-32">
					<button class="login100-form-btn" name="btnAdminLogin">Login</button>
				</div>

            </form>
        </div>
    </div>
</body>
<script>

</script>
</html>