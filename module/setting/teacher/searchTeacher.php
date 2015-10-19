<?php
    $q = $_POST['q'];
    $sql = "SELECT * FROM teachers WHERE t_code LIKE '%".$q."%' OR t_fnameArab LIKE '%".$q."%' OR t_fnameRumi LIKE '%".$q."%'";
    $query = mysqli_query($con, $sql);
?>
<br>
<div class="pull-left">
    <a href="?page=setting&&settingpage=teacherAdd" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
</div>
<div class="pull-right">
        <form class="navbar-form" role="search" action="?page=setting&&settingpage=searchTeacher" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="q" required>
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
            </div>
        </form>
</div>

<table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <td align="center"><b>KODE</b></td>
        <td align="center"><b>NAMA-NASAB</b></td>
        <td align="center"><b>نام - نسب</b></td>
        <td align="center"><b>EMAIL</b></td>
        <td align="center"><b>TELEPON</b></td>
        <td align="center"><b>UBAH</b></td>
      </tr>
    </thead>
    <tbody>
<?php
    while($row = mysqli_fetch_array($query)){
        $id = $row['t_id'];
        $code = $row['t_code'];
        $fname = str_replace("\'", "&#39;", $row["t_fnameRumi"]);
        $lname = str_replace("\'", "&#39;", $row["t_lnameRumi"]);
        $fname_j = str_replace("\'", "&#39;", $row["t_fnameArab"]);
        $lname_j = str_replace("\'", "&#39;", $row["t_lnameArab"]);
        $faculty = str_replace("\'", "&#39;", $row["t_email"]);
        $telephone = str_replace("\'", "&#39;", $row["t_telephone"]);
?>
        <tr>
          <td align="center"><?= $code ?></td>
          <td><?= strtoupper($fname) ?> - <?= strtoupper($lname) ?></td>
          <td align="right"><?= strtoupper($fname_j) ?> - <?= strtoupper($lname_j) ?></td>
          <td><?= $faculty ?></td>
          <td align="center"><?= $telephone ?></td>
          <td align="center"><a href="?page=setting&&settingpage=editTeacher&&id=<?= $id ?>" ><span class="glyphicon glyphicon-edit"></span></a></td>
        </tr>
<?php
    }
?>
    </tbody>
</table> 
