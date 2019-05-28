<?php
ob_start();
session_start();
if (empty($_SESSION['userid'])) {
    header("location:http://localhost/hospital/login-to-your-account/");
    exit();
}
include "config.php";
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Patient Portal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="http://localhost/hospital/">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="css/aos.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/aos.js.download"></script>
        <script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
        <style>
            hr {
                display: block;
                height: 1px;
                border: 0;
                border-top: 2px solid #ccc;
                margin: 1em 0;
                padding: 0; 
            }
            @media screen and (min-width: 600px) {
                .imgg{
                    text-align:center;

                }
                .bton{
                    position:relative;top:30px;
                }

            }
            @media screen and (max-width: 600px) {
                .navnew{
                    width:100px;
                }
            }
            @media screen and (min-width: 600px) {
                .navnew{
                    width:120px;
                }
            }


            .rnew{

                width: 60px;
                height: 22px;
                background-color:#0066cc;
                -ms-transform: rotate(10deg); /* IE 9 */
                -webkit-transform: rotate(20deg); /* Safari 3-8 */
                transform: rotate(50deg);
                position:relative;
                right:-55px;
            }
        </style>
    </head>
    <body style="font-family: 'Muli', sans-serif;">
        <div class="container-fluid">

            <!---------------------start row 1---------->
            <div class="row hidden-xs" style="background: #0066cc;">



                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-7" style="padding-top:10px;padding-bottom: 10px;">
                            <span style="border-left:.5px solid blue;">
                                <span style="border-left:.7px solid blue;">
                                    <a class="row1">English</a>

                                    <a class="row1">Have a question?Contact us..</a>

                                    <a style="color:white;cursor:pointer;padding-right:8px;padding-left:8px;"> <span><i class="fa fa-phone" data-aos="fade-down" aria-hidden="true"></i></span>&nbsp;<a style="cursor:pointer;color:white;padding-right:8px;border-right:1px solid white;" data-aos="fade-up">+91-8295954475</a></a> 

                                    </div>

                                    <div class="col-md-1"></div>
                                    <div class="col-md-4" style="padding-top:10px;padding-bottom: 10px;" align="right">
                                        <span class="row1"><i class="fa fa-facebook" data-aos="fade-up" aria-hidden="true"></i></span>

                                        <span class="row1"><i class="fa fa-twitter" data-aos="fade-down" aria-hidden="true"></i></span>

                                        <span class="row1"><i class="fa fa-google-plus" data-aos="fade-up" aria-hidden="true"></i></span>
                                    </div>
                                    </div>
                                    </div>


                                    </div>

                                    <!-----------end 1-------->

                                    <!---------start 2-------->

                                    <div class="row" id="header">

                                        <nav class="navbar" style="z-index: 999999;" >
                                            <div class="container-fluid col-md-10 col-md-offset-1" style="padding-bottom: 15px;padding-top: 15px;">
                                                <!-- Brand and toggle get grouped for better mobile display -->
                                                <div class="navbar-header ">


                                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="border-color:#0066cc;">
                                                        <span class="sr-only">Toggle navigation</span>
                                                        <span class="icon-bar" style="background:#0066cc;"></span>
                                                        <span class="icon-bar" style="background:#0066cc;"></span>
                                                        <span class="icon-bar" style="background:#0066cc;"></span>
                                                    </button>


                                                    <img src="image/logo2.png" class="img-responsive navnew" data-aos="fade-right">


                                                </div>

                                                <!-- Collect the nav links, forms, and other content for toggling -->
                                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                                    <ul class="nav navbar-nav navbar-right">
                                                        <li><a href="User-Profile/">Profile</a></li>

                                                        <?php
                                                        $result = mysqli_query($link, "select * from tbl_city");
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            $id = $row[0];
                                                            ?>
                                                            <li class="dropdown">
                                                                <a class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer;"><?= $row['name']; ?>

                                                                    <span class="caret"></span></a>
                                                                <ul class="dropdown-menu">
                                                                    <?php
                                                                    $result1 = mysqli_query($link, "select * from tbl_hospital where city='$id'");
                                                                    while ($row1 = mysqli_fetch_array($result1)) {
                                                                        ?>
                                                                        <li><a href="<?= $row1['name'];?>/<?= $row1[0]; ?>/"><?= $row1['name']; ?></a></li>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </ul>


                                                            </li>

                                                            <?php
                                                        }
                                                        ?>

                                                        <li><a href="Query-at-Admin/" class="alink">Any Query</a></li>

                                                        <li><a href ="<?= $_SESSION['logout']; ?>" class = "alink">LogOut</a></li>

                                                    </ul>

                                                </div><!--/.navbar-collapse -->
                                            </div><!--/.container-fluid -->
                                        </nav>



                                    </div>
                                    <!-----------end navbar------------->
