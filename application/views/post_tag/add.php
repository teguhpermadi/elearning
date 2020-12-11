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
        <?php echo form_open('post_tag/add'); ?>
          	<div class="card-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="post_id" class="control-label">Post</label>
						<div class="form-group">
							<select name="post_id" class="form-control">
								<option value="">select post</option>
								<?php 
								foreach($all_posts as $post)
								{
									$selected = ($post['id'] == $this->input->post('post_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$post['id'].'" '.$selected.'>'.$post['id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tag_id" class="control-label">Tag</label>
						<div class="form-group">
							<select name="tag_id" class="form-control">
								<option value="">select tag</option>
								<?php 
								foreach($all_tag as $tag)
								{
									$selected = ($tag['id'] == $this->input->post('tag_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$tag['id'].'" '.$selected.'>'.$tag['title'].'</option>';
								} 
								?>
							</select>
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