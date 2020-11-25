<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Profil Sekolah</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Form Profil Sekolah</h3>
			</div>
			<?php echo form_open('profil_sekolah/add'); ?>
			<div class="card-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nama" class="control-label"><span class="text-danger">*</span>Nama</label>
						<div class="form-group">
							<input type="text" name="nama" value="<?php echo $this->input->post('nama'); ?>" class="form-control" id="nama" />
							<span class="text-danger"><?php echo form_error('nama'); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="jalan" class="control-label">Jalan</label>
						<div class="form-group">
							<input type="text" name="jalan" value="<?php echo $this->input->post('jalan'); ?>" class="form-control" id="jalan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kelurahan" class="control-label">Kelurahan</label>
						<div class="form-group">
							<input type="text" name="kelurahan" value="<?php echo $this->input->post('kelurahan'); ?>" class="form-control" id="kelurahan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kecamatan" class="control-label">Kecamatan</label>
						<div class="form-group">
							<input type="text" name="kecamatan" value="<?php echo $this->input->post('kecamatan'); ?>" class="form-control" id="kecamatan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kota" class="control-label">Kota</label>
						<div class="form-group">
							<input type="text" name="kota" value="<?php echo $this->input->post('kota'); ?>" class="form-control" id="kota" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="provinsi" class="control-label">Provinsi</label>
						<div class="form-group">
							<input type="text" name="provinsi" value="<?php echo $this->input->post('provinsi'); ?>" class="form-control" id="provinsi" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kodepos" class="control-label">Kodepos</label>
						<div class="form-group">
							<input type="text" name="kodepos" value="<?php echo $this->input->post('kodepos'); ?>" class="form-control" id="kodepos" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="telp" class="control-label">Telp</label>
						<div class="form-group">
							<input type="text" name="telp" value="<?php echo $this->input->post('telp'); ?>" class="form-control" id="telp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email" class="control-label">Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="website" class="control-label">Website</label>
						<div class="form-group">
							<input type="text" name="website" value="<?php echo $this->input->post('website'); ?>" class="form-control" id="website" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="logo" class="control-label"><span class="text-danger">*</span>Logo</label>
						<div class="form-group">
							<input type="text" name="logo" value="<?php echo $this->input->post('logo'); ?>" class="form-control" id="logo" />
							<span class="text-danger"><?php echo form_error('logo'); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="npsn" class="control-label"><span class="text-danger">*</span>Npsn</label>
						<div class="form-group">
							<input type="text" name="npsn" value="<?php echo $this->input->post('npsn'); ?>" class="form-control" id="npsn" />
							<span class="text-danger"><?php echo form_error('npsn'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">
					Simpan
				</button>
			</div>
			<!-- /.card-footer-->
			<?php echo form_close(); ?>
		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->