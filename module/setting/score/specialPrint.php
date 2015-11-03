<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>ADMIN | Resit</title>
    
    <style>
        body {
            height: 842px;
            width: 595px;
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }
        table{
            border-collapse: collapse;
        }
    </style>
    
    <script language="javascript" type="text/javascript">
        function printDiv(printableArea) {
            var printContents = document.getElementById(printableArea).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    </head>
    <?php
    include '../../../connect.php';
    $year = $_GET['year'];
    $faculty = $_GET['faculty'];
    $department = $_GET['department'];
    $subject = $_GET['subject'];
    
    //Get subject data
    $subjectData = mysqli_query($con, "SELECT * FROM subject WHERE s_id='$subject'");
    $rowSubject = mysqli_fetch_array($subjectData);
    
    //Get current year 
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
    $rs_register = mysqli_fetch_array($register);
    $cyear = $rs_register['year'];
    
    //Get faculty data
    $sqlFaculty = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$faculty'");
    $rowFaculty = mysqli_fetch_array($sqlFaculty);
    
    //Get department data
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
    
    $kelas = $score['class'];
    if($kelas == $first){ $cnow = '1'; }
    if($kelas == $second){ $cnow = '2'; }
    if($kelas == $third){ $cnow = '3'; }
    if($kelas == $fordth){ $cnow = '4'; }

    //Get student data for update score
    if($department == "0"){
    $score = mysqli_query($con, "SELECT s.*,ss.* FROM students s
                         INNER JOIN studentSubject ss ON s.st_id=ss.st_id
                         WHERE s.ft_id='$faculty' and ss.ss_year='$year' and ss.s_id='$subject' ORDER BY s.student_id");
    }else{
    $score = mysqli_query($con, "SELECT s.*,ss.* FROM students s
                         INNER JOIN studentSubject ss ON s.st_id=ss.st_id
                         WHERE s.ft_id='$faculty' and s.dp_id='$department' and ss.ss_year='$year' and ss.s_id='$subject' ORDER BY s.student_id");    
    }
    $rowStudent = mysqli_fetch_array($score);
 ?>
	<body>			
            <div id="printableArea">
                
                <table width="100%">
                    <tr align="center">
                        <td align="center">
                            <font size="4px"><b> جامعة الشيخ داود الفطاني اﻹسلامية - جالا </b></font><br><br>
                            <font size="4px"><?= $rowFaculty['ft_arab_name'] ?>&nbsp;&nbsp;<?= $rowDepartment['dp_arab_name'] ?></font><br>
                            <font size="4px"><?= $year ?> <?= $rowSubject['s_arabName'] ?></font>
                        </td>
                    </tr>
                </table>
            
                <table border="1px" width="100%">
                      <tr height="2px">
                        <td align="center"><b>نتيجه</b></td>
                        <td align="center"><b>باقا</b></td>
                        <td align="center"><b>نام</b></td>
                        <td align="center"><b>نمبرفوكؤ</b></td>
                        <td align="center"><b>بيل</b></td>
                      </tr>
                    <tbody>
                        <?php
                          $sumMoney = 0 ;
                          $i = 0 ;
                          while($rowStudent = mysqli_fetch_array($score)){
                              //Get student data
                              $studentId = $rowStudent['student_id'];
                              $fName = str_replace("\'", "&#39;", $rowStudent['firstname_jawi']);
                              $lName = str_replace("\'", "&#39;", $rowStudent['lastname_jawi']);
                              $scoreValue = $rowStudent['ss_score'];
                              $i = $i+1; 
                        ?>
                        <tr>
                          <td align="center"><?= $scoreValue ?></td>
                          <td align="right"><?= $lName ?></td>
                          <td align="right"><?= $fName ?></td>
                          <td align="center"><?= $studentId ?></td>
                          <td align="center"><?= $i ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <table border="1px" width="100%">
                      <tr height="2px">
                          <td align="center" width="70%"><b><?= number_format($sumMoney) ?></b></td>
                            <td align="center" height="30" width="30%"><b>جمله دويت سموا</b></td>
                      </tr>
                </table>
            </div>
            <br>
            <div align="center">
                <button type="button" class="btn btn-success" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
            </div>
            <br>
    </body>
</html>
