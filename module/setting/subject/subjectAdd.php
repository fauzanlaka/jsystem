<?php
    $sql =  mysqli_query($con, "SELECT * FROM fakultys");
?>
<br>
<div class='well'>
    <h4><span class="glyphicon glyphicon-book"></span> <b>TAMBAH MATA KULIAH</b></h4>
    <hr>
    <form class="form-horizontal" action="?page=setting&&settingpage=saveSubject" enctype="multipart/form-data" method="POST">
     
        <div class='pull-right'>
                    <button type="reset" class="btn btn-default btn-sm">BATAL</button>
                    <button type="submit" class="btn btn-primary btn-sm" name="save">SIMPAN</button>
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">KODE :</label>
            <div class="col-lg-3">
                <input type="text" class="form-control input-sm" placeholder="KODE MATA KULIAH" required name="s_code" id='subjectCode'>
            </div>
            <div class="col-lg-4">
                <span class="username_avail_result" id="subjectCode_avail_result"></span>
            </div>
       </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">MATA KULIAH :</label>
            <div class="col-lg-5">
                <input type="text" class="form-control input-sm" placeholder="RUMI" required name="s_rumiName">
            </div>
       </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">MATA KULIAH :</label>
            <div class="col-lg-5">
                <input type="text" class="form-control input-sm" placeholder="ARAB" name="s_arabName">
            </div>
       </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">MATA KULIAH :</label>
            <div class="col-lg-5">
                <input type="text" class="form-control input-sm" placeholder="INGRIS" name="s_engName">
            </div>
       </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">MATA KULIAH :</label>
            <div class="col-lg-5">
                <input type="text" class="form-control input-sm" placeholder="THAI" required name="s_thaiName">
            </div>
       </div>
        
       <div class="form-group">
            <label class="col-lg-2 control-label">DETIL :</label>
            <div class="col-lg-10">
                <textarea id="p_post" name="s_detail" class="form-control" rows="8" style="width:100%" required>		
                </textarea>
            </div>
       </div>
        
       <div class="form-group">
            <label class="col-lg-2 control-label">JENIS :</label>
            <div class="col-lg-3">
                <select name="s_type" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Pilih...">
                    <option value="Jamiah">Jamiah</option>
                    <option value="Kuliah">Kuliah</option>
                </select>
           </div>
       </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">KULIAH :</label>
            <div class="col-lg-3">
                <select name="s_type" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Pilih...">
                <?php
                    while($row = mysqli_fetch_array($sql)){
                ?>
                    <option value="<?= $row['ft_id'] ?>"><?= $row['ft_name'] ?></option>
                <?php
                    }
                ?>
                </select>
           </div>
       </div>
        
       <div class="form-group">
            <div class="col-lg-10 col-lg-offset-10">
                <button type="reset" class="btn btn-default btn-sm">BATAL</button>
                <button type="submit" class="btn btn-primary btn-sm" name="save">SIMPAN</button>
            </div>
       </div>
        
    </form>
</div>
