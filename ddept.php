<?php
include 'dbconfig.php';

$deptid = $_GET['deptid'];
mysqli_query($con,"DELETE FROM `department` WHERE `deptid` = '$deptid' ");
if(mysqli_affected_rows($con))
{
    Print '<script>alert("Department Deleted Successfully");</script>'; 
    Print '<script>window.location.assign("ViewDepartment.php");</script>'; 
}

?> 