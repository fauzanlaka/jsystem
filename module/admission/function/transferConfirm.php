<?php

    $st_id = $_GET['st_id'];
    $gender = $_GET['gender'];
        
    $odrMax = mysqli_query($con, "SELECT MAX(odr2Number) AS odr2Number FROM pretest");
    $rsOdr = mysqli_fetch_array($odrMax);
    $maxOdr = $rsOdr['odr2Number'];
    $odr2Number = $maxOdr+1;
    //Update pretest data table
    $PRETEST = mysqli_query($con, "UPDATE pretest SET type='1',payStatus='1',odr2Number='$odr2Number' WHERE st_id='$st_id'");
?>
<script>
    alert("Pendaftaran calon mahasiswa sudah sempurna, sila print kertas peperiksaan");
</script>
<meta http-equiv="refresh" content="0; url=?page=admissions&&admissionpage=transferRegister&&st_id=<?= $st_id ?>">      
