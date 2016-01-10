<?php

    $st_id = $_GET['st_id'];
    $gender = $_GET['gender'];
        
  
    //Update pretest data table
    $PRETEST = mysqli_query($con, "UPDATE pretest SET type='1',payStatus='1' WHERE st_id='$st_id'");
?>
<script>
    alert("Pendaftaran calon mahasiswa sudah sempurna, sila print kertas peperiksaan");
</script>
<meta http-equiv="refresh" content="0; url=?page=admissions&&admissionpage=transferRegister&&st_id=<?= $st_id ?>">      
