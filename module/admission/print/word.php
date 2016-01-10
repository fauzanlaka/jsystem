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
        $class = $_GET['class'];  
    ?>
	<body>	
            
            <br><br>
            <div id="printableArea">
                
                <div id="main"><p class="text-center"><?= $class ?> چالون مهاسيسوا بيليق </p></div>
                
                <table class="table table-hover table-striped table-bordered">
                    <tr>
                        <td align="center"><div id="subText"><b>فيليهن كدوا</b></div></div></td>
                        <td align="center"><div id="subText"><b>فيليهن فرتام</b></div></td>
                        <td align="center"><div id="subText"><b>نمبر</b></div></td>
                        <td align="center"><div id="subText"><b>بيليق</b></div></td>
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
                            <td align="center"><div id="subText"><?= $sanawi_graduate ?></div></td>
                            <td align="center"><div id="subText"><?= $fname ?> - <?= $lname ?></div></td>
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
