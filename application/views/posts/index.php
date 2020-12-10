<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Postingan</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Daftar Postingan</h3>
			</div>
			<div class="card-body">
				<table class="table table-striped" id="posts">
					<thead>
						<tr>
							<th>Judul</th>
							<th>Status</th>
							<th>Tanggal Buat</th>
							<th>Tanggal Terbit</th>
							<th>Kategori</th>
                            <th>Tag</th>
                            <th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($all_posts as $post) { ?>
						<tr>
							<td>
                            <a href="<?= base_url('posts/view/'.$post['id']) ?>">
                            <?= $post['title'] ?></td>
                        </a>    
							<td><?php
							 date_default_timezone_set('Asia/Jakarta');
							 $date_now = date("Y-m-d H:i:s");

							if ($post['published'] == 0) {
								'<span class="badge badge-secondary">Draf</span>';
							} else {
								if($post['published_at'] > $date_now){
									echo '<span class="badge badge-info">Terjadwal</span>'; 
								} else {
									echo '<span class="badge badge-info">Terbit</span>'; 
								}
							}
							?>
									 </td>
							<td><?= $post['created_at'] ?></td>
							<td><?= $post['published_at'] ?></td>
							<td>
								<?php
									$get_category = $this->Posts_model->get_category_by_post_id($post['id']);
									// print_r($get_category);
									// print_r($post['id']);
                                    foreach ($get_category as $gc) {
                                    ?>
								<span class="badge badge-info"><?= $gc['title'] ?></span>
								<?php } ?>
							</td>
							<td>
								<?php
                                    $tags = $this->Posts_model->get_tag_by_post_id($post['id']);
                                    foreach ($tags as $tag) {
										if($tag['post_id'] == $post['id']){
											echo '<span class="badge badge-info mr-1">'.$tag['title'].'</span>';
										}
									}
                                    ?>
                            </td>
                            <td>
                                <a href="<?= base_url('posts/edit/'.$post['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('posts/remove/'.$post['id']) ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
