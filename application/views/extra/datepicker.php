<div class="container">
    <div class="owner">
        <div class="avatar">
          <img src="<?= base_url('public/assets/img/logotipo.jpeg'); ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
        </div>
    </div>
  <div class="row">
       <div class="col-md-6">
          <h3 class="display-4 mt-5 mb-5 text-center"><?= $service["service_name"]; ?></h3>
          <div class="text-center mb-4">
            <img src="<?= base_url($service["service_img"]); ?>" class="img-fluid" />
          </div>
          <p class="justificado"><?= $service["service_description"]; ?></p>
          <p class="justificado"><?= $service["service_details"]; ?></p>
          <h3 class="mb-2">Meios de Pagamento</h3>
          <p class="justificado">Aceito cartões de crédito e pagamento à vista. Ambos deve ser realizados na <b>hora</b> e no <b>local</b> do atendimento.</p>
          <div class="mt-4 mb-5 text-center">
              <p class="preco"><span class="valor">Preço: </span><?= $service["service_price"]; ?></p>
          </div>
       </div>
       <div class="col-md-6 text-center pt-5 mt-5 pb-5 mb-5">
        <?= $calendar ?>
       </div>
  </div>
</div>