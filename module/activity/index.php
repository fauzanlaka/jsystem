<?php
    if($status == 'Amir kuliah'){
?>
        <div class="btn-group btn-group-justified">
            <a href="?page=activity&&activitypage=history" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> SEJARAH KEGIATAN MAHASISWA</a>
        </div>
<?php
    }else{
?>
        <div class="btn-group btn-group-justified">
            <a href="?page=activity&&activitypage=add" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH DATA KEGIATAN</a>
            <a href="?page=activity&&activitypage=history" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> SEJARAH KEGIATAN MAHASISWA</a>
</div>
<?php
    }
?>
        
<?php
$activitypage = $_GET['activitypage']; // To get the page

if($activitypage == NULL){
    $activitypage = 'index';
}
    switch ($activitypage) {
        case'main':
            include 'module/activity/main.php';
            break;
        case'add':
            include 'module/activity/add.php';
            break;
        case'list':
            include 'module/activity/list.php';
            break;
        case'addActivity':
            include 'module/activity/addActivity.php';
            break;
        case'saveAddActivity':
            include 'module/activity/saveAddActivity.php';
            break;
        case'delete':
            include 'module/activity/delete.php';
            break;
        case'searchStudent':
            include 'module/activity/searchStudent.php';
            break;
        case'searchActivity':
            include 'module/activity/searchActivity.php';
            break;
        case'history':
            include 'module/activity/history.php';
            break;
        case'historyData':
            include 'module/activity/historyData.php';
            break;
        case'searchHistory':
            include 'module/activity/searchHistory.php';
            break;
    }
?>

