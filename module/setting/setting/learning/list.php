<?php
    $faculty = mysqli_query($con, "SELECT * FROM fakultys");
?>
<br>
<div class="pull-right">
    <a href="?page=setting&&settingpage=setting"><button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> KEMBALI</button></a>
</div>
<h4><span class="glyphicon glyphicon-book"></span> <b>DATA KULIAH</b></h4>
    <div class="panel panel-primary">
      <div class="panel-body">
         <table class="table table-bordered">
            <tr>
                <td align="center"><b>KULIAH / JURUSAN</b></td>
                <td align="center"><b>TOTAL</b></td>
            </tr>
            <?php
                while ($rowFaculty = mysqli_fetch_array($faculty)){
            ?>
            <tr>
                <td align="left">
                    <font color='green'>
                        <b>-
                            <a href="?page=setting&&settingpage=rsAdd&&ft_id=<?= $rowFaculty['ft_id'] ?>&&dp_id=<?= $rowDepartments['dp_id'] ?>">
                                <?= $rowFaculty['ft_name'] ?>
                            </a>
                                <?= "<br>" ?>
                                <?php
                                    $department = mysqli_query($con, "SELECT * FROM departments");
                                    $rowDepartment = mysqli_fetch_array($department);
                                    if($rowFaculty['ft_id'] == $rowDepartment['ft_id']){
                                        $departments = mysqli_query($con, "SELECT * FROM departments");
                                        $count = mysqli_query($con, "SELECT COUNT(*) as total from departments");
                                        $sum = mysqli_fetch_assoc($count);
                                        $num = $sum['total'];
                                        $i = 0 ;
                                        while($rowDepartments = mysqli_fetch_array($departments)){
                                            if($i < $num-1){
                            ?>
                            <font color="2780e3">
                            <?php
                                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>&nbsp;";
                                            }
                            ?>
                            </font>
                            <a href="?page=setting&&settingpage=rsAdd&&ft_id=<?= $rowFaculty['ft_id'] ?>&&dp_id=<?= $rowDepartments['dp_id'] ?>">
                                    <?= $rowDepartments['dp_name'] ?>
                            </a>
                            <?php

                                            //$i = $i + 1;
                                            $i++;
                                            if($i < $num-1){
                                            echo "<br>";
                                            } 
                                        }   
                                    }
                                ?>
                        </b>
                    </font>
                </td>
                <td align="center">
                    <font color='red'>
                            <?php
                                    $department = mysqli_query($con, "SELECT * FROM departments");
                                    $rowDepartment = mysqli_fetch_array($department);
                                    if($rowFaculty['ft_id'] == $rowDepartment['ft_id']){
                                        $departments = mysqli_query($con, "SELECT * FROM departments");
                                        $count = mysqli_query($con, "SELECT COUNT(*) as total from departments");
                                        $sum = mysqli_fetch_assoc($count);
                                        $num = $sum['total'];
                                        $i = 0 ;
                                        echo "<br>";
                                        while($rowDepartments = mysqli_fetch_array($departments)){
                                            $idd = $rowDepartments[dp_id];
                                            $coutSubject = mysqli_query($con, "SELECT count(rs_id) AS total FROM registerSubject WHERE dp_id='$idd'");
                                            $rowSubject = mysqli_fetch_array($coutSubject);
                                            if($i < $num-1){   
                                            //Get total subject
                                            echo "<b>";
                                            echo $rowSubject[total]; 
                                            echo "</b>";
                                            }
                                            $i++;
                                            if($i < $num-1){
                                            echo "<br>";
                                            } 
                                        }   
                                    }else{
                                        //Get total subject
                                        $coutSubject = mysqli_query($con, "SELECT count(rs_id) AS total FROM registerSubject WHERE ft_id='$rowFaculty[ft_id]'");
                                        $rowSubject = mysqli_fetch_array($coutSubject);
                                        echo "<b>";
                                        echo $rowSubject['total'];   
                                        echo "</b>";
                                    }
                            ?>
                        </a>
                    </font>
                </td>
            </tr>
            <?php
                }
            ?>
          </table>  
      </div>
    </div>   

