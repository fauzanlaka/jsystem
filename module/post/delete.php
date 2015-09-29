<?php
    $id = $_GET['id'];
    
    $delete = mysqli_query($con, "DELETE FROM post WHERE p_id='$id'");
?>
<br>
<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <p><strong>Berhasil !</strong> Data berhasil di hapus.</p>
</div>
<?php
    include 'module/post/list.php';
?>