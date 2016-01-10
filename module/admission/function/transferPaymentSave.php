<?php
    $st_id = $_POST['st_id'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $payDate = date("Y-m-d");
    $money = $_POST['money'];
    $class = $_POST['class'];
    $p_id = $_POST['p_id'];
    
    $admissionRegister = mysqli_query($con, "SELECT * FROM admissionRegister WHERE ar_status='1'");
    $admissionRegisterRow = mysqli_fetch_array($admissionRegister);
    $cyear1 = $admissionRegisterRow['ar_year'];
    
    $sql_rc = "SELECT* FROM muqaddimah_pay WHERE m_id = (SELECT MAX(m_id) FROM muqaddimah_pay)";
    $query_rc = mysqli_query($con, $sql_rc);
    $result_rc = mysqli_fetch_array($query_rc);
    $m_academicyear = $result_rc['m_academicyear'];
    
    $cyear = substr($cyear1,2);
    $fcode = 'Y'.$cyear ;
    
    if($cyear1 != $m_academicyear){
        $tmp3=$fcode."/".'0001';
    }else{
        $maxbill = $result_rc['m_reciet'];
        $tmp1=substr($maxbill,4);
        $tmp2 = $tmp1+1;
       
        if($tmp2 <= 9){$tmp3=$fcode."/".'000'.$tmp2;}
        if($tmp2 > 9 && $tmp2 <= 99){$tmp3=$fcode."/".'00'.$tmp2;}
        if($tmp2 > 99 && $tmp2 <= 999){$tmp3=$fcode."/".'0'.$tmp2;}
        if($tmp2 > 999 && $tmp2 <= 9999){$tmp3=$fcode."/".$tmp2;}
    }

    $insert = mysqli_query($con, "INSERT INTO muqaddimah_pay (p_id,st_id,m_academicyear,m_paydate,m_money,m_reciet) VALUES ('$p_id','$st_id','$cyear1','$payDate','$money','$tmp3')");
    $update = mysqli_query($con, "UPDATE students SET ft_id='$faculty',dp_id='$department',income_year='$cyear1',class='$class',muqaddimah='1' WHERE st_id='$st_id'");
?>
<script>
    alert("Pembayaran berhasil di rakam");
</script>
<meta http-equiv="refresh" content="0;url=?page=admissions&&admissionpage=transferPayment&&st_id=<?= $st_id ?>">