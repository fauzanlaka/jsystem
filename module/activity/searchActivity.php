<?php
    $q = $_POST['q'];
    
    $sql = "SELECT st.*,ac.*,ft.* FROM students st
            JOIN activity ac on st.st_id=ac.st_id 
            JOIN fakultys ft ON st.ft_id=ft.ft_id
            WHERE student_id='$q' OR firstname_rumi LIKE '%".$q."%' OR firstname_jawi LIKE '%".$q."%' OR cityzen_id='$q'
            ORDER BY a_id DESC $limit";
    $query = mysqli_query($con, $sql);
?>
<div class="pull-right">
        <form class="navbar-form" role="search" action="?page=activity&&activitypage=searchActivity" method="post">
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
        <td align="center"><b>KEGIATAN</b></td>
        <td align="center"><b>TARIKH / MASA</b></td>
        <td align="center"><b>HAPUS</b></td>
      </tr>
    </thead>
    <tbody>
<?php
    while($row = mysqli_fetch_array($query)){
        $id = $row['st_id'];
        $a_id = $row['a_id'];
        $student_id = $row['student_id'];
        $fname = str_replace("\'", "&#39;", $row["firstname_rumi"]);
        $lname = str_replace("\'", "&#39;", $row["lastname_rumi"]);
        $fname_j = str_replace("\'", "&#39;", $row["firstname_jawi"]);
        $lname_j = str_replace("\'", "&#39;", $row["lastname_jawi"]);
        $faculty = str_replace("\'", "&#39;", $row["ft_name"]);
        $telephone = str_replace("\'", "&#39;", $row["telephone"]);
        $activityDate = str_replace("\'", "&#39;", $row["a_activityDate"]);
        $activityTime = str_replace("\'", "&#39;", $row["activityTime"]);
        $activityType = str_replace("\'", "&#39;", $row["a_activityType"]);
?>
        <tr>
          <td align="center"><a href="?page=activity&&activitypage=addActivity&&id=<?= $id ?>"><?= $student_id ?></a></td>
          <td><?= strtoupper($fname) ?> - <?= strtoupper($lname) ?></td>
          <td align="right"><?= strtoupper($fname_j) ?> - <?= strtoupper($lname_j) ?></td>
          <td><?= $faculty ?></td>
          <td align="center"><?= $activityType ?></td>
          <td align="center"><?= $activityDate ?> / <?= $activityTime ?></td>
          <td align="center"><a href="?page=activity&&activitypage=delete&&id=<?= $a_id ?>" onclick="return confirm('Anda yakin untuk hapus data ini ?')"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
<?php
    }
?>
    </tbody>
</table> 
<div class="pagination"><?php echo $paginationCtrls; ?></div>
