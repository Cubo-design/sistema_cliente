<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller{

public function __construct(){
	parent::__construct();
	$this->load->library(['ion_auth', 'form_validation']);
}

public function index(){
	$this->load->view('template/header');
	$this->load->model('UsuarioModel', 'model');

	if ($this->ion_auth->logged_in()){
		$data['user_img'] = $this->ion_auth->user()->row()->user_img;
	}else{
		$data['user_img'] = '';
	}

	$data['etiqueta'] = $this->model->gera_botao($data['user_img']);
	$this->load->view('template/navbar', $data);

	$this->load->view('template/intro');

	$this->load->model('ServiceModel','servico');
	$dado['services'] = $this->servico->show_services();
	$this->load->view('template/servicos', $dado);

	$this->load->view('template/sobre');
	$this->load->view('template/valores');
	$this->load->view('template/galeria');

	$data['depoimentos'] = $this->model->lista_depoimentos();
	$this->load->view('template/depoimentos', $data);

	$this->load->view('template/localizacao');

	$this->load->view('template/footer');
	$this->load->view('template/scripts'); 
}

	public function historia()
	{
		$this->load->view('template/header');
        $this->load->model('UsuarioModel', 'model');
		if ($this->ion_auth->logged_in()){
			$data['user_img'] = $this->ion_auth->user()->row()->user_img;
		}else{
			$data['user_img'] = '';
		}
        $data['etiqueta'] = $this->model->gera_botao($data['user_img']);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/intro2');

        $this->load->view('template/historia');
        
		$this->load->view('template/footer');
		$this->load->view('template/scripts');
	}

	public function local(){
		$this->load->view('template/header');
        $this->load->model('UsuarioModel', 'model');
		if ($this->ion_auth->logged_in()){
			$data['user_img'] = $this->ion_auth->user()->row()->user_img;
		}else{
			$data['user_img'] = '';
		}
        $data['etiqueta'] = $this->model->gera_botao($data['user_img']);
        $this->load->view('template/navbar', $data);
		$this->load->view('template/intro2');
		
        $this->load->view('template/localizacao');
        
		$this->load->view('template/footer');
		$this->load->view('template/scripts');
	}

	public function galeria()
	{
		$this->load->view('template/header');
        $this->load->model('UsuarioModel', 'model');
		if ($this->ion_auth->logged_in()){
			$data['user_img'] = $this->ion_auth->user()->row()->user_img;
		}else{
			$data['user_img'] = '';
		}
        $data['etiqueta'] = $this->model->gera_botao($data['user_img']);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/intro2');

        $this->load->view('template/galeria_completa');
        
		$this->load->view('template/footer');
		$this->load->view('template/scripts');
	}

	public function servico($id)
	{
		$this->load->view('template/header');
        $this->load->model('UsuarioModel', 'model');
		if ($this->ion_auth->logged_in()){
			$data['user_img'] = $this->ion_auth->user()->row()->user_img;
		}else{
			$data['user_img'] = '';
		}
        $data['etiqueta'] = $this->model->gera_botao($data['user_img']);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/intro2');
		
		$dado['calendar'] = $this->model->calendar(); 

		$this->load->model('ServiceModel','servico');
		$dado['service'] = $this->servico->ler($id);
		
		if ($this->ion_auth->logged_in()){
			redirect('pages/services/'.$id, 'refresh');
		}else{
			$this->load->view('extra/datepicker', $dado);
		}

		$this->load->view('template/footer');
		$this->load->view('template/scripts');
	}

	public function services($id){
		if ($this->ion_auth->logged_in()){
			$this->load->view('template/header');
			$this->load->model('UsuarioModel', 'model');
			if ($this->ion_auth->logged_in()){
				$data['user_img'] = $this->ion_auth->user()->row()->user_img;
			}else{
				$data['user_img'] = '';
			}
			$data['etiqueta'] = $this->model->gera_botao($data['user_img']);
			$this->load->view('template/navbar', $data);
			$this->load->view('template/intro2');
			$dado['calendar'] = $this->model->calendar(); 
			$this->load->model('ServiceModel','servico');
			$dado['service'] = $this->servico->ler($id);

			$this->load->view('extra/calendario', $dado);
			
			$this->load->view('template/footer');
			$this->load->view('template/scripts');
		}else{
			redirect('pages/servico/'.$id, 'refresh');
		}
	}

	public function reserva($id){// mexi
		if ($this->ion_auth->logged_in()){
			$this->load->view('template/header');
			$this->load->model('UsuarioModel', 'model');
			if ($this->ion_auth->logged_in()){
				$data['user_img'] = $this->ion_auth->user()->row()->user_img;
			}else{
				$data['user_img'] = '';
			}
			$data['etiqueta'] = $this->model->gera_botao($data['user_img']);
			$this->load->view('template/navbar', $data);
			$this->load->view('template/intro2');
			$dado['calendar'] = $this->model->calendar(); 
			$this->load->model('ServiceModel','servico');
			
			$dado['user_id'] = $this->session->userdata('user_id');
			$dado['nome'] = $this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name;
			$dado['email'] = $this->session->userdata('email');
			$dado['service'] = $this->servico->ler($id);

			$this->load->view('extra/reserva', $dado);
			
			$this->load->view('template/footer');
			$this->load->view('template/scripts');
		}else{
			redirect('pages/servico/'.$id, 'refresh');
		}
	}


	public function contato(){
		$this->load->view('template/header');
		$this->load->model('UsuarioModel', 'model');
		if ($this->ion_auth->logged_in()){
			$data['user_img'] = $this->ion_auth->user()->row()->user_img;
		}else{
			$data['user_img'] = '';
		}
		$data['etiqueta'] = $this->model->gera_botao($data['user_img']);
		$this->load->view('template/navbar', $data);
	
		$this->load->view('template/intro2');
		$this->load->view('template/contato');
	
		$this->load->view('template/footer');
		$this->load->view('template/scripts'); 
	}

	public function recomendar(){
		$this->load->view('template/header');
		$this->load->model('UsuarioModel', 'model');
	
		if ($this->ion_auth->logged_in()){
			$data['user_img'] = $this->ion_auth->user()->row()->user_img;
		}else{
			$data['user_img'] = '';
		}
	
		$data['etiqueta'] = $this->model->gera_botao($data['user_img']);
		$this->load->view('template/navbar', $data);
		$this->load->view('template/intro2');

		$this->load->view('template/recomendo');
	
		$this->load->view('template/footer');
		$this->load->view('template/scripts'); 
	}

    function show($html){
        $aux = $this->load->view('template/header', null, true);
        $aux .= $html;
        $aux .= $this->load->view('template/scripts', null, true); 
        echo $aux;
	}

}