<?php
    $id = $_GET['id'];
    
    $sql = mysqli_query($con, "DELETE FROM teaching WHERE tc_id='$id'");
?>
<br>
<div class="alert alert-dismissible alert-warning">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <p><strong>Berhasil !</strong>Data berhasil di hapus.</p>
</div>
<?php
    include 'module/setting/setting/subject/listed.php';
?>