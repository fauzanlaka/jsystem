<?php
        //Get teachers data
        $id = $_SESSION['UserID'];
        $strSQL = "SELECT * FROM teachers WHERE t_id = '$id'";
        $objQuery = mysqli_query($con,$strSQL);
        $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
        $objResult['t_id'];
        
        //Get subject data
        $subject = mysqli_query($con, "SELECT tc.*,s.* FROM teaching tc
                                INNER JOIN subject s ON tc.s_id=s.s_id
                                WHERE tc.t_id='$id'");
        
        //Get faculty data
        $faculty = mysqli_query($con, "SELECT * FROM fakultys");
?>

<br>
<div class='well'>
    <h4><span class="glyphicon glyphicon-book"></span> <b>HASIL PERKULIAHAN MAHASISWA</b></h4>
    <hr>
    <form class="form-horizontal" action="?page=setting&&settingpage=saveSubject" enctype="multipart/form-data" method="POST">
 
        <div class="form-group">
        
            <div class="col-lg-10 col-lg-offset-1">
            
                <div class="col-lg-2">
                    <select name="subject" class="form-control input-sm">
                        <option>SEMESTER</option>
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>

                <div class="col-lg-2">
                    <select name="subject" class="form-control input-sm">
                        <option>KELAS</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>

                <div class="col-lg-2">
                    <select name="subject" class="form-control input-sm">
                        <option>KULIAH</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>

                <div class="col-lg-2">
                    <select name="subject" class="form-control input-sm">
                        <option>JURUSAN</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>

                <div class="col-lg-3">
                    <select name="subject" class="form-control input-sm">
                        <option>MATA KULIAH</option>
                        <?php
                            while($rowSubject = mysqli_fetch_array($subject)){
                        ?>
                        <option value="<?= $rowSubject['s_id'] ?>"><?= $rowSubject['s_code'] ?> , <?= $rowSubject['s_rumiName'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

            </div>
            
        </div>
        
           
         <div class="form-group">  
            <div class="col-lg-10 col-lg-offset-5">
                <button type="reset" class="btn btn-default btn-sm">BATAL</button>
                <button type="submit" class="btn btn-primary btn-sm" name="save">SIMPAN</button>
            </div>
        </div>
        
    </form>
</div>
