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
		<?php echo form_open('post/edit/' . $post['id']); ?>
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<div class="col-md-12">
							<label for="title" class="control-label"><span class="text-danger">*</span>Title</label>
							<div class="form-group">
								<input type="text" name="title" value="<?php echo ($this->input->post('title') ? $this->input->post('title') : $post['title']); ?>" class="form-control" id="title" />
								<span class="text-danger"><?php echo form_error('title'); ?></span>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<label for="content" class="control-label"><span class="text-danger">*</span>Content</label>
								<div class="form-group">
									<textarea name="content" class="form-control summernote" id="content"><?php echo ($this->input->post('content') ? $this->input->post('content') : $post['content']); ?></textarea>
									<span class="text-danger"><?php echo form_error('content'); ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#ujianModal">Sisipkan Ujian</button>
							</div>
							<div class="col-md-12 mt-3">
								<div id="previewSisipkanUjian">
									<?php foreach ($this_ujian as $ujian) : ?>
										<div class="alert alert-warning alert-dismissible fade show alert-ujian" role="alert" id="alert-<?= $ujian['id'] ?>">
											<strong>Nama:</strong> <?= $ujian['nama_ujian'] ?><br>
											<strong>Kelas tingkat:</strong> <?= $ujian['kelas_tingkat'] ?><br>
											<strong>Waktu selesai:</strong> <?= $ujian['waktu_selesai'] ?><br>
											<strong>Token:</strong> <?= $ujian['token'] ?>
											<button type="button" class="close" aria-label="Close" onclick="deleteUjian(<?= $ujian['id'] ?>)">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php endforeach ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="">File disisipkan</label>
								<?php
								foreach ($attachfile as $at) :
								?>
									<div class="alert alert-info alert-dismissible fade show myFile" role="alert" data-token="<?= $at['token'] ?>" data-filename="<?= $at['file_name'] ?>">
										<input type="hidden" name="token[]" value="<?= $at['token'] ?>">
										<a href="<?= base_url('post/download_attachfile/') . $at['file_name'] ?>"><strong><?= $at['file_name'] ?></strong></a>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								<?php
								endforeach;
								?>
							</div>
						</div>
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
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						Pengaturan
					</div>
					<div class="card-body">
						<div class="col-md-12">
							<label for="jenis" class="control-label">Jenis</label>
							<div class="form-group">
								<select name="jenis" class="form-control">
									<!-- <option value="">select</option> -->
									<?php
									$jenis_values = array(
										'materi' => 'Materi',
										'tugas' => 'Tugas',
									);

									foreach ($jenis_values as $value => $display_text) {
										$selected = ($value == $post['jenis']) ? ' selected="selected"' : "";

										echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<label for="parrent_id" class="control-label">Sub Bab dari</label>
							<div class="form-group">
								<select name="parrent_id" class="form-control">
									<option value="">select post</option>
									<?php
									foreach ($all_posts as $sub_post) {
										$selected = ($sub_post['id'] == $post['parrent_id']) ? ' selected="selected"' : "";

										echo '<option value="' . $sub_post['id'] . '" ' . $selected . '>' . $sub_post['title'] . '</option>';
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
										'0' => 'Draf',
										'1' => 'Terbit',
										// '2' => 'Terjadwal',
									);

									foreach ($published_values as $value => $display_text) {
										$selected = ($value == $post['published']) ? ' selected="selected"' : "";

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
								<input type="text" name="author_id" value="<?php echo ($this->input->post('author_id') ? $this->input->post('author_id') : $post['author_id']); ?>" class="form-control" id="author_id" />
							</div>
						</div> -->

						<!-- <div class="col-md-12">
							<label for="meta_title" class="control-label">Meta Title</label>
							<div class="form-group">
								<input type="text" name="meta_title" value="<?php echo ($this->input->post('meta_title') ? $this->input->post('meta_title') : $post['meta_title']); ?>" class="form-control" id="meta_title" />
							</div>
						</div> -->
						<!-- <div class="col-md-12">
							<label for="slug" class="control-label">Slug</label>
							<div class="form-group">
								<input type="text" name="slug" value="<?php echo ($this->input->post('slug') ? $this->input->post('slug') : $post['slug']); ?>" class="form-control" id="slug" />
							</div>
						</div> -->
						<!-- <div class="col-md-12">
							<label for="summary" class="control-label">Summary</label>
							<div class="form-group">
								<input type="text" name="summary" value="<?php echo ($this->input->post('summary') ? $this->input->post('summary') : $post['summary']); ?>" class="form-control" id="summary" />
							</div>
						</div> -->
						<!-- <div class="col-md-12">
							<label for="created_at" class="control-label">Created At</label>
							<div class="form-group">
								<input type="text" name="created_at" value="<?php echo ($this->input->post('created_at') ? $this->input->post('created_at') : $post['created_at']); ?>" class="has-datetimepicker form-control" id="created_at" />
							</div>
						</div> -->
						<!-- <div class="col-md-12">
							<label for="updated_at" class="control-label">Updated At</label>
							<div class="form-group">
								<input type="text" name="updated_at" value="<?php echo ($this->input->post('updated_at') ? $this->input->post('updated_at') : $post['updated_at']); ?>" class="has-datetimepicker form-control" id="updated_at" />
							</div>
						</div> -->
						<div class="col-md-12">
							<label for="published_at" class="control-label">Published At</label>
							<div class="form-group">
								<?php
								$date = new DateTime($post['published_at']);
								$convert_date = $date->format('Y-m-d\TH:i:s');
								?>
								<input type="datetime-local" name="published_at" value="<?php echo ($this->input->post('published_at') ? $this->input->post('published_at') : $convert_date); ?>" class="has-datetimepicker form-control" id="published_at" />
							</div>
						</div>
						<div class="col-md-12">
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
						<div class="col-md-12">
							<label for="tag_id" class="control-label">Tag</label>
							<div class="form-group">
								<?php
								foreach ($all_tag as $tag) {
									$tag_id = $this->Post_tag_model->check_post_tag($post['id'], $tag['id']);
									$checked = ($tag_id) ? ' checked' : "";
									echo '<input type="checkbox" name="tag_id[]" value="' . $tag['id'] . '" ' . $checked . '/> ' . $tag['title'] . '<br>';
								}
								?>
							</div>
							<span class="text-danger"><?php echo form_error('tag_id[]'); ?></span>
						</div>
					</div>
					<div class="card-footer">
						<div id="sisipkanUjian">
							<?php foreach ($this_ujian as $ujian) : ?>
								<input type="hidden" name="sisipkanujian[]" value="<?= $ujian['id'] ?>" id="sisipkanujian-<?= $ujian['id'] ?>">
							<?php endforeach ?>
						</div>
						<button type="submit" class="btn btn-primary">
							Simpan
						</button>
					</div>
				</div>
			</div>
		</div>
		<?php echo form_close(); ?>

		<!-- Modal -->
		<div class="modal fade" id="ujianModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Daftar Ujian</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<td>Nama Ujian</td>
									<td>Jumlah Soal</td>
									<td>Kategori</td>
									<td>Kelas Tingkat</td>
									<td>Durasi</td>
									<td>Batas Ujian</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($all_ujian as $ujian) : ?>
									<tr>
										<td><?= $ujian['nama_ujian'] ?></td>
										<td><?php
											$count = $this->Ujian_model->count_soal($ujian['id']);
											echo 'Total Soal: ' . $count['total'] . '<br>';
											echo 'Pilihan Ganda: ' . $count['pilgan'] . '<br>';
											echo 'Isian: ' . $count['isian'];
											?></td>
										<td><?= $ujian['nama_mapel'] ?></td>
										<td><?= $ujian['kelas_tingkat'] ?></td>
										<td><?= $ujian['durasi'] ?></td>
										<td><?= ($ujian['waktu_selesai'] == '0000-00-00 00:00:00') ? '<span class="badge badge-secondary">Tanpa Batas</span>' : '<span class="badge badge-info">' . $ujian['waktu_selesai'] . '</span>'; ?></td>
										<td>
											<button type="button" class="btn btn-primary btn-sm btn-sisipkan" data-ujianid="<?= $ujian['id'] ?>" id="ujian-<?= $ujian['id'] ?>">Sisipkan</button>
										</td>

									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>


	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->