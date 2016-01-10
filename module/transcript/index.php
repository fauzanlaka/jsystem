<div class="pull-left">
    <span class="glyphicon glyphicon-education"></span> <b>Sistem pengeluaran transcrip</b>
</div>
<div class="pull-right">
    <a class="btn btn-success btn-sm" href="?page=transcript&&transcriptpage=main"><span class="glyphicon glyphicon-list"></span> MAHASISWA</a>
</div>
<br>
<hr>
<?php
    $transcriptpage = $_GET['transcriptpage']; // To get the page

    switch ($transcriptpage) {
        //Main
        case 'main':
            include 'module/transcript/main.php';
            break;
        case 'search':
            include 'module/transcript/search.php';
            break;
        case 'transcipt':
            include 'module/transcript/transcipt.php';
            break;
    }
?>

