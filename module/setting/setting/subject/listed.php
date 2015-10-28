<div class="pull-left">
    <a href="?page=setting&&settingpage=stAdd" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH</a>
    <a href="?page=setting&&settingpage=st" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list-alt"></span> DAFTAR</a>
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

<?php
    $pagic = "?page=setting&&settingpage=st";
    $sql = "SELECT COUNT(tc_id) FROM teaching";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_row($query);
    // Here we have the total row count
    $rows = $row[0];
    // This is the number of results we want displayed per page
    $page_rows = 10;
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
    $sql = "SELECT tc.*,s.*,t.* FROM teaching tc 
            INNER JOIN subject s ON tc.s_id=s.s_id
            INNER JOIN teachers t ON tc.t_id=t.t_id
            ORDER BY tc.tc_id DESC $limit";
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
<div class="pagination"><?php echo $paginationCtrls; ?></div>
