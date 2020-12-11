<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct(){
        parent::__construct();
		$this->load->library(['ion_auth', 'form_validation']);
	}

    public function index(){
		$this->load->view('template/header');

		if (!$this->ion_auth->logged_in()){
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()){
			redirect('/');
		}else{
			$this->load->view('admin/menu');

			$data = array(
				"scripts" => array(
					"util.js",
					"restrict.js"
				)
			);

			$this->load->model("AdmModel","model");
			$data['nome'] = $this->ion_auth->user()->row()->first_name." ".$this->ion_auth->user()->row()->last_name;
			$data['ultimos'] = $this->model->agendados();
			$data['proximo'] = $this->model->proximo();
			$data['conta'] = $this->model->contar();
			$this->load->view('admin/edit', $data);
		}

		$this->load->view('template/footer');
		$this->load->view('template/scripts');
	}
	

	public function user_ficha($id){
		$this->load->view('template/header');

		if(!$this->ion_auth->logged_in()){
			redirect('auth/login', 'refresh');
		}else if (!$this->ion_auth->is_admin()){
			redirect('/');
		}else{
			$this->load->model('UsuarioModel', 'model');
	
			$data['user'] = $this->model->read($id);
			// $data['user_id'] = $this->session->userdata('user_id');
			$data['first_name'] = $this->ion_auth->user()->row()->first_name;
			$data['last_name'] = $this->ion_auth->user()->row()->last_name;
			$data['phone'] = $this->ion_auth->user()->row()->phone;

			$this->load->model('FichaModel', 'ficha');
			$data['ficha'] = $this->ficha->checa_ficha($id);

			$this->load->view('admin/ver_ficha', $data);
			$this->load->view('template/scripts');
		}
	}

    public function ajax_import_image(){

    	if(!$this->input->is_ajax_request()){
    		exit("Nenhum acesso de script direto");
    	}

    	$config["upload_path"] = "./tmp/";
    	$config["allowed_types"] = "png|jpg|jpeg";
    	$config["overwrite"] = TRUE;

    	$this->load->library("upload",$config);

    	$json = array();
    	$json["status"] = 1;

    	if(!$this->upload->do_upload("image_file")){
    		$json["status"] = 0;
    		$json["error"] = $this->upload->display_errors("","");
    	}else{
    		if($this->upload->data()["file_size"] <= 1024){
    			$file_name = $this->upload->data()["file_name"];
    			$json["img_path"] = base_url()."tmp/".$file_name;
    		}else{
    			$json["status"] = 0;
    			$json["error"] = "Arquivo não deve ser maior que 1MB";
    		}
    	}

    	echo json_encode($json);
    }

    public function ajax_save_service(){

    	if(!$this->input->is_ajax_request()){
    		exit("Nenhum acesso de script direto");
    	}

    	$json = array();
    	$json["status"] = 1;
    	$json["error_list"] = array();

    	$this->load->model("ServiceModel","model");

    	$data = $this->input->post();

    	if(empty($data["service_name"])){
    		$json["error_list"]["#service_name"] = "Nome da extensão é obrigatório";
    	}else{
    		if($this->model->is_duplicated("service_name", $data["service_name"], $data["service_id"])){
    				$json["error_list"]["#service_name"] = "Nome da extensão já existe";
    			}
    	}

    	if(!empty($json["error_list"])){
    		$json["status"] = 0;
    	}else{
    		if (!empty($data["service_img"])) {
    			$file_name = basename($data["service_img"]);
    			$old_path = getcwd()."/tmp/".$file_name;
    			$new_path = getcwd()."/public/assets/img/services/".$file_name;
    			rename($old_path, $new_path);

    			$data["service_img"] = "/public/assets/img/services/".$file_name;
    		}else{
				unset($data["service_img"]);
			}

    		if(empty($data["service_id"])){
    			$this->model->insert($data);
    		}else{
    			$service_id = $data["service_id"];
    			unset($data["service_id"]);
    			$this->model->update($service_id, $data);
    		}
    	}
    	
    	echo json_encode($json);
	}
	

	public function ajax_list_service(){
    	if(!$this->input->is_ajax_request()){
    		exit("Nenhum acesso de script direto permitido");
		}
		
		$this->load->model("ServiceModel", "model");
		$services = $this->model->get_datatable();

		$data = array();
		foreach($services as $service){
			$row = array();
			$row[] = $service->service_name;
			$row[] = '<img src="'.base_url($service->service_img).'" style="max-width:100px;max-height:100px;">';
			$row[] = '<div class="description">'.$service->service_description.'</div>';
			$row[] = '<div class="description">'.$service->service_details.'</div>';
			$row[] = '<div>'.$service->service_price.'</div>';

			$row[] = '<div style="display:inline-block;">
						<button class="mt-2 btn btn-primary btn-edit-service" service_id="'.$service->service_id.'">
						    <i class="fa fa-edit"></i>
						</button>
						<button class="mt-2 btn btn-warning btn-del-service" service_id="'.$service->service_id.'">
						    <i class="fas fa-times"></i>
						</button>
					</div>';

			$data[] = $row;		
		}

		$json = array(
			"draw" => $this->input->post("draw"),
			"recordTotal" => $this->model->records_total(),
			"recordFiltered" => $this->model->records_filtered(),
			"data" => $data,
		);

		echo json_encode($json);
	}


	public function ajax_get_service_data(){
		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["input"] = array();

		$this->load->model("ServiceModel","model");

		$service_id = $this->input->post("service_id");
		$data = $this->model->get_data($service_id)->result_array()[0];
		$json["input"]["service_id"] = $data["service_id"];
		$json["input"]["service_name"] = $data["service_name"];
		$json["input"]["service_description"] = $data["service_description"];
		$json["input"]["service_details"] = $data["service_details"];
		$json["input"]["service_price"] = $data["service_price"];

		$json["img"]["service_img_path"] = base_url() . $data["service_img"];

		echo json_encode($json);
	}

	public function ajax_delete_service_data() {

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;

		$this->load->model("ServiceModel","model");
		$service_id = $this->input->post("service_id");
		$this->model->delete($service_id);

		echo json_encode($json);
	}

}