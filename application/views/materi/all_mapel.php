<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mata Pelajaran <?= $kelas['nama'] ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <?php foreach ($all_mapel as $mapel) { 
                $guru = $this->Materi_model->get_guru_by_mapel_kelas($mapel['id'], $kelas['id']);
                $count_materi = $this->Materi_model->count_materi_by_guru_mapel_kelas($guru['id'], $mapel['id'], $kelas['id']);
                $count_tugas = $this->Materi_model->count_tugas_by_guru_mapel_kelas($guru['id'], $mapel['id'], $kelas['id']);
                ?>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $mapel['nama'] ?></h3>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>Pengajar: <?= $guru['first_name'] . ' ' .$guru['last_name'] ?> </li>
                                <li>Materi: <?= $count_materi ?> postingan</li>
                                <li>Tugas: <?= $count_tugas ?> postingan</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('materi/view_mapel/') . $mapel['id'] . '-' . $kelas['id'] ?>" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->