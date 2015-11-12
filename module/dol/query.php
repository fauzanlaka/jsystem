<?php
    $id = $_GET['id'];
    
    $student = mysqli_query($con, "SELECT * FROM students WHERE st_id='$id'");
    $rowStudent = mysqli_fetch_array($student);
    $student_id = $rowStudent['student_id'];
    $fName = str_replace("\'", "&#39;", $rowStudent["firstname_rumi"]);
    $lName = str_replace("\'", "&#39;", $rowStudent["lastname_rumi"]);
?>
<h5><b>Hasil perkuliahan mahasiswa</b></h5> 
<font color="grey"><b><span class="glyphicon glyphicon-user"></span> <?= $fName ?>-<?= $lName ?> : <?= $student_id ?></b></font>
<?php
    $studentSubject = mysqli_query($con, "SELECT s.*,ss.*,t.* FROM studentSubject ss
                                   INNER JOIN subject s ON ss.s_id=s.s_id
                                   INNER JOIN teachers t ON ss.t_id=t.t_id
                                   WHERE st_id='$id' and ss_score < 50");
?>
<form class="form-horizontal" action="?page=dol&&dolpage=dulRegister" enctype="multipart/form-data" method="POST">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <td align="center"><b>BIL</b></td>
                <td align="center"><b>MATA KULIAH</b></td>
                <td align="center"><b>PEMSYARAH</b></td>
                <td align="center"><b>SEMESTER</b></td>
                <td align="center"><b>TEHUN PENGAJIAN</b></td>
                <td align="center" width="80px"><b>HARGA</b></td>
                <td align="center"><b>NATIJAH</b></td>
            </tr>
        </thead>
        <tbody>
    <?php
        while($rowStudentSubject = mysqli_fetch_array($studentSubject)){
            $code = $rowStudentSubject['s_code'];
            $ss_id = $rowStudentSubject['ss_id'];
            $subject = str_replace("\'", "&#39;", $rowStudentSubject['s_rumiName']);
            $tName = str_replace("\'", "&#39;", $rowStudentSubject['t_fnameRumi']);
            $tLastName = str_replace("\'", "&#39;", $rowStudentSubject['t_lnameRumi']);
            $term = $rowStudentSubject['ss_term'];
            $year = $rowStudentSubject['ss_year'];
            $score = $rowStudentSubject['ss_score'];

    ?>
            
            <tr>
                <td align="center"><input type="checkbox" value='<?= $ss_id ?>' name="check_list[]"></td>
                <td><?= $code ?> <?= $subject ?></td>
                <td><?= $tName ?>-<?= $tLastName ?></td>
                <td align="center"><?= $term ?></td>
                <td align="center"><?= $year ?></td>
                <td align="center"><input type="number" name="sumMoney[]" class="form-control input-sm" value="100"></td>
                <td align="center"><font color="red"><?= $score ?></font></td>
            </tr>
    <?php
        }        
    ?>    
        </tbody>
    </table>
    
    <!-- Get anoher value for sending to insert to dulRegister table -->
    <input type="hidden" name="st_id" value="<?= $id ?>">
    <!-- Get anoher value for sending to insert to dulSubject table -->
    <input type="hidden" name="ss_id" value="<?= $id ?>">
    
    
    <p align='center'>
        <button type='submit' class='btn btn-success btn-sm'>TAMBAH</button>
    </p>
    
</form>
