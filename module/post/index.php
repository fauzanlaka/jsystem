<div class="btn-group btn-group-justified">
  <a href="?page=post&&postpage=add" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH POST</a>
  <a href="?page=post&&postpage=list" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> POST</a>
</div>

<?php
    $postpage = $_GET['postpage']; // To get the page

    switch ($postpage) {
        case 'main':
            include 'module/post/list.php';
            break;
        case 'add':
            include 'module/post/add.php';
            break;
        case 'saveAdd':
            include 'module/post/saveAdd.php';
            break;
        case 'list':
            include 'module/post/list.php';
            break;
        case 'delete':
            include 'module/post/delete.php';
            break;
        case 'edit':
            include 'module/post/edit.php';
            break;
        case 'saveEdit':
            include 'module/post/saveEdit.php';
            break;
    }
?>
