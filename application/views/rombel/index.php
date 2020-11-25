<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Rombel Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('rombel/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Id Kelas</th>
						<th>Id Siswa</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($rombel as $r){ ?>
                    <tr>
						<td><?php echo $r['id']; ?></td>
						<td><?php echo $r['id_kelas']; ?></td>
						<td><?php echo $r['id_siswa']; ?></td>
						<td>
                            <a href="<?php echo site_url('rombel/edit/'.$r['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('rombel/remove/'.$r['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
