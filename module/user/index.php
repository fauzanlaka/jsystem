<div class="btn-group btn-group-justified">
  <a href="?page=user&&userpage=add" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> Tambah pengguna</a>
  <a href="?page=user&&userpage=list" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Pengguna sistem</a>
</div>
<?php
$userpage = $_GET['userpage']; // To get the page

if($userpage == NULL){
    $userpage = 'list';
}
    switch($userpage){
        case 'list':
            include 'module/user/list.php';
            break;
        case 'add':
            include 'module/user/add.php';
            break;
        case 'saveadd':
            include 'module/user/saveadd.php';
            break;
        case 'edit':
            include 'module/user/edit.php';
            break;
        case 'saveedit':
            include 'module/user/saveedit.php';
            break;
        case 'delete':
            include 'module/user/delete.php';
            break;
    }
?>
