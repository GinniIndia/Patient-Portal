<?php
include "header.php";
?>
<!--start-->

<div class="row">

    <div class="col-md-4 col-md-offset-4" style="padding-top: 10px;padding-bottom: 20px;" >
        <h4 align="center"><b>Remove Hospital!</b></h4>
        <form method='post'>
            <p id='result' style='color:green;'></p>
            <p id='resulte' style='color:red;'></p>
            <select class="form-control" name='hselect' required>
                <option value="">Select Hospital</option>
                <?php
                $result = mysqli_query($link, "select * from tbl_hospital");
                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?= $row['id']; ?>"> <?= $row['name']; ?> </option>
                        <?php
                    }
                }
                ?>
            </select>
            <input type="submit" class="btn btn-info" name="sub">
        </form>





        <?php
        if (isset($_POST['sub'])) {
            $id = mysqli_real_escape_string($link, $_POST['hselect']);
            $result = mysqli_query($link, "update tbl_hospital set status='1' where id='$id'");

            if (mysqli_affected_rows($link)) {
                echo "<script>document.getElementById('result').innerHTML='Recover SuccessFully..';</script>";
            } else {
                echo "<script>document.getElementById('resulte').innerHTML='Recover Failed..';</script>";
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