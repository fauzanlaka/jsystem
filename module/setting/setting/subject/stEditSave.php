<?php
    $id = $_POST['id'];
    $s_id = $_POST['s_id'];
    $t_id = $_POST['t_id'];
    
    $check = mysqli_query($con, "SELECT * FROM teaching WHERE tc_id!='$id' and s_id='$s_id' and t_id='$t_id'");
    $rowCheck = mysqli_fetch_array($check);
    
    if($rowCheck[0] > 0){
?>
    <br>
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Maaf!</strong> Data sudah ada.
    </div>
    <div class="pull-right">
        <a href="?page=setting&&settingpage=stEdit&&id=<?= $id ?>&&s_id=<?= $s_id ?>&&t_id=<?= $t_id ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> KEMBALI</a>
    </div>
<?php
    include 'module/setting/setting/subject/stEditd.php';
    }else{
        $update = mysqli_query($con, "UPDATE teaching SET t_id='$t_id',s_id='$s_id' WHERE tc_id='$id'");
?>
        <br>
    <div class="alert alert-dismissible alert-success">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Berhasil!</strong> Data berhasil di perbaharui.
    </div>
<?php
    include 'module/setting/setting/subject/stEditd.php';
    }
?>
