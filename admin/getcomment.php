
<?php
require_once 'config.php';
$result = mysqli_query($link, "select * from tbl_comment");
if (mysqli_affected_rows($link)) {
    while ($row = mysqli_fetch_array($result)) {
        $uid = $row['uid'];
        $result1 = mysqli_query($link, "select * from tbl_user where id='$uid'");
        $row1 = mysqli_fetch_array($result1);
        ?>
        <div class="col-md-8 col-md-offset-2" style="padding-bottom: 20px;">
            <div class="row" >

                <div class="form-control">
                    <?php
                    if (substr($row1['photo'], 0, 5) == "https") {
                        ?>

                        <img src="<?= $row1['photo']; ?>" class="img-responsive img-circle" style="width:30px;display: inline;">
                        
                        <?php
                    }
                        else {
                            ?>
                            <img src="<?= "../" . $row1['photo']; ?>" class="img-responsive img-circle" style="width:30px;display: inline;">
                            <?php
                            }
                            
                            ?>

                            <p style="display: inline"><?= $row['ucomment']; ?></p></div>
                        <div class="form-control">
                            <p style="display: inline"><?= $row['reply']; ?></p>
                        </div>
                        <input type="text" name="reply" id="<?= $row[0]; ?>" class="form-control" placeholder="Reply......" >

                        <input type="button" name="sub" id='bttttn' onclick="storevalue(<?= $row[0]; ?>)" value="Reply">

                    </div>

                </div>
                <?php
            }
        }
        ?>

