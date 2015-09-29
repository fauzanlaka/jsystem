<?php
    $id = $_GET['id'];
    $p_title = mysqli_real_escape_string($con, $_POST['p_title']);
    $p_post = mysqli_real_escape_string($con, $_POST['p_post']);
    $p_other = mysqli_real_escape_string($con, $_POST['p_other']);
    //$p_date = date('Y-m-d');
    //$p_author = $rs['u_status'];
    $publish = $_POST['publish'];
    
    $sql = mysqli_query($con, "UPDATE post SET
                        p_title = '$p_title',
                        p_post = '$p_post',
                        p_other = '$p_other',
                        publish = '$publish'
                        WHERE p_id = '$id'
                        ");
?>
    <br>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Berhasil!</strong> Data berhasil di perbaharui. 
    </div>
    <?php
        include 'module/post/edit.php';
    ?>
