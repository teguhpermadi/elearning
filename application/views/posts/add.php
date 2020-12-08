<?php echo form_open('posts/save'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Postingan Baru</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-8">
        <!-- editor -->
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md-12">
                <input type="text" name="title" id="title" class="form-control col-md-12" placeholder="Judul" required>
                <span class="text-danger"><?php echo form_error('title'); ?></span>
              </div>
            </div>

          </div>
          <div class="card-body">
            <textarea name="content" class="summernote" required></textarea>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-4">
        <!-- setting -->
        <div class="card">
          <div class="card-header">
            Pengaturan
          </div>
          <div class="card-body">
            <div class="form-group">
              <!-- terbitkan / simpan -->
              <label for="">Status</label>
              <select class="form-control" name="status" id="status">
                <option value="1">Terbitkan</option>
                <option value="0">Draf</option>
                <option value="1">Jadwalkan</option>
              </select>
            </div>
            <div class="form-group" name="tanggal" id="tanggal">
              <!-- terbitkan tanggal -->
              <label for="">Waktu Terbit</label>
              <!-- setting date -->
              <?php
              $tz = new DateTimeZone('Asia/Bangkok'); // setting time zone
              $date = new DateTime('now', $tz); // Date object using current date and time
              $dt = $date->format('Y-m-d\TH:i');
              ?>
              <input class="form-control" type="datetime-local" name="date" id="date" value="<?= $dt ?>">
            </div>
            <div class="form-group">
              <label for="">Slug (optional)</label>
              <input type="text" name="" id="" class="form-control">
            </div>
            <div class="form-group">
              <!-- category -->
              <label for="">Ketegori</label>
              <select class="form-control" name="kategori" id="kategori">
                <?php foreach ($category as $c) { ?>
                  <option value="<?= $c['id'] ?>"><?= $c['nama'] ?></option>
                <?php } ?>
              </select>
              <span class="text-danger"><?php echo form_error('kategori'); ?></span>
            </div>
            <div class="form-group">
              <!-- tag -->
              <label for="">Tag</label>
              <br>
              <?php foreach ($tags as $tag) { ?>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="tags[]" value="<?= $tag['id'] ?>" id="<?= $tag['id'] ?>" required>
                  <label class="form-check-label" for="default_<?= $tag['id'] ?>">
                    <?= $tag['nama'] ?>
                  </label>
                </div>
              <?php } ?>
              <span class="text-danger"><?php echo form_error('tags[]'); ?></span>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button class="btn btn-info">Preview</button>
            <button class="btn btn-secondary">Kembali</button>
          </div>
        </div>
      </div>
    </div>
</div>
</div>


</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php echo form_close(); ?>