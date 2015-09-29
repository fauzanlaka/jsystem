<?php
    //Get auther data from session id
    $au_id = $_SESSION["UserID"];
    $sql = mysqli_query($con, "SELECT * FROM user WHERE u_id='$au_id'");
    $rs = mysqli_fetch_array($sql);

    $p_title = mysqli_real_escape_string($con, $_POST['p_title']);
    $p_post = mysqli_real_escape_string($con, $_POST['p_post']);
    $p_other = mysqli_real_escape_string($con, $_POST['p_other']);
    $p_date = date('Y-m-d');
    $p_author = $rs['u_status'];
    $publish = $_POST['publish'];
    
    $insert = mysqli_query($con, 
            "INSERT INTO post
            (p_title,p_post,p_other,p_date,p_author,publish)
            VALUES
            ('$p_title','$p_post','$p_other','$p_date','$p_author','$publish')
            ");
?>
    <br>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Berhasil!</strong> Data berhasil di simpan <a href="?page=setting&&settingpage=teacherEdit&&id=<?= $id ?>" class="alert-link"> Klik untuk lihat</a>
    </div>