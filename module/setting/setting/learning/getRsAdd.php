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
    if($dp_id == ''){
        $get11 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='1' and rs.rs_term='1'");
    }else{
        $get11 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id'  and rs.rs_class='1' and rs.rs_term='1'");    
    }
    
    //Get subject class 1 term 2
    if($dp_id == ''){
        $get12 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='1' and rs.rs_term='2'");
    }else{
        $get12 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id'  and rs.rs_class='1' and rs.rs_term='2'");    
    }
    //-----------------------------------------------------------------------------------------------
    
    //Class 2
    //-----------------------------------------------------------------------------------------------
    //Get subject class 2 term 1
    if($dp_id == ''){
        $get21 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='2' and rs.rs_term='1'");
    }else{
        $get21 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id'  and rs.rs_class='2' and rs.rs_term='1'");    
    }
    
    //Get subject class 2 term 2
    if($dp_id == ''){
        $get22 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='2' and rs.rs_term='2'");
    }else{
        $get22 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id'  and rs.rs_class='2' and rs.rs_term='2'");    
    }
    //-----------------------------------------------------------------------------------------------
    
    //Class 3
    //-----------------------------------------------------------------------------------------------
    //Get subject class 3 term 1
    if($dp_id == ''){
        $get31 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='3' and rs.rs_term='1'");
    }else{
        $get31 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id' and rs.rs_class='3' and rs.rs_term='1'");    
    }
    
    //Get subject class 3 term 2
    if($dp_id == ''){
        $get32 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='3' and rs.rs_term='2'");
    }else{
        $get32 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id'  and rs.rs_class='3' and rs.rs_term='2'");    
    }
    //-----------------------------------------------------------------------------------------------
    
    //Class 4
    //-----------------------------------------------------------------------------------------------
    //Get subject class 4 term 1
    if($dp_id == ''){
        $get41 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='4' and rs.rs_term='1'");
    }else{
        $get41 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id' and rs.rs_class='4' and rs.rs_term='1'");    
    }
    
    //Get subject class 4 term 2
    if($dp_id == ''){
        $get42 = mysqli_query($con, "SELECT rs.*,s.*,t.* FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.rs_class='4' and rs.rs_term='2'");
    }else{
        $get42 = mysqli_query($con, "SELECT * FROM registerSubject rs
                              INNER JOIN subject s ON rs.s_id=s.s_id
                              INNER JOIN teachers t ON rs.t_id=t.t_id
                              WHERE rs.ft_id='$ft_id' and rs.dp_id='$dp_id' and rs.rs_class='4' and rs.rs_term='2'");    
    }
    //-----------------------------------------------------------------------------------------------
?>
<a href="?page=setting&&settingpage=l" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> BACK</a>
<br><br>
<div class="panel panel-info">
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
                      //-----------------CLASS 1 Tterm 1---------------------------
                        while($row11 = mysqli_fetch_array($get11)){
                      ?>
                      <tr>
                          <td valign="top" align="left">
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $row11['s_code'] ?>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= substr($row11['s_rumiName'], 0,20) ?>... <br>
                              <font color="red"><b>(<?= $row11['t_fnameRumi'] ?> <?= $row11['t_lnameRumi'] ?>)</b></font>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <font color="red"><a href="?page=setting&&settingpage=rsDelete&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&id=<?= $row11['rs_id'] ?>" onclick="return confirm('Anda yakin untuk hapus data ini ?')"><span class="glyphicon glyphicon-remove"></span></a></font>
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
                      //-----------------CLASS 1 Tterm 2---------------------------
                        while($row12 = mysqli_fetch_array($get12)){
                      ?>
                      <tr>
                          <td valign="top">
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $row12['s_code'] ?>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= substr($row12['s_rumiName'], 0,20) ?>...<br> 
                              <font color="red"><b>(<?= $row12['t_fnameRumi'] ?> <?= $row12['t_lnameRumi'] ?>)</b></font>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <font color="red"><a href="?page=setting&&settingpage=rsDelete&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&id=<?= $row12['rs_id'] ?>"onclick="return confirm('Anda yakin untuk hapus data ini ?')"><span class="glyphicon glyphicon-remove"></span></a></font>
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
                      //-----------------CLASS 2 TERM 1---------------------------
                        while($row21 = mysqli_fetch_array($get21)){
                      ?>
                      <tr>
                          <td valign="top">
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $row21['s_code'] ?>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= substr($row21['s_rumiName'], 0,20) ?>...<br>
                              <font color="red"><b>(<?= $row21['t_fnameRumi'] ?> <?= $row21['t_lnameRumi'] ?>)</b></font>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                               <font color="red"><a href="?page=setting&&settingpage=rsDelete&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&id=<?= $row21['rs_id'] ?>"onclick="return confirm('Anda yakin untuk hapus data ini ?')"><span class="glyphicon glyphicon-remove"></span></a></font>
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
                      //-----------------CLASS 2 Tterm 2---------------------------
                        while($row22 = mysqli_fetch_array($get22)){
                      ?>
                      <tr>
                          <td valign="top">
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $row22['s_code'] ?>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= substr($row22['s_rumiName'], 0,20) ?>...<br>
                              <font color="red"><b>(<?= $row22['t_fnameRumi'] ?> <?= $row22['t_lnameRumi'] ?>)</b></font>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <font color="red"><a href="?page=setting&&settingpage=rsDelete&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&id=<?= $row22['rs_id'] ?>"onclick="return confirm('Anda yakin untuk hapus data ini ?')"><span class="glyphicon glyphicon-remove"></span></a></font>
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
                  <table>
                      <?php
                      //-----------------CLASS 3 Tterm 1---------------------------
                        while($row31 = mysqli_fetch_array($get31)){
                      ?>
                      <tr>
                          <td valign="top">
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $row31['s_code'] ?>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= substr($row31['s_rumiName'], 0,20) ?>...<br>
                              <font color="red"><b>(<?= $row31['t_fnameRumi'] ?> <?= $row31['t_lnameRumi'] ?>)</b></font>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <font color="red"><a href="?page=setting&&settingpage=rsDelete&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&id=<?= $row31['rs_id'] ?>"onclick="return confirm('Anda yakin untuk hapus data ini ?')"><span class="glyphicon glyphicon-remove"></span></a></font>
                          </td>
                      </tr>
                      <?php
                        }
                      ?>
                  </table>
                  <a href="?page=setting&&settingpage=sAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=3&&term=1" class="btn btn-primary btn-xs">Tambah</a>
              </td>
              <td align="center">
                  <table>
                      <?php
                      //-----------------CLASS 3 Tterm 2---------------------------
                        while($row32 = mysqli_fetch_array($get32)){
                      ?>
                      <tr>
                          <td valign="top">
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $row32['s_code'] ?>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= substr($row32['s_rumiName'], 0,20) ?>...<br>
                              <font color="red"><b>(<?= $row32['t_fnameRumi'] ?> <?= $row32['t_lnameRumi'] ?>)</b></font>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <font color="red"><a href="?page=setting&&settingpage=rsDelete&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&id=<?= $row32['rs_id'] ?>"onclick="return confirm('Anda yakin untuk hapus data ini ?')"><span class="glyphicon glyphicon-remove"></span></a></font>
                          </td>
                      </tr>
                      <?php
                        }
                      ?>
                  </table>
                  <a href="?page=setting&&settingpage=sAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=3&&term=2" class="btn btn-primary btn-xs">Tambah</a>
              </td>
          </tr>
          <tr>
              <td align="center">
                  <b>4</b>
              </td>
              <td align="center">
                  <table>
                      <?php
                      //-----------------CLASS 4 Tterm 1---------------------------
                        while($row41 = mysqli_fetch_array($get41)){
                      ?>
                      <tr>
                          <td valign="top">
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $row41['s_code'] ?>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= substr($row41['s_rumiName'], 0,20) ?>...<br>
                              <font color="red"><b>(<?= $row41['t_fnameRumi'] ?> <?= $row41['t_lnameRumi'] ?>)</b></font>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <font color="red"><a href="?page=setting&&settingpage=rsDelete&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&id=<?= $row41['rs_id'] ?>"onclick="return confirm('Anda yakin untuk hapus data ini ?')"><span class="glyphicon glyphicon-remove"></span></a></font>
                          </td>
                      </tr>
                      <?php
                        }
                      ?>
                  </table>
                  <a href="?page=setting&&settingpage=sAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=4&&term=1" class="btn btn-primary btn-xs">Tambah</a>
              </td>
              <td align="center">
                  <table>
                      <?php
                      //-----------------CLASS 4 Tterm 1---------------------------
                        while($row42 = mysqli_fetch_array($get42)){
                      ?>
                      <tr>
                          <td valign="top">
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= $row42['s_code'] ?>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;<?= substr($row42['s_rumiName'], 0,20) ?>...<br>
                              <font color="red"><b>(<?= $row42['t_fnameRumi'] ?> <?= $row42['t_lnameRumi'] ?>)</b></font>
                          </td>
                          <td>
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              <font color="red"><a href="?page=setting&&settingpage=rsDelete&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&id=<?= $row42['rs_id'] ?>"onclick="return confirm('Anda yakin untuk hapus data ini ?')"><span class="glyphicon glyphicon-remove"></span></a></font>
                          </td>
                      </tr>
                      <?php
                        }
                      ?>
                  </table>
                  <a href="?page=setting&&settingpage=sAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=4&&term=2" class="btn btn-primary btn-xs">Tambah</a>
              </td>
          </tr>
      </table>
  </div>
</div>
