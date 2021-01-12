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
                <div id="reviewsoal">
                    <div class="card card-primary card-outline direct-chat direct-chat-primary">
                        <div class="card-header">
                            <div class="card-tools">
                                <span data-toggle="tooltip" title="3 New Messages" class="badge bg-primary">Jenis Soal</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Opsi Jawaban" data-widget="chat-pane-toggle">
                                    <i class="fas fa-question-circle"></i>
                                </button>

                            </div>
                            <h3 class="card-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum aut minima dicta nulla iusto impedit laboriosam at doloremque vel. Voluptate, sapiente laboriosam. Modi ipsa ad cum rerum suscipit cupiditate facilis.</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <ol>
                                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, repellendus ducimus. Adipisci minima, iusto totam saepe quae dignissimos? Nam quidem tempore ea perferendis praesentium ad deleniti accusantium! Adipisci, quam nihil.</li>
                                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, repellendus ducimus. Adipisci minima, iusto totam saepe quae dignissimos? Nam quidem tempore ea perferendis praesentium ad deleniti accusantium! Adipisci, quam nihil.</li>
                                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, repellendus ducimus. Adipisci minima, iusto totam saepe quae dignissimos? Nam quidem tempore ea perferendis praesentium ad deleniti accusantium! Adipisci, quam nihil.</li>
                                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, repellendus ducimus. Adipisci minima, iusto totam saepe quae dignissimos? Nam quidem tempore ea perferendis praesentium ad deleniti accusantium! Adipisci, quam nihil.</li>
                                </ol>
                            </div>
                            <!--/.direct-chat-messages-->

                            <!-- Petunjuk are loaded here -->
                            <div class="direct-chat-contacts">
                                petunjuk
                                <br>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam minus ex facilis vero. Beatae nisi aut laudantium aliquid eum quos ad architecto inventore, officia illo voluptatum omnis veritatis officiis id.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam minus ex facilis vero. Beatae nisi aut laudantium aliquid eum quos ad architecto inventore, officia illo voluptatum omnis veritatis officiis id.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam minus ex facilis vero. Beatae nisi aut laudantium aliquid eum quos ad architecto inventore, officia illo voluptatum omnis veritatis officiis id.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam minus ex facilis vero. Beatae nisi aut laudantium aliquid eum quos ad architecto inventore, officia illo voluptatum omnis veritatis officiis id.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam minus ex facilis vero. Beatae nisi aut laudantium aliquid eum quos ad architecto inventore, officia illo voluptatum omnis veritatis officiis id.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam minus ex facilis vero. Beatae nisi aut laudantium aliquid eum quos ad architecto inventore, officia illo voluptatum omnis veritatis officiis id.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam minus ex facilis vero. Beatae nisi aut laudantium aliquid eum quos ad architecto inventore, officia illo voluptatum omnis veritatis officiis id.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam minus ex facilis vero. Beatae nisi aut laudantium aliquid eum quos ad architecto inventore, officia illo voluptatum omnis veritatis officiis id.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam minus ex facilis vero. Beatae nisi aut laudantium aliquid eum quos ad architecto inventore, officia illo voluptatum omnis veritatis officiis id.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam minus ex facilis vero. Beatae nisi aut laudantium aliquid eum quos ad architecto inventore, officia illo voluptatum omnis veritatis officiis id.
                            </div>
                            <!-- /.petunjuk-chat-pane -->

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer" style="display: block;">
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" data-card-widget="remove">Hapus</button>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                </div>
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
                        ...
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


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->