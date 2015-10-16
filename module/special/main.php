<?php
        //Set class system
        $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
        $rs_register = mysqli_fetch_array($register);
        $year_register = $rs_register['year'];

        $cy = $current_year; /*Current year are receive from max of re_id in register_exam table*/

        $c1 = $year_register ;
        $c2 = $year_register-1;
        $c3 = $year_register-2;
        $c4 = $year_register-3;
        
        //Get year
        $year = mysqli_query($con, "SELECT * FROM year ORDER BY year");
        
        //Get faculty data
        $faculty = mysqli_query($con, "SELECT * FROM fakultys");
        
        //Get department data
        $department = mysqli_query($con, "SELECT * FROM departments");
?>

<br>
<div class="well">
    <h4><span class="glyphicon glyphicon-book"></span><b> DAFTAR UMUM</b></h4>
    <hr>
    
    <form class="form-horizontal" action="?page=rs&&rspage=studentRegister" enctype="multipart/form-data" method="POST">
        
       <div class="form-group">
           
           <div class="col-lg-10 col-lg-offset-2">
               
                <div class="col-lg-2">
                    <select name="class" class="form-control input-sm">
                        <option>Kelas</option>
                        <option value="<?= $c1 ?>">1</option>
                        <option value="<?= $c2 ?>">2</option>
                        <option value="<?= $c3 ?>">3</option>
                        <option value="<?= $c4 ?>">4</option>
                    </select>
                </div>

                <div class="col-lg-2">
                     <select name="term" class="form-control input-sm">
                         <option>Semester</option>
                         <option value="1">1</option>
                         <option value="2">2</option>
                     </select>
                </div>

                <div class="col-lg-2">
                     <select name="year" class="form-control input-sm">
                         <option>Tahun</option>
                         <?php
                            while($rowYear = mysqli_fetch_array($year)){
                         ?>
                         <option value="<?= $rowYear['year'] ?>"><?= $rowYear['year'] ?></option>
                         <?php
                            }
                         ?>
                     </select>
                </div>

                <div class="col-lg-2">
                     <select name="faculty" class="form-control input-sm">
                         <option>Fakulti</option>
                         <?php
                            while($rowFaculty = mysqli_fetch_array($faculty)){
                         ?>
                         <option value='<?= $rowFaculty['ft_id'] ?>'><?= $rowFaculty['ft_name'] ?></option>
                         <?php
                            }
                         ?>
                     </select>
                </div>

                <div class="col-lg-2">
                     <select name="department" class="form-control input-sm">
                         <option value="0">Jurusan</option>
                         <?php
                            while($rowDepartment = mysqli_fetch_array($department)){
                         ?>
                         <option value='<?= $rowDepartment['dp_id'] ?>'><?= $rowDepartment['dp_name'] ?></option>
                         <?php
                            }
                         ?>
                     </select>
                </div>
               
           </div>
 
       </div>

      <div class="form-group">
            <div class="col-lg-10 col-lg-offset-6">
                <button type="submit" class="btn btn-primary btn-sm" name="save"><span class="glyphicon glyphicon-search"></span> MENCARI</button>
            </div>
      </div>
      
  </form>
    
</div>
