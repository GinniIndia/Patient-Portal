<?php
include "header.php";
?>
<!--start-->

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="padding-top: 10px;padding-bottom: 20px;" >
        <h4 align="center"><b>Add Doctor!</b></h4>
        <form  method="post" enctype="multipart/form-data">
            <p style="color:green" id="success"></p>
            <p style="color:red" id="fail"></p>
            <h5><b>Name:</b></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-o"></i></span><input type="text" pattern="[A-Za-z]+ *[A-Za-z]* *[A-Za-z]*" class="form-control" id="name" name="name" required>
            </div>
            <h5><b>Department:</b></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-o"></i></span><input type="text" pattern="[A-Za-z]+ *[A-Za-z]* *[A-Za-z]*" class="form-control" id="department" name="department" required>
            </div>
            <h5><b>Qualification:</b></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span><input type="text" class="form-control" id="qualify" name="qualification" required>
            </div>
            <h5><b>Photo:</b></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-picture-o"></i></span><input type="file" class="form-control" id="photo" name="photo" required>

            </div>
            <p style="color:red;" id="image"></p>
            <h5><b>Experience:</b></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-o"></i></span><input type="text" class="form-control" id="experience" name="experience" required>
            </div>
            <div class="form-group"style="padding-top:20px;">
               
                <select class="form-control" name="h_name">
                    <option value="">Select Hospital</option>
                    <?php
                    $data = mysqli_query($link, "select * from tbl_hospital");
                    if (mysqli_affected_rows($link)) {
                        while ($row = mysqli_fetch_array($data)) {
                            ?>
                            <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <p></p>
            <input type="submit" class="btn btn-info" name="sub">
        </form>
        <?php
        if (isset($_POST['sub'])) {
            $name = mysqli_real_escape_string($link, $_POST['name']);
            $depart = mysqli_real_escape_string($link, $_POST['department']);
            $Q = mysqli_real_escape_string($link, $_POST['qualification']);
            $exp = mysqli_real_escape_string($link, $_POST['experience']);
            // $hname = mysqli_real_escape_string($link, $_POST['hname']);
            $p = $_FILES['photo']['name'];
            $ptmp = $_FILES['photo']['tmp_name'];
            $mulval = pathinfo($p);
            $ext=  strtolower($mulval['extension']);
            if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif"  || $_FILES['photo']['name']>500000) {
                echo "<script>document.getElementById('image').innerHTML='only jpg,jpeg,png,gif...max[500kb]';</script>";
            } else {
                $ran = rand(0000, 9999);
                $hid = $_POST['h_name'];
                $photo = "../uploads/file" . $ran . date("Y-m-d") . '.' . $mulval["extension"];
                move_uploaded_file($ptmp, $photo);
                $result = mysqli_query($link, "insert into tbl_doctors(h_id,name,department,qualification,photo,experience) values('$hid','$name','$depart','$Q','$photo','$exp')");
                if ($result) {
                    echo "<script>document.getElementById('success').innerHTML='Successful Added!';</script>";
                } else {
                     echo "<script>document.getElementById('fail').innerHTML='Failed!';</script>";
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