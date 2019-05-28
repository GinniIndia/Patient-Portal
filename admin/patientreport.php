<?php
include "header.php"
?>
        <div class="col-md-8 col-md-offset-2" class="form-group">
            <form method="post" enctype="multipart/form-data">
               
                <h4>Report(pdf):</h4>
                <input type="file" name="pdf" class="form-control" required>
                <p id="error" style="color:red;"></p>
                <h4>Message Info:</h4>
                 <input type="text" name="message" class="form-control">
                  <p id="ok" style="color:green;"></p>
                 <input type="submit" name="sub" class="btn btn-info">
                 <?php
                 if(isset($_POST['sub'])) {
                     $pdfname=$_FILES["pdf"]["name"];
                     $pdftmp=$_FILES['pdf']['tmp_name'];
                     $mulval=pathinfo($pdfname);
                     if(strtolower($mulval['extension'])!="pdf") {
                         echo "<script>document.getElementById('error').innerHTML='Error in report!';</script>";
                     }
                     else {
                         $msg=  mysqli_real_escape_string($link,$_POST['message']);
                         $ran=rand(0000,99999);
                         $pdf="../uploadsreport/" . $ran . date("Y-m-d") . "." . $mulval['extension'];
                         move_uploaded_file($pdftmp,$pdf);
                         $aid=$_GET['aid'];
                         $result=mysqli_query($link,"insert into tbl_report(aid,info,report) values ('$aid','$msg','$pdf')");
                         if(mysqli_affected_rows($link)) {
                              echo "<script>document.getElementById('ok').innerHTML='Successfully Uploaded!';</script>";
                         }
                     }
                 }
                     
                     
                     ?>
            </form>
        </div>
   <?php
   include "footer.php";
   ?>