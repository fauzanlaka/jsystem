<?php
    $ft_id = $_GET['ft_id'];
    $dp_id = $_GET['dp_id'];
    $rs_class = $_GET['class'];
    $rs_term = $_GET['term'];
    $tc_id = $_POST['tc_id'];
    $rs_lastUpdate = date("Y/m/d");

    //tc_id existing data chenking
    if($dp_id != ''){
        $tc = mysqli_query($con, "SELECT * FROM registerSubject WHERE tc_id='$tc_id' and ft_id='$ft_id' and dp_id='$dp_id'");
    }else{
        $tc = mysqli_query($con, "SELECT * FROM registerSubject WHERE tc_id='$tc_id' and ft_id='$ft_id'");
    }
    
    $row = mysqli_fetch_array($tc);
    
    if($row[0] > 0){
?>
        <br>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p><strong>Maaf !</strong>Data sudah ada</p>
        </div>   
<?php
    include 'module/setting/setting/learning/sAdd.php';
    }else{
        $sql = mysqli_query($con, "INSERT INTO registerSubject
                        (tc_id,ft_id,dp_id,rs_class,rs_term,rs_lastUpdate) VALUES
                        ('$tc_id','$ft_id','$dp_id','$rs_class','$rs_term','$rs_lastUpdate')
                        ");
?>
        <br>
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p><strong>Berhasil!</strong>Data berhasil di rakam.</p>
        </div> 
<?php
    include 'module/setting/setting/learning/getRsAdd.php';
    }
?>
