<br>
<div class="well">
    <h4><span class="glyphicon glyphicon-new-window"></span> <b>TAMBAH MAKLUMAT</b></h4>
    <hr>
    <form class="form-horizontal" action="?page=post&&postpage=saveAdd" enctype="multipart/form-data" method="POST">
                
                <div class="form-group">
                    <label class="col-lg-2 control-label">Tajuk :</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control input-sm" required name="p_title">
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-2 control-label">Maklumat :</label>
                    <div class="col-lg-9">
                        <textarea id="p_post" name="p_post" class="form-control" rows="8" style="width:100%" required>		
                        </textarea> 
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-lg-2 control-label">Catatan :</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control input-sm" name="p_other">
                    </div>
                </div>
        
                <div class="form-group">
                            	<label class="col-sm-2 control-label" for="input_other">Publikasi : </label>
                                <div class="col-sm-3">
                                    <select name="publish" class="form-control input-sm">
                                        <option value="0">Tidak publik</option>
					<option value="1">Umum</option>
					<option value="2">Mahasiswa</option>
					<option value="3">Guru</option>
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
    