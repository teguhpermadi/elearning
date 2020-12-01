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
							<select name="id_kelas" class="form-control">
								<option value="">select kelas</option>
								<?php
								foreach ($all_kelas as $kelas) {
									$selected = ($kelas['id'] == $this->input->post('id_kelas')) ? ' selected="selected"' : "";

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
								<?php foreach ($users as $u) { ?>
									<option value='<?= $u['id'] ?>'><?= $u['first_name'] ?></option>
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