<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $this->template->load('template/index', 'home');
	}
    
    public function portfolio()
    {
        $this->template->load('template/index', 'portfolio');
    }
    
    public function blog()
    {
        $this->template->load('template/index', 'blog');
    }
}
