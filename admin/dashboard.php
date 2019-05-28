<?php
ob_start();
session_start();
if(!empty($_SESSION["adminid"]))
{
    header("location:success.php");
    exit();
}
include 'config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>AdminPortal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="css/aos.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid">

            <!--start-->
            <div class="row" style="background:black;color:white;">
                <h4 align="center">Admin Portal</h4>

            </div>
            <!---end---->

            <!--start-->


            <!--end-->
            <div class="row" style="position:relative;top:40px;">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="dashboard.php" method="post">
                        <h4 align="center"><b>Admin Login</b></h4>
                        <h5><b>UserName</b></h5>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-o"></i></span><input type="email" class="form-control" id="fname" name="login" required>
                        </div>
                        <h5><b>Password</b></h5>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span><input type="password" class="form-control" id="fname" name="password" required>
                        </div>
                        <p id="error" style="color:red;"></p>
                        <input type="submit" class="btn btn-info" name="submit">
                    </form>
                    <a href="forget.php" style="color:black;text-decoration:none;">Forgot:Username/Password?</a>
                </div>
            </div>
            <!---end-->

        </div>
        <?php
        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $data = mysqli_query($link, "select * from  tbl_admin_login where login='$login' and password='$password'");
            if (mysqli_num_rows($data) > 0)
            {   $row=  mysqli_fetch_array($data);
                $_SESSION["adminid"]=$row[0];
                header("location:success.php");
            } else {
                echo "<script>document.getElementById('error').innerHTML='Invalid login';</script>";
            }
        }
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/aos.js.download"></script>
    </body>
</html>