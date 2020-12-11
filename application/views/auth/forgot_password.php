<div class="page-header pt-5" style="background-image: url('<?= base_url('public/assets/img/fundo.jpg'); ?>');">
  <div class="filter"></div>
    <div class="container pt-5">
      <div class="row">
        <div class="col-lg-5 ml-auto mr-auto">
          <div class="card card-register">

                  <h2><?= lang('forgot_password_heading');?></h2>
                  <p class="pt-3"><?= sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
                  <div id="infoMessage"><?= $message;?></div>
                  <?= form_open("auth/forgot_password");?>
                        <p>
                              <label for="identity"><?= (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
                              <?= form_input($identity);?>
                        </p>
                        <p class="col-8 mx-auto"><?= form_submit('submit', lang('forgot_password_submit_btn'), 'class="btn bot-dourado btn-block btn-round"');?></p>
                  <?= form_close();?>
            
           </div>
        </div>
      </div>
    </div>
    <div class="footer register-footer text-center">
      <h6>© Space Lashes <?= date('Y'); ?>, feito com <i class="fa fa-heart heart"></i> por <a class="cb-link" target="_blank" href="http://hospedagem.ifspguarulhos.edu.br/~gu1800078/cubo/">CUBO</a>.</h6>  
    </div>
  </div> 