<?php

	include("dbconfig.php");
	session_start();
	$ad_name = mysqli_real_escape_string($con, $_POST['admname']);
	$ad_pass = mysqli_real_escape_string($con, $_POST['password']);
	

	
	$sql = "SELECT * FROM admin WHERE adminName='".$ad_name."' AND adminPass='".$ad_pass."'";

	echo $sql;
	$query = mysqli_query($con, $sql);
	$exists = mysqli_num_rows($query);
	$tbl_ad_name="";
	$tbl_ad_pass="";
	

		while($row = mysqli_fetch_assoc($query))
		{
			$tbl_ad_name = $row['adminName'];
			$tbl_ad_pass = $row['adminPass'];
		}
		if(($ad_name == $tbl_ad_name) && ($ad_pass == $tbl_ad_pass))
		{
			if($ad_pass == $tbl_ad_pass)
			{
				$_SESSION['admin'] = $ad_name;
				header("location:AdminHome.php");
			}
			else
			{
				Print '<script>alert("Incorrect username or Password!");</script>'; 
				Print '<script>window.location.assign("AdminLogin.php");</script>'; 
			}
				
		}
		else	
			{
				Print '<script>alert("Incorrect username or Password!!");</script>'; 
				Print '<script>window.location.assign("AdminLogin.php");</script>'; 
			}
		

	
?>