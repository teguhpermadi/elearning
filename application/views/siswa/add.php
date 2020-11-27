<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Siswa Add</h3>
			</div>
			<?php echo form_open('siswa/add'); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-12">
						<label for="id_user" class="control-label">Id User</label>
						<div class="form-group">
							<input type="text" name="id_user" value="<?php echo $this->input->post('id_user'); ?>" class="form-control" id="id_user" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="nama" class="control-label">Nama</label>
						<div class="form-group">
							<input type="text" name="nama" value="<?php echo $this->input->post('nama'); ?>" class="form-control" id="nama" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="hp" class="control-label">Hp</label>
						<div class="form-group">
							<input type="text" name="hp" value="<?php echo $this->input->post('hp'); ?>" class="form-control" id="hp" />
							<span class="text-danger"><?php echo form_error('hp'); ?></span>
						</div>
					</div>
					<div class="col-md-12">
						<label for="email" class="control-label">Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
							<span class="text-danger"><?php echo form_error('email'); ?></span>
						</div>
					</div>
					<div class="col-md-12">
						<label for="nomor_induk" class="control-label">Nomor Induk</label>
						<div class="form-group">
							<input type="text" name="nomor_induk" value="<?php echo $this->input->post('nomor_induk'); ?>" class="form-control" id="nomor_induk" />
							<span class="text-danger"><?php echo form_error('nomor_induk'); ?></span>
						</div>
					</div>
					<div class="col-md-12">
						<label for="foto" class="control-label">Foto</label>
						<div class="form-group">
							<input type="text" name="foto" value="<?php echo $this->input->post('foto'); ?>" class="form-control" id="foto" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="tempat_lahir" class="control-label">Tempat Lahir</label>
						<div class="form-group">
							<input type="text" name="tempat_lahir" value="<?php echo $this->input->post('tempat_lahir'); ?>" class="form-control" id="tempat_lahir" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="tanggal_lahir" class="control-label">Tanggal Lahir</label>
						<div class="form-group">
							<input type="text" name="tanggal_lahir" value="<?php echo $this->input->post('tanggal_lahir'); ?>" class="form-control" id="tanggal_lahir" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="alamat" class="control-label">Alamat</label>
						<div class="form-group">
							<input type="text" name="alamat" value="<?php echo $this->input->post('alamat'); ?>" class="form-control" id="alamat" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="biografi" class="control-label">Biografi</label>
						<div class="form-group">
							<input type="text" name="biografi" value="<?php echo $this->input->post('biografi'); ?>" class="form-control" id="biografi" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="url_fb" class="control-label">Url Fb</label>
						<div class="form-group">
							<input type="text" name="url_fb" value="<?php echo $this->input->post('url_fb'); ?>" class="form-control" id="url_fb" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="url_twitter" class="control-label">Url Twitter</label>
						<div class="form-group">
							<input type="text" name="url_twitter" value="<?php echo $this->input->post('url_twitter'); ?>" class="form-control" id="url_twitter" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="url_instagram" class="control-label">Url Instagram</label>
						<div class="form-group">
							<input type="text" name="url_instagram" value="<?php echo $this->input->post('url_instagram'); ?>" class="form-control" id="url_instagram" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="url_youtube" class="control-label">Url Youtube</label>
						<div class="form-group">
							<input type="text" name="url_youtube" value="<?php echo $this->input->post('url_youtube'); ?>" class="form-control" id="url_youtube" />
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