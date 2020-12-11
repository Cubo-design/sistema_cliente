<?php

$mysqli = new mysqli('localhost', 'root', '', 'gu1800078');
if(isset($_GET['date'])){
    $date = $_GET['date'];
    $stmt = $mysqli->prepare("select * from bookings where date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['timeslot'];
            }
            $stmt->close();
        }
    }
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $timeslot = $_POST['timeslot'];
    $service_name = $service["service_name"]; // mexi
    $user_id = $user_id; // mexi
    $stmt = $mysqli->prepare("select * from bookings where date = ? AND timeslot = ?");
    $stmt->bind_param('ss', $date, $timeslot);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = '<div class="alert alert-danger alert-with-icon mt-3 font-weight-bolder" data-notify="container">
            <div class="container">
              <div class="alert-wrapper">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <i class="nc-icon nc-simple-remove"></i>
                </button>
                <div class="message"><i class="nc-icon nc-bell-55"></i> Este Horário Já Foi Selecionado Por Outra Pessoa. </div>
              </div>
            </div>
          </div>';
           
        }else{
            $stmt = $mysqli->prepare("INSERT INTO bookings (name, user_id, timeslot, service_name, email, date) VALUES (?,?,?,?,?,?)");// mexi
            $stmt->bind_param('ssssss', $name, $user_id, $timeslot, $service_name, $email, $date);// mexi
            $stmt->execute();
            $msg = "<div class='alert alert-success mt-3 font-weight-bolder'>
            <div class='container'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <i class='nc-icon nc-simple-remove'></i>
            </button>
            <span>Horário Agendado Com Sucesso. </span>
            </div></div>";
            header("refresh: 2; ".base_url('index.php/usuario'));
            //redirect('usuario', 'refresh');
            $bookings[]=$timeslot;
            $stmt->close();
            $mysqli->close();
        }
    }
}

$duration = 120;
$cleanup = 0;
$start = "13:00";
$end = "19:00";

function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval ("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();

    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
        $slots[] = $intStart->format("H:i")." - ".$endPeriod->format("H:i");
    }
    return $slots;
}
?>
<style>

.modal-header, h4, .close {
  background-color: #FFCA28;
  color:white !important;
  text-align: center;
  font-size: 30px;
}

</style>
<div class="container">
    <?= isset($msg) ? $msg : ""; ?>
    <h2 class="text-center">Data do Agendamento: <?= date('d/m/Y', strtotime($date)); ?></h2><hr/>
  <div class="row pt-3 pb-3">
    <div class="col-md-6">
        <p>Escolha o melhor horário para você!</p>
            <form method="post" class="mt-3">
                <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
                    foreach($timeslots as $ts){
                ?>
                <div class="form-group">
                    <?php if(in_array($ts, $bookings)){ ?>
                        <button class="btn btn-danger">Horário Reservado</button>
                    <?php }else{ ?>
                        <button type="button" class="btn btn-success book" data-toggle="modal" data-target="#teste" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                    <?php } ?>
                </div>

                <?php } ?>
            </form>
    </div>    
    <div class="col-md-6 text-center">
        <h5>Método selecionado: <b><?= $service["service_name"]; ?></b>.</h5>
        <img src="<?= base_url($service["service_img"]); ?>" class="img-fluid rounded px-4 py-4"/>
        <h5>Preço: <b><?= $service["service_price"]; ?></b>.</h5>
    </div> 
  </div>   
<!-- MODAL -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Reserva: <span id="slot"></span></h4>
                    </div>
                    <div class="modal-body font-weight-bolder">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="">Você escolheu o horário: </label>
                                        <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label style="display:none;" style>Name</label>
                                        <input style="display:none;" type="text" value="<?= $nome; ?>" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label style="display:none;">Email</label>
                                        <input style="display:none;" type="email" value="<?= $email; ?>" name="email" class="form-control">
                                        <p>Tem Certeza?</p>
                                    </div>
                                    <div class="formgroup pull-left">
                                        <button class="btn btn-primary" type="submit" name="submit">Sim</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- MODAL -->        
</div>