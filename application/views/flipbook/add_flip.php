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
		<?php echo form_open_multipart('post/add_flip'); ?>
		<div class="row">
			<div class="col-md-6">
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
						<div class="row">
							<div class="col-md-12">
								<div class="token"></div>
								<div class="dropzone">
									<div class="dz-message">
										<h3> Drag and Drop your files here Or Click here to upload</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				
			</div>
		</div>
</div>
<?php echo form_close(); ?>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->