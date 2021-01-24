<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $ujian['nama_ujian'] ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Daftar Soal
                        </div>
                        <div class="card-body">
                            <div class="row" id="daftarSoal">
                                <?php
                                $no = 1;
                                foreach ($all_soal as $soal) : ?>
                                    <div class="col-md-3">
                                        <button class="btn btn-block btn-outline-primary mb-2" id="soal-<?= $soal['soal_id'] ?>" onclick="load_soal(<?= $soal['soal_id'] ?>)"><?= $no++ ?></button>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form id="jawabanSoal">
                        <div class="card">
                            <div class="card-body">
                                <div id="soal"></div>
                                <hr>
                                <div id="jawab"></div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-secondary" id="prev">Kembali</button>
                                <button type="button" class="btn btn-secondary" id="next">Lanjut</button>
                                <button type="button" class="btn btn-danger">Selesai</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>