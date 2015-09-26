<?php
 $id = $_POST['id'];
 $class = $_POST['class'];
 $sql = mysqli_query($con, "UPDATE students SET class='$class' WHERE st_id='$id'");
?>
<br>
<div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Berhasil !</strong> Data berhasil di perbaharui <a href="?page=student&&studentpage=edit&&id=<?= $id ?>" class="alert-link">Klik untuk lihat</a>.
</div>
