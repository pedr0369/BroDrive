<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function semPermissao(){
        return $this->db->get('users')->result_array();
    }
    
    public function getEmail($id){
    	$this->db->where('id', $id);
    	return $this->db->get('users')->row_array();
    }
    
    public function denny($id){
        $this->db->where('id', $id);
        return $this->db->update('users', array('permission' => -1));
    }
    
    public function allow($id){
        $this->db->where('id', $id);
        return $this->db->update('users', array('permission' => 1));
    }
    
    public function promove($id){
        $this->db->where('id', $id);
        return $this->db->update('users', array('admin' => 1));
    }

}