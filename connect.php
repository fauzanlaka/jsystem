<?php 
	$serverName	  = "localhost";
	$userName	  = "root";
	$userPassword	  = "7063253";
	$dbName	  = "jisda_system";

	$con = mysqli_connect($serverName,$userName,$userPassword,$dbName);
        mysqli_query($con,"SET NAMES UTF8"); 
        
	if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
		exit();
	}
        
        
	//*** Reject user not online
	$intRejectTime = 1; // Minute
	$sql = "UPDATE user SET LoginStatus = '0', LastUpdate = '0000-00-00 00:00:00'  WHERE 1 AND DATE_ADD(LastUpdate, INTERVAL $intRejectTime MINUTE) <= NOW() ";
	$query = mysqli_query($con,$sql);

?>
