<?php
    $ft_id = $_GET['ft_id'];
    $dp_id = $_GET['dp_id'];
    $class = $_GET['class'];
    
    //Get current addmission year
    $addmission = mysqli_query($con, "SELECT * FROM admissionRegister WHERE ar_status='1'");
    $rowAddmission = mysqli_fetch_array($addmission);
    $addYear = $rowAddmission['ar_year'];
    
    //Get fakulty and department data
    if($ft_id == ""){
        $kuliah = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$dp_id'");
        $rowKuliah = mysqli_fetch_array($kuliah);
        $kuliahName = "("."كلية تربية اﻹسلامية"." "."(".$rowKuliah['dp_arab_name'];
        $transferStudent = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE s.income_year='$addYear' AND s.class='$class' AND dp_id='$dp_id' AND s.muqaddimah='1'");
    }else{
        $kuliah = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
        $rowKuliah = mysqli_fetch_array($kuliah);
        $kuliahName = $rowKuliah['ft_arab_name'];
        $transferStudent = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE s.income_year='$addYear' AND s.class='$class' AND ft_id='$ft_id' AND s.muqaddimah='1'");
    }
?>

<h4><span class="glyphicon glyphicon-print"></span> CALON MAHASISWA TRANSFER (<?= $addYear ?>)</h4>
<hr>

<div class="pull-right">
    <a href="?page=admissions&&admissionpage=transferReport" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> BACK</a>
    <a href="module/admission/print/transferExellPrint.php?class=<?= $class ?>&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&income_year=<?= $addYear ?>" target="_blank" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> EXELL</a>
    <a href="module/admission/print/transferWordPrint.php?class=<?= $class ?>&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&income_year=<?= $addYear ?>" class="btn btn-success btn-sm" target="_blank"><span class="glyphicon glyphicon-print"></span> PRINT</a> 
</div>

<div id="subText"><p class="text-center"><?= $kuliahName ?></p></div>

<table class="table table-hover table-striped table-bordered">
    <tr>
        <td align="center"><div id="subText"><b>نمبر دفتر</b></div></td>
        <td align="center"><div id="subText"><b>سكوله</b></div></td>
        <td align="center"><div id="subText"><b>نام - نسب</b></div></td>
        <td align="center"><div id="subText"><b>بيل</b></div></td> 
    </tr>
    <?php
        $i = 1;
        while($rowTransferStudent = mysqli_fetch_array($transferStudent)){
            $fname = str_replace("\'", "&#39;", $rowTransferStudent["firstname_jawi"]);
            $lname = str_replace("\'", "&#39;", $rowTransferStudent["lastname_jawi"]);
            $sanawi_graduate = str_replace("\'", "&#39;", $rowTransferStudent["sanawi_graduate"]);
            $regNumber = $rowTransferStudent['regNumber'];
    ?>
        <tr>
            <td align="center"><?= $regNumber ?></td>
            <td align="center"><div id="subText"><?= $sanawi_graduate ?></div></td>
            <td align="right"><div id="subText"><?= $fname ?> - <?= $lname ?></div></td>
            <td align="center"><?= $i ?></td>
        </tr>
    <?php
        $i++; 
        }
    ?>
