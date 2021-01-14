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
                        <div id="soalujian"></div>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
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
                    <div class="modal-body">
                        <form id="formTambahSoal">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <select name="mapelid" class="form-control">
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
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kelas</label>
                                        <select class="form-control" id="kelasid">
                                            <?php
                                            foreach ($all_tag as $tag) {
                                                $checked = ($tag['id'] == $this->input->post('tag_id')) ? ' checked="checked"' : "";

                                                echo '<option value="' . $tag['id'] . '">' . $tag['title'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Skor</label>
                                        <input class="form-control" type="number" min=0 max=100>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Soal</label>
                                <textarea class="form-control summernote" name="soal" id="soal"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Jenis Soal</label>
                                <select class="form-control" id="exampleFormControlSelect2">
                                    <option>Pilihan Ganda</option>
                                    <option>Isian</option>
                                </select>
                            </div>
                            <label for="exampleFormControlTextarea1">Opsi Jawaban</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <div class="ml-3">
                                        <label class="form-check-label summernote" for="exampleRadios1">
                                            Default radio
                                        </label>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <div class="ml-3">
                                        <label class="form-check-label summernote" for="exampleRadios1">
                                            Default radio
                                        </label>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <div class="ml-3">
                                        <label class="form-check-label summernote" for="exampleRadios1">
                                            Default radio
                                        </label>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <div class="ml-3">
                                        <label class="form-check-label summernote" for="exampleRadios1">
                                            Default radio
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Kunci</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Petunjuk</label>
                                <textarea class="summernote" name="" id="" rows="1"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Pembahasan</label>
                                <textarea class="summernote" name="" id="" rows="1"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

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
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($get_soal as $soal) : ?>
                                    <tr>
                                        <td><input type="checkbox" class="checkbox-soal" name="soal_id[]" id="soal_id" value="<?= $soal['id'] ?>"></td>
                                        <td><?php echo word_limiter($soal['soal'], 20); ?></td>
                                        <td><?= $soal['jenis_soal'] ?></td>
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

        <!-- edit soal modal -->
        <div class="modal fade" id="editSoalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Soal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->