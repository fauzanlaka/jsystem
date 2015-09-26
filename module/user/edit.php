<?php
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT * FROM user WHERE u_id='$id'");
    $rs = mysqli_fetch_array($sql);
    
    $fname = str_replace("\'", "&#39;", $rs['u_fname']);
    $lname = str_replace("\'", "&#39;", $rs['u_lname']);
    $telephone = str_replace("\'", "&#39;", $rs['u_telephone']);
    $email = str_replace("\'", "&#39;", $rs['u_email']);
    $gender = str_replace("\'", "&#39;", $rs['u_sex']);
    $status = str_replace("\'", "&#39;", $rs['u_status']);
    $username = str_replace("\'", "&#39;", $rs['u_user']);
    $password = str_replace("\'", "&#39;", $rs['u_passwod']);
?>
<br>
<div class="well">
    <form class="form-horizontal" action="?page=user&&userpage=saveedit" enctype="multipart/form-data" method="POST">
        <fieldset>
            <legend><span class="glyphicon glyphicon-edit"></span> UBAH DATA</legend>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nama-Nasab :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" placeholder="Nama" name="fname" value="<?= $fname ?>">
                    </div>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" placeholder="Nasab" name="lname" value="<?= $lname ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Telepon :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" placeholder="Telepon" name="telephone" value="<?= $telephone ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" placeholder="Email" name="email" value="<?= $email ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Jenis kelamin :</label>
                    <div class="col-lg-3">
                        <select class="form-control input-sm" placeholder="" required name="gender">
                            <option <?=$gender == '' ? ' selected="selected"' : ''?>></option>
                            <option value="Lelaki" <?=$gender == 'Lelaki' ? ' selected="selected"' : ''?>>Lelaki</option>
                            <option value="Perempuan" <?=$gender == 'Perempuan' ? ' selected="selected"' : ''?>>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Status :</label>
                    <div class="col-lg-3">
                        <select class="form-control input-sm" placeholder="" required name="status">
                            <option <?=$status == '' ? ' selected="selected"' : ''?>></option>
                            <option value="Admin" <?=$status == 'Admin' ? ' selected="selected"' : ''?>>Admin</option>
                            <option value="Amir kuliah" <?=$status == 'Amir kuliah' ? ' selected="selected"' : ''?>>Amir kuliah</option>
                            <option value="Kewangan" <?=$status == 'Kewangan' ? ' selected="selected"' : ''?>>Kewangan</option>
                            <option value="Pengurus data" <?=$status == 'Pengurus data' ? ' selected="selected"' : ''?>>Pengurus data</option>
                            <option value="Pusda" <?=$status == 'Pusda' ? ' selected="selected"' : ''?>>Pusda</option>
                        </select>
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
                      <input type="text" class="form-control input-sm" placeholder="Username" required name="username" id="username" value="<?= $username ?>">
                    </div>
                    <div class="col-lg-4">
                        <span class="username_avail_result" id="username_avail_result"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Password :</label>
                    <div class="col-lg-3">
                      <input type="password" class="form-control input-sm" placeholder="Password" required name="password" id="password" value="<?= $password ?>">
                    </div>
                    <div class="col-lg-6">
                        <span class="password_strength" id="password_strength"></span>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">BATAL</button>
                        <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
                    </div>
                </div>
        </fieldset>
    </form>
</div>