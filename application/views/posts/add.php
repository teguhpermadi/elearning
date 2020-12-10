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
    <form id="add_form" method="POST">
    <div class="row">
      <div class="col-md-8">
        <!-- editor -->
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md-12">
                <input type="text" name="title" id="title" class="form-control col-md-12" placeholder="Judul" required>
              </div>
            </div>

          </div>
          <div class="card-body">
            <textarea class="summernote" name="content"></textarea>
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
                <option value="terbitkan">Terbitkan</option>
                <option value="draf">Draf</option>
                <option value="jadwalkan">Jadwalkan</option>
              </select>
            </div>
            <div class="form-group" id="waktu">
              <!-- terbitkan tanggal -->
              <label for="">Waktu Terbit</label>
              <input class="form-control" type="datetime-local" name="date" id="date">
            </div>
            <div class="form-group">
              <label for="">Slug (optional)</label>
              <input type="text" name="slug" id="slug" class="form-control">
            </div>
            <div class="form-group">
              <!-- category -->
              <label for="">Ketegori</label>
              <select class="form-control" name="category" id="category" required>
                <option value="">Pilih salah satu</option>
                <?php foreach ($category as $c) { ?>
                  <option value="<?= $c['id'] ?>"><?= $c['title'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group options">
              <label class="control-label" for="optiontext">Tag</label>
              <div class="col-md-12">
              <?php foreach ($tags as $tag) { ?>
                <input type="checkbox" name="option[]" value="<?= $tag['id'] ?>" required /> <?= $tag['title'] ?><br>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary" type="submit" onclick="javascript: form.action='<?= base_url('posts/save') ?>';">Simpan</button>
            <button class="btn btn-info" type="submit" onclick="javascript: form.action='<?= base_url('posts/preview') ?>'; form.target='_blank'">Preview</button>
            <!-- <button class="btn btn-secondary">Kembali</button> -->
          </div>
        </div>
      </div>
    </div>
</div>
</div>

</form>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
