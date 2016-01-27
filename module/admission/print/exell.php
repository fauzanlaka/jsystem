<?php
    header("Content-Type: application/vnd.ms-excel");
    header('Content-Disposition: attachment; filename="MyXls.xls"');#ชื่อไฟล์
    header('Cache-Control: max-age=0');
?>
<?php
    include '../../../connect.php';
    $class = $_GET['class'];  
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
                <td colspan="9" align="center"><?= $class ?> چالون مهاسيسوا بيليق </td>
            </tr> 
            <tr>
                <td colspan="9"</td>
            </tr>
        </table>
        
        <table border="1">
            
                    <tr>
                        <td align="center"><b>فيليهن كدوا</b></td>
                        <td align="center"><b>فيليهن فرتام</b></td>
                        <td align="center"><b>نمبر</b></td>
                        <td align="center"><b>بيليق</b></td>
                        <td align="center"><b>نمبر دفتر</b></td>
                        <td align="center"><b>کمفوڠ</b></td>
                        <td align="center"><b>سكوله</b></td>
                        <td align="center"><b>نام - نسب</b></td>
                        <td align="center"><b>بيل</b></td> 
                    </tr>
                    <?php
                        $pretestMen = mysqli_query($con, "SELECT p.*,s.* FROM pretest p JOIN students s ON p.st_id=s.st_id WHERE p.testClass='$class'");
                        $i = 1;
                        while($rowPretestMen = mysqli_fetch_array($pretestMen)){
                            $fname = str_replace("\'", "&#39;", $rowPretestMen["firstname_jawi"]);
                            $lname = str_replace("\'", "&#39;", $rowPretestMen["lastname_jawi"]);
                            $sanawi_graduate = str_replace("\'", "&#39;", $rowPretestMen["sanawi_graduate"]);
                            $testClass = $rowPretestMen['testClass'];
                            $testNumber = $rowPretestMen['testNumber'];
                            $odrNumber = $rowPretestMen['odrNumber'];
                            $sanawiVillage = str_replace("\'", "&#39;", $rowPretestMen["sanawiVillage"]);

                            //Faculty and department choesed
                            $first_ftId = $rowPretestMen['first_ftId'];
                            $first_dpId = $rowPretestMen['first_dpId'];
                            $second_ftId = $rowPretestMen['second_ftId'];
                            $second_dpId = $rowPretestMen['second_dpId'];

                            //First selection
                            if($first_dpId == '0'){
                                $fId = $first_ftId;
                                //Setting
                                if($fId == '122'){
                                    $selected = 'S';
                                }elseif($fId == '123'){
                                    $selected = 'U';
                                }else{
                                    $selected = 'D';
                                }
                            }else{
                                $fId = $first_dpId;
                                //Setting
                                if($fId == '22'){
                                    $selected = 'PAI';
                                }else{
                                    $selected = 'PBSM';
                                }
                            }

                            //Second selection
                            if($second_dpId == '0'){
                                $sId = $second_ftId;
                                //Setting
                                if($sId == '122'){
                                    $selected2 = 'S';
                                }elseif($sId == '123'){
                                    $selected2 = 'U';
                                }else{
                                    $selected2 = 'D';
                                }
                            }else{
                                $sId = $second_dpId;
                                //Setting
                                if($sId == '22'){
                                    $selected2 = 'PAI';
                                }else{
                                    $selected2 = 'PBSM';
                                }
                            }


                    ?>
                        <tr>
                            <td align="center"><?= $selected2 ?></td>
                            <td align="center"><?= $selected ?></td>
                            <td align="center"><?= $testNumber ?></td>
                            <td align="center"><?= $testClass ?></td>
                            <td align="center"><?= $odrNumber ?></td>
                            <td align="right"><?= $sanawiVillage ?></td>
                            <td align="right"><?= $sanawi_graduate ?></td>
                            <td align="center"><?= $fname ?> - <?= $lname ?></td>
                            <td align="center"><?= $i ?></td>
                        </tr>
                    <?php
                        $i++;
                        }
                    ?>
                </table>

    </BODY>

</HTML>