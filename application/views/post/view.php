<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $post['title'] ?></h1>
        </div>
        <div class="col-md-6">
          <span class="badge badge-info float-right">
            <?= time_elapsed_string($post['published_at'], null); ?> |
            <?= $post['published_at'] ?>
            <?php foreach ($post_tag as $tag) : ?>
              | <?= $tag['title'] ?>
            <?php endforeach ?>
          </span>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="materi-tab" data-toggle="tab" href="#materi" role="tab" aria-controls="materi" aria-selected="true">materi</a>
      </li>
      <?php if (user_info()['role'] == 'siswa' && $post['jenis'] == 'tugas') : ?>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="tugassaya-tab" data-toggle="tab" href="#tugassaya" role="tab" aria-controls="tugassaya" aria-selected="false">tugas saya</a>
        </li>
      <?php endif ?>
      <?php if (user_info()['role'] == 'guru' && $post['jenis'] == 'tugas') : ?>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="periksatugas-tab" data-toggle="tab" href="#periksatugas" role="tab" aria-controls="periksatugas" aria-selected="false">periksa tugas</a>
        </li>
      <?php endif ?>
    </ul>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="materi" role="tabpanel" aria-labelledby="materi-tab">
        <div class="card mt-3">
          <div class="card-body">
            <?= $post['content'] ?>
            <!-- jika ada ujian yang disisipak di postingan ini -->
            <?php foreach ($this_ujian as $ujian) : ?>
              <div class="card card-outline card-info">
                <div class="card-header">
                  <h4><?= $ujian['nama_ujian'] ?></h4>
                </div>
                <div class="card-body">
                  <strong>Kelas tingkat:</strong> <?= $ujian['kelas_tingkat'] ?><br>
                  <strong>Batas mengikuti ujian:</strong> <?= $ujian['waktu_selesai'] ?><br>
                  <strong>Token:</strong> <span class="badge badge-warning"><?= $ujian['token'] ?></span> <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> Catat token ini!</span>
                </div>
                <div class="card-footer">
                  <a href="<?= base_url('ujian/view/') . $ujian['id'] ?>" class="btn btn-info">Ikuti Ujian</a>
                </div>
              </div>
            <?php endforeach ?>

            <!-- jika ada file yang disisipkan di postingan ini -->
            <?php
            foreach ($attachfile as $file) :
            ?>
              <div class="card card-outline card-info">
                <div class="card-body">
                  <?= $file['file_name'] ?>
                </div>
                <div class="card-footer">
                  <button class="btn btn-info float-left mr-3" onclick="window.location.href='<?= base_url('post/download_file/') . $file['token'] ?>'">Download</button>
                  <!-- jika file pdf maka tampilkan -->
                  <?php if ($file['file_extension'] == '.pdf') : ?>
                    <div class="_df_button" source="<?= base_url('post/read_file/') . $file['token'] ?>" id="df_manual_button">
                      <div class="btn btn-info">
                        Baca Online
                      </div>
                    </div>
                  <?php endif ?>
                </div>
              </div>

            <?php
            endforeach;
            ?>
          </div>
          <div class="card-footer">
            <div class="default_replyrow">
              <form method="POST" id="form_comment" class="mt-3 replyrow">
                <div class="form-group">
                  <input name="content" id="content" class="form-control" placeholder="Tulis Komentar" rows="1" required></input>
                </div>
                <div class="form-group">
                  <input type="hidden" name="post_id" id="post_id" value="<?= $post['id'] ?>" />
                  <input type="hidden" name="author_id" id="author_id" value="<?= user_info()['id'] ?>" />
                  <input type="hidden" name="parrent_id" id="parrent_id" value="0" />
                  <input type="submit" name="submit" id="submit" class="btn btn-info" value="Kirim" />
                  <input type="button" name="cancel" id="cancel" class="btn btn-secondary" value="Batal">
                </div>
              </form>
            </div>
          </div>
          <div class="card-footer card-comments">
            <div id="display_comment"></div>
          </div>
        </div>
      </div>

      <?php if (user_info()['role'] == 'siswa' && $post['jenis'] == 'tugas') : ?>
        <div class="tab-pane fade" id="tugassaya" role="tabpanel" aria-labelledby="tugassaya-tab">
          <div class="card mt-3">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="token">
                  </div>
                  <div class="dropzone">
                    <div class="dz-message">
                      <h3> Drag and Drop your files here Or Click here to upload</h3>
                    </div>
                  </div>
                  <!-- Button cari dari repositori user -->
                  <!-- <button type="button" class="btn btn-secondary mt-3" data-toggle="modal" data-target="#exampleModal">
                      Cari di penyimpanan anda
                    </button> -->
                </div>
              </div>

              <h4 class="mt-3">Tugas saya:</h4>
              <?php foreach ($myfile as $file) : ?>
                <div class="alert alert-info alert-dismissible fade show myFile" role="alert">
                  <?= $file['file_name'] ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-token="<?= $file['token'] ?>" data-filename="<?= $file['file_name'] ?>">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      <?php endif ?>

      <?php if (user_info()['role'] == 'guru' && $post['jenis'] == 'tugas') : ?>
        <div class="tab-pane fade" id="periksatugas" role="tabpanel" aria-labelledby="periksatugas-tab">
          <div class="accordion" id="accordionExample">
            <!-- kasih margin top 3 -->
            <div class="mt-3">
              <!-- looping data tag postingan -->
              <?php foreach ($post_tag as $tag) : ?>
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-<?= $tag['id'] ?>" aria-expanded="true" aria-controls="collapseOne">
                        Lampiran Tugas Siswa <?= $tag['title'] ?>
                      </button>
                    </h2>
                  </div>

                  <div id="collapse-<?= $tag['id'] ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                          <div class="list-group" id="list-tab" role="tablist">
                            <!-- tampilkan siswa masing-masing kelas -->
                            <?php

                            $all_siswa = $this->Rombel_model->get_siswa_by_kelas($tag['id']);
                            foreach ($all_siswa as $siswa) :
                            ?>
                              <a class="list-group-item list-group-item-action list-siswa" id="list-home-list" data-toggle="list" href="#list-<?= $tag['id'] ?>" role="tab" aria-controls="home" data-siswaid="<?= $siswa['user_id'] ?>" data-tagid="<?= $tag['id'] ?>"><?= $siswa['first_name'] ?></a>
                            <?php endforeach ?>

                          </div>
                        </div>
                        <div class="col-8">
                          <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade lampiran-tugas" id="list-<?= $tag['id'] ?>" role="tabpanel" aria-labelledby="list-home-list">
                            </div>

                          </div>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
                <!-- end looping -->
              <?php endforeach ?>
            </div>

          </div>
        <?php endif ?>

        </div>

    </div>

</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->