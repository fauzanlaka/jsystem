<br>
<?php
$id = mysqli_real_escape_string($con, $_POST['id']);
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$telephone = mysqli_real_escape_string($con, $_POST['telephone']);
$status = mysqli_real_escape_string($con, $_POST['status']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

if(isset($_POST['save'])){
    if(!empty($_FILES['image']['tmp_name'])){
        if(move_uploaded_file($_FILES["image"]["tmp_name"],"module/user/image/".$_FILES["image"]["name"])){
                $update = "UPDATE user SET 
                           u_fname='".$fname."',
                           u_lname='".$lname."',
                           u_email='".$email."',
                           u_telephone='".$telephone."',
                           u_sex='".$gender."',
                           u_status='".$status."',
                           u_image='".$_FILES["image"]["name"]."',
                           u_user='".$username."',
                           u_passwod='".$password."'
                           WHERE u_id='$id'"; 
                if(mysqli_query($con, $update)){ ?>
                       <div class="alert alert-dismissible alert-success">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>Berhasil !</strong> Data sudah di perbaharui <a href="?page=user&&userpage=list" class="alert-link">Klik untuk lihat</a>.
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
       }
    }else{
               $update = mysqli_query($con, "UPDATE user SET 
                           u_fname='".$fname."',
                           u_lname='".$lname."',
                           u_email='".$email."',
                           u_telephone='".$telephone."',
                           u_sex='".$gender."',
                           u_status='".$status."',
                           u_user='".$username."',
                           u_passwod='".$password."'
                           WHERE u_id='$id'"); 
    
?>
                       <div class="alert alert-dismissible alert-success">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>Berhasil !</strong> Data sudah di perbaharui <a href="?page=user&&userpage=list" class="alert-link">Klik untuk lihat</a>.
                       </div>
<?php
    }
}
?>
