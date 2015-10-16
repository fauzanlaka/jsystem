<?php    
    $status = $_SESSION["status"];
    if($status == 'Amir kuliah' or $status == 'Pensyarah'){
?>

<div class="btn-group btn-group-justified">
  <a href="?page=student&&studentpage=listed" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Daftar mahasiswa</a>
</div>
<?php
    }else{
?>
<div class="btn-group btn-group-justified">
  <a href="?page=student&&studentpage=add" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> Mahasiswa baru</a>
  <a href="?page=student&&studentpage=list" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Daftar mahasiswa</a>
</div>
<?php     
    } 
?>

<?php
$studentpage = $_GET['studentpage']; // To get the page

if($studentpage == NULL){
    $studentpage = 'list';
}
    switch ($studentpage) {
        case 'list':
            include 'module/student/list.php';
            break;
        case 'add':
            include 'module/student/add.php';
            break;
        case 'search':
            include 'module/student/search.php';
            break;
        case 'delete':
            include 'module/student/delete.php';
            break;
        case 'listed':
            include 'module/student/listed.php';
            break;
        case 'searched':
            include 'module/student/searched.php';
            break;
        case 'edit':
            include 'module/student/edit.php';
            break;
        case 'saveclass':
            include 'module/student/saveclass.php';
            break;
        case 'saveeditmalaystudent':
            include 'module/student/saveeditmalaystudent.php';
            break;
        case 'saveeditthaistudent':
            include 'module/student/saveeditthaistudent.php';
            break;
        case 'saveaddstudent':
            include 'module/student/saveaddstudent.php';
            break;
        case 'addthaistudent':
            include 'module/student/addthaistudent.php';
            break;
        case 'saveaddthaistudent':
            include 'module/student/saveaddthaistudent.php';
            break;
        case 'searched':
            include 'module/student/searche.php';
            break;
        case 'edited':
            include 'module/student/edited.php';
            break;
    }
?>

