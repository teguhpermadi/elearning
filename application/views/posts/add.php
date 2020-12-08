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
                <input type="text" name="title" id="title" class="form-control col-md-12" placeholder="Judul">
              </div>
            </div>

          </div>
          <div class="card-body">
            <textarea class="summernote"></textarea>
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
              <input class="form-control" type="datetime-local" name="" id="">
            </div>
            <div class="form-group">
              <label for="">Slug (optional)</label>
              <input type="text" name="" id="" class="form-control">
            </div>
            <div class="form-group">
              <!-- category -->
              <label for="">Ketegori</label>
              <select class="form-control" name="" id="">
                <?php foreach($category as $c){ ?>
                <option value="<?= $c['id'] ?>"><?= $c['nama'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <!-- tag -->
              <label for="">Tag</label>
              <br>
              <?php foreach($tags as $tag){ ?>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" id="<?= $tag['id'] ?>">
                <label class="form-check-label" for="default_<?= $tag['id'] ?>">
                  <?= $tag['nama'] ?>
                </label>
              </div>
              <?php } ?>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary">Simpan</button>
            <button class="btn btn-info">Preview</button>
            <button class="btn btn-secondary">Kembali</button>
          </div>
        </div>
      </div>
    </div>
</div>


</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->