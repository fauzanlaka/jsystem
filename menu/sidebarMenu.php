<?php
    //*** Get User Login
    $id = $_SESSION['UserID'];
    $strSQL = "SELECT * FROM user WHERE u_id = '$id'";
    $objQuery = mysqli_query($con,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
    
    $status = $_SESSION["status"];
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><table width="100%">
            <tr><td></td><td align="left"> Data pengguna</td></tr>
      </table></h3>
  </div>
  <div class="panel-body">
      <p>KOD : <b><?= $objResult['u_codename']; ?><?= $objResult['u_codenumber']; ?></b> </p> 
      <p>Nama-Baka : <b><?= $objResult['u_fname']; ?> - <?= $objResult['u_lname']; ?></b></p> 
      <p>Status Pengguna : <b><?= $objResult['u_status']; ?></b></p> 
  </div>
</div>

<?php
    if($status == 'Amir kuliah' or $status == 'Pusda'){
?>
<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="active"><a href="#">SISTEM IDARAH</a></li>
    <li role="presentation"><a href="?page=student&&studentpage=listed"><span class='glyphicon glyphicon-user'></span> Data mahasiswa / داتا مهاسيسوا</a></li>
    <li role="presentation"><a href="?page=activity&&activitypage=history"><span class='glyphicon glyphicon-tasks'></span> Aktivitas / اكتيويتس</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-tasks'></span> Borang / Form</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-comment'></span> Peraturan</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-compressed'></span> Struktur</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-stats'></span> Statistik mahasiswa</a></li>
</ul>
<?php
    }elseif($status == 'Kewangan' or $status == 'Admin'){
?>
<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="active"><a href="#">SISTEM IDARAH</a></li>
    <li role="presentation"><a href="?page=student&&studentpage=list"><span class='glyphicon glyphicon-user'></span> Data mahasiswa / داتا مهاسيسوا</a></li>
    <li role="presentation"><a href="?page=register&&registerpage=main"><span class='glyphicon glyphicon-list-alt'></span> Pendaftaran /فندفتران</a></li>
    <li role="presentation"><a href="?page=payment&&paymentpage=main"><span class='glyphicon glyphicon-usd'></span> Pembayaran / فمبياران</a></li>
    <li role="presentation"><a href="?page=report&&reportpage=main"><span class='glyphicon glyphicon-open-file'></span> Laporan / لافوران</a></li>
    <li role="presentation"><a href="?page=activity&&activitypage=add"><span class='glyphicon glyphicon-tasks'></span> Aktivitas / اكتيويتس</a></li>
    <li role="presentation"><a href="?page=calendar&&calendarpage=main"><span class='glyphicon glyphicon-tasks'></span> Calendar </a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-comment'></span> Peraturan</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-compressed'></span> Struktur</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-stats'></span> Statistik mahasiswa</a></li>
</ul>
<?php 
    }else{
?>
<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="active"><a href="#">SISTEM IDARAH</a></li>
    <li role="presentation"><a href="?page=student&&studentpage=list"><span class='glyphicon glyphicon-user'></span> Data mahasiswa / داتا مهاسيسوا</a></li>
    <li role="presentation"><a href="?page=setting&&settingpage=main"><span class='glyphicon glyphicon-cog'></span> Guru dan mata kuliah / كورو دان مات كلية</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-briefcase'></span> Jadual guru</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-tasks'></span> Borang / Form</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-comment'></span> Peraturan</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-compressed'></span> Struktur</a></li>
</ul>
<?php 
    } 
?>