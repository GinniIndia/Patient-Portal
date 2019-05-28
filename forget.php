<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login V1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="Login_v1/images/img-01.png" alt="IMG">
                    </div>

                    <form class="login100-form validate-form" method="post" action="#">
                        <span class="login100-form-title">
                            Member Login Updation!
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="email" name="login" placeholder="Email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="text" name="kwd" placeholder="SecurityAnswer">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-quora" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="confirmpassword" placeholder="ConfirmPassword">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <p id="error" style="color:red;"></p> 
                        <p id="success" style="color:green;"></p> 
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" name="submit">
                                Update
                            </button>
                        </div>
                        <div class="container-login100-form-btn">
                            <a class="login100-form-btn"  name="l-form" href="login1.php">
                                Login Form
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <?php
        if (isset($_POST['submit'])) {
        $login = mysqli_real_escape_string($link, $_POST['login']);
        $kwd = mysqli_real_escape_string($link, $_POST['kwd']);
        $password = mysqli_real_escape_string($link, $_POST['password']);
        $confirmpassword = mysqli_real_escape_string($link, $_POST['confirmpassword']);
        $data = mysqli_query($link, "select * from tbl_user where email='$login'");
        if (mysqli_num_rows($data) > 0) {
            $row=  mysqli_fetch_array($data);
        if (($password == $confirmpassword) && ($kwd==$row['kwd'])){
        mysqli_query($link, "update tbl_user set password='$password'");
        echo "<script>document.getElementById('success').innerHTML='Success';</script>";
        } else {
        echo "<script>document.getElementById('error').innerHTML='Mismatch Password..or Invalid Security Answer';</script>";
        }
        } else {
        echo "<script>document.getElementById('error').innerHTML='Invalid Try..';</script>";
        }
        }
        ?>
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