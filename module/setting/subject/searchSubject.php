<?php
    $q = $_POST['q'];
    $sql = "SELECT * FROM subject WHERE s_code LIKE '%".$q."%' OR s_rumiName LIKE '%".$q."%' OR s_thaiName LIKE '%".$q."%' OR s_arabName LIKE '%".$q."%'";
    $query = mysqli_query($con, $sql);
?>
<br>
<div class="pull-left">
    <a href="?page=setting&&settingpage=subjectAdd" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
</div>
<div class="pull-right">
        <form class="navbar-form" role="search" action="?page=setting&&settingpage=searchSubject" method="post">
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
        <td align="center"><b>NAMA MATA KULIAH</b></td>
        <td align="center"><b>JENIS</b></td>
        <td align="center"><b>UBAH</b></td>
      </tr>
    </thead>
    <tbody>
<?php
    while($row = mysqli_fetch_array($query)){
        $id = $row['s_id'];
        $s_code = $row['s_code'];
        $s_rumiName = str_replace("\'", "&#39;", $row["s_rumiName"]);
        $s_arabName = str_replace("\'", "&#39;", $row["s_arabName"]);
        $s_type = str_replace("\'", "&#39;", $row["s_type"]);
?>
        <tr>
          <td align="center"><?= $s_code ?></td>
          <td align='left'><?= $s_rumiName ?></td>
          <td align="right"><?= $s_arabName ?></td>
          <td align='center'><?= $s_type ?></td>
          <td align="center"><a href="?page=setting&&settingpage=subjectEdit&&id=<?= $id ?>" ><span class="glyphicon glyphicon-edit"></span></a></td>
        </tr>
<?php
    }
?>
    </tbody>
</table> 