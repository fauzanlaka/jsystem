<div class="btn-group btn-group-justified">
  <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> DAFTAR UMUM</a>
</div>
<?php
    $rspage = $_GET['rspage']; // To get the page
        switch ($rspage) {
            case 'main':
                include 'module/special/main.php';
                break;
            case 'studentRegister':
                include 'module/special/studentRegister.php';
                break;
            case 'studentRegisterSave':
                include 'module/special/studentRegisterSave.php';
                break;
        }
?>
