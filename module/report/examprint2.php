<?php
        include '../../connect.php';
        $term_s = $_GET['term'];
        $year_s = $_GET['year'];
        $class_s = $_GET['class'];
        $faculty_s = $_GET['faculty'];
        $department_s = $_GET['department'];
        $status_s = $_GET['status'];
        
        if($status_s == '1'){
            $sql = mysqli_query($con, "SELECT s.*,srx.*,xp.* FROM students s 
                 INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                 LEFT JOIN exam_pay xp ON srx.srx_id=xp.srx_id
                 WHERE s.class='$class_s' and s.ft_id='$faculty_s' and s.dp_id='$department_s' and srx.year='$year_s' and srx.term='$term_s' ORDER BY s.student_id");
        }else{
            $sql = mysqli_query($con, "SELECT s.*,srx.*,xp.* FROM students s 
                 INNER JOIN student_register_exam srx ON s.st_id=srx.st_id
                 LEFT JOIN exam_pay xp ON srx.srx_id=xp.srx_id
                 WHERE s.class='$class_s' and s.ft_id='$faculty_s' and s.dp_id='$department_s' and srx.year='$year_s' and srx.term='$term_s' and srx.pay_status='$status_s' ORDER BY s.student_id");
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
    <?php
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="MyXls.xls"');#ชื่อไฟล์
        header('Cache-Control: max-age=0');
    ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"

xmlns:x="urn:schemas-microsoft-com:office:excel"

xmlns="http://www.w3.org/TR/REC-html40">

<HTML dir="rtl" lang="ar">
    <head>

        <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
        
    </head>
      
    <body>
        <table x:str width="100%">
            <tr>
                <td colspan="7" align="center">
                    <font size="4px"><b> جامعة الشيخ داود الفطاني اﻹسلامية - جالا </b></font><br><br>
                    <font size="4px">دفتراوجين فغكل <?= $term_s ?>  تاهون اكاديميك <?= $year_s ?></font><br>
                    <font size="4px"><?= $fakulty_name ?> <font size="4px">&nbsp;&nbsp;&nbsp;<?= $department_name ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; الفرقة <?= $cname ?> </font>
                </td>  
            </tr>
        </table>

        <table x:str border="1" width="100%">
            <tr height="2px">
                <td align="center" height="30"><b>نمبر رشيد</b></td>
                <td align="center"><b>تغكل باير</b></td>
                <td align="center"><b>جمله دويت</b></td>
                <td align="center"><b>باقا</b></td>
                <td align="center"><b>نام</b></td>
                <td align="center"><b>نمبرفوكؤ</b></td>
                <td align="center"><b>بيل</b></td>
            </tr>
            <tbody>
                <?php
                    $i = 0 ;
                    $m = 0 ;
                    while($rs_search = mysqli_fetch_array($sql)){
                        $i = $i+1;
                        $m = $m + $rs_search['money'];
                ?>
                <tr>
                    <td align="center"><?= $rs_search['reciet_code'] ?></td>
                    <td align="center"><?= $rs_search['pay_date'] ?></td>
                    <td align="center"><?= number_format($rs_search['money']) ?></td>
                    <td align="right"><?= $rs_search['lastname_jawi'] ?></td>
                    <td align="right"><?= $rs_search['firstname_jawi'] ?></td>
                    <td align="center"><?= $rs_search['student_id'] ?></td>
                    <td align="center"><?= $i ?></td>
                    </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="3" align="center"><b><?= number_format($m) ?></b></td>
                    <td colspan="4" align="center"><b>جمله دويت</b></td>
                </tr>
            </tbody>
        </table>
          
    </body>

</html>