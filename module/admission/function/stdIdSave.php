<?php
    $ft_id = $_GET['ft_id'];
    $dp_id = $_GET['dp_id'];
    $class = $_GET['class'];
    
    $size = count($_POST['student_id']);

    $i = 0;
    while ($i < $size) {
            $student_id= $_POST['student_id'][$i];
            $id = $_POST['st_id'][$i];

            $query = mysqli_query($con, "UPDATE students SET student_id = '$student_id' WHERE st_id = '$id' LIMIT 1") ;
            ++$i;
}
?>
<script>
    alert("Data berhasil di perbaharui");
</script>
<meta http-equiv="refresh" content="0; url=?page=admissions&&admissionpage=stdId&&class=<?= $class ?>&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>">      