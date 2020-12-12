<style>
    .area {
        height: 150px;
        width: 100%;
        margin: 0 auto;
        overflow: hidden;
    }

    .area:hover {
        overflow-y: scroll;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengajar</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="btn-group mb-3" role="group" aria-label="Basic example">
      <a href="<?php echo site_url('pengajar/add'); ?>" class="btn btn-primary">Tambah</a>
      <button type="button" class="btn btn-primary">Cetak</button>
    </div>

    <div class="row">
      <?php foreach ($pengajar as $guru) {
        // dapatkan pengajar berdasarkan id user guru
        $mapel = $this->Pengajar_model->get_mapel($guru['id']);
        $jml_mapel = count($mapel);
      ?>
        <div class="col-md-6">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h4>
                <?= $guru['first_name'] . ' ' .$guru['last_name'] ?>
                <span class="badge badge-info float-right"><?= $jml_mapel ?> Mapel</span>
              </h4>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush area">
                <?php foreach ($mapel as $m) { ?>
                  <li class="list-group-item">
                  <?= $m['nama_mapel'] . " - " . $m['nama_kelas'] ?>
                  <a class="btn btn-danger btn-sm float-right" href="<?= base_url('pengajar/remove/').$m['id'] ?>">Hapus</a>
                  </li>
                <?php } ?>
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="<?= base_url('pengajar/edit/') . $guru['id'] ?>" class="btn btn-primary">Edit</a>
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>
      <?php } ?>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->