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

                <div class="col-md-6">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $mapel['nama'] ?></h3>
                        </div>
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <?php
                                if ($guru['foto'] != null) {
                                    $foto = base_url('uploads/') . $guru['foto'];
                                } else {
                                    $foto = base_url('assets/images/avatar_default.png');
                                }
                                ?>
                                <img class="profile-user-img img-fluid img-circle" src="<?= $foto ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $guru['first_name'] . ' ' . $guru['last_name'] ?></h3>


                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item" href="#">
                                    Materi
                                    <span class="badge badge-danger float-right"><?= $count_materi ?></span>
                                </li>
                                <li class="list-group-item">
                                    Tugas
                                    <span class="badge badge-danger float-right" href="#"><?= $count_tugas ?></span>
                                </li>
                                <li class="list-group-item">
                                    Tugas yang sudah dikerjakan
                                    <?php
                                    $tugas_dikerjakan = $this->Materi_model->count_tugas_dikerjakan($guru['id'], $mapel['id'], $kelas['id']);
                                    ?>
                                    <span class="badge badge-danger float-right" href="#"><?= $tugas_dikerjakan ?></span>
                                </li>
                                <li class="list-group-item">
                                    Tugas yang belum dikerjakan
                                    <?php
                                    $tugas_belum_dikerjakan = $count_tugas - $tugas_dikerjakan;
                                    ?>
                                    <span class="badge badge-danger float-right" href="#"><?= $tugas_belum_dikerjakan ?></span>
                                </li>
                            </ul>

                            <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('materi/view_mapel/') . $mapel['id'] . '-' . $kelas['id'] ?>" class="btn btn-primary btn-block">Lihat</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->