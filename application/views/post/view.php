<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Blank Page</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> <?= $post['title'] ?> </h3>
        <span class="badge badge-info float-right">
          <?= $post['published_at'] ?>
        </span>
      </div>
      <div class="card-body">
        <?= $post['content'] ?>
      </div>
      <div class="card-footer card-comments">
        <!-- <div class="card-comment">
          <img class="img-circle img-sm" src="<?= base_url('node_modules/admin-lte/dist/img/user3-128x128.jpg') ?>">
          <div class="comment-text">
            <span class="username">
              Maria Gonzales
              <span class="text-muted float-right">8:03 PM Today</span>
            </span>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda excepturi vel aliquam obcaecati eius corporis laborum quisquam nobis doloribus nihil, incidunt alias recusandae vero vitae dolor inventore. Voluptatum, numquam aliquam.
            <br>
            <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Balas</button>
          </div>
        </div> -->
        <div class="usercomments"></div>

        <div class="row replyrow" style="display:none;">
	      <div class="col-md-12">
          <input type="hidden" name="comment_id" id="comment_id">
          <input type="hidden" value="<?= $post['id'] ?>" id="post_id">
	        <textarea id="replycomment" class="form-control" placeholder="please add comment" cols="30" rows="3" style="margin-top: 10px;"></textarea><br>
	          <button class="btn-default btn float-right ml-3" onclick="$('.replyrow').hide();">close</button>
	          <button class="btn-primary btn float-right ml-3" onclick="isreply=true;" id="addreply">reply</button>
	      </div>
	    </div>

      </div>
      <div class="card-footer">
        <img class="img-fluid img-circle img-sm" src="../dist/img/user4-128x128.jpg">
        <!-- .img-push is used to add margin to elements next to floating images -->
        <div class="img-push">
          <!-- <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment"> -->
          <input type="hidden" value="<?= $post['id'] ?>" id="post_id">
          <textarea class="form-control" rows="3" id="comment"></textarea>
          <button class="btn btn-primary mt-1 float-right" id="addcomment">Add comment</button>
        </div>
      </div>

    </div>

</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->