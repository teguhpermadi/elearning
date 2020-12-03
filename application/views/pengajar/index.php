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
    <div class="row">
      <?php foreach ($all_guru as $guru) {
        // dapatkan pengajar berdasarkan id user guru
        $mapel = $this->Pengajar_model->get_mapel($guru['id']);
        $jml_mapel = count($mapel);
      ?>
        <div class="col-md-6">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h4>
                <?= $guru['first_name'] ?>
                <span class="badge badge-info float-right"><?= $jml_mapel ?> Mapel</span>            
            </h4>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush area">
                <?php foreach ($mapel as $m) { ?>
                  <li class="list-group-item"><?= $m['nama_mapel'] . " - " .$m['nama_kelas'] ?></li>
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