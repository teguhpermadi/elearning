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

        <?php foreach ($all_mapel as $mapel) :?>
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title text-uppercase font-weight-bold"><?= $mapel['nama_mapel'] ?></h3>
                </div>
                <div class="card-body">
                    <?php
                    $rerata = $this->Nilai_model->get_nilai_rerata(user_info()['id'], $mapel['mapel_id']);
                    ?>
                    <h5>
                        <span class="badge badge-warning">Rata-rata: <?= $rerata['rerata'] ?></span>
                    </h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50%;">Judul Postingan</th>
                                <th style="width: 50%;">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $all_post = $this->Nilai_model->get_post_by_category_and_tag($mapel['mapel_id'], $mapel['kelas_id']);
                            foreach ($all_post as $post) :
                            ?>
                                <tr>
                                    <td><a href="<?= base_url('post/view/') . $post['post_id'] ?>"><?= $post['post_title'] ?></a></td>
                                    <td>
                                        <?php $nilai = $this->Nilai_model->get_nilai_all_siswa_by_post(user_info()['id'], $post['post_id']);
                                        echo $nilai[0]['nilai'];
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endforeach ?>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->