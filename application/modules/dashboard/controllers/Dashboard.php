<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}

	}
	

	/**
	 * Index Page for this controller.
	 *
	
	 */
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('index');
		$this->load->view('templates/footer');
		
	}
}
