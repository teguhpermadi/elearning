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

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Kategori</h3>
        </div>
        <?php echo form_open('category/add'); ?>
          	<div class="card-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="parrent_id" class="control-label">Parrent Id</label>
						<div class="form-group">
							<input type="text" name="parrent_id" value="<?php echo $this->input->post('parrent_id'); ?>" class="form-control" id="parrent_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="title" class="control-label"><span class="text-danger">*</span>Title</label>
						<div class="form-group">
							<input type="text" name="title" value="<?php echo $this->input->post('title'); ?>" class="form-control" id="title" />
							<span class="text-danger"><?php echo form_error('title');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="meta_title" class="control-label">Meta Title</label>
						<div class="form-group">
							<input type="text" name="meta_title" value="<?php echo $this->input->post('meta_title'); ?>" class="form-control" id="meta_title" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="slug" class="control-label">Slug</label>
						<div class="form-group">
							<input type="text" name="slug" value="<?php echo $this->input->post('slug'); ?>" class="form-control" id="slug" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="content" class="control-label">Content</label>
						<div class="form-group">
							<textarea name="content" class="form-control" id="content"><?php echo $this->input->post('content'); ?></textarea>
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