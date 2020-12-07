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
            <div class="summernote"></div>
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
              <select class="form-control" name="" id="">
                <option value="">Terbitkan</option>
                <option value="">Draf</option>
                <option value="">Jadwalkan</option>
              </select>
            </div>
            <div class="form-group">
              <!-- terbitkan tanggal -->
              <label for="">Waktu Terbit</label>
              <input class="form-control" type="date" name="" id="">
            </div>
            <div class="form-group">
              <!-- category -->
              <label for="">Ketegori</label>
              <select class="form-control" name="" id="">
                <option value="">category 1</option>
                <option value="">category 2</option>
                <option value="">category 3</option>
              </select>
            </div>
            <div class="form-group">
              <!-- tag -->
              <label for="">Tag</label>
              <br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  tag 1
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                <label class="form-check-label" for="defaultCheck2">
                  tag 2
                </label>
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