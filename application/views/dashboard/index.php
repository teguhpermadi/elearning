<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <?php
                if (file_exists('uploads/logo.png')) {
                    $logo = 'uploads/logo.png';
                } else {
                    $logo = 'assets/images/logo_default.png';
                }
                ?>
                <img src="<?= base_url($logo) ?>" class="float-left mr-3" width="100px">
                <h1 class="display-4">Selamat Datang</h1>
                <p class="lead">Aplikasi E-Learning <span class="text-uppercase font-weight-bold"><?= $profil_sekolah['nama'] ?></span></p>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $count_guru ?></h3>

                        <p>Guru</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $count_siswa ?></h3>

                        <p>Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-graduate"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $count_mapel ?></h3>

                        <p>Mata Pelajaran</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary">
                        Postingan Terbaru
                    </div>
                    <div class="card-body">
                        <table class="table table-striped datatable-posts">
                            <thead>
                                <tr>
                                    <td style="width: 50%;">Judul</td>
                                    <td>Kategori</td>
                                    <td>Diposting</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($all_post as $post) : 
                                    $date_now = strtotime(datetime_now());
                                    $date_publish = strtotime($post['published_at']);

                                    if ($date_publish <= $date_now) :
                                    ?>
                                    <tr>
                                        <td><a href="<?= base_url('post/view/').$post['id'] ?>"><?= $post['title'] ?></a></td>
                                        <td><?= $post['categorytitle'] ?></td>
                                        <td><?= $post['published_at'] ?></td>
                                    </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-danger">
                        Status User
                    </div>
                    <div class="card-body">
                        <table class="table table-striped datatable-users">
                            <thead>
                                <tr>
                                    <td>Nama User</td>
                                    <td>Login Terakhir</td>
                                    <td>Status</td>
                                    <td>Chat</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                date_default_timezone_set("Asia/jakarta");
                                foreach ($cek_login as $login) : ?>
                                    <tr>
                                        <td><?= $login['first_name'] . ' ' .  $login['last_name'] ?></td>
                                        <td><?= date("d-m-Y G:i:s", $login['login_time']) ?></td>
                                        <td><?= ($login['status'] == 'online') ? '<span class="badge badge-primary">Online</span>' : '<span class="badge badge-secondary">Offline</span>' ?></td>
                                        <td><?= (strlen($login['phone']) > 4) ? '<a href="http://wa.me/' . $login['phone'] . '" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp"></i> Chat</a>' : '' ?></td>

                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-indigo">
                        Rekap Nilai
                    </div>
                    <div class="card-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem dolore delectus debitis aliquid veniam iste obcaecati eveniet suscipit ipsa, nesciunt maxime cupiditate sed reprehenderit quod fuga ipsum inventore incidunt nam.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-teal">
                        Peringkat Siswa
                    </div>
                    <div class="card-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem dolore delectus debitis aliquid veniam iste obcaecati eveniet suscipit ipsa, nesciunt maxime cupiditate sed reprehenderit quod fuga ipsum inventore incidunt nam.
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->