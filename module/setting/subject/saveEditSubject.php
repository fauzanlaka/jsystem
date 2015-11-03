<?php
    $id = $_GET['id'];
    $ft_id = mysqli_real_escape_string($con, $_POST['ft_id']);
    $s_code = mysqli_real_escape_string($con, $_POST['s_code']);
    $s_arabName = mysqli_real_escape_string($con, $_POST['s_arabName']);
    $s_rumiName = mysqli_real_escape_string($con, $_POST['s_rumiName']);
    $s_engName = mysqli_real_escape_string($con, $_POST['s_engName']);
    $s_thaiName = mysqli_real_escape_string($con, $_POST['s_thaiName']);
    $s_type = mysqli_real_escape_string($con, $_POST['s_type']);
    $s_faculty = mysqli_real_escape_string($con, $_POST['s_faculty']);
    $s_department = mysqli_real_escape_string($con, $_POST['s_department']);
    $s_detail = mysqli_real_escape_string($con, $_POST['s_detail']);
    
    $update = mysqli_query($con, "UPDATE subject SET
                          ft_id = '$ft_id',
                          s_code = '$s_code',
                          s_arabName = '$s_arabName',
                          s_rumiName = '$s_rumiName',
                          s_engName = '$s_engName',
                          s_thaiName = '$s_thaiName',
                          s_type = '$s_type',
                          s_faculty = '$s_faculty',
                          s_department = '$s_department',
                          s_detail = '$s_detail'
                          WHERE s_id = '$id'
                          ");
?>
<br>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p><strong>Berhasil !</strong>Data berhasil di perbaharui.</p>
    </div>
<?php
    include 'module/setting/subject/subjectEdit.php';
?>