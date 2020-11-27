<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Siswa Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('siswa/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
            <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Id User</th>
						<th>Nama</th>
						<th>Hp</th>
						<th>Email</th>
						<th>Nomor Induk</th>
						<th>Foto</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Alamat</th>
						<th>Biografi</th>
						<th>Url Fb</th>
						<th>Url Twitter</th>
						<th>Url Instagram</th>
						<th>Url Youtube</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($siswa as $s){ ?>
                    <tr>
						<td><?php echo $s['id']; ?></td>
						<td><?php echo $s['id_user']; ?></td>
						<td><?php echo $s['nama']; ?></td>
						<td><?php echo $s['hp']; ?></td>
						<td><?php echo $s['email']; ?></td>
						<td><?php echo $s['nomor_induk']; ?></td>
						<td><?php echo $s['foto']; ?></td>
						<td><?php echo $s['tempat_lahir']; ?></td>
						<td><?php echo $s['tanggal_lahir']; ?></td>
						<td><?php echo $s['alamat']; ?></td>
						<td><?php echo $s['biografi']; ?></td>
						<td><?php echo $s['url_fb']; ?></td>
						<td><?php echo $s['url_twitter']; ?></td>
						<td><?php echo $s['url_instagram']; ?></td>
						<td><?php echo $s['url_youtube']; ?></td>
						<td>
                            <a href="<?php echo site_url('siswa/edit/'.$s['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('siswa/remove/'.$s['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>