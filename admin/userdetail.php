<?php
include "header.php";
?>
<html>
    <head>

    </head>
    <body>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Photo:</th>
                        <th>Info:</th>
                        <th>Email/Pwd:</th>
                    </tr>
                    <?php
                    $data = mysqli_query($link, "Select * from tbl_user");
                    if (mysqli_affected_rows($link)) {
                        while ($row = mysqli_fetch_array($data)) {
                             if(substr($row['photo'],0,5)=='https') {
                                 $photo=$row['photo']; 
                             }
                             else {
                                  $photo="../" . $row['photo'];
                             }
                            ?>
                            <tr>
                               
                               
                                <td align="center"><img src="<?= $photo ?>" class="img-responsive img-thumbnail" style="max-width:200px;" ></td>
                                <td><h3><?= $row['name'] ?></h3><h4><?= $row['address'] ?></h4><h5><b><?= $row['kwd']; ?></b></h5></td>
                                <td><h5><?= $row['email'] ?></h5><h5><?= $row['password'] ?></h5></td>
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