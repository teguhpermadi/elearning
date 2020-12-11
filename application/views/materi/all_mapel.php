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
        <?php foreach($all_mapel as $mapel){?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?=$mapel['nama'] ?></h3>
                    </div>
                    <div class="card-body">
                        Nama Guru
                        Jumlah materi
                        jumlah tugas
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url('materi/view_mapel/').$mapel['id'].'-'.$kelas['id'] ?>" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->