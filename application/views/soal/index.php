<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Bank Soal</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

  <a class="btn btn-primary mb-3" href="<?= base_url('soal/add') ?>">Tambah</a>

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Soal</h3>
      </div>
      <div class="card-body">
        <table class="table table-striped datatable">
          <thead>
            <tr>
              <!-- <th>ID</th> -->
              <!-- <th>Mapel Id</th> -->
              <th>Tingkat</th>
              <th>Jenis Soal</th>
              <!-- <th>Author Id</th> -->
              <!-- <th>Created At</th> -->
              <th>Soal</th>
              <!-- <th>Skor</th> -->
              <!-- <th>Petunjuk</th> -->
              <!-- <th>Kunci</th> -->
              <!-- <th>Pembahasan</th> -->
              <!-- <th>Opsi</th> -->
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($soal as $s) { ?>
              <tr>
                <!-- <td><?php echo $s['id']; ?></td> -->
                <!-- <td><?php echo $s['mapel_id']; ?></td> -->
                <td><?php echo $s['tingkat']; ?></td>
                <td><?php echo $s['jenis_soal']; ?></td>
                <!-- <td><?php echo $s['author_id']; ?></td> -->
                <!-- <td><?php echo $s['created_at']; ?></td> -->
                <td><?php echo word_limiter($s['soal'], 15); ?></td>
                <!-- <td><?php echo $s['skor']; ?></td> -->
                <!-- <td><?php echo $s['petunjuk']; ?></td> -->
                <!-- <td><?php echo $s['kunci']; ?></td> -->
                <!-- <td><?php echo $s['pembahasan']; ?></td> -->
                <!-- <td><?php echo $s['opsi']; ?></td> -->
                <td>
                  <a href="<?php echo site_url('soal/edit/' . $s['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                  <a href="<?php echo site_url('soal/remove/' . $s['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->

    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->