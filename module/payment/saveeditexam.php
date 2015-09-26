<?php
    $id = $_GET['id'];
    $prize = $_POST['prize'];
    $money = $_POST['money'];
    $reciet_code = $_POST['reciet_code'];
    $pay_date = $_POST['pay_date'];
    
    if($money < $prize){
?>
<br>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Maaf !</strong> Jumlah duit belum cukup.
</div>
<?php

    include 'module/payment/editpayexam.php';

    }else{
    
    $update = mysqli_query($con, "UPDATE exam_pay SET
            money='".$money."',
            reciet_code='".$reciet_code."',
            pay_date='".$pay_date."'
            WHERE srx_id='$id'");
?>
<br>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Berhasil !</strong> Data berhasil di perbaharui.
</div>
<?php
    include 'module/payment/edit_px.php';

    }
?>