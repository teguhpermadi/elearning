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
		<?php echo form_open('post/add'); ?>
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<div class="col-md-12">
							<label for="title" class="control-label"><span class="text-danger">*</span>Title</label>
							<div class="form-group">
								<input type="text" name="title" value="<?php echo $this->input->post('title'); ?>" class="form-control" id="title" />
								<span class="text-danger"><?php echo form_error('title'); ?></span>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="col-md-12">
							<label for="content" class="control-label"><span class="text-danger">*</span>Content</label>
							<div class="form-group">
								<textarea name="content" class="form-control summernote" id="content"><?php echo $this->input->post('content'); ?></textarea>
								<span class="text-danger"><?php echo form_error('content'); ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						Pengaturan
					</div>
					<div class="card-body">
						<div class="col-md-12">
							<label for="parrent_id" class="control-label">Sub Bab dari</label>
							<div class="form-group">
								<select name="parrent_id" class="form-control">
									<option value="">select post</option>
									<?php
									foreach ($all_posts as $post) {
										$selected = ($post['id'] == $this->input->post('parrent_id')) ? ' selected="selected"' : "";

										echo '<option value="' . $post['id'] . '" ' . $selected . '>' . $post['title'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<label for="published" class="control-label">Published</label>
							<div class="form-group">
								<select name="published" class="form-control">
									<option value="">select</option>
									<?php
									$published_values = array(
										'1' => 'Terbit',
										'2' => 'Terjadwal',
										'0' => 'Draf',
									);

									foreach ($published_values as $value => $display_text) {
										// $selected = ($value == $this->input->post('published')) ? ' selected="selected"' : "";
										$selected = '';
										echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
									}
									?>
								</select>
								<span class="text-danger"><?php echo form_error('published'); ?></span>
								
							</div>
						</div>
						<!-- <div class="col-md-12">
							<label for="author_id" class="control-label">Author Id</label>
							<div class="form-group">
								<input type="text" name="author_id" value="<?php echo $this->input->post('author_id'); ?>" class="form-control" id="author_id" />
							</div>
						</div>

						<div class="col-md-12">
							<label for="meta_title" class="control-label">Meta Title</label>
							<div class="form-group">
								<input type="text" name="meta_title" value="<?php echo $this->input->post('meta_title'); ?>" class="form-control" id="meta_title" />
							</div>
						</div>
						<div class="col-md-12">
							<label for="slug" class="control-label">Slug</label>
							<div class="form-group">
								<input type="text" name="slug" value="<?php echo $this->input->post('slug'); ?>" class="form-control" id="slug" />
							</div>
						</div>
						<div class="col-md-12">
							<label for="summary" class="control-label">Summary</label>
							<div class="form-group">
								<input type="text" name="summary" value="<?php echo $this->input->post('summary'); ?>" class="form-control" id="summary" />
							</div>
						</div>
						<div class="col-md-12">
							<label for="created_at" class="control-label">Created At</label>
							<div class="form-group">
								<input type="text" name="created_at" value="<?php echo $this->input->post('created_at'); ?>" class="has-datetimepicker form-control" id="created_at" />
							</div>
						</div>
						<div class="col-md-12">
							<label for="updated_at" class="control-label">Updated At</label>
							<div class="form-group">
								<input type="text" name="updated_at" value="<?php echo $this->input->post('updated_at'); ?>" class="has-datetimepicker form-control" id="updated_at" />
							</div>
						</div> -->
						<div class="col-md-12">
							<label for="published_at" class="control-label">Published At</label>
							<div class="form-group">
								<input type="datetime-local" name="published_at" value="<?php echo $this->input->post('published_at'); ?>" class="has-datetimepicker form-control" id="published_at" />
								<span class="text-danger"><?php echo form_error('published_at'); ?></span>
							</div>
						</div>
						<div class="col-md-12">
							<label for="category_id" class="control-label"><span class="text-danger">*</span>Category</label>
							<div class="form-group">
								<select name="category_id" class="form-control">
									<option value="">select category</option>
									<?php
									foreach ($all_category as $category) {
										$selected = ($category['id'] == $this->input->post('category_id')) ? ' selected="selected"' : "";

										echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['title'] . '</option>';
									}
									?>
								</select>
								<span class="text-danger"><?php echo form_error('category_id'); ?></span>
							</div>
						</div>
						<div class="col-md-12">
							<label for="tag_id" class="control-label">Tag</label>
							<div class="form-group">
								<?php
								foreach ($all_tag as $tag) {
									$checked = ($tag['id'] == $this->input->post('tag_id')) ? ' checked="checked"' : "";

									echo '<input type="checkbox" name="tag_id[]" value="' . $tag['id'] . '" ' . $checked . '/> ' . $tag['title'] . '<br>';
								}
								?>
							</div>

						</div>
					</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">
						Simpan
					</button>
				</div>
				</div>
			</div>
		</div>
</div>
<?php echo form_close(); ?>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->