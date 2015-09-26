<?php
    
    //Set class system
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
    $rs_register = mysqli_fetch_array($register);
    $year_register = $rs_register['year'];
            
    $c1 = $year_register ;
    $c2 = $year_register-1;
    $c3 = $year_register-2;
    $c4 = $year_register-3;
    
    //Get faculty data
    $fakulty = mysqli_query($con, "SELECT * FROM fakultys");
    
    //Get department data
    $department = mysqli_query($con, "SELECT * FROM departments");
    
    //Get year data
    $year = mysqli_query($con, "SELECT * FROM year ORDER BY year");

    //Searching data
    $term_s = $_POST['term'];
    $year_s = $_POST['year'];
    $class_s = $_POST['class'];
    $faculty_s = $_POST['faculty'];
    $department_s = $_POST['department'];
    $status_s = $_POST['status'];
    
    if($term_s == ''){ $term_s = $_GET['term'];}
    if($year_s == ''){ $year_s = $_GET['year'];}
    if($class_s == ''){ $class_s = $_GET['class'];}
    if($faculty_s == ''){ $faculty_s = $_GET['faculty'];}
    if($department_s == ''){$department_s = $_GET['department'];}
    if($status_s == ''){$status_s = $_GET['status'];}
    
    //Set class name
    $class_check = $class_s;
    if($class_check == $c1){ $cname = '1'; }
    if($class_check == $c2){ $cname = '2'; }
    if($class_check == $c3){ $cname = '3'; }
    if($class_check == $c4){ $cname = '4'; }
    

?>

<br>
<form class="form-horizontal" action="?page=report&&reportpage=muqaddimahsearch" method="POST">
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-3">
            
            <div class="col-lg-2">
                <select class="form-control input-sm" name="year">
                    <option value="0">TAHUN</option>
                    <?php
                        while($rs_year = mysqli_fetch_array($year)){
                    ?>
                    <option value="<?= $rs_year['year'] ?>"><?= $rs_year['year'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-2">
                <select class="form-control input-sm" name="faculty">
                     <option value="0">FAKULTI</option>
                    <?php
                        while($rs_fakulty = mysqli_fetch_array($fakulty)){
                    ?> 
                    <option value="<?= $rs_fakulty['ft_id'] ?>"><?= $rs_fakulty['ft_name'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-2">
                <select class="form-control input-sm" name="department">
                    <option value="0">JURUSAN</option>
                    <?php
                        while($rs_department = mysqli_fetch_array($department)){
                    ?>
                    <option value="<?= $rs_department['dp_id']; ?>"><?= $rs_department['dp_name']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div><br><br>
        <div class="col-lg-10 col-lg-offset-5">
            <button type="submit" class="btn btn-primary btn-sm" name="save">SEARCH</button>
        </div>
    </div> 
</form>

<?php
    $pagic = "?page=report&&reportpage=muqaddimahsearch&&year=$year_s&&class=$class_s&&faculty=$faculty_s&&department=$department_s&&status=$status_s";
    $sql = "SELECT COUNT(s.student_id),s.*,m.* FROM students s 
         LEFT JOIN muqaddimah_pay m ON s.st_id=m.st_id 
         WHERE s.ft_id='$faculty_s' and s.dp_id='$department_s' and m.m_academicyear='$year_s'";
    
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_row($query);
    // Here we have the total row count
    $rows = $row[0];
    // This is the number of results we want displayed per page
    $page_rows = 8;
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
    $sql = "SELECT s.*,m.* FROM students s 
            LEFT JOIN muqaddimah_pay m ON s.st_id=m.st_id 
            WHERE s.ft_id='$faculty_s' and s.dp_id='$department_s' and s.income_year='$year_s' and m.m_academicyear='$year_s' ORDER BY s.student_id $limit";
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

        $sql_tr = mysqli_query($con, "SELECT s.*,m.* FROM students s 
                 LEFT JOIN muqaddimah_pay m ON s.st_id=m.st_id 
                 WHERE s.ft_id='$faculty_s' and s.dp_id='$department_s' and m.m_academicyear='$year_s'");
    
    $rs_tr = mysqli_num_rows($sql_tr);
    
    $fakulty_data = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$faculty_s'");
    $rs_fakultydata = mysqli_fetch_array($fakulty_data);
    $fakulty_name = $rs_fakultydata['ft_name'];
    
    $department_data = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$department_s'");
    $rs_departmentdata = mysqli_fetch_array($department_data);
    $department_name = $rs_departmentdata['dp_name'];
?>

<div class="pull-left">
        Total mahasiswa : <b><?= $rs_tr ?></b> Orang ,
        Fakulti : <b><?= $fakulty_name ?></b> , Jurusan : <b><?= $department_name ?></b> , Tahun pengajian :<b> <?= $year_s ?></b>
</div>
<div class="pull-right">
    <a href="module/report/muqaddimahprint2.php?&&year=<?= $year_s ?>&&class=<?= $class_s ?>&&faculty=<?= $faculty_s ?>&&department=<?= $department_s ?>&&status=<?= $status_s ?>" target="_blank">
        <button type="button" class="btn btn-primary btn-sm" name="save"><span class="glyphicon glyphicon-print"></span> PRINT Exell</button>
    </a>
    <a href="module/report/muqaddimahprint.php?&&year=<?= $year_s ?>&&class=<?= $class_s ?>&&faculty=<?= $faculty_s ?>&&department=<?= $department_s ?>&&status=<?= $status_s ?>" target="_blank">
        <button type="button" class="btn btn-primary btn-sm" name="save"><span class="glyphicon glyphicon-print"></span> PRINT</button>
    </a>
</div><br><br><br>
<table class="table table-striped table-hover table-responsive table-bordered ">
  <thead>
    <tr>
      <td align="center"><b>No.POKOK</b></td>
      <td align="center"><b>NAMA-NASAB</b></td>
      <td align="center"><b>نام - نسب</b></td>
      <td align="center"><b>JUMLAH DUIT</b></td>
      <td align="center"><b>TARIKH BAYAR</b></td>
      <td align="center"><b>KOD RESIT</b></td>
    </tr>
  </thead>
  <tbody>
      <?php
        while($rs_search = mysqli_fetch_array($query)){
      ?>
    <tr>
      <td align="center"><?= $rs_search['student_id'] ?></td>
      <td align="left"><?= $rs_search['firstname_rumi'] ?> - <?= $rs_search['lastname_rumi'] ?></td>
      <td align="right"><?= $rs_search['firstname_jawi'] ?> - <?= $rs_search['lastname_jawi'] ?></td>
      <td align="center"><?= $rs_search['m_money'] ?></td>
      <td align="center"><?= $rs_search['m_paydate'] ?></td>
      <td align="center"><?= $rs_search['m_reciet'] ?></td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>

<div class="pull-left">
    <div class="pagination"><?php echo $paginationCtrls; ?></div>
</div>
<div class="pull-right">
    <?= $textline2 ?>
</div>