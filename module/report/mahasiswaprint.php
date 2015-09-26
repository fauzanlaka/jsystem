<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>ADMIN | Resit</title>
    
    <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;}
                .tg td{font-family:Arial, sans-serif;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
                .tg th{font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
                .tg .tg-s6z2{text-align:center}
                .tg .tg-hgcj{font-weight:bold;text-align:center}
                
                body {
                height: 842px;
                width: 595px;
                /* to centre page on screen*/
                margin-left: auto;
                margin-right: auto;
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
        include '../../connect.php';
        $class_s = $_GET['class'];
        $faculty_s = $_GET['faculty'];
        $department_s = $_GET['department'];

        $sql = mysqli_query($con, "SELECT s.*,f.*,d.*,m.* FROM students s 
            INNER JOIN fakultys f ON s.ft_id=f.ft_id
            INNER JOIN departments d ON s.dp_id=d.dp_id
            INNER JOIN muqaddimah_pay m ON s.st_id=m.st_id
            WHERE s.class='$class_s' and f.ft_id='$faculty_s' and d.dp_id='$department_s' and m.m_academicyear='$class_s' ORDER BY s.student_id");

        //Get faculty data
        $fakulty_data = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$faculty_s'");
        $rs_fakultydata = mysqli_fetch_array($fakulty_data);
        $fakulty_name = $rs_fakultydata['ft_arab_name'];
        
        //Get department data
        $department_data = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$department_s'");
        $rs_department = mysqli_fetch_array($department_data);
        $department_name = $rs_department['dp_arab_name'];
        
        //Set class system
        $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
        $rs_register = mysqli_fetch_array($register);
        $year_register = $rs_register['year'];

        $c1 = $year_register ;
        $c2 = $year_register-1;
        $c3 = $year_register-2;
        $c4 = $year_register-3;
        
        //Set class name
        $class_check = $class_s;
        if($class_check == $c1){ $cname = '1'; }
        if($class_check == $c2){ $cname = '2'; }
        if($class_check == $c3){ $cname = '3'; }
        if($class_check == $c4){ $cname = '4'; }
    ?>
	<body>			
            <div id="printableArea">
                
                <table width="100%">
                    <tr align="center">
                        <td align="center">
                            <font size="4px"><b> جامعة الشيخ داود الفطاني اﻹسلامية - جالا </b></font><br><br>
                            <font size="4px">جاتتن كحاضيران تاهون أكاديميك <?= $year_register ?></font><br>
                            <font size="4px"><?= $fakulty_name ?> <font size="4px">&nbsp;&nbsp;&nbsp;<?= $department_name ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; الفرقة <?= $cname ?> </font><br>
                        </td>
                    </tr>
                </table>
                <br>

                <table class="tg" align='center'>
                  <tr style="height:15px">
                    <th class="tg-hgcj" colspan="12" >هاري دان حصة</th>
                    <th class="tg-hgcj" rowspan="4">باقا</th>
                    <th class="tg-hgcj" rowspan="4">نام</th>
                    <th class="tg-hgcj" rowspan="4">نمبرفوكؤ</th>
                    <th class="tg-hgcj" rowspan="4">بيل</th>
                  </tr>
                  <tr style="height:15px">
                    <td class="tg-031e" colspan="3" align='center'>خميس</td>
                    <td class="tg-031e" colspan="3" align='center'>رابو</td>
                    <td class="tg-031e" colspan="3" align='center'>ثلاث</td>
                    <td class="tg-031e" colspan="3" align='center'>اثنين</td>
                  </tr>
                  <tr style="height:15px">
                    <td class="tg-031e" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="tg-031e" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="tg-031e" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td class="tg-031e" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  </tr>
                  <tr style="height:15px">
                    <td class="tg-s6z2">3</td>
                    <td class="tg-s6z2">2</td>
                    <td class="tg-s6z2">1</td>
                    <td class="tg-s6z2">3</td>
                    <td class="tg-s6z2">2</td>
                    <td class="tg-s6z2">1</td>
                    <td class="tg-s6z2">3</td>
                    <td class="tg-s6z2">2</td>
                    <td class="tg-s6z2">1</td>
                    <td class="tg-s6z2">3</td>
                    <td class="tg-s6z2">2</td>
                    <td class="tg-s6z2">1</td>
                  </tr>
                  <?php
                    $i = 0 ;
                    while($rs_search = mysqli_fetch_array($sql)){
                    $i = $i+1; 
                  ?>
                  <tr height="20">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td align="right"><?= $rs_search['lastname_jawi'] ?></td>
                      <td align="right"><?= $rs_search['firstname_jawi'] ?></td>
                      <td align="center"><?= $rs_search['student_id'] ?></td>
                      <td align="center"><?= $i ?></td>
                  </tr>
                  <?php
                    }
                  ?>
                  <tr>
                        <th class="tg-031e"></th>
                        <th class="tg-031e"></th>
                        <th class="tg-031e"></th>
                        <th class="tg-031e"></th>
                        <th class="tg-031e"></th>
                        <th class="tg-031e"></th>
                        <th class="tg-031e"></th>
                        <th class="tg-031e"></th>
                        <th class="tg-031e"></th>
                        <th class="tg-031e"></th>
                        <th class="tg-031e"></th>
                        <th class="tg-031e"></th>
                        <th class="tg-031e" colspan="4" align="center">تنداتاغن فنشرح</th>
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
