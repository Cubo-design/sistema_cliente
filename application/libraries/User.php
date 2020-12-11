<?php
include_once APPPATH.'libraries/util/CI_Object.php';

class User extends CI_Object 
{
    
    public function cria_usuario($data)
    {
        $this->db->insert('usuario', $data);
    }

    public function edita_usuario($data, $user_id){
        $this->db->update('users', $data, "id = $user_id");				                             
    }
    
    public function user_data($user_id){
        $cond = array('id' => $user_id);
        $rs = $this->db->get_where('users', $cond);
        return $rs->row_array();
    }

    public function user_test($user_id){
        $cond = array('user_id' => $user_id);
        $rs = $this->db->get_where('depoimento', $cond);
        if($rs->row_array() == 0){
            return NULL;
        }else{
            return $rs->row_array();
        }
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


    public function insere($depoimento){
        $this->db->insert('depoimento', $depoimento);
        return $this->db->insert_id();
    }

    public function edita_dep($data, $user_id){
        $this->db->update('depoimento', $data, "user_id = $user_id");				                             
    }
    
    function get_dep(){
        $sql = "SELECT first_name, user_img, dep_titulo, dep_text FROM users, depoimento WHERE id = user_id ORDER BY id desc LIMIT 3";
        $rs = $this->db->query($sql);
        return $rs->result_array();
    }

    public function reservas($user_id){
        $sql = "SELECT name, service_name, email, date, timeslot FROM bookings WHERE user_id = $user_id";
        $rs = $this->db->query($sql);
        return $rs->result_array();
    }
    
}