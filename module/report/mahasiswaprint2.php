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

    <?php
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="MyXls.xls"');#ชื่อไฟล์
        header('Cache-Control: max-age=0');
    ?>

<html xmlns:o="urn:schemas-microsoft-com:office:office"

xmlns:x="urn:schemas-microsoft-com:office:excel"

xmlns="http://www.w3.org/TR/REC-html40">

<HTML dir="rtl" lang="ar">

<HEAD>

    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
</HEAD>
    
    <BODY>
        <table x:str BORDER="1" width="70%">
          <tr>
              <td align="center" colspan="16">
                <font size="4px"><b> جامعة الشيخ داود الفطاني اﻹسلامية - جالا </b></font><br><br>
                <font size="4px"> جاتتن كحاضيران تاهون أكاديميك</font><br>
                <font size="4px"><?= $department_name ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; الفرقة <?= $cname ?> </font><br>
               </td>
          </tr>
          <tr>
            <td  colspan="12" align="center">هاري دان حصة</td>
            <td  rowspan="4" align="center" valign="middle">باقا</td>
            <td  rowspan="4" align="center" valign="middle">نام</td>
            <td  rowspan="4" align="center" valign="middle">نمبرفوكؤ</td>
            <td  rowspan="4" align="center" valign="middle">بيل</td>
          </tr>
          <tr>
            <td  colspan="3" align="center">خميس</td>
            <td  colspan="3" align="center">رابو</td>
            <td  colspan="3" align="center">ثلاث</td>
            <td  colspan="3" align="center">اثنين</td>
          </tr>
          <tr>
            <td  colspan="3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td  colspan="3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td  colspan="3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td  colspan="3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td align="center">3</td>
            <td align="center">2</td>
            <td align="center">1</td>
            <td align="center">3</td>
            <td align="center">2</td>
            <td align="center">1</td>
            <td align="center">3</td>
            <td align="center">2</td>
            <td align="center">1</td>
            <td align="center">3</td>
            <td align="center">2</td>
            <td align="center">1</td>
          </tr>
            <?php
               $i = 0 ;
                while($rs_search = mysqli_fetch_array($sql)){
                $i = $i+1; 
            ?>
          <tr>
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
            <td></td>
          </tr>
          <tr>
            <td rowspan="2"></td>
            <td rowspan="2"></td>
            <td rowspan="2"></td>
            <td rowspan="2"></td>
            <td rowspan="2"></td>
            <td rowspan="2"></td>
            <td rowspan="2"></td>
            <td rowspan="2"></td>
            <td rowspan="2"></td>
            <td rowspan="2"></td>
            <td rowspan="2"></td>
            <td rowspan="2"></td>
            <td colspan="4" rowspan="2" valign="middle" align="center">تنداتاغن فنشرح</td>
          </tr>
        </table>

    </BODY>

</HTML>
