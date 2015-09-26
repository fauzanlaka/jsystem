<?php

    //Get academic year from register
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
    $rs_register = mysqli_fetch_array($register);
    $year_register = $rs_register['year'];

    $q = $_POST['q'];
    $search = mysqli_query($con, "SELECT * FROM students WHERE student_id='$q' or firstname_jawi LIKE '%".$q."%' or firstname_rumi LIKE '%".$q."%'");   
    
?>
<div class="pull-right">
        <form class="navbar-form" role="search" action="?page=payment&&paymentpage=muqaddimahsearch" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="q" required>
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
            </div>
        </form>
</div>
<br>
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <td align="center"><b>NO.POKOK</b></td>
      <td align="center"><b>NAMA-NASAB</b></td>
      <td align="center"><b>نام - نسب</b></td>
      <td align="center"><b>TAHUN PENGAJIAN</b></td>
      <td align="center"><b>STATUS</b></td>
    </tr>
  </thead>
  <tbody>
<?php
    while($row = mysqli_fetch_array($search)){
        $id = $row['st_id'];
        $student_id = str_replace("\'", "&#39;", $row["student_id"]);
        $name_r = str_replace("\'", "&#39;", $row["firstname_rumi"]);
        $lastname_r = str_replace("\'", "&#39;", $row["lastname_rumi"]);
        $name_j = str_replace("\'", "&#39;", $row["firstname_jawi"]);
        $lastname_j = str_replace("\'", "&#39;", $row["lastname_jawi"]);
        //$term = $row['term_id'];
        //$year = $row['academic_year'];
        $status = $row['muqaddimah'];
        $income_year = $row['income_year'];
?>
    <tr>
      <td align="center"><a href="?page=payment&&paymentpage=muqaddimahpay&&id=<?= $id ?>"><?= $student_id ?></a></td>
      <td align="left"><?= strtoupper($name_r) ?> - <?= strtoupper($lastname_r) ?></td>
      <td align="right"><?= $name_j ?> - <?= $lastname_j ?></td>
      <td align="center"><?= $income_year ?></td>    
      <td align="center">
<?php
    $new_id = $id;
    $new_income_year = $income_year;
    $sql_check_status = mysqli_query($con, "SELECT * FROM muqaddimah_pay WHERE st_id='$new_id' and m_academicyear='$new_income_year'");
    $rs_sql_check_status = mysqli_fetch_array($sql_check_status);    
    if($rs_sql_check_status[0] > 0){  
?>
          <a href="?page=payment&&paymentpage=editmuqaddimah&&id=<?= $id ?>&&year=<?= $income_year?>" ><font color='green'><b>Sudah bayar</b></font></a>
<?php
    }else{
?>
          <font color='red'><b>Belum bayar</b></font> 
<?php
    }
?>
      </td>    
    </tr>
<?php 
    } 
?>
</table>
