
<h4><span class="glyphicon glyphicon-check"></span> BAYAR MUQADDIMAH CALON TRANSFER</h4>
<?php
    $pagic = "?page=admissions&&admissionpage=transfermuqaddimah";
    $sql = "SELECT COUNT(st_id) FROM pretest WHERE payStatus='1' AND type='1'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_row($query);
    // Here we have the total row count
    $rows = $row[0];
    // This is the number of results we want displayed per page
    $page_rows = 7;
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
    $sql = "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE payStatus='1' AND type='1' ORDER BY regNumber $limit";
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
<div class="pull-left">
        <form class="navbar-form" role="search" action="?page=admissions&&admissionpage=muqaddimahTransferSearch" method="post">
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
        //$student = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id ORDER BY regNumber");
        while($result = mysqli_fetch_array($query)){
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
            <a href="?page=admissions&&admissionpage=transferPayment&&st_id=<?= $id ?>" class="btn <?= $btnAlert ?> btn-sm"><span class="<?= $glpAlert ?>"></span> <?= $content ?></a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="pagination"><?php echo $paginationCtrls; ?></div>
