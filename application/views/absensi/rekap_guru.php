<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Periksa Daftar Hadir</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <?php foreach ($all_class as $class) : ?>

            <!-- Default box -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kelas <?= $class['nama_kelas'] ?></h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Judul Postingan</th>
                                <th>Waktu Rilis</th>
                                <th>Absen Siswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_post as $post) : ?>
                                <tr>
                                    <td><?= $post['title'] ?></td>
                                    <td><?= $post['published_at'] ?></td>
                                    <td>
                                        <ol>
                                            <?php
                                            $all_siswa = $this->Absensi_model->get_all_siswa_by_class($class['kelas_id']);
                                            foreach ($all_siswa as $siswa) :
                                            ?>
                                                <li>
                                                    <?php
                                                    $check_absen = $this->Absensi_model->check_absen($siswa['user_id'], $post['id']);
                                                    echo $siswa['nama'];
                                                    echo ' <span class="badge badge-primary">' . $check_absen['time_access'] . '</span>';
                                                    ?>
                                                </li>
                                            <?php endforeach ?>
                                        </ol>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card -->

        <?php endforeach ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->