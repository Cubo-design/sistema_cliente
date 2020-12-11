<div class="page-header pt-5" style="background-image: url('<?= base_url(); ?>public/assets/img/fundo.jpg');">
    <div class="filter"></div>
    <div class="container pt-5 mt-5">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="card card-register"> 
                  <div class="text-center">
                        <h2 class="font-weight-bold text-dark"><?= lang('create_user_heading');?></h2>
                        <p class="font-weight-bold text-dark"><?= lang('create_user_subheading');?></p>
                  </div>
                  <div id="infoMessage"><?= $message;?></div>
                  <?= form_open("auth/create_user");?>
                        <p>
                              <?= lang('create_user_fname_label', 'first_name', 'class="font-weight-bold text-dark"');?><br/>
                              <?= form_input($first_name);?>
                        </p>
                        <p>
                              <?= lang('create_user_lname_label', 'last_name', 'class="font-weight-bold text-dark"');?><br/>
                              <?= form_input($last_name);?>
                        </p>
                        <?php
                              if($identity_column!=='email') {
                              echo '<p>';
                              echo lang('create_user_identity_label', 'identity');
                              echo '<br />';
                              echo form_error('identity');
                              echo form_input($identity);
                              echo '</p>';
                              }
                        ?>
                        <p>
                              <?= lang('create_user_email_label', 'email', 'class="font-weight-bold text-dark"');?><br/>
                              <?= form_input($email);?>
                        </p>
                        <p>
                              <?= lang('create_user_phone_label', 'phone', 'class="font-weight-bold text-dark"');?><br/>
                              <?= form_input($phone);?>
                        </p>
                        <p>
                              <?= lang('create_user_password_label', 'password', 'class="font-weight-bold text-dark"');?><br/>
                              <?= form_input($password);?>
                        </p>
                        <p>
                              <?= lang('create_user_password_confirm_label', 'password_confirm', 'class="font-weight-bold text-dark"');?><br/>
                              <?= form_input($password_confirm);?>
                        </p>
                  <div class="col-lg-6 col-sm-10 mx-auto">
                        <p><?= form_submit('submit', lang('create_user_submit_btn'), 'class="btn btn-block btn-round bot-sombreado"');?></p>
                  </div>
            <?= form_close();?>
            </div>
        </div>
      </div>
    </div>
    <div class="footer register-footer text-center" style="top:97%;">
      <h6>© Space Lashes <?= date('Y'); ?>, feito com <i class="fa fa-heart heart"></i> por <a class="cb-link" target="_blank" href="http://hospedagem.ifspguarulhos.edu.br/~gu1800078/cubo/">CUBO</a>.</h6>  
    </div>
  </div>  
