<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {
    
    public $dados = array(
        "title" => "Painel Brodriver",
    );
    
    function __construct(){
        parent::__construct();
        $this->load->model('Sistema_model', 'sis');  
    }
    
    public function index(){
       if($usuario = $this->session->userdata('usuario'))
            $this->load->view('painel', $this->dados);
        else{
            $this->load->view('sistema', $this->dados);
        }
    }
    
    private function criaDiretorio($nome){
        $nome = explode("@", $nome);
        if(is_dir("Diretorio/" . $nome[0]) == false){
        	$cria = mkdir("Diretorio/" . $nome[0], 0700);
        }
    }
    
    public function login(){

        $this->dados['usuario'] = $this->input->post('usuario');
        $this->dados['senha'] = md5($this->input->post('senha'));
        
        $usuario = $this->sis->loga($this->dados['usuario'], $this->dados['senha']);
        if($usuario){
            $permissao = $this->sis->is_admin($usuario['cod']);
            if($permissao == 1){ 
              $this->session->set_userdata('permissao', $permissao);
            }
            $this->session->set_userdata('usuario', $usuario);
            $this->criaDiretorio($usuario['email']);
            $this->load->view('painel', $this->dados);
        }else {
            $this->session->set_flashdata('alerta', "Usuário ou senha inválidos");
            redirect('Sistema/index');
        } 
    }
    
    public function sair(){
    	$this->session->sess_destroy();
    	redirect('Sistema/index');
    }
    
    
}