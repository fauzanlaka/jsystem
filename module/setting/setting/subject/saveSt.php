<?php
    $s_id = $_POST['s_id'];
    $t_id = $_POST['t_id'];
    
    $check = mysqli_query($con, "SELECT * FROM teaching WHERE s_id='$s_id' and t_id='$t_id'");
    $row = mysqli_fetch_array($check);
    
    if($row[0] > 0){
?>
    <br>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p><strong>Maaf !</strong>Data sudah ada.</p>
        </div>
<?php
    }else{
    
    $sql = mysqli_query($con, "INSERT INTO teaching
                        (s_id,t_id) VALUES
                        ('$s_id','$t_id')
                        ");

?>
    <br>
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p><strong>Berhasil !</strong>Data berhasil di perbaharui.</p>
        </div>
<?php
    }
    include 'module/setting/setting/subject/listed.php';
?>