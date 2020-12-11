<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default card -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ubah Post</h3>
        </div>
        <?php echo form_open('post/edit/'.$post['id']); ?>
			<div class="card-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="parrent_id" class="control-label">Post</label>
						<div class="form-group">
							<select name="parrent_id" class="form-control">
								<option value="">select post</option>
								<?php 
								foreach($all_posts as $post)
								{
									$selected = ($post['id'] == $post['parrent_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$post['id'].'" '.$selected.'>'.$post['title'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="published" class="control-label">Published</label>
						<div class="form-group">
							<select name="published" class="form-control">
								<option value="">select</option>
								<?php 
								$published_values = array(
									'0'=>'Draf',
									'1'=>'Terbit',
									'2'=>'Terjadwal',
								);

								foreach($published_values as $value => $display_text)
								{
									$selected = ($value == $post['published']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="author_id" class="control-label">Author Id</label>
						<div class="form-group">
							<input type="text" name="author_id" value="<?php echo ($this->input->post('author_id') ? $this->input->post('author_id') : $post['author_id']); ?>" class="form-control" id="author_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="title" class="control-label"><span class="text-danger">*</span>Title</label>
						<div class="form-group">
							<input type="text" name="title" value="<?php echo ($this->input->post('title') ? $this->input->post('title') : $post['title']); ?>" class="form-control" id="title" />
							<span class="text-danger"><?php echo form_error('title');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="meta_title" class="control-label">Meta Title</label>
						<div class="form-group">
							<input type="text" name="meta_title" value="<?php echo ($this->input->post('meta_title') ? $this->input->post('meta_title') : $post['meta_title']); ?>" class="form-control" id="meta_title" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="slug" class="control-label">Slug</label>
						<div class="form-group">
							<input type="text" name="slug" value="<?php echo ($this->input->post('slug') ? $this->input->post('slug') : $post['slug']); ?>" class="form-control" id="slug" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="summary" class="control-label">Summary</label>
						<div class="form-group">
							<input type="text" name="summary" value="<?php echo ($this->input->post('summary') ? $this->input->post('summary') : $post['summary']); ?>" class="form-control" id="summary" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="created_at" class="control-label">Created At</label>
						<div class="form-group">
							<input type="text" name="created_at" value="<?php echo ($this->input->post('created_at') ? $this->input->post('created_at') : $post['created_at']); ?>" class="has-datetimepicker form-control" id="created_at" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="updated_at" class="control-label">Updated At</label>
						<div class="form-group">
							<input type="text" name="updated_at" value="<?php echo ($this->input->post('updated_at') ? $this->input->post('updated_at') : $post['updated_at']); ?>" class="has-datetimepicker form-control" id="updated_at" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="published_at" class="control-label">Published At</label>
						<div class="form-group">
							<input type="text" name="published_at" value="<?php echo ($this->input->post('published_at') ? $this->input->post('published_at') : $post['published_at']); ?>" class="has-datetimepicker form-control" id="published_at" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="content" class="control-label"><span class="text-danger">*</span>Content</label>
						<div class="form-group">
							<textarea name="content" class="form-control" id="content"><?php echo ($this->input->post('content') ? $this->input->post('content') : $post['content']); ?></textarea>
							<span class="text-danger"><?php echo form_error('content');?></span>
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