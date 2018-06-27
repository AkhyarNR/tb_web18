<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dosen_model');
	}

	public function index()
	{
		$this-> cek();
		$data = array(
			'success' => $this->session->flashdata('success'), 
			'error' => $this->session->flashdata('error')
		);
		$this->load->view('login', $data);
	}

	public function cek()
	{
		if(@$this->session->userdata('username')){
			redirect(base_url('dosen/mhsview'));
		}
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
?>