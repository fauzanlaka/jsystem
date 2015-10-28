<?php
    $id = $_GET['id'];
    
    $sql = mysqli_query($con, "SELECT * FROM teachers WHERE t_id='$id'");
    $rs = mysqli_fetch_array($sql);
    
    $t_fnameRumi = str_replace("\'", "&#39;", $rs['t_fnameRumi']);
    $t_lnameRumi = str_replace("\'", "&#39;", $rs['t_lnameRumi']);
    $t_fnameArab = str_replace("\'", "&#39;", $rs['t_fnameArab']);
    $t_lnameArab = str_replace("\'", "&#39;", $rs['t_lnameArab']);
    $gender = str_replace("\'", "&#39;", $rs['t_gender']);
    $t_cityzenid = str_replace("\'", "&#39;", $rs['t_cityzenid']);
    $t_housenumber = str_replace("\'", "&#39;", $rs['t_housenumber']);
    $t_placenumber = str_replace("\'", "&#39;", $rs['t_placenumber']);
    $t_village = str_replace("\'", "&#39;", $rs['t_village']);
    $t_subdistrict = str_replace("\'", "&#39;", $rs['t_subdistrict']);
    $t_district = str_replace("\'", "&#39;", $rs['t_district']);
    $t_province = str_replace("\'", "&#39;", $rs['t_province']);
    $t_postcode = str_replace("\'", "&#39;", $rs['t_postcode']);
    $t_telephone = str_replace("\'", "&#39;", $rs['t_telephone']);
    $t_email = str_replace("\'", "&#39;", $rs['t_email']);
    $t_username = str_replace("\'", "&#39;", $rs['t_username']);
    $t_password = str_replace("\'", "&#39;", $rs['t_password']);
?>
<br>
<div class='well'>
    <div class="pull-right">
        <a href="?page=setting&&settingpage=teacher"><button type="submit" class="btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-chevron-left"></span> KEMBALI</button></a>
    </div>
    <h4><span class="glyphicon glyphicon-edit"></span> <b>UBAH DATA PENSYARAH</b></h4>
    <hr>
    <form class="form-horizontal" action="?page=setting&&settingpage=saveEditTeacher&&id=<?= $id ?>" enctype="multipart/form-data" method="POST">
                
                <div class='pull-right'>
                    <button type="submit" class="btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-floppy-disk"></span> SIMPAN</button>
                </div> 
        
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nama-Nasab :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" value="<?= $t_fnameRumi ?>" required name="t_fnameRumi" >
                    </div>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" value="<?= $t_lnameRumi  ?>" required name="t_lnameRumi">
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-3 control-label">نام - نسب :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" value="<?= $t_fnameArab  ?>" name="t_fnameArab">
                    </div>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" value="<?= $t_lnameArab  ?>" name="t_lnameArab">
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-3 control-label">Jenis kelamin :</label>
                    <div class="col-lg-3">
                        <select class="form-control input-sm" placeholder="" required name="t_gender">
                            <option></option>
                            <option value="Lelaki" <?=$gender == 'Lelaki' ? ' selected="selected"' : ''?>>Lelaki</option>
                            <option value="Perempuan" <?=$gender == 'Perempuan' ? ' selected="selected"' : ''?> >Perempuan</option>
                        </select>
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-3 control-label">No.Kad pengenalan :</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" value="<?= $t_cityzenid ?>" name="t_cityzenid" id="cityzenid">
                    </div>
                    <div class="col-lg-4">
                        <span class="username_avail_result" id="username_avail_result3"></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">housenumber :</label>
                    <div class="col-lg-2">
                      <input type="text" class="form-control input-sm" value="<?= $t_housenumber ?>" name="t_housenumber">
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tempat :</label>
                    <div class="col-lg-2">
                      <input type="text" class="form-control input-sm" value="<?= $t_placenumber ?>" name="t_placenumber">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Kampong :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" value="<?= $t_village ?>" name="t_village">
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-3 control-label">Mukim :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" value="<?= $t_subdistrict ?>" name="t_subdistrict">
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="col-lg-3 control-label">Dairah :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" value="<?= $t_district ?>" name="t_district">
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-3 control-label">Wilayah :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" value="<?= $t_village ?>" name="t_province">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Post :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" value="<?= $t_postcode ?>" name="t_postcode">
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-3 control-label">Telpon :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" value="<?= $t_telephone ?>" name="t_telephone">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email :</label>
                    <div class="col-lg-3">
                      <input type="email" class="form-control input-sm" value="<?= $t_email ?>" name="t_email">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Gambar :</label>
                    <div class="col-lg-3">
                      <input type="file" name="image" class="form-control input-sm">
                    </div>
                    <div class="col-lg-3">
                        <p class="text-warning">*Bisa di tinggal</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Username :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" value="<?= $t_username ?>" name="t_username" id="username">
                    </div>
                    <div class="col-lg-4">
                        <span class="username_avail_result" id="username_avail_result2"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Password :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" value="<?= $t_password ?>" name="t_password" id="password">
                    </div>
                    <div class="col-lg-6">
                        <span class="password_strength" id="password_strength2"></span>
                    </div>
                </div>
        
                <div class='pull-right'>
                    <button type="submit" class="btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-floppy-disk"></span> SIMPAN</button>
                </div>
        <br>
    </form>
</div>
    
