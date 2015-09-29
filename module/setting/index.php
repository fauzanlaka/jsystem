<div class="btn-group btn-group-justified">
  <a href="?page=setting&&settingpage=subject" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Mata kuliah</a>
  <a href="?page=setting&&settingpage=teacher" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Data pensyarah</a>
  <a href="?page=setting&&settingpage=main" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Fakulti & Jurusan</a>
</div>

<?php
    $settingpage = $_GET['settingpage']; // To get the page

    switch ($settingpage) {
        case 'subject':
            include 'module/setting/subject/list.php';
            break;
        case 'teacher':
            include 'module/setting/teacher/list.php';
            break;
        case 'teacherAdd':
            include 'module/setting/teacher/add.php';
            break;
        case 'saveAdd':
            include 'module/setting/teacher/saveAdd.php';
            break;
        case 'teacherEdit':
            include 'module/setting/teacher/teacherEdit.php';
            break;
        case 'editTeacher':
            include 'module/setting/teacher/editTeacher.php';
            break;
        case 'saveEditTeacher':
            include 'module/setting/teacher/saveEditTeacher.php';
            break;
        case 'deleteTeacher':
            include 'module/setting/teacher/deleteTeacher.php';
            break;
    }
?>
