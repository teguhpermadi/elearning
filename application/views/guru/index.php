<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Guru Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('guru/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Password</th>
						<th>Nomor Induk</th>
						<th>Foto</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($guru as $g){ ?>
                    <tr>
						<td><?php echo $g['id']; ?></td>
						<td><?php echo $g['password']; ?></td>
						<td><?php echo $g['nomor_induk']; ?></td>
						<td><?php echo $g['foto']; ?></td>
						<td><?php echo $g['first_name']; ?></td>
						<td><?php echo $g['last_name']; ?></td>
						<td><?php echo $g['email']; ?></td>
						<td>
                            <a href="<?php echo site_url('guru/edit/'.$g['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('guru/remove/'.$g['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>