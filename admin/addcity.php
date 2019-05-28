<?php
include "header.php";
?>
<?php
if(isset($_POST['submit'])) {
    $name=$_POST['city'];
    $result=mysqli_query($link,"insert into tbl_city(name) values('$name')");
    if(mysqli_affected_rows($link)) {
        echo "<script>alert('Added!');</script>";
    }
    else {
         echo "<script>alert('Failed!');</script>";
    }
}

?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <form method="post" class="form-group">
            <h3>Add City</h3>
            <input type="text" name="city" class="form-control" required>
            <input type="submit" name="submit" class="btn btn-info">
        </form>
    </div>
</div>
<?php
include "footer.php";
?>
