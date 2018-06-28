<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	private $filename = "upload_format";
	private $filename_dosen = "upload_format_dosen";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dosen_model');
	}


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
			if($result->id_level == 1 || $result->id_level == 2 || $result->id_level == 4){
			$data_session = array(
				'username' => $username, 
				'id_level' => $result->id_level
			);
			if($result->id_level == 1)
				$data_session['status'] = 'Koordinator';
			elseif($result->id_level == 2)
				$data_session['status'] = 'Dosen';
			elseif($result->id_level == 4)
				$data_session['status'] = 'Dosen Pengulas';
				$this->session->set_userdata($data_session);
				redirect(base_url('dosen/dashview'));
			}elseif($result->id_level == 3){
			$data_session = array(
				'username' => $username,
				'status' => 'Mahasiswa',
				'id_level' => $result->id_level
			);
				$this->session->set_userdata($data_session);
				redirect(base_url('dash/mhsview'));
			}
		}else{
		$this->session->set_flashdata('error', 'Username atau Password salah!');
		redirect(base_url('login'));
			}
	}


	public function setkoordinator()
	{
		if($this->session->userdata('id_level')=='1'){
			$id_dosen = "DOSPEM".$this->uri->segment(3);
			$data = array( 
			'id_level' => '2'
			);
		$result = $this->Dosen_model->update('tb_login',array('username'=>$this->session->userdata('username')),$data);
		$result_switch = $this->Dosen_model->update('tb_login',array('username'=>$id_dosen),array('id_level'=>'1'));
			if($result == "failed" || $result == "failed"){
				$notif = $this->session->set_flashdata('error', 'Gagal di ubah!');
				redirect(base_url('dosen/dosview'));
			}else{
			
			$notif = $this->session->set_flashdata('success', 'Berhasil di ubah !');
			redirect(base_url('dosen/logout'));	
			}
		}else{
			$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
			redirect(base_url(''));
		}
	}

	public function gagalset()
	{
		$notif = $this->session->set_flashdata('error', 'Data tidak bisa di ubah!');
				redirect(base_url('dosen/dosview'));
	}

/* ==================== MENU DASHBOARD ==================== */



	public function dashview()
	{
		if($this->session->userdata('id_level')=='1' || $this->session->userdata('id_level')=='2' || $this->session->userdata('id_level')=='4'){
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
			'nav' => 'dashview',
			'title' => 'Data Usulan Dosen',
			'dosen' =>  $this->Dosen_model->getData('tb_dosen'),
			'status' => $this->session->userdata('status'),
			'table' => $this->Dosen_model->getData('tb_usulan'),
			'notif' => $notif,
			'notif_error' => $notif_error,
		);
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/dashview', $data);
		$this->load->view('dosen/footer',$data);
		}else{
			$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
			redirect(base_url(''));
		}	
	}

	

/* ============================== END MENU DASHBOARD ============================== */

/* ==================== MENU MAHASISWA ==================== */



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
			'status' => $this->session->userdata('status'),
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
			'status' => $this->session->userdata('status'),
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
			'status' => $this->session->userdata('status'),
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
		if($result == "success"){
			$notif = $this->session->set_flashdata('success', 'Berhasil di ubah!');
			redirect(base_url('dosen/dosview'));
		}else{
			$notif = $this->session->set_flashdata('error', $result);
			redirect(base_url('dosen/dosview'));
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
		if($result == "success"){
			$notif = $this->session->set_flashdata('success', 'Berhasil di hapus!');
			redirect(base_url('dosen/dosview'));
		}else{
			$notif = $this->session->set_flashdata('error', $result);
			redirect(base_url('dosen/dosview'));
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
		$data['status'] = $this->session->userdata('status');	
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

/* ==================== MENU DOSEN ==================== */


public function dosview()
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
			'nav' => 'dosview',
			'title' => 'Data Dosen',
			'status' => $this->session->userdata('status'),
			'table' => $this->Dosen_model->getData('tb_dosen'),
			'notif' => $notif,
			'notif_error' => $notif_error,
		);
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/dosview', $data);
		$this->load->view('dosen/footer',$data);
		}else{
			$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
			redirect(base_url(''));
		}
	
	}

	public function dostambah()
	{
		if($this->session->userdata('id_level')=='1'){
		$data = array(
			'nav' => 'dostambah',
			'status' => $this->session->userdata('status'),
			'title' => 'Tambah Data Dosen');
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/dostambah',$data);
		$this->load->view('dosen/footer');
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

	public function dosinsert()
	{
		if($this->session->userdata('id_level')=='1'){
		$data = array(
			'nip' => $this->input->post('nip'), 
			'nama_dosen' => $this->input->post('nama'),
			'id_prodi' => $this->input->post('prodi'),
			'no_hp' => $this->input->post('nohp'),
			'kuota_mhs' => $this->input->post('kuota')
		);
		$result = $this->Dosen_model->insert('tb_dosen',$data);
		if($result == "success"){
			$notif = $this->session->set_flashdata('success', 'Berhasil di tambahkan!');
			redirect(base_url('dosen/dosview'));
		}else{
			$notif = $this->session->set_flashdata('error', $result);
			redirect(base_url('dosen/dosview'));
		}
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

	public function dosedit()
	{
		if($this->session->userdata('id_level')=='1'){
			$data = array(
			'nav' => 'dosedit',
			'title' => 'Sunting Data Dosen',
			'status' => $this->session->userdata('status'),
			'table' => $this->Dosen_model->getWhere('tb_dosen', array('id_dosen' => $this->uri->segment(3)))->row(),
		);
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/dosedit',$data);
		$this->load->view('dosen/footer',$data);
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

	public function dosupdate()
	{
		if($this->session->userdata('id_level')=='1'){
		$nip = $this->input->post('nip');
		$data = array( 
			'nama_dosen' => $this->input->post('nama'),
			'id_prodi' => $this->input->post('prodi'),
			'no_hp' => $this->input->post('nohp'),
			'kuota_mhs' => $this->input->post('kuota')
		);
		$result = $this->Dosen_model->update('tb_dosen',array('nip'=>$nip),$data);
		if($result == "success"){
			$notif = $this->session->set_flashdata('success', 'Berhasil di ubah!');
			redirect(base_url('dosen/dosview'));
		}else{
			$notif = $this->session->set_flashdata('error', $result);
			redirect(base_url('dosen/dosview'));
		}
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

	public function dosdelete()
	{
		if($this->session->userdata('id_level')=='1'){
		$data = $this->uri->segment(3);
		$result = $this->Dosen_model->delete('tb_dosen','id_dosen',$data);
		if($result == "success"){
			$notif = $this->session->set_flashdata('success', 'Berhasil di hapus!');
			redirect(base_url('dosen/dosview'));
		}else{
			$notif = $this->session->set_flashdata('error', $result);
			redirect(base_url('dosen/dosview'));
		}
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

	public function dosupload(){
		if($this->session->userdata('id_level')=='1'){
		$data = array(); 	
		$data['nav'] = 'dosupload';
		$data['title'] = 'Unggah Data Dosen';
		$data['status'] = $this->session->userdata('status');	
		if(isset($_POST['preview'])){ 
			$upload = $this->Dosen_model->upload_file($this->filename_dosen);
			
			if($upload['result'] == "success"){ 
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename_dosen.'.xlsx'); 
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				$data['sheet'] = $sheet; 
			}else{ 
				$data['upload_error'] = $upload['error']; 
			}
		} 
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/dosupload',$data);
		$this->load->view('dosen/footer',$data);
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}
	
	public function dosimport(){
		if($this->session->userdata('id_level')=='1'){
		$table = 'tb_dosen';
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename_dosen.'.xlsx'); 
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		$dataupload = [];
		
		$numrow = 1;
		foreach($sheet as $row){
			if($numrow > 1){
				array_push($dataupload, [
					'nip' => $row['A'],
					'nama_dosen' => $row['B'],
					'id_prodi' => $row['C'],
					'no_hp' => $row['D'],
					'kuota_mhs' => $row['E'],
				]);
			}
			
			$numrow++; 
		}		
		$result = $this->Dosen_model->insert_multiple($table, $dataupload);
		if($result == "success"){
			$notif = $this->session->set_flashdata('success', 'Berhasil di impor!');
			redirect(base_url('dosen/dosview'));
		}else{
			$notif = $this->session->set_flashdata('error', $result);
			redirect(base_url('dosen/dosview'));
		}
	}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

	
/* ============================== END MENU DOSEN ============================== */

/* ==================== MENU USULAN ==================== */



	public function usulview()
	{
		if($this->session->userdata('id_level')=='1' || $this->session->userdata('id_level')=='2'){
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

		$id_dosen_sess = explode("M", $this->session->userdata('username'));
		$data = array(
			'nav' => 'usulview',
			'title' => 'Data Usulan Saya',
			'dosen' =>  $this->Dosen_model->getData('tb_dosen'),
			'status' => $this->session->userdata('status'),
			'table' => $this->Dosen_model->getWhere('tb_usulan',array('id_dosen' => $id_dosen_sess[1]))->result(),
			'notif' => $notif,
			'notif_error' => $notif_error,
		);
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/usulview', $data);
		$this->load->view('dosen/footer',$data);
		}else{
			$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
			redirect(base_url(''));
		}
	
	}

	public function usultambah()
	{
		if($this->session->userdata('id_level')=='1' || $this->session->userdata('id_level')=='2'){
		$data = array(
			'nav' => 'usultambah',
			'status' => $this->session->userdata('status'),
			'dosen' =>  $this->Dosen_model->getData('tb_dosen'),
			'title' => 'Tambah Data Usulan');
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/usultambah',$data);
		$this->load->view('dosen/footer');
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

	public function usulinsert()
	{
		if($this->session->userdata('id_level')=='1' || $this->session->userdata('id_level')=='2'){
		$id_dosen_sess = explode("M", $this->session->userdata('username'));
		$kuota = $this->input->post('kuota');
		if($kuota==1)
			$jenis=0;
		else
			$jenis=1;
		$data = array(
			'id_dosen' => $id_dosen_sess['1'] , 
			'usulan' => $this->input->post('usulan'),
			'jenis' => $jenis,
			'kuota_mhs' => $kuota,
		);
		$result = $this->Dosen_model->insert('tb_usulan',$data);
		if($result == "success"){
			$notif = $this->session->set_flashdata('success', 'Berhasil di tambahkan!');
			redirect(base_url('dosen/usulview'));
		}else{
			$notif = $this->session->set_flashdata('error', $result);
			redirect(base_url('dosen/usulview'));
		}
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

	public function usuledit()
	{
		if($this->session->userdata('id_level')=='1' || $this->session->userdata('id_level')=='2'){
			$data = array(
			'nav' => 'usuledit',
			'title' => 'Sunting Data Usulan',
			'status' => $this->session->userdata('status'),
			'table' => $this->Dosen_model->getWhere('tb_usulan', array('id_usulan' => $this->uri->segment(3)))->row(),
		);
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/usuledit', $data);
		$this->load->view('dosen/footer',$data);
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

	public function usulupdate()
	{
		if($this->session->userdata('id_level')=='1' || $this->session->userdata('id_level')=='2'){
		$id_usulan = $this->input->post('id_usul');
		$kuota = $this->input->post('kuota');
		if($kuota==1)
			$jenis=0;
		else
			$jenis=1;
		$data = array(
			'usulan' => $this->input->post('usulan'),
			'jenis' => $jenis,
			'kuota_mhs' => $kuota,
		);
		$result = $this->Dosen_model->update('tb_usulan',array('id_usulan'=>$id_usulan),$data);
		if($result == "success"){
			$notif = $this->session->set_flashdata('success', 'Berhasil di ubah!');
			redirect(base_url('dosen/usulview'));
		}else{
			$notif = $this->session->set_flashdata('error', $result);
			redirect(base_url('dosen/usulview'));
		}
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

	public function usuldelete()
	{
		if($this->session->userdata('id_level')=='1' || $this->session->userdata('id_level')=='2'){
		$data = $this->uri->segment(3);
		$result = $this->Dosen_model->delete('tb_usulan','id_usulan',$data);
		if($result == "success"){
			$notif = $this->session->set_flashdata('success', 'Berhasil di hapus!');
			redirect(base_url('dosen/usulview'));
		}else{
			$notif = $this->session->set_flashdata('error', $result);
			redirect(base_url('dosen/usulview'));
		}
		}else{
		$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
		redirect(base_url(''));
		}
	}

/* ============================== END MENU USULAN ============================== */

/* ==================== MENU BIMBINGAN ==================== */



	public function bimview()
	{
		if($this->session->userdata('id_level')=='1' || $this->session->userdata('id_level')=='2'){
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

		$id_dosen_sess = explode("M", $this->session->userdata('username'));
		$data = array(
			'nav' => 'bimview',
			'title' => 'Data Bimbingan Saya',
			'dosen' =>  $this->Dosen_model->getData('tb_dosen'),
			'status' => $this->session->userdata('status'),
			'table' => $this->Dosen_model->getWhere('tb_usulan',array('id_dosen' => $id_dosen_sess[1]))->result(),
			'notif' => $notif,
			'notif_error' => $notif_error,
		);
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/bimview', $data);
		$this->load->view('dosen/footer',$data);
		}else{
			$this->session->set_flashdata('error_akses', 'Anda tidak memiliki hak akses');
			redirect(base_url(''));
		}
	
	}

/* ============================== END MENU BIMBINGAN ============================== */


}

/* End of file Dosen.php */
/* Location: ./application/controllers/Dosen.php */
