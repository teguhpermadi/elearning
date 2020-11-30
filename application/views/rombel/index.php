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

        <div class="btn-group mb-3" role="group" aria-label="Basic example">
            <a href="<?php echo site_url('rombel/add'); ?>" class="btn btn-primary">Tambah</a>
            <button type="button" class="btn btn-primary">Upload</button>
            <button type="button" class="btn btn-primary">Cetak</button>
        </div>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Rombel</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Id Kelas</th>
                        <th>Id Siswa</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($rombel as $r) { ?>
                        <tr>
                            <td><?php echo $r['id']; ?></td>
                            <td><?php echo $r['id_kelas']; ?></td>
                            <td><?php echo $r['id_siswa']; ?></td>
                            <td>
                                <a href="<?php echo site_url('rombel/edit/' . $r['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                <a href="<?php echo site_url('rombel/remove/' . $r['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->