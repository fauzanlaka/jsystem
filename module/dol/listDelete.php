<?php
    $id = $_GET['id'];
    
    $delete1 = mysqli_query($con, "DELETE FROM dulRegister WHERE dr_id='$id'");
    
    $delete2 = mysqli_query($con, "DELETE FROM dulSubject WHERE dr_id='$id'");

?>
<meta http-equiv="refresh" content="0; url=?page=dol&&search=list&&dolpage=list">
