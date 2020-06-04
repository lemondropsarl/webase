<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends MX_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('nav_model');
        $this->load->model('module_model');
        
        
        $this->load->helper('url');
		$this->load->helper('path');
		$this->load->helper('form');
		$this->load->helper('file');
		
		
        $this->load->library('form_validation');
        $this->load->library('ion_auth');
        $this->load->library('ion_auth_acl');
        
        
    }
    

    public function index()
    {
        //check if user is logged in
        if (! $this->ion_auth->logged_in()) {
            redirect('auth');
        }else{

            $data['modules'] = $this->module_model->get_modules();
            $data['menus']			  	   =   $this->nav_model->get_nav_menus();
            $data['subs']				   =   $data['menus'];
            $data['acl_modules']		   =   $this->nav_model->get_acl_modules();
            $data['permissions']           =   $this->ion_auth_acl->permissions('full', 'perm_key');
            $this->load->view('templates/header', $data);
            $this->load->view('browse', $data);
            $this->load->view('templates/footer');  
        }
    }
    public function install(){}
    public function update(){}

}

/* End of file Module.php */
