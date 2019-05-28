<?php
    include "config.php";
    echo $_POST['comment'];
    if(!empty($_POST['comment']) && !empty($_POST['userid'])) {
    $ucomment = mysqli_real_escape_string($link, $_POST['comment']);
    $uid =  mysqli_real_escape_string($link, $_POST['userid']);
    $result = mysqli_query($link, "insert into tbl_comment(uid,ucomment) values('$uid','$ucomment')");
    echo "success";
    }
    else {
        echo "All fields are required";
    }
    mysqli_close($link);
?>