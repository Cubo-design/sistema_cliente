<div class="main">
    <div id="cilios" class="section text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">CONHEÇA OS MODELOS DE CÍLIOS</h2>
            <h5 class="description">Marque já seu horário, e venha se sentir mais linda</h5>
            <br>
          </div>
        </div>
        <div class="row">

        <?php 
            if(!empty($services)){
              foreach($services as $service){ ?>
          <div class="col-md-4 mx-auto mt-4 mb-1">
            <div class="info">
              <div class="icon">
                <img src="<?= base_url() . $service["service_img"]; ?>" class="img-fluid" />
              </div>
              <div class="description">
                <h4 class="info-title"><?= $service["service_name"]; ?></h4>
                <p><?= $service["service_description"]; ?></p>
                <a href="<?= base_url('index.php/pages/servico/'). $service["service_id"]; ?>" class="btn btn-link"><span class="link-dor" >Saiba +</span></a>
              </div>
            </div>
          </div>
          <?php }
            }
          ?>

        </div>
      </div>
    </div>