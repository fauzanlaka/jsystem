<?php
    $id = $_SESSION["UserID"];
    $sql = mysqli_query($con, "SELECT * FROM user where u_id='$id'");
    $rs = mysqli_fetch_array($sql);
    
    $codename = str_replace("\'", "&#39;", $rs['u_codename']);
    $codenumber = str_replace("\'", "&#39;", $rs['u_codenumber']);
    $fname = str_replace("\'", "&#39;", $rs['u_fname']);
    $lname = str_replace("\'", "&#39;", $rs['u_lname']);
    $telephone = str_replace("\'", "&#39;", $rs['u_telephone']);
    $email = str_replace("\'", "&#39;", $rs['u_email']);
    $status = str_replace("\'", "&#39;", $rs['u_status']);
    $gender = str_replace("\'", "&#39;", $rs['u_sex']);
    $username = str_replace("\'", "&#39;", $rs['u_user']);
    $image = str_replace("\'", "&#39;", $rs['u_image']);
    $regisdate = str_replace("\'", "&#39;", $rs['u_regisdate']);
?>
<br>
<div class="well">
    <fieldset>
        <lagend><span class="glyphicon glyphicon-user"></span> PROFIL</lagend>
        <hr>
        <div class="pull-right">
            <img src="module/user/image/<?= $image ?>" class="img-rounded" alt="Cinque Terre" width="150" height="196">
        </div>
        <table>
            <p class="text-warning"><b>KOD :</b> <?= $codename ?><?= $codenumber ?></p>
            <p class="text-warning"><b>NAMA-NASAB :</b> <?= $fname ?> - <?= $lname ?></p>
            <p class="text-warning"><b>TELEPON :</b> <?= $telephone ?></p>
            <p class="text-warning"><b>E-MAIL :</b> <?= $email ?></p>
            <p class="text-warning"><b>JENIS KELAMIN :</b> <?= $gender ?></p>
            <p class="text-warning"><b>USERNAME :</b> <?= $username ?></p>
            <p class="text-warning"><b>TARIKH DAFTAR :</b> <?= $regisdate ?></p>
            <p class="text-warning"><b>STATUS :</b> <?= $status ?></p>
        </table>
    </fieldset>
</div>
