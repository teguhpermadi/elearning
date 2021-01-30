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
                        <div class="text-center">
                            <?php
                            if (user_info()['foto'] != null) {
                                $foto = base_url('uploads/') . $user['foto'];
                            } else {
                                $foto = base_url('assets/images/avatar_default.png');
                            }
                            ?>
                            <img class="profile-user-img img-fluid img-circle" src="<?= $foto ?>" alt="User profile picture">
                        </div>
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" value="<?= user_info()['first_name'] . ' ' . user_info()['last_name'] ?>" readonly>
                        <label for="">Nomor Induk</label>
                        <input type="text" class="form-control" value="<?= user_info()['nomor_induk'] ?>" readonly>
                        <label for="">Tempat Lahir</label>
                        <input type="text" class="form-control" value="<?= user_info()['tempat_lahir'] ?>" readonly>
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control" value="<?= user_info()['tanggal_lahir'] ?>" readonly>
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
                                <td>Waktu Mulai</td>
                                <td><?= $result['waktu_mulai'] ?></td>
                            </tr>
                            <tr>
                                <td>Waktu Selesai</td>
                                <td><?= $result['waktu_selesai'] ?></td>
                            </tr>
                            <tr>
                                <td>Durasi Mengerjakan</td>
                                <td><?php
                                    $waktu_mulai = new DateTime($result['waktu_mulai']);
                                    $waktu_selesai = new DateTime($result['waktu_selesai']);
                                    $durasi = $waktu_mulai->diff($waktu_selesai);
                                    echo $durasi->format('%i menit')

                                    ?>
                                </td>
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