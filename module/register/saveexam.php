<?php
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $prize = $_POST['prize'];
    $status = $_POST['status'];
    
    $check = mysqli_query($con, "SELECT * FROM register_exam WHERE y_id='$year' and t_id='$semester'");
    $row = mysqli_fetch_array($check);
    
    if($row[0] > 0){
?>
<br>
<div class="alert alert-dismissible alert-danger">
     <button type="button" class="close" data-dismiss="alert">×</button>
     <strong>Maaf !</strong> <a href="#" class="alert-link">Data sudah ada </a>
</div>
<?php
    }else{
    $insert = "INSERT INTO register_exam
           (y_id,t_id,start_date,end_date,prize,tu_id) VALUES
           ('".$year."','".$semester."','".$start_date."','".$end_date."','".$prize."','".$status."')
           ";
    }
    if(mysqli_query($con, $insert)){
?>
<br>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Berhasil!</strong> Data berhasil di rakam <a href="?page=register&&registerpage=examlist" class="alert-link">Klik untuk lihat</a>.
</div>
 <?php 
    } 
 ?>