<?php
    $id = $_GET['id'];
    
    $sql = mysqli_query($con, "SELECT * FROM subject WHERE s_id='$id'");
    $rs = mysqli_fetch_array($sql);
    
    $ft_id = str_replace("\'", "&#39;", $rs['ft_id']);
    $s_code = str_replace("\'", "&#39;", $rs['s_code']);
    $s_arabName = str_replace("\'", "&#39;", $rs['s_arabName']);
    $s_rumiName = str_replace("\'", "&#39;", $rs['s_rumiName']);
    $s_engName = str_replace("\'", "&#39;", $rs['s_engName']);
    $s_thaiName = str_replace("\'", "&#39;", $rs['s_thaiName']);
    $s_type = str_replace("\'", "&#39;", $rs['s_type']);
    $s_detail = str_replace("\'", "&#39;", $rs['s_detail']);
?>
<br>
<div class='well'>
    <div class="pull-left">
        <h4><span class="glyphicon glyphicon-book"></span> <b>UBAH MATA KULIAH</b></h4>
    </div>
    <div class="pull-right">
        <a href="?page=setting&&settingpage=subject"><button type="submit" class="btn btn-primary btn-sm" name="save"><span class="glyphicon glyphicon-chevron-left"></span> KEMBALI</button></a>
    </div>
    <br><br>
    <hr>
    <form class="form-horizontal" action="?page=setting&&settingpage=saveEditSubject&&id=<?= $id ?>" enctype="multipart/form-data" method="POST">
     
        <div class='pull-right'>
            <button type="submit" class="btn btn-primary btn-sm" name="save">SIMPAN</button>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">KODE :</label>
            <div class="col-lg-3">
                <input type="text" class="form-control input-sm" value='<?= $s_code ?>' name="s_code" id='subjectCode'>
            </div>
            <div class="col-lg-4">
                <span class="username_avail_result" id="subjectCode_avail_result"></span>
            </div>
       </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">MATA KULIAH :</label>
            <div class="col-lg-5">
                <input type="text" class="form-control input-sm" value='<?= $s_rumiName ?>' name="s_rumiName">
            </div>
       </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">MATA KULIAH :</label>
            <div class="col-lg-5">
                <input type="text" class="form-control input-sm" value='<?= $s_arabName ?>' name="s_arabName">
            </div>
       </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">MATA KULIAH :</label>
            <div class="col-lg-5">
                <input type="text" class="form-control input-sm" value='<?= $s_engName ?>' name="s_engName">
            </div>
       </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">MATA KULIAH :</label>
            <div class="col-lg-5">
                <input type="text" class="form-control input-sm" value='<?= $s_thaiName ?>' name="s_thaiName">
            </div>
       </div>
        
       <div class="form-group">
            <label class="col-lg-2 control-label">DETIL :</label>
            <div class="col-lg-10">
                <textarea id="p_post" name="s_detail" class="form-control" rows="8" style="width:100%" required>		
                    <?= $s_detail ?>
                </textarea>
            </div>
       </div>
        
       <div class="form-group">
            <label class="col-lg-2 control-label">JENIS :</label>
            <div class="col-lg-3">
                <select name="s_type" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Pilih...">
                    <option value="Jamiah" <?=$s_type == 'Jamiah' ? ' selected="selected"' : ''?>>Jamiah</option>
                    <option value="Kuliah" <?=$s_type == 'Kuliah' ? ' selected="selected"' : ''?>>Kuliah</option>
                </select>
           </div>
       </div>
        
       <div class="form-group">
            <label class="col-lg-2 control-label">KULIAH :</label>
            <div class="col-lg-3">
                <select name="ft_id" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Pilih...">
                    <option></option>
                    <?php
                    $faculty = mysqli_query($con, "SELECT * FROM fakultys");
                    while($row = mysqli_fetch_array($faculty)){
                ?>
                    <option value="<?= $row['ft_id'] ?>" <?=$ft_id == $row["ft_id"] ? ' selected="selected"' : ''?>><?= $row['ft_name'] ?></option>
                <?php
                    }
                ?>
                </select>
           </div>
       </div>
       
        <div class="pull-right">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm" name="save">SIMPAN</button>
            </div>
        </div>  
        <br>

    </form>
</div>
