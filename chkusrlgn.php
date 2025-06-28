<?php

	include("dbconfig.php");
	session_start();
	$ad_name = mysqli_real_escape_string($con, $_POST['admname']);
    $ad_pass = md5(mysqli_real_escape_string($con, $_POST['password']));
	

	
	$sql = "SELECT * FROM student WHERE studusn='".$ad_name."' AND studpass='".$ad_pass."'";

	echo $sql;
	$query = mysqli_query($con, $sql);
	$exists = mysqli_num_rows($query);
	$tbl_ad_name="";
	$tbl_ad_pass="";
	

		while($row = mysqli_fetch_assoc($query))
		{
			$tbl_ad_name = $row['studusn'];
			$tbl_ad_pass = $row['studpass'];
            $tbl_stud_id = $row['studid'];
            $tbl_stud_name = $row['studname'];
		}
		if(($ad_name == $tbl_ad_name) && ($ad_pass == $tbl_ad_pass))
		{
			if($ad_pass == $tbl_ad_pass)
			{
				$_SESSION['studName'] = $tbl_stud_name;
                $_SESSION['studid'] = $tbl_stud_id;
				header("location:StudentHome.php");
			}
			else
			{
				Print '<script>alert("Incorrect username or Password!");</script>'; 
				Print '<script>window.location.assign("StudLogin.php");</script>'; 
			}
				
		}
		else	
			{
                
				Print '<script>alert("Incorrect username or Password!!");</script>'; 
				Print '<script>window.location.assign("StudLogin.php");</script>'; 
			}
		

	
?>