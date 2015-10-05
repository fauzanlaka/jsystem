<?php
    $ft_id = $_GET['ft_id'];
    $dp_id = $_GET['dp_id'];
    $term = $_GET['term'];
    $tc_id = $_POST['tc_id'];
    
    //tc_id existing data chenking
    echo $tc_id;

    $tc = mysqli_query($con, "SELECT * FROM registerSubject WHERE tc_id='$tc_id' and ft_id='$ft_id' and dp_id='$dp_id' and rs_term='$term'");

    
    $row = mysqli_fetch_array($tc_id);
    
    if($row[0] > 0){
?>
        <br>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p><strong>Maaf !</strong>Data sudah ada</p>
        </div>   
<?php        
    }else{
        $sql = mysqli_query($con, "INSERT INTO registerSubject
                        (tc_id) VALUES
                        ('".$tc_id."')
                        ");
?>
        <br>
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p><strong>Berhasil!</strong>Data berhasil di rakam.</p>
        </div> 
<?php
    }
?>
