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
			<table class="table table-striped">
                    <tr>
						<!-- <th>ID</th> -->
						<!-- <th>Parrent Id</th> -->
						<th>Published</th>
						<th>Author Id</th>
						<th>Title</th>
						<!-- <th>Meta Title</th> -->
						<!-- <th>Slug</th> -->
						<!-- <th>Summary</th> -->
						<th>Created At</th>
						<!-- <th>Updated At</th> -->
						<th>Published At</th>
						<!-- <th>Content</th> -->
						<th>Actions</th>
                    </tr>
                    <?php foreach($posts as $p){ ?>
                    <tr>
						<!-- <td><?php echo $p['id']; ?></td> -->
						<!-- <td><?php echo $p['parrent_id']; ?></td> -->
						<td><?php
						switch ($p['published']) {
							case '0':
								echo 'Draf';
								break;
							case '1':
								echo 'Terbit';
								break;
							case '2':
								echo 'Terjadwal';
								break;
						}
						?></td>
						<td><?php 
						$user = $this->Post_model->get_user( $p['author_id']);
						echo $user['first_name']; 
						?></td>
						<td><?php echo $p['title']; ?></td>
						<!-- <td><?php echo $p['meta_title']; ?></td> -->
						<!-- <td><?php echo $p['slug']; ?></td> -->
						<!-- <td><?php echo $p['summary']; ?></td> -->
						<td><?php echo $p['created_at']; ?></td>
						<!-- <td><?php echo $p['updated_at']; ?></td> -->
						<td><?php echo $p['published_at']; ?></td>
						<!-- <td><?php echo $p['content']; ?></td> -->
						<td>
                            <a href="<?php echo site_url('post/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('post/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
