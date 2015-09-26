<br>
<div class="well">
    <form class="form-horizontal" action="?page=user&&userpage=saveadd" enctype="multipart/form-data" method="POST">
        <fieldset>
            <legend><span class="glyphicon glyphicon-user"></span> TAMBAH PENGGUNA BARU</legend>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nama-Nasab :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" placeholder="Nama" required name="fname">
                    </div>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" placeholder="Nasab" required name="lname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Telepon :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" placeholder="Telepon" required name="telephone">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email :</label>
                    <div class="col-lg-3">
                      <input type="email" class="form-control input-sm" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Jenis kelamin :</label>
                    <div class="col-lg-3">
                        <select class="form-control input-sm" placeholder="" required name="gender">
                            <option></option>
                            <option value="Lelaki">Lelaki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Status :</label>
                    <div class="col-lg-3">
                        <select class="form-control input-sm" placeholder="" required name="status">
                            <option></option>
                            <option value="Admin">Admin</option>
                            <option value="Amir kuliah">Amir kuliah</option>
                            <option value="Kewangan">Kewangan</option>
                            <option value="Pengurus data">Pengurus data</option>
                            <option value="Pusda">Pusda</option>
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
                      <input type="text" class="form-control input-sm" placeholder="Username" required name="username" id="username">
                    </div>
                    <div class="col-lg-4">
                        <span class="username_avail_result" id="username_avail_result1"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Password :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" placeholder="Password" required name="password" id="password">
                    </div>
                    <div class="col-lg-6">
                        <span class="password_strength" id="password_strength"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">BATAL</button>
                        <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
                    </div>
                </div>
        </fieldset>
    </form>
</div>