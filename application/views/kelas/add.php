<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Kela Add</h3>
            </div>
            <?php echo form_open('kelas/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="tingkat" class="control-label"><span class="text-danger">*</span>Tingkat</label>
						<div class="form-group">
							<select name="tingkat" class="form-control">
								<option value="">select</option>
								<?php 
								$tingkat_values = array(
									'7'=>'7',
									'8'=>'8',
									'9'=>'9',
								);

								foreach($tingkat_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('tingkat')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('tingkat');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nama" class="control-label"><span class="text-danger">*</span>Nama</label>
						<div class="form-group">
							<input type="text" name="nama" value="<?php echo $this->input->post('nama'); ?>" class="form-control" id="nama" />
							<span class="text-danger"><?php echo form_error('nama');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="kode" class="control-label"><span class="text-danger">*</span>Kode</label>
						<div class="form-group">
							<input type="text" name="kode" value="<?php echo $this->input->post('kode'); ?>" class="form-control" id="kode" />
							<span class="text-danger"><?php echo form_error('kode');?></span>
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