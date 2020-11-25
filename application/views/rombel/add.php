<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Rombel Add</h3>
            </div>
            <?php echo form_open('rombel/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_kelas" class="control-label"><span class="text-danger">*</span>Kela</label>
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
							<span class="text-danger"><?php echo form_error('id_kelas');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_siswa" class="control-label"><span class="text-danger">*</span>Siswa</label>
						<div class="form-group">
							<select name="id_siswa" class="form-control">
								<option value="">select siswa</option>
								<?php 
								foreach($all_siswa as $siswa)
								{
									$selected = ($siswa['id'] == $this->input->post('id_siswa')) ? ' selected="selected"' : "";

									echo '<option value="'.$siswa['id'].'" '.$selected.'>'.$siswa['first_name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_siswa');?></span>
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