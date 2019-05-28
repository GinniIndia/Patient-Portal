<?php
include "header.php";
?>
<!--start-->

<div class="row">
    <div class="col-md-10 col-md-offset-1" style="padding-top: 10px;padding-bottom: 20px;">
        <h3>Appointment Details:</h3>
        <table class='table-responsive table table-bordered'>
            <tr>
                <th>#AppointmentNo.</th>
                <th>#DoctorName</th>
                <th>#PatientName</th>
                <th>#P_Address</th>
                <th>#Action</th>
            </tr>
            <?php
            $result = mysqli_query($link, "select * from tbl_appointment");
            if (mysqli_affected_rows($link)) {
                while ($row = mysqli_fetch_array($result)) {

                    $did = $row['did'];
                    $pid = $row['uid'];
                    $ddata = mysqli_query($link, "select * from tbl_doctors where id='$did'");
                    if (mysqli_affected_rows($link)) {
                        $dname = mysqli_fetch_array($ddata);
                    } else {
                        echo "<script>alert('error in doctor tabel);</script>";
                        exit();
                    }
                    $pdata = mysqli_query($link, "select * from tbl_user where id='$pid'");
                    if (mysqli_affected_rows($link)) {
                        $rowp = mysqli_fetch_array($pdata);
                    } else {
                        echo "<script>alert('error in patient tabel);</script>";
                        exit();
                    }
                    ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><h4><?= $dname['name']; ?></h4></td>
                        <td><h5><?= $rowp['name']; ?></h5></td>
                        <td><h5><?= $rowp['address']; ?></h5></td>
                        <td><span  style="padding-right:10px;"><a href="profile.php?id=<?= $pid; ?>&did=<?= $did; ?>&aid=<?= $row['id']; ?>" class="btn btn-info">View Profile</a></span><span  style="padding-right:10px;"><a href="patientreport.php?aid=<?= $row['id']; ?>" class="btn btn-info">Report</a></span></td>
                    </tr>
        <?php
    }
}
?>
        </table>
    </div>
</div>

<?php
include "footer.php";
?>