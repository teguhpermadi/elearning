<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profil</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <?php
                                if (user_info()['foto'] != null) {
                                    $foto = base_url('uploads/') . $user['foto'];
                                } else {
                                    $foto = base_url('assets/images/avatar_default.png');
                                }
                                ?>
                                <img class="profile-user-img img-fluid img-circle" src="<?= $foto ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $user['first_name'] . ' ' . $user['last_name'] ?></h3>

                            <p class="text-muted text-center"><?= $user_groups[0]->description ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item" href="#">
                                    <a href="<?= $user['url_fb'] ?>" target="_blank"><b>Facebook</b></a>
                                    <span class="float-right"><i class="fab fa-facebook"></i></span>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?= $user['url_twitter'] ?>" target="_blank"><b>Twitter</b></a>
                                    <span class="float-right" href="#"><i class="fab fa-twitter"></i></span>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?= $user['url_instagram'] ?>" target="_blank"><b>Instagram</b></a>
                                    <span class="float-right" href="#"><i class="fab fa-instagram"></i></span>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?= $user['url_youtube'] ?>" target="_blank"><b>Youtube</b></a>
                                    <span class="float-right" href="#"><i class="fab fa-youtube"></i></span>
                                </li>
                            </ul>

                            <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            Pengaturan
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                <div class="active tab-pane" id="settings">
                                    <?php echo form_open_multipart('profil_user/update'); ?>

                                    <!-- <form class="form-horizontal" id="form" enctype='multipart/form-data' action="<?= base_url('profil_user/update') ?>"> -->
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Foto (.jpg)</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="userfile" size="20" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Telp</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="phone" name="phone" value="<?= $user['phone'] ?>" placeholder="6285xxx">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Nomor Induk</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="nomor_induk" name="nomor_induk" value="<?= $user['nomor_induk'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $user['tempat_lahir'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $user['tanggal_lahir'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Pendidikan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?= $user['pendidikan'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">URL Facebook</label>
                                        <div class="col-sm-10">
                                            <input type="url" class="form-control" id="url_fb" name="url_fb" value="<?= $user['url_fb'] ?>" placeholder="https://example.com">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">URL Twitter</label>
                                        <div class="col-sm-10">
                                            <input type="url" class="form-control" id="url_twitter" name="url_twitter" value="<?= $user['url_twitter'] ?>" placeholder="https://example.com">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">URL Instagram</label>
                                        <div class="col-sm-10">
                                            <input type="url" class="form-control" id="url_instagram" name="url_instagram" value="<?= $user['url_instagram'] ?>" placeholder="https://example.com">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">URL Youtube</label>
                                        <div class="col-sm-10">
                                            <input type="url" class="form-control" id="url_youtube" name="url_youtube" value="<?= $user['url_youtube'] ?>" placeholder="https://example.com">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Biografi</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="biografi" name="biografi" value="<?= $user['biografi'] ?>" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>