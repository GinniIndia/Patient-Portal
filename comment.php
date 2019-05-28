<?php
include "header1.php";
?>

<hr>
<div class="row" id="commentbox">

</div>
<div class="row" style="padding-bottom:120px;">
    <div class="col-md-8 col-md-offset-2" style="background:black;padding-left:4px;padding-right:4px;">
        <h4 style="color:white;">Enter a Query here</h4>
        <form method="post" style="padding-bottom:5px;">
            <input type="hidden" value="<?= $_SESSION['userid']; ?>" id="uid">
            <textarea name="comment" id="comment" style="height:150px;width:100%" placeholder="Comment Here........"></textarea>

            <input type="button" value="Comment" class="bbton" id="sub" name="sub" onclick="submitvalue()">
        </form>

    </div>
</div>
<script>
    $(document).ready(function () {
        $("#commentbox").load("getcomment.php?id=<?= $_SESSION['userid']; ?>");
    });
</script>
<script>
    function submitvalue() {
        var uid = document.getElementById('uid').value;
        var comment = document.getElementById('comment').value;
        $.post("commentapi.php", {
            comment: comment,
            userid: uid
        }, function (data, status) {
            $(document).ready(function () {
                $("#commentbox").load("getcomment.php?id=<?= $_SESSION['userid']; ?>");
            });
        });


    }
</script>
<?php
include "footer.php"
?>