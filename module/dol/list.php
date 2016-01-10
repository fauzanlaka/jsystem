<b>MAHAISWA YANG SUDAH DAFTAR DUL</b>
<br>
<!-- Stadent table's data -->
<?php
    $pagic = "?page=dol&&dolpage=main";
    $sql = "SELECT COUNT(dr_id) FROM dulRegister";
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
    $sql = "SELECT st.*,ft.*,dr.* FROM students st INNER JOIN fakultys ft on st.ft_id=ft.ft_id INNER JOIN dulRegister dr ON st.st_id=dr.st_id ORDER BY dr_id DESC $limit";
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
<font color="grey"><?= $textline2 ?></font>
<table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <td align="center"><b>NO.POKOK</b></td>
        <td align="center"><b>NAMA-NASAB</b></td>
        <td align="center"><b>FAKULTI</b></td>
        <td align="center"><b>TELEPON</b></td>
        <td align="center"><b>HARGA</b></td>
        <td align="center"><b>TARIKH DAFTAR</b></td>
        <td align="center"><b>KOD DAFTAR</b></td>
        <td align="center"><b>AKSI</b></td>
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
        $date = $row["dulDate"];
        $money = $row["sumMoney"];
        $dulCode = $row['dulCode'];
        $dr_id =  $row['dr_id'];
?>
        <tr>
          <td align="center"><?= $student_id ?></td>
          <td><?= strtoupper($fname) ?> - <?= strtoupper($lname) ?></td>
          <td><?= $faculty ?></td>
          <td align="center"><?= $telephone ?></td>
          <td align="center"><?= $money ?> ฿.</td>
          <td align="center"><?= $date ?></td>
          <td align="center"><?= $dulCode ?></td>
          <!-- Modal showing -->
          <td align="center">
              <a href="#" data-toggle="modal" data-target="#myModal<?php echo $dr_id ?>">
                  <span class="glyphicon glyphicon-book"></span>
              </a>
                |
              <a href="module/dol/dulPrint.php?id=<?= $dr_id ?>&&st_id=<?= $id ?>" target="_blank"><span class="glyphicon glyphicon-print"></span></a>
                |
              <a href="?page=dol&&search=list&&dolpage=listDelete&&id=<?= $dr_id ?>" onclick="return confirm('Anda yakin untuk hapus data ini ?')"><span class="glyphicon glyphicon-remove"></span></a>

          </td>
          
                        <!-- Modal form -->
                        <div class="modal fade" id="myModal<?php echo $dr_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $dr_id ?>">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel<?php echo $dr_id ?>"><?= $dulCode ?></h4>
                              </div>
                              <div class="modal-body">
                                  <form class="form-horizontal" action="?page=dol&&search=list&&dolpage=scoreSave" enctype="multipart/form-data" method="POST">
                                    <div class="panel panel-primary">                                       
                                            <div class="panel-body">
                                                <?php
                                                    //Get subject data
                                                    $dulSubject = mysqli_query($con, "SELECT ds.*,ss.* FROM dulSubject ds
                                                                               INNER JOIN studentSubject ss ON ds.ss_id=ss.ss_id
                                                                               WHERE dr_id='$dr_id'");
                                                    $i = 0 ;
                                                    while($row = mysqli_fetch_array($dulSubject)){
                                                        $ss_id = $row['ss_id'];

                                                        $studentSubject = mysqli_query($con, "SELECT ss.*,s.* FROM studentSubject ss INNER JOIN subject s ON ss.s_id=s.s_id WHERE ss_id='$ss_id'");
                                                        $rowStudentSubject = mysqli_fetch_array($studentSubject);
                                                        $code = $rowStudentSubject['s_code'];
                                                        $subjectName = $rowStudentSubject['s_rumiName'];
                                                        $term = $rowStudentSubject['ss_term'];
                                                        $year = $rowStudentSubject['ss_year'];
                                                        $score = $rowStudentSubject['ss_score'];
                                                        

                                                        //echo $code; echo "&nbsp;";  echo $subjectName; echo "&nbsp;"; echo $term; echo "&nbsp"; echo $year; echo "<br>";
                                                ?>
                                                        <div class='form-group'>
                                                            <div class='col-lg-6'>
                                                                <b><?= $code ?></b> <i><?= $subjectName ?> <?= $term ?>/<?= $year ?></i> :     
                                                            </div>
                                                            <input type='hidden' name='id<?php echo "[".$i."]" ?>' value='<?= $ss_id ?>' />
                                                            <div class='col-lg-3'>
                                                                <input type="text" class='form-control input-sm' name="ss_score<?php echo "[".$i."]" ?>" value="<?= $score ?>">
                                                            </div>    
                                                        </div>
                                                <br><br>
                                                <?php
                                                    ++$i;
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                      <p class='text-center'><button type='submit' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-save'></span> RAKAM</button></p>
                                 </form> 
                              </div>
                            </div>
                          </div>
                        </div>
          <!-- /Modal showing -->

        </tr>
<?php
    }
?>
    </tbody>
</table> 
<div class="pagination"><?php echo $paginationCtrls; ?></div>