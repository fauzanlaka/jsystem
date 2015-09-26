<?php

    $money = $_POST['money'];
    $reciet_code = $_POST['reciet_code'];
    $pay_date = $_POST['pay_date'];
    $m_id = $_POST['m_id'];
    
    $update = mysqli_query($con, "UPDATE muqaddimah_pay SET
            m_money='".$money."',
            m_reciet='".$reciet_code."',
            m_paydate='".$pay_date."'
            WHERE m_id='$m_id'
            ");
?>
<br>
<div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Berhasil!</strong> Data berhasil di perbaharui.
</div>
<?php
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT * FROM students WHERE st_id='$id'
         ");
    $rs = mysqli_fetch_array($sql);
    $f_name = $rs['firstname_rumi'];
    $l_name = $rs['lastname_rumi'];
    $muqaddimah = $rs['muqaddimah'];
    $st_id = $rs['st_id'];
    $year = $rs['income_year'];
    
    //$student_id = $rs['student_id'];
    $student_data = mysqli_query($con, "SELECT st.*,ft.*,dp.* FROM students st
                  INNER JOIN fakultys ft ON st.ft_id=ft.ft_id
                  INNER JOIN departments dp ON st.dp_id=dp.dp_id
                  WHERE st.st_id='$st_id'
                  ");
    $rs_data_student = mysqli_fetch_array($student_data);
    $ft_name = str_replace("\'", "&#39;", $rs_data_student['ft_name']);
    
    //Get academic year from register
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
    $rs_register = mysqli_fetch_array($register);
    $year_register = $rs_register['year'];
    
    //Get payment data from muqaddimah_pay's table
    $payment_data = mysqli_query($con, "SELECT * FROM muqaddimah_pay WHERE st_id='$id' and m_academicyear='$year'");
    $rs_payment_data = mysqli_fetch_array($payment_data);
    $money_data = $rs_payment_data['m_money'];
    $reciet_code_data = $rs_payment_data['m_reciet'];
    $pay_date_data = $rs_payment_data['m_paydate'];
    $m_id= $rs_payment_data['m_id'];
?>
<div class="well">
    <span class="glyphicon glyphicon-check"></span> <b>TAHUN PENGAJIAN:</b> <?= $year_register ?>
    <hr>
    <form class="form-horizontal" action="?page=payment&&paymentpage=saveeditmuqaddimah&&id=<?= $st_id ?>" enctype="multipart/form-data" method="POST">
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>NO.POKOK :</b><font color="green"> <?= $rs['student_id'] ?></font></p>
            </div>
            <div class="col-lg-6">
                <p><b>FAKULTI :</b><font color="green"> <?= $ft_name ?></font></p>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>NAMA - NASAB :</b><font color="green"> <?= $f_name ?> - <?= $l_name ?></font></p>
            </div>
            <div class="col-lg-6">
                <p><b>JURUSAN :</b> <font color="green"><?= $rs_data_student['dp_name'] ?></font></p>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-6">
                <?php
                    $new_id = $id;
                    $new_income_year = $year;
                    $sql_check_status = mysqli_query($con, "SELECT * FROM muqaddimah_pay WHERE st_id='$new_id' and m_academicyear='$new_income_year'");
                    $rs_sql_check_status = mysqli_fetch_array($sql_check_status);    
                    if($rs_sql_check_status[0] > 0){  
                ?>
                    <p><b>STATUS PEMBAYARAN :</b> <font color='green'><b> Sudah bayar</b></font>
                <?php
                    }else{
                ?>
                  <p><b>STATUS PEMBAYARAN :</b> <font color='red'><b> Belum bayar</b></font> 
                <?php
                    }
                ?>
            </div>
        </div>
        
        <hr>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">JUMLAH DUIT :</label> 
                <div class="col-lg-3">
                    <input name="money" class="form-control input-sm" type="number" value="<?= $money_data ?>">
                </div>    
        </div>
   
        <div class="form-group">
                <label class="col-lg-4 control-label">KOD RESIT :</label> 
                <div class="col-lg-3">
                    <input name="reciet_code" class="form-control input-sm" type="text" value="<?= $reciet_code_data ?>"> 
                </div>
        </div>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">TARIKH BAYAR :</label> 
                <div class="col-lg-3">
                    <input name="pay_date" class="form-control input-sm" type="date" value="<?= $pay_date_data ?>">
                </div>    
        </div>
        
        <input type="hidden" name="academic_year" value="<?= $year ?>">
        <input type="hidden" name="m_id" value="<?= $m_id ?>">
        
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-3">
                <a href="module/payment/muqaddimahreciet.php?id=<?= $st_id ?>&&year=<?= $year ?>" target="_blank"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> PRINT</button></a>
                <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
            </div>
        </div>
        
    </form>
    
</div>