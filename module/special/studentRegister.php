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
    echo "<br>";
    echo $faculty;
    echo "<br>";
    echo $department;
    echo "<br>";
    echo $term;
    echo "<br>";
    echo $cnow;
    
    //Get student data for register
    $student = mysqli_query($con, "SELECT * FROM students
                            WHERE class='$class' and ft_id='$faculty' and dp_id='$department'
                            ORDER BY student_id
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
                        echo "<td>";
                        echo "{$rowStudent['firstname_rumi']} - {$rowStudent['lastname_rumi']}";
                                $iRss = 0 ;
                                echo "<table>";
                                    $registerSubject = mysqli_query($con, "SELECT * FROM registerSubject
                                                       WHERE rs_class='$cnow' and rs_term='$term' and ft_id='$faculty' and dp_id='$department'
                                                       ");
                                    while($rowRegisterSubject = mysqli_fetch_array($registerSubject)){
                                        $subject = $rowRegisterSubject['s_id'];
                                        echo "<tr>";
                                        echo "<td>";
                                        echo "<input type='text' name='st_ids[$iRss]' value='{$st_id}'>";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "<input type='text' name='st_ids[$iRss]' value='{$subject}'>";
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
</div>
