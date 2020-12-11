<?php
include_once APPPATH.'libraries/Fichado.php';

class FichaModel extends CI_Model{
    
    public function salva_ficha($user_id){
        if(sizeof($_POST) == 0) return;

        /*$this->form_validation->set_rules('nome', 'Nome da Cliente', 'trim|required|min_lenght[2]|max_Lenght[64]');
        $this->form_validation->set_rules('telefone', 'Telefone/Celular da Cliente', 'trim|required|valid_date');
        $this->form_validation->set_rules('data_nasc', 'Data de Nascimento da Cliente', 'trim|required|valid_date');
        $this->form_validation->set_rules('endereco', 'Data de Nascimento da Cliente', 'trim|required|valid_date');
        $this->form_validation->set_rules('numero', 'Data de Nascimento da Cliente', 'trim|required|valid_date');
        $this->form_validation->set_rules('bairro', 'Data de Nascimento da Cliente', 'trim|required|valid_date');
        $this->form_validation->set_rules('cidade', 'Data de Nascimento da Cliente', 'trim|required|valid_date');
        $this->form_validation->set_rules('estado', 'Estado da Moradia da Cliente', 'trim|required|min_lenght[2]|max_Lenght[2]');
        $this->form_validation->set_rules('resp_nome', 'Nome do Responsável da Cliente', 'trim|required|valid_date');
        $this->form_validation->set_rules('fone', 'Telefone/Celular do Responsável da Cliente', 'trim|required|valid_date');
        $this->form_validation->set_rules('cpf', 'CPF do Responsável da Cliente', 'trim|required|valid_date');
        $this->form_validation->set_rules('rg', 'RG do Responsável da Cliente', 'trim|required|valid_date');
        $this->form_validation->set_rules('nasc_resp', 'Data de Nascimento do Responsável da Cliente', 'trim|required|valid_date');
            $cpf = $this->input->post('cpf')
            if($this->form_validation->run()){
                $retorno->validaCPF($cpf);
                $data = $this->input->post();*/
                $data = array( 
                    'user_id'	=>  $user_id,
                    'nome' =>  $this->input->post('nome'), 
                    'telefone' =>  $this->input->post('telefone'), 
                    'data_nasc' =>  $this->input->post('data_nasc'), 
                    'cep' =>  $this->input->post('cep'), 
                    'endereco' =>  $this->input->post('endereco'), 
                    'numero' =>  $this->input->post('numero'), 
                    'bairro' =>  $this->input->post('bairro'), 
                    'cidade' =>  $this->input->post('cidade'), 
                    'estado' =>  $this->input->post('estado'), 
                    'resp_nome' =>  $this->input->post('resp_nome'), 
                    'fone' =>  $this->input->post('fone'), 
                    'cpf' =>  $this->input->post('cpf'), 
                    'rg' =>  $this->input->post('rg'), 
                    'nasc_resp' =>  $this->input->post('nasc_resp'), 
                    'rimel' =>  $this->input->post('rimel'), 
                    'alergia' =>  $this->input->post('alergia'), 
                    'prob_tir' =>  $this->input->post('prob_tir'), 
                    'gravida' =>  $this->input->post('gravida'), 
                    'lado' =>  $this->input->post('lado'), 
                    'trat_onco' =>  $this->input->post('trat_onco'), 
                    'proc_rec' =>  $this->input->post('proc_rec'), 
                    'prob_oc' =>  $this->input->post('prob_oc'), 
                    'prob_out' =>  $this->input->post('prob_out'), 
                    'extensao' =>  $this->input->post('extensao'), 
                    'data_proc' =>  $this->input->post('data_proc')
                );
                $ficha = new Fichado();
                $ficha->cria_ficha($data);
                redirect('ficha/editar_ficha/'.$user_id);
           // }
    }

    public function checa_ficha($user_id){
        $ficha = new Fichado();
        return $ficha->user_ficha($user_id);
    }

    public function edita_ficha($user_id){
        if(sizeof($_POST) == 0) return;
        $data = $this->input->post();      
        $ficha = new Fichado();
        $ficha->edita_ficha($data, $user_id);
        redirect('ficha/editar_ficha/'.$user_id);
    }


    

    /**
      * Verifica se a data informada é valida, formato padrão dd/mm/yyyy
      * caso precise validar em outros formatos adicione nessa função
      * ex: mm/yyyy, mm/yy, etc
      * @param     string
      * @return     bool
      */
      function valid_date($date, $format = 'dd/mm/yyyy')
      {
          $dateArray = explode("/", $date); // slice the date to get the day, month and year separately
          $d = 0;
          $m = 0;
          $y = 0;
          if (sizeof($dateArray) == 3) {
              if (is_numeric($dateArray[0]))
                  $d = $dateArray[0];
              if (is_numeric($dateArray[1]))
                  $m = $dateArray[1];
              if (is_numeric($dateArray[2]))
                  $y = $dateArray[2];
          }
 
          return checkdate($m, $d, $y) == 1;
      }

      /**
       * Verifica se a hora informada é valida, formato padrão HH:ii
       * caso precise validar em outros formatos adicione nessa função
       * 
       * @param     string
       * @return     bool
       */
      function valid_hour($hour)
      {
        if(preg_match("/^([0-1][0-9]|[2][0-3]):[0-5][0-9]$/", $hour)){
            return TRUE;
        }else{
            return FALSE;
        }
      }

      function calculo_idade($data){
        $dia = date('d');
        $mes = date('m');
        $ano = date('Y');
        $nascimento = explode('-', $data);
        $dianasc = ($nascimento[2]);
        $mesnasc = ($nascimento[1]);
        $anonasc = ($nascimento[0]);
        $idade = $ano - $anonasc;
        if ($mes < $mesnasc){
            $idade--;
            return $idade;
        }elseif ($mes == $mesnasc && $dia <= $dianasc){
            $idade--;
            return $idade;
        }else{
            return $idade;
        }
    }

    

}

?>