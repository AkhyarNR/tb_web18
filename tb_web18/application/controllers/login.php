<?php
class login extends CI_Controller {
	
	//$this->load->helper('url');
	public function index()
	{
		$this->load->view('login');
	}

	public function dashboard(){
		$this->load->view('header');
		$this->load->view('dashboard-formmhs');
		$this->load->view('footer');
	}
}
?>