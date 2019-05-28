<?php
$link = mysqli_connect("localhost", "root", "", "patientportal");
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
        <script src="Login_v1/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="Login_v1/vendor/bootstrap/js/popper.js"></script>
        <script src="Login_v1/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="Login_v1/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="Login_v1/vendor/tilt/tilt.jquery.min.js"></script>
        <!--===============================================================================================-->
    </head>
    <body>
        <a href="login-to-your-account/" class="btn btn-link" style="text-decoration:none;">Back</a>
        <div class="limiter">


            <div class="container-login100">



                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="Login_v1/images/img-01.png" alt="IMG">
                    </div>

                    <form class="login100-form validate-form" method="post" enctype="multipart/form-data" id="formreset">

                        <span class="login100-form-title">
                            Member Registration:
                        </span>
                        <p style="color:green" id="success"></p>
                        <p style="color:red" id="fail"></p>
                        <div class="wrap-input100 validate-input" data-validate = "Name is required">
                            <input class="input100" type="text" name="name" placeholder="Name" pattern="[A-Za-z]+ *[A-Za-z]* *[A-Za-z]*" id="name">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user-o" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Address is required">
                            <input class="input100" type="text" name="address" placeholder="Address" id="address">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-address-card" aria-hidden="true"></i>
                            </span>
                        </div>


                        <div class="wrap-input100 validate-input" data-validate = "Email is required">
                            <input class="input100" type="email" name="email" placeholder="Email" id="email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                            <p id="email" style="color:red"></p>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="password" id="p" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="c_password" id="cp" placeholder="ConfirmPassword" onchange="pwdvalidate()">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <p style="color:red" id="pwd"></p>
                        <div class="wrap-input100 validate-input" data-validate = "Photo is required">
                            <input class="input100" type="file" name="photo" placeholder="Photo" id="photo" onchange="validate()">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                            </span>
                            <p id="error" style="color:red"></p>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Phone is required">
                            <input class="input100" type="text" pattern="[0-9]{10}" name="phone" placeholder="Phone" id="phone">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Kwd is required">
                            <input class="input100" type="text" name="kwd" placeholder="SecurityAnswer" id="kwd">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-quora" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Gender is required">
                            <select name="gender" class="input100" id="gender">
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-male" aria-hidden="true"></i>
                            </span>
                        </div>


                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" name="sub" >
                                Registration
                            </button>
                        </div>
                        <div class="container-login100-form-btn">
                            <a class=" login100-form-btn" name="login" href="login-to-your-account/">
                                Login Form
                            </a>
                        </div>



                    </form>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['sub'])) {
            $flag = "";
            $name = mysqli_real_escape_string($link, $_POST['name']);
            $address = mysqli_real_escape_string($link, $_POST['address']);
            $email = mysqli_real_escape_string($link, $_POST['email']);
            $password = mysqli_real_escape_string($link, $_POST['password']);
            $cpassword = mysqli_real_escape_string($link, $_POST['c_password']);
            $kwd = mysqli_real_escape_string($link, $_POST['kwd']);
            $ran = rand(0000, 9999);
            $photoname = $_FILES["photo"]["name"];
            $phototmp = $_FILES["photo"]["tmp_name"];
            $photoext = pathinfo($photoname);
            $ext = strtolower($photoext['extension']);

            $qdata = "SELECT * FROM tbl_user where email='$email'";
            $data = mysqli_query($link, $qdata);

            if ($data->num_rows) {
                ?>
                <script>

                    document.getElementById('email').innerHTML = "Already Registred..Try New";
                </script>
                <?php
            } else if ($password != $cpassword) {
                ?>
                <script>
                    document.getElementById('pwd').innerHTML = "Mismatch Password";
                </script>
                <?php
            } else if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif" || $_FILES['photo']['size'] > 500000) {
                ?>
                <script>
                    document.getElementById('error').innerHTML = "jpg,png,gif,jpeg files..[max 500kb]";
                </script>
                <?php
            } else {

                @move_uploaded_file($phototmp, "uploads/file" . $ran . date("Y-m-d") . "." . $photoext['extension']);
                $photo = "uploads/file" . $ran . date("Y-m-d") . '.' . $photoext['extension'];
                $phone = mysqli_real_escape_string($link, $_POST['phone']);
                $gender = mysqli_real_escape_string($link, $_POST['gender']);
                $q = "insert into tbl_user(name,address,email,password,photo,phone,gender,kwd) values ('$name','$address','$email','$password','$photo','$phone','$gender','$kwd')";
                $result = mysqli_query($link, $q);
                if (mysqli_affected_rows($link)) {
                    ?>
                    <script>
                        document.getElementById('success').innerHTML = 'Successful Registred!';
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        document.getElementById('fail').innerHTML = 'Failed!';
                    </script>
                    <?php
                }
            }
        }
        ?>


        <script>
            function validate() {
                 document.getElementById('error').innerHTML ='';
                var fname = document.getElementById('photo').value;
                var Extension = fname.substring(
                        fname.lastIndexOf('.') + 1).toLowerCase();
                if (Extension != "jpg" && Extension != "png" && Extension != "gif" && Extension != "jpeg") {
                    document.getElementById('error').innerHTML = "jpg,png,gif,jpeg files..[max 500kb]"
                    return;
                }
            }
            function pwdvalidate() {
                document.getElementById('pwd').innerHTML = '';
                var p = document.getElementById('p').value;
                var cp = document.getElementById('cp').value;
                if (p != cp) {
                    document.getElementById('pwd').innerHTML = "Mismatch Password";
                    return;

                }
            }

        </script>

        <!--===============================================================================================-->	


        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            }
            )
        </script>
        <!--===============================================================================================-->
        <script src="Login_v1/js/main.js"></script>

    </body>
</html>
<?php
mysqli_close($link);
?>