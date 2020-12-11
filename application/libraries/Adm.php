<?php
include_once APPPATH.'libraries/util/CI_Object.php';

class Adm extends CI_Object {

    public function book(){
        $sql = "SELECT name, service_name, email, date, timeslot, atendido FROM bookings";
        $rs = $this->db->query($sql);
        return $rs->result_array();
    }

    public function check(){
        $sql = "SELECT name, user_id, service_name, email, date, timeslot, atendido FROM bookings ORDER BY id DESC LIMIT 1";
        $rs = $this->db->query($sql);
        return $rs->row_array();
    }

    public function contando(){
        $sql = "SELECT COUNT(service_name) AS qntd, name, user_id, service_name, email, date, timeslot, atendido FROM bookings GROUP BY service_name HAVING COUNT(service_name) > 1 ORDER BY COUNT(service_name) DESC";
        $rs = $this->db->query($sql);
        return $rs->row_array();
    }
    
}