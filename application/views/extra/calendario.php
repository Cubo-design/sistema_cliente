<div class="container">
    <div class="owner">
        <div class="avatar">
          <img src="<?= base_url('public/assets/img/logotipo.jpeg'); ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
        </div>
    </div>
  <div class="row">
       <div class="col-md-10 mx-auto">
          <h3 class="display-4 mt-5 mb-5 text-center"><?= $service["service_name"]; ?></h3>
          <div class="text-center mb-4">
             <div class="col-md-6 mx-auto">
               <img src="<?= base_url($service["service_img"]); ?>" class="img-fluid" />
             </div>
          </div>
          <p class="justificado"><?= $service["service_description"]; ?></p>
          <p class="justificado"><?= $service["service_details"]; ?></p>
          <h3 class="mb-2">Meios de Pagamento</h3>
          <p class="justificado">Aceito cartões de crédito e pagamento à vista. Ambos deve ser realizados na <b>hora</b> e no <b>local</b> do atendimento.</p>
          <div class="mt-4 mb-5 text-center">
              <p class="preco"><span class="valor">Preço: </span><?= $service["service_price"]; ?></p>
          </div>
          <h3 class="mb-2">Realizar o Agendamento</h3>
          <p class="justificado">Logo abaixo está o calendário para você escolher o dia e a hora que você deseja ser atendida, clique no dia que tiver interesse e verifique se o horário que você deseja está disponível, simples assim, e se não estiver é só voltar e escolher outro dia.</p>
       </div>
    </div>
    <div class="row">
        <div class="col-md-10 mx-auto text-center mb-4">
       <?php

function build_calendar($month, $year, $service_id){
    $mysqli = new mysqli('localhost', 'root', '', 'gu1800078');
    $daysOfWeek = array('Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb');
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
    $numberDays = date('t', $firstDayOfMonth);
    $dateComponents = getdate($firstDayOfMonth);
    $monthName = $dateComponents['month'];
    $dayOfWeek = $dateComponents['wday'];
    $dateToday = date('Y-m-d');

    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $mes = strftime('%B', strtotime($monthName));

    $calendar = "<table class='table table-bordered'>";
    $calendar.= "<center class='text-capitalize'><h2>$mes - $year</h2>";
    $calendar.= " <a class='btn btn-sm btn-primary mt-3 mb-3' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."#tabela'>Mês Anterior</a>";    
    $calendar.= " <a class='btn btn-sm btn-warning mt-3 mb-3' href='?month=".date('m')."&year=".date('Y')."#tabela'>Mês Atual</a>";
    $calendar.= " <a class='btn btn-sm btn-primary mt-3 mb-3' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."#tabela'>Próximo Mês</a></center><br>";
    $calendar.= "<tr>";
    
    foreach($daysOfWeek as $day){
        $calendar.="<th class='header'>$day</th>";
    }
    
    $calendar.= "</tr><tr>";
    
    if($dayOfWeek > 0){
        for($k=0;$k<$dayOfWeek;$k++){
            $calendar.="<td class='desmarcada'></td>";
        }
    }
    
    $currentDay = 1;
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    
    while($currentDay <= $numberDays){
        
        if($dayOfWeek == 7){
            $dayOfWeek = 0;
            $calendar.= "</tr><tr>";
        }
        
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $dayname = strtolower(date('I', strtotime($date)));
        $eventNum = 0;
        $today = $date==date('Y-m-d')? "today": "";

        if($date<date('Y-m-d')){
            $calendar.= "<td><h4>$currentDay</h4>";
        }else{
            if($dayOfWeek == 0 || $dayOfWeek == 6){
                $calendar.= "<td class='desmarcada'><h4>$currentDay</h4>";
            }else{
                $calendar.= '<td class="'.$today.'"><h4>'.$currentDay.'</h4><a href="../reserva/'.$service_id.'/?date='.$date.'" class="btn btn-sm btn-success">+</a>';
            }
        }
        $calendar.= "</td>";
        $currentDay++;
        $dayOfWeek++;
    }
    
    if($dayOfWeek != 7){
        $remainingDays = 7-$dayOfWeek;
        for($i=0;$i<$remainingDays;$i++){
            $calendar.= "<td class='desmarcada'></td>";
        }
    }
    $calendar.="</tr>";
    $calendar.="</table>";
    echo $calendar;
}

?>
        <style type="text/css">
            table{
                table-layout: fixed;
            }
            td{
                width: 33%;
            }
        </style>
        <div class="container" id="tabela">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        $dateComponents = getdate();
                        if(isset($_GET['month']) && isset($_GET['year'])){
                            $month = $_GET['month'];
                            $year = $_GET['year'];
                        }else{
                            $month = $dateComponents['mon'];
                            $year = $dateComponents['year'];
                        }
                        echo build_calendar($month,$year,$service["service_id"]);
                    ?>
                </div>
            </div>
        </div>
       </div>
  </div>
</div>