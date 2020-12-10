<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- get category -->
                    <h1>
                        <?php
                        $cat = $this->Posts_model->get_category_by_post_id($data_post['id']);
                        print_r($cat);
                        // echo $cat[0]['title']
                        ?>
                    </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-primary font-weight-bold"><?= $data_post['title'] ?></h3>
                <!-- get tags -->
                <?php
                $tags = $this->Posts_model->get_tag_by_post_id($data_post['id']);
                foreach ($tags as $tag) {
                    echo '<span class="badge badge-info float-right mr-1">' . $tag['title'] . '</span>';
                }
                ?>
            </div>
            <div class="card-body">
                <?= $data_post['content'] ?>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <span class="text-info font-weight-bold"> 
                <?php
                echo ($data_post['published'] == 1) ? 'Terbit' : 'Draf';
                ?>
                </span> <?= $data_post['published_at'] ?>
                <span class="text-info font-weight-bold">Penulis </span> 
                <?php 
                $users = $this->Posts_model->get_user_info($data_post['author_id']);  
                echo $users['first_name'];
                ?>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->