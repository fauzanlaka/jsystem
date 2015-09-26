<?php
    
$id = $_POST['id'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$common_prize = $_POST['common_prize'];
$special_prize = $_POST['special_prize'];
$tu_id = $_POST['status'];


$update = mysqli_query($con, "UPDATE register SET
        start_date='".$start_date."',
        end_date='".$end_date."',
        common_prize='".$common_prize."',
        special_prize='".$special_prize."',
        tu_id='".$tu_id."'
        WHERE re_id='$id'
");

?>
<br>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Berhasil!</strong> Data berhasil di perbaharui <a href="?page=register&&registerpage=editstudy&&id=<?= $id ?>" class="alert-link">Klik untuk lihat</a>.
</div>