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
				<h3 class="card-title">Form Tambah Guru</h3>
			</div>
			<?php echo form_open_multipart('guru/add'); ?>

			<div class="card-body">
				
				<div class="col-md-12">
					<label for="nomor_induk" class="control-label">Nomor Induk</label>
					<div class="form-group">
						<input type="text" name="nomor_induk" value="<?php echo $this->input->post('nomor_induk'); ?>" class="form-control" id="nomor_induk" />
					</div>
				</div>
				<div class="col-md-12">
					<label for="first_name" class="control-label">First Name</label>
					<div class="form-group">
						<input type="text" name="first_name" value="<?php echo $this->input->post('first_name'); ?>" class="form-control" id="first_name" />
					</div>
				</div>
				<div class="col-md-12">
					<label for="no_hp" class="control-label">No HP</label>
					<div class="form-group">
						<input type="text" name="no_hp" value="<?php echo $this->input->post('no_hp'); ?>" class="form-control" id="no_hp" />
					</div>
				</div>
				<div class="col-md-12">
					<label for="email" class="control-label"><span class="text-danger">*</span>Email</label>
					<div class="form-group">
						<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
						<span class="text-danger"><?php echo form_error('email'); ?></span>
					</div>
				</div>
				<div class="col-md-12">
					<label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
					<div class="form-group">
						<input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
						<span class="text-danger"><?php echo form_error('password'); ?></span>
					</div>
				</div>
				<div class="col-md-12">
					<label for="foto" class="control-label">Foto</label>
					<div class="form-group">
						<input type="file" name="userfile" size="20" accept="image/jpeg"/>
						<br>
						<span class="text-info">Hanya file <strong>JPG maksimal 1000kb</strong></span>

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