<?php
include 'dbconfig.php';

$requestid = $_GET['requestid'];
mysqli_query($con,"UPDATE `requesttable` set rstatus = 1 WHERE `requestid` = '$requestid' ");
if(mysqli_affected_rows($con))
{
    Print '<script>alert("Request Accepted Successfully");</script>'; 
    Print '<script>window.location.assign("viewothers.php");</script>'; 
}

?> 