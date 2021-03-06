<?php
include "header.php";
?>
<!--start-->
<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $data = mysqli_query($link, "select * from tbl_doctors where id='$id'");
    if (mysqli_affected_rows($link)) {
        $row = mysqli_fetch_array($data);
        ?>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="padding-top: 10px;padding-bottom: 20px;" >
                <h4 align="center"><b>Add Doctor!</b></h4>
                <form  method="post" enctype="multipart/form-data">
                    <p style="color:green" id="success"></p>
                    <p style="color:red" id="fail"></p>
                    <h5><b>Name:</b></h5>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user-o"></i></span><input type="text" pattern="[A-Za-z]+ *[A-Za-z]* *[A-Za-z]*" value="<?= $row['name']; ?>" class="form-control" id="name" name="name" required>
                    </div>
                    <h5><b>Department:</b></h5>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user-o"></i></span><input type="text" value="<?= $row['department']; ?>" pattern="[A-Za-z]+ *[A-Za-z]* *[A-Za-z]*" class="form-control" id="department" name="department" required>
                    </div>
                    <h5><b>Qualification:</b></h5>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span><input type="text" value="<?= $row['qualification']; ?>" class="form-control" id="qualify" name="qualification" required>
                    </div>
                    <h5><b>Photo:</b></h5>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-picture-o"></i></span><input type="file" class="form-control" id="photo" name="photo">
                        <input type="hidden" value="<?= $row['photo']; ?>" name="oldimage">
                    </div>

                    <p style="color:red;" id="image"></p>
                    <h5><b>Experience:</b></h5>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user-o"></i></span><input type="text"value="<?= $row['experience']; ?>"class="form-control" id="experience" name="experience" required>
                    </div>
                    <div class="form-group"style="padding-top:20px;">


                        <input type="hidden" value="<?= $row['h_id']; ?>" name="hoid">
                    </div>
                    <p></p>
                    <input type="submit" class="btn btn-info" name="sub">
                </form>
                <?php
            }
        }
        ?>

        <?php
        if (isset($_POST['sub'])) {
            $name = mysqli_real_escape_string($link, $_POST['name']);
            $depart = mysqli_real_escape_string($link, $_POST['department']);
            $Q = mysqli_real_escape_string($link, $_POST['qualification']);
            $exp = mysqli_real_escape_string($link, $_POST['experience']);

            // $hname = mysqli_real_escape_string($link, $_POST['hname']);
            if (empty($_FILES['photo']['name'])) {
                $photo = $_POST['oldimage'];
            } else {
                $p = $_FILES['photo']['name'];
                $ptmp = $_FILES['photo']['tmp_name'];
                $mulval = pathinfo($p);
                $ext = strtolower($mulval["extension"]);
                if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif" || $_FILES['photo']['size'] > 500000) {
                    echo "<script>document.getElementById('image').innerHTML='only jpg,jpeg,png,gif...max[500kb]';</script>";
                } else {
                    $ran = rand(0000, 9999);
                    $photo = "../uploads/file" . $ran . date("Y-m-d") . '.' . $mulval["extension"];
                    move_uploaded_file($ptmp, $photo);
                }
            }
            $result = mysqli_query($link, "update tbl_doctors set name='$name',department='$depart',qualification='$Q',photo='$photo',experience='$exp' where id='$id'");
            if ($result) {
                header("location:view.php");
            } else {
                echo "<script>document.getElementById('fail').innerHTML='Failed!';</script>";
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