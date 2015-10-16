<?php
        //Get teachers data
        $id = $_SESSION['UserID'];
        $strSQL = "SELECT * FROM teachers WHERE t_id = '$id'";
        $objQuery = mysqli_query($con,$strSQL);
        $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
        $objResult['t_id'];
        
        //Get subject data
        $subject = mysqli_query($con, "SELECT * FROM subject");
        
        //Get faculty data
        $faculty = mysqli_query($con, "SELECT * FROM fakultys");
        
        //Get department
        $department = mysqli_query($con, "SELECT * FROM departments");
        
        //Get year data from year table
        $year = mysqli_query($con, "SELECT * FROM year ORDER BY year");
        
        //Set class system
        $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
        $rs_register = mysqli_fetch_array($register);
        $year_register = $rs_register['year'];

        $cy = $current_year; /*Current year are receive from max of re_id in register_exam table*/

        $c1 = $year_register ;
        $c2 = $year_register-1;
        $c3 = $year_register-2;
        $c4 = $year_register-3;

?>

<br>
<div class='well'>
    <h4><span class="glyphicon glyphicon-book"></span> <b>HASIL PERKULIAHAN MAHASISWA</b></h4>
    <hr>
      <form class="form-horizontal" action="?page=setting&&settingpage=specialStudentSearch" enctype="multipart/form-data" method="POST">
        
       <div class="form-group">
           
           <div class="col-lg-10 col-lg-offset-1">
               
                <div class="col-lg-3">
                     <select name="year" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Angkatan...">
                         <?php
                            while($rowYear = mysqli_fetch_array($year)){
                         ?>
                         <option value="<?= $rowYear['year'] ?>"><?= $rowYear['year'] ?></option>
                         <?php
                            }
                         ?>
                     </select>
                </div>
               
               <div class="col-lg-3">
                     <select name="faculty" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Fakulti...">
                         <?php
                            while($rowFaculty = mysqli_fetch_array($faculty)){
                         ?>
                         <option value="<?= $rowFaculty['ft_id'] ?>"><?= $rowFaculty['ft_name'] ?></option>
                         <?php
                            }
                         ?>
                     </select>
                </div> 
               
               <div class="col-lg-3">
                     <select name="department" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Jurusan...">
                         <?php
                            while($rowDepartment = mysqli_fetch_array($department)){
                         ?>
                         <option value="<?= $rowDepartment['dp_id'] ?>"><?= $rowDepartment['dp_name'] ?></option>
                         <?php
                            }
                         ?>
                     </select>
                </div> 
               
               <div class="col-lg-3">
                     <select name="subject" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Pilih...">
                         <?php
                            while($rowSubject = mysqli_fetch_array($subject)){
                         ?>
                         <option value="<?= $rowSubject['s_id'] ?>"><?= $rowSubject['s_code'] ?> , <?= $rowSubject['s_rumiName'] ?> </option>
                         <?php
                            }
                         ?>
                     </select>
                </div> 
               
           </div>
           
       </div>
      
      <div class="form-group">
            <div class="col-lg-10 col-lg-offset-6">
                <button type="submit" class="btn btn-primary btn-sm" name="save">MENCARI</button>
            </div>
      </div>
      
  </form>
        
    </form>
</div>
