    <?php
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="MyXls.xls"');#ชื่อไฟล์
        header('Cache-Control: max-age=0');
    ?>
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

<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
    
    
<HTML dir="rtl" lang="ar">

<HEAD>

    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
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
</HEAD>
    
    <BODY>
        
        <table>
           <tr>
                <td colspan="4" align="center"><?= $kuliahName ?></td>
            </tr> 
            <tr>
                <td colspan="4" align="center">تاهون فڠاجين <?= $addYear ?></td>
            </tr>
            <tr>
                <td>Transfer</td>
                <td></td>
                <td></td>
                <td>تاهون  <?= $cnow ?></td>
            </tr>
        </table>
        
        <table border="1">
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

    </BODY>

</HTML>