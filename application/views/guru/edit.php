<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Guru</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Form Edit Guru</h3>
			</div>
			<?php echo form_open('guru/edit/' . $guru['id']); ?>

			<div class="card-body">
				
				<div class="col-md-12">
					<label for="nomor_induk" class="control-label">Nomor Induk</label>
					<div class="form-group">
						<input type="text" name="nomor_induk" value="<?php echo ($this->input->post('nomor_induk') ? $this->input->post('nomor_induk') : $guru['nomor_induk']); ?>" class="form-control" id="nomor_induk" />
					</div>
				</div>
				<div class="col-md-12">
					<label for="first_name" class="control-label">First Name</label>
					<div class="form-group">
						<input type="text" name="first_name" value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $guru['first_name']); ?>" class="form-control" id="first_name" />
					</div>
				</div>
				<div class="col-md-12">
					<label for="no_hp" class="control-label">No HP</label>
					<div class="form-group">
						<input type="text" name="no_hp" value="<?php echo ($this->input->post('no_hp') ? $this->input->post('no_hp') : $guru['no_hp']); ?>" class="form-control" id="no_hp" />
					</div>
				</div>
				<div class="col-md-12">
					<label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
					<div class="form-group">
						<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $guru['email']); ?>" class="form-control" id="email" />
						<span class="text-danger"><?php echo form_error('email'); ?></span>
					</div>
				</div>
				<div class="col-md-12">
					<label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
					<div class="form-group">
						<input type="text" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $guru['password']); ?>" class="form-control" id="password" />
						<span class="text-danger"><?php echo form_error('password'); ?></span>
					</div>
				</div>
				<div class="col-md-12">
					<label for="foto" class="control-label">Foto</label>
					<div class="form-group">
						<input type="text" name="foto" value="<?php echo ($this->input->post('foto') ? $this->input->post('foto') : $guru['foto']); ?>" class="form-control" id="foto" />
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">
					Simpan
				</button>
				<a href="<?= base_url('guru') ?>" class="btn btn-secondary">Batal</a>

			</div>
			<!-- /.card-footer-->
			<?php echo form_close(); ?>

		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->