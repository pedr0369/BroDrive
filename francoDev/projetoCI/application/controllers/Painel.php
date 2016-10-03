<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {
	
    function __construct(){
        parent::__construct();
        $this->load->model('Painel_model');         		
    }
    
    private function dados($atr_dad, $dad_if, $dad_id){
        $dados = array("usuario" => $atr_dad);
        
        if($dad_if == ""){
            $categories = $this->Painel_model->getCategories();
            $dados["categories"] = $categories;
        }
        
        if($dad_if != ""){
            $dados["my_Categories"] = $this->Painel_model->getMyCategoriesNames(explode(",", $dad_if));
            $dados['myFile'] = $this->Painel_model->getFilesUser($dad_id);
            $dados['totalUsers'] = $this->Painel_model->totalUsers();
            $dados['filesCategories'] = $this->Painel_model->getFilesCategoriesNames($dad_if);
        }        
        
        $dados['lastFile'] = $this->Painel_model->getLastFiles();        
        
        return $dados;
    }
    
    public function meusDados(){
        error_reporting(0);
        $usuario = autoriza();
        $dados = $this->dados($usuario, $usuario['id_categories'], $usuario['id']);
        echo json_encode($dados);
    }
    
    public function index(){
        $usuario = autoriza();	
        $dados = $this->dados($usuario, $usuario['id_categories'], $usuario['id']);
        $this->template->load('template/index', 'painel/index', $dados);
    }
    
    public function sair(){
        $this->session->sess_destroy();
        redirect('/');
    }
	
    public function login(){		
        $form = array(
            "email" => $this->input->post('email'),		
            "password" => md5($this->input->post('senha'))
        );

        $login = $this->Painel_model->login($form);
        if($login){
            if($login['cod'] == ""){
                $this->Painel_model->cadastraCod(geraCodigo($login['id'], $login['email']), $login['id']);
            }        

            $this->session->set_userdata("usuario", $login);            
            $dados = $this->dados($login, $login['id_categories'], $login['id']); 

            $this->template->load('template/index', 'painel/index', $dados);
        }
        else{
            $this->session->set_flashdata("danger", "Não foi possível fazer login com os dados fornecidos"); 
            $this->session->set_flashdata("email", $form["email"]); 
            $this->template->load('template/index', 'login/index');
        }
    }
    
    public function cadastraCategories(){
        $usuario = autoriza();
        if($usuario['id_categories'] == ""){
            $categories = $this->input->post('category');
            $cat = implode(",", $categories);
            if($this->Painel_model->cadCategories($usuario['id'], $cat)){
                $this->session->set_flashdata("info", "Categorias cadastradas com sucesso");
                $usuario['id_categories'] = $cat;
                $this->session->unset_userdata('usuario');
                $this->session->set_userdata('usuario',$usuario);
            }else{
                $this->session->set_flashdata("danger", "Não foi possível cadastrar as categorias"); 
            }
            redirect('painel/index', 'refresh');
        }else{
            redirect('painel/index', 'refresh');
        }
    }
    
    public function load_arquivo(){
        $usuario = autoriza();
        
        $soma = $this->Painel_model->countSizeFileUser($usuario['id']);
        if((int)$soma['soma'] < 40000){
        
            $nome = explode("@", $usuario['email']);
            $config['upload_path']          = 'Diretorio/' . $nome[0];
            $config['allowed_types']        = 'gif|jpg|doc|csv|pdf|png|xls|ico|xls|mp3|svg|c|cpp';
            $config['max_size']             = 10000;        
            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('arquivo')){
                $this->session->set_flashdata("danger", $this->upload->display_errors()); 
                $this->template->load('template/index', 'painel/index', $usuario);
                redirect('painel/index', 'refresh');            
            }else{
                $upload = $this->upload->data();
                $form = array(
                    "name" => $upload['raw_name'],
                    "extension" => $upload['file_ext'],
                    "id_categories" => $this->input->post('categoria'),
                    "dt_create" => date('Y-m-d'),
                    "size" => $upload['file_size'],
                    "id_user" => $usuario['id'],
                    "description" => $this->input->post('descricao')
                );               
                if($file = $this->Painel_model->upFile($form)){
                    $this->session->set_flashdata("info", "Arquivo enviado com sucesso, continue a compartilhar conhecimento, obrigado."); 
                    redirect('painel/index', 'refresh');
                }
            }
        }else{
            $this->session->set_flashdata("danger", "Capacidade de armazenamento estrapolado, gerencie seus arquivos ou solicite mais espaço conosco."); 
            redirect('painel/index', 'refresh');
        }
    }
    
    public function fileRemove($id){
        $usuario = autoriza();
        $nome = explode("@", $usuario['email']);        
        $Filename = $this->Painel_model->getFileName($id);
        
        if(unlink("Diretorio/" . $nome[0] . '/' . $Filename['name'] . $Filename['extension'])){
            if($removeFileBd = $this->Painel_model->fileRemove($id)) {
                $this->session->set_flashdata("info", "Arquivo excluído com sucesso.");	
            }
        }else{
			$this->session->set_flashdata("danger", "Não foi possível excluir o arquivo, tente novamente mais tarde.");
		}
        redirect('painel/index', 'refresh');
    }
    
    public function editar(){
        $dados = array();
        $dados['categories'] = $this->Painel_model->getCategories();        
        
        $this->template->load('template/index', 'painel/editar', $dados);
    }
    
}