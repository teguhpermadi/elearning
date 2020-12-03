<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Pengajar</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Update Pengajar</h3>
			</div>
			<?php echo form_open('pengajar/update'); ?>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<label for="id_guru" class="control-label">Guru</label>
						<div class="form-group">
							<select name="id_guru" class="form-control" disabled>
								<option value="">select guru</option>
								<?php
								foreach ($all_guru as $guru) {
									$selected = ($guru['id'] == $pengajar['id_guru']) ? ' selected="selected"' : "";

									echo '<option value="' . $guru['id'] . '" ' . $selected . '>' . $guru['first_name'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
				</div>

				<!-- antisipasi kemungkinan 1 guru mengajar beberapa mapel sekaligus -->
				<?php
				foreach ($data_mapel as $dm) {
					
				?>

					<div class="row">
						<div class="col-md-6">
							<label for="id_mapel" class="control-label">Mapel</label>
							<div class="form-group">
								<select name="id_mapel" class="form-control" disabled>
									<option value="">select mapel</option>
									<?php
									foreach ($all_mapel as $mapel) {
										$selected = ($mapel['id'] == $dm['id_mapel']) ? ' selected="selected"' : "";

										echo '<option value="' . $mapel['id'] . '" ' . $selected . '>' . $mapel['nama'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<label for="id_kelas" class="control-label">Kelas</label>
							<div class="form-group">
								<select multiple="multiple" class="select" name="id_kelas[]">
									<?php
									foreach ($all_kelas as $kelas) {
										$selected = ($kelas['id'] == $this->input->post('id_kelas')) ? ' selected="selected"' : "";

										echo '<option value="' . $kelas['id'] . '" ' . $selected . '>' . $kelas['nama'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Simpan</button>
				<a href="<?= base_url('pengajar') ?>" class="btn btn-secondary">Batal</a>
			</div>
			<!-- /.card-footer-->
			<?php echo form_close(); ?>
		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->