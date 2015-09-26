<br>
<div class="well">
    <span class="glyphicon glyphicon-user"></span> TAMBAH MAHASISWA BARU
    <div class="pull-right">
        <b>Step 1</b><font color="red"> > Step 2</font>
    </div>
    <br><br>
        <form class="form-horizontal" action="?page=student&&studentpage=saveaddstudent" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">No.Pokok :</label>
                                <div class="col-lg-3">
                                  <input type="text" class="form-control input-sm" placeholder="NOMOR POKOK" name="student_id" id="username" required>
                                </div>
                                <div class="col-lg-6">
                                    <span class="username_avail_result" id="username_avail_result"></span>
                                </div>
                            </div>
                        
                            <?php
                                $sql_y = mysqli_query($con, "SELECT * FROM year ORDER BY year");
                            ?>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tahun daftar :</label>
                                <div class="col-lg-3">
                                    <select class="form-control input-sm" name="income_year">
                                        <option></option>
                                        <?php
                                            while($row = mysqli_fetch_array($sql_y)){
                                                $year = $row['year'];
                                                $current_year = date('Y');
                                        ?>
                                        <option value="<?= $year ?>" <?php if($year==$current_year) { echo 'selected'; } ?>><?= $year ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <?php
                                $sql_f = mysqli_query($con, "SELECT * FROM fakultys");
                            ?>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Fakulti :</label>
                                <div class="col-lg-3">
                                    <select class="form-control input-sm" name="ft_id" required>
                                        <option></option>
                                            <?php
                                                while($row_f = mysqli_fetch_array($sql_f)){
                                                        $ft_id = $row_f['ft_id'];
                                                        $ft_name = str_replace("\'", "&#39;", $row_f['ft_name']);
                                            ?>
                                        <option value="<?= $ft_id ?>"><?= $ft_name ?></option>
                                            <?php
                                                }
                                            ?>
                                    </select>
                                </div>
                            </div>
                        
                            <?php
                                $sql_d = mysqli_query($con, "SELECT * FROM departments");
                            ?>
                        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Jurusan :</label>
                                <div class="col-lg-4">
                                    <select class="form-control input-sm" name="dp_id">
                                        <option></option>
                                            <?php
                                                while($row_d = mysqli_fetch_array($sql_d)){
                                                        $dp_id = $row_d['dp_id'];
                                                        $dp_name = str_replace("\'", "&#39;", $row_d['dp_name']);
                                            ?>
                                            <option value="<?= $dp_id ?>"><?= $dp_name ?></option>
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
                                <input type="text" class="form-control input-sm" name="firstname_rumi" placeholder="Nama" required>
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="lastname_rumi" placeholder="Nasab" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">نام - نسب :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="firstname_jawi" placeholder="نام" required>
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="lastname_jawi" placeholder="نسب" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Name - Lastname :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="firstname_eng" placeholder="Name" required>
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="lastname_eng" placeholder="Lastname" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Jenis kelamin</label>
                            <div class="col-lg-3">
                                <select name="gender" class="form-control input-sm" required>
                                    <option></option>
                                    <option value="Lelaki">Lelaki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">ID Kad :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="cityzen_id" placeholder="NO.Kad pengenalan">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tarihk Lahir :</label>
                            <div class="col-lg-3">
                                <input type="date" class="form-control input-sm" name="birdth_date">
                            </div>
                            <div class="col-lg-3">
                                <p class="text-danger">Contuh. 12/20/2530</p>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Penyakit pembawaan :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="disease" placeholder="Penyakit pembawaan">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nama - Nasab Bapa :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="father_name" placeholder="Nama">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="father_lastname" placeholder="Nasab">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Pekerjaan bapa :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="father_job" placeholder="Pekerjaan bapa">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nama - Nasab Ibu :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="mother_name" placeholder="Nama">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="mother_lastname" placeholder="Nasab">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Pekerjaan ibu :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="mother_job" placeholder="Pekerjaan ibu">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="email" placeholder="Email">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Telepon :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="telephone" placeholder="Telepon">
                            </div>
                        </div>
                     
                        
                    </fieldset>
                    
                    <fieldset>
                        <legend>Bahagian 2 : Sejarah pendidikan</legend>
                        <h4><b>Pendidikan agama :-</b></h4>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ibtidai dari sekolah :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="ibtidai_graduate">
                            </div>
                            <label class="col-lg-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="ibtidai_graduate_year" placeholder="Contoh : <?= date('Y')+543 ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Mutawassit dari sekolah :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="mutawasit_graduate">
                            </div>
                            <label class="col-lg-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="mutawasit_graduate_year" placeholder="Contoh : <?= date('Y')+543 ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Mutawassit dari sekolah :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="sanawi_graduate">
                            </div>
                            <label class="col-lg-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="sanawi_graduate_year" placeholder="Contoh : <?= date('Y')+543 ?>">
                            </div>
                        </div>
                        
                        <h4><b>Pendidikan akademik :-</b></h4>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">โรงเรียนประถม :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="down_graduate">
                            </div>
                            <label class="col-lg-1 control-label">ปีที่จบ</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="down_graduate_year" placeholder="Contoh : <?= date('Y')+543 ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">โรงเรียนมัธยมต้น :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="first_highschool_graduate">
                            </div>
                            <label class="col-lg-1 control-label">ปีที่จบ</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="first_highschool_graduate_year" placeholder="Contoh : <?= date('Y')+543 ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">โรงเรียนมัธยมปลาย :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="second_highschool_graduate">
                            </div>
                            <label class="col-lg-1 control-label">ปีที่จบ</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="second_highschool_graduate_year" placeholder="Contoh : <?= date('Y')+543 ?>">
                            </div>
                        </div>
                        
                    </fieldset>
                    
                    <fieldset>
                        <legend>Bahagian 3 : Pengetahuan bahasa</legend>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa melayu :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Kurang" > Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Cukup"  > Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Lancar" > Lancar
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa arab :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="arab_lang_skill" value="Kurang" > Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="arab_lang_skill" value="Cukup" > Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="arab_lang_skill" value="Lancar" > Lancar
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa engris :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Kurang"> Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Cukup"> Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Lancar"> Lancar
                                </div>
                            </div>
                        </div>
 
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa thai :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="thai_lang_skill" value="Kurang"> Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="thai_lang_skill" value="Cukup"> Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="thai_lang_skill" value="Lancar"> Lancar
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
                                    <input type="checkbox" name="certificate" value="1">   
                                 </div>
                            </div>
                         </div>
                         <div class="form-group">
                             <label class="col-lg-3 control-label">Senarai dapur :</label>
                               <div class="col-lg-2"> 
                                    <div class="checkbox">
                                        <input type="checkbox" name="citizen_book" value="1">
                                    </div>
                                </div>
                         </div>
                         <div class="form-group">
                             <label class="col-lg-3 control-label">Kad pengenalan :</label>
                             <div class="col-lg-3">
                                  <div class="checkbox">
                                       <input type="checkbox" name="id_book" value="1">
                                  </div>
                             </div>        
                         </div>
			<div class="form-group">
                            <label class="col-lg-3 control-label">Gambar 1 inci 4 keping :</label>	
                            <div class="col-lg-3">
                                <div class="checkbox">
                                     <input type="checkbox" value="1" name="photo"> 
                                </div>       
                            </div>
                        </div>	

                    </fieldset>
                    
                    <fieldset>
                        <legend>Bahagian 5 : PASSWORD</legend>
                        
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Password :</label>
                            <div class="col-lg-3">
                                <input type="password" class="form-control input-sm" name="password" required>
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
</div>
