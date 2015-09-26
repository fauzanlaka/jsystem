<div class="btn-group btn-group-justified">
  <a href="?page=payment&&paymentpage=yuran" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> YURAN</a>
  <a href="?page=payment&&paymentpage=exam" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> UJIAN</a>
  <a href="?page=payment&&paymentpage=muqaddimah" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> MUQADDIMAH</a>
</div>
<?php
$paymentpage = $_GET['paymentpage']; // To get the page
    switch ($paymentpage) {
        case 'main':
?>
<br>
<blockquote>
    <p><span class="glyphicon glyphicon-tags"></span> LAPORAN PENDAFTARAN MAHASISWA.</p>
    <small>Laporan terkini</small>
    
    <div class="col-lg-6">
        
        <?php
        
            //Set year 
            $current_year = date('Y');
            
            $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
            $rs_register = mysqli_fetch_array($register);
            $year_register = $rs_register['year'];
            
            
            //Set class system
            $cy = $current_year; /*Current year are receive from max of re_id in register table*/
            
            $c1 = $year_register ;
            $c2 = $year_register-1;
            $c3 = $year_register-2;
            $c4 = $year_register-3;
            
            //Get data where student calss is 1
            $sql_sc1 = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c1' and term='1' and academic_year='$year_register'
                     ");
            $rs_sc1 = mysqli_num_rows($sql_sc1);
            //Get data where student calss is 11 and paying is 'Payed'
            $sql_sc11 = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c1' and term='1' and academic_year='$year_register' and pay_status='Sudah bayar'
                     ");
            $rs_sc11 = mysqli_num_rows($sql_sc11);
            //Get data where student calss is 11 and paying is 'Not pay'
            $sql_sc111 = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c1' and term='1' and academic_year='$year_register' and pay_status='Belum bayar'
                     ");
            $rs_sc111 = mysqli_num_rows($sql_sc111);
            
            //Get data where student calss is 2
            $sql_sc2 = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c2' and term='1' and academic_year='$year_register'
                     ");
            $rs_sc2 = mysqli_num_rows($sql_sc2);
            //Get data where student calss is 11 and paying is 'Payed'
            $sql_sc22 = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c2' and term='1' and academic_year='$year_register' and pay_status='Sudah bayar'
                     ");
            $rs_sc22 = mysqli_num_rows($sql_sc22);
            //Get data where student calss is 11 and paying is 'Not pay'
            $sql_sc222 = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c2' and term='1' and academic_year='$year_register' and pay_status='Belum bayar'
                     ");
            $rs_sc222 = mysqli_num_rows($sql_sc222);
            
            //Get data where student calss is 3
            $sql_sc3 = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c3' and term='1' and academic_year='$year_register'
                     ");
            $rs_sc3 = mysqli_num_rows($sql_sc3);
            //Get data where student calss is 3 and paying is 'Payed'
            $sql_sc33 = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c3' and term='1' and academic_year='$year_register' and pay_status='Sudah bayar'
                     ");
            $rs_sc33 = mysqli_num_rows($sql_sc33);
            //Get data where student calss is 3 and paying is 'Not pay'
            $sql_sc333 = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c3' and term='1' and academic_year='$year_register' and pay_status='Belum bayar'
                     ");
            $rs_sc333 = mysqli_num_rows($sql_sc333);
            
            //Get data where student calss is 4
            $sql_sc4 = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c4' and term='1' and academic_year='$year_register'
                     ");
            $rs_sc4 = mysqli_num_rows($sql_sc4);
            //Get data where student calss is 4 and paying is 'Payed'
            $sql_sc44 = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c4' and term='1' and academic_year='$year_register' and pay_status='Sudah bayar'
                     ");
            $rs_sc44 = mysqli_num_rows($sql_sc44);
            //Get data where student calss is 4 and paying is 'Not pay'
            $sql_sc444 = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c4' and term='1' and academic_year='$year_register' and pay_status='Belum bayar'
                     ");
            $rs_sc444 = mysqli_num_rows($sql_sc444);
            
            
            //-----------------------------------------------------------------------
            //Get total of registered students
            $registered_t1 = mysqli_query($con, "SELECT * FROM student_register WHERE academic_year='$year_register' and term='1'");
            $rs_registered = mysqli_num_rows($registered_t1);
            
            //Get total of registered students and pay status is payed
            $registered_payed_t1 = mysqli_query($con, "SELECT * FROM student_register WHERE academic_year='$year_register' and term='1' and pay_status='Sudah bayar'");
            $rs_registered_payed = mysqli_num_rows($registered_payed_t1);
            
            //Get total of registered students and pay status is not pay
            $registered_notpay_t1 = mysqli_query($con, "SELECT * FROM student_register WHERE academic_year='$year_register' and term='1' and pay_status='Belum bayar'");
            $rs_registered_notpay = mysqli_num_rows($registered_notpay_t1);
            
            //Get total money where term is 1
            $sql_maxreid = mysqli_query($con, "SELECT MAX(r.re_id),r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.term_id='1'");
            $rs_maxreid = mysqli_fetch_array($sql_maxreid);
            $max_reidt1 = $rs_maxreid['re_id'];
            $totalmoney_t1 = mysqli_query($con, "SELECT SUM(p.money) AS smoney,SUM(p.penalty) AS spenulty,p.sr_id,sr.re_id,sr.sr_id FROM payments p 
                           INNER JOIN student_register sr ON p.sr_id=sr.sr_id
                           WHERE sr.re_id='$max_reidt1'
                           ");
            $rs_summoney = mysqli_fetch_assoc($totalmoney_t1);
        ?>
    
        <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Mahasiswa yang daftar belajar : 1/<?= $year_register ?></h3>
            </div>
            <div class="panel-body">
              
                <table class="table table-bordered">
                    <tr>
                        <td align="center"><b>KELAS</b></td>
                        <td align="center"><b>DAFTR</b></td>
                        <td align="center"><b>BAYAR</b></td>
                        <td align="center"><b>BELUM</b></td>
                    </tr>
                    <tr>
                        <td align="center">1</td>
                        <td align="center"><font color='orange'><?= $rs_sc1 ?></font></td>
                        <td align="center"><font color='green'><?= $rs_sc11 ?></font></td>
                        <td align="center"><font color='red'><?= $rs_sc111 ?></font></td>
                    </tr>
                    <tr>
                        <td align="center">2</td>
                        <td align="center"><font color='orange'><?= $rs_sc2 ?><font></td>
                        <td align="center"><font color='green'><?= $rs_sc22 ?></font></td>
                        <td align="center"><font color='red'><?= $rs_sc222 ?></font></td>
                    </tr>
                    <tr>
                        <td align="center">3</td>
                        <td align="center"><font color='orange'><?= $rs_sc3 ?></font></td>
                        <td align="center"><font color='green'><?= $rs_sc33 ?></font></td>
                        <td align="center"><font color='red'><?= $rs_sc333 ?></font></td>
                    </tr>
                    <tr>
                        <td align="center">4</td>
                        <td align="center"><font color='orange'><?= $rs_sc4 ?></font></td>
                        <td align="center"><font color='green'><?= $rs_sc44 ?></font></td>
                        <td align="center"><font color='red'><?= $rs_sc444 ?></font></td>
                    </tr>
                    <tr>
                        <td align="center">TOTAL</td>
                        <td align="center"><font color='orange'><?= $rs_registered ?></td>
                        <td align="center"><font color='green'><?= $rs_registered_payed ?></td>
                        <td align="center"><font color='red'><?= $rs_registered_notpay ?></font></td>
                    </tr>
                </table>
                <p class="text-success"><b>Total duit YURAN :</b> <?= number_format($rs_summoney['smoney']) ?> <b>฿</b></p>
                <p class="text-success"><b>Total duit DENDA :</b> <?= number_format($rs_summoney['spenulty']) ?> <b>฿</b></p>
            </div>
        </div>

        <?php

            //Ujian box report
            //Get data where student class is 1
            $sql_ec1 = mysqli_query($con, "SELECT s.*,sre.* from students s 
                                           INNER JOIN student_register_exam sre  ON s.st_id=sre.st_id
                                           WHERE class='$c1' and term='1' and year='$year_register'
                                    ");
            $rs_ec1 = mysqli_num_rows($sql_ec1);
            //Get data where student class is 11
            $sql_ec11 = mysqli_query($con, "SELECT s.*,sre.* from students s 
                                           INNER JOIN student_register_exam sre  ON s.st_id=sre.st_id
                                           WHERE class='$c1' and term='1' and year='$year_register' and pay_status='Sudah bayar'
                                    ");
            $rs_ec11 = mysqli_num_rows($sql_ec11);
            //Get data where student class is 11
            $sql_ec111 = mysqli_query($con, "SELECT s.*,sre.* from students s 
                                           INNER JOIN student_register_exam sre  ON s.st_id=sre.st_id
                                           WHERE class='$c1' and term='1' and year='$year_register' and pay_status='Belum bayar'
                                    ");
            $rs_ec111 = mysqli_num_rows($sql_ec111);
            //Get data where student class is 2
            $sql_ec2 = mysqli_query($con, "SELECT s.*,sre.* from students s 
                                           INNER JOIN student_register_exam sre  ON s.st_id=sre.st_id
                                           WHERE class='$c2' and term='1' and year='$year_register'
                                    ");
            $rs_ec2 = mysqli_num_rows($sql_ec2);
            //Get data where student class is 22
            $sql_ec22 = mysqli_query($con, "SELECT s.*,sre.* from students s 
                                           INNER JOIN student_register_exam sre  ON s.st_id=sre.st_id
                                           WHERE class='$c2' and term='1' and year='$year_register' and pay_status='Sudah bayar'
                                    ");
            $rs_ec22 = mysqli_num_rows($sql_ec22);
            //Get data where student class is 222
            $sql_ec222 = mysqli_query($con, "SELECT s.*,sre.* from students s 
                                           INNER JOIN student_register_exam sre  ON s.st_id=sre.st_id
                                           WHERE class='$c2' and term='1' and year='$year_register' and pay_status='Belum bayar'
                                    ");
            $rs_ec222 = mysqli_num_rows($sql_ec222);
            //Get data where student class is 3
            $sql_ec3 = mysqli_query($con, "SELECT s.*,sre.* from students s 
                                           INNER JOIN student_register_exam sre  ON s.st_id=sre.st_id
                                           WHERE class='$c3' and term='1' and year='$year_register' 
                                    ");
            $rs_ec3 = mysqli_num_rows($sql_ec3);
            //Get data where student class is 33
            $sql_ec33 = mysqli_query($con, "SELECT s.*,sre.* from students s 
                                           INNER JOIN student_register_exam sre  ON s.st_id=sre.st_id
                                           WHERE class='$c3' and term='1' and year='$year_register' and pay_status='Sudah bayar'
                                    ");
            $rs_ec33 = mysqli_num_rows($sql_ec33);
            //Get data where student class is 33
            $sql_ec333 = mysqli_query($con, "SELECT s.*,sre.* from students s 
                                           INNER JOIN student_register_exam sre  ON s.st_id=sre.st_id
                                           WHERE class='$c3' and term='1' and year='$year_register' and pay_status='Belum bayar'
                                    ");
            $rs_ec333 = mysqli_num_rows($sql_ec333);
            //Get data where student class is 4
            $sql_ec4 = mysqli_query($con, "SELECT s.*,sre.* from students s 
                                           INNER JOIN student_register_exam sre  ON s.st_id=sre.st_id
                                           WHERE class='$c4' and term='1' and year='$year_register'
                                    ");
            $rs_ec4 = mysqli_num_rows($sql_ec4);
            //Get data where student class is 44
            $sql_ec44 = mysqli_query($con, "SELECT s.*,sre.* from students s 
                                           INNER JOIN student_register_exam sre  ON s.st_id=sre.st_id
                                           WHERE class='$c4' and term='1' and year='$year_register' and pay_status='Sudah bayar'
                                    ");
            $rs_ec44 = mysqli_num_rows($sql_ec44);
            //Get data where student class is 44
            $sql_ec444 = mysqli_query($con, "SELECT s.*,sre.* from students s 
                                           INNER JOIN student_register_exam sre  ON s.st_id=sre.st_id
                                           WHERE class='$c4' and term='1' and year='$year_register' and pay_status='Belum bayar'
                                    ");
            $rs_ec444 = mysqli_num_rows($sql_ec444);

            //Get total of payed and penaulty money
            //Get total money where term is 1
            $sql_maxrxid = mysqli_query($con, "SELECT MAX(rx.rx_id),rx.*,y.* FROM register_exam rx INNER JOIN year y ON rx.y_id=y.y_id WHERE rx.t_id='1'");
            $rs_maxrxid = mysqli_fetch_array($sql_maxrxid);
            $max_rxidt1 = $rs_maxrxid['rx_id'];
            $totalmoney_xt1 = mysqli_query($con, "SELECT SUM(p.money) AS smoney,SUM(p.penalty) AS spenulty,p.srx_id,srx.rx_id,srx.srx_id FROM exam_pay p 
                           INNER JOIN student_register_exam srx ON p.srx_id=srx.srx_id
                           WHERE srx.rx_id='$max_rxidt1'
                           ");
            $rs_summoneyx1 = mysqli_fetch_assoc($totalmoney_xt1);


        ?>
        
        <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Mahasiswa yang daftar ujian : 1/<?= $year_register ?></h3>
            </div>
            <div class="panel-body">
              
                <table class="table table-bordered">
                    <tr>
                        <td align="center"><b>KELAS</b></td>
                        <td align="center"><b>DAFTR</b></td>
                        <td align="center"><b>BAYAR</b></td>
                        <td align="center"><b>BELUM</b></td>
                    </tr>
                    <tr>
                        <td align="center">1</td>
                        <td align="center"><font color='orange'><?= $rs_ec1 ?></font></td>
                        <td align="center"><font color='green'><?= $rs_ec11 ?></font></td>
                        <td align="center"><font color='red'><?= $rs_ec111 ?></font></td>
                    </tr>
                    <tr>
                        <td align="center">2</td>
                        <td align="center"><font color='orange'><?= $rs_ec2 ?><font></td>
                        <td align="center"><font color='green'><?= $rs_ec22 ?></font></td>
                        <td align="center"><font color='red'><?= $rs_ec222 ?></font></td>
                    </tr>
                    <tr>
                        <td align="center">3</td>
                        <td align="center"><font color='orange'><?= $rs_ec3 ?></font></td>
                        <td align="center"><font color='green'><?= $rs_ec33 ?></font></td>
                        <td align="center"><font color='red'><?= $rs_ec333 ?></font></td>
                    </tr>
                    <tr>
                        <td align="center">4</td>
                        <td align="center"><font color='orange'><?= $rs_ec4 ?></font></td>
                        <td align="center"><font color='green'><?= $rs_ec44 ?></font></td>
                        <td align="center"><font color='red'><?= $rs_ec444 ?></font></td>
                    </tr>
                    <tr>
                        <td align="center">TOTAL</td>
                        <td align="center"><font color='orange'><?= $rs_ec1 + $rs_ec2 + $rs_ec3 + $rs_ec4 ?></font></td>
                        <td align="center"><font color='green'><?= $rs_ec11 + $rs_ec22 + $rs_ec33 + $rs_ec44 ?></font></td>
                        <td align="center"><font color='red'><?= $rs_ec111 + $rs_ec222 + $rs_ec333 + $rs_ec444 ?></font></td>
                    </tr>
                </table>
                <p class="text-success"><b>Jumlah duit UJIAN :</b> <?= number_format($rs_summoneyx1['smoney']) ?> <b>฿</b></p>
                <p class="text-success"><b>Jumlah duit DENDA :</b> <?= number_format($rs_summoneyx1['spenulty']) ?> <b>฿</b></p>
            </div>
        </div>

    </div>
    
    <div class="col-lg-6">
        
        <?php
        
            //Get data where student calss is 1
            $sql_sc1t = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c1' and term='2' and academic_year='$year_register'
                     ");
            $rs_sc1t = mysqli_num_rows($sql_sc1t);
            //Get data where student calss is 11 and paying is 'Payed'
            $sql_sc11t = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c1' and term='2' and academic_year='$year_register' and pay_status='Sudah bayar'
                     ");
            $rs_sc11t = mysqli_num_rows($sql_sc11t);
            //Get data where student calss is 11 and paying is 'Not pay'
            $sql_sc111t = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c1' and term='2' and academic_year='$year_register' and pay_status='Belum bayar'
                     ");
            $rs_sc111t = mysqli_num_rows($sql_sc111t);
            
            //Get data where student calss is 2
            $sql_sc2t = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c2' and term='2' and academic_year='$year_register'
                     ");
            $rs_sc2t = mysqli_num_rows($sql_sc2t);
            //Get data where student calss is 11 and paying is 'Payed'
            $sql_sc22t = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c2' and term='2' and academic_year='$year_register' and pay_status='Sudah bayar'
                     ");
            $rs_sc22t = mysqli_num_rows($sql_sc22t);
            //Get data where student calss is 11 and paying is 'Not pay'
            $sql_sc222t = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c2' and term='2' and academic_year='$year_register' and pay_status='Belum bayar'
                     ");
            $rs_sc222t = mysqli_num_rows($sql_sc222t);
            
            //Get data where student calss is 3
            $sql_sc3t = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c3' and term='2' and academic_year='$year_register'
                     ");
            $rs_sc3t = mysqli_num_rows($sql_sc3t);
            //Get data where student calss is 3 and paying is 'Payed'
            $sql_sc33t = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c3' and term='2' and academic_year='$year_register' and pay_status='Sudah bayar'
                     ");
            $rs_sc33t = mysqli_num_rows($sql_sc33t);
            //Get data where student calss is 3 and paying is 'Not pay'
            $sql_sc333t = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c3' and term='2' and academic_year='$year_register' and pay_status='Belum bayar'
                     ");
            $rs_sc333t = mysqli_num_rows($sql_sc333t);
            
            //Get data where student calss is 4
            $sql_sc4t = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c4' and term='2' and academic_year='$year_register'
                     ");
            $rs_sc4t = mysqli_num_rows($sql_sc4t);
            //Get data where student calss is 4 and paying is 'Payed'
            $sql_sc44t = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c4' and term='2' and academic_year='$year_register' and pay_status='Sudah bayar'
                     ");
            $rs_sc44t = mysqli_num_rows($sql_sc44t);
            //Get data where student calss is 4 and paying is 'Not pay'
            $sql_sc444t = mysqli_query($con, "SELECT s.*,sr.* from students s 
                     INNER JOIN student_register sr  ON s.st_id=sr.st_id
                     WHERE class='$c4' and term='2' and academic_year='$year_register' and pay_status='Belum bayar'
                     ");
            $rs_sc444t = mysqli_num_rows($sql_sc444t);
            
            //-----------------------------------------------------------------------
            //Get total of registered students
            $registered_t2 = mysqli_query($con, "SELECT * FROM student_register WHERE academic_year='$year_register' and term='2'");
            $rs_registered2 = mysqli_num_rows($registered_t2);
            
            //Get total of registered students and paying is payed
            $registered_payed_t2 = mysqli_query($con, "SELECT * FROM student_register WHERE academic_year='$year_register' and term='2' and pay_status='Sudah bayar'");
            $rs_registered_payed2 = mysqli_num_rows($registered_payed_t2);
            
            //Get total of registered students and paying is not pay
            $registered_notpay_t2 = mysqli_query($con, "SELECT * FROM student_register WHERE academic_year='$year_register' and term='2' and pay_status='Belum bayar'");
            $rs_registered_notpay2 = mysqli_num_rows($registered_notpay_t2);
            
            //Get total money where term is 2
            $sql_maxreidt2 = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register) and r.term_id='2'");
            $rs_maxreidt2 = mysqli_fetch_array($sql_maxreidt2);
            $max_reidt2 = $rs_maxreidt2['re_id'];
            $totalmoney_t2 = mysqli_query($con, "SELECT SUM(p.money) AS smoney,SUM(p.penalty) AS spenulty,p.sr_id,sr.re_id,sr.sr_id FROM payments p 
                           INNER JOIN student_register sr ON p.sr_id=sr.sr_id
                           WHERE sr.re_id='$max_reidt2'
                           ");
            $rs_summoneyt2 = mysqli_fetch_assoc($totalmoney_t2);
        
        ?>
    
        <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Mahasiswa yang daftar belajar : 2/<?= $year_register ?></h3>
            </div>
            <div class="panel-body">
              
                <table class="table table-bordered">
                    <tr>
                        <td align="center"><b>KELAS</b></td>
                        <td align="center"><b>DAFTR</b></td>
                        <td align="center"><b>BAYAR</b></td>
                        <td align="center"><b>BELUM</b></td>
                    </tr>
                    <tr>
                        <td align="center">1</td>
                        <td align="center"><font color='orange'><?= $rs_sc1t ?></font></td>
                        <td align="center"><font color="green"><?= $rs_sc11t ?></font></td>
                        <td align="center"><font color="red"><?= $rs_sc111t ?></font></td>
                    </tr>
                    <tr>
                        <td align="center">2</td>
                        <td align="center"><font color='orange'><?= $rs_sc2t ?><font></td>
                        <td align="center"><font color="green"><?= $rs_sc22t ?></font></td>
                        <td align="center"><font color="red"><?= $rs_sc222t ?></font></td>
                    </tr>
                    <tr>
                        <td align="center">3</td>
                        <td align="center"><font color='orange'><?= $rs_sc3t ?></font></td>
                        <td align="center"><font color="green"><?= $rs_sc33t ?></font></td>
                        <td align="center"><font color="red"><?= $rs_sc333t ?></font></td>
                    </tr>
                    <tr>
                        <td align="center">4</td>
                        <td align="center"><font color='orange'><?= $rs_sc4t ?></font></td>
                        <td align="center"><font color="green"><?= $rs_sc44t ?></font></td>
                        <td align="center"><font color="red"><?= $rs_sc444t ?></font></td>
                    </tr>
                    <tr>
                        <td align="center">TOTAL</td>
                        <td align="center"><?= $rs_registered2 ?></td>
                        <td align="center"><?= $rs_registered_payed2 ?></td>
                        <td align="center"><?= $rs_registered_notpay2 ?></td>
                    </tr>
                </table>
                <p class="text-success"><b>Jumlah duit YURAN :</b> <?= number_format($rs_summoneyt2['smoney']) ?> <b>฿</b></p>
                <p class="text-success"><b>Jumlah duit DENDA :</b> <?= number_format($rs_summoneyt2['spenulty']) ?> <b>฿</b></p>
            </div>
        </div>
        
        <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Mahasiswa yang daftar ujian : 2/<?= $year_register ?></h3>
            </div>
            <div class="panel-body">
              
                <table class="table table-bordered">
                    <tr>
                        <td align="center"><b>KELAS</b></td>
                        <td align="center"><b>DAFTR</b></td>
                        <td align="center"><b>BAYAR</b></td>
                        <td align="center"><b>BELUM</b></td>
                    </tr>
                    <tr>
                        <td align="center">1</td>
                        <td align="center"><font color='orange'><?= "-" ?></font></td>
                        <td align="center"><font color="green"><?= "-" ?></font></td>
                        <td align="center"><font color="red"><?= "-" ?></font></td>
                    </tr>
                    <tr>
                        <td align="center">2</td>
                        <td align="center"><font color='orange'><?= "-" ?><font></td>
                        <td align="center"><font color="green"><?= "-" ?></font></td>
                        <td align="center"><font color="red"><?= "-" ?></font></td>
                    </tr>
                    <tr>
                        <td align="center">3</td>
                        <td align="center"><font color='orange'><?= "-" ?></font></td>
                        <td align="center"><font color="green"><?= "-" ?></font></td>
                        <td align="center"><font color="red"><?= "-" ?></font></td>
                    </tr>
                    <tr>
                        <td align="center">4</td>
                        <td align="center"><font color='orange'><?= "-" ?></font></td>
                        <td align="center"><font color="green"><?= "-" ?></font></td>
                        <td align="center"><font color="red"><?= "-" ?></font></td>
                    </tr>
                </table>
                
            </div>
        </div>
        
    </div>
    <?= $year_register ?>
    Demi langkah yang lebih maju , Bersama kita meningkat kualitas pentadbiran
</blockquote>
<?php
            break;
        case'yuran':
            include 'module/payment/yuran.php';
            break;
        case'yuranpay':
            include 'module/payment/yuranpay.php';
            break;
        case'yuransave':
            include 'module/payment/yuransave.php';
            break;
        case'search':
            include 'module/payment/search.php';
            break;
        case'editpayyuran':
            include 'module/payment/editpayyuran.php';
            break;
        case'saveedityuran':
            include 'module/payment/saveedityuran.php';
            break;
        case'deleteyuran':
            include 'module/payment/deleteyuran.php';
            break;
        case'exam':
            include 'module/payment/exam.php';
            break;
        case'resit':
            include 'module/payment/reciet.php';
            break;
        case'exampay':
            include 'module/payment/exampay.php';
            break;
        case'saveexam':
            include 'module/payment/saveexam.php';
            break;
        case'examsearch':
            include 'module/payment/examsearch.php';
            break;
        case'deleteexam':
            include 'module/payment/deleteexam.php';
            break;
        case'editpayexam':
            include 'module/payment/editpayexam.php';
            break;
        case'saveeditexam':
            include 'module/payment/saveeditexam.php';
            break;
        case'muqaddimah':
            include 'module/payment/muqaddimah.php';
            break;
        case'muqaddimahpay':
            include 'module/payment/muqaddimahpay.php';
            break;
        case'muqaddimahsave':
            include 'module/payment/muqaddimahsave.php';
            break;
        case'editmuqaddimah':
            include 'module/payment/editmuqaddimah.php';
            break;
        case'saveeditmuqaddimah':
            include 'module/payment/saveeditmuqaddimah.php';
            break;
        case'muqaddimahsearch':
            include 'module/payment/muqaddimahsearch.php';
            break;
    }
?>
