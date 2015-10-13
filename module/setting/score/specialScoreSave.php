<?php
    $size = count($_POST['score']);

    $i = 0;
    while ($i < $size) {
            $score= $_POST['score'][$i];
            $id = $_POST['id'][$i];

            $query = mysqli_query($con, "UPDATE studentSubject SET ss_score = '$score' WHERE ss_id = '$id' LIMIT 1") ;
            ++$i;
}
?>
<br>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <p><strong>Berhasil !</strong> Data berhasil di perbaharui.</p>
</div>
<?php
    include 'module/setting/score/specialStudentSearchH.php';
?>
