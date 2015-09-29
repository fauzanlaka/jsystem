<?php
    $ft_id = mysqli_real_escape_string($con, $_POST['ft_id']);
    $s_code = mysqli_real_escape_string($con, $_POST['s_code']);
    $s_arabName = mysqli_real_escape_string($con, $_POST['s_arabName']);
    $s_rumiName = mysqli_real_escape_string($con, $_POST['s_rumiName']);
    $s_engName = mysqli_real_escape_string($con, $_POST['s_engName']);
    $s_thaiName = mysqli_real_escape_string($con, $_POST['s_thaiName']);
    $s_type = mysqli_real_escape_string($con, $_POST['s_type']);
    $s_detail = mysqli_real_escape_string($con, $_POST['s_detail']);
    
    //Existing data checking 
    $subjectCode_check = mysqli_query($con, "SELECT * FROM subject WHERE s_code='$s_code'");
    $row = mysqli_fetch_array($subjectCode_check);
    
    if($row[0] > 0){
?>
    <br>
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p>Data sudah ada</p>
    </div>
<?php
    }
?>
