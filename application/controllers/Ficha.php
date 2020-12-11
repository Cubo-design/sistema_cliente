<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ficha extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(array('form', 'url'));
    }
    
    public function ficha($id){
        $this->load->view('template/header');
        $this->load->model('UsuarioModel', 'model');
        $this->load->model('FichaModel', 'ficha');
        $data['user_image'] = $this->ion_auth->user()->row()->user_img;
        $data['etiqueta'] = $this->model->gera_botao($data['user_image']);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/intro2');

        $data = array(
            "scripts" => array(
                "jquery.autocomplete-address.js"
            )
        );

        $data['user'] = $this->model->read($id);
        $data['user_id'] = $this->session->userdata('user_id');
        $data['first_name'] = $this->ion_auth->user()->row()->first_name;
        $data['last_name'] = $this->ion_auth->user()->row()->last_name;
        $data['depoimento'] = $this->model->checar($data['user_id']);
        $data['ficha'] = $this->model->checa_ficha($data['user_id']);

        if(!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id))){
			redirect('auth', 'refresh');
		}

        $this->load->view('user/user_nav',$data);
        $this->load->view('user/ficha',$data);
        $this->ficha->salva_ficha($data['user_id']);
        $this->load->view('user/fecha_user_nav');

        $this->model->edita_usuario($id);
        $this->load->view('template/footer');
        $this->load->view('template/scripts'); 
    }

    public function editar_ficha($id){
        $this->load->view('template/header');
        $this->load->model('UsuarioModel', 'model');
        $data['user_image'] = $this->ion_auth->user()->row()->user_img;
        $data['etiqueta'] = $this->model->gera_botao($data['user_image']);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/intro2');

        $data = array(
            "scripts" => array(
                "jquery.autocomplete-address.js"
            )
        );

        $data['user'] = $this->model->read($id);
        $data['user_id'] = $this->session->userdata('user_id');
        $data['first_name'] = $this->ion_auth->user()->row()->first_name;
        $data['last_name'] = $this->ion_auth->user()->row()->last_name;
        $data['phone'] = $this->ion_auth->user()->row()->phone;
        $data['depoimento'] = $this->model->checar($data['user_id']);

        $this->load->model('FichaModel', 'ficha');
        $data['ficha'] = $this->ficha->checa_ficha($data['user_id']);

        if(!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id))){
			redirect('auth', 'refresh');
		}

        $this->load->view('user/user_nav',$data);
        $this->ficha->edita_ficha($data['user_id']);
        $this->load->view('user/ficha',$data);
        $this->load->view('user/fecha_user_nav');

        $this->load->view('template/footer');
        $this->load->view('template/scripts'); 
    }

}