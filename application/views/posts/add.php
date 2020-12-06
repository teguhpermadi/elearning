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

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-12">
            <input type="text" name="title" id="title" class="form-control col-md-12" placeholder="Judul">
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3">
            <!-- terbitkan tanggal -->
            <label for="">Waktu Terbit</label>
            <input class="form-control" type="date" name="" id="">
          </div>
          <div class="col-md-3">
            <!-- category -->
            <label for="">Ketegori</label>
            <select class="form-control" name="" id="">
              <option value="">category 1</option>
              <option value="">category 2</option>
              <option value="">category 3</option>
            </select>
          </div>
          <div class="col-md-3">
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
      </div>
      <div class="card-body">
        <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button class="btn btn-primary">Terbitkan</button>
        <button class="btn btn-secondary">Draf</button>
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->