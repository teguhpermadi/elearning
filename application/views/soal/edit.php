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
                            <input type="hidden" name="jenis_soal" value="<?= $soal['jenis_soal'] ?>">
                            <div class="form-group">
                                <select class="form-control" disabled>
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
                            <label for="skor" class="control-label">Skor</label>
                            <div class="form-group">
                                <input type="text" name="skor" value="<?php echo ($this->input->post('skor') ? $this->input->post('skor') : $soal['skor']); ?>" class="form-control" id="skor" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="soal" class="control-label">Soal</label>
                            <div class="form-group">
                                <textarea type="text" name="soal" class="form-control summernote" id="soal"><?= $soal['soal'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="kunci" class="control-label">Kunci</label>
                            <div class="form-group">
                                <?php
                                // cek jenis soal
                                if ($soal['jenis_soal'] == 2) {
                                    // jika panjang kuncinya lebih dari 1 berarti itu soal isian
                                    echo '<textarea type="text" name="kunci" class="form-control summernote" id="kunci">'.$soal['kunci'].'</textarea>';
                                } else {
                                    // jika tidak, maka itu soal pilihan ganda
                                    $kunci_opsi_values = array(
                                        'a' => 'A',
                                        'b' => 'B',
                                        'c' => 'C',
                                        'd' => 'D',
                                    );
                                    echo '<select name="kunci" class="form-control">';
                                    foreach ($kunci_opsi_values as $value => $display_text) {
                                        $selected = ($value == $soal['kunci']) ? ' selected="selected"' : "";
    
                                        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                    };

                                    echo '</select>';

                                };
                                ?>
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                        <?php
                        if($soal['jenis_soal'] == 1 ):
                            $obj = json_decode($soal['opsi']);
                        ?>
                            <label for="opsi" class="control-label">Opsi</label>
                        
                            <table class="table table-striped">
                            <tr>
                                <td>A</td>
                                <td><textarea name="opsi[]" id="kunci_opsi_a" class="form-control summernote" id="opsi"><?= $obj->{'a'} ?></textarea></td>
                            </tr>
                            <tr>
                                <td>B</td>
                                <td><textarea name="opsi[]" id="kunci_opsi_b" class="form-control summernote" id="opsi"><?= $obj->{'b'} ?></textarea></td>
                            </tr>
                            <tr>
                                <td>C</td>
                                <td><textarea name="opsi[]" id="kunci_opsi_c" class="form-control summernote" id="opsi"><?= $obj->{'c'} ?></textarea></td>
                            </tr>
                            <tr>
                                <td>D</td>
                                <td><textarea name="opsi[]" id="kunci_opsi_d" class="form-control summernote" id="opsi"><?= $obj->{'d'} ?></textarea></td>
                            </tr>
                        </table>
                        <?php endif ?>
                        </div>
                        <div class="col-md-12">
                            <label for="petunjuk" class="control-label">Petunjuk</label>
                            <div class="form-group">
                                <textarea type="text" name="petunjuk" class="form-control summernote" id="petunjuk"><?= $soal['petunjuk'] ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="pembahasan" class="control-label">Pembahasan</label>
                            <div class="form-group">
                                <textarea type="text" name="pembahasan" class="form-control summernote" id="pembahasan"><?= $soal['pembahasan'] ?></textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- /.card-body -->
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <!-- /.card-footer-->
            <?php echo form_close(); ?>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->