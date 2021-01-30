<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ujian</h1>
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
                            Identitas Siswa
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
                <div class="col-md-8">
                    <!-- Default box -->
                    <form id="verifikasi">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Identitas Ujian</h3>
                            </div>
                            <div class="card-body">
                                <label for="">Nama Ujian</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama_ujian" id="nama_ujian" value="<?= $ujian['nama_ujian'] ?>" readonly>
                                </div>
                                <label for="">Mata Pelajaran</label>
                                <div class="form-group">
                                    <select name="category_id" class="form-control" disabled>
                                        <!-- <option value="">select category</option> -->
                                        <?php
                                        foreach ($all_category as $category) {
                                            $selected = ($category['id'] == $ujian['mapel_id']) ? ' selected="selected"' : "";

                                            echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['title'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <label for="">Kelas Tingkat</label>
                                <div class="form-group">
                                    <select name="kelas_tingkat" class="form-control" disabled>
                                        <?php
                                        $tingkat_values = array(
                                            '7' => '7',
                                            '8' => '8',
                                            '9' => '9',
                                        );

                                        foreach ($tingkat_values as $value => $display_text) {
                                            $selected = ($value == $ujian['kelas_tingkat']) ? ' selected="selected"' : "";

                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <label for="published_at" class="control-label">Batas Ujian</label>
                                <div class="form-group">
                                    <?php
                                    if ($ujian['waktu_selesai'] != '0000-00-00 00:00:00') {
                                        // jika waktu ujiannya ada batasnya
                                        $date = new DateTime($ujian['waktu_selesai']);
                                        $convert_date = $date->format('Y-m-d\TH:i:s');
                                        echo '<input type="datetime-local" class="has-datetimepicker form-control" value="' . $convert_date . '" readonly />';
                                    } else {
                                        echo '<input type="text" class="has-datetimepicker form-control" value="Tanpa Batas" readonly />';
                                    }
                                    ?>
                                </div>
                                <label for="">Token</label>
                                <input type="hidden" name="ujian_id" value="<?= $ujian['id'] ?>">
                                <input type="text" class="form-control" name="token" id="token">
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Laksanakan</button>
                            </div>
                            <!-- /.card-footer-->
                        </div>
                    </form>
                    <!-- /.card -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->