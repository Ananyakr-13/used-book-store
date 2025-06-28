<?php
include 'dbconfig.php';

$studid = $_GET['studid'];
mysqli_query($con,"UPDATE `student` set isActive = 1 WHERE `studid` = '$studid' ");
if(mysqli_affected_rows($con))
{
    Print '<script>alert("Student Verified Successfully");</script>'; 
    Print '<script>window.location.assign("studlist.php");</script>'; 
}

?> 