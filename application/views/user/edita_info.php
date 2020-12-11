<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title">
          <h3>Bem-Vinda, <?= $first_name.' '.$last_name; ?>!</h3>
        </div>
        <div class="nav-tabs-navigation">
          <div class="nav-tabs-wrapper">
            <ul id="tabs" class="nav nav-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link" href="<?= base_url('index.php/usuario'); ?>" role="tab">Perfil</a></li>
              <li class="nav-item"><a class="nav-link active" href="<?= base_url('index.php/usuario/editar/'.$user_id); ?>" role="tab">Editar</a></li>
              <li class="nav-item"><a class="nav-link" href="<?= base_url('index.php/usuario/ficha/'.$user_id); ?>" role="tab">Ficha de Anamnese</a></li>
              <li class="nav-item"><a class="nav-link" href="<?= base_url('index.php/usuario/depoimento/'.$user_id); ?>" role="tab">Classificar</a></li>
              <li class="nav-item"><a class="nav-link" href="<?= base_url('index.php/usuario/'); ?>" role="tab">Agendamentos/Histórico</a></li>
            </ul>
          </div>
        </div>
          <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active">
             <div class="row mt-4">
                <div class="col-md-4">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="form-group text-center">
                            <img class="img-fluid w-100 img-thumbnail" id="user_img_path" src="<?= isset($user) ? $user['user_img'] : base_url('public/assets/img/users/no_photo.jpg'); ?>" style="max-width:300px;max-height:300px;"/>
                            <label class="btn btn-block btn-success mt-2">
                              <i class="fa fa-upload"></i>&nbsp;&nbsp;Importar Imagem
                              <input type="file" accept="image/*" id="btn_upload_user_img" style="display:none;"/>
                            </label>
                            <input id="user_img" name="user_img" style="display:none;"/>
                            <span class="help-block"></span>
                    </div>

                </div>
                <div class="col-md-8">  
                    
                        <label>Nome: </label><input value="<?= isset($user) ? $user['first_name'] : '' ?>" type="text" id="first_name" name="first_name"  class="form-control mb-4" placeholder="Nome">
                        <label>Sobrenome: </label><input value="<?= isset($user) ? $user['last_name'] : '' ?>" type="text" id="last_name" name="last_name" class="form-control mb-4" placeholder="Sobrenome">
                        <label>E-Mail: </label><input value="<?= isset($user) ? $user['email'] : '' ?>" type="email" id="email" name="email" class="form-control mb-4" placeholder="E-Mail">
                        <label>Login: </label><input value="<?= isset($user) ? $user['username'] : '' ?>" type="text" id="username" name="username" class="form-control mb-4" placeholder="Nome de Usuário">
                        <label>Senha: </label><input value="<?= isset($user) ? $user['password'] : '' ?>" type="password" id="password" name="password" class="form-control mb-4" placeholder="Nome de Usuário">
                        <label>Confirme a Senha: </label><input value="<?= isset($user) ? $user['password'] : '' ?>" type="password" id="password" name="password" class="form-control mb-4" placeholder="Nome de Usuário">
                        <label>Telefone: </label><input value="<?= isset($user) ? $user['phone'] : '' ?>" type="tel" id="phone" name="phone" class="form-control mb-4" placeholder="Telefone">
                            <button class="btn btn-info btn-block my-4" type="submit">Salvar</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </div>    
</section>