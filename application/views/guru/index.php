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
            <th>Foto</th>
            <th>Nomor Induk</th>
            <th>First Name</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
          <?php foreach ($guru as $g) { ?>
            <tr>
              <td>
                <img src="<?= base_url('uploads/guru/') . $g['foto'] ?>" alt="" srcset="" class="img-circle img-responsive" style="height: 150px;">
              </td>
              <td><?php echo $g['nomor_induk']; ?></td>
              <td><?php echo $g['first_name']; ?></td>
              <td><?php echo $g['no_hp']; ?></td>
              <td><?php echo $g['email']; ?></td>
              <td>
                <a href="<?php echo site_url('guru/edit/' . $g['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                <a href="<?php echo site_url('guru/remove/' . $g['id']); ?>" class="btn btn-danger btn-xs">Hapus</a>
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