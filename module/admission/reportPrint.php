<?php
    $class = $_GET['class'];
?>
<h4><span class="glyphicon glyphicon-print"></span> CALON MAHASISWA BILIK <?= $class ?></h4>
<hr>
<div class="pull-right">
    <a href="?page=admissions&&admissionpage=report" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> BACK</a>
    <a href="module/admission/print/exell.php?class=<?= $class ?>" target="_blank" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> EXELL</a>
    <a href="module/admission/print/word.php?class=<?= $class ?>" target="_blank" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> PRINT</a>
</div>
<br><br>
<table class="table table-hover table-striped table-bordered">
    <tr>
        <td align="center"><div id="subText"><b>فيليهن كدوا</b></div></td>
        <td align="center"><div id="subText"><b>فيليهن فرتام</b></div></td>
        <td align="center"><div id="subText"><b>نمبر</b></div></td>
        <td align="center"><div id="subText"><b>بيليك</b></div></td>
        <td align="center"><div id="subText"><b>سكوله</b></div></td>
        <td align="center"><div id="subText"><b>نام - نسب</b></div></td>
        <td align="center"><div id="subText"><b>بيل</b></div></td> 
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
            <td align="center"><?= $sanawi_graduate ?></td>
            <td align="right"><div id="subText"><?= $fname ?> - <?= $lname ?></div></td>
            <td align="center"><?= $i ?></td>
        </tr>
    <?php
        $i++;
        }
    ?>
</table>