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
							<td><?php echo ($post['published'] == 1) ? '<span class="badge badge-info">Terbit</span>' : '<span class="badge badge-secondary">Draf</span>'; ?></td>
							<td><?= $post['created_at'] ?></td>
							<td><?= $post['published_at'] ?></td>
							<td>
								<?php
                                    $category = $this->Posts_model->get_category_by_post_id($post['id']);
                                    foreach ($category as $c) {
                                    ?>
								<span class="badge badge-info"><?= $c['title'] ?></span>
								<?php } ?>
							</td>
							<td>
								<?php
                                    $tags = $this->Posts_model->get_tag_by_post_id($post['id']);
                                    foreach ($tags as $tag) {
                                    ?>
								<span class="badge badge-info"><?= $tag['title'] ?></span>
                                    <?php } ?>
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
