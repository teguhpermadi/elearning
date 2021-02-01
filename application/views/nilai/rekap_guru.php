<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rekap Nilai</h1>
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
                    <h3 class="card-title"><?= $class['nama_mapel'] ?> Kelas <?= $class['nama_kelas'] ?></h3>
                    <a href="<?= base_url('nilai/cetak/') . $class['mapel_id'].'-'. $class['kelas_id']?>" class="btn btn-secondary float-right">Cetak</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="bg-warning">
                            <tr>
                                <th style="width: 20px;">Nama Siswa</th>
                                <!-- dapatkan semua postingan terkait mapel ini dan kelas ini -->
                                <?php
                                $all_post = $this->Nilai_model->get_post_by_category_and_tag($class['mapel_id'], $class['kelas_id']);
                                foreach ($all_post as $post) :
                                ?>
                                    <th style="width: 15px;"><a href="<?= base_url('post/view/').$post['post_id'] ?>" style="color: black;"><?= $post['post_title'] ?></a></th>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $all_siswa = $this->Rombel_model->get_siswa_by_kelas($class['kelas_id']);

                            foreach ($all_siswa as $siswa) :
                            ?>
                                <tr>
                                    <td><?= $siswa['first_name'] . ' ' . $siswa['last_name'] ?></td>
                                    <?php
                                    // dapatkan semua postingan terkait mapel ini dan kelas ini
                                    $all_post = $this->Nilai_model->get_post_by_category_and_tag($class['mapel_id'], $class['kelas_id']);
                                    foreach ($all_post as $post) :
                                        // dapatkan semua nilai terkait siswa dan post ini
                                        $all_nilai = $this->Nilai_model->get_nilai_all_siswa_by_post($siswa['user_id'], $post['post_id']);
                                        if (!empty($all_nilai)) {
                                            foreach ($all_nilai as $nilai) :
                                                echo '<td>' . $nilai['nilai'] . '</td>';
                                            endforeach;
                                        } else {
                                            echo '<td>0</td>';
                                        }
                                    endforeach;
                                    ?>
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