<?php
include 'dbconfig.php';

$bookid = $_GET['bookid'];
mysqli_query($con,"DELETE FROM `book` WHERE `bookid` = '$bookid' ");
if(mysqli_affected_rows($con))
{
    Print '<script>alert("Book Deleted Successfully");</script>'; 
    Print '<script>window.location.assign("ViewBooks.php");</script>'; 
}

?> 