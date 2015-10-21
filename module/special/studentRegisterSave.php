<?php   
        //Existing register checking
        $id = $_GET['id'];
        $t = $_GET['t'];
        $y = $_GET['y'];
        
        if($id == 1 ){
 ?> 
        <br>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Maaf !</strong> Data Sudah ada.
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
?>
<br>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Berhasil!</strong> Data berhasil di rakam.
</div>
<?php
    }
?>
<p class='text-center'><a href='?page=rs&&rspage=main'><button type='button' class='btn btn-info'><span class='glyphicon glyphicon-backward'></span> KEMBALI</button></a></p>
