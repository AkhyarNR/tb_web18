<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	private $filename = "upload_format";
	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dosen_model');
	}

/* ==================== MENU MAHASISWA ==================== */

	 function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	 function masuk()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = $this->Dosen_model->cek_user($username,md5($password))->num_rows();
		$result = $this->Dosen_model->cek_user($username,md5($password))->row();
		if($cek > 0){
			$data_session = array(
				'username' => $username, 
				'id_level' => $result->id_level,
				'status' => 'Koordinator',
			);
		$this->session->set_userdata($data_session);
		redirect(base_url('dosen/mhsview'));
		}else{
		$this->session->set_flashdata('error', 'Username atau Password salah!');
		redirect(base_url('login'));
		}
	}

	public function mhsview()
	{
		if($this->session->userdata('id_level')=='1'){
			if($this->session->flashdata('success')){
				$notif = $this->session->flashdata('success');
				$notif_error ="kosong";
			}elseif($this->session->flashdata('error')){
				$notif_error = $this->session->flashdata('error');
				$notif ="kosong";
			}else{
				$notif ="";
				$notif_error ="";
			}
		$data = array(
			'nav' => 'mhsview',
			'title' => 'Data Mahasiswa',
			'status' => 'Koordinator',
			'table' => $this->Dosen_model->getData('tb_mhs'),
			'notif' => $notif,
			'notif_error' => $notif_error,
		);
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/mhsview', $data);
		$this->load->view('dosen/footer',$data);
		}else{
			$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
			redirect(base_url(''));
		}
	
	}

	public function mhstambah()
	{
		if($this->session->userdata('id_level')=='1'){
		$data = array(
			'nav' => 'mhstambah',
			'status' => 'Koordinator',
			'title' => 'Tambah Data Mahasiswa');
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/mhstambah',$data);
		$this->load->view('dosen/footer');
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

	public function mhsinsert()
	{
		if($this->session->userdata('id_level')=='1'){
		$data = array(
			'nim' => $this->input->post('nim') , 
			'nama_mhs' => $this->input->post('nama'),
			'id_prodi' => $this->input->post('prodi'),
			'id_gol' => $this->input->post('gol')
		);
		$result = $this->Dosen_model->insert('tb_mhs',$data);
		if($result == "success"){
			$notif = $this->session->set_flashdata('success', 'Berhasil di tambahkan!');
			redirect(base_url('dosen/mhsview'));
		}else{
			$notif = $this->session->set_flashdata('error', $result);
			redirect(base_url('dosen/mhsview'));
		}
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

	public function mhsedit()
	{
		if($this->session->userdata('id_level')=='1'){
			$data = array(
			'nav' => 'mhsedit',
			'title' => 'Sunting Data Mahasiswa',
			'status' => 'Koordinator',
			'table' => $this->Dosen_model->getWhere('tb_mhs', array('nim' => $this->uri->segment(3)))->row(),
		);
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/mhsedit', $data);
		$this->load->view('dosen/footer',$data);
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

	public function mhsupdate()
	{
		if($this->session->userdata('id_level')=='1'){
		$nim = $this->input->post('nim');
		$data = array( 
			'nama_mhs' => $this->input->post('nama'),
			'id_prodi' => $this->input->post('prodi'),
			'id_gol' => $this->input->post('gol')
		);
		$result = $this->Dosen_model->update('tb_mhs',array('nim'=>$nim),$data);
		if($result == "failed"){
			$notif = $this->session->set_flashdata('error', 'Gagal di ubah!');
			redirect(base_url('dosen/mhsview'));
		}else{
			$notif = $this->session->set_flashdata('success', 'Berhasil di ubah!');
			redirect(base_url('dosen/mhsview'));
		}
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

	public function mhsdelete()
	{
		if($this->session->userdata('id_level')=='1'){
		$data = $this->uri->segment(3);
		$result = $this->Dosen_model->delete('tb_mhs','nim',$data);
		if($result == "failed"){
			$notif = $this->session->set_flashdata('error', 'Gagal di hapus!');
			redirect(base_url('dosen/mhsview'));
		}else{
			$notif = $this->session->set_flashdata('success', 'Berhasil di hapus!');
			redirect(base_url('dosen/mhsview'));
		}
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

	public function mhsupload(){
		if($this->session->userdata('id_level')=='1'){
		$data = array(); 	
		$data['nav'] = 'mhsupload';
		$data['title'] = 'Unggah Data Mahasiswa';
		$data['status'] = 'Koordinator';	
		if(isset($_POST['preview'])){ 
			$upload = $this->Dosen_model->upload_file($this->filename);
			
			if($upload['result'] == "success"){ 
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); 
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				$data['sheet'] = $sheet; 
			}else{ 
				$data['upload_error'] = $upload['error']; 
			}
		} 
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/mhsupload',$data);
		$this->load->view('dosen/footer',$data);
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}
	
	public function mhsimport(){
		if($this->session->userdata('id_level')=='1'){
		$table = 'tb_mhs';
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); 
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		$dataupload = [];
		
		$numrow = 1;
		foreach($sheet as $row){
			if($numrow > 1){
				array_push($dataupload, [
					'nim' => $row['A'],
					'nama_mhs' => $row['B'],
					'id_prodi' => $row['C'],
					'id_gol' => $row['D'],
				]);
			}
			
			$numrow++; 
		}		
		$result = $this->Dosen_model->insert_multiple($table, $dataupload);
		if($result == "success"){
			$notif = $this->session->set_flashdata('success', 'Berhasil di impor!');
			redirect(base_url('dosen/mhsview'));
		}else{
			$notif = $this->session->set_flashdata('error', $result);
			redirect(base_url('dosen/mhsview'));
		}
	}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}
/* ============================== END MENU MAHASISWA ============================== */


}

/* End of file Dosen.php */
/* Location: ./application/controllers/Dosen.php */
