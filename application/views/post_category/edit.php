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

        <!-- Default card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Title</h3>
            </div>
            <?php echo form_open('post_category/edit/' . $post_category['id']); ?>
            <div class="card-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="post_id" class="control-label"><span class="text-danger">*</span>Post</label>
                        <div class="form-group">
                            <select name="post_id" class="form-control">
                                <option value="">select post</option>
                                <?php
                                foreach ($all_posts as $post) {
                                    $selected = ($post['id'] == $post_category['post_id']) ? ' selected="selected"' : "";

                                    echo '<option value="' . $post['id'] . '" ' . $selected . '>' . $post['id'] . '</option>';
                                }
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('post_id'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="category_id" class="control-label"><span class="text-danger">*</span>Category</label>
                        <div class="form-group">
                            <select name="category_id" class="form-control">
                                <option value="">select category</option>
                                <?php
                                foreach ($all_category as $category) {
                                    $selected = ($category['id'] == $post_category['category_id']) ? ' selected="selected"' : "";

                                    echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['title'] . '</option>';
                                }
                                ?>
                            </select>
                            <span class="text-danger"><?php echo form_error('category_id'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Save
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->