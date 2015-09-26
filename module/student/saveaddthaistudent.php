<?php
    $id = $_POST['id'];
    $t_studentname = mysqli_real_escape_string($con, $_POST['t_studentname']);
    $t_studentlastname = mysqli_real_escape_string($con, $_POST['t_studentlastname']);
    $t_province = mysqli_real_escape_string($con, $_POST['t_province']);
    $t_fathername = mysqli_real_escape_string($con, $_POST['t_fathername']);
    $t_fatherlastname = mysqli_real_escape_string($con, $_POST['t_studentlastname']);
    $t_mothername = mysqli_real_escape_string($con, $_POST['t_mothername']);
    $t_motherlastname = mysqli_real_escape_string($con, $_POST['t_motherlastname']);
    $t_village_name = mysqli_real_escape_string($con, $_POST['t_village_name']);
    $house_number = mysqli_real_escape_string($con, $_POST['house_number']);
    $place = mysqli_real_escape_string($con, $_POST['place']);
    $t_road = mysqli_real_escape_string($con, $_POST['t_road']);
    $t_subdistrict = mysqli_real_escape_string($con, $_POST['t_subdistrict']);
    $t_district = mysqli_real_escape_string($con, $_POST['t_district']);
    $t_province_sec = mysqli_real_escape_string($con, $_POST['t_province_sec']);
    $post = mysqli_real_escape_string($con, $_POST['post']);
    
    $insert = mysqli_query($con, "UPDATE students SET 
                            t_studentname='".$t_studentname."',
                            t_studentlastname='".$t_studentlastname."',
                            t_province='".$t_province."',
                            t_fathername='".$t_fathername."',
                            t_fatherlastname='".$t_fatherlastname."',
                            t_mothername='".$t_mothername."',
                            t_motherlastname='".$t_motherlastname."',
                            t_village_name='".$t_village_name."',
                            house_number='".$house_number."',
                            place='".$place."',
                            t_road='".$t_road."',
                            t_subdistrict='".$t_subdistrict."',
                            t_district='".$t_district."',
                            t_province_sec='".$t_province_sec."',
                            post='".$post."'
                            where st_id='$id';
                            ");
?>
<br>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Berhasil!</strong> Data berhasil di rakam <a href="?page=student&&studentpage=edit&&id=<?= $id ?>" class="alert-link">Klik untuk lihat</a>.
</div>
