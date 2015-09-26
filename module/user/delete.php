<br>
<?php 
    $id = $_GET['id'];
    $sql = mysqli_query($con, "DELETE FROM user WHERE u_id='$id'");
?>
<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Berhasil!</strong> Data berhasil di hapus.
</div>