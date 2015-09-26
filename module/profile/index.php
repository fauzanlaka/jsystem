<div class="btn-group btn-group-justified">
  <a href="?page=profile&&profilepage=show" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> Profil anda</a>
  <a href="?page=profile&&profilepage=edit" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span> Ubah profil</a>
</div>
<?php
$profilepage = $_GET['profilepage']; // To get the page

if($profilepage == NULL){
    $profilepage = 'show';
}
    switch ( $profilepage) {
        case 'show':
            include 'module/profile/show.php';
            break;
        case 'edit':
            include 'module/profile/edit.php';
            break;
        case 'saveedit':
            include 'module/profile/saveedit.php';
            break;
    }
?>
