<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Rekap Tugas</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="card card-outline card-danger">
      <div class="card-header">
        <h3 class="card-title">Tugas yang belum dikerjakan</h3>
      </div>
      <div class="card-body">
      <table class="table table-striped">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Mata Pelajaran</th>
              <th>Tanggal Terbit</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($tugas_belum) :
            foreach ($tugas_belum as $belum) :
              // echo json_encode($belum);
            ?>
              <tr>
                <td><a href="<?= base_url('post/view/') . $belum['id'] ?>"><?= $belum['title'] ?></a></td>
                <td><span class="badge badge-primary"><?= $belum['nama_mapel'] ?></span></td>
                <td><?= $belum['published_at'] ?></td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">Tugas yang sudah dikerjakan</h3>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Mata Pelajaran</th>
              <th>Tanggal Terbit</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($tugas_sudah as $sudah) :
            ?>
              <tr>
                <td><a href="<?= base_url('post/view/') . $sudah['id'] ?>"><?= $sudah['title'] ?></a></td>
                <td><span class="badge badge-primary"><?= $sudah['nama_mapel'] ?></span></td>
                <td><?= $sudah['published_at'] ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>



  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->