<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('ion_auth_acl');
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}
		$siteLang = $this->session->userdata('site_lang');
        if ($siteLang) {
           $this->lang->load('main',$siteLang);
        } else {
           $this->lang->load('main','english');
        }

	}
	

	/**
	 * Index Page for this controller.
	 *
	
	 */
	public function index()
	{
		$data['users_groups']           =   $this->ion_auth->get_users_groups()->result();
        $data['users_permissions']      =   $this->ion_auth_acl->build_acl();
		$this->load->view('templates/header');
		$this->load->view('index',$data);
		$this->load->view('templates/footer');
		
	}
}
