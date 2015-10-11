<?php
        //Get teachers data
        $id = $_SESSION['UserID'];
        $strSQL = "SELECT * FROM teachers WHERE t_id = '$id'";
        $objQuery = mysqli_query($con,$strSQL);
        $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
        $objResult['t_id'];
        
        //Get subject data
        $subject = mysqli_query($con, "SELECT tc.*,s.* FROM teaching tc
                                INNER JOIN subject s ON tc.s_id=s.s_id
                                WHERE tc.t_id='$id'");
        
        //Get faculty data
        $faculty = mysqli_query($con, "SELECT * FROM fakultys");
        
        //Get department
        $department = mysqli_query($con, "SELECT * FROM departments");
        
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
    <form class="form-horizontal" action="?page=setting&&settingpage=studentSearch" enctype="multipart/form-data" method="POST">
 
        <div class="form-group">
        
            <div class="col-lg-10 col-lg-offset-2">
            
                <div class="col-lg-2">
                    <select name="class" class="form-control input-sm">
                        <option>KELAS</option>
                        <option value="<?= $c1 ?>">1</option>
                        <option value="<?= $c2 ?>">2</option>
                        <option value="<?= $c3 ?>">3</option>
                        <option value="<?= $c4 ?>">4</option>
                    </select>
                </div>

                <div class="col-lg-2">
                    <select name="faculty" class="form-control input-sm">
                        <option>FAKULTI</option>
                        <?php
                            while($rowFaculty = mysqli_fetch_array($faculty)){
                        ?>
                        <option value="<?= $rowFaculty['ft_id'] ?>"><?= $rowFaculty['ft_name'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="col-lg-2">
                    <select name="department" class="form-control input-sm">
                        <option value='0'>JURUSAN</option>
                        <?php
                            while($rowDepartments = mysqli_fetch_array($department)){
                        ?>
                        <option value="<?= $rowDepartments['dp_id'] ?>"><?= $rowDepartments['dp_name'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="col-lg-3">
                    <select name="subject" class="form-control input-sm">
                        <option>MATA KULIAH</option>
                        <?php
                            while($rowSubject = mysqli_fetch_array($subject)){
                        ?>
                        <option value="<?= $rowSubject['s_id'] ?>"><?= $rowSubject['s_code'] ?> , <?= $rowSubject['s_rumiName'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

            </div>
            
        </div>
        
           
         <div class="form-group">  
            <div class="col-lg-10 col-lg-offset-5">
                <button type="reset" class="btn btn-default btn-sm">BATAL</button>
                <button type="submit" class="btn btn-primary btn-sm" name="save">SEARCH</button>
            </div>
        </div>
        
    </form>
</div>
