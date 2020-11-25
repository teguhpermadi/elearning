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
		<?php if(!$profil_sekolah){ ?>
		<div class="alert alert-danger" role="alert">
			Profil sekolah mu tidak lengkap. <a href="<?= base_url('profil_sekolah/add'); ?>" class="alert-link">Tambahkan</a> untuk melengkapi data profil sekolah mu.
		</div>
		<?php } ?>

		<!-- jika ada data yang baru ditambahkan, tampilkan pesan ini -->
		<?php if($this->session->flashdata('tambah')){ ?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			Profil sekolah berhasil <strong>ditambahkan.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php } ?>

		<!-- jika data profil sekolah baru saja di update, tampilkan pesan ini -->
		<?php if($this->session->flashdata('ubah')){ ?>
		<div class="alert alert-info alert-dismissible fade show" role="alert">
			Profil sekolah berhasil <strong>diubah.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php } ?>

	</section>

	<!-- Main content -->
	<section class="content">
		<?php foreach ($profil_sekolah as $p) { ?>
			<!-- Default box -->
			<div class="card">
				<div class="card-header">
					<h3 class="card-title text-uppercase font-weight-bold"><?php echo $p['nama']; ?></h3>
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<tr>
							<td>Jalan</td>
							<td><?= $p['jalan'] ?></td>
						</tr>
						<tr>
							<td>Kelurahan</td>
							<td><?= $p['kelurahan'] ?></td>
						</tr>
						<tr>
							<td>Kecamatan</td>
							<td><?= $p['kecamatan'] ?></td>
						</tr>
						<tr>
							<td>Kota</td>
							<td><?= $p['kota'] ?></td>
						</tr>
						<tr>
							<td>Provinsi</td>
							<td><?= $p['provinsi'] ?></td>
						</tr>
						<tr>
							<td>Kode Pos</td>
							<td><?= $p['kodepos'] ?></td>
						</tr>
						<tr>
							<td>Telp</td>
							<td><?= $p['telp'] ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?= $p['email'] ?></td>
						</tr>
						<tr>
							<td>Website</td>
							<td><?= $p['website'] ?></td>
						</tr>
						<tr>
							<td>Logo</td>
							<td><?= $p['logo'] ?></td>
						</tr>
						<tr>
							<td>NPSN</td>
							<td><?= $p['npsn'] ?></td>
						</tr>
					</table>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<a href="<?php echo site_url('profil_sekolah/edit/' . $p['id']); ?>" class="btn btn-info"><span class="fa fa-pencil"></span> Edit</a>
					<a href="<?php echo site_url('profil_sekolah/remove/' . $p['id']); ?>" class="btn btn-danger"> Hapus</a>
				</div>
				<!-- /.card-footer-->
			</div>
			<!-- /.card -->
		<?php } ?>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->