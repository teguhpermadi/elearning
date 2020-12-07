<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kategori</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
-        <div class="row">
            <!-- form -->
            <!-- <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Tag</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="" id="" placeholder="Nama Tag">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div> -->
            <div class="col-md-6">
                <!-- list -->
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Kategori</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="tableTag">
                            <thead>
                                <tr>
                                    <th>Nama Kategori</th>
                                    <th>Slug</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data_tags as $tag){ ?>
                                <tr>
                                    <td><?= $tag['title'] ?></td>
                                    <td><?= $tag['slug'] ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->