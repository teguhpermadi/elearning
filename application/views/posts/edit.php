<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Postingan Baru</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form id="add_form" method="POST">
            <input type="hidden" value="<?= $data_post['id'] ?>" name="post_id">
            <div class="row">
                <div class="col-md-8">
                    <!-- editor -->
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="title" id="title" class="form-control col-md-12" placeholder="Judul" value="<?= $data_post['title'] ?>" required>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <textarea class="summernote" name="content"><?= $data_post['content']; ?></textarea>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-4">
                    <!-- setting -->
                    <div class="card">
                        <div class="card-header">
                            Pengaturan
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <!-- terbitkan / simpan -->
                                <label for="">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $date_now = date("Y-m-d H:i");

                                    if ($data_post['published'] == 0) // jika statusnya masih draf
                                    {
                                        echo ' <option value="terbitkan">Terbitkan</option>';
                                        echo ' <option value="draf" selected>Draf</option>';
                                        echo '<option value="jadwalkan">Jadwalkan</option>';
                                    } else { // jika statusnya bukan draf cek lagi
                                        if ($data_post['published_at'] > $date_now) {
                                            echo ' <option value="terbitkan">Terbitkan</option>';
                                            echo ' <option value="draf">Draf</option>';
                                            echo '<option value="jadwalkan" selected>Jadwalkan</option>';
                                        } else {
                                            echo ' <option value="terbitkan" selected>Terbitkan</option>';
                                            echo ' <option value="draf">Draf</option>';
                                            echo '<option value="jadwalkan">Jadwalkan</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group" id="waktu">
                                <!-- terbitkan tanggal -->
                                <label for="">Waktu Terbit</label>
                                <?php
                                $date = $data_post['published_at'];
                                $date_convert = date('Y-m-d\TH:i:s', strtotime(str_replace('-', '/', $date))); // => 2013-02-16
                                ?>
                                <input class="form-control" type="datetime-local" name="date" id="date" value="<?= $date_convert ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Slug (optional)</label>
                                <input type="text" name="slug" id="slug" class="form-control" value="<?= $data_post['slug'] ?>">
                            </div>
                            <div class="form-group">
                                <!-- category -->
                                <label for="">Ketegori</label>
                                <select class="form-control" name="category" id="category">
                                    <?php
                                    foreach ($category as $c) {
                                        $selected = ($c['id'] == $data_category[0]['id']) ? 'selected' : '';
                                        echo '<option value="' . $c['id'] . '" ' . $selected . '>' . $c['title'] . '</option>';
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group options">
                                <label class="control-label" for="optiontext">Tag</label>
                                <div class="col-md-12">
                                <!-- <?php echo json_encode($data_tag) ?> -->
                                <!-- <?= $data_post['id'] ?> -->
                                    <?php foreach ($data_tag as $tag) {
                                        $checked = ($tag['post_id'] == $data_post['id']) ? 'checked' : '';
                                        echo '<input type="checkbox" name="option[]" value="' . $tag['id'] . '" ' . $checked . ' /> ' . $tag['title'] . '<br>';
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit" onclick="javascript: form.action='<?= base_url('posts/update/').$data_post['id'] ?>';">Simpan</button>
                            <button class="btn btn-info" type="submit" onclick="javascript: form.action='<?= base_url('posts/preview') ?>'; form.target='_blank'">Preview</button>
                            <!-- <button class="btn btn-secondary">Kembali</button> -->
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>

</form>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->