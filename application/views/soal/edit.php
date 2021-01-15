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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit soal</h3>
            </div>
            <?php echo form_open('soal/edit/' . $soal['id']); ?>
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
                                        $selected = ($mapel['id'] == $soal['mapel_id']) ? ' selected="selected"' : "";

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
                                    <option value="">select</option>
                                    <?php
                                    $tingkat_values = array(
                                        '7' => '7',
                                        '8' => '8',
                                        '9' => '9',
                                    );

                                    foreach ($tingkat_values as $value => $display_text) {
                                        $selected = ($value == $soal['tingkat']) ? ' selected="selected"' : "";

                                        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="jenis_soal" class="control-label">Jenis Soal</label>
                            <div class="form-group">
                                <select name="jenis_soal" class="form-control">
                                    <option value="">select</option>
                                    <?php
                                    $jenis_soal_values = array(
                                        '1' => 'pilihan ganda',
                                        '2' => 'isian',
                                    );

                                    foreach ($jenis_soal_values as $value => $display_text) {
                                        $selected = ($value == $soal['jenis_soal']) ? ' selected="selected"' : "";

                                        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                        $selected = ($value == $soal['aktif']) ? ' selected="selected"' : "";

                                        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="author_id" class="control-label">Author Id</label>
                            <div class="form-group">
                                <input type="text" name="author_id" value="<?php echo ($this->input->post('author_id') ? $this->input->post('author_id') : $soal['author_id']); ?>" class="form-control" id="author_id" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="created_at" class="control-label">Created At</label>
                            <div class="form-group">
                                <input type="text" name="created_at" value="<?php echo ($this->input->post('created_at') ? $this->input->post('created_at') : $soal['created_at']); ?>" class="has-datetimepicker form-control" id="created_at" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="soal" class="control-label"><span class="text-danger">*</span>Soal</label>
                            <div class="form-group">
                                <input type="text" name="soal" value="<?php echo ($this->input->post('soal') ? $this->input->post('soal') : $soal['soal']); ?>" class="form-control" id="soal" />
                                <span class="text-danger"><?php echo form_error('soal'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="skor" class="control-label"><span class="text-danger">*</span>Skor</label>
                            <div class="form-group">
                                <input type="text" name="skor" value="<?php echo ($this->input->post('skor') ? $this->input->post('skor') : $soal['skor']); ?>" class="form-control" id="skor" />
                                <span class="text-danger"><?php echo form_error('skor'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="petunjuk" class="control-label">Petunjuk</label>
                            <div class="form-group">
                                <input type="text" name="petunjuk" value="<?php echo ($this->input->post('petunjuk') ? $this->input->post('petunjuk') : $soal['petunjuk']); ?>" class="form-control" id="petunjuk" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="kunci" class="control-label"><span class="text-danger">*</span>Kunci</label>
                            <div class="form-group">
                                <input type="text" name="kunci" value="<?php echo ($this->input->post('kunci') ? $this->input->post('kunci') : $soal['kunci']); ?>" class="form-control" id="kunci" />
                                <span class="text-danger"><?php echo form_error('kunci'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="pembahasan" class="control-label">Pembahasan</label>
                            <div class="form-group">
                                <input type="text" name="pembahasan" value="<?php echo ($this->input->post('pembahasan') ? $this->input->post('pembahasan') : $soal['pembahasan']); ?>" class="form-control" id="pembahasan" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="opsi" class="control-label">Opsi</label>
                            <div class="form-group">
                                <textarea name="opsi" class="form-control" id="opsi"><?php echo ($this->input->post('opsi') ? $this->input->post('opsi') : $soal['opsi']); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Save
                    </button>
                </div>
                <!-- /.card-footer-->
                <?php echo form_close(); ?>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->