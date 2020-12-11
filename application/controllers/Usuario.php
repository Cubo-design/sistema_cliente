<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(array('form', 'url'));
    }

    public function index(){
        $this->load->view('template/header');
        $this->load->model('UsuarioModel', 'model');
        $data['user_img'] = $this->ion_auth->user()->row()->user_img;
        $data['etiqueta'] = $this->model->gera_botao($data['user_img']);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/intro2');

        $data['first_name'] = $this->ion_auth->user()->row()->first_name;
        $data['last_name'] = $this->ion_auth->user()->row()->last_name;
        $data['phone'] = $this->ion_auth->user()->row()->phone;
        $data['user_id'] = $this->session->userdata('user_id');
        $data['email'] = $this->session->userdata('email');
        
        $data['depoimento'] = $this->model->checar($data['user_id']);
        $data['ficha'] = $this->model->checa_ficha($data['user_id']);
        
        $data['agendamentos'] = $this->model->historico($data['user_id']); 

        $this->load->view('user/user_nav',$data);
        $this->load->view('user/perfil', $data);
        $this->load->view('user/fecha_user_nav');

        $this->load->view('template/footer');
        $this->load->view('template/scripts'); 
    }

    public function editar($id){
        $this->load->view('template/header');
        $this->load->model('UsuarioModel', 'model');
        $data['user_image'] = $this->ion_auth->user()->row()->user_img;
        $data['etiqueta'] = $this->model->gera_botao($data['user_image']);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/intro2');

        $data = array(
            "scripts" => array(
                "util.js",
                "restrict.js" 
            )
        );

        $data['user'] = $this->model->read($id);
        $data['first_name'] = $this->ion_auth->user()->row()->first_name;
        $data['last_name'] = $this->ion_auth->user()->row()->last_name;
        $data['user_id'] = $this->session->userdata('user_id');
        $data['phone'] = $this->ion_auth->user()->row()->phone;
        $data['depoimento'] = $this->model->checar($data['user_id']);
        $data['ficha'] = $this->model->checa_ficha($data['user_id']);

        $this->load->view('user/user_nav',$data);
        $this->load->view('user/adic_foto', $data);
        $this->load->view('user/fecha_user_nav');

        $this->model->edita_usuario($id);
        $this->load->view('template/footer');
        $this->load->view('template/scripts'); 
    }

    public function depoimento($id){
        $this->load->view('template/header');
        $this->load->model('UsuarioModel', 'model');
        $data['user_image'] = $this->ion_auth->user()->row()->user_img;
        $data['etiqueta'] = $this->model->gera_botao($data['user_image']);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/intro2');

        $data = array(
            "scripts" => array(
                "util.js",
                "restrict.js" 
            )
        );

        $data['user'] = $this->model->read($id);
        $data['first_name'] = $this->ion_auth->user()->row()->first_name;
        $data['last_name'] = $this->ion_auth->user()->row()->last_name;
        $data['user_id'] = $this->session->userdata('user_id');
        
        $data['depoimento'] = $this->model->checar($data['user_id']);
        $data['ficha'] = $this->model->checa_ficha($data['user_id']);
        $this->model->cria_depoimento($data['user_id']);

        if(!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id))){
			redirect('auth', 'refresh');
		}

        $this->load->view('user/user_nav', $data);
        $this->load->view('user/depoimento');
        $this->load->view('user/fecha_user_nav');

        $this->load->view('template/footer');
        $this->load->view('template/scripts'); 
    }

    public function editar_depoimento($id){
        $this->load->view('template/header');
        $this->load->model('UsuarioModel', 'model');
        $data['user_image'] = $this->ion_auth->user()->row()->user_img;
        $data['etiqueta'] = $this->model->gera_botao($data['user_image']);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/intro2');

        $data['user'] = $this->model->read($id);
        $data['first_name'] = $this->ion_auth->user()->row()->first_name;
        $data['last_name'] = $this->ion_auth->user()->row()->last_name;
        $data['user_id'] = $this->session->userdata('user_id');

        $data['depoimento'] = $this->model->checar($data['user_id']);
        $this->model->edita_depoimento($data['user_id']);
        $data['ficha'] = $this->model->checa_ficha($data['user_id']);

        if(!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id))){
			redirect('auth', 'refresh');
		}

        $this->load->view('user/user_nav', $data);
        $this->load->view('user/depoimento');
        $this->load->view('user/fecha_user_nav');

        $this->load->view('template/footer');
        $this->load->view('template/scripts'); 
    }

    public function historico($id){
        $this->load->view('template/header');
        $this->load->model('UsuarioModel', 'model');
        $data['user_image'] = $this->ion_auth->user()->row()->user_img;
        $data['etiqueta'] = $this->model->gera_botao($data['user_image']);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/intro2');
        
        $data = array(
            "scripts" => array(
                "util.js",
                "restrict.js" 
            )
        );

        $data['user'] = $this->model->read($id);
        $data['first_name'] = $this->ion_auth->user()->row()->first_name;
        $data['last_name'] = $this->ion_auth->user()->row()->last_name;
        $data['user_id'] = $this->session->userdata('user_id');
        $data['depoimento'] = $this->model->checar($data['user_id']);
        $data['ficha'] = $this->model->checa_ficha($data['user_id']);

        $this->load->view('user/user_nav',$data);
        
        $this->load->view('user/fecha_user_nav');


        $this->load->view('template/footer');
        $this->load->view('template/scripts'); 
    }


    public function ajax_import_image(){
		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$config["upload_path"] = "./tmp/";
		$config["allowed_types"] = "gif|png|jpg|jpeg";
		$config["overwrite"] = TRUE;

		$this->load->library("upload", $config);

		$json = array();
		$json["status"] = 1;

		if (!$this->upload->do_upload("image_file")) {
			$json["status"] = 0;
			$json["error"] = $this->upload->display_errors("","");
		} else {
			if ($this->upload->data()["file_size"] <= 1024) {
				$file_name = $this->upload->data()["file_name"];
				$json["img_path"] = base_url() . "tmp/" . $file_name;
			} else {
				$json["status"] = 0;
				$json["error"] = "Arquivo não deve ser maior que 1 MB!";
			}
        }
        echo json_encode($json);
	}

}