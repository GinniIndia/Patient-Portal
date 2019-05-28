<?php
ob_start();
session_start();
if (!empty($_SESSION['userid'])) {
    header("location:http://localhost/hospital/user-profile/");
    exit();
}
include 'config.php';
?>
<?php
if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $data = mysqli_query($link, "select * from tbl_user where email='$login' and password='$password'");
    if (mysqli_num_rows($data) > 0) {
        $row = mysqli_fetch_array($data);
        $_SESSION['userid'] = $row[0];
        $_SESSION['logout'] = 'logout.php';
    header("location:http://localhost/hospital/user-profile/");
            
    } else {
        echo "<script>document.getElementById('error').innerHTML='Invalid Login..';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login V1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="http://localhost/hospital/">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="image/icon.png"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="Login_v1/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="Login_v1/vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="Login_v1/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="Login_v1/vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="Login_v1/css/util.css">
        <link rel="stylesheet" type="text/css" href="Login_v1/css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>
        <a class="btn btn-link" href="index/" style="text-decoration:none">Back</a>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="Login_v1/images/img-01.png" alt="IMG">
                    </div>

                    <form class="login100-form validate-form" method="post">
                        <span class="login100-form-title">
                            Member Login
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="email" name="login" placeholder="Email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <p id="error" style="color:red;"></p> 
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" name="submit">
                                Login
                            </button>
                        </div>

                        <div class="text-center p-t-12">
                            <span class="txt1">
                                Forgot
                            </span>
                            <a class="txt2" href="forget.php">
                                Username / Password?
                            </a>
                        </div>

                        <div class="container-login100-form-btn">
                            <a href="../facebook/index.php" class="btn btn-info" style="background:#0066cc"><i class="fa fa-facebook"></i></a>
                            <a href="../gmail/index.php" class="btn btn-danger"><i class="fa fa-google-plus"></i></a>
                        </div>
                        <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
                        <div class="text-center p-t-136">
                            <a class="txt2" href="Register-at-Patient-Portal/">
                                Create your Account
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>
                        </div>

                    </form>
                </div>

            </div>
        </div>

        <!--=============================================================================================== -->
        <script src = "Login_v1/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="Login_v1/vendor/bootstrap/js/popper.js"></script>
        <script src="Login_v1/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="Login_v1/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="Login_v1/vendor/tilt/tilt.jquery.min.js"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <!--===============================================================================================-->
        <script src="Login_v1/js/main.js"></script>

    </body>
</html>
<?php
mysqli_close($link);
?>