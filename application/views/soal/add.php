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

        <?php echo form_open('soal/add'); ?>
        <div class="card">
            <div class="card-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="mapel_id" class="control-label">Mapel</label>
                        <div class="form-group">
                            <select name="mapel_id" class="form-control">
                                <?php
                                foreach ($all_mapel as $mapel) {
                                    $selected = ($mapel['id'] == $this->input->post('mapel_id')) ? ' selected="selected"' : "";

                                    echo '<option value="' . $mapel['id'] . '" ' . $selected . '>' . $mapel['title'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="tingkat" class="control-label">Tingkat</label>
                        <div class="form-group">
                            <select name="tingkat" class="form-control" required>
                            <option value="">Pilih</option>
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
                        <div class="form-group" >
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
                    <div class="col-md-6">
                        <label for="skor" class="control-label">Skor</label>
                        <div class="form-group">
                            <input type="number" name="skor" value="<?php echo $this->input->post('skor'); ?>" class="form-control" id="skor" min='0' max='100' required/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="soal" class="control-label">Soal</label>
                        <div class="form-group">
                            <textarea type="text" name="soal" value="<?php echo $this->input->post('soal'); ?>" class="form-control summernote" id="soal" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="kunci" class="control-label">Kunci</label>
                        <div class="form-group" id="kunci_isian">
                            <textarea type="text" name="kunci[]" id='kunci' value="<?php echo $this->input->post('kunci'); ?>" class="form-control summernote" id="kunci"></textarea>
                        </div>
                        <div class="form-group" id="kunci_opsi">
                            <select name="kunci[]" class="form-control">
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
                    
                    <div class="col-md-12">
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
                    <div class="col-md-12">
                        <label for="petunjuk" class="control-label">Petunjuk</label>
                        <div class="form-group">
                            <textarea type="text" name="petunjuk" id="petunjuk" value="<?php echo $this->input->post('petunjuk'); ?>" class="form-control summernote" id="petunjuk"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="pembahasan" class="control-label">Pembahasan</label>
                        <div class="form-group">
                            <textarea type="text" name="pembahasan" id="pembahasan" value="<?php echo $this->input->post('pembahasan'); ?>" class="form-control summernote" id="pembahasan"></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </div>

        <?php echo form_close(); ?>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->