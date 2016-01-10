<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    
    <title>Kertas peperiksaan</title>
    
    <style>
        body {
            height: 842px;
            width: 695px;
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }
            table {
        border-collapse: collapse;
            }
         
        hr.new{
            color: #f00;
            background-color: black;
            height: 3px;
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
        include '../../connect.php';
        $st_id = $_GET['st_id'];
        $student = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE s.st_id='$st_id'");
        $result = mysqli_fetch_array($student);
        
        $regNumber = $result['regNumber'];
        $first_ftId = $result['first_ftId'];
        $first_dpId = $result['first_dpId'];
        $second_ftId = $result['second_ftId'];
        $second_dpId = $result['second_dpId'];
        
        $firstname_jawi = str_replace("\'", "&#39;", $result['firstname_jawi']);
        $lastname_jawi = str_replace("\'", "&#39;", $result['lastname_jawi']);
        $firstname_eng = str_replace("\'", "&#39;", $result['firstname_rumi']);
        $lastname_eng = str_replace("\'", "&#39;", $result['lastname_rumi']);
        $t_studentname = str_replace("\'", "&#39;", $result['t_studentname']);
        $t_studentlastname = str_replace("\'", "&#39;", $result['t_studentlastname']);
        $idCard = $result['cityzen_id'];
        $birdthDate = $result['birdth_date'];
        $disease = $result['disease'];
        
        $fatherName = str_replace("\'", "&#39;", $result['father_name']);
        $fatherLastname = str_replace("\'", "&#39;", $result['father_lastname']);
        $fatherJob = str_replace("\'", "&#39;", $result['father_job']);
        
        $motherName = str_replace("\'", "&#39;", $result['mother_name']);
        $motherLastname = str_replace("\'", "&#39;", $result['mother_lastname']);
        $motherJob = str_replace("\'", "&#39;", $result['mother_job']);
        
        $house_number = $result['house_number'];
        $t_village_name = $result['t_village_name'];
        $place = $result['place'];
        $t_subdistrict = str_replace("\'", "&#39;", $result['t_subdistrict']);
        $t_district = str_replace("\'", "&#39;", $result['t_district']);
        $t_province_sec = str_replace("\'", "&#39;", $result['t_province_sec']);
        $post = $result['post'];
        $telephone = $result['telephone'];
        $email = $result['email'];
        
        $ibtidai_graduate = str_replace("\'", "&#39;", $result['ibtidai_graduate']);
        $ibtidai_graduate_year = str_replace("\'", "&#39;", $result['ibtidai_graduate_year']);
        $mutawasit_graduate = str_replace("\'", "&#39;", $result['mutawasit_graduate']);
        $mutawasit_graduate_year = str_replace("\'", "&#39;", $result['mutawasit_graduate_year']); 
        $sanawi_graduate = str_replace("\'", "&#39;", $result['sanawi_graduate']);
        $sanawi_graduate_year = str_replace("\'", "&#39;", $result['sanawi_graduate_year']);
        
        $down_graduate = str_replace("\'", "&#39;", $result['down_graduate']);
        $down_graduate_year = str_replace("\'", "&#39;", $result['down_graduate_year']);
        $first_highschool_graduate = str_replace("\'", "&#39;", $result['first_highschool_graduate']);
        $first_highschool_graduate_year = str_replace("\'", "&#39;", $result['first_highschool_graduate_year']);
        $second_highschool_graduate = str_replace("\'", "&#39;", $result['second_highschool_graduate']);
        $second_highschool_graduate_year = str_replace("\'", "&#39;", $result['second_highschool_graduate_year']);
        
        $testClass = $result['testClass'] ;
        $testNumber = $result['testNumber'];
    ?>
	<body>	
            
            <div id="printableArea">
                
                <div class="col-sm-12">
                    
                    <div class="row">
                        <div class="pull-left">
                        <img src="image/head.jpg" width="250px" height="100px"> 
                        </div>
                        <br><br><br>
                        <div class="pull-right">
                            <table border="0px">
                                <tr>
                                    <td width="80px" align="center"><b>No.Daftar |</b></td>
                                    <td width="50px" align="center"><b>Bilik |</b></td>
                                    <td width="50px" align="center"><b>Kursi</b></td>
                                </tr>
                                <tr>
                                    <td width="50px" align="center"><?= $regNumber ?></td>
                                    <td width="50px" align="center"><?= $testClass ?></td>
                                    <td width="50px" align="center"><?= $testNumber ?></td>
                                </tr>
                            </table>
    
                        </div>
                    </div>
                    
                    <b><hr class="new"></b>
                    
                    <div class="pull-left">
                        <img class="img-rounded" width="120" height="140px">
                    </div>
                    
                    <div id="main">
                        <p class="text-center">
                            <b>
                          بوراڠ فندفتران چالون مهاسيسوا  
                            </b>
                        </p>
                        <p class="text-center">
                            تاهون اکاديميک 2016
                        </p>
                    </div>

                    
                    <?php
                        $faculty1 = mysqli_query($con, "SELECt * FROM fakultys WHERE ft_id='$first_ftId'");
                        $rowFaculty1 = mysqli_fetch_array($faculty1);
                        $faculty2 = mysqli_query($con, "SELECt * FROM fakultys WHERE ft_id='$second_ftId'");
                        $rowFaculty2 = mysqli_fetch_array($faculty2);
                        
                        $department1 = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$first_dpId'");
                        $rowDepartment1 = mysqli_fetch_array($department1);
                        $department2 = mysqli_query($con, "SELECT * FROM departments WHERE dp+id='$second_ftId'");
                        $rowDepartment2 = mysqli_fetch_array($department2);
                        
                        $rsFaculty1 = $rowFaculty1['ft_arab_name'];
                        $rsFaculty2 = $rowFaculty2['ft_arab_name'];
                        
                        $rsdepartment1 = $rowDepartment1['dp_id'];
                        $rsdepartment2 = $rowDepartment2['dp_id'];
                        
                        if($rsdepartment1 == 22 ){
                            $fd1 = "PAI";
                        }elseif($rsdepartment2 == 23){
                            $fd1 = "PBSM";
                        }else{
                            $fd1 = "";
                        }
                        
                        if($rsdepartment2 == 22 ){
                            $fd2 = "PAI";
                        }elseif($rsdepartment2 == 23){
                            $fd2 = "PBSM";
                        }else{
                            $fd2 = "";
                        }
                    ?>
                    <br><br><br>
                    <div id="subText">
                        <p class="text-right"><b> :فيليهن کوليه</b></p>
                    </div>
                    
                    <div class="pull-right">
                        <table border="1px" align="right">
                          <tr height="30px">
                              <td align="center" width="320px">
                                <div id="subText"><?= $fd1 ?> <b> فيليهن فرتام : </b> <?= $rsFaculty1 ?> </div>
                              </td>
                          </tr>
                      </table>  
                    </div>
                    
                    <div class="pull-left">
                        <table border="1px" align="left">
                            <tr height="30px">
                                <td align="center" width="320px">
                                    <div id="subText"><?= $fd2 ?> <b> فيليهن كدوا :</b> <?= $rsFaculty2 ?> </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br><br>
                    
                    <div id="subText">
                        
                        <p align="right"><b>بهاݢين يڠ فرتام : بيوداتا</b></p>
                        
                        <table align="right" border="0" width="100%">
                            
                            <tr>
                                <td align="right" width="150px" colspan="5">
                                    <?= "___________" ?>  :
                                </td>
                                <td align="right" width="70px">
                                    <b>نام فڠݢيلن</b>
                                </td>
                                <td align="right" width="150px">
                                    <?= $firstname_jawi ?> - <?= $lastname_jawi ?>  :
                                </td>
                                <td align="right" width="50px">
                                    <b>نام - بقاء </b>
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="right" width="250px" colspan="5">
                                    <?= $firstname_eng ?> - <?= $lastname_eng ?>  :
                                </td>
                                <td align="right" width="150px">
                                    <b>نام دالم بهاس ايڠڬريس</b>
                                </td>
                                <td align="right" width="250">
                                    <div id="thai"><?= $t_studentname ?> - <?= $t_studentlastname ?>  :</div>
                                </td>
                                <td align="right" width="100px">
                                    <b>نام دالم تهاس تهاي</b>
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="right" width="150px" colspan="7">
                                    <?= $idCard ?>  :
                                </td>
                                <td align="right" width="70px">
                                    <b>نمبور کارد فڠنلن</b>
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="right" width="150px" colspan="5">
                                    <?= $disease ?>  :
                                </td>
                                <td align="right" width="70px">
                                    <b>فڽاکيت فمباواءن</b>
                                </td>
                                <td align="right" width="150px">
                                    <?= $birdthDate ?>  :
                                </td>
                                <td align="right" width="70px">
                                    <b>تڠݢل لاهير</b>
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="right" width="150px" colspan="5">
                                    <?= $fatherJob ?>  :
                                </td>
                                <td align="right" width="70px">
                                    <b>فكرجأن باف</b>
                                </td>
                                <td align="right" width="150px">
                                    <?= $fatherName ?> - <?= $fatherLastname ?>  :
                                </td>
                                <td align="right" width="70px">
                                    <b>نام باف</b>
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="right" width="150px" colspan="5">
                                    <?= $motherJob ?>  :
                                </td>
                                <td align="right" width="70px">
                                    <b>فكرجأن ايبو</b>
                                </td>
                                <td align="right" width="150px">
                                    <?= $motherName ?> - <?= $motherLastname ?>  :
                                </td>
                                <td align="right" width="70px">
                                    <b>نام ايبو</b>
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="right" width="150px">
                                    <div id="thai"><?= $t_subdistrict ?>  :</div>
                                </td>
                                <td align="right" width="60px">
                                    <b>مقيم</b>
                                </td>
                                <td align="right" width="50px">
                                    <?= $place ?>  :
                                </td>
                                <td align="right" width="50px">
                                    <b>تمفت</b>
                                </td>
                                <td align="right" width="150px">
                                    <div id="thai"><?= $t_village_name ?>  :</div>
                                </td>
                                <td align="right" width="70px">
                                    <b>کمفوڠ</b>
                                </td>
                                <td align="right" width="50px">
                                    <?= $house_number ?>  :
                                </td>
                                <td align="right" width="150px">
                                    <b>علامت تمفت تيڠݢل </b>
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="right" width="150px">
                                    <?= $telephone ?>  :
                                </td>
                                <td align="right" width="50px">
                                    <b>نمبرتليفون</b>
                                </td>
                                <td align="right" width="50px">
                                    <?= $post ?>  :
                                </td>
                                <td align="right" width="50px">
                                    <b>كودافوس</b>
                                </td>
                                <td align="right" width="150px">
                                    <div id="thai"><?= $t_province_sec ?>  :</div>
                                </td>
                                <td align="right" width="70px">
                                    <b>ولاية</b>
                                </td>
                                <td align="right" width="50px">
                                    <div id="thai"><?= $t_district ?>  :</div>
                                </td>
                                <td align="right" width="150px">
                                    <b>دائرةݢل </b>
                                </td>
                            </tr>
                            
                        </table>
                        </div>
                        
                        <br><br><br><br><br><br><br><br><br>
                        
                        <div id="subText">
                            <p align="right"><b>بهاݢين يڠ کدوا : سجاره فنديديقن</b></p>
                            <p align="right"><b>فنديديقن اݢام</b></p>
                            
                            <table align="right" border="0" width="100%">
                                <tr>
                                    <td align="right" width="150px"><?= $ibtidai_graduate_year ?> :</td>
                                    <td align="right" width="20px"><b>تاهون</b></td>
                                    <td align="right" width="150px"><?= $ibtidai_graduate ?> :</td>
                                    <td align="right" width="50px"><b>ابتدائي دري سكوله</b></td>
                                </tr>
                                <tr>
                                    <td align="right" width="150px"><?= $mutawasit_graduate_year ?> :</td>
                                    <td align="right" width="20px"><b>تاهون</b></td>
                                    <td align="right" width="150px"><?= $mutawasit_graduate ?> :</td>
                                    <td align="right" width="50px"><b>متوسط دري سكوله</b></td>
                                </tr>
                                <tr>
                                    <td align="right" width="150px"><?= $sanawi_graduate_year ?> :</td>
                                    <td align="right" width="20px"><b>تاهون</b></td>
                                    <td align="right" width="150px"><?= $sanawi_graduate ?> :</td>
                                    <td align="right" width="50px"><b>ثانوي دري سكوله</b></td>
                                </tr>
                            </table>
                            <br><br><br><br>
                            <p align="right"><b>فنديديقكن اكاديميك</b></p>
                            
                            <table align="right" border="0" width="100%">
                                <tr>
                                    <td align="right" width="150px"><?= $down_graduate_year ?> :</td>
                                    <td align="right" width="20px"><b>تاهون</b></td>
                                    <td align="right" width="150px"><div id="thai"><?= $down_graduate ?> :</div></td>
                                    <td align="right" width="50px"><b>سكوله داسر</b></td>
                                </tr>
                                <tr>
                                    <td align="right" width="150px"><?= $first_highschool_graduate_year ?> :</td>
                                    <td align="right" width="20px"><b>تاهون</b></td>
                                    <td align="right" width="150px"><div id="thai"><?= $first_highschool_graduate ?> :</div></td>
                                    <td align="right" width="50px"><b>سکوله منڠه باوه</b></td>
                                </tr>
                                <tr>
                                    <td align="right" width="150px"><?= $second_highschool_graduate_year ?> :</td>
                                    <td align="right" width="20px"><b>تاهون</b></td>
                                    <td align="right" width="150px"><div id="thai"><?= $second_highschool_graduate ?> :</div></td>
                                    <td align="right" width="50px"><b>سکوله منڠه اتس</b></td>
                                </tr>
                            </table>
                            
                            <br><br><br><br>
                            
                            <div id="subText">
                                <p align="right"><b>دفتر فد تڠݢل</b> : <?= $result['regisDate'] ?></p>
                            </div>
                            
                            
                            
                            <div id="subText">
                                <table align="right" border="0" width="100%">
                                    <tr>
                                        <td align="center">تندا تاڠن بهاݢين فندفترن</td>
                                        <td align="center" width="50px"></td>
                                        <td align="center">تندا تاڠن فموهون</td>
                                    </tr>
                                    <tr>
                                        <td align="center">......................................</td>
                                        <td align="center" width="50px"></td>
                                        <td align="center">......................................</td>
                                    </tr>
                                    <tr>
                                       <td align="center">(.......................................)</td>
                                        <td align="center" width="50px"></td>
                                        <td align="center">(......................................)</td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                        
                </div>
                
            </div>
            
	<div align="center">
            <button type="button" class="btn btn-success btn-sm" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
	</div>
            
        </body>
</html>
