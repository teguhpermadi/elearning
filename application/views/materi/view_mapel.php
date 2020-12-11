<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $mapel['nama'] ?></h1>
          <p>Pengajar: <?= $pengajar['first_name'] ?></p>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <?php
      $all_post = $this->Materi_model->get_post_by_auhtor_category_tag($pengajar['id'], $mapel_kelas['id_mapel'], $mapel_kelas['id_kelas']);
      foreach ($all_post as $post) {
      ?>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
              <?= $post['title'] ?>
              </h3>
            </div>
            <div class="card-body">
              <?php
              echo word_limiter($post['content'], 200);
              ?>
            </div>
            <div class="card-footer">
              <a href="<?= base_url('post/view/').$post['id'] ?>" class="btn btn-primary">Lihat</a>
            </div>
          </div>
        </div>

      <?php } ?>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->