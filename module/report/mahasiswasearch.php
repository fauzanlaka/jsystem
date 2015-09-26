<?php

    //Searching data
    $class_s = $_POST['class'];
    $faculty_s = $_POST['faculty'];
    $department_s = $_POST['department'];
    
    if($class_s == ''){ $class_s = $_GET['class'];}
    if($faculty_s == ''){ $faculty_s = $_GET['faculty'];}
    if($department_s == ''){$department_s = $_GET['department'];}
    
    //Set class system
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
    $rs_register = mysqli_fetch_array($register);
    $year_register = $rs_register['year'];

    $cy = $current_year; /*Current year are receive from max of re_id in register table*/
            
    $c1 = $year_register ;
    $c2 = $year_register-1;
    $c3 = $year_register-2;
    $c4 = $year_register-3;
    
    //Set class name
    $class_check = $class_s;
    if($class_check == $c1){ $cname = '1'; }
    if($class_check == $c2){ $cname = '2'; }
    if($class_check == $c3){ $cname = '3'; }
    if($class_check == $c4){ $cname = '4'; }

    //Get faculty data
    $fakulty = mysqli_query($con, "SELECT * FROM fakultys");
    //$rs_faculty_name = mysqli_fetch_array($fakulty);
    
    //Get department data
    $department = mysqli_query($con, "SELECT * FROM departments");
    //$rs_department_name = mysqli_fetch_array($department);
    
    //Get faculty name
    $fakulty_name = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$faculty_s'");
    $rs_faculty_name = mysqli_fetch_array($fakulty_name);
    
    //Get department name
    $department_name = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$department_s'");
    $rs_department_name = mysqli_fetch_array($department_name);
?>

<br>
<form class="form-horizontal" action="?page=report&&reportpage=mahasiswasearch" method="POST">
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-4">
            <div class="col-lg-2">
                <select class="form-control input-sm" name="class">
                    <option value="0">KELAS</option>
                    <option value="<?= $c1 ?>">1</option>
                    <option value="<?= $c2 ?>">2</option>
                    <option value="<?= $c3 ?>">3</option>
                    <option value="<?= $c4 ?>">4</option>
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
        </div>
        </div>
        <div class="col-lg-10 col-lg-offset-6">
            <button type="submit" class="btn btn-primary btn-sm" name="save">SEARCH</button>
        </div>
</form><br><br>

<?php
    $pagic = "?page=report&&reportpage=mahasiswasearch&&class=$class_s&&faculty=$faculty_s&&department=$department_s";
    $sql = "SELECT COUNT(s.student_id),s.*,f.*,d.*,m.* FROM students s 
            INNER JOIN fakultys f ON s.ft_id=f.ft_id
            INNER JOIN departments d ON s.dp_id=d.dp_id
            INNER JOIN muqaddimah_pay m ON s.st_id=m.st_id
            WHERE s.class='$class_s' and f.ft_id='$faculty_s' and d.dp_id='$department_s' and m.m_academicyear='$class_s'";
         
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
    $sql = "SELECT s.*,f.*,d.*,m.* FROM students s 
            INNER JOIN fakultys f ON s.ft_id=f.ft_id
            INNER JOIN departments d ON s.dp_id=d.dp_id
            INNER JOIN muqaddimah_pay m ON s.st_id=m.st_id
            WHERE s.class='$class_s' and f.ft_id='$faculty_s' and d.dp_id='$department_s' and m.m_academicyear='$class_s' ORDER BY s.student_id DESC $limit";
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
    <p class="text-info"><b>Kelas :</b> <?= $cname ?> , <b>Fakulti :</b> <?= $rs_faculty_name['ft_name']  ?> , <b>Jurusan :</b> <?= $rs_department_name['dp_name'] ?></p>
</div>
<div class="pull-right">
    <a href="module/report/mahasiswaprint2.php?class=<?= $class_s ?>&&faculty=<?= $faculty_s ?>&&department=<?= $department_s ?>" target='_blank'>
        <button type="button" class="btn btn-primary btn-sm" name="save"><span class="glyphicon glyphicon-print"></span> PRINT Exell</button>
    </a>
    <a href="module/report/mahasiswaprint.php?class=<?= $class_s ?>&&faculty=<?= $faculty_s ?>&&department=<?= $department_s ?>" target='_blank'>
        <button type="button" class="btn btn-primary btn-sm" name="save"><span class="glyphicon glyphicon-print"></span> PRINT</button>
    </a>
</div>
<br><br>
<table class="table table-striped table-hover table-responsive table-bordered ">
  <thead>
    <tr>
      <td align="center"><b>No.POKOK</b></td>
      <td align="center"><b>NAMA-NASAB</b></td>
      <td align="center"><b>FAKULTI</b></td>
      <td align="center"><b>نام - نسب</b></td>
    </tr>
  </thead>
  <tbody>
      <?php
        while($rs_search = mysqli_fetch_array($query)){
            $st_id = $rs_search['st_id'];
            
      ?>
    <tr>
      <td align="center"><?= $rs_search['student_id'] ?></td>
      <td align="left"><?= $rs_search['firstname_rumi'] ?> - <?= $rs_search['lastname_rumi'] ?></td>
      <td align="center"><?= $rs_search['ft_name'] ?></td>
      <td align="right"><?= $rs_search['lastname_jawi'] ?> - <?= $rs_search['firstname_jawi'] ?></td>
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
