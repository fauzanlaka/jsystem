<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>ADMIN | Resit</title>
    
    <style>
        body {
            height: 842px;
            width: 595px;
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }
            table {
        border-collapse: collapse;
            }
    </style>
    
    <script language="javascript" type="text/javascript">
        function printDiv(printableArea) {
            var printContents = document.getElementById(printableArea).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    </head>
    <?php
        include '../../connect.php';
        $id = $_GET['id'];
        
        $sql_payment = mysqli_query($con, "SELECT p.*,s.*,r.* FROM exam_pay p
                     INNER JOIN students s ON p.st_id=s.st_id
                     INNER JOIN student_register_exam r ON p.srx_id=r.srx_id 
                     WHERE r.srx_id='$id'
                     ");
        $rs_payment = mysqli_fetch_array($sql_payment);
        
        $st_id = $rs_payment['st_id'];
        $sql_student = mysqli_query($con, "SELECT s.ft_id,s.dp_id,f.ft_name,d.dp_name FROM students s
                     INNER JOIN fakultys f ON s.ft_id=f.ft_id
                     INNER JOIN departments d ON s.dp_id=d.dp_id
                     WHERE st_id='$st_id'");
        $rs_student = mysqli_fetch_array($sql_student);
        
    ?>
	<body>			
            <div id="printableArea">
                <table width="597" height="84" border="0px" align="center">
                    <tr>
			<td width="127" rowspan="4" align="left" valign="top"><img src="image/LOGO JISDA.png"width="66" height="77"></td>
                        <td width="434" align="center">ใบเสร็จรับเงิน / RECEIPT</td>
			<td width="146"></td>
                    </tr>
                    <tr>
			<td align="center"><font size="2px">JAMIAH ISLAM SYEIKH DAUD AL-FATHANI(JISDA) -YALA</font></td>
			<td align="right"><font size="2px">เลขที่ : <?= $rs_payment['reciet_code']; ?></font></td>
                    </tr>
                    <tr>
			<td align="center"><font size="2px">สถาบันอิสลามศึกษาชั้นสูง เช็คดาวุดอัลฟาฎอนีอัลอิสลามียะห์</font></td>
			<td align="right"><font size="2px">วันที่ : <?= $rs_payment['pay_date']; ?></font></td>
                    </tr>
                    <tr>
			<td align="center"><font size="2px">762 Siroros Road, Yala, Tel : 073-212937</font></td>
			<td></td>
						</tr>
		</table>
		<table width="595" border="0px" align="center">
                    <tr>
			<td width="100"><font size="2px"><b>ได้รับเงินจาก :</b></font></td>
                        <td width="205" align="center"><?= strtoupper($rs_payment['firstname_rumi']); ?> <?= strtoupper($rs_payment['lastname_rumi']); ?></td>
			<td width="110"><font size="2px"><b>รหัสประจำตัว  :</b></font></td>
			<td width="162" align="center"><?= $rs_payment['student_id'] ?></td>
                    </tr>
                    <tr>
			<td width="100"><font size="2px"><b>Received From </b></font></td>
			<td width="205" align="center"></td>
			<td width="110"><font size="2px"><b>Student ID</b></font></td>
			<td width="162" align="center"></td>
                    </tr>
                    <tr>
			<td width="100"><font size="2px"><b>คณะ :</b></font></td>
			<td width="205" align="center"><?= $rs_student['ft_name'] ?></td>
			<td width="110"><font size="2px"><b>สาขาวิชา  :</b></font></td>
			<td width="162" align="center"><?= $rs_student['dp_name'] ?></td>
                    </tr>
                    <tr>
			<td width="100"><font size="2px"><b>Faculty </b></font></td>
			<td width="205" align="center"></td>
			<td width="110"><font size="2px"><b>Department</b></font></td>
			<td width="162" align="center"></td>
                    </tr>
                </table>
		<table width="597" height="196" border="1px"  align="center">
                    <tr>
			<td height="37" colspan="2" align="center"><b>รายการ / Description</b></td>
			<td width="154" align="center"><b>จำนวนเงิน / Amount</b></td>
                    </tr>
                    <tr>
			<?php $year_t = ($rs_payment['year'])+543; ?>
			<td colspan="2" align="left">	ค่าเทอมนักศึกษาภาคเรียนที่  : <?= $rs_payment['term'] ?>  ปีการศึกษา : <?= $year_t ?></td>
                        <td align="right"></td>
                    </tr>
                    <tr>
			<td colspan="2" align="left">	ค่าธรรมเนียมสอบภาคเรียนที่  : <?= $rs_payment['term'] ?>  ปีการศึกษา : <?= $year_t ?> </td>
			<td align="right"><?= number_format($rs_payment['money']) ?>.00</td>
                    </tr>
                    <tr>
			<td colspan="2" align="left">	ค่าลงทะเบียน </td>
			<td align="right"></td>
                    </tr>
                    <tr>
			<td colspan="2" align="left">	ค่าประกาศนียบัตร </td>
			<td align="right"></td>
                    </tr>
                    <tr>
			<td colspan="2" align="left">	อื่นๆ </td>
			<td align="right"></td>
                    </tr>
                    <tr>
			<td width="82" height="24" align="left"><b>รวม (บาท)</b></td>
			<td width="339" align="center">&nbsp;</td>
                        <td align="right"><?= number_format($rs_payment['money']) ?>.00</td>
                    </tr>
                </table>
                <table width="594">
                    <tr>
                        <td height="72" align="right">ผู้รับเงิน/Cashier</td>  
                    </tr>
                    <tr>
                        <td width="432"></td>
                    </tr>
                </table>
	</div>
	<div align="center">
            <button type="button" class="btn btn-success" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
	</div>
    </body>
</html>

