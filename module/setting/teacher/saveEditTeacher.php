<?php
        $id = $_GET['id'];
    
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
        
        if(!empty($_FILES['image']['tmp_name'])){
            if(move_uploaded_file($_FILES["image"]["tmp_name"],"module/setting/teacher/image/".$_FILES["image"]["name"])){
                $sql = mysqli_query($con, "UPDATE teachers SET
                                    t_fnameArab = '$t_fnameArab',
                                    t_lnameArab = '$t_lnameArab', 
                                    t_fnameRumi = '$t_fnameRumi',
                                    t_lnameRumi = '$t_lnameRumi',
                                    t_gender = '$t_gender',
                                    t_cityzenid = '$t_cityzenid',
                                    t_housenumber = '$t_housenumber',
                                    t_village = '$t_village',
                                    t_placenumber = '$t_placenumber',
                                    t_subdistrict = '$t_subdistrict',
                                    t_district = '$t_district',
                                    t_province = '$t_province',
                                    t_postcode = '$t_postcode',
                                    t_telephone = '$t_telephone',
                                    t_email = '$t_email',
                                    t_username = '$t_username',
                                    t_password = '$t_password',
                                    t_image = '".$_FILES["image"]["name"]."'    
                                    WHERE t_id='$id'
                                    ");
?>
                <br>
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Berhasil!</strong> Data berhasil di perbaharui.
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
            $sql = mysqli_query($con, "UPDATE teachers SET
                                    t_fnameArab = '$t_fnameArab',
                                    t_lnameArab = '$t_lnameArab', 
                                    t_fnameRumi = '$t_fnameRumi',
                                    t_lnameRumi = '$t_lnameRumi',
                                    t_gender = '$t_gender',
                                    t_cityzenid = '$t_cityzenid',
                                    t_housenumber = '$t_housenumber',
                                    t_village = '$t_village',
                                    t_placenumber = '$t_placenumber',
                                    t_subdistrict = '$t_subdistrict',
                                    t_district = '$t_district',
                                    t_province = '$t_province',
                                    t_postcode = '$t_postcode',
                                    t_telephone = '$t_telephone',
                                    t_email = '$t_email',
                                    t_username = '$t_username',
                                    t_password = '$t_password',
                                    t_image = '".$_FILES["image"]["name"]."'    
                                    WHERE t_id='$id'
                                    ");
?>
                <br>
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Berhasil!</strong> Data berhasil di perbaharui.
                </div>                
<?php
                include 'module/setting/teacher/editTeacher.php';
        }

?>
