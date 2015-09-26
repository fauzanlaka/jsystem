<?php
    $sql = mysqli_query($con, "SELECT r.*,y.* FROM register_exam r INNER JOIN year y ON r.y_id=y.y_id");
?>
<br>
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <td align="center"><b>TAHUN</b></td>
      <td align="center"><b>SEMISTER</b></td>
      <td align="center"><b>AWAL DAFTAR</b></td>
      <td align="center"><b>AKHIR DAFTAR</b></td>
      <td align="center"><b>STATUS</b></td>
      <td align="center"><b>EDIT | DELETE</b></td>
    </tr>
  </thead>
  <tbody>
<?php
    while($rs = mysqli_fetch_array($sql)){
?>
    <tr>
      <td align="center"><?= $rs['year'] ?></td>
      <td align="center"><?= $rs['t_id'] ?></td>
      <td align="center"><?= $rs['start_date'] ?></td>
      <td align="center"><?= $rs['end_date'] ?></td>
      <?php 
        $status = $rs['tu_id'];
        if($status=='1'){
            $cs = "Buka";
        }else{
            $cs = "Tutup";
        }
      ?>
      <td align="center"><?= $cs ?></td>
      <td align="center"><a href="?page=register&&registerpage=editexam&&id=<?= $rs['rx_id'] ?>"><span class="glyphicon glyphicon-edit"></span></a> | <a href="?page=register&&registerpage=deleteexam&&id=<?= $rs['rx_id'] ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
<?php
    }
?>
</table>