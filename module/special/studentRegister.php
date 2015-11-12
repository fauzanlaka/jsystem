<?php
    $class = $_POST['class'];
    $term = $_POST['term'];
    $year = $_POST['year'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    
    //Set class system
    //Set year 
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
    $rs_register = mysqli_fetch_array($register);
    $cyear = $rs_register['year'];
                            
    //$cyear = date("Y");
    //Datangkan kelas masuk belajar
    $first = $cyear; 
    $second = $cyear-1;
    $third  = $cyear-2;
    $fordth = $cyear-3;
    //Kelas sekarang
    $kelas = $class;
    if($kelas == $first){ $cnow = '1'; }
    if($kelas == $second){ $cnow = '2'; }
    if($kelas == $third){ $cnow = '3'; }
    if($kelas == $fordth){ $cnow = '4'; }
    
    //echo $class;
    /*
    echo "<br>";
    echo $faculty;
    echo "<br>";
    echo $department;
    echo "<br>";
    echo $term;
    echo "<br>";
    echo $cnow;
     * 
     */
    
    //Get student data for register
    if($department == 0){
        $student = mysqli_query($con, "SELECT * FROM students
                                WHERE class='$class' and ft_id='$faculty'
                                ORDER BY student_id
                                ");   
    }else{
        $student = mysqli_query($con, "SELECT * FROM students
                                    WHERE class='$class' and ft_id='$faculty' and dp_id='$department'
                                    ORDER BY student_id
                                    ");    
    }
    
    $sql = mysqli_query($con, "SELECT s.*,ss.* FROM students s 
                        INNER JOIN studentSubject ss ON s.st_id=ss.st_id 
                        WHERE s.ft_id='$faculty' and s.dp_id='$department' and ss.ss_term='$term' and ss.ss_year='$year' ");
    $get = mysqli_fetch_array($sql);
    
    if($get[0] > 0){
        $id = 1;
    }else{
        $id = 0;
    }
?>
<br>
<div class='well'>
    <form class="form-horizontal" action="?page=rs&&rspage=studentRegisterSave&&id=<?= $id ?>&&y=<?= $year ?>&&t=<?= $term ?>" enctype="multipart/form-data" method="POST">
        <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <td align='center'><b>NO.POKOK</b></th>
                <td align='center'><b>NAMA - NASAB</b></th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $iStu = 0 ;
                    while($rowStudent = mysqli_fetch_array($student)){
                        $st_id = $rowStudent['st_id'];
                        echo "<tr>";
                            echo "<td align='center'>
                                    {$rowStudent['student_id']}/{$st_id}
                                    <input type='hidden' name='st_id[$i]' value='{$st_id}'>
                                  </td>";
                            echo "<td>";
                            echo "{$rowStudent['firstname_rumi']} - {$rowStudent['lastname_rumi']}";
                                    $iRss = 0 ;
                                    echo "<table>";
                                        $registerSubject = mysqli_query($con, "SELECT * FROM registerSubject
                                                           WHERE rs_class='$cnow' and rs_term='$term' and ft_id='$faculty' and dp_id='$department'
                                                           ");
                                        while($rowRegisterSubject = mysqli_fetch_array($registerSubject)){
                                            $subject = $rowRegisterSubject['s_id'];
                                            $teacher = $rowRegisterSubject['t_id'];
                                            echo "<tr>";
                                            echo "<td>";
                                            echo "<input type='hidden' name='st_ids[$iRss]' value='{$st_id}'>";
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<input type='hidden' name='s_id[$iRss]' value='{$subject}'>";
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<input type='hidden' name='t_id[$iRss]' value='{$teacher}'>";
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<input type='hidden' name='term[$iRss]' value='{$term}'>";
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<input type='hidden' name='year[$iRss]' value='{$year}'>";
                                            echo "</td>";
                                            echo "</tr>";
                                    $iRss++;   
                                    }
                                    echo "</table>";
                            echo "</td>";
                        echo "</tr>";
                        $iStu++;
                    }
                ?>
            </tbody>
        </table>
        
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-5">
                <button type="reset" class="btn btn-default btn-sm">BATAL</button>
                <button type="submit" class="btn btn-primary btn-sm" name="save">SIMPAN</button>
            </div>
       </div>
    </form>
</div>
