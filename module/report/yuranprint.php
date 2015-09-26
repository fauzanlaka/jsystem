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
        include '../../connect.php';
        $term_s = $_GET['term'];
        $year_s = $_GET['year'];
        $class_s = $_GET['class'];
        $faculty_s = $_GET['faculty'];
        $department_s = $_GET['department'];
        $status_s = $_GET['status'];
        
        if($status_s == '1'){
            $sql = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s 
                INNER JOIN student_register sr ON s.st_id=sr.st_id
                LEFT JOIN payments p ON sr.sr_id=p.sr_id
                WHERE s.class='$class_s' and s.ft_id='$faculty_s' and s.dp_id='$department_s' and sr.academic_year='$year_s' and sr.term='$term_s' ORDER BY s.student_id");
        }else{
            $sql = mysqli_query($con, "SELECT s.*,sr.*,p.* FROM students s 
                INNER JOIN student_register sr ON s.st_id=sr.st_id
                LEFT JOIN payments p ON sr.sr_id=p.sr_id
                WHERE s.class='$class_s' and s.ft_id='$faculty_s' and s.dp_id='$department_s' and sr.academic_year='$year_s' and sr.term='$term_s' and sr.pay_status='$status_s' ORDER BY s.student_id");
        }
        
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
                            <font size="4px">يوران دان دفتر اولغ فغكل <?= $term_s ?>  تاهون اكاديميك <?= $year_s ?></font><br>
                            <font size="4px"><?= $fakulty_name ?> <font size="4px">&nbsp;&nbsp;&nbsp;<?= $department_name ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; الفرقة <?= $cname ?> </font>
                        </td>
                    </tr>
                </table>
            
                <table border="1px" width="100%">
                      <tr height="2px">
                        <td align="center" height="30"><b>نمبر رشيد</b></td>
                        <td align="center"><b>تغكل باير</b></td>
                        <td align="center"><b>يوران</b></td>
                        <td align="center"><b>باقا</b></td>
                        <td align="center"><b>نام</b></td>
                        <td align="center"><b>نمبرفوكؤ</b></td>
                        <td align="center"><b>بيل</b></td>
                      </tr>
                    <tbody>
                        <?php
                          $sumMoney = 0 ;
                          $i = 0 ;
                          while($rs_search = mysqli_fetch_array($sql)){
                              $i = $i+1; 
                        ?>
                        <tr>
                          <td align="center"><?= $rs_search['reciet_code'] ?></td>
                          <td align="center"><?= $rs_search['pay_date'] ?></td>
                          <td align="center"><?= number_format($rs_search['money']) ?></td>
                          
                          <?php 
                            $sumMoney = ($rs_search['money'])+ ($sumMoney);
                          ?>
                          
                          <td align="right"><?= $rs_search['lastname_jawi'] ?></td>
                          <td align="right"><?= $rs_search['firstname_jawi'] ?></td>
                          <td align="center"><?= $rs_search['student_id'] ?></td>
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
