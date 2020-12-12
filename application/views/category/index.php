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

        <div class="row">
            <a href="<?php echo site_url('category/add'); ?>" class="btn btn-primary ml-2 mb-3">Tambah</a>

        </div>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            Daftar Kategori
            </div>
            <div class="card-body">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Parrent Id</th>
                            <th>Title</th>
                            <th>Meta Title</th>
                            <th>Slug</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($category as $c) { ?>
                            <tr>
                                <td><?php echo $c['id']; ?></td>
                                <td><?php echo $c['parrent_id']; ?></td>
                                <td><?php echo $c['title']; ?></td>
                                <td><?php echo $c['meta_title']; ?></td>
                                <td><?php echo $c['slug']; ?></td>
                                <td><?php echo $c['content']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('category/edit/' . $c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                    <a href="<?php echo site_url('category/remove/' . $c['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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