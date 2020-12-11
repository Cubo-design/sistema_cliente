 <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="300">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand text-warning" href="<?= base_url(); ?>">
          <span class="display-6"><span class="prim">S</span>PACE <span class="prim">L</span>ASHES</span>
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('index.php/pages/historia'); ?>">História</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('index.php/pages/recomendar'); ?>">Extensão de Cílios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('index.php/pages/galeria'); ?>">Galeria</a>
          </li>
          <li style="display:none;" class="nav-item">
            <a class="nav-link" href="#contato">Contato</a>
          </li>
          <?= $etiqueta ?>
        </ul>
      </div>
    </div>
  </nav>