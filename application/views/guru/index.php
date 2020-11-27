<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Guru</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <a href="<?php echo site_url('guru/add'); ?>" class="btn btn-primary btn-sm">Tambah</a>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>Id User</th>
            <th>Nama</th>
            <th>Hp</th>
            <th>Email</th>
            <th>Nomor Induk</th>
            <th>Foto</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Biografi</th>
            <th>Pendidikan</th>
            <th>Url Fb</th>
            <th>Url Twitter</th>
            <th>Url Instagram</th>
            <th>Url Youtube</th>
            <th>Actions</th>
          </tr>
          <?php foreach ($guru as $g) { ?>
            <tr>
              <td><?php echo $g['id']; ?></td>
              <td><?php echo $g['id_user']; ?></td>
              <td><?php echo $g['nama']; ?></td>
              <td><?php echo $g['hp']; ?></td>
              <td><?php echo $g['email']; ?></td>
              <td><?php echo $g['nomor_induk']; ?></td>
              <td><?php echo $g['foto']; ?></td>
              <td><?php echo $g['tempat_lahir']; ?></td>
              <td><?php echo $g['tanggal_lahir']; ?></td>
              <td><?php echo $g['alamat']; ?></td>
              <td><?php echo $g['biografi']; ?></td>
              <td><?php echo $g['pendidikan']; ?></td>
              <td><?php echo $g['url_fb']; ?></td>
              <td><?php echo $g['url_twitter']; ?></td>
              <td><?php echo $g['url_instagram']; ?></td>
              <td><?php echo $g['url_youtube']; ?></td>
              <td>
                <a href="<?php echo site_url('guru/edit/' . $g['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                <a href="<?php echo site_url('guru/remove/' . $g['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->