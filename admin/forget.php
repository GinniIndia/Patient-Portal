<?php
include "config.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>HospitalPortal</title>
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
                <h4 align="center">Hospital Portal</h4>

            </div>
            <!---end---->

            <!--start-->


            <!--end-->
            <div class="row" style="position:relative;top:40px;">
                <div class="col-md-4 col-md-offset-4">
                    <form  method="post">
                        <h4 align="center"><b>Hospital Login Updation!</b></h4>
                        <p id="success" style="color:green;"></p>
                        <h5><b>UserName</b></h5>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-o"></i></span><input type="email" class="form-control"  name="login" required>
                        </div>
                        <h5><b>SecurityCheck</b></h5>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-quora"></i></span><input type="text" class="form-control" name="sq" required>
                        </div>
                        <h5><b>Password</b></h5>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span><input type="password" class="form-control"  name="password" required>
                        </div>
                        <h5><b>ConfirmPassword</b></h5>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span><input type="password" class="form-control"  name="cpassword" required>
                        </div>

                        <p id="mm" style="color:red;"></p>
                        <input type="submit" class="btn btn-info" name="submit">  <a href="dashboard.php" class="btn btn-info">Login</a>
                    </form>
                  

                </div>
            </div>
            <!---end-->

        </div>
        <?php
        if (isset($_POST['submit'])) {
            $login = mysqli_real_escape_string($link, $_POST['login']);
            $password = mysqli_real_escape_string($link, $_POST['password']);
            $cpassword = mysqli_real_escape_string($link, $_POST['cpassword']);
            $sq = mysqli_real_escape_string($link, $_POST['sq']);
            $data = mysqli_query($link, "select * from  tbl_admin_login where login='$login'");
            if (mysqli_affected_rows($link)) {
                $row = mysqli_fetch_array($data);


                if (($password != $cpassword) || ($row['secure'] != $sq)) {
                    echo "<script>document.getElementById('mm').innerHTML='Mismatch Password or Invalid Security Ans..';</script>";
                } else {
                    mysqli_query($link, "update tbl_admin_login set password='$password' where login='$login'");
                    echo "<script>document.getElementById('success').innerHTML='SuccessFul Updated!';</script>";
                }
            } else {
                echo "<script>document.getElementById('mm').innerHTML='Invalid User..';</script>";
            }
        }
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/aos.js.download"></script>
    </body>
</html>
<?php
mysqli_close($link);
?>