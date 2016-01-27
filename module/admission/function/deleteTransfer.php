<?php
    $st_id = $_GET['st_id'];
    $student = mysqli_query($con, "DELETE FROM students WHERE st_id='$st_id'");
    $pretest = mysqli_query($con, "DELETE FROM pretest WHERE st_id='$st_id'");
?>
<script>
    alert("Data berhasil di hapus");
</script>
<meta http-equiv="refresh" content="0; url=?page=admissions&&admissionpage=transferList">
