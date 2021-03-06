<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pengajar Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('pengajar/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Id Mapel</th>
						<th>Id Guru</th>
						<th>Id Kelas</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($pengajar as $p){ ?>
                    <tr>
						<td><?php echo $p['id']; ?></td>
						<td><?php echo $p['id_mapel']; ?></td>
						<td><?php echo $p['id_guru']; ?></td>
						<td><?php echo $p['id_kelas']; ?></td>
						<td>
                            <a href="<?php echo site_url('pengajar/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('pengajar/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
