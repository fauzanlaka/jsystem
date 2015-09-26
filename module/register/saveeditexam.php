<?php
    $id = $_POST['id'];
    
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $prize = $_POST['prize'];
    $status = $_POST['status'];
    
    $sql = mysqli_query($con , "UPDATE register_exam SET
        start_date='".$start_date."',
        end_date='".$end_date."',
        prize='".$prize."',
        tu_id='".$status."'
        WHERE rx_id='$id'"); 
?>
<br>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Berhasil!</strong> Data berhasil di perbaharui <a href="?page=register&&registerpage=editexam&&id=<?= $id ?>" class="alert-link">Klik untuk lihat</a>.
</div>