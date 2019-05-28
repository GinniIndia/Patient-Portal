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
                        <th>Name:</th>
                        <th>Login:</th>
                        <th>Password:</th>
                    </tr>
                    <?php
                    $data = mysqli_query($link, "Select * from tbl_hospital");
                    if (mysqli_affected_rows($link)) {
                        while ($row = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><h5><?= $row['name'] ?></h5></td>
                                <td><h5><b><?= $row['login'] ?></b></h5></td>
                                <td><h5><?= $row['password'] ?></h5></td>
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