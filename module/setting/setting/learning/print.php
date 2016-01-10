<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>ADMIN | Resit</title>
    
    <style>
        body {
            height: 900px;
            width: 595px;
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }
        table{
            border-collapse: collapse;
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
    include '../../../../connect.php';
    $ft_id = $_GET['ft_id'];
    $dp_id = $_GET['dp_id'];
    
    //Get fakulty data
    $faculty = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
    $rowFaculty = mysqli_fetch_array($faculty);
    
    //Get department data
    $department = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$dp_id'");
    $rowDepartment = mysqli_fetch_array($department);
    
    //Get subject class 1 term 1
    if($dp_id == ''){
        $subject11 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='1' and rs.rs_term='1'
                              ORDER BY rs.rs_class");
    }else{
        $subject11 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id' and rs.rs_class='1' and rs.rs_term='1'
                              ORDER BY rs.rs_class
                              ");    
    }
    
    //Get subject class 1 term 2
    if($dp_id == ''){
        $subject12 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='1' and rs.rs_term='2'
                              ORDER BY rs.rs_class");
    }else{
        $subject12 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id' and rs.rs_class='1' and rs.rs_term='2'
                              ORDER BY rs.rs_class
                              ");    
    }
    
    //Get subject class 2 term 1
    if($dp_id == ''){
        $subject21 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='2' and rs.rs_term='1'
                              ORDER BY rs.rs_class");
    }else{
        $subject21 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id' and rs.rs_class='2' and rs.rs_term='1'
                              ORDER BY rs.rs_class
                              ");    
    }
    
    //Get subject class 2 term 2
    if($dp_id == ''){
        $subject22 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='2' and rs.rs_term='2'
                              ORDER BY rs.rs_class");
    }else{
        $subject22 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id' and rs.rs_class='2' and rs.rs_term='2'
                              ORDER BY rs.rs_class
                              ");    
    }
    
    //Get subject class 3 term 1
    if($dp_id == ''){
        $subject31 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='3' and rs.rs_term='1'
                              ORDER BY rs.rs_class");
    }else{
        $subject31 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id' and rs.rs_class='3' and rs.rs_term='1'
                              ORDER BY rs.rs_class
                              ");    
    }
    
    //Get subject class 3 term 2
    if($dp_id == ''){
        $subject32 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='3' and rs.rs_term='2'
                              ORDER BY rs.rs_class");
    }else{
        $subject32 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id' and rs.rs_class='3' and rs.rs_term='2'
                              ORDER BY rs.rs_class
                              ");    
    }
    
    //Get subject class 4 term 1
    if($dp_id == ''){
        $subject41 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='4' and rs.rs_term='1'
                              ORDER BY rs.rs_class");
    }else{
        $subject41 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id' and rs.rs_class='4' and rs.rs_term='1'
                              ORDER BY rs.rs_class
                              ");    
    }
    
    //Get subject class 4 term 1
    if($dp_id == ''){
        $subject42 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='4' and rs.rs_term='2'
                              ORDER BY rs.rs_class");
    }else{
        $subject42 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id' and rs.rs_class='4' and rs.rs_term='2'
                              ORDER BY rs.rs_class
                              ");    
    }
 ?>
	<body>			
            <div id="printableArea">
                
                <table width="100%">
                    <tr align="center">
                        <td>
                            <font size="4px"><b> جامعة الشيخ داود الفطاني اﻹسلامية - جالا </b></font><br><br>
                            <font size="4px"><b> سناراي مات كلية </b></font><br><br>
                            <font size="4px"> <?= $rowFaculty['ft_arab_name'] ?><i>&nbsp;&nbsp;&nbsp;<?= $rowDepartment['dp_arab_name'] ?></i> </font><br><br>
                        </td>
                        <td align="left">
                            <img src="image/LOGO JISDA.png"width="87" height="99"><br>
                            <b>J I S D A</b>
                        </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                </table>
            
                <table border="1px" width="100%">
                      
                      <!-- Class 1 term 1 -->
                      <tr>
                        <td align="left" colspan="3"><b><font color="gray">Kelas/Semester : 1/1</font></b></td>
                      </tr>
                      <tr>
                        <td align="center"><b>KOD</b></td>
                        <td align="center"><b>MATA KULIAH</b></td>
                        <td align="center"><b>PENSYARAH</b></td>
                      </tr>
                    <tbody>
                        <?php
                          while($rowSubject11 = mysqli_fetch_array($subject11)){
                              //Get student data
                              $s_code = $rowSubject11['s_code'];
                              $s_name = str_replace("\'", "&#39;", $rowSubject11['s_rumiName']);
                              $t_name = str_replace("\'", "&#39;", $rowSubject11['t_fnameRumi']);
                              $t_lname = str_replace("\'", "&#39;", $rowSubject11['t_lnameRumi']);
                        ?>
                        <tr>
                          <td align="center" height="10"><font size="2px"><?= $s_code ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $s_name ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $t_name ?> - <?= $t_lname ?></font></td>
                        </tr>
                        <?php
                          }
                        ?>
                        
                        <!-- Class 1 term 2 -->
                        <tr>
                        <td align="left" colspan="3"><b><font color="gray">Kelas/Semester : 1/2</font></b></td>
                      </tr>
                      <tr>
                        <td align="center"><b>KOD</b></td>
                        <td align="center"><b>MATA KULIAH</b></td>
                        <td align="center"><b>PENSYARAH</b></td>
                      </tr>
                    <tbody>
                        <?php
                          while($rowSubject12 = mysqli_fetch_array($subject12)){
                              //Get student data
                              $s_code = $rowSubject12['s_code'];
                              $s_name = str_replace("\'", "&#39;", $rowSubject12['s_rumiName']);
                              $t_name = str_replace("\'", "&#39;", $rowSubject12['t_fnameRumi']);
                              $t_lname = str_replace("\'", "&#39;", $rowSubject12['t_lnameRumi']);
                        ?>
                        <tr>
                          <td align="center" height="10"><font size="2px"><?= $s_code ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $s_name ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $t_name ?> - <?= $t_lname ?></font></td>
                        </tr>
                        <?php
                          }
                        ?>
                        
                        <!-- Class 2 term 1 -->
                        <tr>
                        <td align="left" colspan="3"><b><font color="gray">Kelas/Semester : 2/1</font></b></td>
                      </tr>
                      <tr>
                        <td align="center"><b>KOD</b></td>
                        <td align="center"><b>MATA KULIAH</b></td>
                        <td align="center"><b>PENSYARAH</b></td>
                      </tr>
                    <tbody>
                        <?php
                          while($rowSubject21 = mysqli_fetch_array($subject21)){
                              //Get student data
                              $s_code = $rowSubject21['s_code'];
                              $s_name = str_replace("\'", "&#39;", $rowSubject21['s_rumiName']);
                              $t_name = str_replace("\'", "&#39;", $rowSubject21['t_fnameRumi']);
                              $t_lname = str_replace("\'", "&#39;", $rowSubject21['t_lnameRumi']);
                        ?>
                        <tr>
                          <td align="center" height="10"><font size="2px"><?= $s_code ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $s_name ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $t_name ?> - <?= $t_lname ?></font></td>
                        </tr>
                        <?php
                          }
                        ?>
                        
                        <!-- Class 2 term 2 -->
                        <tr>
                        <td align="left" colspan="3"><b><font color="gray">Kelas/Semester : 2/2</font></b></td>
                      </tr>
                      <tr>
                        <td align="center"><b>KOD</b></td>
                        <td align="center"><b>MATA KULIAH</b></td>
                        <td align="center"><b>PENSYARAH</b></td>
                      </tr>
                    <tbody>
                        <?php
                          while($rowSubject22 = mysqli_fetch_array($subject22)){
                              //Get student data
                              $s_code = $rowSubject22['s_code'];
                              $s_name = str_replace("\'", "&#39;", $rowSubject22['s_rumiName']);
                              $t_name = str_replace("\'", "&#39;", $rowSubject22['t_fnameRumi']);
                              $t_lname = str_replace("\'", "&#39;", $rowSubject22['t_lnameRumi']);
                        ?>
                        <tr>
                          <td align="center" height="10"><font size="2px"><?= $s_code ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $s_name ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $t_name ?> - <?= $t_lname ?></font></td>
                        </tr>
                        <?php
                          }
                        ?>
                        
                        <!-- Class 3 term 1 -->
                        <tr>
                        <td align="left" colspan="3"><b><font color="gray">Kelas/Semester : 3/1</font></b></td>
                      </tr>
                      <tr>
                        <td align="center"><b>KOD</b></td>
                        <td align="center"><b>MATA KULIAH</b></td>
                        <td align="center"><b>PENSYARAH</b></td>
                      </tr>
                    <tbody>
                        <?php
                          while($rowSubject31 = mysqli_fetch_array($subject31)){
                              //Get student data
                              $s_code = $rowSubject31['s_code'];
                              $s_name = str_replace("\'", "&#39;", $rowSubject31['s_rumiName']);
                              $t_name = str_replace("\'", "&#39;", $rowSubject31['t_fnameRumi']);
                              $t_lname = str_replace("\'", "&#39;", $rowSubject31['t_lnameRumi']);
                        ?>
                        <tr>
                          <td align="center" height="10"><font size="2px"><?= $s_code ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $s_name ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $t_name ?> - <?= $t_lname ?></font></td>
                        </tr>
                        <?php
                          }
                        ?>
                        
                        <!-- Class 3 term 2 -->
                        <tr>
                        <td align="left" colspan="3"><b><font color="gray">Kelas/Semester : 3/2</font></b></td>
                      </tr>
                      <tr>
                        <td align="center"><b>KOD</b></td>
                        <td align="center"><b>MATA KULIAH</b></td>
                        <td align="center"><b>PENSYARAH</b></td>
                      </tr>
                    <tbody>
                        <?php
                          while($rowSubject32 = mysqli_fetch_array($subject32)){
                              //Get student data
                              $s_code = $rowSubject32['s_code'];
                              $s_name = str_replace("\'", "&#39;", $rowSubject32['s_rumiName']);
                              $t_name = str_replace("\'", "&#39;", $rowSubject32['t_fnameRumi']);
                              $t_lname = str_replace("\'", "&#39;", $rowSubject32['t_lnameRumi']);
                        ?>
                        <tr>
                          <td align="center" height="10"><font size="2px"><?= $s_code ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $s_name ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $t_name ?> - <?= $t_lname ?></font></td>
                        </tr>
                        <?php
                          }
                        ?>
                        
                        <!-- Class 4 term 1 -->
                        <tr>
                        <td align="left" colspan="3"><b><font color="gray">Kelas/Semester : 4/1</font></b></td>
                      </tr>
                      <tr>
                        <td align="center"><b>KOD</b></td>
                        <td align="center"><b>MATA KULIAH</b></td>
                        <td align="center"><b>PENSYARAH</b></td>
                      </tr>
                    <tbody>
                        <?php
                          while($rowSubject41 = mysqli_fetch_array($subject41)){
                              //Get student data
                              $s_code = $rowSubject41['s_code'];
                              $s_name = str_replace("\'", "&#39;", $rowSubject41['s_rumiName']);
                              $t_name = str_replace("\'", "&#39;", $rowSubject41['t_fnameRumi']);
                              $t_lname = str_replace("\'", "&#39;", $rowSubject41['t_lnameRumi']);
                        ?>
                        <tr>
                          <td align="center" height="10"><font size="2px"><?= $s_code ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $s_name ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $t_name ?> - <?= $t_lname ?></font></td>
                        </tr>
                        <?php
                          }
                        ?>
                        
                        <!-- Class 4 term 2 -->
                        <tr>
                        <td align="left" colspan="3"><b><font color="gray">Kelas/Semester : 4/2</font></b></td>
                      </tr>
                      <tr>
                        <td align="center"><b>KOD</b></td>
                        <td align="center"><b>MATA KULIAH</b></td>
                        <td align="center"><b>PENSYARAH</b></td>
                      </tr>
                    <tbody>
                        <?php
                          while($rowSubject42 = mysqli_fetch_array($subject42)){
                              //Get student data
                              $s_code = $rowSubject42['s_code'];
                              $s_name = str_replace("\'", "&#39;", $rowSubject42['s_rumiName']);
                              $t_name = str_replace("\'", "&#39;", $rowSubject42['t_fnameRumi']);
                              $t_lname = str_replace("\'", "&#39;", $rowSubject42['t_lnameRumi']);
                        ?>
                        <tr>
                          <td align="center" height="10"><font size="2px"><?= $s_code ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $s_name ?></font></td>
                          <td align="left" height="10"><font size="2px"><?= $t_name ?> - <?= $t_lname ?></font></td>
                        </tr>
                        <?php
                          }
                        ?>
                        
                    </tbody>
                </table>
            </div>
            <br>
            <div align="center">
                <button type="button" class="btn btn-success" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
            </div>
            <br>
    </body>
</html>
