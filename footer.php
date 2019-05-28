<!-----------footer---------->

<div class="row" style="background:black;" >

    <div class="col-md-10 col-md-offset-1" style="padding-bottom:20px;">
        <div class="row">
            <div class="col-md-3" style="color:white;">
                <h3>Patient Portal</h3>
                <h4>Apka Portal Patient Portal</h4>
                <h5>Address:NIT KKR</h5>
                <h5>Callus:+91-8295954475</h5>
                <h5>Email:gargginni01@gmail.com</h5>
            </div>
            <div class="col-md-3" style="color:white;">
                <h3>Instagram</h3>
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <img src="image/doctor10.jpg" class=" img-responsive footimg" >
                    </div>

                    <div class="col-md-6 col-xs-6">
                        <img src="image/doctor11.jpg" class=" img-responsive footimg" >

                    </div>
                    <div class="col-md-6 col-xs-6">
                        <img src="image/doc2.jpg" class=" img-responsive footimg" >

                    </div>
                    <div class="col-md-6 col-xs-6">
                        <img src="image/doctor12.jpg        " class=" img-responsive footimg" >

                    </div>

                </div>
            </div>

            <div class="col-md-3 col-xs-12">
                <h3 style="color:white;">Useful Links:</h3>
                <h5> <a href="index.php" style="color:white;">Home</a></h5>
                <h5> <a href="aboutus.php" style="color:white;">About us</a></h5>
                <h5><a href="login1.php" style="color:white;">Login</a></h5>

            </div>
            <div class="col-md-3" style="color:white;">
                <h3>Opening Hours:</h3>
                <h5>Monday-Friday........9:00-17:00</h5>
                <h5>Saturday....9:00-17:00</h5>
                <h5>Sunday....9:00-13:30</h5>
                 <a href="admin/../adminhospital/dashboard.php" target="black" style="color:black">H_Admin</a>
            </div>

        </div>
    </div>


    <div class="col-md-12" style=";padding-top:10px;;border-top: 1px solid #fff;">

        <div class="col-md-2">
            <a href="admin/dashboard.php" target="blank" style="color:black;">Admin</a>
        </div> 
        <div class="col-md-8" align="center" >

            <h5 style="color:white;">Copyright &copy 2018.All right Reserved</h5>
        </div>  
        <div class="col-md-2">
           
        </div> 
    </div>  
</div>

<!-----------------end------------>


<!-----------top button------>
<div class="row">
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true" style="color:#0066cc;"></i></button>
</div>
<!--end button-->

</div>







<script>
    AOS.init({
        duration: 3000
    });
</script>
<!-- #region Jssor Slider Begin -->
<!-- Generator: Jssor Slider Maker -->
<!-- Source: https://www.jssor.com -->






<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()

    };
    var header = document.getElementById("header");
    var sticky = header.offsetTop;

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<?php
mysqli_close($link);
?>
</body>
</html>

