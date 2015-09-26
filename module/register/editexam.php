<?php
    $id = $_GET['id'];
    
    $sql = mysqli_query($con, "SELECT * FROM register_exam WHERE rx_id='$id'");
    $rs = mysqli_fetch_array($sql);
    
    $term = $rs['t_id'];
    $status = $rs['tu_id'];
?>
<br>
<div class="well">
    <span class="glyphicon glyphicon-edit"></span> UBAH DATA
    
    <form class="form-horizontal" action="?page=register&&registerpage=saveeditexam" enctype="multipart/form-data" method="POST">
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Tahun pengajian :</label>
                <?php 
                    $year_y = mysqli_query($con, "SELECT * FROM year ORDER BY year");
                    $year_s = mysqli_query($con, "SELECT * FROM register_exam WHERE rx_id='$id'");
                    $rs_s = mysqli_fetch_array($year_s);
                    $data_s = $rs_s['y_id'];
                ?>
            
                <div class="col-lg-2">
                    <select name="year" class="form-control input-sm" disabled>
                        <?php
                            while ($rs_y = mysqli_fetch_array($year_y)){
                                $data_y = $rs_y['y_id'];
                        ?>
                        <option value="<?= $rs_y['y_id'] ?>" <?php if($data_y==$data_s) { echo 'selected'; } ?>><?= $rs_y['year'] ?></option>
                        <?php
                            }
                        ?>
                    </select> 
                </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Semister :</label>
            <div class="col-lg-2">
                <select name="semester" class="form-control input-sm" disabled>
                    <option value="1" <?= $term == '1' ? ' selected="selected"' : ''?>>1</option>
                    <option value="2" <?= $term == '2' ? ' selected="selected"' : ''?>>2</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Awal daftar :</label>
            <div class="col-lg-3">
                <input type="date" name="start_date" class="form-control input-sm" value="<?= $rs['start_date'] ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Akhir daftar :</label>
            <div class="col-lg-3">
                <input type="date" name="end_date" class="form-control input-sm" value="<?= $rs['end_date'] ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Harga daftar :</label>
            <div class="col-lg-3">
                <input type="number" name="prize" class="form-control input-sm" value="<?= $rs['prize'] ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-lg-3 control-label">Status :</label>
            <div class="col-lg-2">
                <select name="status" class="form-control input-sm" reqiured>
                    <option value="1" <?= $status == '1' ? ' selected="selected"' : ''?>>Buka</option>
                    <option value="2" <?= $status == '2' ? ' selected="selected"' : ''?>>Tutup</option>
                </select>
            </div>
        </div>
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">BATAL</button>
                <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
            </div>
        </div>
        
    </form>
    
</div>
