<?php
	$id = $_GET['id'];
	$ft_id = $_GET['ft_id'];
	$dp_id = $_GET['dp_id'];
	
	$delete = mysqli_query($con, "DELETE FROM registerSubject WHERE rs_id='$id'");
?>
	<br>
        <div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p><strong>Berhasil!</strong>Data berhasil di hapus.</p>
        </div> 
<?php
	include 'module/setting/setting/learning/getRsAdd.php';
?>
