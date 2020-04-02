<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_Dashboard_test extends  TestCase{

    public function test_index()
	{
		$output = $this->request('GET', 'dashboard');
        //$this->assertContains('<h1>Welcome to Webase</h1>', $output);
        $this->assertRedirect('auth/login');
	}
}
