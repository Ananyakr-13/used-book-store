<?php
include 'dbconfig.php';

$bookid = $_GET['bookid'];
mysqli_query($con,"UPDATE `book` set booksold = 1 WHERE `bookid` = '$bookid' ");
if(mysqli_affected_rows($con))
{
    Print '<script>alert("Status Updated Successfully");</script>'; 
    Print '<script>window.location.assign("ViewBooks.php");</script>'; 
}

?> 