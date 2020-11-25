<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Siswa Edit</h3>
            </div>
			<?php echo form_open('siswa/edit/'.$siswa['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
						<div class="form-group">
							<input type="text" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $siswa['password']); ?>" class="form-control" id="password" />
							<span class="text-danger"><?php echo form_error('password');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="first_name" class="control-label">First Name</label>
						<div class="form-group">
							<input type="text" name="first_name" value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $siswa['first_name']); ?>" class="form-control" id="first_name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="last_name" class="control-label">Last Name</label>
						<div class="form-group">
							<input type="text" name="last_name" value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $siswa['last_name']); ?>" class="form-control" id="last_name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $siswa['email']); ?>" class="form-control" id="email" />
							<span class="text-danger"><?php echo form_error('email');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nomor_induk" class="control-label">Nomor Induk</label>
						<div class="form-group">
							<input type="text" name="nomor_induk" value="<?php echo ($this->input->post('nomor_induk') ? $this->input->post('nomor_induk') : $siswa['nomor_induk']); ?>" class="form-control" id="nomor_induk" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="foto" class="control-label">Foto</label>
						<div class="form-group">
							<input type="text" name="foto" value="<?php echo ($this->input->post('foto') ? $this->input->post('foto') : $siswa['foto']); ?>" class="form-control" id="foto" />
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