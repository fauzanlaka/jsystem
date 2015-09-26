<div class="btn-group btn-group-justified">
  <a href="?page=main" class="btn btn-default"><span class="glyphicon glyphicon-text-size"></span> Berita && Maklumat</a>
</div>
<blockquote>
  <p><span class="glyphicon glyphicon-tags"></span>  Maklumat</p>
  <small>Maklumat  <cite title="Source Title">JAMIAH DAN IDARAH</cite></small>
  <br>
<?php
    $sql = mysqli_query($con, "select * from post where publish='2' or publish='1' ORDER BY p_id DESC LIMIT 0,10");
    while($result = mysqli_fetch_array($sql)){
        $id = $result['p_id'];
?>
<p class="text-danger"><a href="?page=news&&newspage=detail&&id=<?= $id ?>">- <?= $result['p_title']; ?></a> || <i><b><?= $result['p_author']; ?></b> <?= $result['p_date']; ?></i></p>
    <?php } ?>
</blockquote>