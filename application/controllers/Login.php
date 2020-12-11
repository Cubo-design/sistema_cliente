<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		
		$this->load->view('extra/login');
		
		$this->load->view('template/scripts');
	}

	public function registro()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->load->model('UsuarioModel', 'model');
        $this->model->salva_usuario();
        $this->load->view('form/myform');

		$this->load->view('template/scripts');
	}

	public function sucesso()
    {
        $this->load->view('template/header');
		$this->load->view('template/navbar');

        $this->load->view('form/formsuccess');

        $this->load->view('template/footer');
        $this->load->view('template/scripts');     
    }

    public function autentica()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar');

		$this->load->view('extra/login');
        $this->load->model('UsuarioModel', 'model');
				
		$email = $this->input->post("email");
		$senha = md5($this->input->post("senha"));
	
		$usuario = $this->model->logar($email, $senha);
				
		if($usuario){
			$this->session->set_userdata("usuario_logado", $usuario);
			$this->session->set_flashdata("success", "Logado com sucesso");
			redirect('login/perfil');
		}else{
			$this->session->set_flashdata("danger", "Usuário e/ou senha inválidos!");
			}	
				
        $this->load->view('template/scripts');
    }
		
	public function logout()
	{
		$this->session->unset_userdata("usuario_logado");
		redirect("http://localhost/sp_crud/");
	}

	public function perfil()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');

        $this->load->view('extra/perfil');
			
        $this->load->view('template/footer');
        $this->load->view('template/scripts');
	}

}

?>	