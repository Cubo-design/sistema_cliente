<?php
include_once APPPATH.'libraries/User.php';

class UsuarioModel extends CI_Model {
    
    public function gera_botao($user_img){
        $avatar = base_url('public/assets/img/users/no-photo.jpeg');
        if ($this->ion_auth->logged_in()){
            if ($this->ion_auth->is_admin()){
                $usr = '<a class="dropdown-item" href="'.base_url('index.php/admin').'"><i class="fas fa-clipboard-check"></i>Gestão</a>';
            }else{
                $usr = '<a class="dropdown-item" href="'.base_url('index.php/usuario').'"><i class="fas fa-user mr-3"></i>Perfil</a>';
            }
            $data['etiqueta'] = '<ul class="navbar-nav ml-auto nav-flex-icons"><li class="nav-item avatar dropdown">
                        <a class="nav-link" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="'. $avatar .'" class="w-100 img-fluid rounded-circle z-depth-0" style="max-width:40px;max-height:40px;min-width:40px;min-height:40px;margin-top:-10px;" alt="imagem de seu avatar"></a>
                        <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">'.$usr.'
                            <a class="dropdown-item text-danger saida" href="'.base_url('index.php/auth/logout').'"><i class="fas fa-sign-out-alt mr-3"></i>Sair</a>
                        </div></li></ul>';
        }else{
            $data['etiqueta'] = '<li class="nav-item"><a href="'.base_url('index.php/auth/create_user').'" class="btn bot-semlinha-dourado btn-round">Cadastro</a></li>
                                 <li class="nav-item"><a href="'.base_url('index.php/auth/login').'" class="btn bot-dourado btn-round text-dark">Login</a></li>';
        }
        return $data['etiqueta'];
    }

    public function calendar(){
        if($this->ion_auth->logged_in()){
            $dado['calendar'] = '';
        }else{
            $dado['calendar'] = '<p>Você deve se cadastrar para poder realizar o agendamento.</p><h2><a href="'.base_url('index.php/auth/create_user').'">Cadastre-se</a></h2>';
            $dado['calendar'] .= '<p class="mt-4">E você deve estar logado o agendamento.</p><h2><a href="'.base_url('index.php/auth/login').'">Login</a></h2>';
        }
        return $dado['calendar'];
    }

    public function read($user_id){
      $usuario = new User();
      return $usuario->user_data($user_id);
    }

  public function edita_usuario($user_id){
      if(sizeof($_POST) == 0) return;
      $data = $this->input->post();      
      $usuario = new User();
      $usuario->edita_usuario($data, $user_id);
      redirect('usuario');
  }

  public function cria_depoimento($user_id){
    if(sizeof($_POST) == 0) return;

    $depoimento = array( 
      'user_id'	=>  $user_id, 
      'dep_titulo' =>  $this->input->post('dep_titulo'), 
      'dep_text'	=>  $this->input->post('dep_text')
    );

    $test = new User();
    $test->insere($depoimento, $user_id);
    redirect('usuario/editar_depoimento/'.$user_id);
  }


  public function checar($user_id){
      $usuario = new User();
      return $usuario->user_test($user_id);
  }

  public function edita_depoimento($user_id){
    if(sizeof($_POST) == 0) return;

    $data = array( 
      'user_id'	=>  $user_id, 
      'dep_titulo' =>  $this->input->post('dep_titulo'), 
      'dep_text'	=>  $this->input->post('dep_text')
    );
    $dep = new User();
    $dep->edita_dep($data, $user_id);
    redirect('usuario/editar_depoimento/'.$user_id);
  }

  public function lista_depoimentos(){
    $html = '';
    $test = new User();
    $v = $test->get_dep();
    
    foreach($v as $dep){
        $html .= $this->test_display($dep);
      }
    return $html;
  }

  private function test_display($dep){
    $avatar = base_url('public/assets/img/users/no-photo.jpeg');
    $html = '<div class="row pt-3">
              <div class="col-sm-8 mx-auto">
               <div class="media">
                <div class="media-left d-flex mr-3 mt-4">
                    <img src="'. $avatar .'" class="img-depoimento" alt="">
                </div>
                <div class="media-body">
                  <div class="testimonial">
                    <h4>'.$dep['dep_titulo'].'</h4>
                    <p>'.$dep['dep_text'].'</p>
                    <p class="overview"><b>'.$dep['first_name'].'</b></p>
                  </div>
                </div>
              </div>
             </div>
            </div>';
    return $html;
  }

  public function checa_ficha($user_id){
    $usuario = new User();
    return $usuario->user_ficha($user_id);
  }

  public function historico($user_id){
    $usuario = new User();
    return $usuario->reservas($user_id);
  }

}