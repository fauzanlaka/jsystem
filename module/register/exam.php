<br>
<div class="well">
    <span class="glyphicon glyphicon-check"></span> DAFTAR PERIKSA
    
    <form class="form-horizontal" action="?page=register&&registerpage=saveexam" enctype="multipart/form-data" method="POST">
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Tahun pengajian :</label>
                <?php 
                    $year = mysqli_query($con, "SELECT * FROM year ORDER BY year");
                    $c_year = date('Y');
                ?>
            
                <div class="col-lg-2">
                    <select name="year" class="form-control input-sm">
                        <?php
                            while ($rs_y = mysqli_fetch_array($year)){
                        ?>
                        <option value="<?= $rs_y['y_id'] ?>" <?php if($rs_y['year']==$c_year) { echo 'selected'; } ?>><?= $rs_y['year'] ?></option>
                        <?php
                            }
                        ?>
                    </select> 
                </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Semister :</label>
            <div class="col-lg-2">
                <select name="semester" class="form-control input-sm" required>
                    <option></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Awal daftar :</label>
            <div class="col-lg-3">
                <input type="date" name="start_date" class="form-control input-sm" required>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Akhir daftar :</label>
            <div class="col-lg-3">
                <input type="date" name="end_date" class="form-control input-sm" required>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Harga daftar :</label>
            <div class="col-lg-3">
                <input type="number" name="prize" class="form-control input-sm" required>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Status :</label>
            <div class="col-lg-2">
                <select name="status" class="form-control input-sm" reqiured>
                    <option value="1">Buka</option>
                    <option value="2">Tutup</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">BATAL</button>
                <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
            </div>
        </div>
        
    </form>
    
</div>
