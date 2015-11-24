<?php
    $status = $_SESSION["status"];
    $id = $_SESSION["UserID"];
    if($status == 'Pensyarah'){
        $sql = mysqli_query($con, "SELECT * FROM teachers WHERE t_id='$id'");
        $rs = mysqli_fetch_array($sql);
        $fname = str_replace("\'", "&#39;", $rs['t_fnameRumi']);
        $lname = str_replace("\'", "&#39;", $rs['t_lnameRumi']);
        $code = $rs['t_mcode'];
        $telephone = str_replace("\'", "&#39;", $rs['t_telephone']);
        $email = str_replace("\'", "&#39;", $rs['t_email']);
        $gender = str_replace("\'", "&#39;", $rs['t_gender']);
        $status = str_replace("\'", "&#39;", $rs['t_status']);
        $image = $rs['t_image'];
        $username = str_replace("\'", "&#39;", $rs['t_username']);
        $password = str_replace("\'", "&#39;", $rs['t_password']);
    }else{
        $sql = mysqli_query($con, "SELECT * FROM user WHERE u_id='$id'");
        $rs = mysqli_fetch_array($sql);
        $fname = str_replace("\'", "&#39;", $rs['u_fname']);
        $lname = str_replace("\'", "&#39;", $rs['u_lname']);
        $code = $rs['u_codename'].$rs['u_codenumber'];
        $telephone = str_replace("\'", "&#39;", $rs['u_telephone']);
        $email = str_replace("\'", "&#39;", $rs['u_email']);
        $gender = str_replace("\'", "&#39;", $rs['u_sex']);
        $status = str_replace("\'", "&#39;", $rs['u_status']);
        $image = $rs['u_image'];
        $username = str_replace("\'", "&#39;", $rs['u_user']);
        $password = str_replace("\'", "&#39;", $rs['u_passwod']);    
    }
    //echo $status;
?>
<h5><span class="glyphicon glyphicon-user"></span> <b>PROFIL</b></h5>
<hr>
<table class="table table-hover table-striped table-bordered">
  <tr>
      <td align="right"><b>Gambar</b></td>
      <td>
          <?php
            if($status == 'Pensyarah'){
          ?>
          <img src="module/setting/teacher/image/<?= $image ?>" class="img-rounded" alt="Cinque Terre" width="100" height="150">
          <?php
            }else{
          ?>
          <img src="module/user/image/<?= $image ?>" class="img-rounded" alt="Cinque Terre" width="100" height="150">
          <?php
            }
          ?>
      </td>
  </tr>
  <tr>
      <td align="right"><b>KOD</b></td>
      <td><?= $code ?></td>
  </tr>
  <tr>
      <td align="right"><b>NAMA-NASAB</b></td>
      <td><?= $fname ?> - <?= $lname ?></td>
  </tr>
  <tr>
      <td align="right"><b>TELEPON</b></td>
      <td><?= $telephone ?></td>
  </tr>
  <tr>
      <td align="right"><b>JENIS KELAMIN</b></td>
      <td><?= $gender ?></td>
  </tr>
  <tr>
      <td align="right"><b>E-MAIL</b></td>
      <td><?= $email ?></td>
  </tr>
  <tr>
      <td align="right"><b>USERNAME</b></td>
      <td><?= $username ?></td>
  </tr>
  <tr>
      <td align="right"><b>STATUS</b></td>
      <td><?= $status ?></td>
  </tr>
</table>
