<?php
    $q = $_POST['q'];
    $sql = "SELECT tc.*,s.*,t.* FROM teaching tc
            INNER JOIN subject s ON tc.s_id=s.s_id
            INNER JOIN teachers t ON tc.t_id=t.t_id 
            WHERE s.s_code LIKE '%".$q."%' OR s.s_rumiName LIKE '%".$q."%' OR s.s_thaiName LIKE '%".$q."%' OR s.s_arabName LIKE '%".$q."%' OR t.t_code LIKE '%".$q."%' OR t.t_fnameRumi LIKE '%".$q."%' OR t_fnameArab LIKE '%".$q."%'";
    $query = mysqli_query($con, $sql);
?>
<br>
<div class="pull-left">
    <a href="?page=setting&&settingpage=stAdd" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
    <a href="?page=setting&&settingpage=st" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-list-alt"></span> DAFTAR</a>
</div>

<div class="pull-right">
        <form class="navbar-form" role="search" action="?page=setting&&settingpage=stSearch" method="post">
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
        <td align="center"><b>NAMA MATA KULIAH</b></td>
        <td align="center"><b>PENSYARAH</b></td>
        <td align="center"><b>JENIS</b></td>
        <td align="center"><b>UBAH | HAPUS</b></td>
      </tr>
    </thead>
    <tbody>
<?php
    while($row = mysqli_fetch_array($query)){
        $id = $row['tc_id'];
        $s_code = $row['s_code'];
        $s_rumiName = str_replace("\'", "&#39;", $row["s_rumiName"]);
        $s_arabName = str_replace("\'", "&#39;", $row["s_arabName"]);
        $t_fnameRumi = str_replace("\'", "&#39;", $row["t_fnameRumi"]);
        $t_lnameRumi = str_replace("\'", "&#39;", $row["t_lnameRumi"]);
        $t_fnameArab = str_replace("\'", "&#39;", $row["t_fnameArab"]);
        $t_lnameArab = str_replace("\'", "&#39;", $row["t_lnameArab"]);
        $s_type = str_replace("\'", "&#39;", $row["s_type"]);
?>
        <tr>
          <td align="center"><?= $s_code ?></td>
          <td align='left'><?= $s_rumiName ?></td>
          <td align="left"><?= $t_fnameRumi ?> - <?= $t_lnameRumi ?> , <?= $t_fnameArab ?> - <?= $t_lnameArab ?></td>
          <td align='center'><?= $s_type ?></td>
          <td align="center"><a href="?page=setting&&settingpage=stEdit&&id=<?= $id ?>" ><span class="glyphicon glyphicon-edit"></span></a> | <a href="?page=setting&&settingpage=stDelete&&id=<?= $id ?>" onclick="return confirm('Anda yakin untuk hapus data ini ?')"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
<?php
    }
?>
    </tbody>
</table> 
