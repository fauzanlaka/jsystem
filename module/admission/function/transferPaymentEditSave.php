<?php
    $st_id = $_POST['st_id'];
    $ft_id = $_POST['faculty'];
    $dp_id = $_POST['department'];
    $money = $_POST['money'];
    $class = $_POST['class'];

    $update = mysqli_query($con, "UPDATE muqaddimah_pay SET m_money='$money'  WHERE st_id='$st_id'");
    $UPDATE = mysqli_query($con, "UPDATE students SET ft_id='$ft_id',dp_id='$dp_id',class='$class' WHERE st_id='$st_id'");
?>
<script>
    alert("Data berhasil di perbaharui");
</script>
<meta http-equiv="refresh" content="0;url=?page=admissions&&admissionpage=transferPayment&&st_id=<?= $st_id ?>">
