<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
	public function has_permission($i){
		$this->db->where('permissao =', $i);
		return $this->db->get('usuario')->result_array();
	}
	
	public function recusar($cod){
        	$this->db->where('cod', $cod);
	        $this->db->delete('usuario');
    	}
    	
    	public function aprovar($cod){
    		$data = array(
               		'permissao' => 1,
            	);
    		$this->db->where('cod', $cod);
	        $this->db->update('usuario', $data);
    	}

	public function promover($cod){
    		$data = array(
               		'admin' => 1,
            	);
    		$this->db->where('cod', $cod);
	        $this->db->update('usuario', $data);
    	}
	
}