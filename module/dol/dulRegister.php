<?php
    //Make register code
    $q_identitynumber = "SELECT max(dulCode) AS mx FROM dulRegister";
    $record = mysqli_query($con, $q_identitynumber) or die(mysqli_error());
    $row = mysqli_fetch_assoc($record);
    $mem_old = $row['mx'];// gives the highest id

    //echo $mem_old;
    //$tmp1=substr($mem_old,0,1);//จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
    $tmp2=substr($mem_old,2);//ตัวเลขที่เหลือ
    $tmp3=$tmp2+1;//จริงๆ เอาไปรวมกับตัว $tmp2 เลยก็ได้ค่ะ แต่ว่ากลัวงง ก็เลยแยกไว้ให้

    //อันนี้ใช้ BP(buffalo power) ไปนิดนึง ปรับไปใช้ loop มาช่วยก็ได้นะคะ
    if($tmp3 <= 9){$tmp4='DL00000'.$tmp3;}
    if($tmp3 > 9 && $tmp3 <= 99){$tmp4='DL0000'.$tmp3;}
    if($tmp3 > 99 && $tmp3 <= 999){$tmp4='DL000'.$tmp3;}
    if($tmp3 > 999 && $tmp3 <= 9999){$tmp4='DL00'.$tmp3;}
    if($tmp3 > 9999 && $tmp3 <= 99999){$tmp4='DL0'.$tmp3;}
    if($tmp3 > 9999 && $tmp3 <= 999999){$tmp4='DL'.$tmp3;}
    
    echo $tmp2;

    //Recieve data
    $st_id = $_POST['st_id'];
    $dulDate = date("Y-m-d");
    //Get sumMoney
    if(!empty($_POST['check_list'])) {
        foreach($_POST['check_list'] as $row=>$check) {
            $sumMoney = $_POST['sumMoney'][$row];
            $money = $money+$sumMoney;
        }
    }
    $sumMoney = $money;
    
    //Insert data into dulReister
    $dulRegister = mysqli_query($con, "INSERT INTO dulRegister
                                (st_id,dulDate,sumMoney,dulCode) VALUES
                                ('$st_id','$dulDate','$sumMoney','$tmp4')
                               ");
    //--------------------------------------------------------------------------
    
    //Get last dr_id from dulRegister 
    $getDulRegister = mysqli_query($con, "SELECT * FROM dulRegister WHERE dr_id = (SELECT MAX(dr_id) FROM dulRegister)");
    $rowDulRegister = mysqli_fetch_array($getDulRegister);
    $dr_id = $rowDulRegister['dr_id'];
    
    
    if(!empty($_POST['check_list'])) {
        foreach($_POST['check_list'] as $row=>$check) {
            $ss_id = $_POST['check_list'][$row];
            $money = $_POST['sumMoney'][$row];
            $dulSubject = mysqli_query($con, "INSERT INTO dulSubject
                                      (dr_id,ss_id,money) VALUES
                                      ('$dr_id','$ss_id','$money')
                                      ");
        }
    }
?>
<meta http-equiv="refresh" content="0; url=?page=dol&&search=list&&dolpage=list">
