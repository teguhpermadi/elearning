</style>
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

    <!-- tampilkan loading gif -->
    <div class="mx-auto loading" style="width: 200px;">
        <img src="<?= base_url('assets/images/loading.gif') ?>" alt="">
    </div>

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
                                <input type="hidden" name="ujian_id" id="ujian_id" value="<?= $ujian['id'] ?>">
                                <?php
                                $no = 1;
                                foreach ($all_soal as $soal) : ?>
                                    <div class="col-md-3">
                                        <button class="btn btn-block btn-outline-primary mb-2" id="soal-<?= $soal['soal_id'] ?>" onclick="load_soal(<?= $soal['soal_id'] ?>)"><?= $no++ ?></button>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#selesaiUjian">Selesai</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form id="jawabanSoal">
                        <div class="card">
                            <div class="card-header">
                                <div class="badge badge-primary" id="countdownExample">
                                    <h5>
                                        <div class="values"></div>
                                    </h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="soal"></div>
                                <hr>
                                <div id="jawab"></div>
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

<!-- Modal -->
<div class="modal fade" id="selesaiUjian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin ingin menyelesaikan ujian ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="finish">Selesai</button>
            </div>
        </div>
    </div>
</div>