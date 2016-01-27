<?php
    $admYear = mysqli_query($con, "SELECT * FROM admissionRegister WHERE ar_status='1'");
    $rowAdmYear = mysqli_fetch_array($admYear);
    $rsAdmYear = $rowAdmYear['ar_year'];
    
    //Class system
    //Get current addmission year
    $addmission = mysqli_query($con, "SELECT * FROM admissionRegister WHERE ar_status='1'");
    $rowAddmission = mysqli_fetch_array($addmission);
    $addYear = $rowAddmission['ar_year'];

    //Datangkan kelas masuk belajar
    $first = $addYear; 
    $second = $addYear-1;
    $third  = $addYear-2;
    $fordth = $addYear-3;
    //-----------------------------------------------------------------------------------------
    
    //Number of students group by faculty
    
    //PAI
    //Class 1
    $pai1 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$first' AND muqaddimah='1' AND dp_id='22'");
    $numPai1 = mysqli_num_rows($pai1);
    
    //Class 2
    $pai2 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$second' AND muqaddimah='1' AND dp_id='22'");
    $numPai2 = mysqli_num_rows($pai2);
    
    //Class 3
    $pai3 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$third' AND muqaddimah='1' AND dp_id='22'");
    $numPai3 = mysqli_num_rows($pai3);
    
    //Class 4
    $pai4 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$fordth' AND muqaddimah='1' AND dp_id='22'");
    $numPai4 = mysqli_num_rows($pai4);
    //--------------------------------
   
    //PBSM
    //Class 1
    $pbsn1 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$first' AND muqaddimah='1' AND dp_id='23'");
    $numPbsm1 = mysqli_num_rows($pbsn1);
    
    //Class 2
    $pbsn2 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$second' AND muqaddimah='1' AND dp_id='23'");
    $numPbsm2 = mysqli_num_rows($pbsn2);
    
    //Class 3
    $pbsn3 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$third' AND muqaddimah='1' AND dp_id='23'");
    $numPbsm3 = mysqli_num_rows($pbsn3);
    
    //Class 4
    $pbsn4 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$fordth' AND muqaddimah='1' AND dp_id='23'");
    $numPbsm4 = mysqli_num_rows($pbsn4);
    //----------------------------------
    
    //SYA
    //Class 1
    $sya1 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$first' AND muqaddimah='1' AND ft_id='122'");
    $numSya1 = mysqli_num_rows($sya1);
    
    //Class 2
    $sya2 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$second' AND muqaddimah='1' AND ft_id='122'");
    $numSya2 = mysqli_num_rows($sya2);
    
    //Class 3
    $sya3 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$third' AND muqaddimah='1' AND ft_id='122'");
    $numSya3 = mysqli_num_rows($sya3);
    
    //Class 4
    $sya4 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$fordth' AND muqaddimah='1' AND ft_id='122'");
    $numSya4 = mysqli_num_rows($sya4);
    //----------------------------------
    
    //USU
    //Class 1
    $usu1 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$first' AND muqaddimah='1' AND ft_id='123'");
    $numUsu1 = mysqli_num_rows($usu1);
    
    //Class 2
    $usu2 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$second' AND muqaddimah='1' AND ft_id='123'");
    $numUsu2 = mysqli_num_rows($usu2);
    
    //Class 3
    $usu3 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$third' AND muqaddimah='1' AND ft_id='123'");
    $numUsu3 = mysqli_num_rows($usu3);
    
    //Class 4
    $usu4 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$fordth' AND muqaddimah='1' AND ft_id='123'");
    $numUsu4 = mysqli_num_rows($usu4);
    //----------------------------------
    
    //DIR
    //Class 1
    $dir1 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$first' AND muqaddimah='1' AND ft_id='124'");
    $numDir1 = mysqli_num_rows($dir1);
    
    //Class 2
    $dir2 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$second' AND muqaddimah='1' AND ft_id='124'");
    $numDir2 = mysqli_num_rows($dir2);
    
    //Class 3
    $dir3 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$third' AND muqaddimah='1' AND ft_id='124'");
    $numDir3 = mysqli_num_rows($dir3);
    
    //Class 4
    $dir4 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$rsAdmYear' AND class='$fordth' AND muqaddimah='1' AND ft_id='124'");
    $numDir4 = mysqli_num_rows($dir4);
    //----------------------------------
    
?>
<h4><span class="glyphicon glyphicon-list"></span> MENGURUS NO.POKOK <?= $rsAdmYear ?></h4>
<hr>

<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Calon mahasiswa</div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <td align="center">Kelas</td>
                    <td align="center">PAI</td>
                    <td align="center">PBSM</td>
                    <td align="center">SYARIAH</td>
                    <td align="center">USULUDDIN</td>
                    <td align="center">DIRASAT</td>
                </tr>
                
                <tr align="center">
                    <td align="center">1</td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $first ?>&&ft_id=&&dp_id=22"><?= $numPai1 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $first ?>&&ft_id=&&dp_id=23"><?= $numPbsm1 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $first ?>&&ft_id=122&&dp_id="><?= $numSya1 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $first ?>&&ft_id=123&&dp_id="><?= $numUsu1 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $first ?>&&ft_id=124&&dp_id="><?= $numDir1 ?></a></td>
                </tr>
            
                <tr align="center">
                    <td align="center">2</td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $second ?>&&ft_id=&&dp_id=22"><?= $numPai2 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $second ?>&&ft_id=&&dp_id=23"><?= $numPbsm2 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $second ?>&&ft_id=122&&dp_id="><?= $numSya2 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $second ?>&&ft_id=123&&dp_id="><?= $numUsu2 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $second ?>&&ft_id=124&&dp_id="><?= $numDir2 ?></a></td>
                </tr>
                
                <tr align="center">
                    <td align="center">3</td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $third ?>&&ft_id=&&dp_id=22"><?= $numPai3 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $third ?>&&ft_id=&&dp_id=23"><?= $numPbsm3 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $third ?>&&ft_id=122&&dp_id="><?= $numSya3 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $third ?>&&ft_id=123&&dp_id="><?= $numUsu3 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $third ?>&&ft_id=124&&dp_id="><?= $numDir3 ?></a></td>
                </tr>
                
                <tr align="center">
                    <td align="center">4</td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $fordth ?>&&ft_id=&&dp_id=22"><?= $numPai4 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $fordth ?>&&ft_id=&&dp_id=23"><?= $numPbsm4 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $fordth ?>&&ft_id=122&&dp_id="><?= $numSya4 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $fordth ?>&&ft_id=123&&dp_id="><?= $numUsu4 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=stdId&&class=<?= $fordth ?>&&ft_id=124&&dp_id="><?= $numDir4 ?></a></td>
                </tr>
                
            </table>
        </div>
    </div>
</div>