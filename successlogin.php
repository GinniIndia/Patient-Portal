<?php
include 'header1.php';
?>

<div class="row" style="background:#0066cc">

    <?php
    $id = $_SESSION['userid'];
    $data = mysqli_query($link, "select *from tbl_user where id='$id'");
    if (mysqli_affected_rows($link)) {
        $row = mysqli_fetch_array($data);
        ?>

        <div class="col-md-10 col-md-offset-1" style='color:white'>
            <div class='row'>
                <div class='col-md-8 col-xs-8'>
                    <img src="<?= $row['photo']; ?>" class='img-responsive img-thumbnail' style='display:inline;width:50px;'> <h5 style='display:inline;'><?= $row['name']; ?></h5>
                </div>
                <div class='col-md-4 col-xs-4'>
                    <h5 style='display:inline;float:right'><?= $row['email']; ?></h5>
                </div>
            </div>
        </div>


        <?php
    }
    ?>
</div>
<div class="row" align="center" style="background:#e6e6e6">
    <img src="<?= $row['photo']; ?>" class='img-responsive img-thumbnail' style="box-shadow: 2px 2px 2px 2px #888888;max-width:200px;">
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1 table-responsive">
        <h3>Appointment Details..</h3>
        <table class="table table-bordered">
            <tr>
                <th>D_Photo:</th>
                <th>D_Info:</th>
                <th>Appointment Date:</th>
                <th>Report:</th>
            </tr>
            <?php
            $uid = $_SESSION['userid'];

            $result = mysqli_query($link, "select * from tbl_appointment where uid='$uid'");

            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    $did = $row['did'];
                    $aid = $row['id'];
                    $data = mysqli_query($link, "select * from tbl_doctors where id='$did'");
                    if ($data) {
                        $row1 = mysqli_fetch_array($data);
                        $hid = $row1['h_id'];
                        $result2 = mysqli_query($link, "select * from tbl_hospital where id='$hid'");
                        $row2 = mysqli_fetch_array($result2);
                        $hname = strtoupper($row2['name']);
                    }
                    ?>
                    <tr>
                        <td align='center'><img src="<?= substr($row1['photo'], 3); ?>" class="img-responsive img-thumbnail" style="max-width:200px;"></td>
                        <td><h3><?= $row1['name']; ?></h3><h4><?= $row1['department']; ?></h4><h5><?= $row1['qualification']; ?></h5><h5><b><?= $hname; ?></b></h5></td>
                        <td><?= $row['addon']; ?></td>
                        <td>                   
                            <?php
                            $result1 = mysqli_query($link, "select * from tbl_report where aid='$aid'");
                            if ($result1) {
                                while ($row2 = mysqli_fetch_array($result1)) {
                                    ?> 
                                    <a href="<?= substr($row2['report'], 3); ?>" style="text-decoration:none;" target="_blank">Report(<?= $row2['addon']; ?>)</a>
                                    <p><?= $row2['info']; ?></p>
                                    <?php
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
</div>
<?php
include 'footer.php';
?>