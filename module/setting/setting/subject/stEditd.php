<?php
    $id = $_POST['id'];
    $sql = mysqli_query($con, "SELECT * FROM teaching WHERE tc_id='$id'");
    $rows = mysqli_fetch_array($sql);
    
    $s_id = $rows['s_id'];
    $t_id = $rows['t_id'];
?>
<div class="pull-left">
    <a href="?page=setting&&settingpage=stAdd" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
    <a href="?page=setting&&settingpage=st" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list-alt"></span> DAFTAR</a>
</div>
<br><br>
<div class='well'>
    <h4><span class="glyphicon glyphicon-cog"></span> <b>PENGURUSAN SABJEK</b></h4>
    <hr>
    <form class="form-horizontal" action="?page=setting&&settingpage=stEditSave" enctype="multipart/form-data" method="POST">
        
       <div class="form-group">
            <label class="col-lg-5 control-label">MATA KULIAH :</label>
            <div class="col-lg-7">
                <select name="s_id" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Pilih...">
                <?php
                    $subject = mysqli_query($con, "SELECT * FROM subject GROUP BY s_code ORDER BY s_code");
                    while($row = mysqli_fetch_array($subject)){
                ?>
                    <option value="<?= $row['s_id'] ?>" <?=$s_id == $row['s_id'] ? ' selected="selected"' : ''?>><?= $row['s_code'] ?> , <?= $row['s_rumiName'] ?></option>
                <?php
                    }
                ?>
                </select>
           </div>
       </div>
        
       <div class="form-group">
            <label class="col-lg-5 control-label">PENSYARAH :</label>
            <div class="col-lg-7">
                <select name="t_id" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Pilih...">
                <?php
                    $teacher = mysqli_query($con, "SELECT * FROM teachers ORDER BY t_fnameRumi");
                    while($row = mysqli_fetch_array($teacher)){
                ?>
                    <option value="<?= $row['t_id'] ?>" <?=$t_id == $row['t_id'] ? ' selected="selected"' : ''?>><?= $row['t_fnameRumi'] ?> - <?= $row['t_lnameRumi'] ?> , <?= $row['t_lnameArab'] ?> - <?= $row['t_fnameArab'] ?></option>
                <?php
                    }
                ?>
                </select>
           </div>
       </div>
        
       <input type="hidden" name="id" value="<?= $id ?>">
        
       <div class="form-group">
            <div class="col-lg-10 col-lg-offset-5">
                <button type="submit" class="btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-floppy-disk"></span> SIMPAN</button>
            </div>
       </div>
        
    </form>
</div>

