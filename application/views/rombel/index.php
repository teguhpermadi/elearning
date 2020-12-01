<style>
    .area {
        height: 250px;
        width: 100%;
        margin: 0 auto;
        overflow: hidden;
    }

    .area:hover {
        overflow-y: scroll;
    }
</style>

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

        <div class="row">
            <?php foreach ($kelas as $k) { ?>
                <?php
                // dapatkan siswa dalam rombel berdasarkan id kelasnya
                $siswa = $this->Rombel_model->get_siswa_by_kelas($k['id']);
                $count = count($siswa);
                // print_r($siswa);
                ?>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4><?= $k['nama'] ?>
                            <span class="badge badge-info float-right"><?= $count ?> siswa</span>
                            </h4>
                        </div>
                        <div class="card-body">

                            <ul class="list-group list-group-flush area">
                                <?php foreach ($siswa as $s) { ?>
                                    <li class="list-group-item"><?= $s['first_name'] ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary btn-sm" href="<?= base_url('rombel/edit/' . $k['id']) ?>">Edit</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->