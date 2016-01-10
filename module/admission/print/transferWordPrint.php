<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Optional theme -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    
    <title>Calon mahasiswa JISDA</title>
    
    <style>
        body {
            height: 842px;
            width: 595px;
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }
            table {
        border-collapse: collapse;
            }
            @font-face {
            font-family: "jawi";
            src: url(font/jawi.ttf);
        }

        #main{
            font:25px "jawi";
        }
        #subText{
            font: 18px "jawi";
        }
        #thai{
            font: 12px "jawi";
        }
    </style>
    
    <script language="javascript" type="text/javascript">
        function printDiv(printableArea) {
            var printContents = document.getElementById(printableArea).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    </head>
    <?php
        include '../../../connect.php';
        $ft_id = $_GET['ft_id'];
        $dp_id = $_GET['dp_id'];
        $class = $_GET['class'];
        $income_year = $_GET['income_year'];
        
        //Get current addmission year
        $addmission = mysqli_query($con, "SELECT * FROM admissionRegister WHERE ar_status='1'");
        $rowAddmission = mysqli_fetch_array($addmission);
        $addYear = $rowAddmission['ar_year'];
        
        //Datangkan kelas masuk belajar
        $first = $addYear; 
        $second = $addYear-1;
        $third  = $addYear-2;
        $fordth = $addYear-3;
        //Kelas sekarang
        $kelas = $class;
        if($kelas == $first){ $cnow = '1'; }
        if($kelas == $second){ $cnow = '2'; }
        if($kelas == $third){ $cnow = '3'; }
        if($kelas == $fordth){ $cnow = '4'; }
        
        //Get fakulty and department data
        if($ft_id == ""){
            $kuliah = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$dp_id'");
            $rowKuliah = mysqli_fetch_array($kuliah);
            $kuliahName = "("."كلية تربية اﻹسلامية"." "."(".$rowKuliah['dp_arab_name'];
            $transferStudent = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE s.income_year='$income_year' AND s.class='$class' AND dp_id='$dp_id' AND s.muqaddimah='1'");
        }else{
            $kuliah = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
            $rowKuliah = mysqli_fetch_array($kuliah);
            $kuliahName = $rowKuliah['ft_arab_name'];
            $transferStudent = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE s.income_year='$income_year' AND s.class='$class' AND ft_id='$ft_id' AND s.muqaddimah='1'");
        }
   ?>
	<body>	
            
            <br><br>
            <div id="printableArea">
                
                <div id="main"><p class="text-center"><?= $kuliahName ?></p></div>
                <div id="main"><p class="text-center">تاهون فڠاجين <?= $addYear ?></p></div>
                <div class="pull-left"><b>Transfer</b></div>
                <div id="main"><p class="text-right">تاهون  <?= $cnow ?></p></div>
                
                
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
                </table>
                
            </div>
	<div align="center">
            <button type="button" class="btn btn-success" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
	</div>
    </body>
</html>
