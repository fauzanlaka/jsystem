<?php
    $faculty =  mysqli_query($con, "SELECT * FROM fakultys");
    
    $department = mysqli_query($con, "SELECT * FROM departments");
?>
<br>
<div class='well'>
    <div class="pull-left">
        <h4><span class="glyphicon glyphicon-book"></span> <b>TAMBAH MATA KULIAH</b></h4>
    </div>
    <div class="pull-right">
        <a href="?page=setting&&settingpage=subject"><button type="submit" class="btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-chevron-left"></span> KEMBALI</button></a>
    </div>
    <br><br>
    <hr>
    <form class="form-horizontal" action="?page=setting&&settingpage=saveSubject" enctype="multipart/form-data" method="POST">
     
        <div class='pull-right'>
            <button type="reset" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-remove"></span>  BATAL</button>
            <button type="submit" class="btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-floppy-disk"></span> SIMPAN</button>
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
                <input type="text" class="form-control input-sm" placeholder="RUMI" name="s_rumiName">
            </div>
       </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">MATA KULIAH :</label>
            <div class="col-lg-5">
                <input type="text" class="form-control input-sm" placeholder="JAWI" name="s_arabName">
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
                <input type="text" class="form-control input-sm" placeholder="THAI" name="s_thaiName">
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
                    <option value="Fakulti">Fakulti</option>
                    <option value="Jurusan">Jurusan</option>
                </select>
           </div>
       </div>
        
      <div class="form-group">
            <label class="col-lg-2 control-label">Fakulti :</label>
            <div class="col-lg-3">
                <select name="s_faculty" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Pilih...">
                    <?php
                        while($rowFaculty = mysqli_fetch_array($faculty)){
                    ?>
                        <option value="<?= $rowFaculty['ft_id'] ?>"><?= $rowFaculty['ft_name'] ?></option>    
                    <?php
                        }
                    ?>
                </select>
           </div>
       </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Jurusan :</label>
            <div class="col-lg-3">
                <select name="s_department" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Pilih...">
                    <?php
                        while($rowDepartment = mysqli_fetch_array($department)){
                    ?>
                        <option value="<?= $rowDepartment['dp_id'] ?>"><?= $rowDepartment['dp_name'] ?></option>    
                    <?php
                        }
                    ?>
                </select>
           </div>
       </div>
        
        <div class="pull-right">  
            <button type="reset" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-remove"></span> BATAL</button>
            <button type="submit" class="btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-floppy-disk"></span> SIMPAN</button>
        </div>
        <br><br>
    </form>
</div>
