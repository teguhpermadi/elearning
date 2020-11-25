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
						<th>Password</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Nomor Induk</th>
						<th>Foto</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($siswa as $s){ ?>
                    <tr>
						<td><?php echo $s['id']; ?></td>
						<td><?php echo $s['password']; ?></td>
						<td><?php echo $s['first_name']; ?></td>
						<td><?php echo $s['last_name']; ?></td>
						<td><?php echo $s['email']; ?></td>
						<td><?php echo $s['nomor_induk']; ?></td>
						<td><?php echo $s['foto']; ?></td>
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