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
            height: 900px;
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
    $teacher = mysqli_query($con, "SELECT * FROM teachers");
 ?>
	<body>			
            <div id="printableArea">
                
                <table width="100%">
                    <tr align="center">
                        <td align="center">
                            <font size="4px"><b> جامعة الشيخ داود الفطاني اﻹسلامية - جالا </b></font><br><br>
                            <font size="4px"><b> سناراي فنشرج جيسدا </b></font><br><br>
                        </td>
                    </tr>
                </table>
            
                <table border="1px" width="100%">
                      <tr>
                        <td align="center"><b>نمبر تلفون</b></td>
                        <td align="center"><b> نام - نسب </b></td>
                        <td align="center"><b> كود </b></td>
                        <td align="center"><b>بيل</b></td>
                      </tr>
                    <tbody>
                        <?php
                          $sumMoney = 0 ;
                          $i = 1 ;
                          while($rowTeacher = mysqli_fetch_array($teacher)){
                              //Get student data
                              $studentId = $rowTeacher['student_id'];
                              $fName = str_replace("\'", "&#39;", $rowTeacher['t_fnameArab']);
                              $lName = str_replace("\'", "&#39;", $rowTeacher['t_lnameArab']);
                              $telephone = $rowTeacher['t_telephone'];
                              $code = $rowTeacher['t_code'];
                        ?>
                        <tr>
                          <td align="center" height="10"><font size="2px"><?= $telephone ?></font></td>
                          <td align="right" height="10"><font size="2px"><?= $lName ?> - <?= $fName ?></font></td>
                          <td align="center" height="10"><font size="2px"><?= $code ?></font></td>
                          <td align="center" height="10"><font size="2px"><?= $i ?></font></td>
                        </tr>
                        <?php
                            $i = $i+1;
                          }
                        ?>
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
