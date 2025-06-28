<?php 

$con=new mysqli("localhost","root","root","ubs");
if($con->connect_error)
{
	echo "Database Connection Failed";
}

?>