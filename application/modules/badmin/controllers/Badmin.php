<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Badmin extends MX_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');       
        $this->load->library('ion_auth_acl');
        $this->load->model('nav_model');
        
        
        if( ! $this->ion_auth_acl->has_permission('A') )
            redirect('dashboard');
    }
    
    public function index()
    {
        redirect('badmin/users');
    }
    public function users(){
        $data['user_groups']           =   $this->ion_auth->get_users_groups()->result();
		$data['user_permissions']      =   $this->ion_auth_acl->build_Acl();
		$data['menus']			  	   =   $this->nav_model->get_nav_menus();
		$data['subs']				   =   $data['menus'];
		$data['acl_modules']		   =   $this->nav_model->get_acl_modules();
		

        $this->load->view('templates/header', $data);      
        $this->load->view('users', $data);
        $this->load->view('templates/footer');      
    }

}

/* End of file Controllername.php */
