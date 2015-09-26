<?php
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT srx.*,st.*,rx.* FROM student_register_exam srx
         INNER JOIN students st ON srx.st_id=st.st_id
         INNER JOIN register_exam rx ON srx.rx_id=rx.rx_id
         WHERE srx_id='$id'
         ");
    $rs = mysqli_fetch_array($sql);
    $f_name = $rs['firstname_rumi'];
    $l_name = $rs['lastname_rumi'];
    $prize = $rs['prize'];
    $st_id = $rs['st_id'];
    
    $student_id = $rs['student_id'];
    $student_data = mysqli_query($con, "SELECT st.*,ft.*,dp.* FROM students st
                  INNER JOIN fakultys ft ON st.ft_id=ft.ft_id
                  INNER JOIN departments dp ON st.dp_id=dp.dp_id
                  WHERE student_id='$student_id'
                  ");
    $rs_data_student = mysqli_fetch_array($student_data);
?>
<br>
<div class="well">
    <span class="glyphicon glyphicon-check"></span> <b>DATA PENDAFTARAN :</b> <?= $rs['term'] ?>/<?= $rs['year'] ?>
    <hr>
    <form class="form-horizontal" action="?page=payment&&paymentpage=saveexam&&id=<?= $id ?>" enctype="multipart/form-data" method="POST">
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>NO.POKOK :</b><font color="green"> <?= $rs['student_id'] ?></font></p>
            </div>
            <div class="col-lg-6">
                <p><b>FAKULTI :</b><font color="green"> <?= $rs_data_student['ft_name'] ?></font></p>
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
                <p><b>TANGGAL DAFTAR :</b><font color="green"> <?= $rs['rx_date'] ?></font></p>
            </div>
            <div class="col-lg-6">
                <p><b>AWAL PEMBAYARAN :</b><font color="green"> <?= $rs['start_date'] ?></font></p>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>HARGA DAFTAR :</b><font color="green"> <?= number_format($prize) ?> ฿</font></p>
            </div>
            <div class="col-lg-6">
                <p><b>AKHIR PEMBAYARAN :</b><font color="green"> <?= $rs['end_date'] ?></font></p>
            </div>
        </div>
        
        <?php 
            $pay_per_day = 3;//ค่าปรับต่อวัน (บาท)

            $return_date     = $rs['end_date'];        //วันที่กำหนดส่งคืน
            $today            = date('Y-m-d');    //วันที่ส่งคืนจริง

            //หาจำนวนวัน กรณีที่วันส่งคืนจริง เลยวันกำหนดส่ง
            $pay = 0;
            $day_late_qty = 0;
            if($today > $return_date){
                $time_today = strtotime($today);        //แปลงวันที่ส่งคืนจริง เป็นตัวเลข timestamp
                $time_return = strtotime($return_date);    //แปลงวันที่กำหนดส่งคืน เป็นตัวเลข timestamp

                $day_late_qty = ($time_today - $time_return) / ( 60 * 60 * 24 ); 
                $pay = ceil($day_late_qty) * $pay_per_day;
            }
        ?>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>DENDA :</b><font color="green"> <?= $pay ?> ฿</font></p>
            </div>
            <div class="col-lg-6">
        <?php
            $pay_status = $rs['pay_status'];
            if($pay_status=='Sudah bayar'){
        
        ?>
                <p><b>STATUS PEMBAYARAN :</b><font color="green"> <b><?= $rs['pay_status'] ?></b></font></p>
        <?php
            }else{
        ?>
                <p><b>STATUS PEMBAYARAN :</b><font color="red"> <b><?= $rs['pay_status'] ?></b></font></p>
        <?php
            }
        ?>
            </div>
        </div>
        
        <hr>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">JUMLAH DUIT :</label> 
                <div class="col-lg-3">
                    <input name="money" class="form-control input-sm" type="number" value="100">
                </div>    
        </div>
        
        <?php

            $sql_rc = "SELECT* FROM exam_pay WHERE px_id = (SELECT MAX(px_id) FROM exam_pay)";
            $query_rc = mysqli_query($con, $sql_rc);
            $result_rc = mysqli_fetch_array($query_rc);

            $maxbill = $result_rc['reciet_code'];
            //$bills = $result_rc['p_id'];
            //$reciet_code = $maxbill+1;
            $tmp1=substr($maxbill,4);
            $tmp2 = $tmp1+1; 
            
            $cyear = substr($rs['year'],2);
            $fcode = 'P'.$cyear ;
            
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
        
        <input type="hidden" name="prize" value="<?= $prize ?>"> 
        <input type="hidden" name="st_id" value="<?= $st_id ?>">
        <input type="hidden" name="penalty" value="<?= $pay ?>">
        
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-3">
                <a href="module/payment/examreciet.php?id=<?= $id ?>" target="_blank"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> PRINT</button></a>
                <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
            </div>
        </div>
        
    </form>
    
</div>


