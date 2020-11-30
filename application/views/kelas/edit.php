<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Kelas</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Tambah Kelas</h3>
			</div>
			<?php echo form_open('kelas/edit/' . $kelas['id']); ?>

			<div class="card-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="tingkat" class="control-label"><span class="text-danger">*</span>Tingkat</label>
						<div class="form-group">
							<select name="tingkat" class="form-control">
								<option value="">select</option>
								<?php
								$tingkat_values = array(
									'7' => '7',
									'8' => '8',
									'9' => '9',
								);

								foreach ($tingkat_values as $value => $display_text) {
									$selected = ($value == $kelas['tingkat']) ? ' selected="selected"' : "";

									echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('tingkat'); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nama" class="control-label"><span class="text-danger">*</span>Nama</label>
						<div class="form-group">
							<input type="text" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $kelas['nama']); ?>" class="form-control" id="nama" />
							<span class="text-danger"><?php echo form_error('nama'); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="kode" class="control-label"><span class="text-danger">*</span>Kode</label>
						<div class="form-group">
							<input type="text" name="kode" value="<?php echo ($this->input->post('kode') ? $this->input->post('kode') : $kelas['kode']); ?>" class="form-control" id="kode" />
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
				<a href="<?= base_url('kelas') ?>" class="btn btn-secondary">Batal</a>
			</div>
			<!-- /.card-footer-->
			<?php echo form_close(); ?>

		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->