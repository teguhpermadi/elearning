<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
            <div class="container-fluid">
                  <div class="row mb-2">
                        <div class="col-sm-6">
                              <h1><?php echo lang('create_user_heading'); ?></h1>
                        </div>
                  </div>
            </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

            <?php if ($message) { ?>
                  <div class="alert alert-warning" role="alert">
                        <div id="infoMessage"><?php echo $message; ?></div>
                  </div>
            <?php } ?>

            <!-- Default box -->
            <div class="card">
                  <div class="card-header">
                        <h3><?php echo lang('create_user_subheading'); ?></h3>
                  </div>
                  <?php echo form_open("auth/create_user"); ?>

                  <div class="card-body">

                        <div class="form-group">
                              <?php echo form_input($first_name); ?>
                        </div>
                        <div class="form-group">
                              <?php echo form_input($last_name); ?>
                        </div>
                        <div class="form-group">
                              <?php
                              if ($identity_column !== 'email') {
                                    echo '<p>';
                                    echo lang('create_user_identity_label', 'identity');
                                    echo '<br />';
                                    echo form_error('identity');
                                    echo form_input($identity);
                                    echo '</p>';
                              }
                              ?>
                        </div>
                        <div class="form-group">
                              <?php echo form_input($company); ?>
                        </div>
                        <div class="form-group">
                              <?php echo form_input($email); ?>
                        </div>
                        <div class="form-group">
                              <?php echo form_input($phone); ?>
                        </div>
                        <div class="form-group">
                              <?php echo form_input($password); ?>
                        </div>
                        <div class="form-group">
                              <?php echo form_input($password_confirm); ?>
                        </div>
                        <div class="form-group">
                              <select class="custom-select" name="user_category">
                                    <option selected>User Category</option>
                                    <?php foreach($groups as $g){ ?>
                                    <option value="<?= $g->id?>"><?= $g->name?></option>
                                    <?php } ?>
                              </select>
                        </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                        <?php echo form_submit('submit', lang('create_user_submit_btn'), 'class="btn btn-primary"'); ?>
                        <a href="<?= base_url('auth') ?>" class="btn btn-secondary">Batal</a>
                  </div>
                  <!-- /.card-footer-->
                  <?php echo form_close(); ?>

            </div>
            <!-- /.card -->

      </section>
      <!-- /.content -->
</div>
<!-- /.content-wrapper -->