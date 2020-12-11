<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blank Page</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <a href="<?php echo site_url('post_tag/add'); ?>" class="btn btn-success btn-sm">Add</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Post Id</th>
                        <th>Tag Id</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($post_tag as $p) { ?>
                        <tr>
                            <td><?php echo $p['id']; ?></td>
                            <td><?php echo $p['post_id']; ?></td>
                            <td><?php echo $p['tag_id']; ?></td>
                            <td>
                                <a href="<?php echo site_url('post_tag/edit/' . $p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                <a href="<?php echo site_url('post_tag/remove/' . $p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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