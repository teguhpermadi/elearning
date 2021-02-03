<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Rekap Absen</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="card">
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Judul postingan</th>
              <th>Mapel</th>
              <th>Absen</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($all_post_for_siswa as $post) : ?>
              <tr>
                <td><a href="<?= base_url('post/view/').$post['id'] ?>"><?= $post['title'] ?></a></td>
                <td><?= $post['nama'] ?></td>
                <td>
                <?php
                $check_absen = $this->Absensi_model->check_absen(user_info()['id'], $post['id']);
                if($check_absen){
                  echo ' <span class="badge badge-primary">' . $check_absen['time_access'] . '</span>';
                } else {
                  echo ' <span class="badge badge-danger">Belum Absen</span>';
                }
                ?>
                </td>
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