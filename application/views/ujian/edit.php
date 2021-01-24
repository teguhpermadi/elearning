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
        <form action="<?= base_url('ujian/update_ujian/').$ujian['id'] ?>" method="POST">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Identitas Ujian</h3>
                </div>
                <div class="card-body">
                    <label for="">Nama Ujian</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama_ujian" id="nama_ujian" value="<?= $ujian['nama_ujian'] ?>" required>
                    </div>
                    <label for="">Mata Pelajaran</label>
                    <div class="form-group">
                        <select name="category_id" class="form-control" required>
                            <!-- <option value="">select category</option> -->
                            <?php
                            foreach ($all_category as $category) {
                                $selected = ($category['id'] == $ujian['mapel_id']) ? ' selected="selected"' : "";

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
                                $selected = ($value == $ujian['kelas_tingkat']) ? ' selected="selected"' : "";

                                echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <label for="published_at" class="control-label">Batas Ujian</label>
                    <div class="form-group">
                        <?php
                        $date = new DateTime($ujian['waktu_selesai']);
                        $convert_date = $date->format('Y-m-d\TH:i:s');
                        ?>
                        <input type="datetime-local" name="waktu_selesai" class="has-datetimepicker form-control" value="<?= $convert_date; ?>" />
                        <!-- <input type="datetime-local" name="published_at" value="<?php echo $this->input->post('published_at'); ?>" class="has-datetimepicker form-control" id="published_at" /> -->
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div id="soalujian"></div>
                    <button type="submit" class="btn btn-primary">Berikutnya</button>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            <!-- akhir form -->
        </form>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->