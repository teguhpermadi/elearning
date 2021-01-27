<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hasil Ujian</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Identitas Siswa</h3>
                    </div>
                    <div class="card-body">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" value="<?= user_info()['first_name'] . ' ' . user_info()['last_name'] ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Rekap Ujian
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td>Nama Ujian</td>
                                <td><?= $result['nama_ujian'] ?></td>
                            </tr>
                            <tr>
                                <td>Waktu Pengerjaan</td>
                                <td><?= $result['waktu_ujian'] ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Benar</td>
                                <td><?= $result['jumlah_benar'] ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Salah</td>
                                <td><?= $result['jumlah_salah'] ?></td>
                            </tr>
                            <tr>
                                <td>Nilai</td>
                                <td><?= $result['nilai'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->