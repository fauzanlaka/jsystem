<?php
    include '../../connect.php';
    $id = $_GET['id'];
    $st_id = $_GET['st_id'];
    //Get dul register data from dulRegister
    $dulRegister = mysqli_query($con, "SELECT * FROM dulRegister WHERE dr_id='$id'");
    $rowDulRegister = mysqli_fetch_array($dulRegister);
    $dr_date = $rowDulRegister['dulDate'];
    $sumMoney = $rowDulRegister['sumMoney'];
    $dulCode = $rowDulRegister['dulCode'];
    
    //Get student data
    $student = mysqli_query($con, "SELECT * FROM students WHERE st_id='$st_id'");
    $rowStudent = mysqli_fetch_array($student);
    $student_id = $rowStudent['student_id'];
    $frname = $rowStudent['firstname_rumi'];
    $lrname = $rowStudent['lastname_rumi'];
    $faname = $rowStudent['firstname_jawi'];
    $laname = $rowStudent['lastname_jawi'];
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>JISDA | Kertas dur</title>
    
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
    <div id="printableArea">
                <table width="100%">
                    <tr>
                        <td colspan="4" align="center">
                            <img src="image/LOGO JISDA.png"width="66" height="77">
                        </td>
                    </tr>
                    <tr align="center">
                        <td align="center" colspan="4">
                            <font size="4px"><b> جامعة الشيخ داود الفطاني اﻹسلامية - جالا </b></font><br><br>
                        </td>
                    </tr>
                    <tr align="center">
                        <td align="center" colspan="4">
                            <font size="4px" color="black"><b>(كرتس دور)</b></font><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            KOD DAFTAR
                        </td>
                        <td>
                            <font color="grey"><?= $dulCode ?></font>
                        </td>
                        <td align="right">
                            <font color="grey"><?= $dulCode ?></font>
                        </td>
                        <td align="right">
                            كوددفتر
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            NO.POKOK 
                        </td>
                        <td align="left">
                            <font color="grey"><?= $student_id ?></font>
                        </td>
                        <td align="right">
                            <font color="grey"><?= $student_id ?></font> 
                        </td>
                        <td align="right">
                            نمبرفوكؤ 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            NAMA-NASAB
                        </td>
                        <td align="left">
                            <font color="grey"><?= $frname ?> - <?= $lrname ?></font>
                        </td>
                        <td align="right">
                            <font color="grey"><?= $faname ?> - <?= $laname ?></font>
                        </td>
                        <td align="right">
                            نام - نسب 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            TARIKH DAFTAR
                        </td>
                        <td align="left"> 
                            <font color="grey"><?= $dr_date ?></font>
                        </td>
                        <td align="right">
                            <font color="grey"><?= $dr_date ?></font>
                        </td>
                        <td align="right">
                            تاريخ دفتر  
                        </td>
                    </tr>
                </table>
        <br>
                <table border="1px" width="100%">
                      <tr bgcolor="grey">
                        <td align="center"><b>جمله دويت</b></td>
                        <td align="center"><b>فنشرح</b></td>
                        <td align="center"><b>مات كلية</b></td>
                        <td align="center"><b>كود</b></td>
                        <td align="center" width="80px"><b>بيل</b></td>
                      </tr>
                    <tbody>
                        <?php
                            $dulSubject = mysqli_query($con, "SELECT * FROM dulSubject WHERE dr_id='$id'");
                            $i = 1;
                            while($rowDulSubject = mysqli_fetch_array($dulSubject)){
                                $ss_id = $rowDulSubject['ss_id'];
                                $money = $rowDulSubject['money'];
                                
                            //Get s_id from studentSubject table
                            $studentSubject = mysqli_query($con, "SELECT * FROM studentSubject WHERE ss_id='$ss_id'");
                            $rowStudentSubject = mysqli_fetch_array($studentSubject);
                            $s_id = $rowStudentSubject['s_id'];
                            $t_id = $rowStudentSubject['t_id'];

                            //Get subject data from subject table
                            $subject = mysqli_query($con, "SELECT * FROM subject WHERE s_id='$s_id'");
                            $rowSubject = mysqli_fetch_array($subject);
                            $s_code = $rowSubject['s_code'];
                            $s_aname = $rowSubject['s_arabName'];
                            $s_rname = $rowSubject['s_rumiName'];
                            
                            //Get teacher data from teachers table
                            $teacher = mysqli_query($con, "SELECT * FROM teachers WHERE t_id='$t_id'");
                            $rowTeacher = mysqli_fetch_array($teacher);
                            $t_fname = $rowTeacher['t_fnameRumi'];
                            $t_lname = $rowTeacher['t_lnameRumi'];
                        ?>
                        <tr>
                          
                          <td align="center">
                              <font size="2px">
                                <?= $money ?>
                              </font>
                          </td>
                          
                          <td align="center">
                              <font size="2px">
                                  <?= $t_fname ?> - <?= $t_lname ?>
                              </font>
                          </td>
                          
                          <td align="center">
                              <font size="2px">
                                <?= $s_aname ?> <?= $s_rname ?>
                              </font>
                          </td>
                          
                          <td align="center">
                            <font size="2px">
                              <?= $s_code ?>    
                            </font>
                          </td>
                          
                          <td align="center">
                            <font size="2px">
                              <?= $i ?>    
                            </font>
                          </td>
                          
                        </tr>
                        <?php
                            ++$i;
                            }
                        ?>
                        <tr>
                            <td align="center">
                                <?= $sumMoney ?>
                            </td>
                            <td colspan="4" align="center">
                                جمله دويت سموا
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div align="center">
                <button type="button" class="btn btn-success" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
            </div>
            <br>
    </body>
</html>
