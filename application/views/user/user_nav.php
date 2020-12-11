<section>
  <div class="container">
      <div class="owner">
        <div class="avatar">
          <img src="<?= base_url('public/assets/img/logotipo.jpeg'); ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
        </div>
      </div>
    <div class="row">
      <div class="col-md-12">
        <div class="title">
          <h3>Bem-Vinda, <?= $first_name.' '.$last_name; ?>!</h3>
        </div>
        <div class="nav-tabs-navigation">
          <div class="nav-tabs-wrapper">
            <ul id="tabs" class="nav nav-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link" href="<?= base_url('index.php/usuario'); ?>" role="tab">Perfil</a></li>
              <li class="nav-item"><a class="nav-link" href="<?= base_url('index.php/auth/edit_user/'.$user_id); ?>" role="tab">Editar Perfil</a></li>
              <li class="nav-item"><a class="nav-link" href="<?= empty($ficha) ? base_url('index.php/ficha/ficha/'.$user_id) : base_url('index.php/ficha/editar_ficha/'.$user_id) ?>" role="tab">Ficha de Anamnese</a></li>
              <li class="nav-item"><a class="nav-link" href="<?= empty($depoimento) ? base_url('index.php/usuario/depoimento/'.$user_id) : base_url('index.php/usuario/editar_depoimento/'.$user_id) ?>" role="tab">Classificar</a></li>
            </ul>
          </div>
        </div>
        <div id="my-tab-content" class="tab-content">