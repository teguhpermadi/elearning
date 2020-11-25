<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Mapel Edit</h3>
            </div>
			<?php echo form_open('mapel/edit/'.$mapel['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nama" class="control-label"><span class="text-danger">*</span>Nama</label>
						<div class="form-group">
							<input type="text" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $mapel['nama']); ?>" class="form-control" id="nama" />
							<span class="text-danger"><?php echo form_error('nama');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="kode" class="control-label"><span class="text-danger">*</span>Kode</label>
						<div class="form-group">
							<input type="text" name="kode" value="<?php echo ($this->input->post('kode') ? $this->input->post('kode') : $mapel['kode']); ?>" class="form-control" id="kode" />
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