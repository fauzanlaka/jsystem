<?php
    $id = $_GET['id'];
    
    $sql = mysqli_query($con, "DELETE FROM teachers WHERE t_id='$id'");
?>
<br>
<div class="alert alert-dismissible alert-warning">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Berhasil!</strong> Data berhasil di hapus
</div> 
<?php
    include 'module/setting/teacher/list.php';
?>