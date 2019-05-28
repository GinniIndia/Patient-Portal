<?php
include "header1.php";
?>

<?php

    $id = $_GET['hid'];

    $data = mysqli_query($link, "select * from tbl_doctors where h_id='$id'");
    if (mysqli_affected_rows($link)) {
        while ($row = mysqli_fetch_array($data)) {
            ?>
            <hr>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-4">
                        <img src="<?= substr($row['photo'], 3); ?>" class="img-responsive">
                    </div>
                    <div class="col-md-4">
                        <h3><?= $row['name']; ?></h3>
                        <h4><?= $row['department']; ?></h4>
                        <h5><?= $row['qualification']; ?></h5>
                        <h5>Experience:<?= $row['experience']; ?></h5>
                    </div>

                    <button type="button" class="bbbton" id="bttttn" data-toggle="modal" data-target="#myModal" data-id="<?= $row['id']; ?>">Appointment</button>
                </div>

            </div>
            <?php
        }
    }

?>
<div class="col-md-4 bton">

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" style="z-index:999999">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background:#0066cc;color:white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Appointment Form!</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type='hidden' value='<?= $_SESSION['userid']; ?>' name='userid' id="<?= $_SESSION['userid']; ?>">
                        <input type='hidden' value='' name='doctorid' id="doctorid">
                        <h5>Date:</h5>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" placeholder="yyyy/mm/dd" class="form-control" id="date" name="date" required>
                        </div>
                        <input id="sysd" value="<?= date('d/m/Y'); ?>" type="hidden">
                        <p><?= date('d/m/Y'); ?></p>
                        <p id="answer" style="color:red;"></p>
                        <h5>Time:</h5>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                            <select class="form-control" name="timing" id="time" required>
                                <option value="" >Select Timing</option>
                                <option value="9-10AM">9-10AM</option>
                                <option value="10-11AM">10-11AM</option>

                                <option value="11-12AM">11-12AM</option>
                                <option value="12-1PM">12-1PM</option>
                                <option value="1-2PM">1-2PM</option>
                                <option value="2-3PM">2-3PM</option>
                                <option value="3-4PM">3-4PM</option>
                                <option value="4-5PM">4-5PM</option>
                            </select>

                        </div>
                        <p id="api" style="color:red;"></p>

                        <input type="button" value="submit" id="submit" name='appointment' onclick="comparestringhere(document.getElementById('doctorid').value)">
                        <input type='reset'>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>


        </div>
    </div>
</div>

<script>
    $(document).on("click", "#bttttn", function () {
        var myBookId = $(this).data('id');
        $(".modal-body #doctorid").val(myBookId);
        // As pointed out in comments, 
        // it is superfluous to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });
</script>
<script>
    function comparestringhere(didd) {
        var date = document.getElementById('date').value;
        var uidd =<?= $_SESSION['userid']; ?>;
        var sysd = document.getElementById('sysd').value;
        var y = parseInt(date.substr(0, 4));
        var Y = parseInt(sysd.substr(6, 9));
        document.getElementById('answer').innerHTML = "";
        document.getElementById('api').innerHTML = "";
        if ((y - Y) == 0) {
            var m = parseInt(date.substr(5, 6));
            var M = parseInt(sysd.substr(3, 4));
            if ((m - M) == 0) {
                var d = parseInt(date.substr(8, 9));
                var D = parseInt(sysd.substr(0, 1));
                if ((d - D) < 0) {
                    document.getElementById('answer').innerHTML = "1.Present Date onward are allowed....";
                    return;
                }
            }
            else if ((m - M) < 0) {
                document.getElementById('answer').innerHTML = "2.Present Date onward are allowed....";
                return;
            }
        }
        else if ((y - Y) < 0) {
            document.getElementById('answer').innerHTML = "3. Present Date onward are allowed....";
            return;
        }
        /* xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function () {
         if (this.readyState == 4 && this.status == 200) {
         document.getElementById('api').innerHTML = this.responseText;
         }
         };*/
        var time = document.getElementById('time').value;
        var date = document.getElementById('date').value;
        /* xhttp.open("POST", "appointapi.php", true);
         xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xhttp.send("uid="+uid+"&did="+did+"&timing="+time+"&date="+date);*/
        $(document).ready(function () {
            $.post("appointapi.php", {
                uid: uidd,
                did: didd,
                timing: time,
                date: date},
            function (data, status) {
                document.getElementById('api').innerHTML = data;
            });
        });
    }
</script>
<!----------------end profile-------------------->
<?php
include "footer.php";
?>
