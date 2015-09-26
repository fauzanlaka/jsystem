<?php
    $id = $_GET['id'];
    
    $delete = mysqli_query($con, "DELETE FROM register WHERE re_id='$id'");
?>
<br>
<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <h4>Berhasil!</h4>
  <p>Data berhasil di hapus.</p>
</div>
