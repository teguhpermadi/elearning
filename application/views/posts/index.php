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
        <?php echo json_encode($all_posts) ?>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Postingan</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Tanggal Buat</th>
                            <th>Tanggal Terbit</th>
                            <th>Kategori</th>
                            <th>Tag</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_posts as $post) { ?>
                            <tr>
                                <td><?= $post['title'] ?></td>
                                <td><?= $post['slug'] ?></td>
                                <td><?= $post['published'] ?></td>
                                <td><?= $post['created_at'] ?></td>
                                <td><?= $post['published_at'] ?></td>
                                <td>
                                    <?php 
                                    $category = $this->Posts_model->get_category_by_post_id($post['id']);

                                    print_r($category);
                                    ?>

                                </td>
                                <td>Tag</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="row ml-1 mb-3">
            <form class="form-inline">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Kategori</label>
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Tag</label>
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

                <button type="submit" class="btn btn-primary my-1">Filter</button>
            </form>
        </div>

        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <!-- The timeline -->
                <div class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <div class="time-label">
                        <span class="bg-danger">
                            10 Feb. 2014
                        </span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="far fa-clock"></i> 12:05</span>

                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                            <div class="timeline-body">
                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                quora plaxo ideeli hulu weebly balihoo...
                            </div>
                            <div class="timeline-footer">
                                <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            </div>
                        </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                            <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                            </h3>
                        </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline time label -->

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->