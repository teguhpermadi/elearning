<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h3><?php echo lang('index_heading'); ?></h3>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row ml-1 mb-3">
			<div class="btn-group" role="group" aria-label="Basic example">
				<a href="<?= base_url('auth/create_user') ?>" class="btn btn-primary">Tambah User</a>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">Upload User</button>
				<a href="<?= base_url('auth/create_group') ?>" class="btn btn-primary">Tambah Group</a>
				<a href="#" class="btn btn-primary">Cetak User</a>
			</div>
		</div>


		<?php if ($message) { ?>
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				<?php echo $message; ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php } ?>

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3>Daftar Admin</h3>
			</div>
			<div class="card-body">
				<table class="table table-hover" id="tableAdmin">
					<thead>
						<tr>
							<th><?php echo lang('index_fname_th'); ?></th>
							<th><?php echo lang('index_lname_th'); ?></th>
							<th><?php echo lang('index_email_th'); ?></th>
							<th><?php echo lang('index_status_th'); ?></th>
							<th><?php echo lang('index_action_th'); ?></th>
						</tr>
					</thead>
					<tbody>

						<?php foreach ($admin as $a) : ?>
							<tr>
								<td><?php echo htmlspecialchars($a->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php echo htmlspecialchars($a->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php echo htmlspecialchars($a->email, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php echo ($a->active) ? anchor("auth/deactivate/" . $a->id, lang('index_active_link'), 'class="btn btn-info btn-sm"') : anchor("auth/activate/" . $a->id, lang('index_inactive_link'), 'class="btn btn-warning btn-sm"'); ?></td>
								<td><?php echo anchor("auth/edit_user/" . $a->id, 'Edit', 'class="btn btn-secondary btn-sm"'); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->

		<div class="card">
			<div class="card-header">
				<h3>Daftar Guru</h3>
			</div>
			<div class="card-body">
				<table class="table table-hover" id="tableGuru">
					<thead>

						<tr>
							<th><?php echo lang('index_fname_th'); ?></th>
							<th><?php echo lang('index_lname_th'); ?></th>
							<th><?php echo lang('index_email_th'); ?></th>
							<th><?php echo lang('index_status_th'); ?></th>
							<th><?php echo lang('index_action_th'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($guru as $g) : ?>
							<tr>
								<td><?php echo htmlspecialchars($g->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php echo htmlspecialchars($g->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php echo htmlspecialchars($g->email, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php echo ($g->active) ? anchor("auth/deactivate/" . $g->id, lang('index_active_link'), 'class="btn btn-info btn-sm"') : anchor("auth/activate/" . $g->id, lang('index_inactive_link'), 'class="btn btn-warning btn-sm"'); ?></td>
								<td><?php echo anchor("auth/edit_user/" . $g->id, 'Edit', 'class="btn btn-secondary btn-sm"'); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="card">
			<div class="card-header">
				<h3>Daftar Siswa</h3>
			</div>
			<div class="card-body">
				<table class="table table-hover" id="tableSiswa">
					<thead>
						<tr>
							<th><?php echo lang('index_fname_th'); ?></th>
							<th><?php echo lang('index_lname_th'); ?></th>
							<th><?php echo lang('index_email_th'); ?></th>
							<th><?php echo lang('index_status_th'); ?></th>
							<th><?php echo lang('index_action_th'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($siswa as $s) : ?>
							<tr>
								<td><?php echo htmlspecialchars($s->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php echo htmlspecialchars($s->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php echo htmlspecialchars($s->email, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php echo ($s->active) ? anchor("auth/deactivate/" . $s->id, lang('index_active_link'), 'class="btn btn-info btn-sm"') : anchor("auth/activate/" . $s->id, lang('index_inactive_link'), 'class="btn btn-warning btn-sm"'); ?></td>
								<td><?php echo anchor("auth/edit_user/" . $s->id, 'Edit', 'class="btn btn-secondary btn-sm"'); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="uploadModalLabel">Upload User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php echo form_open_multipart('auth/do_upload'); ?>
			<div class="modal-body">
				<a href="<?= base_url('auth/download') ?>" class="btn btn-info">Download Template</a>
				<br><br>
				<input type="file" name="userfile" size="20" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Upload</button>
			</div>
			</form>
		</div>
	</div>
</div>