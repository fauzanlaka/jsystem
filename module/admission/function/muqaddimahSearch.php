<h4><span class="glyphicon glyphicon-check"></span> BAYAR MUQADDIMAH CALON TAHUN 1</h4>
<div class="pull-left">
        <form class="navbar-form" role="search" action="?page=admissions&&admissionpage=muqaddimahSearch" method="post">
            <div class="input-group">
                <input type="text" class="form-control input-sm" name="q" required>
            <div class="input-group-btn">
                <button class="btn btn-success btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
            </div>
        </form>
</div>
<table class="table table-striped table-hover">
    <tr>
        <td align="center"><b>NO.Daftar</b></td>
        <td align="center"><b>NAMA-NASAB</b></td>
        <td align="center"><div id="subText"><b>نام - نسب</b></div></td>
        <td align="center"><b>KAD PENGENALAN</b></td>
        <td align="center"><b>JENIS KELAMIN</b></td>
        <td align="center"><b>STATUS</b></td>
    </tr>
    <?php
        $q = $_POST['q'];
        $sql = mysqli_query($con , "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE (s.firstname_rumi LIKE '%".$q."%' OR s.firstname_jawi LIKE '%".$q."%' OR s.t_studentname LIKE '%".$q."%' OR s.cityzen_id ='$q' OR p.regNumber = '$q') AND payStatus='1' AND type='0'");
        while($result = mysqli_fetch_array($sql)){
            $id = $result['st_id'];
            $fname = str_replace("\'", "&#39;",$result['firstname_rumi']);
            $lname = str_replace("\'", "&#39;",$result['lastname_rumi']);
            $fnameJ = str_replace("\'", "&#39;",$result['firstname_jawi']);
            $lnameJ = str_replace("\'", "&#39;",$result['lastname_jawi']);
            $status = str_replace("\'", "&#39;",$result['muqaddimah']);
            $cityzen_id = $result['cityzen_id'];
            $gender = $result['gender'];
            
            //status set
            if($status == 0 ){
                $status = "<font color='red'><b>"."TIDAK CALON"."</b></font>";
                $btnAlert = "btn-danger";
                $glpAlert = "glyphicon glyphicon-exclamation-sign";
                $content = "BELUM";
            }else{
                $status = "<font color='green'><b>"."CALON"."</b></font>";
                $btnAlert = "btn-success";
                $glpAlert = "glyphicon glyphicon-ok";
                $content = "BAYAR";
            }
    ?>
    <tr>
        <td align="center"><?= $result['regNumber'] ?></td>
        <td align="center"><?= $fname ?> - <?= $lname ?></td>
        <td align="center"><div id="subText"><?= $fnameJ ?> - <?= $lnameJ ?></div></td>
        <td align="center"><?= $cityzen_id ?></td>
        <td align="center"><?= $gender ?></td>
        <td align="center">
            <a href="?page=admissions&&admissionpage=payment&&st_id=<?= $id ?>" class="btn <?= $btnAlert ?> btn-sm"><span class="<?= $glpAlert ?>"></span> <?= $content ?></a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>

