<?php
    $st_id = $_GET['st_id'];
    
    $update = mysqli_query($con, "UPDATE pretest SET testClass='0',testNumber='0',payStatus='0',type='0',odrNumber='0' WHERE st_id='$st_id'");
?>
<script>
    alert("Pendaftaran berhasil di batal");
</script>
<meta http-equiv="refresh" content="0; url=?page=admissions&&admissionpage=transferRegister&&st_id=<?= $st_id ?>">
