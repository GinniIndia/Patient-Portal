<?php
ob_start();
session_start();
//session_destroy();
unset($_SESSION['adminid']);
ob_end_flush();
header("location:dashboard.php");
?>