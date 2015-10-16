<?php
    $class = $_POST['class'];
    $term = $_POST['term'];
    $year = $_POST['year'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    
    //Get student data for register
    $student = mysqli_query($con, "SELECT * FROM students
                            WHERE class='$class' and ft_id='$faculty' and dp_id='$department'
                            ORDER BY student_id
                            ");
    
    //Get registerSubject data
    $registerSubject = mysqli_query($con, "SELECT * FROM registerSubject 
                                    WHERE rs_class='$class' and rs_term='$term' and ft_id='$faculty' dp_id='$department' 
                                    ");
?>
<br>
<div class='well'>
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
                echo "<td align='center'> {$iStu} / {$rowStudent['student_id']} / {$st_id}</td>";
                echo "<td>{$rowStudent['firstname_rumi']} - {$rowStudent['lastname_rumi']}</td>";
                
                    $iRss = 0 ;
                    while($rowRegisterSubject = mysqli_fetch_array($registerSubject)){
                        echo $st_id;  
                    }
                echo "</tr>";
                $iStu++;
            }
          ?>
        </tbody>
    </table>
</div>
