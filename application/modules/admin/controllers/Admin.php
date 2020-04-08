<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        
        $this->load->library('ion_auth_acl');
        
        if( ! $this->ion_auth_acl->has_permission('access_admin') )
            redirect('dashboard');
    }
    
    public function index()
    {
        echo "welcome to admin";
    }

}

/* End of file Controllername.php */
