  <div class="page-header pt-5" style="background-image: url('<?= base_url(); ?>public/assets/img/fundo.jpg');">
    <div class="filter"></div>
    <div class="container pt-5">
      <div class="row">
        <div class="col-lg-4 ml-auto mr-auto">
          <div class="card card-register">
            <h3 class="title mx-auto">Bem-vindo!</h3>
            <?php if ($this->session->flashdata("danger")) : ?>
            <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
            <?php endif ?>
            <form class="register-form" method="post" name="cadastro">
                <label>Email</label>
                <div class="input-group form-group-no-border">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="nc-icon nc-email-85"></i>
                    </span>
                  </div>
                  <input type="email" id="email" name="email" class="form-control">
                </div>
                <label>Senha</label>
                <div class="input-group form-group-no-border">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="nc-icon nc-key-25"></i>
                    </span>
                  </div>
                  <input type="password" id="senha" name="senha" class="form-control">
                </div>
				<div style="display:none;" class="form-check text-center">
				  <label class="form-check-label">
					<input class="form-check-input" type="checkbox" value=""> Lembrar de Mim?
					<span class="form-check-sign"></span>
				  </label>
				</div>
                <button class="btn btn-danger btn-block btn-round">Login</button>
              </form>
            <div style="display:none;" class="forgot">
              <a href="#" class="btn btn-link btn-danger">Esqueceu sua senha?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer register-footer text-center">
            <h6>© Space Lashes
              <script>
                document.write(new Date().getFullYear())
              </script>, feito com <i class="fa fa-heart heart"></i> por <a class="log" target="_blank" href="http://hospedagem.ifspguarulhos.edu.br/~gu1800078/cubo/">CUBO</a>.
			</h6>  
    </div>
  </div>