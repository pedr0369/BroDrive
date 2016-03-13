<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller {
    
    public $dados = array(
        "title" => "BroDriver",
    );
    
    function __construct(){
        parent::__construct();
        $this->load->model('Sistema_model', 'sis');  
    }
    
    public function index(){
        $this->load->view('sistema', $this->dados);
    }
    
    public function cadastro(){
        $dados = array("title" => "Cadastre-se");
        $this->load->view('login/cadastro', $dados);
    }
    
    public function confirm_cadastro(){
        
        $r_senha = md5($this->input->post('r_senha'));
        $registro = array(
            "nome" => $this->input->post('nome'),
            "email" => $this->input->post('email'),
            "senha" => md5($this->input->post('senha')),
            "cel" => $this->input->post('cel')
        );
        
        $usuario = $this->sis->usuario_exists($registro["email"]);
        
        if($registro["senha"] == $r_senha){
            if($usuario == 0){
                $this->sis->cadastra_user($registro);
                $this->session->set_flashdata('alerta', "Usuário cadastrado com sucesso, aguarde aprovação.");
                redirect('/');
            }else {
                $this->session->set_flashdata('alerta', "E-mail inválido");
                redirect('/sistema/cadastro');
            }
        }else {
            $this->session->set_flashdata('alerta', "As senhas não são iguais");
            redirect('/sistema/cadastro');
        }
    }
    
    public function meusDados(){
	if($usuario = $this->session->userdata('usuario')){
        	$dados = $this->session->userdata('usuario');
	        $dados['title'] = 'Edite seus dados'; 
        	$this->load->view('login/editar', $dados);
	}else{
            $this->load->view('sistema', $this->dados);
        }
    }
    
    public function editar(){
        $dados = $this->session->userdata('usuario');
        $registro = array(
            "nome" => $this->input->post('nome'),
            "cel" => $this->input->post('cel')
        );
        if(strlen($registro['nome']) == 0) unset($registro['nome']); 
        if(strlen($registro['cel']) == 0) unset($registro['cel']);
        $email = $dados['email'];
       	$edita = $this->sis->alteraDados($registro, $dados['email']);
        if($edita == 1){
          $this->session->unset_userdata('usuario');
          $usuario = $this->sis->buscaDados($email);
          $this->session->set_userdata('usuario', $usuario);
          $this->meusDados();
        }else {
        	$this->meusDados();
        }
    }
    
    public function edita_Senha(){
	if($usuario = $this->session->userdata('usuario'))
    		$this->load->view('login/edita_Senha', $this->dados);
	else{
                $this->load->view('sistema', $this->dados);
        }
    }

    public function contato(){
	if($usuario = $this->session->userdata('usuario'))
        	$this->load->view('login/contato', $this->dados);
	else{
	        $this->load->view('sistema', $this->dados);
        }
    }

    public function envia_contato(){
	$usuario = $this->session->userdata('usuario');

	$this->email->from('nejy369@gmail.com', 'BroDrive');
	$this->email->to('pedr0369@hotmail.com');
	$this->email->subject($this->input->post('assunto') . ' - ' . $usuario['email']);
	$this->email->message($this->input->post('mensagem'));
	$envio = $this->email->send();
	
	if($envio){
		$this->session->set_flashdata('alerta', "E-mail enviado com sucesso");
		redirect('sistema/contato');
	}
	else{
		$this->session->set_flashdata('alerta', "E-mail não pode ser enviado");	
            	redirect('sistema/contato');
        }
    }
    
    public function altera_Senha(){
    	$usuario= $this->session->userdata('usuario');
    	
    	$senha_atual = md5($this->input->post('senha_atual'));
    	
    	$registro = array(
            "senha" => md5($this->input->post('senha')),
        );
        
	$linha = $this->sis->verifica_Senha($usuario['email'], $senha_atual);
	if($linha == 1){
		$altera = $this->sis->altera_Senha($usuario['email'], $registro);
		if($altera == 1){
		$this->session->set_flashdata('alerta', "Senha trocada com sucesso");	
            	redirect('painel');
            	}
            	else{
            		$this->session->set_flashdata('alerta', "Não foi possível trocar sua senha, tente novamente.");	
            		redirect('sistema/edita_Senha');
            	}
	}
	else{
		$this->session->set_flashdata('alerta', "Você inseriu a senha atual incorretamente");	
            	redirect('sistema/edita_Senha');
	}
    }
    
}