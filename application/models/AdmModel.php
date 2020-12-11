<?php
include_once APPPATH.'libraries/Adm.php';

class AdmModel extends CI_Model{
    
  public function agendados(){
    $agenda = new Adm();
    return $agenda->book();
  }

  public function proximo(){
    $agenda = new Adm();
    return $agenda->check();
  }

  public function contar(){
    $agenda = new Adm();
    return $agenda->contando();
  }

}