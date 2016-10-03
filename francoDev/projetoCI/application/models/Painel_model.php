<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Painel_model extends CI_Model {

    public function getCategories(){
    	return $this->db->get('category')->result_array();
    }
    
    public function getMyCategoriesNames($ids){
        $this->db->where_in('id', $ids);
    	return $this->db->get('category')->result_array();
    }
    
    public function cadCategories($id, $cat){
        $this->db->where('id', $id);
        return $this->db->update('users', array('id_categories' => $cat));
    }
    
    public function login($dados){
        $this->db->where('email', $dados['email']);
        $this->db->where('password', $dados['password']);
        $this->db->where('permission', 1);
        return $this->db->get('users')->row_array();
    }
    
    public function cadastraCod($cod, $id){
    	$this->db->where('id', $id); 
    	return $this->db->update('users', array('cod' => $cod));
    }
    
    public function upFile($file){
        return $this->db->insert("file", $file);
    }
    
    public function getFilesUser($id){
        $this->db->where('id_user', $id);
        return $this->db->get('file')->result_array();
    }
    
    public function countSizeFileUser($id){
        $this->db->where('id_user', $id);
        $this->db->select_sum('size', 'soma');
        return $this->db->get('file')->row_array();
    }
    
    public function fileRemove($id){
        $this->db->where('id', $id);
        return $this->db->delete('file');
    }
    
    public function getFileName($id){
        $this->db->where('id', $id);
        return $this->db->get('file')->row_array();
    }
    
    public function getLastFiles(){
        $this->db->select('file.*, users.email, category.name as nameCat');
        $this->db->from('file');
        $this->db->join('users', 'users.id = file.id_user');
        $this->db->join('category', 'category.id = file.id_categories');
        $this->db->order_by("file.id", "desc");
        return $this->db->get()->result_array();
    }
    
    public function getFilesCategoriesNames($categories){
    	$this->db->select('file.*, users.email, category.name as nameCat');
        $this->db->from('file');
        $this->db->join('users', 'users.id = file.id_user');
        $this->db->join('category', 'category.id = file.id_categories');
        $this->db->order_by("file.id", "desc");
        $this->db->limit(10);
        $this->db->where("file.id_categories in ({$categories})");
        return $this->db->get()->result_array();
    }
    
    public function totalUsers(){
        $this->db->select_sum('permission', 'total');
        $this->db->where('permission = ',  1);
        return $this->db->get('users')->row_array();
    }

}