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
                <h3 class="card-title">Title</h3>
                <a href="<?php echo site_url('post_category/add'); ?>" class="btn btn-success btn-sm">Add</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Post Id</th>
                    <th>Category Id</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($post_category as $p) { ?>
                    <tr>
                        <td><?php echo $p['id']; ?></td>
                        <td><?php echo $p['post_id']; ?></td>
                        <td><?php echo $p['category_id']; ?></td>
                        <td>
                            <a href="<?php echo site_url('post_category/edit/' . $p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                            <a href="<?php echo site_url('post_category/remove/' . $p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->