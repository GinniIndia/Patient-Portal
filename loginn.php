<?php
            require_once 'config.php';
            $login = $_POST['login'];
            $password = $_POST['password'];
            $data = mysqli_query($link, "select * from tbl_user where email='$login' and password='$password'");
            if (mysqli_num_rows($data) > 0) {
                $row = mysqli_fetch_array($data);
                $_SESSION['userid'] = $row[0];
                $_SESSION['logout'] = 'logout.php';
               echo $_SESSION['userid'];
                header("location: http://localhost/hospital/user-profile/");
            } else {
                echo "<script>document.getElementById('error').innerHTML='Invalid Login..';</script>";
            }
    
        ?>
      