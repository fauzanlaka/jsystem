<?php
    $id = $_GET['id'];
    
    $delete_srx = mysqli_query($con, "DELETE FROM student_register_exam WHERE srx_id='$id'");
    
    $delete_ep = mysqli_query($con, "DELETE FROM exam_pay WHERE srx_id='$id'");  
?>
<br>
<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <h4>Berhasil!</h4>
  <p>Data berhasil di hapus.</p>
</div>
<?php
    include 'exam.php';
?>