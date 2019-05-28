<?php
    require_once 'config.php';
    $uid = $_GET['id'];
    $result = mysqli_query($link, "select * from tbl_comment where uid='$uid'");
    if (mysqli_affected_rows($link)) {
        while ($row = mysqli_fetch_array($result)) {
//            $uid = $_SESSION['userid'];
            $result1 = mysqli_query($link, "select * from tbl_user where id='$uid'");
            $row1 = mysqli_fetch_array($result1);
            ?>
            <div class="col-md-8 col-md-offset-2" style="padding-bottom: 20px;">
                <div class="row">
                    <div class="form-control">
                        <img src="<?= $row1['photo']; ?>" class="img-responsive img-circle" style="width:30px;display: inline;">
                        <p style="display: inline"><?= $row['ucomment']; ?></p></div>
                    <div class="form-control"><span><i class="fa fa-user-circle"></i></span><p style="display: inline;"><?= $row['reply']; ?></p></div>
                </div>
            </div>
            <?php
        }
    }
    ?>