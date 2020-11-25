<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Pengajar Add</h3>
            </div>
            <?php echo form_open('pengajar/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_mapel" class="control-label">Mapel</label>
						<div class="form-group">
							<select name="id_mapel" class="form-control">
								<option value="">select mapel</option>
								<?php 
								foreach($all_mapel as $mapel)
								{
									$selected = ($mapel['id'] == $this->input->post('id_mapel')) ? ' selected="selected"' : "";

									echo '<option value="'.$mapel['id'].'" '.$selected.'>'.$mapel['nama'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_guru" class="control-label">Guru</label>
						<div class="form-group">
							<select name="id_guru" class="form-control">
								<option value="">select guru</option>
								<?php 
								foreach($all_guru as $guru)
								{
									$selected = ($guru['id'] == $this->input->post('id_guru')) ? ' selected="selected"' : "";

									echo '<option value="'.$guru['id'].'" '.$selected.'>'.$guru['first_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_kelas" class="control-label">Kela</label>
						<div class="form-group">
							<select name="id_kelas" class="form-control">
								<option value="">select kela</option>
								<?php 
								foreach($all_kelas as $kela)
								{
									$selected = ($kela['id'] == $this->input->post('id_kelas')) ? ' selected="selected"' : "";

									echo '<option value="'.$kela['id'].'" '.$selected.'>'.$kela['nama'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>