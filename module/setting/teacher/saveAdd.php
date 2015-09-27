<?php
	$t_fnameRumi = mysqli_real_escape_string($con, $_POST['t_fnameRumi']);
	$t_lnameRumi = mysqli_real_escape_string($con, $_POST['t_lnameRumi']);
	$t_fnameArab = mysqli_real_escape_string($con, $_POST['t_fnameArab']);
	$t_lnameArab = mysqli_real_escape_string($con, $_POST['t_lnameArab']);
	$t_gender = $_POST['t_gender'];
	$t_cityzenid = mysqli_real_escape_string($con, $_POST['t_cityzenid']);
	$t_housenumber = mysqli_real_escape_string($con, $_POST['t_housenumber']);
	$t_placenumber = mysqli_real_escape_string($con, $_POST['t_placenumber']);
	$t_village = mysqli_real_escape_string($con, $_POST['t_village']);
	$t_subdistrict = mysqli_real_escape_string($con, $_POST['t_subdistrict']);
	$t_district = mysqli_real_escape_string($con, $_POST['t_district']);
	$t_province = mysqli_real_escape_string($con, $_POST['t_province']);
	$t_postcode = mysqli_real_escape_string($con, $_POST['t_postcode']);
	$t_telephone = mysqli_real_escape_string($con, $_POST['t_telephone']);
	$t_email = mysqli_real_escape_string($con, $_POST['t_email']);
	$t_username = mysqli_real_escape_string($con, $_POST['t_username']);
	$t_password = mysqli_real_escape_string($con, $_POST['t_password']);

	//Existing teacher data checking
	$identitynumber = mysqli_query($con, "SELECT * FROM teachers WHERE t_cityzenid='$t_cityzenid'");
	$row1 = mysqli_fetch_array($identitynumber);
        
    //Existing teacher username checking
	$username = mysqli_query($con, "SELECT * FROM teachers WHERE t_username='$t_username'");
	$row2 = mysqli_fetch_array($username);

	if($row1[0] > 0){
?>
        <br>
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <p>Data sudah ada</p>
        </div>
<?php
        include 'module/setting/teacher/add.php';
        }elseif($row2){
?>
        <br>
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <p>Username sudah di guna</p>
        </div>
<?php
		include 'module/setting/teacher/add.php';
        }else{
			$sql = mysqli_query($con, "INSERT INTO teachers (t_fnameRumi) VALUES ($t_fnameRumi)");	
        }
?>