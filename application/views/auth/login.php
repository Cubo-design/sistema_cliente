<div class="page-header pt-5" style="background-image: url('<?= base_url('public/assets/img/fundo.jpg'); ?>');">
  <div class="filter"></div>
    <div class="container pt-5">
      <div class="row mt-3">
        <div class="col-lg-4 ml-auto mr-auto">
          <div class="card card-register">
            <h1 class="h3 mb-4 text-center" ><?= lang('login_heading');?></h1>
            <p><?= lang('login_subheading');?></p>
            <div id="infoMessage"><?= $message;?></div>
            <?= form_open("auth/login");?>
              <p>
                <?= lang('login_identity_label', 'identity');?>
                <?= form_input($identity); ?>
              </p>
              <p>
                <?= lang('login_password_label', 'password');?>
                <?= form_input($password);?>
              </p>
              <p class="col-9 mx-auto"><?= form_submit('submit', lang('login_submit_btn') , 'class="btn bot-dourado btn-block btn-round mb-2"');?></p>
            <?= form_close();?>
            </div>
        </div>
      </div>
    </div>
    <div class="footer register-footer text-center">
      <h6>© Space Lashes <?= date('Y'); ?>, feito com <i class="fa fa-heart heart"></i> por <a class="cb-link" target="_blank" href="http://hospedagem.ifspguarulhos.edu.br/~gu1800078/cubo/">CUBO</a>.</h6>  
    </div>
  </div>  