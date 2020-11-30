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
        <div class="btn-group mb-3" role="group" aria-label="Basic example">
            <a href="<?php echo site_url('kelas/add'); ?>" class="btn btn-primary">Tambah</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">Upload</button>
            <button type="button" class="btn btn-primary">Cetak</button>
        </div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Kelas</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="tableKelas">
                    <thead>
                        <tr>
                            <th>Tingkat</th>
                            <th>Nama</th>
                            <th>Kode</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kelas as $k) { ?>
                            <tr>
                                <td><?php echo $k['tingkat']; ?></td>
                                <td><?php echo $k['nama']; ?></td>
                                <td><?php echo $k['kode']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('kelas/edit/' . $k['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                    <a href="<?php echo site_url('kelas/remove/' . $k['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Hapus</a>
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
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('kelas/do_upload'); ?>
            <div class="modal-body">
                <a href="<?= base_url('kelas/download') ?>" class="btn btn-info">Download Template</a>
                <br><br>
                <input type="file" name="userfile" size="20" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>