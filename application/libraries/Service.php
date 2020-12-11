<?php
include_once APPPATH.'libraries/util/CI_Object.php';

class Service extends CI_Object{
    
    public function service_data($service_id){
        $cond = array('service_id' => $service_id);
        $rs = $this->db->get_where('services', $cond);
        return $rs->row_array();
    }
    
}