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

	//Creat teacher code(t_code)
	$t_code = "SELECT max(t_code) AS mx FROM teachers";
	$record = mysqli_query($con, $t_code) or die(mysqli_error());
	$row = mysqli_fetch_assoc($record);
	$mem_old = $row['mx'];// gives the highest id

	$tmp1=substr($mem_old,2);
	$tmp2=$tmp1+1;

	if($tmp2 <= 9){
	    $tmp3='PE000'.$tmp2;
	}elseif($tmp2 <= 9){
	    $tmp3='PE000'.$tmp2;
	}elseif($tmp2 <= 9){
	    $tmp3='PE000'.$tmp2;
	}elseif($tmp2 <= 9){
	    $tmp3='PE000'.$tmp2;
	}

	//-------------------------------------------------------------------------------------------------------
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
			if(!empty($_FILES['image']['tmp_name'])){
				if(move_uploaded_file($_FILES["image"]["tmp_name"],"module/setting/teacher/image/".$_FILES["image"]["name"])){
				$sql = mysqli_query($con, 
					"INSERT INTO teachers 
                                        (t_code,t_fnameArab,t_lnameArab,t_fnameRumi,t_lnameRumi,t_gender,t_cityzenid,t_housenumber,t_village,t_placenumber,t_subdistrict,t_district,t_province,t_postcode,t_telephone,t_email,t_username,t_password,t_image) 
                                        VALUES 
                                        ('$tmp3','$t_fnameArab','$t_lnameArab','$t_fnameRumi','$t_lnameRumi','$t_gender','$t_cityzenid','$t_housenumber','$t_village','$t_placenumber','$t_subdistrict','$t_district','$t_province','$t_postcode','$t_telephone','$t_email','$t_username','$t_password','".$_FILES["image"]["name"]."')
                                        ");
                                $q = mysqli_query($con, "SELECT * FROM teachers WHERE t_id = (SELECT MAX(t_id) FROM teachers)");
                                $r = mysqli_fetch_array($q);
                                $id = $r[t_id];
?>
                        <br>
                        <div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Berhasil!</strong> Data berhasil di simpan <a href="?page=setting&&settingpage=teacherEdit&&id=<?= $id ?>" class="alert-link"> Klik untuk lihat</a>
                        </div>
<?php	
			}else{
?>
                        <br>
			<div class="alert alert-dismissible alert-danger">
	                    <button type="button" class="close" data-dismiss="alert">×</button>
	                    <strong>Gagal!</strong> <a href="#" class="alert-link">Upload gambar gagal</a>
	                </div>
<?php
			}
			}else{
			$sql = mysqli_query($con, 
                        "INSERT INTO teachers 
	            	(t_code,t_fnameArab,t_lnameArab,t_fnameRumi,t_lnameRumi,t_gender,t_cityzenid,t_housenumber,t_village,t_placenumber,t_subdistrict,t_district,t_province,t_postcode,t_telephone,t_email,t_username,t_password) 
	            	VALUES 
	            	('$tmp3','$t_fnameArab','$t_lnameArab','$t_fnameRumi','$t_lnameRumi','$t_gender','$t_cityzenid','$t_housenumber','$t_village','$t_placenumber','$t_subdistrict','$t_district','$t_province','$t_postcode','$t_telephone','$t_email','$t_username','$t_password')
	            ");
                        $q = mysqli_query($con, "SELECT * FROM teachers WHERE t_id = (SELECT MAX(t_id) FROM teachers)");
                        $r = mysqli_fetch_array($q);
                        $id = $r[t_id];
?>
                        <br>
                        <div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Berhasil!</strong> Data berhasil di simpan <a href="?page=setting&&settingpage=teacherEdit&&id=<?= $id ?>" class="alert-link"> Klik untuk lihat</a>
                        </div>
<?php
			}
        }
?>