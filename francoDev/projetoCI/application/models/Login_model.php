<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	
    public function cadastro($dados){
	return $this->db->insert("users", $dados);
    }
	
    public function hasEmail($email){
	$this->db->where('email', $email);
	return $this->db->get('users')->row_array();
    }
    
    public function verifyCod($cod){
    	$this->db->where('cod', $cod); 
    	return $this->db->get('users')->num_rows();
    }
    
    public function resetCod($cod){
    	$this->db->where('cod', $cod); 
    	return $this->db->update('users', array('cod' => ""));
    }
	
}