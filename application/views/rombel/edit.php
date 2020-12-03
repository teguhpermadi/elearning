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
				<h3 class="card-title">Edit Rombel</h3>
			</div>
			<?php echo form_open('rombel/update'); ?>
			<div class="card-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_kelas" class="control-label"><span class="text-danger">*</span>Kelas</label>
						<div class="form-group">
							<select name="id_kelas" class="form-control" disabled>
								<option value="">select kelas</option>
								<?php
								foreach ($all_kelas as $kelas) {
									$selected = ($kelas['id'] == $id_kelas) ? ' selected="selected"' : "";

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
							<select multiple="multiple" class="select" name="id_siswa[]">
								<?php foreach ($rombel as $r) {
									if ($r['check'] == null) {
										$selected = ''; // jika siswa belum mendapatkan rombel
									} elseif ($r['check'] == $id_kelas) {
										$selected = 'selected'; // jika siswa berada dalam rombel ini
									} else {
										$selected = 'disabled'; // jika siswa berada dalam rombel lain
									}
								?>
									<option value='<?= $r['id'] ?>' <?= $selected ?>><?= $r['first_name'] ?></option>
								<?php } ?>
							</select>

						</div>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<input type="hidden" name="id_kelas" value="<?= $id_kelas ?>">
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