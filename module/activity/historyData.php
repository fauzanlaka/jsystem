<?php
    //Get total pusda credit last date
    $id = $_GET["id"];
    $pusda = mysqli_query($con, "SELECT SUM(a_credit) AS pusda FROM activity WHERE st_id='$id' and a_activityType = 'PUSDA' ");
    $rs_pusda = mysqli_fetch_array($pusda);
    
    $total_pusda = $rs_pusda['pusda'];
    
    $last_pusda = mysqli_query($con, "SELECT * FROM activity WHERE st_id = '$id' and a_id = (SELECT MAX(a_id) FROM activity WHERE a_activityType = 'PUSDA')");
    $rs_last_pusda = mysqli_fetch_array($last_pusda);
    $last_rs_pusda1 = $rs_last_pusda['a_activityDate'];
    $last_rs_pusda2 = $rs_last_pusda['activityTime'];
    
    //Get total komputer credit last date
    $id = $_GET["id"];
    $komputer = mysqli_query($con, "SELECT SUM(a_credit) AS computer FROM activity WHERE st_id='$id' and a_activityType = 'KOMPUTER'");
    $rs_komputer = mysqli_fetch_array($komputer);
    
    $total_komputer = $rs_komputer['computer'];
    
    $last_komputer = mysqli_query($con, "SELECT * FROM activity WHERE st_id = '$id' and a_id = (SELECT MAX(a_id) FROM activity WHERE a_activityType = 'KOMPUTER')");
    $rs_last_komputer = mysqli_fetch_array($last_komputer);
    $last_rs_komputer1 = $rs_last_komputer['a_activityDate'];
    $last_rs_komputer2 = $rs_last_komputer['activityTime'];
    
    $totalActivity = mysqli_query($con, "SELECT SUM(a_credit) AS totalActivity FROM activity WHERE st_id='$id'");
    $rs_totalActivity = mysqli_fetch_array($totalActivity);
    $totalActivitySum = $rs_totalActivity['totalActivity'];
?>
<br>
    <span class="glyphicon glyphicon-tags"></span> <b>HASIL KEGIATAN</b>
    
    <div class="pull-right">
        <button type="button" class="btn btn-primary" name="save" name="b_print" type="button" class="ipt"   onClick="printdiv('div_print');"><span class="glyphicon glyphicon-print"></span> PRINT</button>
    </div>
        
<div id="div_print">        
        <table width="100%">
            <tr>
                <td align="center"><img src="module/activity/image/LOGO JISDA.png"width="66" height="77"></td>
            </tr>
            <tr align="center">
                <td align="center">
                    <font size="4px"><b> جامعة الشيخ داود الفطاني اﻹسلامية - جالا </b></font><br><br>
                </td>
            </tr>
        </table>
        
        <div class="col-lg-6">

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Kegiatan PUSDA</h3>
              </div>
              <div class="panel-body">

                  <table class="table table-striped table-hover table-bordered ">
                        <thead>
                          <tr>
                            <td align="center"><b>TOTAL CREDIT</b></th>
                            <td align="center"><b>TARIKH KEGIATAN TERAKHIR</b></td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td align="center"><?= $total_pusda ?></td>
                            <td align="center"><?= $last_rs_pusda1 ?> / <?= $last_rs_pusda2 ?></td>
                          </tr>
                        </tbody>
                  </table>

              </div>
            </div>

        </div>

        <div class="col-lg-6">

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Kegiatan KOMPUTER</h3>
              </div>
              <div class="panel-body">

                  <table class="table table-striped table-hover table-bordered ">
                        <thead>
                          <tr>
                            <td align="center"><b>TOTAL CREDIT</b></th>
                            <td align="center"><b>TARIKH KEGIATAN TERAKHIR</b></td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td align="center"><?= $total_komputer ?></td>
                            <td align="center"><?= $last_rs_komputer1 ?> / <?= $last_rs_komputer2 ?></td>
                          </tr>
                        </tbody>
                  </table>

              </div>
            </div>

        </div>

        <b>Total credit kegitan :</b> <?= $totalActivitySum ?>
        
        <table width="100%">
            <tr align="center">
                <td align="center">
                    <font size="4px" color="white"><b></b></font><br><br>  
                </td>
                <td align="center">
                    <font size="4px"><b> </b></font><br><br>
                </td>
            </tr>
            <tr align="center">
                <td align="center">
                    <font size="4px" color="white"><b></b></font><br><br>  
                </td>
                <td align="center">
                    <font size="4px"><b> </b></font><br><br>
                </td>
            </tr>
            <tr align="center">
                <td align="center">
                    <font size="4px" color="white"><b></b></font><br><br>  
                </td>
                <td align="center">
                    <font size="4px"><b> تندا تاغن</b></font><br><br>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <font size="4px" color="white"><b></b></font><br><br>    
                </td>
                <td align="center">
                   <font size="4px"><b>................................</b></font><br><br>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <font size="4px" color="white"><b></b></font><br><br>    
                </td>
                <td align="center">
                   <font size="4px"><b>(مهاسيسوا)</b></font><br><br>
                </td>
            </tr>
        </table>
        
</div>
