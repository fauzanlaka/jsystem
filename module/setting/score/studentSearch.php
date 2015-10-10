<?php
    $class = $_POST['class'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $department = $_POST['department'];
    $subject = $_POST['subject'];
    
    //Get current year 
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
    $rs_register = mysqli_fetch_array($register);
    $cyear = $rs_register['year'];
    
    //Get faculty data
    $sqlFaculty = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$faculty'");
    $rowFaculty = mysqli_fetch_array($sqlFaculty);
    
    //Get faculty data
    $sqlDepartment = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$department'");
    $rowDepartment = mysqli_fetch_array($sqlDepartment);
    
    //Set class system 
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
    $rs_register = mysqli_fetch_array($register);
    $cyear = $rs_register['year'];
                            
    $first = $cyear; 
    $second = $cyear-1;
    $third  = $cyear-2;
    $fordth = $cyear-3;
    
    $kelas = $class;
    if($kelas == $first){ $cnow = '1'; }
    if($kelas == $second){ $cnow = '2'; }
    if($kelas == $third){ $cnow = '3'; }
    if($kelas == $fordth){ $cnow = '4'; }
    
    //Get student data for update score
    if($department == "0"){
    $score = mysqli_query($con, "SELECT s.*,ss.* FROM students s
                         INNER JOIN studentSubject ss ON s.st_id=ss.st_id
                         WHERE s.class='$class' and s.ft_id='$faculty' and ss.ss_year='$cyear' and ss.s_id='$subject'");
    }else{
    $score = mysqli_query($con, "SELECT s.*,ss.* FROM students s
                         INNER JOIN studentSubject ss ON s.st_id=ss.st_id
                         WHERE s.class='$class' and s.ft_id='$faculty' and s.dp_id='$department' and ss.ss_year='$cyear' and ss.s_id='$subject'");    
    }
 ?>
<br>
<div class='pull-left'>
    <a href="?page=setting&&settingpage=score" class="btn btn-primary btn-sm"><span class='glyphicon glyphicon-chevron-left'></span> BACK</a>
</div>
<br>
<br>
<?php if($department == "0"){ ?>
<p><strong><?= $rowFaculty['ft_name'] ?> , Kelas : <?= $cnow ?></p>
<?php }else{ ?>
<p><strong><?= $rowFaculty['ft_name'] ?> , <?= $rowDepartment['dp_name'] ?> , Kelas : <?= $class ?></p>
<?php } ?>
<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <td align='center'><b>NO.POKOK</b></td>
            <td align='center'><b>NAMA - NASAB</b></td>
            <td align='center'><b>نام - نسب</b></td>
            <td align='center'><b>MARKAH</b></td>
        </tr>
    </thead>
    <tbody>
        <?php
            while($rowScore = mysqli_fetch_array($score)){
                $student_id = $rowScore['student_id'];
                $fnameR = str_replace("\'", "&#39;", $rowScore["firstname_rumi"]);
                $lnameR = str_replace("\'", "&#39;", $rowScore["lastname_rumi"]);
                $fnameJ = str_replace("\'", "&#39;", $rowScore["firstname_jawi"]);
                $lnameJ = str_replace("\'", "&#39;", $rowScore["lastname_jawi"]);
        ?>
        <tr>
            <td align='center'><?= $student_id ?></td>
            <td><?= $fnameR ?> - <?= $lnameR ?></td>
            <td align='right'><?= $fnameJ ?> - <?= $lnameJ ?></td>
            <td><input type='text' class='form-control input-sm'></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
