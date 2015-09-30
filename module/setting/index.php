<div class="btn-group btn-group-justified">
  <a href="?page=setting&&settingpage=subject" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Mata kuliah</a>
  <a href="?page=setting&&settingpage=teacher" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Data pensyarah</a>
  <a href="?page=setting&&settingpage=main" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Fakulti & Jurusan</a>
</div>

<?php
    $settingpage = $_GET['settingpage']; // To get the page

    switch ($settingpage) {
        //Teacher
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
        case 'searchTeacher':
            include 'module/setting/teacher/searchTeacher.php';
            break;
        //subject
        case 'subject':
            include 'module/setting/subject/list.php';
            break;
        case 'subjectAdd':
            include 'module/setting/subject/subjectAdd.php';
            break;
        case 'saveSubject':
            include 'module/setting/subject/saveSubject.php';
            break;
        case 'subjectEdit':
            include 'module/setting/subject/subjectEdit.php';
            break;
        case 'saveEditSubject':
            include 'module/setting/subject/saveEditSubject.php';
            break;
        case 'deleteSubject':
            include 'module/setting/subject/deleteSubject.php';
            break;
        case 'searchSubject':
            include 'module/setting/subject/searchSubject.php';
            break;
    }
?>
