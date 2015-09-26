<?php
    $q = $_POST['q'];
    $sql = "SELECT st.*,ft.* FROM students st INNER JOIN fakultys ft on st.ft_id=ft.ft_id WHERE student_id='$q' OR firstname_rumi LIKE '%".$q."%' OR firstname_jawi LIKE '%".$q."%' OR cityzen_id='$q' ORDER BY st_id DESC";
    $query = mysqli_query($con, $sql);
?>
<div class="pull-right">
        <form class="navbar-form" role="search" action="?page=student&&studentpage=search" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="q" required>
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
            </div>
        </form>
</div>
<br>
<table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <td align="center"><b>NO.POKOK</b></td>
        <td align="center"><b>NAMA-NASAB</b></td>
        <td align="center"><b>نام - نسب</b></td>
        <td align="center"><b>FAKULTI</b></td>
        <td align="center"><b>TELEPON</b></td>
        <td align="center"><b>DELETE</b></td>
      </tr>
    </thead>
    <tbody>
<?php
    while($row = mysqli_fetch_array($query)){
        $id = $row['st_id'];
        $student_id = $row['student_id'];
        $fname = str_replace("\'", "&#39;", $row["firstname_rumi"]);
        $lname = str_replace("\'", "&#39;", $row["lastname_rumi"]);
        $fname_j = str_replace("\'", "&#39;", $row["firstname_jawi"]);
        $lname_j = str_replace("\'", "&#39;", $row["lastname_jawi"]);
        $faculty = str_replace("\'", "&#39;", $row["ft_name"]);
        $telephone = str_replace("\'", "&#39;", $row["telephone"]);
?>
        <tr>
          <td align="center"><a href="?page=student&&studentpage=edit&&id=<?= $id ?>"><?= $student_id ?></a></td>
          <td><?= strtoupper($fname) ?> - <?= strtoupper($lname) ?></td>
          <td align="right"><?= strtoupper($fname_j) ?> - <?= strtoupper($lname_j) ?></td>
          <td><?= $faculty ?></td>
          <td align="center"><?= $telephone ?></td>
          <td align="center"><a href="?page=student&&studentpage=delete&&id=<?= $id ?>" onclick="return confirm('Anda yakin untuk hapus data ini ?')"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
<?php
    }
?>
    </tbody>
</table> 
