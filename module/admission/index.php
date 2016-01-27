<div class="panel panel-primary">
  <div class="panel-body">
    <div class="pull-right">
        
        <div class="btn-group">
            <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> Daftar calon</button>
            <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="?page=admissions&&admissionpage=list">Calon Tahun 1</a></li>
                <li><a href="?page=admissions&&admissionpage=transferList">Calon transfer</a></li>
            </ul>
        </div>
        
        <div class="btn-group">
            <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-hand-right"></span> Muqaddimah</button>
          <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="?page=admissions&&admissionpage=muqaddimah">Muqaddimah Tahun 1</a></li>
                <li><a href="?page=admissions&&admissionpage=transfermuqaddimah">Muqaddimah Transfer</a></li>
            </ul>
        </div>
        
        <div class="btn-group">
            <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-duplicate"></span> Laporan calon</button>
            <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="?page=admissions&&admissionpage=report">Laporan Tahun 1</a></li>
                <li><a href="?page=admissions&&admissionpage=transferReport">Laporan transfer</a></li>
            </ul>
        </div>
        
        <div class="btn-group">
            <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-cog"></span> Setting</button>
            <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="?page=admissions&&admissionpage=studentId">NO.Pokok</a></li>
            </ul>
        </div>
        
    </div>
      

    <?php
    $admissionpage = $_GET['admissionpage']; // To get the page

        switch ($admissionpage) {
            case'main':
                include 'module/admission/main.php';
                break;
            case'list':
                include 'module/admission/main.php';
                break;
            case'register':
                include 'module/admission/register.php';
                break;
            case'dataEdit':
                include 'module/admission/function/dataEdit.php';
                break;
            case'confirm':
                include 'module/admission/function/confirm.php';
                break;
            case'repeal':
                include 'module/admission/function/repeal.php';
                break;
            case'search':
                include 'module/admission/function/search.php';
                break;
            case'report':
                include 'module/admission/report.php';
                break;
            case'reportPrint':
                include 'module/admission/reportPrint.php';
                break;
            case'muqaddimah':
                include 'module/admission/muqaddimah.php';
                break;
            case'payment':
                include 'module/admission/payment.php';
                break;
            case'paymentSave':
                include 'module/admission/function/paymentSave.php';
                break;
            case'paymentEditSave':
                include 'module/admission/function/paymentEditSave.php';
                break;
            case'transferList':
                include 'module/admission/transferList.php';
                break;
            case'transferRegister':
                include 'module/admission/transferRegister.php';
                break;
            case'TransferDataEdit':
                include 'module/admission/function/TransferDataEdit.php';
                break;
            case'transferConfirm':
                include 'module/admission/function/transferConfirm.php';
                break;
            case'transfermuqaddimah':
                include 'module/admission/transfermuqaddimah.php';
                break;
            case'transferPayment':
                include 'module/admission/transferPayment.php';
                break;
            case'transferPaymentSave':
                include 'module/admission/function/transferPaymentSave.php';
                break;
            case'transferPaymentEditSave':
                include 'module/admission/function/transferPaymentEditSave.php';
                break;
            case'registerCancel':
                include 'module/admission/function/registerCancel.php';
                break;
            case'registerTransferCancel':
                include 'module/admission/function/registerTransferCancel.php';
                break;
            case'paymentCancel':
                include 'module/admission/function/paymentCancel.php';
                break;
            case'paymentTransferCancel':
                include 'module/admission/function/paymentTransferCancel.php';
                break;
            case'transferSearch':
                include 'module/admission/function/transferSearch.php';
                break;
            case'muqaddimahSearch':
                include 'module/admission/function/muqaddimahSearch.php';
                break;
            case'muqaddimahTransferSearch':
                include 'module/admission/function/muqaddimahTransferSearch.php';
                break;
            case'transferReport':
                include 'module/admission/transferReport.php';
                break;
            case'transferWord':
                include 'module/admission/transferWord.php';
                break;
            case'deleteList':
                include 'module/admission/function/deleteList.php';
                break;
            case'deleteTransfer':
                include 'module/admission/function/deleteTransfer.php';
                break;
            case'studentId':
                include 'module/admission/studentId.php';
                break;
            case'stdId':
                include 'module/admission/stdId.php';
                break;
            case'stdIdSave':
                include 'module/admission/function/stdIdSave.php';
                break;
        }
    ?>

  </div>
</div>

