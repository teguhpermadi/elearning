<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $post_category['title'] ?></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> <?= $post['title'] ?> </h3>
        <span class="badge badge-info float-right">
          <?= time_elapsed_string($post['published_at'], null); ?> |
          <?= $post['published_at'] ?>
          <?php foreach ($post_tag as $tag) : ?>
            | <?= $tag['title'] ?>
          <?php endforeach ?>
        </span>
        <br>
        <ul class="nav nav-pills mt-3">
          <li class="nav-item"><a class="nav-link active" href="#materi" data-toggle="tab">Materi</a></li>
          <!-- jika guru -->
          <?php if (user_info()['role'] == 'guru') : ?>
            <li class="nav-item"><a class="nav-link" href="#periksatugas" data-toggle="tab">Periksan Tugas</a></li>
          <?php endif ?>
          <!-- jika siswa -->
          <?php if (user_info()['role'] == 'siswa') : ?>
            <li class="nav-item"><a class="nav-link" href="#kumpulkantugas" data-toggle="tab">Kumpulkan Tugas</a></li>
          <?php endif ?>
        </ul>
      </div>

      <!-- tab content -->
      <div class="tab-content">
        <!-- tab materi -->
        <div class="active tab-pane" id="materi">
          <div class="card-body">
            <?= $post['content'] ?>
            <?php
            foreach ($attachfile as $file) :
            ?>
              <div class="callout callout-info pb-4">
                <?= $file['file_name'] ?>
                <button class="btn btn-info ml-3 float-right" onclick="window.location.href='<?= base_url('post/download_file/') . $file['token'] ?>'">Download</button>

                <!-- jika file pdf maka tampilkan -->
                <?php if ($file['file_extension'] == '.pdf') { ?>
                  <div class="_df_button float-right" source="<?= base_url('post/read_file/') . $file['token'] ?>" id="df_manual_button">
                    <div class="btn btn-info">
                      Baca Online
                    </div>
                  </div>
                <?php } ?>


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

        <!-- tab kumpulkan tugas -->
        <div class="active tab-pane" id="kumpulkantugas">
        </div>

        <!-- tab periksa tugas -->
        <div class="active tab-pane" id="periksatugas">
        </div>
      </div>



    </div>

</div>

</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->