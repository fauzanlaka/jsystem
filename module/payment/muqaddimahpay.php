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
?>
<br>
<div class="well">
    <span class="glyphicon glyphicon-check"></span> <b>TAHUN PENGAJIAN:</b> <?= $year_register ?>
    <hr>
    <form class="form-horizontal" action="?page=payment&&paymentpage=muqaddimahsave&&id=<?= $st_id ?>" enctype="multipart/form-data" method="POST">
        
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
                    <input name="money" class="form-control input-sm" type="number" value="700">
                </div>    
        </div>
        
        <?php

            $sql_rc = "SELECT* FROM muqaddimah_pay WHERE m_id = (SELECT MAX(m_id) FROM muqaddimah_pay)";
            $query_rc = mysqli_query($con, $sql_rc);
            $result_rc = mysqli_fetch_array($query_rc);

            $maxbill = $result_rc['m_reciet'];
            //$bills = $result_rc['p_id'];
            //$reciet_code = $maxbill+1;
            $tmp1=substr($maxbill,4);
            $tmp2 = $tmp1+1;
            
            $cyear = substr($year_register,2);
            $fcode = 'Y'.$cyear ;
            
            if($tmp2 <= 9){$tmp3='000'.$tmp2;}
            if($tmp2 > 9 && $tmp2 <= 99){$tmp3='00'.$tmp2;}
            if($tmp2 > 99 && $tmp2 <= 999){$tmp3='0'.$tmp2;}
            if($tmp2 > 999 && $tmp2 <= 9999){$tmp3=$tmp2;}
            
        ?>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">KOD RESIT :</label> 
                <div class="col-lg-3">
                    <input name="reciet_code" class="form-control input-sm" type="text" value="<?= $fcode ?>/<?= $tmp3 ?>">
                </div>
                <div class="col-lg-3">
                    <p class="text-danger">Resit terakhir : <?= $maxbill ?></p>
                </div>
        </div>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">TARIKH BAYAR :</label> 
                <div class="col-lg-3">
                    <input name="pay_date" class="form-control input-sm" type="date" value="<?= date('Y-m-d') ?>">
                </div>    
        </div>
        
        <input type="hidden" name="academic_year" value="<?= $year ?>">
        
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-3">
                <a href="module/payment/muqaddimahreciet.php?id=<?= $st_id ?>&&year=<?= $year ?>" target="_blank"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> PRINT</button></a>
                <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
            </div>
        </div>
        
    </form>
    
</div>


