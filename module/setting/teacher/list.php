<br>
<div class="pull-left">
    <a href="?page=setting&&settingpage=teacherAdd" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
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


<?php
    $pagic = "?page=setting&&settingpage=teacher";
    $sql = "SELECT COUNT(t_id) FROM teachers";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_row($query);
    // Here we have the total row count
    $rows = $row[0];
    // This is the number of results we want displayed per page
    $page_rows = 9;
    // This tells us the page number of our last page
    $last = ceil($rows/$page_rows);
    // This makes sure $last cannot be less than 1
    if($last < 1){
            $last = 1;
    }
    // Establish the $pagenum variable
    $pagenum = 1;
    // Get pagenum from URL vars if it is present, else it is = 1
    if(isset($_GET['pn'])){
            $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
    }
    // This makes sure the page number isn't below 1, or more than our $last page
    if ($pagenum < 1) { 
        $pagenum = 1; 
    } else if ($pagenum > $last) { 
        $pagenum = $last; 
    }
    // This sets the range of rows to query for the chosen $pagenum
    $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
    // This is your query again, it is for grabbing just one page worth of rows by applying $limit
    $sql = "SELECT * FROM teachers ORDER BY t_id DESC $limit";
    $query = mysqli_query($con, $sql);
    // This shows the user what page they are on, and the total number of pages
    $textline1 = "จำนวน(<b>$rows</b>)";
    $textline2 = "Laman <b>$pagenum</b> Dari semua <b>$last</b>";
    // Establish the $paginationCtrls variable
    $paginationCtrls = '';
    // If there is more than 1 page worth of results
    if($last != 1){
            /* First we check if we are on page one. If we are then we don't need a link to 
               the previous page or the first page so we do nothing. If we aren't then we
               generate links to the first page, and to the previous page. */
            if ($pagenum > 1) {
            $previous = $pagenum - 1;

                    $paginationCtrls .= '<a href="'.$pagic.'&&pn='.$previous.'"><<</a> &nbsp; &nbsp; ';
                    // Render clickable number links that should appear on the left of the target page number
                    for($i = $pagenum-4; $i < $pagenum; $i++){
                            if($i > 0){
                            $paginationCtrls .= '<a href="'.$pagic.'&&pn='.$i.'">'.$i.'</a> &nbsp; ';
                            }
                }
        }
            // Render the target page number, but without it being a link
            $paginationCtrls .= ''.$pagenum.' &nbsp; ';
            // Render clickable number links that should appear on the right of the target page number
            for($i = $pagenum+1; $i <= $last; $i++){
                    $paginationCtrls .= '<a href="'.$pagic.'&&pn='.$i.'">'.$i.'</a> &nbsp; ';
                    if($i >= $pagenum+4){
                            break;
                    }
            }
            // This does the same as above, only checking if we are on the last page, and then generating the "Next"
        if ($pagenum != $last) {
            $next = $pagenum + 1;
            $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$pagic.'&&pn='.$next.'">>></a> ';
        }
    }
    $list = '';
?>

<br><br>
<?= $textline2 ?>
<table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <td align="center"><b>KODE</b></td>
        <td align="center"><b>NAMA-NASAB</b></td>
        <td align="center"><b>نام - نسب</b></td>
        <td align="center"><b>EMAIL</b></td>
        <td align="center"><b>TELEPON</b></td>
        <td align="center"><b>UBAH / HAPUS</b></td>
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
<div class="pagination"><?php echo $paginationCtrls; ?></div>
