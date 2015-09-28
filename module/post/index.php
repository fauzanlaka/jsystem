<div class="btn-group btn-group-justified">
  <a href="?page=post&&postpage=add" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> TAMBAH POST</a>
  <a href="?page=setting&&settingpage=teacher" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Data pensyarah</a>
  <a href="?page=setting&&settingpage=main" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Fakulti & Jurusan</a>
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
    }
?>
