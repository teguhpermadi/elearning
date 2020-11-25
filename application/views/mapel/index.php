<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Mapel Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('mapel/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Nama</th>
						<th>Kode</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($mapel as $m){ ?>
                    <tr>
						<td><?php echo $m['id']; ?></td>
						<td><?php echo $m['nama']; ?></td>
						<td><?php echo $m['kode']; ?></td>
						<td>
                            <a href="<?php echo site_url('mapel/edit/'.$m['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('mapel/remove/'.$m['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
