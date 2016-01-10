<?php
    $st_id = $_GET['id'];
    
    $PRETEST = mysqli_query($con, "UPDATE pretest SET testClass=' ',testNumber=' ',payStatus='0' WHERE st_id='$st_id'");
?>
<meta http-equiv="refresh" content="0; url=?page=admissions&&admissionpage=register&&id=<?= $st_id ?>">