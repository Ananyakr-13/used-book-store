<?php
session_start();

include 'dbconfig.php';

$fkcatid = $_GET['catid'];
$fkstudid =$_SESSION['studid'];
$sql = "SELECT * FROM book WHERE `fkcatid` = '$fkcatid' and `fkstudid` != $fkstudid";
//echo $sql;
$data = mysqli_query($con,$sql);
$json_array[] = array();

while($row = mysqli_fetch_assoc($data))
{
    $json_array[] = $row;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($json_array);

?>