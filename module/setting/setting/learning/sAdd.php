<?php
    $ft_id = $_GET['ft_id'];
    $dp_id = $_GET['dp_id'];
    $class = $_GET['class'];
    $term = $_GET['term'];
    
    $faculty = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$ft_id'");
    $rowF = mysqli_fetch_array($faculty);
    
    $department = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$dp_id'");
    $rowD = mysqli_fetch_array($department);
?>
<br>    
<div class="pull-right">
    <a href="?page=setting&&settingpage=rsAdd&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> KEMBALI</a>
</div>
    <p>TAHUN : <?= $class ?> SEMESTER : <?= $term ?></p>
    <small>
              <b><?= $rowF['ft_name']; ?></b>
              <?php
                  if($rowD['dp_name'] != ''){
              ?>
              <cite title="Source Title"><?= $rowD['dp_name'] ?></cite>
              <?php
                  }
              ?>
    </small><br>
<div class="panel panel-primary">
    <div class="panel-body">
        <form class="form-horizontal" action="?page=setting&&settingpage=sAddSave&&ft_id=<?= $ft_id ?>&&dp_id=<?= $dp_id ?>&&class=<?= $class ?>&&term=<?= $term ?>" enctype="multipart/form-data" method="POST">
        
            <div class="form-group">
                 <label class="col-lg-5 control-label">MATA KULIAH :</label>
                 <div class="col-lg-7">
                     <select name="tc_id" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" required title="Pilih...">

                     <?php
                         $subject = mysqli_query($con, "SELECT tc.*,s.*,t.* FROM teaching tc 
                                                 INNER JOIN subject s ON tc.s_id=s.s_id
                                                 INNER JOIN teachers t ON tc.t_id=t.t_id
                                                 ");
                         while($row = mysqli_fetch_array($subject)){
                             $tc_id = $row['tc_id'];
                             $s_code = $row['s_code'];
                             $t_fnameRumi = $row['t_fnameRumi'];
                             $t_lnameRumi = $row['t_lnameRumi'];
                             $s_name = $row['s_rumiName']."&nbsp;|&nbsp".$row['s_code']."&nbsp|&nbsp".$row['t_fnameRumi']."-".$row['t_lnameRumi'];
                     ?>
                         <option value="<?= $tc_id ?>"><?= $s_name ?></option>
                     <?php
                         }
                     ?>
                     </select>
                </div>
            </div>

           <div class="form-group">
                 <div class="col-lg-10 col-lg-offset-6">
                     <button type="submit" class="btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-floppy-disk"></span> SIMPAN</button>
                 </div>
           </div>
      
        </form>
    </div>
</div>
