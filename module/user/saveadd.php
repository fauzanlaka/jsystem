<br>
<?php
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$telephone = mysqli_real_escape_string($con, $_POST['telephone']);
$status = mysqli_real_escape_string($con, $_POST['status']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$regisdate = date('Y-m-d');

//-----------------------------------------------------------------------------
//Set u_codename
if($status == "Admin"){
    $codename = "AD";
}elseif ($status == "Amir kuliah") {
    $codename = "AM";
}elseif ($status == "Pengurus data") {
    $codename = "PE";
}elseif($status == "Kewangan"){
    $codename = "KE";
}

//-----------------------------------------------------------------------------
//Buat codename
$q_identitynumber = "SELECT max(u_codenumber) AS mx FROM user";
$record = mysqli_query($con, $q_identitynumber) or die(mysqli_error());
$row = mysqli_fetch_assoc($record);
$mem_old = $row['mx'];// gives the highest id

$tmp1=substr($mem_old,1);
$tmp2=$tmp1+1;

if($tmp2 <= 9 && $status=="Admin"){
    $tmp3='000'.$tmp2;
}elseif($tmp2 <= 9 && $status=="Amir kuliah"){
    $tmp3='000'.$tmp2;
}elseif($tmp2 <= 9 && $status=="Pengurus data"){
    $tmp3='000'.$tmp2;
}elseif($tmp2 <= 9 && $status=="Kewangan"){
    $tmp3='000'.$tmp2;
}

if($tmp2 >9 && $tmp2 <= 99 && $status=="Admin"){
    $tmp3='00'.$tmp2;
}elseif($tmp2 >9 && $tmp2 <= 99 && $status=="Amir kuliah"){
    $tmp3='00'.$tmp2;
}elseif($tmp2 >9 && $tmp2 <= 99 && $status=="Pengurus data"){
    $tmp3='00'.$tmp2;
}elseif($tmp2 >9 && $tmp2 <= 99 && $status=="Kewangan"){
    $tmp3='00'.$tmp2;
}

if($tmp2 >99 && $tmp2 <= 999 && $status=="Admin"){
    $tmp3='0'.$tmp2;
}elseif($tmp2 >99 && $tmp2 <= 999 && $status=="Amir kuliah"){
    $tmp3='0'.$tmp2;
}elseif($tmp2 >99 && $tmp2 <= 999 && $status=="Pengurus data"){
    $tmp3='0'.$tmp2;
}elseif($tmp2 >99 && $tmp2 <= 999 && $status=="Kewangan"){
    $tmp3='0'.$tmp2;
}

//echo $tmp3;

//-----------------------------------------------------------------------------
//Check username supa
$check = mysqli_query($con , "SELECT * FROM user WHERE u_user='$username'");
$result = mysqli_fetch_array($check);

if($result[0] > 0){
?>
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>ผิดพลาด !</strong> <a href="#" class="alert-link">ชื่อผู้ใช้นี้ถูกใช้เเล้ว </a> กรุณาเลือกชื่อผู้ใช้อื่น
    </div>
<?php
}else{
    if(isset($_POST['save'])){
        if(!empty($_FILES['image']['tmp_name'])){
            if(move_uploaded_file($_FILES["image"]["tmp_name"],"module/user/image/".$_FILES["image"]["name"])){
                $sql = mysqli_query($con, "INSERT INTO user 
                       (u_fname,u_lname,u_telephone,u_email,u_sex,u_status,u_image,u_codename,u_codenumber,u_regisdate,u_user,u_passwod) VALUES 
                       ('$fname','$lname','$telephone','$email','$gender','$status','".$_FILES["image"]["name"]."','$codename','$tmp3','$regisdate','$username','$password')
                       ");
?>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Berhasil!</strong> Data berhasil di simpan.
            </div>
<?php
            }else{
?>
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Gagal!</strong> <a href="#" class="alert-link">Upload gambar gagal</a>
                </div>
<?php
            }
       }else{
           $sql = mysqli_query($con, "INSERT INTO user 
                  (u_fname,u_lname,u_telephone,u_email,u_sex,u_status,u_codename,u_codenumber,u_regisdate,u_user,u_passwod) VALUES 
                  ('$fname','$lname','$telephone','$email','$gender','$status','$codename','$tmp3','$regisdate','$username','$password')
                  ");
?>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Berhasil!</strong> Data berhasil di simpan.
            </div>
<?php
       }
    }
}
?>