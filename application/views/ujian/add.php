<style>
    input[type=radio] {
        transform: scale(2);
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ujian</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- awal form -->
        <form action="<?= base_url('ujian/save_ujian') ?>" method="POST">
            <div class="row">
                <div class="col-md-8">
                    <div id="reviewsoal"></div>
                    <hr>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahSoal">Tambah Soal</button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#sisipkanSoal">Sisipkan Soal</button>
                </div>
                <div class="col-md-4">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Ujian</h3>
                        </div>
                        <div class="card-body">
                            <label for="">Nama Ujian</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama_ujian" id="nama_ujian" required>
                            </div>
                            <label for="">Mata Pelajaran</label>
                            <div class="form-group">
                                <select name="category_id" class="form-control" required>
                                    <!-- <option value="">select category</option> -->
                                    <?php
                                    foreach ($all_category as $category) {
                                        $selected = ($category['id'] == $this->input->post('category_id')) ? ' selected="selected"' : "";

                                        echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['title'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <label for="">Kelas Tingkat</label>
                            <div class="form-group">
                                <select name="kelas_tingkat" class="form-control" required>
                                    <?php
                                    $tingkat_values = array(
                                        '7' => '7',
                                        '8' => '8',
                                        '9' => '9',
                                    );

                                    foreach ($tingkat_values as $value => $display_text) {
                                        $selected = ($value == $this->input->post('tingkat')) ? ' selected="selected"' : "";

                                        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <label for="published_at" class="control-label">Batas Ujian</label>
                            <div class="form-group">
                                <input type="datetime-local" name="waktu_selesai" class="has-datetimepicker form-control" />
                                <!-- <input type="datetime-local" name="published_at" value="<?php echo $this->input->post('published_at'); ?>" class="has-datetimepicker form-control" id="published_at" /> -->
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div id="soalujian"></div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- akhir form -->
        </form>

        <!-- Sisipkan Soal Modal -->
        <div class="modal fade" id="sisipkanSoal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sisipkan Soal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped soal-datatable" style="width: 100%;">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Soal</td>
                                    <td>Jenis</td>
                                    <td>Tingkat</td>
                                    <td>mapel</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($get_soal as $soal) : ?>
                                    <tr>
                                        <td><input type="checkbox" class="checkbox-soal" name="soal_id[]" id="soal_id" value="<?= $soal['id'] ?>"></td>
                                        <td><?php echo word_limiter($soal['soal'], 20); ?></td>
                                        <td><?= ($soal['jenis_soal'] == 1) ? '<span class="badge badge-info">Pilihan Ganda</span>' : '<span class="badge badge-info">Isian</span>' ?></td>
                                        <td><?= $soal['tingkat'] ?></td>
                                        <td><?= $soal['namamapel'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tambah Soal Modal -->
        <div class="modal fade" id="tambahSoal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Soal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formTambahSoal">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Mapel</label>
                                        <select name="mapel_id" class="form-control dropdown" id="mapel_id">
                                            <!-- <option value="">select category</option> -->
                                            <?php
                                            foreach ($all_category as $category) {
                                                $selected = ($category['id'] == $this->input->post('category_id')) ? ' selected="selected"' : "";

                                                echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['title'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="tingkat" class="control-label">Tingkat</label>
                                    <div class="form-group">
                                        <select name="tingkat" id="tingkat" class="form-control dropdown">
                                            <?php
                                            $tingkat_values = array(
                                                '7' => '7',
                                                '8' => '8',
                                                '9' => '9',
                                            );

                                            foreach ($tingkat_values as $value => $display_text) {
                                                $selected = ($value == $this->input->post('tingkat')) ? ' selected="selected"' : "";

                                                echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Skor</label>
                                        <input class="form-control" type="number" name="skor" id="skor" min=0 max=100>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Soal</label>
                                <textarea class="form-control summernote" name="soal" id="soal"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Jenis Soal</label>
                                <select name="jenis_soal" class="form-control dropdown" id="jenis_soal">
                                    <?php
                                    $jenis_soal_values = array(
                                        '1' => 'pilihan ganda',
                                        '2' => 'isian',
                                    );

                                    foreach ($jenis_soal_values as $value => $display_text) {
                                        $selected = ($value == $this->input->post('jenis_soal')) ? ' selected="selected"' : "";

                                        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kunci" class="control-label">Kunci</label>
                                <div class="form-group" id="kunci_isian">
                                    <textarea type="text" name="kunci[]" value="<?php echo $this->input->post('kunci'); ?>" class="form-control summernote"></textarea>
                                </div>
                                <div class="form-group" id="kunci_opsi">
                                    <select name="kunci[]" class="form-control dropdown">
                                        <?php
                                        $kunci_opsi_values = array(
                                            'a' => 'A',
                                            'b' => 'B',
                                            'c' => 'C',
                                            'd' => 'D',
                                        );

                                        foreach ($kunci_opsi_values as $value => $display_text) {
                                            $selected = ($value == $this->input->post('kunci')) ? ' selected="selected"' : "";

                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div id="col-opsi">
                                        <label for="opsi" class="control-label">Opsi</label>
                                        <table class="table table-striped">
                                            <tr>
                                                <td>A</td>
                                                <td><textarea name="opsi[]" id="kunci_opsi_a" class="form-control summernote" id="opsi"><?php echo $this->input->post('opsi[]'); ?></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>B</td>
                                                <td><textarea name="opsi[]" id="kunci_opsi_b" class="form-control summernote" id="opsi"><?php echo $this->input->post('opsi[]'); ?></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>C</td>
                                                <td><textarea name="opsi[]" id="kunci_opsi_c" class="form-control summernote" id="opsi"><?php echo $this->input->post('opsi[]'); ?></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>D</td>
                                                <td><textarea name="opsi[]" id="kunci_opsi_d" class="form-control summernote" id="opsi"><?php echo $this->input->post('opsi[]'); ?></textarea></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Petunjuk</label>
                                    <textarea class="summernote" name="petunjuk" id="petunjuk" rows="1"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Pembahasan</label>
                                    <textarea class="summernote" name="pembahasan" id="pembahasan" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->