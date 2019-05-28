<?php
include "header.php";
?>
<hr>

<div class="row" id="row1">

</div>
<script>
    $(document).ready(function () {
        $("#row1").load("getcomment.php");
    });
</script>
<script>
    function storevalue(cid) {
        var reply = document.getElementById(cid).value;
        $(document).ready(function () {
            $.post("replycomment.php", {
                cid: cid,
                reply: reply
            }, function (data, status) {
                $(document).ready(function () {
                    $("#row1").load("getcomment.php");

                });
            });

        });
    }
</script>
<?php
include "footer.php"
?>