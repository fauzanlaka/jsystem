<?php
    $id = $_POST['st_id'];
    $term = $_POST['term'];
    $year = $_POST['year'];
    $credit = $_POST['credit'];
    $activityType = $_POST['activityType'];
    $activityDate = $_POST['activityDate'];
    $activityTime =$_POST['activityTime'];

    /*
    echo $id; echo "<br>";
    echo $term; echo "<br>";
    echo $year; echo "<br>";
    echo $credit; echo "<br>";
    echo $activityType; echo "<br>";
    echo $activityTime;echo "<br>";
     * 
     */
    

    $insert = mysqli_query($con, "INSERT INTO activity
            (st_id,a_term,a_academicYear,a_credit,a_activityType,a_activityDate,activityTime) VALUES
            ('".$id."','".$term."','".$year."','".$credit."','".$activityType."','".$activityDate."','".$activityTime."')
            ");
?>
<br>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Berhasil!</strong> Data berhasil di rakam.
</div>
