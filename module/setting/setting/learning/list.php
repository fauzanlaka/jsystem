<?php
    $faculty = mysqli_query($con, "SELECT * FROM fakultys");
?>
<br>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">PERKULIAHAN</h3>
  </div>
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
                                        if($i < $num-1){
                                        echo "OK";    
                                        }
                                        //$i = $i + 1;
                                        $i++;
                                        if($i < $num-1){
                                        echo "<br>";
                                        } 
                                    }   
                                }else{
                                    echo "OK";
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
