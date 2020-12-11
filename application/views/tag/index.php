<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tag</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <a href="<?php echo site_url('tag/add'); ?>" class="btn btn-success btn-sm">Add</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Meta Title</th>
                        <th>Slug</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($tag as $t) { ?>
                        <tr>
                            <td><?php echo $t['id']; ?></td>
                            <td><?php echo $t['title']; ?></td>
                            <td><?php echo $t['meta_title']; ?></td>
                            <td><?php echo $t['slug']; ?></td>
                            <td><?php echo $t['content']; ?></td>
                            <td>
                                <a href="<?php echo site_url('tag/edit/' . $t['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                <a href="<?php echo site_url('tag/remove/' . $t['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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