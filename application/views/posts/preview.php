<style>
    .watermark {
        position: fixed;
        top: 70px;
        right: 25px;
    }
</style>


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
                        $cat = $this->Category_model->get_category($category);
                        echo $cat['title']
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
                <h3 class="card-title text-primary font-weight-bold"><?= $title ?></h3>
                <!-- get tags -->
                <?php
                foreach ($tags as $tag) {
                    $t = $this->Tags_model->get_tag($tag);
                    echo '<span class="badge badge-info float-right mr-1">' . $t['title'] . '</span>';
                }
                ?>
            </div>
            <div class="card-body">
                <?= $content ?>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <span class="text-info font-weight-bold">Draf </span> <?= $published_at ?>
                <span class="text-info font-weight-bold">Penulis </span> <?= user_info()['first_name'] ?>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="watermark alert alert-warning"><strong>PREVIEW</strong></div>