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

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Soal Ujian</h3>
            </div>
            <div class="card-body">
                <div id="reviewsoal"></div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#tambah">Tambah Soal</button>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#sisipkan">Sisipkan Soal</button>
                <a href="<?= base_url('ujian') ?>" class="btn btn-primary">Selesai</a>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal sisipkan -->
<div class="modal fade" id="sisipkan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sisipkan Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formSisipkan">
                <div class="modal-body">
                    <table class="table table-striped soal-datatable" style="width: 100%;">
                        <thead>
                            <tr>
                                <td>Mapel</td>
                                <td>Tingkat</td>
                                <td>Jenis</td>
                                <td>Soal</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_soal as $soal) : ?>
                                <tr>
                                    <td><?= $soal['namamapel'] ?></td>
                                    <td><?= $soal['tingkat'] ?></td>
                                    <td><?= ($soal['jenis_soal'] == '1') ? 'Pilihan Ganda' : 'Isian'; ?></td>
                                    <td><?= word_limiter($soal['soal'], 10) ?></td>
                                    <td><button type="button" class="btn btn-primary btn-sm btn-sisipkan" data-soalid="<?= $soal['id'] ?>">Sisipkan</button></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambah">
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
                        <textarea class="form-control summernote" name="petunjuk" id="petunjuk" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Pembahasan</label>
                        <textarea class="form-control summernote" name="pembahasan" id="pembahasan" ></textarea>
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