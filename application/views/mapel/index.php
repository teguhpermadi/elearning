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

        <div class="btn-group mb-3" role="group" aria-label="Basic example">
            <a href="<?php echo site_url('mapel/add'); ?>" class="btn btn-primary">Tambah</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">Upload</button>
            <!-- <button type="button" class="btn btn-primary">Cetak</button> -->
        </div>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Mata Pelajaran</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped datatable">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kode</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mapel as $m) { ?>
                        <tr>
                            <td><?php echo $m['nama']; ?></td>
                            <td><?php echo $m['kode']; ?></td>
                            <td>
                                <a href="<?php echo site_url('mapel/edit/' . $m['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                <a href="<?php echo site_url('mapel/remove/' . $m['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

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
			<?php echo form_open_multipart('mapel/do_upload'); ?>
			<div class="modal-body">
				<a href="<?= base_url('mapel/download') ?>" class="btn btn-info">Download Template</a>
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