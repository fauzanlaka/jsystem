<div class="btn-group btn-group-justified">
  <a href="?page=register&&registerpage=addstudy" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> Daftar belajar</a>
  <a href="?page=register&&registerpage=addexam" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> Daftar ujian</a>
  <a href="?page=register&&registerpage=studylist" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Daftar belajar</a>
  <a href="?page=register&&registerpage=examlist" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> Daftar ujian</a>
</div>
<?php
$registerpage = $_GET['registerpage']; // To get the page

if($registerpage == NULL){
    $registerpage = 'index';
}
    switch ($registerpage) {
        case 'main':
?>
            <br>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Sistem pendaftaran !</strong> Sistem pendaftaran masih dalam proses pembangunan , Mohon maaf jika terdapat kekurangan di dalamnya , <a href="#" class="alert-link">Untuk langkah yang lebih maju , Sila beri kommen dan pendapat , TERIMAKASIH</a>.
            </div>
<?php
            break;
        case'addstudy':
            include 'module/register/study.php';
            break;
        case'savestudy':
            include 'module/register/savestudy.php';
            break;
        case'studylist':
            include 'module/register/studylist.php';
            break;
        case'editstudy':
            include 'module/register/editstudy.php';
            break;
        case'saveeditstudy':
            include 'module/register/saveeditstudy.php';
            break;
        case'deletestudy':
            include 'module/register/deletestudy.php';
            break;
        case'addexam':
            include 'module/register/exam.php';
            break;
        case'saveexam':
            include 'module/register/saveexam.php';
            break;
        case'examlist':
            include 'module/register/examlist.php';
            break;
        case'deleteexam':
            include 'module/register/deleteexam.php';
            break;
        case'editexam':
            include 'module/register/editexam.php';
            break;
        case'saveeditexam':
            include 'module/register/saveeditexam.php';
            break;
    }
?>

