<?php
include "header.php"
?>
<?php
if (isset($_GET['rid'])){
    $rid = intval($_GET['rid']);
    $result = mysqli_query($link, "delete from tbl_report where id='$rid'");
    
}
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3><b>Patient and Doctors Profile:</b></h3>
        <table class="table table-bordered table-responsive">
            <tr>
                <th>#P_Id</th>
                <th>#P_Photo</th>
                <th>#P_Info</th>

            </tr>
            <?php
            if (isset($_GET['id']) && isset($_GET['did'])) {
                $id = intval($_GET['id']);
                $did = intval($_GET['did']);
                $result = mysqli_query($link, "Select * from tbl_user where id='$id'");
                if (mysqli_affected_rows($link)) {
                    $result1 = mysqli_query($link, "Select * from tbl_doctors where id='$did'");
                    if (mysqli_affected_rows($link)) {
                        $row = mysqli_fetch_array($result);
                        if(substr($row['photo'],0,5)=='https') {
                            $photo=$row['photo'];
                        }
                        else {
                        $photo = "../" . $row['photo'];
                        }
                        $row1 = mysqli_fetch_array($result1);
                        $photo1 = $row1['photo'];
                        ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td align='center'><img src="<?= $photo; ?>" class='img-responsive img-thumbnail' style="max-width:200px;"alt="<?= $photo; ?>"></td>
                            <td><h3><?= $row['name']; ?></h3><h4><?= $row['email']; ?></h4><h5><?= $row['phone']; ?></h5><h5><?= $row['address']; ?></h5></td>


                        </tr>

                        <tr>
                            <th>#D_Id</th>
                            <th>#D_Photo</th>
                            <th>#D_Info</th>


                        </tr>
                        <tr>
                            <td><?= $row1['id']; ?></td>
                            <td align='center'><img src="<?= $photo1; ?>" class='img-responsive img-thumbnail' style="max-width:200px;"alt="<?= $photo1; ?>"></td>
                            <td><h3><?= $row1['name']; ?></h3><h4><?= $row1['qualification']; ?></h4><h5><?= $row1['department']; ?></h5><hr><h5><?php
            if (isset($_GET['aid'])) {
                $aid = intval($_GET['aid']);
                $result = mysqli_query($link, "select * from tbl_report where aid='$aid'");
                if (mysqli_affected_rows($link)) {
                    while ($row = mysqli_fetch_array($result)) {
                                    ?>


                                                <span><a href="<?= $row['report']; ?>">Report(<?= $row['addon']; ?>)</a></span><span style="padding-left: 30px;"><a href="profile.php?id=<?= intval($_GET['id']); ?>&did=<?= intval($_GET['did']); ?>&aid=<?= intval($_GET['aid']); ?>&rid=<?= $row['id']; ?>" class="btn btn-danger" name="delete">Delete</a></span>
                                                <p><?= $row['info']; ?></p>
                                                <hr>
                                                <?php
                                            }
                                        } 
                                    }
                                    ?></h5></td>



                        </tr>
                        <?php
                    }
                }
            }
            ?>
        </table>
    </div>

</div>
<?php
include "footer.php";
?>