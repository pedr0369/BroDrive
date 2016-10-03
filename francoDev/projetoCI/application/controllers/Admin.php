<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
        	parent::__construct();
        	$this->load->model('Admin_model');  
        	$dados = autoriza_admin(); 
        	$usuarios = $this->Admin_model->semPermissao();  
        	$this->dados = array("usuarios" => $usuarios);      		
    	}
	
	public function index(){
            $this->template->load('template/index', 'admin/index', $this->dados);
	}
	
	function email($id, $email, $assunto){
		$email_Usuario = $this->Admin_model->getEmail($id);
		$conteudo = $this->load->view($email, $id, TRUE);
		$this->email->from("contato@brodrive.com.br", "BroDrive");
		$this->email->to($email_Usuario['email']);
		$this->email->subject($assunto);
		$this->email->message($conteudo);
		return $this->email->send();
	}
	
	public function denny($id){				
		if($this->Admin_model->denny($id)){
			$this->email($id, "email/email_denny", "Seu usuário foi bloqueado - BroDrive");
			$this->session->set_flashdata("info", "Usuário foi banido com sucesso, ele receberá um e-mail o informando.");			
		}else{
			$this->session->set_flashdata("danger", "Não foi possível banir o usuário, tente novamente");
		}
        $this->template->load('template/index', 'admin/index', $this->dados);
		redirect('admin/index', 'refresh');
	}
	
	public function allow($id){			
		if($this->Admin_model->allow($id)){
			$this->email($id, "email/email_allow", "Seu usuário foi aceito - BroDrive");
			$this->session->set_flashdata("info", "Usuário foi permitido com sucesso, ele receberá um e-mail o informando.");
		}else{
			$this->session->set_flashdata("danger", "Não foi possível permitir este usuário, tente novamente");
		}
		$this->template->load('template/index', 'admin/index', $this->dados);
		redirect('admin/index', 'refresh');
	}
	
	public function promove($id){			
		if($this->Admin_model->promove($id)){
			$this->email($id, "email/email_promove", "Seu usuário se tornou um administrador - BroDrive");
			$this->session->set_flashdata("info", "Usuário foi promovido a administrador, ele receberá um e-mail o informando.");
		}else{
			$this->session->set_flashdata("danger", "Não foi possível promover este usuário a administrador, tente novamente");
		}
		$this->template->load('template/index', 'admin/index', $this->dados);
		redirect('admin/index', 'refresh');
	}

}