<?php
    $sr_id = $_GET['id'];
    $money = $_POST['money'];
    $yuran = $_POST['yuran'];
    $st_id = $_POST['st_id'];
    $pay_date = $_POST['pay_date'];
    $penalty = $_POST['penalty'];
    $reciet_code = $_POST['reciet_code'];
    
    $sql = mysqli_query($con, "SELECT * FROM payments WHERE sr_id='$sr_id'");
    $row = mysqli_fetch_array($sql);
    
    $sql2 = mysqli_query($con, "SELECT * FROM payments WHERE reciet_code='$reciet_code'");
    $row2 = mysqli_fetch_array($sql2);
    
    if($row2[0] > 0 ){
?>
  <br>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Maaf !</strong> No. reciet sudah di guna.
</div>      
        
<?php        
        
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT sr.*,st.*,re.* FROM student_register sr
         INNER JOIN students st ON sr.st_id=st.st_id
         INNER JOIN register re ON sr.re_id=re.re_id
         WHERE sr_id='$id'
         ");
    $rs = mysqli_fetch_array($sql);
    $f_name = $rs['firstname_rumi'];
    $l_name = $rs['lastname_rumi'];
    $st_id = $rs['st_id'];
    
    $student_id = $rs['student_id'];
    $student_data = mysqli_query($con, "SELECT st.*,ft.*,dp.* FROM students st
                  INNER JOIN fakultys ft ON st.ft_id=ft.ft_id
                  INNER JOIN departments dp ON st.dp_id=dp.dp_id
                  WHERE student_id='$student_id'
                  ");
    $rs_data_student = mysqli_fetch_array($student_data);
?>
<div class="well">
    <span class="glyphicon glyphicon-check"></span> <b>DATA PENDAFTARAN :</b> <?= $rs['term_id'] ?>/<?= $rs['academic_year'] ?>
    <hr>
    <form class="form-horizontal" action="?page=payment&&paymentpage=yuransave&&id=<?= $id ?>" enctype="multipart/form-data" method="POST">
        
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
                <p><b>TANGGAL DAFTAR :</b><font color="green"> <?= $rs['rs_date'] ?></font></p>
            </div>
            <div class="col-lg-6">
                <p><b>AWAL PEMBAYARAN :</b><font color="green"> <?= $rs['start_date'] ?></font></p>
            </div>
        </div>
        
        <?php
            $y_prize = $rs['rs_type'];
            if($y_prize=='common_prize'){
                $yuran = $rs['common_prize'];
            }else{
                $yuran = $rs['special_prize'];
            }
        ?>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>HARGA YURAN :</b><font color="green"> <?= number_format($yuran) ?> ฿</font></p>
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
            
            //Calculate true penalty.
            if($pay >= '21'){
                $pay = $pay-9;
            }elseif($pay >= '33'){
                $pay = $pay-9;
            }elseif($pay >= '45'){
                $pay = $pay-9;
            }elseif($pay >= '66'){
                $pay = $pay-9;
            }elseif($pay >= '78'){
                $pay = $pay-9;
            }elseif($pay >= '99'){
                $pay = $pay-9;
            }elseif($pay >= '120'){
                $pay = $pay-9;
            }elseif($pay >= '141'){
                $pay = $pay-9;
            }elseif($pay >= '162'){
                $pay = $pay-9;
            }elseif($pay >= '183'){
                $pay = $pay-9;
            }elseif($pay >= '204'){
                $pay = $pay-9;
            }
        ?>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>DENDA :</b><font color="red"> <?= $pay ?> ฿</font></p>
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
                    <input name="money" class="form-control input-sm" type="text" value="<?= $yuran ?>">
                </div>    
        </div>
        
        <?php

            $sql_rc = "SELECT* FROM payments WHERE p_id = (SELECT MAX(p_id) FROM payments)";
            $query_rc = mysqli_query($con, $sql_rc);
            $result_rc = mysqli_fetch_array($query_rc);

            $maxbill = $result_rc['reciet_code'];
            //$bills = $result_rc['p_id'];
            //$reciet_code = $maxbill+1;
            $tmp1=substr($maxbill,4);
            
            $cyear = substr($rs['academic_year'],2);
            $fcode = 'Y'.$cyear ;
            
        ?>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">KOD RESIT :</label> 
                <div class="col-lg-3">
                    <input name="reciet_code" class="form-control input-sm" type="text" value="<?= $fcode ?>/<?= $tmp1+1 ?>">
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
        
        <input type="hidden" name="yuran" value="<?= $yuran ?>"> 
        <input type="hidden" name="st_id" value="<?= $st_id ?>">
        <input type="hidden" name="penalty" value="<?= $pay ?>">
        
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-3">
                <a href="module/payment/reciet.php?id=<?= $id ?>" target="_blank"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> PRINT</button></a>
                <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
            </div>
        </div>
        
    </form>
    
</div>
<?php
    }elseif($row[0] > 0){
?>
<br>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Maaf !</strong> Anda sudah bayar.
</div>

<?php
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT sr.*,st.*,re.* FROM student_register sr
         INNER JOIN students st ON sr.st_id=st.st_id
         INNER JOIN register re ON sr.re_id=re.re_id
         WHERE sr_id='$id'
         ");
    $rs = mysqli_fetch_array($sql);
    $f_name = $rs['firstname_rumi'];
    $l_name = $rs['lastname_rumi'];
    $st_id = $rs['st_id'];
    
    $student_id = $rs['student_id'];
    $student_data = mysqli_query($con, "SELECT st.*,ft.*,dp.* FROM students st
                  INNER JOIN fakultys ft ON st.ft_id=ft.ft_id
                  INNER JOIN departments dp ON st.dp_id=dp.dp_id
                  WHERE student_id='$student_id'
                  ");
    $rs_data_student = mysqli_fetch_array($student_data);
?>
<div class="well">
    <span class="glyphicon glyphicon-check"></span> <b>DATA PENDAFTARAN :</b> <?= $rs['term_id'] ?>/<?= $rs['academic_year'] ?>
    <hr>
    <form class="form-horizontal" action="?page=payment&&paymentpage=yuransave&&id=<?= $id ?>" enctype="multipart/form-data" method="POST">
        
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
                <p><b>TANGGAL DAFTAR :</b><font color="green"> <?= $rs['rs_date'] ?></font></p>
            </div>
            <div class="col-lg-6">
                <p><b>AWAL PEMBAYARAN :</b><font color="green"> <?= $rs['start_date'] ?></font></p>
            </div>
        </div>
        
        <?php
            $y_prize = $rs['rs_type'];
            if($y_prize=='common_prize'){
                $yuran = $rs['common_prize'];
            }else{
                $yuran = $rs['special_prize'];
            }
        ?>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>HARGA YURAN :</b><font color="green"> <?= number_format($yuran) ?> ฿</font></p>
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
            
            //Calculate true penalty.
            if($pay >= '21'){
                $pay = $pay-9;
            }elseif($pay >= '33'){
                $pay = $pay-9;
            }elseif($pay >= '45'){
                $pay = $pay-9;
            }elseif($pay >= '66'){
                $pay = $pay-9;
            }elseif($pay >= '78'){
                $pay = $pay-9;
            }elseif($pay >= '99'){
                $pay = $pay-9;
            }elseif($pay >= '120'){
                $pay = $pay-9;
            }elseif($pay >= '141'){
                $pay = $pay-9;
            }elseif($pay >= '162'){
                $pay = $pay-9;
            }elseif($pay >= '183'){
                $pay = $pay-9;
            }elseif($pay >= '204'){
                $pay = $pay-9;
            }
        ?>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>DENDA :</b><font color="red"> <?= $pay ?> ฿</font></p>
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
                    <input name="money" class="form-control input-sm" type="text" value="<?= $yuran ?>">
                </div>    
        </div>
        
        <?php

            $sql_rc = "SELECT* FROM payments WHERE p_id = (SELECT MAX(p_id) FROM payments)";
            $query_rc = mysqli_query($con, $sql_rc);
            $result_rc = mysqli_fetch_array($query_rc);

            $maxbill = $result_rc['reciet_code'];
            //$bills = $result_rc['p_id'];
            //$reciet_code = $maxbill+1;
            $tmp1=substr($maxbill,4);
            
            $cyear = substr($rs['academic_year'],2);
            $fcode = 'Y'.$cyear ;
            
        ?>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">KOD RESIT :</label> 
                <div class="col-lg-3">
                    <input name="reciet_code" class="form-control input-sm" type="text" value="<?= $fcode ?>/<?= $tmp1+1 ?>">
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
        
        <input type="hidden" name="yuran" value="<?= $yuran ?>"> 
        <input type="hidden" name="st_id" value="<?= $st_id ?>">
        <input type="hidden" name="penalty" value="<?= $pay ?>">
        
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-3">
                <a href="module/payment/reciet.php?id=<?= $id ?>" target="_blank"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> PRINT</button></a>
                <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
            </div>
        </div>
        
    </form>
    
</div>

<?php 
    }elseif($money < $yuran){
?>
<br>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Maaf !</strong> Jumlah duit belum cuku.
</div>

<?php
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT sr.*,st.*,re.* FROM student_register sr
         INNER JOIN students st ON sr.st_id=st.st_id
         INNER JOIN register re ON sr.re_id=re.re_id
         WHERE sr_id='$id'
         ");
    $rs = mysqli_fetch_array($sql);
    $f_name = $rs['firstname_rumi'];
    $l_name = $rs['lastname_rumi'];
    $st_id = $rs['st_id'];
    
    $student_id = $rs['student_id'];
    $student_data = mysqli_query($con, "SELECT st.*,ft.*,dp.* FROM students st
                  INNER JOIN fakultys ft ON st.ft_id=ft.ft_id
                  INNER JOIN departments dp ON st.dp_id=dp.dp_id
                  WHERE student_id='$student_id'
                  ");
    $rs_data_student = mysqli_fetch_array($student_data);
?>
<div class="well">
    <span class="glyphicon glyphicon-check"></span> <b>DATA PENDAFTARAN :</b> <?= $rs['term_id'] ?>/<?= $rs['academic_year'] ?>
    <hr>
    <form class="form-horizontal" action="?page=payment&&paymentpage=yuransave&&id=<?= $id ?>" enctype="multipart/form-data" method="POST">
        
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
                <p><b>TANGGAL DAFTAR :</b><font color="green"> <?= $rs['rs_date'] ?></font></p>
            </div>
            <div class="col-lg-6">
                <p><b>AWAL PEMBAYARAN :</b><font color="green"> <?= $rs['start_date'] ?></font></p>
            </div>
        </div>
        
        <?php
            $y_prize = $rs['rs_type'];
            if($y_prize=='common_prize'){
                $yuran = $rs['common_prize'];
            }else{
                $yuran = $rs['special_prize'];
            }
        ?>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>HARGA YURAN :</b><font color="green"> <?= number_format($yuran) ?> ฿</font></p>
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
            
            //Calculate true penalty.
            if($pay >= '21'){
                $pay = $pay-9;
            }elseif($pay >= '33'){
                $pay = $pay-9;
            }elseif($pay >= '45'){
                $pay = $pay-9;
            }elseif($pay >= '66'){
                $pay = $pay-9;
            }elseif($pay >= '78'){
                $pay = $pay-9;
            }elseif($pay >= '99'){
                $pay = $pay-9;
            }elseif($pay >= '120'){
                $pay = $pay-9;
            }elseif($pay >= '141'){
                $pay = $pay-9;
            }elseif($pay >= '162'){
                $pay = $pay-9;
            }elseif($pay >= '183'){
                $pay = $pay-9;
            }elseif($pay >= '204'){
                $pay = $pay-9;
            }
        ?>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>DENDA :</b><font color="red"> <?= $pay ?> ฿</font></p>
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
                    <input name="money" class="form-control input-sm" type="text" value="<?= $yuran ?>">
                </div>    
        </div>
        
        <?php

            $sql_rc = "SELECT* FROM payments WHERE p_id = (SELECT MAX(p_id) FROM payments)";
            $query_rc = mysqli_query($con, $sql_rc);
            $result_rc = mysqli_fetch_array($query_rc);

            $maxbill = $result_rc['reciet_code'];
            //$bills = $result_rc['p_id'];
            //$reciet_code = $maxbill+1;
            $tmp1=substr($maxbill,4);
            
            $cyear = substr($rs['academic_year'],2);
            $fcode = 'Y'.$cyear ;
            
        ?>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">KOD RESIT :</label> 
                <div class="col-lg-3">
                    <input name="reciet_code" class="form-control input-sm" type="text" value="<?= $fcode ?>/<?= $tmp1+1 ?>">
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
        
        <input type="hidden" name="yuran" value="<?= $yuran ?>"> 
        <input type="hidden" name="st_id" value="<?= $st_id ?>">
        <input type="hidden" name="penalty" value="<?= $pay ?>">
        
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-3">
                <a href="module/payment/reciet.php?id=<?= $id ?>" target="_blank"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> PRINT</button></a>
                <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
            </div>
        </div>
        
    </form>
    
</div>

<?php 
    }else{
        $insert = mysqli_query($con, "INSERT INTO 
        payments (sr_id,st_id,pay_date,money,penalty,reciet_code) 
        values ('$sr_id','$st_id','$pay_date','$money','$penalty','$reciet_code')    
        ");
        
        $update = mysqli_query($con, "UPDATE student_register SET pay_status='Sudah bayar' WHERE sr_id='$sr_id'");
?>
<br>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Berhasil !</strong> Data berhasil di rakam.
</div>

<?php
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT sr.*,st.*,re.* FROM student_register sr
         INNER JOIN students st ON sr.st_id=st.st_id
         INNER JOIN register re ON sr.re_id=re.re_id
         WHERE sr_id='$id'
         ");
    $rs = mysqli_fetch_array($sql);
    $f_name = $rs['firstname_rumi'];
    $l_name = $rs['lastname_rumi'];
    $st_id = $rs['st_id'];
    
//    
    
    $student_id = $rs['student_id'];
    $student_data = mysqli_query($con, "SELECT st.*,ft.*,dp.* FROM students st
                  INNER JOIN fakultys ft ON st.ft_id=ft.ft_id
                  INNER JOIN departments dp ON st.dp_id=dp.dp_id
                  WHERE student_id='$student_id'
                  ");
    $rs_data_student = mysqli_fetch_array($student_data);
    
//    
    
    $sql_payment = mysqli_query($con, "SELECT * FROM payments WHERE sr_id='$id'");
    $rs_payment = mysqli_fetch_array($sql_payment);
    $reciet_code_pay = $rs_payment['reciet_code'];
    $money_pay = $rs_payment['money'];
    $pay_date = $rs_payment['pay_date'];
?>
<div class="well">
    <span class="glyphicon glyphicon-edit"></span> <b>UBAH DATA PEMBAYARAN :</b> <?= $rs['term_id'] ?>/<?= $rs['academic_year'] ?>
    <hr>
    <form class="form-horizontal" action="?page=payment&&paymentpage=saveedityuran&&id=<?= $id ?>" enctype="multipart/form-data" method="POST">
        
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
                <p><b>TANGGAL DAFTAR :</b><font color="green"> <?= $rs['rs_date'] ?></font></p>
            </div>
            <div class="col-lg-6">
                <p><b>AWAL PEMBAYARAN :</b><font color="green"> <?= $rs['start_date'] ?></font></p>
            </div>
        </div>
        
        <?php
            $y_prize = $rs['rs_type'];
            if($y_prize=='common_prize'){
                $yuran = $rs['common_prize'];
            }else{
                $yuran = $rs['special_prize'];
            }
        ?>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>HARGA YURAN :</b><font color="green"> <?= number_format($yuran) ?> ฿</font></p>
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
            
            //Calculate true penalty.
            if($pay >= '21'){
                $pay = $pay-9;
            }elseif($pay >= '33'){
                $pay = $pay-9;
            }elseif($pay >= '45'){
                $pay = $pay-9;
            }elseif($pay >= '66'){
                $pay = $pay-9;
            }elseif($pay >= '78'){
                $pay = $pay-9;
            }elseif($pay >= '99'){
                $pay = $pay-9;
            }elseif($pay >= '120'){
                $pay = $pay-9;
            }elseif($pay >= '141'){
                $pay = $pay-9;
            }elseif($pay >= '162'){
                $pay = $pay-9;
            }elseif($pay >= '183'){
                $pay = $pay-9;
            }elseif($pay >= '204'){
                $pay = $pay-9;
            }
            
        ?>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>DENDA :</b><font color="red"> <?= $pay ?> ฿</font></p>
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
                    <input name="money" class="form-control input-sm" type="text" value="<?= $money_pay ?>" required>
                </div>    
        </div>
        
        <?php

            $sql_rc = "SELECT* FROM payments WHERE p_id = (SELECT MAX(p_id) FROM payments)";
            $query_rc = mysqli_query($con, $sql_rc);
            $result_rc = mysqli_fetch_array($query_rc);

            $maxbill = $result_rc['reciet_code'];
            //$bills = $result_rc['p_id'];
            //$reciet_code = $maxbill+1;
            $tmp1=substr($maxbill,4);
            
            $cyear = substr($rs['academic_year'],2);
            $fcode = 'Y'.$cyear ;
            
        ?>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">KOD RESIT :</label> 
                <div class="col-lg-3">
                    <input name="reciet_code" class="form-control input-sm" type="text" value="<?= $reciet_code_pay ?>">
                </div>
        </div>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">TARIKH BAYAR :</label> 
                <div class="col-lg-3">
                    <input name="pay_date" class="form-control input-sm" type="date" value="<?= $pay_date ?>">
                </div>    
        </div>
        
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="yuran" value="<?= $yuran ?>"> 
        
        
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-3">
                <a href="module/payment/reciet.php?id=<?= $id ?>" target="_blank"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> PRINT</button></a>
                <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
            </div>
        </div>
        
    </form>
    
</div>

<?php 
    } 
?>





