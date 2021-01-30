<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ujian</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <a href="<?php echo site_url('ujian/add'); ?>" class="btn btn-primary ml-2 mb-3">Tambah</a>
        </div>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Ujian</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <td>Nama Ujian</td>
                            <td>Published at</td>
                            <td>Jumlah Soal</td>
                            <td>Kategori</td>
                            <td>Kelas Tingkat</td>
                            <td>Durasi</td>
                            <td>Batas Ujian</td>
                            <td>Token</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($all_ujian as $ujian): ?>
                        <tr>
                            <td><a href="<?= base_url('ujian/monitoring/').$ujian['id'] ?>"><?= $ujian['nama_ujian'] ?></a></td>
                            <td><?= $ujian['created_at']?></td>
                            <td><?php
                            $count = $this->Ujian_model->count_soal($ujian['id']);
                            echo 'Total Soal: '.$count['total'].'<br>';
                            echo 'Pilihan Ganda: '.$count['pilgan'].'<br>';
                            echo 'Isian: '.$count['isian'];
                            ?></td>
                            <td><?= $ujian['nama_mapel']?></td>
                            <td><?= $ujian['kelas_tingkat']?></td>
                            <td><?= $ujian['durasi']?></td>
                            <td><?= ($ujian['waktu_selesai'] == '0000-00-00 00:00:00') ? '<span class="badge badge-secondary">Tanpa Batas</span>' : '<span class="badge badge-info">'.$ujian['waktu_selesai'].'</span>'; ?></td>
                            <td><h4><span class="badge badge-primary"><?= $ujian['token'] ?></span></h4></td>
                            <td>
                            <a class="btn btn-warning btn-sm" href="<?= base_url('ujian/edit/'.$ujian['id']) ?>">Edit</a>
                            <a class="btn btn-danger btn-sm" href="<?= base_url('ujian/delete_ujian/'.$ujian['id']) ?>">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
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