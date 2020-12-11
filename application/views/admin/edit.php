<section>
    <div class="container">
    <div class="row">
          <div class="col-md-12">
            <div class="title">
              <div class="row">
                <div class="col-md-10">
                  <h3>Bem-Vinda, <?= $nome; ?>!</h3>
                </div>
                <div class="col-md-2">
                  <a class="btn btn-atencao btn-round mt-4" href="<?= base_url('index.php/auth/logout'); ?>"><i class="fa fa-times"></i>&nbsp;&nbsp;Sair</a>
                </div>
              </div>
            </div>
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <ul id="tabs" class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#result" role="tab">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#lash" role="tab">Cílios</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('index.php/auth/lista'); ?>" role="tab">Usuários</a>
                  </li>
                </ul>
              </div>
            </div>
            <div id="my-tab-content" class="tab-content">
			
              <div class="tab-pane active" id="result" role="tabpanel">
                <div class="row mt-3 mb-5">
                  <div class="col-md-4 mx-auto">
                    <div class="card bg-light mb-3" style="max-width: 20rem;">
                      <div class="card-header">Método Mais Pedido</div>
                      <div class="card-body">
                      <h5 class="card-title"><?= $conta['service_name']; ?></h5>
                      <p class="card-text">Quantidade de vezes que este serviço foi agendado: <span class="badge badge-dark"><?= $conta['qntd']; ?></span></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mx-auto">
                    <div class="card bg-light mb-3" style="max-width: 20rem;">
                      <div class="card-header">Último Serviço Agendado</div>
                      <div class="card-body">
                      <h5 class="card-title"><a href="<?= base_url('index.php/admin/user_ficha/').$proximo['user_id']; ?>" class="text-primary"><?= $proximo['name']; ?></a> - <?= $proximo['service_name']; ?></h5>
                      <p class="card-text"><?= $proximo['date']; ?> às <?= $proximo['timeslot']; ?></p>
                      <p class="card-text">Mandar <a class="text-primary" href="mailto:<?= $proximo['email']; ?>">E-Mail</a> para <?= $proximo['name']; ?>.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">

                <div class="col-md-12">
                  <h2 class="font-weight-bolder">Próximos Agendamentos</h2>
                </div>
                <table class="table table-striped table-hover mt-3 mb-5 text-center">
                  <thead class="black white-text">
                    <tr>
                      <th scope="col">Nome da Cliente</th>
                      <th scope="col">Tipo de Cílio</th>
                      <th scope="col">Data</th>
                      <!--<th scope="col">Foi Atendida?</th>-->
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $html = '';
                    foreach($ultimos as $user){
                      if($user['date'] < date('Y-m-d') || $user['date'] == date('Y-m-d')){
                        $html .= '';
                      }else{
                        $html .= '<tr>';
                        $html .= '<td>'.$user['name'].'</td>';
                        $html .= '<td>'.$user['service_name'].'</td>';
                        $html .= '<td><span class="badge badge-primary" title="Ano - Mês - Dia">'.$user['date'].'</span> às <span class="badge badge-dark" title="Data de Início - Data de Término">'.$user['timeslot'].'</span></td>';
                        // $html .= '<td>'.$user['atendido'].'<input class="form-check-input" type="checkbox" value="Sim" id="atendida" /><label for="atendida">&nbsp;Sim</label></td>';
                        $html .= '</tr>';
                      }
                    }
                    echo $html;
                  ?>
                  </tbody>
                </table>
                <div class="col-md-12">
                  <h2 class="font-weight-bolder">Todos os Agendamentos</h2>
                </div>
                <table class="table table-striped table-hover mt-3 mb-5">
                  <thead class="black white-text">
                    <tr>
                      <th scope="col">Nome da Cliente</th>
                      <th scope="col">Tipo de Cílio</th>
                      <th scope="col">Data</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $html = '';
                    foreach($ultimos as $user){
                      if($user['date'] > date('Y-m-d')){
                        $html .= '';
                      }else{
                        $html .= '<tr>';
                        $html .= '<td>'.$user['name'].'</td>';
                        $html .= '<td>'.$user['service_name'].'</td>';
                        $html .= '<td><span class="badge badge-primary" title="Ano - Mês - Dia">'.$user['date'].'</span> às <span class="badge badge-dark">'.$user['timeslot'].'</span></td>';
                        $html .= '</tr>';
                      }
                    }
                    echo $html;
                  ?>
                  </tbody>
                </table>
                  <button type="submit" class="btn btn-primary mt-2 mb-2" style="display:none;">Salvar</button>
                </div>
            </div>





            <div class="tab-pane" id="lash" role="tabpanel">
                <a id="btn_add_service" class="btn btn-primary"><i class="fa fa-plus"></i>Adicionar tipo de cílio</a><br/><br/>
              <table id="dt_services" class="table table-striped table-bordered">
                <thead>
                    <tr class="tableheader">
                        <th class="dt-center">Nome</th>
                        <th class="dt-center no-sort">Imagem</th>
                        <th class="no-sort">Descrição</th>
                        <th class="no-sort">Detalhes</th>
                        <th class="dt-center">Preço</th>
                        <th class="dt-center no-sort">Ações</th>
                    </tr>
                </thead>
                <tbody>    
                </tbody>
              </table>
            </div>
          </div>
    </div>
</section>

<div id="modal_service" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">X</button>
                <h4 class="modal-title">Cílios</h4>
            </div>
            <div class="modal-body">
                <form id="form_service">
                    <input id="service_id" name="service_id" hidden>
                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Nome</label>
                        <div class="col-lg-12">
                            <input id="service_name" name="service_name" class="form-control" maxlenght="100">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-4 control-label">Imagem dos Cílios</label>
                        <div class="col-lg-12 mx-auto text-center">
                            <img id="service_img_path" src="" style="max-width:400px;"/>
                            <label class="btn btn-block btn-info mt-3">
                              <i class="fa fa-upload"></i>&nbsp;Importar Imagem
                              <input type="file" accept="image/*" id="btn_upload_lash_img" style="display:none;"/>
                            </label>
                            <input id="service_img" name="service_img" style="display:none;"/>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Descrição</label>
                        <div class="col-lg-12">
                            <textarea id="service_description" name="service_description" class="form-control" ></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Detalhes</label>
                        <div class="col-lg-12">
                            <textarea id="service_details" name="service_details" class="form-control"></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 control-label">Preço</label>
                        <div class="col-lg-12">
                            <input id="service_price" name="service_price" class="form-control" maxlenght="100">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="btn_save_service" class="btn btn-primary"><i class="fa fa-save"></i>Salvar</button>
                        <span class="help-block"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>