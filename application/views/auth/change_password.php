<div class="login-box">
      <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
            <div class="card-body login-card-body">
                  <!-- <h1><?php echo lang('change_password_heading'); ?></h1> -->
                  <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
                  <?php if($message) : ?>
                  <div class="alert alert-warning" role="alert">
                        <div id="infoMessage"><?php echo $message; ?></div>
                  </div>
                  <?php endif ?>

                  <?php echo form_open("auth/change_password"); ?>

                  <div class="input-group mb-3">
                        <?php echo form_input($old_password); ?>
                        <div class="input-group-append">
                              <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                              </div>
                        </div>
                  </div>
                  <div class="input-group mb-3">
                        <?php echo form_input($new_password); ?>
                        <div class="input-group-append">
                              <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                              </div>
                        </div>
                  </div>
                  <div class="input-group mb-3">
                        <?php echo form_input($new_password_confirm); ?>
                        <div class="input-group-append">
                              <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                              </div>
                        </div>
                  </div>
            </div>
            <div class="card-footer">
                  <?php echo form_input($user_id); ?>
                  <?php echo form_submit('submit', lang('change_password_submit_btn'), 'class="btn btn-primary float-left"'); ?>
                  <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary float-right">Batal</a>
            </div>
            <!-- /.login-card-body -->
            <?php echo form_close(); ?>

      </div>
</div>
<!-- /.login-box -->