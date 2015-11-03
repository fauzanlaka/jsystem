<?php
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
    }else{
        $insert = mysqli_query($con, "INSERT INTO subject
                (ft_id,s_code,s_arabName,s_rumiName,s_engName,s_thaiName,s_type,s_faculty,s_department,s_detail) VALUES
                ('$ft_id','$s_code','$s_arabName','$s_rumiName','$s_engName','$s_thaiName','$s_type','$s_faculty','$s_department','$s_detail')
                ");
        
        $subject = mysqli_query($con, "SELECT * FROM subject WHERE s_id = (SELECT MAX(s_id) FROM subject)");
        $rowID = mysqli_fetch_array($subject);
        $id = $rowID['s_id'];
?>
        <br>
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p><strong>Berhasil !</strong>Data berhasil di rakam. <a href="?page=setting&&settingpage=subjectEdit&&id=<?= $id ?>" class="alert-link">Klik untuk lihat</a></p>
        </div>
<?php
    }
?>