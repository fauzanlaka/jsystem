<?php
    $id = $_GET['id'];
    
    //$student_id = $rs['student_id'];
    $student_data = mysqli_query($con, "SELECT st.*,ft.*,dp.* FROM students st
                  INNER JOIN fakultys ft ON st.ft_id=ft.ft_id
                  INNER JOIN departments dp ON st.dp_id=dp.dp_id
                  WHERE st.st_id='$id'
                  ");
    $rs_data_student = mysqli_fetch_array($student_data);
    $ft_name = str_replace("\'", "&#39;", $rs_data_student['ft_name']);
    $f_name = str_replace("\'", "&#39;", $rs_data_student['firstname_rumi']);
    $l_name = str_replace("\'", "&#39;", $rs_data_student['lastname_rumi']);
    
    //Get term and academic year
    $sql = mysqli_query($con, "SELECT r.*,y.* FROM register r
            INNER JOIN year y ON r.y_id=y.y_id
            WHERE re_id = (SELECT MAX(re_id) FROM register)
            ");
    $result = mysqli_fetch_array($sql);
    $term = $result['term_id'];
    $year = $result['year'];

    $timestamp = time() ;

?>
<br>
<div class="well">
    <span class="glyphicon glyphicon-import"></span> <b>TAMBAH DATA KEGIATAN</b>
    <hr>
    
    <form class="form-horizontal" action="?page=activity&&activitypage=saveAddActivity" enctype="multipart/form-data" method="POST">
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>NO.POKOK :</b><font color="green"><b> <?= $rs_data_student['student_id'] ?></b></font></p>
            </div>
            <div class="col-lg-6">
                <p><b>FAKULTI :</b><font color="green"> <?= $ft_name ?></font></p>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-6">
                <p><b>NAMA - NASAB :</b><font color="green"> <?= $f_name ?> - <?= $l_name ?></font></p>
            </div>
            <div class="col-lg-6">
                <p><b>JURUSAN :</b> <font color="green"><?= $rs_data_student['dp_name'] ?></font></p>
            </div>
        </div>
        
        <hr>
        <div class="form-group">
                <label class="col-lg-4 control-label">CREDIT KEGIATAN :</label> 
                <div class="col-lg-3">
                    <input name="credit" class="form-control input-sm" type="number" value="1">
                </div>    
        </div>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">JENIS KEGIATAN :</label> 
                <div class="col-lg-3">
                    <select name="activityType" class="form-control input-sm" required>
                        <option></option>
                        <option valeu="PUSDA">PUSDA</option>
                        <option value="KOMPUTER">KOMPUTER</option>
                        <option value="LAIN-LAIN">LAIN-LAIN</option>
                    </select>
                </div>    
        </div>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">TARIKH :</label> 
                <div class="col-lg-3">
                    <input name="activityDate" class="form-control input-sm" type="date" value="<?= date('Y-m-d') ?>">
                </div>    
        </div>
        
        <div class="form-group">
                <label class="col-lg-4 control-label">MASA :</label> 
                <div class="col-lg-3">
                    <input name="activityTime" class="form-control input-sm" type="datetime" value="<?= date('h:i:s a', time()) ?>">
                </div>    
        </div>
        
        <input type="hidden" name="term" value="<?= $term ?>">
        <input type="hidden" name="year" value="<?= $year ?>">
        <input type="hidden" name="st_id" value="<?= $id ?>"> 
        
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-5">
                <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
            </div>
        </div>
        
    </form>
</div>

