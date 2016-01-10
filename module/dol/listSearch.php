<b>MAHAISWA YANG SUDAH DAFTAR DUL</b>
<br>
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
            $q = $_POST['q'];

            $search = mysqli_query($con, "SELECT s.*,f.*,dr.* FROM students s 
                                  INNER JOIN dulRegister dr ON dr.st_id=s.st_id
                                  INNER JOIN fakultys f ON s.ft_id=f.ft_id
                                  WHERE s.student_id='$q' OR s.firstname_rumi LIKE '%".$q."%' OR s.firstname_jawi LIKE '%".$q."%' OR dr.dulCode='$q' ");
            $rowSearch = mysqli_fetch_array($search);

            $id = $rowSearch['st_id'];
            $student_id = $rowSearch['student_id'];
            $fname = str_replace("\'", "&#39;", $rowSearch["firstname_rumi"]);
            $lname = str_replace("\'", "&#39;", $rowSearch["lastname_rumi"]);
            $faculty = str_replace("\'", "&#39;", $rowSearch["ft_name"]);
            $telephone = str_replace("\'", "&#39;", $rowSearch["telephone"]);
            $date = $rowSearch["dulDate"];
            $money = $rowSearch["sumMoney"];
            $dulCode = $rowSearch['dulCode'];
            $dr_id =  $rowSearch['dr_id'];
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
    </tbody>
</table> 
