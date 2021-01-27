<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
            <div class="container-fluid">
                  <div class="row mb-2">
                        <div class="col-sm-6">
                              <h1><?php echo lang('edit_user_heading'); ?></h1>
                              <div id="infoMessage"><?php echo $message; ?></div>
                        </div>
                  </div>
            </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

            <!-- Default box -->
            <div class="card">
                  <div class="card-header">
                        <h3 class="card-title">
                              <?php echo lang('edit_user_subheading'); ?>
                        </h3>
                  </div>
                  <?php echo form_open(uri_string()); ?>

                  <div class="card-body">
                        <p>
                              <?php echo lang('edit_user_fname_label', 'first_name'); ?> <br />
                              <?php echo form_input($first_name); ?>
                        </p>

                        <p>
                              <?php echo lang('edit_user_lname_label', 'last_name'); ?> <br />
                              <?php echo form_input($last_name); ?>
                        </p>

                        <p>
                              <?php echo lang('edit_user_company_label', 'company'); ?> <br />
                              <?php echo form_input($company); ?>
                        </p>

                        <p>
                              <?php echo lang('edit_user_phone_label', 'phone'); ?> <br />
                              <?php echo form_input($phone); ?>
                        </p>

                        <p>
                              <?php echo lang('edit_user_password_label', 'password'); ?> <br />
                              <?php echo form_input($password); ?>
                        </p>

                        <p>
                              <?php echo lang('edit_user_password_confirm_label', 'password_confirm'); ?><br />
                              <?php echo form_input($password_confirm); ?>
                        </p>

                        <?php if ($this->ion_auth->is_admin()) : ?>

                              <h3><?php echo lang('edit_user_groups_heading'); ?></h3>
                              <?php foreach ($groups as $group) : ?>
                                    <label class="checkbox">
                                          <?php
                                          $gID = $group['id'];
                                          $checked = null;
                                          $item = null;
                                          foreach ($currentGroups as $grp) {
                                                if ($gID == $grp->id) {
                                                      $checked = ' checked="checked"';
                                                      break;
                                                }
                                          }
                                          ?>
                                          <input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo $checked; ?>>
                                          <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                                    </label>
                              <?php endforeach ?>

                        <?php endif ?>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                        <?php echo form_hidden('id', $user->id); ?>
                        <?php echo form_hidden($csrf); ?>
                        <?php echo form_submit('submit', lang('edit_user_submit_btn'), 'class="btn btn-primary"'); ?>
                        <a href="<?= base_url('auth') ?>" class="btn btn-secondary">Kembali</a>
                  </div>
                  <!-- /.card-footer-->
                  <?php echo form_close(); ?>

            </div>
            <!-- /.card -->

      </section>
      <!-- /.content -->
</div>
<!-- /.content-wrapper -->