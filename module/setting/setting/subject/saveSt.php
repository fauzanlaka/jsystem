<?php
    $s_id = $_POST['s_id'];
    $t_id = $_POST['t_id'];
    $sql = mysqli_query($con, "INSERT INTO teaching
                        (s_id,t_id) VALUES
                        ('$s_id','$t_id')
                        ");
    /*
    $teaching = mysqli_query($con, "SELECT * FROM teaching WHERE tc_id = (SELECT MAX(tc_id) FROM teaching)");
     
    $row = mysqli_fetch_array($teaching);
    $id = $row['tc_id'];
     * 
     */
?>
<br>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p><strong>Berhasil !</strong>Data berhasil di perbaharui.</p>
    </div>
<?php
    include 'module/setting/setting/subject/listed.php';
?>