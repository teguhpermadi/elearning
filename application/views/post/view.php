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
          <?= time_elapsed_string($post['published_at'], null); ?> |
          <?= $post['published_at'] ?>
        </span>
      </div>
      <div class="card-body">
        <?= $post['content'] ?>
      </div>
      <div class="card-footer">
        <div class="default_replyrow">
          <form method="POST" id="form_comment" class="mt-3 replyrow">
            <div class="form-group">
              <textarea name="content" id="content" class="form-control" placeholder="Tulis Komentar" rows="1" required></textarea>
            </div>
            <div class="form-group">
              <input type="hidden" name="post_id" id="post_id" value="<?= $post['id'] ?>" />
              <input type="hidden" name="author_id" id="author_id" value="<?= user_info()['id'] ?>" />
              <input type="hidden" name="parrent_id" id="parrent_id" value="0" />
              <input type="submit" name="submit" id="submit" class="btn btn-info" value="Kirim" />
              <input type="button" name="cancel" id="cancel" class="btn btn-secondary" value="Batal">
            </div>
          </form>
        </div>
      </div>
      <div class="card-footer card-comments">
        <div id="display_comment"></div>
      </div>

    </div>

</div>

</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->