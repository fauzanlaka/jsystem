<?php
    $st_id = $_GET['st_id'];
    
    $sql = mysqli_query($con, "SELECT p.*,s.* FROM pretest p INNER JOIN students s ON p.st_id=s.st_id WHERE p.st_id='$st_id'");
    $row = mysqli_fetch_array($sql);
    
    $fname = str_replace("\'", "&#39;", $row["firstname_rumi"]);
    $lname = str_replace("\'", "&#39;", $row["lastname_rumi"]);
    $fnameJ = str_replace("\'", "&#39;", $row["firstname_jawi"]);
    $lnameJ = str_replace("\'", "&#39;", $row["lastname_jawi"]);
    $regisdate = $row['regisDate'];
    $idCard = $row['cityzen_id'];
    $s_ftid = $row['ft_id'];
    $s_dpid = $row['dp_id'];
    $s_class = $row['class'];
    $p_id = $row['pre_id'];
    $m_status = $row['muqaddimah'];
    
    if($m_status == '1'){
        $muqaddimah = mysqli_query($con, "SELECT * FROM muqaddimah_pay WHERE p_id='$p_id'");
        $rowMuqaddimah = mysqli_fetch_array($muqaddimah);
        $m_id = $rowMuqaddimah['m_id'];
        $cancel = '1';
    }else{
        $cancel = '0';
    }
?>
<?php
    $admissionRegister = mysqli_query($con, "SELECT * FROM admissionRegister WHERE ar_status='1'");
    $admissionRegisterRow = mysqli_fetch_array($admissionRegister);
    $cyear1 = $admissionRegisterRow['ar_year'];
    
    //Check for paying status
    $payCheck = mysqli_query($con, "SELECT * FROM muqaddimah_pay WHERE st_id='$st_id' AND m_academicyear='$cyear1'");
    $rowPaycheck = mysqli_num_rows($payCheck);
    
    if($rowPaycheck > 0 ){
        $link = "?page=admissions&&admissionpage=transferPaymentEditSave";
        $admissionStatus = "<font color='green'><b>"."Sudah bayar"."</b></font>";
        $reciet = "<a href='module/admission/print/muqaddimahreciet.php?id=$st_id' class='btn btn-success btn-sm' target='_blank'><span class='glyphicon glyphicon-print'></span> RESIT</a>";
    }else{
        $link = "?page=admissions&&admissionpage=transferPaymentSave";
        $admissionStatus = "<font color='red'><b>"."Belum bayar"."</b></font>";
    }
    
?>
<h4><span class="glyphicon glyphicon-hand-right"></span> BAYAR MUQADDIMAH CALON TRANSFER</h4><hr>
<div class="pull-right">
    <a href="?page=admissions&&admissionpage=transfermuqaddimah" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> BACK</a>
    <?php
        if($cancel == '1'){
    ?>
        <a href="?page=admissions&&admissionpage=paymentTransferCancel&&st_id=<?= $st_id ?>&&m_id=<?= $m_id ?>" class="btn btn-warning btn-sm" onclick="return confirm('Anda yakin untuk membatal pendaftaran ini ?')"><span class="glyphicon glyphicon-ban-circle"></span> MEMBATAL</a>
    <?php
        }else{ " "; }
    ?>
    
</div>
<form class="form-horizontal" method="post" action="<?= $link ?>">
    <p><b>Nama-Nasab : </b><?= $fname ?> - <?= $lname ?></p>
    <p><b>Nama-Nasab : </b><?= $fnameJ ?> - <?= $lnameJ ?></p>
    <p><b>No.Kad pengenalan : </b><?= $idCard ?></p>
    <p><b>Tarihk daftar : </b><?= $regisdate ?></p>
    <p><b>Status : </b><?= $admissionStatus ?></p>
    <hr>  
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label">FAKULTI :</label>
        <div class="col-sm-4">
            <select class="form-control input-sm" name="faculty">
                <option></option>
                <?php
                    $faculty = mysqli_query($con, "SELECT * FROM fakultys");
                    while($rsFaculty = mysqli_fetch_array($faculty)){
                        $ft_id = $rsFaculty['ft_id'];
                        $ft_name = $rsFaculty['ft_name'];
                ?>
                <option value="<?= $ft_id ?>" <?php if($ft_id == $s_ftid){echo 'selected';} ?>><?= "-"." ".$ft_name ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label">JURUSAN :</label>
        <div class="col-sm-4">
            <select class="form-control input-sm" name="department">
                <option></option>
                <?php
                    $department = mysqli_query($con, "SELECT * FROM departments");
                    while($rsFaculty = mysqli_fetch_array($department)){
                        $dp_id = $rsFaculty['dp_id'];
                        $dp_name = $rsFaculty['dp_name'];
                ?>
                <option value="<?= $dp_id ?>"<?php if($dp_id == $s_dpid){echo 'selected';} ?>><?= "-"." ".$dp_name ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
    </div>
    
    <?php
                          //Set year 
                          $register = mysqli_query($con, "SELECT * FROM admissionRegister WHERE ar_id=(SELECT MAX(ar_id) FROM admissionRegister)");
                          $rs_register = mysqli_fetch_array($register);
                          $cyear = $rs_register['ar_year'];
                            
                          //$cyear = date("Y");
                          //Datangkan kelas masuk belajar
                          $first = $cyear; 
                          $second = $cyear-1;
                          $third  = $cyear-2;
                          $fordth = $cyear-3;
                          //Kelas sekarang
                          $kelas = $class;
                          if($kelas == $first){ $cnow = '1'; }
                          if($kelas == $second){ $cnow = '2'; }
                          if($kelas == $third){ $cnow = '3'; }
                          if($kelas == $fordth){ $cnow = '4'; }
                    ?>
                        
                    <div class="form-group">
                        <label class="col-lg-4 control-label">KELAS :</label>
                        <div class="col-lg-2">
                             <select class="form-control input-sm" name="class">
                                 <option>KELAS</option>
                                 <option value="<?= $second ?>" <?php if($s_class == $second){echo "selected";} ?>>2</option>
                                 <option value="<?= $third ?>" <?php if($s_class == $third){echo "selected";} ?>>3</option>
                                 <option value="<?= $fordth ?>" <?php if($s_class == $fordth){echo "selected";} ?>>4</option>
                             </select>
                        </div>
                    </div>
    
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label">MUQADDIMAH :</label>
        <div class="col-sm-2">
            <input type="number" name="money" class="form-control" value="700">
        </div>
    </div>
 
  <input type="hidden" name="p_id" value="<?= $p_id ?>"> 
  <input type="hidden" name="st_id" value="<?= $st_id ?>">  
  <p class="text-center">
      <?= $reciet ?>
      <button type="submit" class="btn btn-success btn-sm">SAVE</button>
  </p>
</form>
