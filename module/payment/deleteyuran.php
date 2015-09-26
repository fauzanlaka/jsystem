<?php
    $id = $_GET['id'];
    $delete_sr = mysqli_query($con, "DELETE FROM student_register WHERE sr_id='$id'");
    
    $delete_pay = mysqli_query($con, "DELETE FROM payments WHERE sr_id='$id'");
?>
<br>
<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <h4>Berhasil!</h4>
  <p>Data berhasil di hapus.</p>
</div>