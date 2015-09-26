<div class="btn-group btn-group-justified">
  <a href="?page=report&&reportpage=main" class="btn btn-default"><span class="glyphicon glyphicon-home"></span> HOME</a>
  <a href="?page=report&&reportpage=yuran" class="btn btn-default"><span class="glyphicon glyphicon-open-file"></span> YURAN</a>
  <a href="?page=report&&reportpage=exam" class="btn btn-default"><span class="glyphicon glyphicon-open-file"></span> UJIAN</a>
  <a href="?page=report&&reportpage=muqaddimah" class="btn btn-default"><span class="glyphicon glyphicon-open-file"></span> MUQADDIMAH</a>
  <a href="?page=report&&reportpage=mahasiswa" class="btn btn-default"><span class="glyphicon glyphicon-open-file"></span> MAHASISWA</a>
  <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-open-file"></span> GURU</a>
</div>
<?php
$reportpage = $_GET['reportpage']; // To get the page

if($reportpage == NULL){
    $reportpage = 'main';
}
    switch ($reportpage) {
        case 'main':
            include 'module/report/main.php';
            break;
        case 'yuran':
            include 'module/report/yuran.php';
            break;
        case 'yuransearch':
            include 'module/report/yuransearch.php';
            break;
        case 'exam':
            include 'module/report/exam.php';
            break;
        case 'examsearch':
            include 'module/report/examsearch.php';
            break;
        case 'muqaddimah':
            include 'module/report/muqaddimah.php';
            break;
        case 'muqaddimahsearch':
            include 'module/report/muqaddimahsearch.php';
            break;
        case 'mahasiswa':
            include 'module/report/mahasiswa.php';
            break;
        case 'mahasiswasearch':
            include 'module/report/mahasiswasearch.php';
            break;
    }
?>
