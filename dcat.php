<?php
include 'dbconfig.php';

$catid = $_GET['catid'];
mysqli_query($con,"DELETE FROM `category` WHERE `catid` = '$catid' ");
if(mysqli_affected_rows($con))
{
    Print '<script>alert("Category Deleted Successfully");</script>'; 
    Print '<script>window.location.assign("ViewCat.php");</script>'; 
}

?> 