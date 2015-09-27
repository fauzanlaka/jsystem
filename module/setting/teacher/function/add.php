
    <h4><span class="glyphicon glyphicon-user"></span> <b>TAMBAH PENSYARAH</b></h4>
    <hr>
    <form class="form-horizontal" action="?page=setting&&settingpage=saveAdd" enctype="multipart/form-data" method="POST">
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nama-Nasab :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" placeholder="Nama" required name="t_fnameRumi">
                    </div>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" placeholder="Nasab" required name="t_lnameRumi">
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-3 control-label">نام - نسب :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" placeholder="نام" required name="t_fnameArab">
                    </div>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" placeholder="نسب" required name="t_lnameArab">
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-3 control-label">Jenis kelamin :</label>
                    <div class="col-lg-3">
                        <select class="form-control input-sm" placeholder="" required name="t_gender">
                            <option></option>
                            <option value="Lelaki">Lelaki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-3 control-label">No.Kad pengenalan :</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" required name="t_cityzenid" id="cityzenid">
                    </div>
                    <div class="col-lg-4">
                        <span class="username_avail_result" id="username_avail_result3"></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">housenumber :</label>
                    <div class="col-lg-2">
                      <input type="text" class="form-control input-sm" name="t_housenumber">
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tempat :</label>
                    <div class="col-lg-2">
                      <input type="text" class="form-control input-sm" name="t_placenumber">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Kampong :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" name="t_village">
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-3 control-label">Mukim :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" name="t_subdistrict">
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="col-lg-3 control-label">Dairah :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" name="t_district">
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-3 control-label">Wilayah :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" name="t_province">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Post :</label>
                    <div class="col-lg-3">
                      <input type="email" class="form-control input-sm" name="t_postcode">
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-3 control-label">Telpon :</label>
                    <div class="col-lg-3">
                      <input type="email" class="form-control input-sm" name="t_telephone">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email :</label>
                    <div class="col-lg-3">
                      <input type="email" class="form-control input-sm" name="t_email">
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
                      <input type="text" class="form-control input-sm" placeholder="Username" name="t_username" id="username">
                    </div>
                    <div class="col-lg-4">
                        <span class="username_avail_result" id="username_avail_result2"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Password :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" placeholder="Password" name="t_password" id="password">
                    </div>
                    <div class="col-lg-6">
                        <span class="password_strength" id="password_strength2"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">BATAL</button>
                        <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
                    </div>
                </div>
    </form>

