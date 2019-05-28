<?php
include "header.php"
?>
<!--start-->

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="padding-top: 10px;padding-bottom: 20px;" >
        <h4 align="center"><b>Gallery!</b></h4>
        <form action="#" method="post">
            <h5><b>Photo Slider:</b></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-picture-o"></i></span><input type="file" class="form-control" id="fname" name="name" required autofocus="">
            </div>
            <h5><b>Description Slider:</b></h5>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-picture-o"></i></span><input type="text" class="form-control" id="fname" name="name" required>
            </div>
            <p></p>
            <input type="submit" class="bbton">
        </form>
    </div>
</div>

</div>

<?php
include "footer.php";
?>
