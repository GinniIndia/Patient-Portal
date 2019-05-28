<?php
include "header.php";
?>
<html>
    <head>

    </head>
    <body>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-bordered">
                    <tr>
                        <th>Photo:</th>
                        <th>Qualification:</th>
                        <th>Action:</th>
                    </tr>
                    <?php
                    $login=$_SESSION['hospitalid'];
                    $data = mysqli_query($link, "Select * from tbl_doctors where h_id='$login'");
                    if (mysqli_affected_rows($link)) {
                    while ($row = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td  align="center"><img src="<?= $row['photo'] ?>" class="img-responsive"></th>
                        <td><h4><b><?= $row['name'] ?></b></h4><h5><?= $row['department'] ?></h5><h5><?= $row['qualification'] ?></h5><h5>Experience:<?= $row['experience'] ?></h5></th>
                    <td><a href="view.php?did=<?= $row[0] ?>" class="btn btn-danger" style="padding-right:10px;">Delete</a><a href="update.php?id=<?= $row[0] ?>" class="btn btn-info">Update</a></th>
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