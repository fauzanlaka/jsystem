<?php
    $count = count($_POST['st_id']);
    
    $st_id = $_POST['st_id'][$e];
    $term = $_POST['term'][$e];
    $year = $_POST['year'][$e];

    //Existing data checking 
    $checking = mysqli_query($con, "SELECT * FROM studentSubject WHERE st_id='$st_id' and ss_term='$term' and ss_year='$year'");
    $rowCheck = mysqli_fetch_array($checking);
    
    if($rowCheck[0] > 0){
 ?>
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Maaf!</strong> Data sudah ada.
    </div>
<?php        
    }else{
        $sizeSt_id = count($_POST['st_id']);
        $i = 0;
        while ($i < $sizeSt_id){
                $st_id= $_POST['st_id'][$i];

                $sizeS_id = count($_POST['s_id']);
                $i2 = 0;
                while($i2 < $sizeS_id){

                    $st_idA = $st_id;
                    $subject = $_POST['s_id'][$i2];
                    $teacher = $_POST['t_id'][$i2];
                    $term = $_POST['term'][$i2];
                    $year = $_POST['year'][$i2];

                    $sql = mysqli_query($con, "INSERT INTO studentSubject
                                        (s_id,st_id,t_id,ss_term,ss_year) 
                                        Value
                                        ('$subject','$st_idA','$teacher','$term','$year');
                                        ");
                    ++$i2; 
                }
                ++$i;
        }
    }
    ++$e;
?>
<br>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Berhasil!</strong> Data berhasil di rakam.
</div>

<p class="text-center">OK</p>