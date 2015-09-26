<?php
    $id = $_GET['id'];
    
    $sql = mysqli_query($con, "SELECT * FROM students WHERE st_id='$id'");
    $rs = mysqli_fetch_array($sql);
    
    $student_id = str_replace("\'", "&#39;", $rs['student_id']);
    $cityzen_id = str_replace("\'", "&#39;", $rs['cityzen_id']);
?>
<br>
<div class="well">
    <span class="glyphicon glyphicon-user"> Tambah mahasiswa baru</span>
    <div class="pull-right"><font color="red"><b>Step 1</b></font> > <b>Step 2</b></div>
    <br><br>
    <form class="form-horizontal" action="?page=student&&studentpage=saveaddthaistudent" enctype="multipart/form-data" method="POST">
                    <fieldset>
                        <legend>ส่วนที่ 1 : ข้อมูลทั่วไป</legend>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">รหัสประจำตัว :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="student_id" value="<?= $student_id ?>" disabled>
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label class="col-lg-3 control-label">ชื่อ-นามสกุล :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_studentname" required>
                                </div>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_studentlastname" required>
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label class="col-lg-3 control-label">เลขประจำตัวประชาชน :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="cityzen_id" value="<?= $cityzen_id ?>" disabled>
                                </div>
                            </div>
                    
                            <?php
                                $sql_p = mysqli_query($con, "SELECT * FROM province");
                            ?>
                    
                            <div class="form-group">
                                <label class="col-lg-3 control-label">สถานที่เกิด(จังหวัด) :</label>
                                <div class="col-lg-3">
                                    <select name="t_province" class="form-control input-sm" required>
                                        <option></option>
                                        <?php
                                            while($rs_p=  mysqli_fetch_array($sql_p)){
                                                $data_p = $rs_p['PROVINCE_ID'];
                                        ?>
                                        <option value="<?= $data_p ?>"><?= $rs_p['PROVINCE_NAME'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label class="col-lg-3 control-label">ชื่อ-สกุล บิดา :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_fathername">
                                </div>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_fatherlastname">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">ชื่อ-สกุล มารดา :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_mothername">
                                </div>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_motherlastname">
                                </div>
                            </div>
                        
                    </fieldset>
                    
                    <fieldset>
                        <legend>ส่วนที่ 2 : ที่อยู่</legend>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">หมู่บ้าน :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_village_name">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">บ้านเลขที่ :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="house_number">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">หมู่ที่ :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="place">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">ถนน :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_road">
                                </div>
                            </div>
                        
                            <?php
                                $sql_dis = mysqli_query($con, "SELECT DISTRICT_ID,DISTRICT_NAME FROM district");
                            ?>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">ตำบล :</label>
                                <div class="col-lg-3">
                                    <select name="t_subdistrict" class="form-control input-sm">
                                        <option></option>
                                        <?php
                                            while($rs_dis = mysqli_fetch_array($sql_dis)){
                                                $data_dis = $rs_dis['DISTRICT_ID'];   
                                        ?>
                                        <option value="<?= $data_dis ?>"><?= $rs_dis['DISTRICT_NAME'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        
                            <?php
                                $sql_amp = mysqli_query($con, "SELECT * FROM amphur");
                            ?>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">อำเภอ :</label>
                                <div class="col-lg-3">
                                    <select name="t_district" class="form-control input-sm">
                                        <option></option>
                                        <?php
                                            while($rs_amp = mysqli_fetch_array($sql_amp)){
                                                $data_amp = $rs_amp['AMPHUR_ID'];     
                                        ?>
                                        <option value="<?= $data_amp ?>"><?= $rs_amp['AMPHUR_NAME'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        
                            <?php
                                $sql_pr = mysqli_query($con, "SELECT * FROM province");
                            ?>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">จังหวัด :</label>
                                <div class="col-lg-3">
                                    <select name="t_province_sec" class="form-control input-sm">
                                        <option></option>
                                        <?php
                                            while($rs_pr = mysqli_fetch_array($sql_pr)){
                                                $data_pr = $rs_pr['PROVINCE_ID'];
                                                
                                        ?>
                                        <option value="<?= $data_pr ?>"><?= $rs_pr['PROVINCE_NAME'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">รหัสไปรษณีย์ :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="post">
                                </div>
                            </div>
                        
                    </fieldset>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">BATAL</button>
                            <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
                        </div>
                    </div>
                            
                </form>
</div>