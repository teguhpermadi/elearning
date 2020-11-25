<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Kelas Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('kelas/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Tingkat</th>
						<th>Nama</th>
						<th>Kode</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($kelas as $k){ ?>
                    <tr>
						<td><?php echo $k['id']; ?></td>
						<td><?php echo $k['tingkat']; ?></td>
						<td><?php echo $k['nama']; ?></td>
						<td><?php echo $k['kode']; ?></td>
						<td>
                            <a href="<?php echo site_url('kelas/edit/'.$k['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('kelas/remove/'.$k['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
