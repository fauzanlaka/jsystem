<?php
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT * FROM post WHERE p_id='$id'");
    $rs = mysqli_fetch_array($sql);
    
    $title = str_replace("\'", "&#39;", $rs['p_title']);
    $post = str_replace("\'", "&#39;", $rs['p_post']);
    $other = str_replace("\'", "&#39;", $rs['p_other']);
    $publish = $rs['publish'];
?>
<br>
<div class="well">
    <h4><span class="glyphicon glyphicon-edit"></span> <b>UBAH MAKLUMAT</b></h4>
    <hr>
    <form class="form-horizontal" action="?page=post&&postpage=saveEdit&&id=<?= $id ?>" enctype="multipart/form-data" method="POST">
                
                <div class="form-group">
                    <label class="col-lg-2 control-label">Tajuk :</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control input-sm" required name="p_title" value="<?= $title ?>">
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-2 control-label">Maklumat :</label>
                    <div class="col-lg-9">
                        <textarea id="p_post" name="p_post" class="form-control" rows="8" style="width:100%" required>		
                            <?= $post ?>
                        </textarea> 
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-2 control-label">Catatan :</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control input-sm" name="p_other" value="<?= $other ?>">
                    </div>
                </div>
        
                <div class="form-group">
                            	<label class="col-sm-2 control-label" for="input_other">Publikasi : </label>
                                <div class="col-sm-3">
                                    <select name="publish" class="form-control input-sm">
                                        <option value="0" <?=$publish == '0' ? ' selected="selected"' : ''?> >Tidak publik</option>
					<option value="1" <?=$publish == '1' ? ' selected="selected"' : ''?> >Umum</option>
					<option value="2" <?=$publish == '2' ? ' selected="selected"' : ''?> >Mahasiswa</option>
					<option value="3" <?=$publish == '3' ? ' selected="selected"' : ''?> >Guru</option>
                                    </select>
                                </div>
                            </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">BATAL</button>
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </div>
    </form>


</div>
    