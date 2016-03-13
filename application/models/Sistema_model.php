<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema_model extends CI_Model {
    
    public function cadastra_user($dados){
        $this->db->insert("usuario", $dados);
    }
    
    public function buscaDados($email){
        $this->db->where('email', $email);
        return $this->db->get('usuario')->row_array();
    }
    
    public function usuario_exists($email){
        $this->db->where('email', $email);
        $this->db->get('usuario');
        $query = $this->db->affected_rows();
        return $query;
    }
    
    public function loga($email, $senha){
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        $this->db->where('permissao =', 1);
        $login = $this->db->get('usuario')->row_array();
        return $login;
    }
    
    public function is_admin($cod){
        $this->db->where('cod', $cod);
        $this->db->where('admin =', 1);
        return $this->db->get('usuario')->num_rows();
    }

    public function alteraDados($dados, $email){
        $this->db->where('email', $email);
        $this->db->update('usuario', $dados);
        return $this->db->affected_rows();
    }
    
    public function verifica_Senha($email, $senha){
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        $login = $this->db->get('usuario');
        return $this->db->affected_rows();
    }
    
    public function altera_Senha($email, $senha){
    	$this->db->where('email', $email);
        $this->db->update('usuario', $senha);
        return $this->db->affected_rows();
    }
    
}