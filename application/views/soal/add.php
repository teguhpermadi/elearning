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
                    <h1>Bank Soal</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <?php echo form_open('soal/add'); ?>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Soal</h3>
            </div>
            <div class="card-body">
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="mapel_id" class="control-label">Mapel</label>
                            <div class="form-group">
                                <select name="mapel_id" class="form-control">
                                    <option value="">select mapel</option>
                                    <?php
                                    foreach ($all_mapel as $mapel) {
                                        $selected = ($mapel['id'] == $this->input->post('mapel_id')) ? ' selected="selected"' : "";

                                        echo '<option value="' . $mapel['id'] . '" ' . $selected . '>' . $mapel['nama'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="tingkat" class="control-label">Tingkat</label>
                            <div class="form-group">
                                <select name="tingkat" class="form-control">
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
                        <div class="col-md-6">
                            <label for="jenis_soal" class="control-label">Jenis Soal</label>
                            <div class="form-group">
                                <select name="jenis_soal" class="form-control" id="jenis_soal">
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
                        </div>
                        <!-- <div class="col-md-6">
                            <label for="aktif" class="control-label">Aktif</label>
                            <div class="form-group">
                                <select name="aktif" class="form-control">
                                    <option value="">select</option>
                                    <?php
                                    $aktif_values = array(
                                        '1' => 'Aktif',
                                        '0' => 'Non Aktif',
                                    );

                                    foreach ($aktif_values as $value => $display_text) {
                                        $selected = ($value == $this->input->post('aktif')) ? ' selected="selected"' : "";

                                        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <label for="skor" class="control-label"><span class="text-danger">*</span>Skor</label>
                            <div class="form-group">
                                <input type="text" name="skor" value="<?php echo $this->input->post('skor'); ?>" class="form-control" id="skor" />
                                <span class="text-danger"><?php echo form_error('skor'); ?></span>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <label for="author_id" class="control-label">Author Id</label>
                            <div class="form-group">
                                <input type="text" name="author_id" value="<?php echo $this->input->post('author_id'); ?>" class="form-control" id="author_id" />
                            </div>
                        </div> -->
                        <!-- <div class="col-md-6">
                            <label for="created_at" class="control-label">Created At</label>
                            <div class="form-group">
                                <input type="text" name="created_at" value="<?php echo $this->input->post('created_at'); ?>" class="has-datetimepicker form-control" id="created_at" />
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <label for="soal" class="control-label"><span class="text-danger">*</span>Soal</label>
                            <div class="form-group">
                                <input type="text" name="soal" value="<?php echo $this->input->post('soal'); ?>" class="form-control summernote" id="soal" />
                                <span class="text-danger"><?php echo form_error('soal'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-12" id="col-opsi">
                            <label for="opsi" class="control-label">Opsi</label>
                            <!-- <div class="form-group">
                                <textarea name="opsi" class="form-control" id="opsi"><?php echo $this->input->post('opsi'); ?></textarea>
                            </div> -->
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kunci[]" id="a" value="a" checked>
                                    <div class="ml-3">
                                        <input type="text" class="summernote" name="opsi[]">
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kunci[]" id="b" value="b">
                                    <div class="ml-3">
                                    <input type="text" class="summernote" name="opsi[]">
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kunci[]" id="c" value="c">
                                    <div class="ml-3">
                                    <input type="text" class="summernote" name="opsi[]">
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kunci[]" id="d" value="d">
                                    <div class="ml-3">
                                    <input type="text" class="summernote" name="opsi[]">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="kunci" class="control-label"><span class="text-danger">*</span>Kunci</label>
                            <div class="form-group">
                                <input type="text" name="kunci" value="<?php echo $this->input->post('kunci'); ?>" class="form-control summernote" id="kunci" />
                                <span class="text-danger"><?php echo form_error('kunci'); ?></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="petunjuk" class="control-label">Petunjuk</label>
                            <div class="form-group">
                                <input type="text" name="petunjuk" value="<?php echo $this->input->post('petunjuk'); ?>" class="form-control summernote" id="petunjuk" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="pembahasan" class="control-label">Pembahasan</label>
                            <div class="form-group">
                                <input type="text" name="pembahasan" value="<?php echo $this->input->post('pembahasan'); ?>" class="form-control summernote" id="pembahasan" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        <?php echo form_close(); ?>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->