<?php
    
    //Set class system
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register_exam r INNER JOIN year y ON r.y_id=y.y_id WHERE r.rx_id=(SELECT MAX(rx_id) FROM register_exam)");
    $rs_register = mysqli_fetch_array($register);
    $year_register = $rs_register['year'];

    $cy = $current_year; /*Current year are receive from max of re_id in register_exam table*/
            
    $c1 = $year_register ;
    $c2 = $year_register-1;
    $c3 = $year_register-2;
    $c4 = $year_register-3;
    
    //Get faculty data
    $fakulty = mysqli_query($con, "SELECT * FROM fakultys");
    
    //Get department data
    $department = mysqli_query($con, "SELECT * FROM departments");
    
    //Get year data
    $year = mysqli_query($con, "SELECT * FROM year ORDER BY year");

?>

<br>
<form class="form-horizontal" action="?page=report&&reportpage=examsearch" method="POST">
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-1">
            
            <div class="col-lg-2">
                <select class="form-control input-sm" name="term">
                    <option value="0">SEMESTER</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <div class="col-lg-2">
                <select class="form-control input-sm" name="year">
                    <option value="0">TAHUN</option>
                    <?php
                        while($rs_year = mysqli_fetch_array($year)){
                    ?>
                    <option value="<?= $rs_year['year'] ?>"><?= $rs_year['year'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-2">
                <select class="form-control input-sm" name="class">
                    <option value="0">KELAS</option>
                    <option value="<?= $c1 ?>">1</option>
                    <option value="<?= $c2 ?>">2</option>
                    <option value="<?= $c3 ?>">3</option>
                    <option value="<?= $c4 ?>">4</option>
                </select>
            </div>
            <div class="col-lg-2">
                <select class="form-control input-sm" name="faculty">
                     <option value="0">FAKULTI</option>
                    <?php
                        while($rs_fakulty = mysqli_fetch_array($fakulty)){
                    ?> 
                    <option value="<?= $rs_fakulty['ft_id'] ?>"><?= $rs_fakulty['ft_name'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-2">
                <select class="form-control input-sm" name="department">
                    <option value="0">JURUSAN</option>
                    <?php
                        while($rs_department = mysqli_fetch_array($department)){
                    ?>
                    <option value="<?= $rs_department['dp_id']; ?>"><?= $rs_department['dp_name']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
             <div class="col-lg-2">
                <select class="form-control input-sm" name="status">
                    <option value="0">STATUS</option>
                    <option value="1">Semua</option>
                    <option value="Sudah bayar">Sudah bayar</option>
                    <option value="Belum bayar">Belum bayar</option>
                </select>
            </div>
        </div>
        </div>
        <div class="col-lg-10 col-lg-offset-5">
            <button type="submit" class="btn btn-primary btn-sm" name="save">SEARCH</button>
        </div>
    </div> 
</form>