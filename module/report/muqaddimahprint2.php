<?php
  include '../../connect.php';
  $term_s = $_GET['term'];
  $year_s = $_GET['year'];
  //$class_s = $_GET['class'];
  $faculty_s = $_GET['faculty'];
  $department_s = $_GET['department'];
  $status_s = $_GET['status'];


  $sql = mysqli_query($con, "SELECT s.*,m.* FROM students s 
  LEFT JOIN muqaddimah_pay m ON s.st_id=m.st_id 
  WHERE s.ft_id='$faculty_s' and s.dp_id='$department_s' and s.income_year='$year_s' and m.m_academicyear='$year_s' ORDER BY s.student_id");

  //Get faculty data
  $fakulty_data = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$faculty_s'");
  $rs_fakultydata = mysqli_fetch_array($fakulty_data);
  $fakulty_name = $rs_fakultydata['ft_arab_name'];
        
  //Get department data
  $department_data = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$department_s'");
  $rs_department = mysqli_fetch_array($department_data);
  $department_name = $rs_department['dp_arab_name'];

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

        <table x:str BORDER="1" width="65%">

        <tr align="center">
            <td align="center" colspan="7">
                 <font size="4px"><b> جامعة الشيخ داود الفطاني اﻹسلامية - جالا </b></font><br><br>
                 <font size="4px">مقدمة <?= $term_s ?>  تاهون اكاديميك <?= $year_s ?></font><br>
                 <font size="4px"><?= $fakulty_name ?> <font size="4px">&nbsp;&nbsp;&nbsp;<?= $department_name ?></font>
            </td>
       </tr>

        <tr>
            <td align="center" height="30"><b>نمبر رشيد</b></td>
            <td align="center"><b>تغكل باير</b></td>
            <td align="center"><b>مقدمة</b></td>
            <td align="center"><b>باقا</b></td>
            <td align="center"><b>نام</b></td>
            <td align="center"><b>نمبرفوكؤ</b></td>
            <td align="center"><b>بيل</b></td>
        </tr>
            
        <?php
          $i = 0 ;
          $m = 0;
          while($rs_search = mysqli_fetch_array($sql)){
          $i = $i + 1;
          $m = $m + $rs_search['m_money'];
        ?>
            
        <tr>
            <td align="center"><?= $rs_search['m_reciet'] ?></td>
            <td align="center"><?= $rs_search['m_paydate'] ?></td>
            <td align="center"><?= number_format($rs_search['m_money']) ?></td>
            <td align="right"><?= $rs_search['lastname_jawi'] ?></td>
            <td align="right"><?= $rs_search['firstname_jawi'] ?></td>
            <td align="center"><?= $rs_search['student_id'] ?></td>
            <td align="center"><?= $i ?></td>
        </tr>
            
        <?php } ?>
        <tr>
            <td colspan="5" align="center"><?= number_format($m) ?></td>
            <td colspan="2" align="center">جمله دويت سمو</td>      
        </tr>
        </table>

    </BODY>

</HTML>
