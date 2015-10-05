<?php
    $ft_id = $_GET['ft_id'];
    $dp_id = $_GET['dp_id']; 
    
    $faculty = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
    $rowF = mysqli_fetch_array($faculty);
    
    $department = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$dp_id'");
    $rowD = mysqli_fetch_array($department);
    
    //Get subject class 1 term 1
    $get11 = mysqli_query($con, "SELECT * FROM registerSubject 
                         WHERE rs_class='1' and rs_term='1'");
    
    //Get subject class 1 term 2
    $get12 = mysqli_query($con, "SELECT * FROM registerSubject 
                         WHERE rs_class='1' and rs_term='2'");

?>
<a href="?page=setting&&settingpage=rsAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> BACK</a>
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
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $rowS11['s_code'] ?>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $rowS11['s_rumiName'] ?> <font color="red"><b>(<?= $rowS11['t_fnameRumi'] ?> <?= $rowS11['t_lnameRumi'] ?>)</b></font>
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
                                                             WHERE tc_id='$row12[tc_id]'");
                            $rowS12 = mysqli_fetch_array($subject12);
                      ?>
                      <tr>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $rowS12['s_code'] ?>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $rowS12['s_rumiName'] ?> <font color="red"><b>(<?= $rowS12['t_fnameRumi'] ?> <?= $rowS12['t_lnameRumi'] ?>)</b></font>
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
                  <a href="?page=setting&&settingpage=sAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=2&&term=1" class="btn btn-primary btn-xs">Tambah</a>
              </td>
              <td align="center">
                  <a href="?page=setting&&settingpage=sAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=1&&term=2" class="btn btn-primary btn-xs">Tambah</a>
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
