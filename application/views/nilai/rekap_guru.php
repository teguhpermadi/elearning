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
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Nama Siswa</td>
                                <!-- dapatkan semua postingan terkait mapel ini dan kelas ini -->
                                <?php
                                $all_post = $this->Nilai_model->get_post_by_category_and_tag($class['mapel_id'], $class['kelas_id']);
                                foreach ($all_post as $post) :
                                ?>
                                    <td><?= $post['post_title'] ?></td>
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
                                        foreach($all_nilai as $nilai):
                                            echo '<td>'.$nilai['nilai'].'</td>';
                                        endforeach;
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