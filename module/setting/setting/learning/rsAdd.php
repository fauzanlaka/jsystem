<?php
    $ft_id = $_GET['ft_id'];
    $dp_id = $_GET['dp_id']; 
    
    $faculty = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
    $rowF = mysqli_fetch_array($faculty);
    
    $department = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$dp_id'");
    $rowD = mysqli_fetch_array($department);
    
    //Class 1
    //-----------------------------------------------------------------------------------------------
    //Get subject class 1 term 1
    if($dp_id != ''){
        $get11 = mysqli_query($con, "SELECT * FROM registerSubject WHERE ft_id='$ft_id' and dp_id='$dp_id' and rs_class='1' and rs_term='1'");
    }else{
        $get11 = mysqli_query($con, "SELECT * FROM registerSubject WHERE ft_id='$ft_id' and rs_class='1' and rs_term='1'");    
    }
    
    //Get subject class 1 term 2
    if($dp_id != ''){
        $get12 = mysqli_query($con, "SELECT * FROM registerSubject WHERE ft_id='$ft_id' and dp_id='$dp_id' and rs_class='1' and rs_term='2'");
    }else{
        $get12 = mysqli_query($con, "SELECT * FROM registerSubject WHERE ft_id='$ft_id' and rs_class='1' and rs_term='2'");    
    }
    //-----------------------------------------------------------------------------------------------
    
    //Class 2
    //-----------------------------------------------------------------------------------------------
    //Get subject class 1 term 1
    if($dp_id != ''){
        $get21 = mysqli_query($con, "SELECT * FROM registerSubject WHERE ft_id='$ft_id' and dp_id='$dp_id' and rs_class='2' and rs_term='1'");
    }else{
        $get21 = mysqli_query($con, "SELECT * FROM registerSubject WHERE ft_id='$ft_id' and rs_class='2' and rs_term='1'");    
    }
    
    //Get subject class 1 term 2
    if($dp_id != ''){
        $get22 = mysqli_query($con, "SELECT * FROM registerSubject WHERE ft_id='$ft_id' and dp_id='$dp_id' and rs_class='2' and rs_term='2'");
    }else{
        $get22 = mysqli_query($con, "SELECT * FROM registerSubject WHERE ft_id='$ft_id' and rs_class='2' and rs_term='2'");    
    }
    //-----------------------------------------------------------------------------------------------
?>
<br>
<a href="?page=setting&&settingpage=l" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> BACK</a>
<br><br>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">
        <b>
            <?= $rowF['ft_name']; ?>
        </b>  
            <?php
                if($rowD['dp_name'] != ''){
                echo ":&nbsp";
                echo $rowD['dp_name'];
                }
            ?>
    </h3>
  </div>
  <div class="panel-body">
      <table class="table table-bordered">
          <tr>
              <td align="center"><b>KELAS</b></td>
              <td align="center"><b>SEMESTER 1</b></td>
              <td align="center"><b>SEMESTER 2</b></td>
          </tr>
          <tr>
              <td align="center">
                  <b>1</b>
              </td>
              <td align="center">
                  <table>
                      <?php
                        while($row11 = mysqli_fetch_array($get11)){
                            
                            //Get subject data class 1 term 1
                            $subject11 = mysqli_query($con, "SELECT tc.*,s.*,t.* FROM teaching tc 
                                                             INNER JOIN subject s ON tc.s_id=s.s_id
                                                             INNER JOIN teachers t ON tc.t_id=t.t_id
                                                             WHERE tc_id='$row11[tc_id]'");
                            $rowS11 = mysqli_fetch_array($subject11);
                      ?>
                      <tr>
                          <td valign="top" align="left">
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $rowS11['s_code'] ?>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= substr($rowS11['s_rumiName'], 0,20) ?>... <br>
                              <font color="red"><b>(<?= $rowS11['t_fnameRumi'] ?> <?= $rowS11['t_lnameRumi'] ?>)</b></font>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <span class="glyphicon glyphicon-remove"
                          </td>
                      </tr>
                      <?php
                        }
                      ?>
                  </table>
                  <a href="?page=setting&&settingpage=sAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=1&&term=1" class="btn btn-primary btn-xs">Tambah</a>
              </td>
              <td align="center">
                  <table>
                      <?php
                        while($row12 = mysqli_fetch_array($get12)){
                            
                            //Get subject data
                            $subject12 = mysqli_query($con, "SELECT tc.*,s.*,t.* FROM teaching tc 
                                                             INNER JOIN subject s ON tc.s_id=s.s_id
                                                             INNER JOIN teachers t ON tc.t_id=t.t_id
                                                             WHERE tc_id='$row12[tc_id]'");
                            $rowS12 = mysqli_fetch_array($subject12);
                      ?>
                      <tr>
                          <td valign="top">
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $rowS12['s_code'] ?>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= substr($rowS12['s_rumiName'], 0,20) ?>...<br> 
                              <font color="red"><b>(<?= $rowS12['t_fnameRumi'] ?> <?= $rowS12['t_lnameRumi'] ?>)</b></font>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <span class="glyphicon glyphicon-remove"
                          </td>
                      </tr>
                      <?php
                        }
                      ?>
                  </table>
                  <a href="?page=setting&&settingpage=sAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=1&&term=2" class="btn btn-primary btn-xs">Tambah</a>
              </td>
          </tr>
          <tr>
              <td align="center">
                  <b>2</b>
              </td>
              <td align="center">
                  <table>
                      <?php
                        while($row21 = mysqli_fetch_array($get21)){
                            
                            //Get subject data class 1 term 1
                            $subject21 = mysqli_query($con, "SELECT tc.*,s.*,t.* FROM teaching tc 
                                                             INNER JOIN subject s ON tc.s_id=s.s_id
                                                             INNER JOIN teachers t ON tc.t_id=t.t_id
                                                             WHERE tc_id='$row21[tc_id]'");
                            $rowS21 = mysqli_fetch_array($subject21);
                      ?>
                      <tr>
                          <td valign="top">
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $rowS21['s_code'] ?>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= substr($rowS21['s_rumiName'], 0,20) ?>...<br>
                              <font color="red"><b>(<?= $rowS21['t_fnameRumi'] ?> <?= $rowS21['t_lnameRumi'] ?>)</b></font>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <span class="glyphicon glyphicon-remove"
                          </td>
                      </tr>
                      <?php
                        }
                      ?>
                  </table>
                  <a href="?page=setting&&settingpage=sAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=2&&term=1" class="btn btn-primary btn-xs">Tambah</a>
              </td>
              <td align="center">
                  <table>
                      <?php
                        while($row22 = mysqli_fetch_array($get22)){
                            
                            //Get subject data class 1 term 1
                            $subject22 = mysqli_query($con, "SELECT tc.*,s.*,t.* FROM teaching tc 
                                                             INNER JOIN subject s ON tc.s_id=s.s_id
                                                             INNER JOIN teachers t ON tc.t_id=t.t_id
                                                             WHERE tc_id='$row22[tc_id]'");
                            $rowS22 = mysqli_fetch_array($subject22);
                      ?>
                      <tr>
                          <td valign="top">
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $rowS22['s_code'] ?>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= substr($rowS22['s_rumiName'], 0,20) ?>...<br>
                              <font color="red"><b>(<?= $rowS22['t_fnameRumi'] ?> <?= $rowS22['t_lnameRumi'] ?>)</b></font>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <span class="glyphicon glyphicon-remove"
                          </td>
                      </tr>
                      <?php
                        }
                      ?>
                  </table>
                  <a href="?page=setting&&settingpage=sAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=2&&term=2" class="btn btn-primary btn-xs">Tambah</a>
              </td>
          </tr>
          <tr>
              <td align="center">
                  <b>3</b>
              </td>
              <td align="center">
                  <a href="?page=setting&&settingpage=sAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=3&&term=1" class="btn btn-primary btn-xs">Tambah</a>
              </td>
              <td align="center">
                  <a href="?page=setting&&settingpage=sAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=3&&term=2" class="btn btn-primary btn-xs">Tambah</a>
              </td>
          </tr>
          <tr>
              <td align="center">
                  <b>4</b>
              </td>
              <td align="center">
                  <a href="?page=setting&&settingpage=sAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=4&&term=1" class="btn btn-primary btn-xs">Tambah</a>
              </td>
              <td align="center">
                  <a href="?page=setting&&settingpage=sAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=4&&term=2" class="btn btn-primary btn-xs">Tambah</a>
              </td>
          </tr>
      </table>
  </div>
</div>
