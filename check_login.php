<?php
function login(){
	session_start();

	require_once("connect.php");
	
        if(isset($_POST['save'])){
	$strUsername = mysqli_real_escape_string($con,$_POST['txtUsername']);
	$strPassword = mysqli_real_escape_string($con,$_POST['txtPassword']);

	$strSQL = "SELECT * FROM user WHERE u_user = '".$strUsername."' and u_passwod = '".$strPassword."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult){
            $strSQL1 = "SELECT * FROM teachers WHERE t_username = '".$strUsername."' and t_password = '".$strPassword."'";
            $objQuery1 = mysqli_query($con,$strSQL1);
            $objResult1 = mysqli_fetch_array($objQuery1);
            
            echo "Tunggu sekejab...";

            //*** Session
            $_SESSION["UserID"] = $objResult1["t_id"];
            $_SESSION["password"] = $objResult1["t_password"];
            $_SESSION["status"] = $objResult1["t_status"];
            session_write_close();
            
        }if(!$objResult){
            //*** Go to Main page
            header("location:main.php?page=main");
            
		echo "NO.POKOK atau PASSWORD salah ,";?> <a href="index.php">Login lagi</a>
	<?php	exit();
	}else{
                        echo "Tunggu sekejab...";

			//*** Session
			$_SESSION["UserID"] = $objResult["u_id"];
                        $_SESSION["password"] = $objResult["u_passwod"];
                        $_SESSION["status"] = $objResult["u_status"];
			session_write_close();

			//*** Go to Main page
			header("location:main.php?page=main");
		}
			
	}
	mysqli_close($con);
    }   
?>