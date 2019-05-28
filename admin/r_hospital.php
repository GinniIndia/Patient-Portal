<?php
include "header.php";
?>
<!--start-->

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="padding-top: 10px;padding-bottom: 20px;" >
        <h4 align="center"><b>Add Hospital!</b></h4>
        <form  method="post">
            <p id="success" style="color:green"></p>
             <p id="fail" style="color:red"></p>
            <h5><b>Name:</b></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-o"></i></span><input type="text" class="form-control" id="name" name="name" required>
            </div>
            <select name="city" class="form-control" style="margin-top:10px;">
                <option value="">Select City</option>
                <?php
                $result=mysqli_query($link,'select * from tbl_city');
                if(mysqli_affected_rows($link)) {
                    
                    while($row=  mysqli_fetch_array($result)){
                        ?>
                         <option value="<?= $row[0];?>"><?= $row['name'];?></option>
                         <?php
                    }
                }
                 
                ?>
            </select>
            <h5><b>Login:</b></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-o"></i></span><input type="text" class="form-control" id="department" name="login" required>
            </div>
              <p id="login" style="color:red"></p>
            <h5><b>Password:</b></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span><input type="password" class="form-control" id="qualify" name="password" required>
            </div>


            <p></p>
            <input type="submit" class="btn btn-info" name="sub">
        </form>
        <?php
        if (isset($_POST['sub'])) {
            $name = mysqli_real_escape_string($link, $_POST['name']);
            $city = mysqli_real_escape_string($link, $_POST['city']);
            
            $login = mysqli_real_escape_string($link, $_POST['login']);
            $password = mysqli_real_escape_string($link, $_POST['password']);
            $data=mysqli_query($link,"select * from tbl_hospital where login='$login'");
            if(mysqli_num_rows($data)>0){
                
                 echo "<script>document.getElementById('login').innerHTML='Email Already Registered ..Try New!'</script>";
            }
            else {

            $result = mysqli_query($link, "insert into tbl_hospital(name,city,login,password,status) values('$name','$city','$login','$password','1')");
            if (mysqli_affected_rows($link)) {
                echo "<script>document.getElementById('success').innerHTML='Successful Added!'</script>";
            } else {
                echo "<script>document.getElementById('fail').innerHTML='Fail!'</script>";
            }
            }
        }
        ?>
    </div>
</div>
<!--end-->

</div>


<?php
include "footer.php"
?>