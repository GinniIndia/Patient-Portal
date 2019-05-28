<?php

require_once 'config.php';
if (!empty($_POST['reply'] && !empty($_POST['cid']))) {
    $reply = mysqli_real_escape_string($link, $_POST['reply']);
    $cid = mysqli_real_escape_string($link, $_POST['cid']);
    $result = mysqli_query($link, "update tbl_comment set reply='$reply' where id='$cid'");
} else {
    echo "Reply is required";
}
?>