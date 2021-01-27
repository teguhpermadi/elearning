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

	<section class="content">
		<!-- jika belum ada profil sekolah tampilkan tombol tambah profil -->
		<?php if (!$profil_sekolah) { ?>
			<div class="alert alert-danger" role="alert">
				Profil sekolah mu tidak lengkap. <a href="<?= base_url('profil_sekolah/add'); ?>" class="alert-link">Tambahkan</a> untuk melengkapi data profil sekolah mu.
			</div>
		<?php } ?>

		<!-- jika ada data yang baru ditambahkan, tampilkan pesan ini -->
		<?php if ($this->session->flashdata('tambah')) { ?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				Profil sekolah berhasil <strong>ditambahkan.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php } ?>

		<!-- jika data profil sekolah baru saja di update, tampilkan pesan ini -->
		<?php if ($this->session->flashdata('ubah')) { ?>
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				Profil sekolah berhasil <strong>diubah.</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php } ?>

	</section>

	<?php if($profil_sekolah['id']) : ?>
	
	<!-- Main content -->
	<section class="content">
			<!-- Default box -->
			<div class="card">
				<div class="card-header">
					<h3 class="card-title text-uppercase font-weight-bold"><?php echo $profil_sekolah['nama']; ?></h3>
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<tr>
							<td>Jalan</td>
							<td><?= $profil_sekolah['jalan'] ?></td>
						</tr>
						<tr>
							<td>Kelurahan</td>
							<td><?= $profil_sekolah['kelurahan'] ?></td>
						</tr>
						<tr>
							<td>Kecamatan</td>
							<td><?= $profil_sekolah['kecamatan'] ?></td>
						</tr>
						<tr>
							<td>Kota</td>
							<td><?= $profil_sekolah['kota'] ?></td>
						</tr>
						<tr>
							<td>Provinsi</td>
							<td><?= $profil_sekolah['provinsi'] ?></td>
						</tr>
						<tr>
							<td>Kode Pos</td>
							<td><?= $profil_sekolah['kodepos'] ?></td>
						</tr>
						<tr>
							<td>Telp</td>
							<td><?= $profil_sekolah['telp'] ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?= $profil_sekolah['email'] ?></td>
						</tr>
						<tr>
							<td>Website</td>
							<td><?= $profil_sekolah['website'] ?></td>
						</tr>
						<tr>
							<td>Logo</td>
							<td>
								<img src="<?= base_url('uploads/') . $profil_sekolah['logo'] ?>" class="img-thumbnail" style="height: 150px;">
							</td>
						</tr>
						<tr>
							<td>NPSN</td>
							<td><?= $profil_sekolah['npsn'] ?></td>
						</tr>
					</table>
				</div>
				<!-- /.card-body -->
				<?php if(user_info()['role'] == 'admin'):?>
				<div class="card-footer">
					<a href="<?php echo site_url('profil_sekolah/edit/' . $profil_sekolah['id']); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> Edit</a>
					<a href="<?php echo site_url('profil_sekolah/remove/' . $profil_sekolah['id']); ?>" class="btn btn-danger"> Hapus</a>
				</div>
				<?php endif ?>
				<!-- /.card-footer-->
			</div>
			<!-- /.card -->
	</section>
	<!-- /.content -->

	<?php endif ?>
</div>
<!-- /.content-wrapper -->