<?php
include "header.php";
?>
<?php
if (isset($_GET['did'])) {
    $id = intval($_GET['did']);
    $result = mysqli_query($link, "delete from tbl_doctors where id='$id'");
    if (mysqli_affected_rows($link)) {
        header("location:view.php");
        exit();
    } else {
        echo "<script>alert('Unable to Delete');</script>";
    }
}
?>


<?php
$data = mysqli_query($link, "Select * from tbl_doctors");
if (mysqli_affected_rows($link)) {
    while ($row = mysqli_fetch_array($data)) {
        ?>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 table-responsive" style="padding-top:10px;padding-bottom:10px;"align='center'>
                        <div class="col-md-2"><img src="<?= $row['photo']; ?>" class="img-responsive img-thumbnail"></div>
                        <div class="col-md-8"><h4><?= $row['name'] ?></h4><h5><?= $row['department'] ?></h5><h5><?= $row['qualification'] ?></h5><h5>Experience:<?= $row['experience'] ?></h5></div>
                        <div class="col-md-2" style="padding-top:20px;"><a href="view.php?did=<?= $row[0] ?>" class="btn btn-danger" name="delete">Delete</a><a href="updatedoctor.php?id=<?= $row[0] ?>" class="btn btn-info">Update</a></div>
                    </div>
                </div>
        <?php
    }
}
?>



<?php
include "footer.php";
?>