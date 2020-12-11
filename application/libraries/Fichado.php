<?php
include_once APPPATH.'libraries/util/CI_Object.php';

class Fichado extends CI_Object{

    public function cria_ficha($data){
        $this->db->insert('ficha', $data);
    }

    public function user_ficha($user_id){
        $cond = array('user_id' => $user_id);
        $rs = $this->db->get_where('ficha', $cond);
        if($rs->row_array() == 0){
            return NULL;
        }else{
            return $rs->row_array();
        }
    }

    public function edita_ficha($data, $user_id){
        $this->db->update('ficha', $data, "user_id = $user_id");				                             
    }
    
    public function validaCPF($cpf){
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        if (strlen($cpf) != 11){
            return false;
        }
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }

}