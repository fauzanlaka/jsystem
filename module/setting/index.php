<?php
    $status = $_SESSION["status"];
    if($status == "Pensyarah"){
?>
<div class="btn-group btn-group-justified">
  <a href="?page=setting&&settingpage=score" class="btn btn-default"><span class="glyphicon glyphicon-duplicate"></span> Pengurusan markah</a>
</div>
<?php
    }else{
?>
<div class="btn-group btn-group-justified">
  <a href="?page=setting&&settingpage=subject" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Mata kuliah</a>
  <a href="?page=setting&&settingpage=teacher" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Data pensyarah</a>
  <a href="?page=setting&&settingpage=specialScore" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Pengurusan markah</a>
  <a href="?page=setting&&settingpage=setting" class="btn btn-default"><span class="glyphicon glyphicon-cog"></span> SETTING</a>
</div>
<?php
    }
?>
<?php
    $settingpage = $_GET['settingpage']; // To get the page

    switch ($settingpage) {
        //Main
        case 'main':
            include 'module/setting/setting/list.php';
            break;
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
        //Setting
        case 'setting':
            include 'module/setting/setting/list.php';
            break;
        case 'st':
            include 'module/setting/setting/subject/list.php';
            break;
        case 'stAdd':
            include 'module/setting/setting/subject/stAdd.php';
            break;
        case 'saveSt':
            include 'module/setting/setting/subject/saveSt.php';
            break;
        case 'stSearch':
            include 'module/setting/setting/subject/stSearch.php';
            break;
        case 'stEdit':
            include 'module/setting/setting/subject/stEdit.php';
            break;
        case 'stDelete':
            include 'module/setting/setting/subject/stDelete.php';
            break;
        case 'stEditSave':
            include 'module/setting/setting/subject/stEditSave.php';
            break;
        case 'l':
            include 'module/setting/setting/learning/list.php';
            break;
        case 'rsAdd':
            include 'module/setting/setting/learning/rsAdd.php';
            break;
        case 'sAdd':
            include 'module/setting/setting/learning/sAdd.php';
            break;
        case 'sAddSave':
            include 'module/setting/setting/learning/sAddSave.php';
            break;
        case 'rsDelete':
            include 'module/setting/setting/learning/rsDelete.php';
            break;
        //Score
        case 'score':
            include 'module/setting/score/main.php';
            break;
        case 'studentSearch':
            include 'module/setting/score/studentSearch.php';
            break;
        case 'scoreSave':
            include 'module/setting/score/scoreSave.php';
            break;
        case 'specialScore':
            include 'module/setting/score/specialScore.php';
            break;
        case 'specialStudentSearch':
            include 'module/setting/score/specialStudentSearch.php';
            break;
        case 'specialScoreSave':
            include 'module/setting/score/specialScoreSave.php';
            break;
        case 'specialPrint':
            include 'module/setting/score/specialPrint.php';
            break;
    }
?>
