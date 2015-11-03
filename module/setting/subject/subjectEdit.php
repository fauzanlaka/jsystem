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
    $s_faculty = str_replace("\'", "&#39;", $rs['s_faculty']);
    $s_department = str_replace("\'", "&#39;", $rs['s_department']);
    $s_detail = str_replace("\'", "&#39;", $rs['s_detail']);
?>
<br>
<div class='well'>
    <div class="pull-left">
        <h4><span class="glyphicon glyphicon-book"></span> <b>UBAH MATA KULIAH</b></h4>
    </div>
    <div class="pull-right">
        <a href="?page=setting&&settingpage=subject"><button type="submit" class="btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-chevron-left"></span> KEMBALI</button></a>
    </div>
    <br><br>
    <hr>
    <form class="form-horizontal" action="?page=setting&&settingpage=saveEditSubject&&id=<?= $id ?>" enctype="multipart/form-data" method="POST">
     
        <div class='pull-right'>
            <button type="submit" class="btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-floppy-disk"></span> SIMPAN</button>
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
            <div class="col-lg-2">
                <font color="orange"><b>RUMI</b></font>
            </div>
       </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">MATA KULIAH :</label>
            <div class="col-lg-5">
                <input type="text" class="form-control input-sm" value='<?= $s_arabName ?>' name="s_arabName">
            </div>
            <div class="col-lg-2">
                <font color="orange"><b>JAWI</b></font>
            </div>
       </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">MATA KULIAH :</label>
            <div class="col-lg-5">
                <input type="text" class="form-control input-sm" value='<?= $s_engName ?>' name="s_engName">
            </div>
            <div class="col-lg-2">
                <font color="orange"><b>INGRIS</b></font>
            </div>
       </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">MATA KULIAH :</label>
            <div class="col-lg-5">
                <input type="text" class="form-control input-sm" value='<?= $s_thaiName ?>' name="s_thaiName">
            </div>
            <div class="col-lg-2">
                <font color="orange"><b>THAI</b></font>
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
                    <option value="Fakulti" <?=$s_type == 'Fakulti' ? ' selected="selected"' : ''?>>Fakulti</option>
                    <option value="Jurusan" <?=$s_type == 'Jurusan' ? ' selected="selected"' : ''?>>Jurusan</option>
                </select>
           </div>
       </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">Fakulti :</label>
            <div class="col-lg-3">
                <select name="s_faculty" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Pilih...">
                    <?php
                        $faculty = mysqli_query($con, "SELECT * FROM fakultys");
                        while($rowFaculty = mysqli_fetch_array($faculty)){
                    ?>
                        <option value="<?= $rowFaculty['ft_id'] ?>" <?php if($rowFaculty['ft_id']==$s_faculty){echo 'selected="selected" ';} ?> ><?= $rowFaculty['ft_name'] ?></option>    
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
                        $department = mysqli_query($con, "SELECT * FROM departments");
                        while($rowDepartment = mysqli_fetch_array($department)){
                    ?>
                        <option value="<?= $rowDepartment['dp_id'] ?>" <?php if($rowDepartment['dp_id']==$s_department){echo 'selected="selected" ';} ?>><?= $rowDepartment['dp_name'] ?></option>    
                    <?php
                        }
                    ?>
                </select>
           </div>
       </div>
       
        <div class="pull-right">
            <button type="submit" class="btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-floppy-disk"></span> SIMPAN</button>
        </div>  
        <br>

    </form>
</div>
