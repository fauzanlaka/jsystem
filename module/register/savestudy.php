<?php
    $y = $_POST['year'];
    $t = $_POST['semister'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $common_price = $_POST['common_prize'];
    $special_price = $_POST['special_prize'];
    $status = $_POST['status'];

    $check = mysqli_query($con, "SELECT * FROM register WHERE y_id='$y' and term_id='$t'");
    $rs_c = mysqli_fetch_array($check);

    if($rs_c[0] > 0){
?>
<br>
<div class="alert alert-dismissible alert-danger">
     <button type="button" class="close" data-dismiss="alert">×</button>
     <strong>Maaf !</strong> <a href="#" class="alert-link">Data sudah ada </a>
</div>
<?php 
    }else{
        $insert = "INSERT INTO register (y_id,term_id,start_date,end_date,common_prize,special_prize,tu_id)
                  values ('$y','$t','$start_date','$end_date','$common_price','$special_price','$status')             
                  ";
    }
    if(mysqli_query($con, $insert)){
?>
<br>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Berhasil!</strong> Data berhasil di rakam <a href="?page=register&&registerpage=studylist" class="alert-link">Klik untuk lehat</a>.
</div>
<?php
    }
?>

