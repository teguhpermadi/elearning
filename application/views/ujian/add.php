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

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" name="author_id">
                        <input type="hidden" name="mapel_id">
                        <input type="hidden" name="kelas_id">
                        <div class="form-group">
                            <input class="form-control" type="text" name="skor" id="skor" placeholder="skor">
                        </div>
                        <div class="form-group">
                            <textarea name="soal" class="form-control summernote" id="soal"></textarea>
                        </div>
                        <div class="form-group">
                            <select name="jenis_soal" class="form-control">
                                <!-- <option value="">select</option> -->
                                <?php
                                $published_values = array(
                                    'pilgan' => 'Pilihan Ganda',
                                    // '2' => 'Terjadwal',
                                    'isian' => 'Isian',
                                );

                                foreach ($published_values as $value => $display_text) {
                                    // $selected = ($value == $this->input->post('published')) ? ' selected="selected"' : "";
                                    $selected = '';
                                    echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                        <textarea name="opsi[]" class="form-control summernote" id="opsi[]"></textarea>
                        </div>
                        <button class="btn btn-primary">tambah pilihan</button>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Simpan soal</button>
                    </div>
                </div>
                <button class="btn btn-primary">Tambah Soal</button>
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
                            <input type="text" class="form-control" name="nama_ujian" id="nama_ujian">
                        </div>
                        <label for="">Kategori</label>
                        <div class="form-group">
                            <select name="category_id" class="form-control">
                                <!-- <option value="">select category</option> -->
                                <?php
                                foreach ($all_category as $category) {
                                    $selected = ($category['id'] == $this->input->post('category_id')) ? ' selected="selected"' : "";

                                    echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['title'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <label for="">Tag</label>
                        <div class="form-group">
                            <?php
                            foreach ($all_tag as $tag) {
                                $checked = ($tag['id'] == $this->input->post('tag_id')) ? ' checked="checked"' : "";

                                echo '<input type="checkbox" name="tag_id[]" value="' . $tag['id'] . '" ' . $checked . '/> ' . $tag['title'] . '<br>';
                            }
                            ?>
                        </div>
                        <label for="published" class="control-label">Published</label>
                        <div class="form-group">
                            <select name="published" class="form-control">
                                <!-- <option value="">select</option> -->
                                <?php
                                $published_values = array(
                                    '1' => 'Terbit',
                                    // '2' => 'Terjadwal',
                                    '0' => 'Draf',
                                );

                                foreach ($published_values as $value => $display_text) {
                                    // $selected = ($value == $this->input->post('published')) ? ' selected="selected"' : "";
                                    $selected = '';
                                    echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->