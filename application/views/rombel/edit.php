<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Rombel</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Tambah Rombel</h3>
			</div>
			<?php echo form_open('rombel/add'); ?>
			<div class="card-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_kelas" class="control-label"><span class="text-danger">*</span>Kelas</label>
						<div class="form-group">
							<select name="id_kelas" class="form-control" disabled>
								<option value="">select kelas</option>
								<?php
								foreach ($all_kelas as $kelas) {
									$selected = ($kelas['id'] == $rombel['id_kelas']) ? ' selected="selected"' : "";

									echo '<option value="' . $kelas['id'] . '" ' . $selected . '>' . $kelas['nama'] . '</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_kelas'); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_siswa" class="control-label"><span class="text-danger">*</span>Siswa</label>
						<div class="form-group">
							<select multiple="multiple" id="select" name="id_siswa[]">
								<?php foreach ($all_siswa as $siswa) { ?>
									<option value='<?= $siswa['id'] ?>'><?= $siswa['first_name'] ?></option>
								<?php } ?>
							</select>

						</div>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">
					Simpan
				</button>
				<a href="<?= base_url('rombel') ?>" class="btn btn-secondary">Batal</a>
			</div>
			<!-- /.card-footer-->
			<?php echo form_close(); ?>
		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Rombel Edit</h3>
			</div>
			<?php echo form_open('rombel/edit/' . $rombel['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_kelas" class="control-label"><span class="text-danger">*</span>Kela</label>
						<div class="form-group">
							<select name="id_kelas" class="form-control">
								<option value="">select kela</option>
								<?php
								foreach ($all_kelas as $kela) {
									$selected = ($kela['id'] == $rombel['id_kelas']) ? ' selected="selected"' : "";

									echo '<option value="' . $kela['id'] . '" ' . $selected . '>' . $kela['nama'] . '</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_kelas'); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_siswa" class="control-label"><span class="text-danger">*</span>Siswa</label>
						<div class="form-group">
							<select name="id_siswa" class="form-control">
								<option value="">select siswa</option>
								<?php
								foreach ($all_siswa as $siswa) {
									$selected = ($siswa['id'] == $rombel['id_siswa']) ? ' selected="selected"' : "";

									echo '<option value="' . $siswa['id'] . '" ' . $selected . '>' . $siswa['first_name'] . '</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_siswa'); ?></span>
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