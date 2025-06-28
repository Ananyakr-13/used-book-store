<?php
session_start();

include 'dbconfig.php';

$fkbookid = $_GET['bookid'];
$fkfromstudid =$_SESSION['studid'];

//echo $fkbookid;
//echo $fkfromstudid;


$sql = "SELECT * FROM book WHERE `bookid` = '$fkbookid'";
$data = mysqli_query($con,$sql);
$fktostudid= 0;
while($row = mysqli_fetch_assoc($data))
{
    if($row["fkstudid"])
    {
        $fktostudid = $row["fkstudid"];
    }
}
   
//echo $fktostudid;

$sqlexist = "SELECT * FROM requesttable WHERE `fkbookid` = '$fkbookid' && fkfromuserid='$fkfromstudid'";
$data1 = mysqli_query($con,$sqlexist);
$exists = mysqli_num_rows($data1);

echo $exists;

if($exists == 1)
{
    Print '<script>alert("Already Requested");</script>'; 
    Print '<script>window.location.assign("ViewMyRequest.php");</script>'; 
}
else
{
    $sqlinsert = "INSERT INTO `requesttable`(fkfromuserid,fktouserid,fkbookid,rstatus) VALUES ('".$fkfromstudid."','".$fktostudid."','".$fkbookid."',0)";
    mysqli_query($con,$sqlinsert);
    if(mysqli_affected_rows($con))
    {
        Print '<script>alert("Request Sent Successfully");</script>'; 
        Print '<script>window.location.assign("ViewMyRequest.php");</script>'; 
    }
}



?>