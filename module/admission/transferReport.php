<h4><span class="glyphicon glyphicon-paperclip"></span> LAPORAN PENDAFTARAN CALON TRANSFER</h4><HR>

<?php
    //Get current addmission year
    $addmission = mysqli_query($con, "SELECT * FROM admissionRegister WHERE ar_status='1'");
    $rowAddmission = mysqli_fetch_array($addmission);
    $addYear = $rowAddmission['ar_year'];

    //Datangkan kelas masuk belajar
    $first = $addYear; 
    $second = $addYear-1;
    $third  = $addYear-2;
    $fordth = $addYear-3;
    
    //PAI
    //PAI 2
    $pai2 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$addYear' AND class='$second' AND dp_id='22' AND muqaddimah='1'");
    $numPai2 = mysqli_num_rows($pai2);
    //PAI 3
    $pai3 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$addYear' AND class='$third' AND dp_id='22' AND muqaddimah='1'");
    $numPai3 = mysqli_num_rows($pai3);
    //PAI 4
    $pai4 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$addYear' AND class='$fordth' AND dp_id='22' AND muqaddimah='1'");
    $numPai4 = mysqli_num_rows($pai4);
    //-----------------------------------------------
    
    //PBSM
    //PBSM 2
    $pbsm2 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$addYear' AND class='$second' AND dp_id='23' AND muqaddimah='1'");
    $numPbsm2 = mysqli_num_rows($pbsm2);
    
    //PBSM3
    $pbsm23 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$addYear' AND class='$third' AND dp_id='23' AND muqaddimah='1'");
    $numPbsm3 = mysqli_num_rows($pbsm23);
    
    //PBSM4
    $pbsm24 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$addYear' AND class='$fordth' AND dp_id='23' AND muqaddimah='1'");
    $numPbsm4 = mysqli_num_rows($pbsm24);
    //-----------------------------------------------
    
    //SYARIAH
    //SYARIAH 2
    $sya2 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$addYear' AND class='$second' AND ft_id='122' AND muqaddimah='1'");
    $numSya2 = mysqli_num_rows($sya2);
    
    //SYARIAH3
    $sya3 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$addYear' AND class='$third' AND ft_id='122' AND muqaddimah='1'");
    $numSya3 = mysqli_num_rows($sya3);
    
    //SYARIAH4
    $sya4 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$addYear' AND class='$fordth' AND ft_id='122' AND muqaddimah='1'");
    $numSya4 = mysqli_num_rows($sya4);
    //-----------------------------------------------
    
    //USULUDDIN
    //USULUDDIN 2
    $usu2 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$addYear' AND class='$second' AND ft_id='123' AND muqaddimah='1'");
    $numUsu2 = mysqli_num_rows($usu2);
    
    //USULUDDIN3
    $usu3 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$addYear' AND class='$third' AND ft_id='123' AND muqaddimah='1'");
    $numUsu3 = mysqli_num_rows($usu3);
    
    //USULUDDIN4
    $usu4 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$addYear' AND class='$fordth' AND ft_id='123' AND muqaddimah='1'");
    $numUsu4 = mysqli_num_rows($usu4);
    //-----------------------------------------------
    
    //DIRASAT
    //DIRASAT 2
    $dir2 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$addYear' AND class='$second' AND ft_id='124' AND muqaddimah='1'");
    $numDir2 = mysqli_num_rows($dir2);
    
    //DIRASAT3
    $dir3 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$addYear' AND class='$third' AND ft_id='124' AND muqaddimah='1'");
    $numDir3 = mysqli_num_rows($dir3);
    
    //DIRASAT4
    $dir4 = mysqli_query($con, "SELECT * FROM students WHERE income_year='$addYear' AND class='$fordth' AND ft_id='124' AND muqaddimah='1'");
    $numDir4 = mysqli_num_rows($dir4);
    //-----------------------------------------------
?>

<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Lelaki</div>
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
                    <td align="center">2</td>
                    <td align="center"><a href="?page=admissions&&admissionpage=transferWord&&class=<?= $second ?>&&ft_id=&&dp_id=22"><?= $numPai2 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=transferWord&&class=<?= $second ?>&&ft_id=&&dp_id=23"><?= $numPbsm2 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=transferWord&&class=<?= $second ?>&&ft_id=122&&dp_id="><?= $numSya2 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=transferWord&&class=<?= $second ?>&&ft_id=123&&dp_id="><?= $numUsu2 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=transferWord&&class=<?= $second ?>&&ft_id=124&&dp_id="><?= $numDir2 ?></a></td>
                </tr>
                
                <tr align="center">
                    <td align="center">3</td>
                    <td align="center"><a href="?page=admissions&&admissionpage=transferWord&&class=<?= $third ?>&&ft_id=&&dp_id=22"><?= $numPai3 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=transferWord&&class=<?= $third ?>&&ft_id=&&dp_id=23"><?= $numPbsm3 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=transferWord&&class=<?= $third ?>&&ft_id=122&&dp_id="><?= $numSya3 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=transferWord&&class=<?= $third ?>&&ft_id=123&&dp_id="><?= $numUsu3 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=transferWord&&class=<?= $third ?>&&ft_id=124&&dp_id="><?= $numDir3 ?></a></td>
                </tr>
                
                <tr align="center">
                    <td align="center">4</td>
                    <td align="center"><a href="?page=admissions&&admissionpage=transferWord&&class=<?= $fordth ?>&&ft_id=&&dp_id=22"><?= $numPai4 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=transferWord&&class=<?= $fordth ?>&&ft_id=&&dp_id=23"><?= $numPbsm4 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=transferWord&&class=<?= $fordth ?>&&ft_id=122&&dp_id="><?= $numSya4 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=transferWord&&class=<?= $fordth ?>&&ft_id=123&&dp_id="><?= $numUsu4 ?></a></td>
                    <td align="center"><a href="?page=admissions&&admissionpage=transferWord&&class=<?= $fordth ?>&&ft_id=124&&dp_id="><?= $numDir4 ?></a></td>
                </tr>
                
            </table>
        </div>
    </div>
</div>