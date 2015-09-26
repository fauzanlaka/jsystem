<?php
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT * FROM students WHERE st_id='$id'");
    $rs = mysqli_fetch_array($sql);
    
    $student_id = str_replace("\'", "&#39;", $rs['student_id']);
    $firstname_rumi = str_replace("\'", "&#39;", $rs['firstname_rumi']);
    $lastname_rumi = str_replace("\'", "&#39;", $rs['lastname_rumi']);
    $firstname_jawi = str_replace("\'", "&#39;", $rs['firstname_jawi']);
    $lastname_jawi = str_replace("\'", "&#39;", $rs['lastname_jawi']);
    $firstname_eng = str_replace("\'", "&#39;", $rs['firstname_eng']);
    $lastname_eng = str_replace("\'", "&#39;", $rs['lastname_eng']);
    $cityzen_id = str_replace("\'", "&#39;", $rs['cityzen_id']);
    $birdth_date = str_replace("\'", "&#39;", $rs['birdth_date']);
    $telephone = str_replace("\'", "&#39;", $rs['telephone']);
    $class = str_replace("\'", "&#39;", $rs['class']);
    $disease = str_replace("\'", "&#39;", $rs['disease']);
    $father_name = str_replace("\'", "&#39;", $rs['father_name']);
    $father_lastname = str_replace("\'", "&#39;", $rs['father_lastname']);
    $father_job = str_replace("\'", "&#39;", $rs['father_job']);
    $mother_name = str_replace("\'", "&#39;", $rs['mother_name']);
    $mother_lastname = str_replace("\'", "&#39;", $rs['mother_lastname']);
    $mother_job = str_replace("\'", "&#39;", $rs['mother_job']);
    $email = str_replace("\'", "&#39;", $rs['email']);
    $ibtidai_graduate = str_replace("\'", "&#39;", $rs['ibtidai_graduate']);
    $ibtidai_graduate_year = str_replace("\'", "&#39;", $rs['ibtidai_graduate_year']);
    $mutawasit_graduate = str_replace("\'", "&#39;", $rs['mutawasit_graduate']);
    $mutawasit_graduate_year = str_replace("\'", "&#39;", $rs['mutawasit_graduate_year']);
    $sanawi_graduate = str_replace("\'", "&#39;", $rs['sanawi_graduate']);
    $sanawi_graduate_year = str_replace("\'", "&#39;", $rs['sanawi_graduate_year']);
    $down_graduate = str_replace("\'", "&#39;", $rs['down_graduate']);
    $down_graduate_year = str_replace("\'", "&#39;", $rs['down_graduate_year']);
    $first_highschool_graduate = str_replace("\'", "&#39;", $rs['first_highschool_graduate']);
    $first_highschool_graduate_year = str_replace("\'", "&#39;", $rs['first_highschool_graduate_year']);
    $second_highschool_graduate = str_replace("\'", "&#39;", $rs['second_highschool_graduate']);
    $second_highschool_graduate_year = str_replace("\'", "&#39;", $rs['second_highschool_graduate_year']);
    $password = str_replace("\'", "&#39;", $rs['password']);
    $t_studentname = str_replace("\'", "&#39;", $rs['t_studentname']);
    $t_studentlastname = str_replace("\'", "&#39;", $rs['t_studentlastname']);
    $t_fathername = str_replace("\'", "&#39;", $rs['t_fathername']);
    $t_fatherlastname = str_replace("\'", "&#39;", $rs['t_fatherlastname']);
    $t_mothername = str_replace("\'", "&#39;", $rs['t_mothername']);
    $t_motherlastname = str_replace("\'", "&#39;", $rs['t_motherlastname']);
    $t_village_name = str_replace("\'", "&#39;", $rs['t_village_name']);
    $house_number = str_replace("\'", "&#39;", $rs['house_number']);
    $place = str_replace("\'", "&#39;", $rs['place']);
    $t_road = str_replace("\'", "&#39;", $rs['t_road']);
    $post = str_replace("\'", "&#39;", $rs['post']);
    $gender = str_replace("\'", "&#39;", $rs['gender']);
?>
<br>
<div class="well">
    <span class="glyphicon glyphicon-edit"></span> UBAH DATA
    <br><br>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Melayu</a></li>
        <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Thai</a></li>
        <li class=""><a href="#class" data-toggle="tab" aria-expanded="false">Ubah kelas</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="home">
            <p>
                <form class="form-horizontal" action="?page=student&&studentpage=saveeditmalaystudent" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">No.Pokok :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" placeholder="Nama" name="student_id" value="<?= $student_id ?>">
                                </div>
                            </div>
                        
                            <?php
                                $sql_y = mysqli_query($con, "SELECT * FROM year ORDER BY year");
                                $sql_s = mysqli_query($con, "SELECT income_year FROM students WHERE st_id='$id'");
                                $rs_s = mysqli_fetch_array($sql_s);
                                $data = $rs_s['income_year'];
                            ?>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tahun daftar :</label>
                                <div class="col-lg-3">
                                    <select class="form-control input-sm" name="income_year">
                                        <?php
                                            while($row = mysqli_fetch_array($sql_y)){
                                                $year = $row['year'];
                                        ?>
                                        <option value="<?= $year ?>" <?php if($data==$year){echo 'selected="selected" ';} ?> ><?= $year ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <?php
                                $sql_f = mysqli_query($con, "SELECT * FROM fakultys");
                                $sql_fs = mysqli_query($con, "SELECT ft_id FROM students WHERE st_id='$id'");
                                $rs_fs = mysqli_fetch_array($sql_fs);
                                $data_fs = $rs_fs['ft_id'];
                            ?>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Fakulti :</label>
                                <div class="col-lg-3">
                                    <select class="form-control input-sm" name="ft_id">
                                            <?php
                                                while($row_f = mysqli_fetch_array($sql_f)){
                                                        $ft_id = $row_f['ft_id'];
                                                        $ft_name = str_replace("\'", "&#39;", $row_f['ft_name']);
                                            ?>
                                            <option value="<?= $ft_id ?>" <?php if($data_fs==$ft_id){echo 'selected="selected" ';} ?> ><?= $ft_name ?></option>
                                            <?php
                                                }
                                            ?>
                                    </select>
                                </div>
                            </div>
                        
                            <?php
                                $sql_d = mysqli_query($con, "SELECT * FROM departments");
                                $sql_ds = mysqli_query($con, "SELECT dp_id FROM students WHERE st_id='$id'");
                                $rs_ds = mysqli_fetch_array($sql_ds);
                                $data_ds = $rs_ds['dp_id'];
                            ?>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Jurusan :</label>
                                <div class="col-lg-4">
                                    <select class="form-control input-sm" name="dp_id">
                                        <option value="0"></option>
                                            <?php
                                                while($row_d = mysqli_fetch_array($sql_d)){
                                                        $dp_id = $row_d['dp_id'];
                                                        $dp_name = str_replace("\'", "&#39;", $row_d['dp_name']);
                                            ?>
                                            <option value="<?= $dp_id ?>" <?php if($data_ds==$dp_id){echo 'selected="selected" ';} ?> ><?= $dp_name ?></option>
                                            <?php
                                                }
                                            ?>
                                    </select>
                                </div>
                            </div>
 
                    <fieldset>
                        <legend>Bahagian 1 : Biodata</legend>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nama - Nasab :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $firstname_rumi ?>" name="firstname_rumi">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $lastname_rumi ?>" name="lastname_rumi">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">نام - نسب :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $firstname_jawi ?>" name="firstname_jawi">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $lastname_jawi ?>" name="lastname_jawi">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Name - Lastname :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $firstname_eng ?>" name="firstname_eng">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $lastname_eng ?>" name="lastname_eng">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Jenis kelamin</label>
                            <div class="col-lg-3">
                                <select class="form-control input-sm" placeholder="" required name="gender">
                                    <option <?=$gender == '' ? ' selected="selected"' : ''?>></option>
                                    <option value="Lelaki" <?=$gender == 'Lelaki' ? ' selected="selected"' : ''?>>Lelaki</option>
                                    <option value="Perempuan" <?=$gender == 'Perempuan' ? ' selected="selected"' : ''?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">ID Kad :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $cityzen_id ?>" name="cityzen_id">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tarihk Lahir :</label>
                            <div class="col-lg-3">
                                <input type="date" class="form-control input-sm" value="<?= $birdth_date ?>" name="birdth_date">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Penyakit pembawaan :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $disease ?>" name="disease">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nama - Nasab Bapa :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $father_name ?>" name="father_name">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $father_lastname ?>" name="father_lastname">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Pekerjaan bapa :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $father_job ?>" name="father_job">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nama - Nasab Ibu :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $mother_name ?>" name="mother_name">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $mother_lastname ?>" name="mother_lastname">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Pekerjaan ibu :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $mother_job ?>" name="mother_job">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $email ?>" name="email">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Telepon :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $telephone ?>" name="telephone">
                            </div>
                        </div>
                     
                        
                    </fieldset>
                    
                    <fieldset>
                        <legend>Bahagian 2 : Sejarah pendidikan</legend>
                        <h4><b>Pendidikan agama :-</b></h4>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ibtidai dari sekolah :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $ibtidai_graduate ?>" name="ibtidai_graduate">
                            </div>
                            <label class="col-lg-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" value="<?= $ibtidai_graduate_year ?>" name="ibtidai_graduate_year">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Mutawassit dari sekolah :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $mutawasit_graduate ?>" name="mutawasit_graduate">
                            </div>
                            <label class="col-lg-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" value="<?= $mutawasit_graduate_year ?>" name="mutawasit_graduate_year">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Mutawassit dari sekolah :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $sanawi_graduate ?>" name="sanawi_graduate">
                            </div>
                            <label class="col-lg-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" value="<?= $sanawi_graduate_year ?>" name="sanawi_graduate_year">
                            </div>
                        </div>
                        
                        <h4><b>Pendidikan agama :-</b></h4>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">โรงเรียนประถม :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $down_graduate ?>" name="down_graduate">
                            </div>
                            <label class="col-lg-1 control-label">ปีที่จบ</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" value="<?= $down_graduate_year ?>" name="down_graduate_year">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">โรงเรียนมัธยมต้น :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $first_highschool_graduate ?>" name="first_highschool_graduate">
                            </div>
                            <label class="col-lg-1 control-label">ปีที่จบ</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" value="<?= $first_highschool_graduate_year ?>" name="first_highschool_graduate_year">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">โรงเรียนมัธยมปลาย :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" value="<?= $second_highschool_graduate ?>" name="second_highschool_graduate">
                            </div>
                            <label class="col-lg-1 control-label">ปีที่จบ</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" value="<?= $second_highschool_graduate_year ?>" name="second_highschool_graduate_year">
                            </div>
                        </div>
                        
                    </fieldset>
                    
                    <fieldset>
                        <legend>Bahagian 3 : Pengetahuan bahasa</legend>
                        
                        <?php
                            $chk1 = array();
                            $chk1['Kurang'] = '';
                            $chk1['Cukup'] = '';
                            $chk1['Lancar'] = '';
                                if(isset($rs['melayu_lang_skill'])){
                                    if($rs['melayu_lang_skill']=='Kurang'){
                                        $chk1['Kurang'] = 'checked="checked"';
                                        $chk1['Cukup'] = '';
                                        $chk1['Lancar'] = '';
                                    }if($rs['melayu_lang_skill']=='Cukup'){
                                        $chk1['Kurang'] = '';
                                        $chk1['Cukup'] = 'checked="checked"';
                                        $chk1['Lancar'] = '';
                                    }if($rs['melayu_lang_skill']=='Lancar'){
                                        $chk1['Kurang'] = '';
                                        $chk1['Cukup'] = '';
                                        $chk1['Lancar'] = 'checked="checked"';
                                    }
                                }
			?>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa melayu :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Kurang" <?= $chk1['Kurang']; ?> > Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Cukup" <?= $chk1['Cukup']; ?> > Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Lancar" <?= $chk1['Lancar']; ?> > Lancar
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            $chk2 = array();
                            $chk2['Kurang'] = '';
                            $chk2['Cukup'] = '';
                            $chk2['Lancar'] = '';
                                if(isset($rs['arab_lang_skill'])){
                                    if($rs['arab_lang_skill']=='Kurang'){
                                        $chk2['Kurang'] = 'checked="checked"';
                                        $chk2['Cukup'] = '';
                                        $chk2['Lancar'] = '';
                                    }if($rs['arab_lang_skill']=='Cukup'){
                                        $chk2['Kurang'] = '';
                                        $chk2['Cukup'] = 'checked="checked"';
                                        $chk2['Lancar'] = '';
                                    }if($rs['arab_lang_skill']=='Lancar'){
                                        $chk2['Kurang'] = '';
                                        $chk2['Cukup'] = '';
                                        $chk2['Lancar'] = 'checked="checked"';
                                    }
                                }
			?>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa arab :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="arab_lang_skill" value="Kurang" <?= $chk2['Kurang']; ?> > Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="arab_lang_skill" value="Cukup" <?= $chk2['Cukup']; ?> > Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="arab_lang_skill" value="Lancar" <?= $chk2['Lancar']; ?> > Lancar
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            $chk3 = array();
                            $chk3['Kurang'] = '';
                            $chk3['Cukup'] = '';
                            $chk3['Lancar'] = '';
                                if(isset($rs['ingris_lang_skill'])){
                                    if($rs['ingris_lang_skill']=='Kurang'){
                                        $chk3['Kurang'] = 'checked="checked"';
                                        $chk3['Cukup'] = '';
                                        $chk3['Lancar'] = '';
                                    }if($rs['ingris_lang_skill']=='Cukup'){
                                        $chk3['Kurang'] = '';
                                        $chk3['Cukup'] = 'checked="checked"';
                                        $chk3['Lancar'] = '';
                                    }if($rs['ingris_lang_skill']=='Lancar'){
                                        $chk3['Kurang'] = '';
                                        $chk3['Cukup'] = '';
                                        $chk3['Lancar'] = 'checked="checked"';
                                    }
                                }
			?>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa engris :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Kurang" <?= $chk3['Kurang']; ?> > Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Cukup" <?= $chk3['Cukup']; ?> > Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Lancar" <?= $chk3['Lancar']; ?> > Lancar
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            $chk4 = array();
                            $chk4['Kurang'] = '';
                            $chk4['Cukup'] = '';
                            $chk4['Lancar'] = '';
                                if(isset($rs['thai_lang_skill'])){
                                    if($rs['thai_lang_skill']=='Kurang'){
                                        $chk4['Kurang'] = 'checked="checked"';
                                        $chk4['Cukup'] = '';
                                        $chk4['Lancar'] = '';
                                    }if($rs['thai_lang_skill']=='Cukup'){
                                        $chk4['Kurang'] = '';
                                        $chk4['Cukup'] = 'checked="checked"';
                                        $chk4['Lancar'] = '';
                                    }if($rs['thai_lang_skill']=='Lancar'){
                                        $chk4['Kurang'] = '';
                                        $chk4['Cukup'] = '';
                                        $chk4['Lancar'] = 'checked="checked"';
                                    }
                                }
			?>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa thai :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="thai_lang_skill" value="Kurang" <?= $chk4['Kurang']; ?> > Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="thai_lang_skill" value="Cukup" <?= $chk4['Cukup']; ?> > Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="thai_lang_skill" value="Lancar" <?= $chk4['Lancar']; ?> > Lancar
                                </div>
                            </div>
                        </div>
                        
                    </fieldset>
                    
                    <fieldset>
                        <legend>Bahagian 4 : Persyaratan</legend>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Syahadah / Tasdik asli :</label>
                            <div class="col-lg-2">
                                <div class="checkbox">
                                    <input type="checkbox" name="certificate" value="1" <?php $select = $rs['certificate']; if($select == '1'){ echo "checked"; } ?> >   
                                 </div>
                            </div>
                         </div>
                         <div class="form-group">
                             <label class="col-lg-3 control-label">Senarai dapur :</label>
                               <div class="col-lg-2"> 
                                    <div class="checkbox">
                                        <input type="checkbox" name="citizen_book" value="1" <?php $select = $rs['citizen_book']; if($select == '1'){ echo "checked"; } ?>>
                                    </div>
                                </div>
                         </div>
                         <div class="form-group">
                             <label class="col-lg-3 control-label">Kad pengenalan :</label>
                             <div class="col-lg-3">
                                  <div class="checkbox">
                                       <input type="checkbox" name="id_book" value="1" <?php $select = $rs['id_book']; if($select == '1'){ echo "checked"; } ?> >
                                  </div>
                             </div>        
                         </div>
			<div class="form-group">
                            <label class="col-lg-3 control-label">Gambar 1 inci 4 keping :</label>	
                            <div class="col-lg-3">
                                <div class="checkbox">
                                     <input type="checkbox" value="1" name="photo" <?php $select = $rs['photo']; if($select == '1'){ echo "checked"; } ?>> 
                                </div>       
                            </div>
                        </div>	

                    </fieldset>
                    
                    <fieldset>
                        <legend>Bahagian 5 : PASSWORD</legend>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Password :</label>
                            <div class="col-lg-3">
                                <input type="password" class="form-control input-sm" value="<?= $password ?>" name="password">
                            </div>
                        </div>
                        
                    </fieldset>
                    
                    <br>
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">BATAL</button>
                            <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
                        </div>
                    </div>
            </form>
            </p>
        </div>
        <div class="tab-pane fade" id="profile">
            <p>
                <form class="form-horizontal" action="?page=student&&studentpage=saveeditthaistudent" enctype="multipart/form-data" method="POST">
                    <fieldset>
                        <legend>ส่วนที่ 1 : ข้อมูลทั่วไป</legend>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">รหัสประจำตัว :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" placeholder="Nama" name="student_id" value="<?= $student_id ?>" disabled>
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label class="col-lg-3 control-label">ชื่อ-นามสกุล :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_studentname" value="<?= $t_studentname ?>">
                                </div>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_studentlastname" value="<?= $t_studentlastname ?>">
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
                                $sql_ps = mysqli_query($con, "SELECT t_province FROM students WHERE st_id='$id'");
                                $rs_ps = mysqli_fetch_array($sql_ps);
                                $data_ps = $rs_ps['t_province'];
                            ?>
                    
                            <div class="form-group">
                                <label class="col-lg-3 control-label">สถานที่เกิด(จังหวัด) :</label>
                                <div class="col-lg-3">
                                    <select name="t_province" class="form-control input-sm">
                                        <option></option>
                                        <?php
                                            while($rs_p=  mysqli_fetch_array($sql_p)){
                                                $data_p = $rs_p['PROVINCE_ID'];
                                        ?>
                                        <option value="<?= $data_p ?>" <?php if($data_p==$data_ps){echo 'selected="selected"';} ?> ><?= $rs_p['PROVINCE_NAME'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label class="col-lg-3 control-label">ชื่อ-สกุล บิดา :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_fathername" value="<?= $t_fathername ?>">
                                </div>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_fatherlastname" value="<?= $t_fatherlastname ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">ชื่อ-สกุล มารดา :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_mothername" value="<?= $t_mothername ?>">
                                </div>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_motherlastname" value="<?= $t_motherlastname ?>">
                                </div>
                            </div>
                        
                    </fieldset>
                    
                    <fieldset>
                        <legend>ส่วนที่ 2 : ที่อยู่</legend>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">หมู่บ้าน :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_village_name" value="<?= $t_village_name ?>">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">บ้านเลขที่ :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="house_number" value="<?= $house_number ?>">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">หมู่ที่ :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="place" value="<?= $place ?>">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">ถนน :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="t_road" value="<?= $t_road ?>">
                                </div>
                            </div>
                        
                            <?php
                                $sql_dis = mysqli_query($con, "SELECT DISTRICT_ID,DISTRICT_NAME FROM district");
                                $sql_diss = mysqli_query($con, "SELECT t_subdistrict FROM students WHERE st_id='$id'");
                                $rs_diss = mysqli_fetch_array($sql_diss);
                                $data_diss = $rs_diss['t_subdistrict'];
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
                                        <option value="<?= $data_dis ?>" <?php if($data_dis==$data_diss){echo 'selected="selected"';} ?>><?= $rs_dis['DISTRICT_NAME'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        
                            <?php
                                $sql_amp = mysqli_query($con, "SELECT * FROM amphur");
                                $sql_amps = mysqli_query($con, "SELECT t_district FROM students WHERE st_id='$id'");
                                $rs_amps = mysqli_fetch_array($sql_amps);
                                $data_amps = $rs_amps['t_district'];
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
                                        <option value="<?= $data_amp ?>" <?php if($data_amp==$data_amps){echo 'selected="selected"';} ?>><?= $rs_amp['AMPHUR_NAME'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        
                            <?php
                                $sql_pr = mysqli_query($con, "SELECT * FROM province");
                                $sql_prs = mysqli_query($con, "SELECT t_province_sec FROM students WHERE st_id='$id'");
                                $rs_prs = mysqli_fetch_array($sql_prs);
                                $data_prs = $rs_prs['t_province_sec'];
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
                                        <option value="<?= $data_pr ?>" <?php if($data_pr==$data_prs){echo 'selected="selected"';} ?>><?= $rs_pr['PROVINCE_NAME'] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">รหัสไปรษณีย์ :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" name="post" value="<?= $post ?>">
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
            </p>
        </div>
        
        <div class="tab-pane fade" id="class">
            <br>
                <form class="form-horizontal" action="?page=student&&studentpage=saveclass" enctype="multipart/form-data" method="POST">
                    <?php
                          //Set year 
                          $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
                          $rs_register = mysqli_fetch_array($register);
                          $cyear = $rs_register['year'];
                            
                          //$cyear = date("Y");
                          //Datangkan kelas masuk belajar
                          $first = $cyear; 
                          $second = $cyear-1;
                          $third  = $cyear-2;
                          $fordth = $cyear-3;
                          //Kelas sekarang
                          $kelas = $class;
                          if($kelas == $first){ $cnow = '1'; }
                          if($kelas == $second){ $cnow = '2'; }
                          if($kelas == $third){ $cnow = '3'; }
                          if($kelas == $fordth){ $cnow = '4'; }
                    ?>
                        
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Kela sekarang :</label>
                        <div class="col-lg-1">
                            <label class="col-lg-1 control-label"><?= $cnow ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Ubah kelas :</label>
                        <div class="col-lg-2">
                             <select class="form-control input-sm" name="class">
                                 <option></option>
                                 <option value="<?= $first ?>">1</option>
                                 <option value="<?= $second ?>">2</option>
                                 <option value="<?= $third ?>">3</option>
                                 <option value="<?= $fordth ?>">4</option>
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
    </div> 
    
</div>