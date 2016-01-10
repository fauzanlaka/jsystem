<?php
    $st_id = $_GET['st_id'];
    $m_id = $_GET['m_id'];
    
    $cancel = mysqli_query($con, "DELETE FROM muqaddimah_pay WHERE m_id='$m_id'");
    $update = mysqli_query($con, "UPDATE students SET muqaddimah='0' WHERE st_id='$st_id'");
    
?>
<script>
    alert("Pembayaran berhasil di batal");
</script>
<meta http-equiv="refresh" content="0;url=?page=admissions&&admissionpage=payment&&st_id=<?= $st_id ?>">