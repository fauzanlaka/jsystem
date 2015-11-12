
<!-- Stadent table's data -->
<table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <td align="center"><b>NO.POKOK</b></td>
        <td align="center"><b>NAMA-NASAB</b></td>
        <td align="center"><b>نام - نسب</b></td>
        <td align="center"><b>FAKULTI</b></td>
        <td align="center"><b>TELEPON</b></td>
      </tr>
    </thead>
    <tbody>
<?php
        $q = $_POST['q'];
        $sql = mysqli_query($con, "SELECT st.*,ft.* FROM students st INNER JOIN fakultys ft on st.ft_id=ft.ft_id WHERE student_id='$q' OR firstname_rumi LIKE '%".$q."%' OR firstname_jawi LIKE '%".$q."%' OR cityzen_id='$q' ORDER BY st_id DESC");
        $row = mysqli_fetch_array($sql);
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
          <td align="center"><a href="?page=dol&&dolpage=query&&id=<?= $id ?>"><?= $student_id ?></a></td>
          <td><?= strtoupper($fname) ?> - <?= strtoupper($lname) ?></td>
          <td align="right"><?= strtoupper($fname_j) ?> - <?= strtoupper($lname_j) ?></td>
          <td><?= $faculty ?></td>
          <td align="center"><?= $telephone ?></td>
        </tr>
    </tbody>
</table> 
