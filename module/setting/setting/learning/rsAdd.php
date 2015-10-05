<?php
    $ft_id = $_GET['ft_id'];
    $dp_id = $_GET['dp_id']; 
    
    $faculty = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
    $rowF = mysqli_fetch_array($faculty);
    
    $department = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$dp_id'");
    $rowD = mysqli_fetch_array($department);

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
                  <a href="?page=setting&&settingpage=sAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=1&&term=1" class="btn btn-primary btn-xs">Tambah</a>
              </td>
              <td align="center">
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
                  <a href="#" class="btn btn-primary btn-xs">Tambah</a>
              </td>
              <td align="center">
                  <a href="#" class="btn btn-primary btn-xs">Tambah</a>
              </td>
          </tr>
          <tr>
              <td align="center">
                  <b>4</b>
              </td>
              <td align="center">
                  <a href="#" class="btn btn-primary btn-xs">Tambah</a>
              </td>
              <td align="center">
                  <a href="#" class="btn btn-primary btn-xs">Tambah</a>
              </td>
          </tr>
      </table>
  </div>
</div>
