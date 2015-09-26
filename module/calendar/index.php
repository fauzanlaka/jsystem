<div class="btn-group btn-group-justified">
  <a href="?page=user&&userpage=add" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> Tambah pengguna</a>
  <a href="?page=user&&userpage=list" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Pengguna sistem</a>
</div>
<?php
$calendarpage = $_GET['calendarpage']; // To get the page

if($calendarpage == NULL){
    $calendarpage = 'main';
}
    switch($calendarpage){
        case 'main':
            include 'module/calendar/main.php';
            break;
    }
?>
