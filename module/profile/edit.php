<?php
    $status = $_SESSION["status"];
    $id = $_SESSION["UserID"];
    if($status == 'Pensyarah'){
        $sql = mysqli_query($con, "SELECT * FROM teachers WHERE t_id='$id'");
        $rs = mysqli_fetch_array($sql);
        $fname = str_replace("\'", "&#39;", $rs['t_fnameRumi']);
        $lname = str_replace("\'", "&#39;", $rs['t_lnameRumi']);
        $telephone = str_replace("\'", "&#39;", $rs['t_telephone']);
        $email = str_replace("\'", "&#39;", $rs['t_email']);
        $gender = str_replace("\'", "&#39;", $rs['t_gender']);
        $status = str_replace("\'", "&#39;", $rs['t_status']);
        $username = str_replace("\'", "&#39;", $rs['t_username']);
        $password = str_replace("\'", "&#39;", $rs['t_password']);
    }else{
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
    }
    //echo $status;
?>
<h5><span class="glyphicon glyphicon-edit"></span> <b>UBAH DATA</b></h5>
<hr>
    <form class="form-horizontal" action="?page=profile&&profilepage=saveedit" enctype="multipart/form-data" method="POST">
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
                <input type="hidden" name="type" value="<?= $status ?>">
                <p class="text-center">
                        <button type="submit" class="btn btn-success btn-sm" name="save">SIMPAN</button>
                </p>
                <hr>
    </form>
