<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public $dados = array(
        "title" => "Administracao",
    );
    
    function __construct(){
        parent::__construct();
        $this->load->model('Admin_model', 'adm');  
    }
    
    public function index(){
        if($usuario = $this->session->userdata('permissao')){
            $permissao = $this->adm->has_permission(0); 
            $permissioned = $this->adm->has_permission(1);  
            $this->dados['permissao'] = $permissao; 
            $this->dados['permissioned'] = $permissioned;     
            $this->load->view('admin', $this->dados);
        }
        else{
            $this->load->view('sistema', $this->dados);
        }
    }
    
    public function aprovar($id, $email){
    
    	$this->email->from('nejy369@gmail.com', 'BroDrive');
	$this->email->to($email);
	$this->email->subject('Aprovação de acesso no BroDrive');
	$this->email->message('Parabéns, agora você já pode acessar o BroDrive e contribuir para o nosso acervo do conhecimento. Basta acessar nosso site: <a href="http://atualgeek.com">Acessar o Brodrive</a> e colocar seu acesso e desfrutar. Seja Bem Vindo.');
	$envio = $this->email->send();
	
    	$this->adm->aprovar($id);
    	redirect('Admin');
    }
    
    public function recusar($id){
    	$this->adm->recusar($id);
    	redirect('Admin');
    }

    public function promover($id){
        $this->adm->promover($id);
        redirect('Admin

');
    }
    
}