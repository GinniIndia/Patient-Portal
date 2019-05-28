<?php

include "config.php";
$date = $_POST['date'];
$timing = $_POST['timing'];
$id = $_POST['uid'];
$doctorid = $_POST['did'];

 if(!(empty($date)) && !(empty($timing)) && !(empty($id)) && !(empty($doctorid))) {
$result = mysqli_query($link, "select * from tbl_appointment where did='$doctorid' && time='$timing' and date='$date'");

  $count = mysqli_num_rows($result);
  if ($count >= 3) {
  echo "Max 3 appointment in one slot..Slot Full..Try Another Slot..";
  } else {
  $result = mysqli_query($link, "insert into tbl_appointment(uid,did,date,time) values ('$id','$doctorid','$date','$timing')");
  if (mysqli_affected_rows($link)) {
  echo "Appointment Successful";
  } else {
  echo "Appointment Failed";
  }
  }
 }
 else {
     echo "All Fields are required*";
 }
 mysqli_close($link);
?>