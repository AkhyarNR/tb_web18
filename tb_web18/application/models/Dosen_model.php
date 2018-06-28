<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

	public function getData($table)
	{
		return $this->db->get($table)->result();
	}

	public function getWhere($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function insert($table, $data)
	{
		$query = $this->db->insert($table, $data);
			if ($query){
		     return "success";
		    }
		    else{
		     $error = $this->db->error();
		     return $error['message'];
		    }
	}

	public function update($table, $where, $data)
	{
		$this->db->where($where);
		$query = $this->db->update($table, $data);
		if ($query){
	     return "success";
	    }
	    else{
	     $error = $this->db->error();
		 return $error['message'];
	    }
	}

	public function delete($table,$where,$value)
	{
		$query=$this->db->query("DELETE FROM ".$table." WHERE ".$where."='".$value."'");
        if ($query){
	     return "success";
	    }
	    else{
	     $error = $this->db->error();
		 return $error['message'];
	    }
	}

	public function upload_file($filename){
		$this->load->library('Upload'); 
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); 
		if($this->upload->do_upload('file')){ 
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function insert_multiple($table,$data){
		$query = $this->db->insert_batch($table, $data);
			if($query){
		     return "success";
		    }
		   else{
		     $error = $this->db->error();
		     return $error['message'];
		    }

	}

	function cek_user($username,$password){
        $query=$this->db->query("SELECT * FROM tb_login WHERE username='".$username."' AND password='".$password."'");
        return $query;
    }
}

/* End of file Dosen_model */
/* Location: ./application/models/Dosen_model */