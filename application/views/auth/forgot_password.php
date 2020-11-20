<div class="login-box">
      <div class="login-logo">
            <h1><?php echo lang('forgot_password_heading'); ?></h1>
      </div>
      
      <div class="card">
            <div class="card-body login-card-body">
                  <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label); ?></p>
                  <div id="infoMessage"><?php echo $message; ?></div>

                  <?php echo form_open("auth/forgot_password"); ?>

                  <p>
                        <!-- <label for="identity"><?php echo (($type == 'email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label)); ?></label> <br /> -->
                        <?php echo form_input($identity); ?>
                  </p>

                  <div class="row">
                        <div class="col-md-6">
                              <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'), 'class="btn btn-primary"'); ?></p>

                        </div>
                        <div class="col-md-6">
                              <a href="<?= base_url('auth/login') ?>" class="btn btn-secondary float-right">Login</a>
                              
                        </div>
                  </div>
                  <?php echo form_close(); ?>
            </div>
      </div>
</div>