<b>MATAKULIAH YANG DAFTAR DUL</b>
<br>

<table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <td align="center"><b>KOD</b></td>
        <td align="center"><b>MATA KULIAH</b></td>
        <td align="center"><b>SEMESTER</b></td>
        <td align="center"><b>TAHUN</b></td>
      </tr>
    </thead>
    <tbody>
<?php
    $id = $_GET['id']; //dr_id
    $st_id = $_GET['st_id'];
    
    //Get student data
    $student = mysqli_query($con, "SELECT * FROM students WHERE st_id='$st_id'");
    $rowStudent = mysqli_fetch_array($student);
    
    //Get subject data
    $dulSubject = mysqli_query($con, "SELECT ds.*,ss.* FROM dulSubject ds
                               INNER JOIN studentSubject ss ON ds.ss_id=ss.ss_id
                               WHERE dr_id='$id'");
    while($row = mysqli_fetch_array($dulSubject)){
        $ss_id = $row['ss_id']
?>
        <tr>
            <?php
                $studentSubject = mysqli_query($con, "SELECT ss.*,s.* FROM studentSubject ss INNER JOIN subject s ON ss.s_id=s.s_id WHERE ss_id='$ss_id'");
                $rowStudentSubject = mysqli_fetch_array($studentSubject);
                $code = $rowStudentSubject['s_code'];
                $subjectName = $rowStudentSubject['s_rumiName'];
                $term = $rowStudentSubject['ss_term'];
                $year = $rowStudentSubject['ss_year'];
              ?>
          <td align="center"><?= $code ?></td>
          <td align="center"><?= $subjectName ?></td>
          <td align="center"><?= $term ?></td>
          <td align="center"><?= $year ?></td>
        </tr>
<?php
    }
?>
    </tbody>
</table> 
