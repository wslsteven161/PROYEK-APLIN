<?php
    require_once("Connection.php");
?>
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

    <!-- JQUERY SESSION PLUGIN -->
    <script src="js/jquery.session.js"></script>

    <!-- JQUERY COOKIE PLUGIN -->
    <script src="js/js.cookie-2.2.1.min.js"></script>
    
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
                        <li><a href="#"><i class="fas fa-user-circle"></i><?php echo $_COOKIE['User_LoggedIn'] ?></a></li>
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
    <div id="login-box" style="text-align: center;height:450px;">
        <h1>Edit Profile User</h1>
        Username<input style="margin-left:200px;" readonly type="text" name="username" placeholder="Username" id="user"/>
        Email<input style="margin-left:200px;" type="text" name="email" placeholder="E-mail" id="email"/>
        Password<input style="margin-left:200px;" type="password" name="password" placeholder="Password" id="password"/>
        <input type="submit" value="SUBMIT" id="edit-btn" />
    </div>
</body>
<script>
    var EditProfile = false;
    function EditStatus()
    {
        if (EditProfile)
        {
            $("#email").removeAttr('readonly');
            $("#password").removeAttr('readonly');
            $("#password").val('');
        }
        else
        {
            // ToDo upddate data user here
            $.ajax({
                url: "Utils/updateDataUser.php",
                type: "POST",
                data: {"username" : $('#user').val(), "email" : $("#email").val(), "password" : $("#password").val() },
                success:function(data){
                    swal('Success!', 'Berhasil Update Profile', 'success');
                },
                error:function(){
                    swal('Error!', 'Something wrong', 'error');
                }
            });

            $("#email").attr('readonly','');
            $("#password").attr('readonly','');
            $("#password").val('password');
        }
    }
    
    $(document).ready(function(){

        $.ajax({
            url:"Utils/getUserfUsername.php",
            type: "POST",
            data: {"username" : "<?php echo isset($_COOKIE['User_LoggedIn']) ? $_COOKIE['User_LoggedIn'] : "" ?>"},
            success: function(datas, status){
                let user = JSON.parse(datas);
                $("#user").val(user['username']);
                $("#email").val(user['email']);
                $("#password").val(user['password']);
            },
            error:function(data){

            }
        });

        $("#edit-btn").on('click', function(){
            EditProfile = !EditProfile;
            EditStatus();
            window.location.replace("index.php");
        });

    });


    
    
</script>
</html>