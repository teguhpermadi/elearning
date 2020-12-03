<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Mata Pelajaran</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Tambah Mata Pelajaran</h3>
			</div>
			<?php echo form_open('mapel/edit/' . $mapel['id']); ?>

			<div class="card-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nama" class="control-label"><span class="text-danger">*</span>Nama</label>
						<div class="form-group">
							<input type="text" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $mapel['nama']); ?>" class="form-control" id="nama" />
							<span class="text-danger"><?php echo form_error('nama'); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="kode" class="control-label"><span class="text-danger">*</span>Kode</label>
						<div class="form-group">
							<input type="text" name="kode" value="<?php echo ($this->input->post('kode') ? $this->input->post('kode') : $mapel['kode']); ?>" class="form-control" id="kode" />
							<span class="text-danger"><?php echo form_error('kode'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">
					Simpan
				</button>
				<a href="<?= base_url('mapel') ?>" class="btn btn-secondary">Batal</a>
			</div>
			<!-- /.card-footer-->
			<?php echo form_close(); ?>

		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->