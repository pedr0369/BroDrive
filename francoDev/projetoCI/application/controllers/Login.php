<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
            parent::__construct();
            $this->load->model('Login_model');   
    }
	
	public function index(){
            logado();
            $this->template->load('template/index', 'login/index');
	}
    
	public function contato(){
		$usuario = $this->session->userdata("usuario");
        $this->template->load('template/index', 'login/contato', $usuario);
	}
	
	public function envia_contato(){
		$email = $this->input->post("email");
		$assunto = $this->input->post("assunto");
		$mensagem = $this->input->post("mensagem");
		
		$this->email->from("contato@brodrive.com.br", $email);
		$this->email->to("pedr0369@hotmail.com");
		$this->email->subject($assunto);
		$this->email->message($mensagem);
		$email = $this->email->send();
		
		if($email){
			$this->session->set_flashdata("info", "Contato enviado com sucesso.");
			redirect('/');
		}else{
			$this->session->set_flashdata("danger", "Não foi possível enviar seu contato, tente novamente.");
			redirect('/');
		}
	}
	
	public function cadastro(){
            logado();
            $this->template->load('template/index', 'login/cadastro');
	}
	
	private function criaDiretorio($nome){
            $nome = explode("@", $nome);
            if(is_dir("Diretorio/" . $nome[0]) == false){
                $cria = mkdir("Diretorio/" . $nome[0], 0755);
            }
    	}
	
	public function confirm_cadastro(){
            $r_senha = md5($this->input->post('r_senha'));
            $cod = $this->input->post('cod');

            $form = array(
                "cod" => "",	
                "email" => $this->input->post('email'),			
                "password" => md5($this->input->post('password')),
                "avatar" => $this->input->post('avatar'),
                "dt_create" => date('Y-m-d')
            );	

            if($form['password'] == $r_senha){			

                if(!$this->Login_model->hasEmail($form['email'])){

                    $conteudo = $this->load->view("email/email_cadastro", $form, TRUE);
                    
                    if($cod != ""){
                        if(count($this->Login_model->verifyCod($cod)) > 0){
                            $form["permission"] = 1;
                            $this->Login_model->resetCod($cod);
                            $conteudo = $this->load->view("email/email_ativado", $form, TRUE);
                        }
                        else{
                            $this->session->set_flashdata("danger", "Código de ativação inválido, tente novamente com o código correto ou caso não possua um, deixe em branco.");
                            redirect('/');
                        }
                    }

                    $this->email->from("contato@brodrive.com.br", "BroDrive");
                    $this->email->to($form['email']);
                    $this->email->subject("Seu cadastro foi feito com sucesso.");
                    $this->email->message($conteudo);

                    if($this->Login_model->cadastro($form)){
                        $this->session->set_flashdata("info", "Registro efetuado com sucesso, saiba mais informações no e-mail que lhe enviamos.");
                        $this->criaDiretorio($form['email']);
                        $email = $this->email->send();
                        $this->template->load('template/index', 'login/index');
                    }else{
                        $this->session->set_flashdata("danger", "Infelizmente não pudemos computar seu cadastro, tente novamente em breve");
                        $this->template->load('template/index', 'login/cadastro');
                    }				
                }else{
                    $this->session->set_flashdata("danger", "Já existe este e-mail cadastrado no sistema");
                    $this->template->load('template/index', 'login/cadastro');
                }
            }else{
                $this->session->set_flashdata("danger", "As senhas não são iguais");
                $this->template->load('template/index', 'login/cadastro');
            }
	}
	
	public function faq(){
            $this->template->load('template/index', 'login/faq');
	}
	
}