<?php
    $ft_id = $_GET['ft_id'];
    $dp_id = $_GET['dp_id'];
    $class = $_GET['class'];
    
    //Admission register year
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
    //Kelas sekarang
    $kelas = $class;
    if($kelas == $first){ $cnow = '1'; }
    if($kelas == $second){ $cnow = '2'; }
    if($kelas == $third){ $cnow = '3'; }
    if($kelas == $fordth){ $cnow = '4'; }
    
    //Get fakulty and department data
    if($ft_id == ""){
        if($dp_id == '22'){
            $dp_name = 'PAI';
            $student = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE dp_id='22' AND income_year='$rsAdmYear' AND class='$class' AND muqaddimah='1' ORDER BY pre_id");
        }else{
            $dp_name = 'PBSM';
            $student = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE dp_id='23' AND income_year='$rsAdmYear' AND class='$class' AND muqaddimah='1' ORDER BY pre_id");
        }
        
    }else{
        if($ft_id == '122'){
            $dp_name = 'SYA';
            $student = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE ft_id='122' AND income_year='$rsAdmYear' AND class='$class' AND muqaddimah='1' ORDER BY pre_id");
        }elseif($ft_id == '123'){
            $dp_name = 'USU';
            $student = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE ft_id='123' AND income_year='$rsAdmYear' AND class='$class' AND muqaddimah='1' ORDER BY pre_id");
        }else{
            $dp_name = 'DIR';
            $student = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE ft_id='124' AND income_year='$rsAdmYear' AND class='$class' AND muqaddimah='1' ORDER BY pre_id");
        }
    }
?>
<h4><span class="glyphicon glyphicon-paperclip"></span> NO.POKOK "<?= $dp_name ?>" TAHUN <?= $cnow ?></h4><HR>
<div class="pull-left">
    <h4>TAHUN PENGAJIAN <?= $rsAdmYear ?></h4>    
</div>
<div class="pull-right">
    <a href="?page=admissions&&admissionpage=studentId" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> BACK</a>
</div>


<?php
    echo "<form class='form-horizontal' method='post' action='?page=admissions&&admissionpage=stdIdSave&&ft_id=$ft_id&&dp_id=$dp_id&&class=$class'>\n";
?>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <td align='center'><b>NO.POKOK</b></td>
                    <td align='center'><b>NAMA - NASAB</b></td>
                    <td align='center'><b><div id="subText">نام - نسب</div></b></td>
                    <td align='center'><b>JENIS KELAMIN</b></td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                    while($rowStudent = mysqli_fetch_array($student)){
                        $st_id = $rowStudent['st_id'];
                        $student_id = $rowStudent['student_id']; 
                        $fnameR = str_replace("\'", "&#39;", $rowStudent["firstname_rumi"]);
                        $lnameR = str_replace("\'", "&#39;", $rowStudent["lastname_rumi"]);
                        $fnameJ = str_replace("\'", "&#39;", $rowStudent["firstname_jawi"]);
                        $lnameJ = str_replace("\'", "&#39;", $rowStudent["lastname_jawi"]);
                        $gender = $rowStudent["gender"];

                        echo '<tr>';;
                        echo "<td align='center' width='10px'><input type='text' maxlength='10' name='student_id[$i]' value='{$student_id}' class='form-control input-sm'/><input type='hidden' name='st_id[$i]' value='{$st_id}' /></td>";
                        echo "<td>{$fnameR} - {$lnameR}</td>";
                        echo "<td align='right'><div id='subText'>{$fnameJ} - {$lnameJ}</div></td>";
                        echo "<td align='center'>{$gender}</div></td>";
                        echo '</tr>';
                        ++$i;
                     }
                 ?>    
            </tbody>
        </table>
       
        <p class="text-center">
             <button type="submit" class="btn btn-success btn-sm" name="save">SAVE</button>
        </p>
        <?php
            echo "</form>"; 
        ?>