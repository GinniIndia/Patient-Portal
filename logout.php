<?php
ob_start();
session_start();
unset($_SESSION['userid']);
unset($_SESSION['logout']);
//Reset OAuth access token

//Destroy entire session
session_destroy();
ob_end_flush();

//Redirect to homepage
header("Location:login-to-your-account/");
?>