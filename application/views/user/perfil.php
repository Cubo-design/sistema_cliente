<div class="tab-pane active" id="home" role="tabpanel">
  <div class="row mt-4 mb-5">
    <div class="col-md-7 mx-auto text-center">
      <p>Primeiro nome: <?= $first_name; ?></p>
      <p>Sobrenome: <?= $last_name; ?></p>
      <p>E-Mail: <?= $email ?></p>
      <p>Fone: <?= $phone ?></p>
    </div>
    <div class="col-md-5">
      <p>Ainda não escolheu seus cílios ideais? Sem problema, clique no botão abaixo e <b>saiba mais</b>. Aproveite e também faça um agendamento.</p>
      <p>Mas lembre-se, para facilitar o seu atendimento e tornar o processo mais rápido, você deve preencher a sua <b>Ficha de Anamnese</b>.</p>
      <a href="<?= base_url('#cilios'); ?>" class="btn btn-info">Cílios</a>

    </div>
  </div>
  <div class="row">
    <div class="col-md-12 font-weight-bolder">
      <h3 class="mb-3">Agendamentos - Histórico</h3>
      <?php
      $html = ''; 
      if($agendamentos==NULL){
        $html .= '<p class="mt-3">Ops! Parece que você ainda não marcou um horário...</p>'; 
        $html .= '<p class="mb-4">Que tal escolher um dos <a href="'.base_url('#cilios').'">cílios</a> para começar?</p>'; 
      }else{
          foreach($agendamentos as $book){
            if($book['date'] > date('Y-m-d')){
              $html .= '<p class="mt-2">Tipo de Cílio: '.$book['service_name'].'</p>';
              $html .= '<p>Dia marcado: <span class="badge badge-info">'.$book['date'].'</span></p>';
              $html .= '<p>Horário: '.$book['timeslot'].'</p><hr/>';
            }else{
              $html .= '<p class="mt-2">Tipo de Cílio: '.$book['service_name'].'</p>';
              $html .= '<p>Dia marcado: <span class="badge badge-danger">'.$book['date'].'</span></p>';
              $html .= '<p>Horário: '.$book['timeslot'].'</p>';
              if(empty($depoimento)){
                $url = base_url('index.php/usuario/depoimento/'.$user_id);
              }else{
                $url = base_url('index.php/usuario/editar_depoimento/'.$user_id);
              }
              $html .= '<p class="font-weight-bolder">Deixe a sua <a class="font-weight-bolder" href="'.$url.'">opinião</a> sobre como foi o atendimento!</p><hr/>';
              $html .= '';
            }
          }
      }
        echo $html;
      ?>
    </div>
  </div>
</div>