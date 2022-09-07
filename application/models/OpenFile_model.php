<?php

class OpenFile_model extends CI_Model {

	public function openfile_listing($limit='', $start='')
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_open_file');
		if($this->session->userdata('opnsearch') != ''){
			$this->db->like('app_form_number',$this->session->userdata('opnsearch'));
			$this->db->or_like('registration_number',$this->session->userdata('opnsearch'));
			$this->db->or_like('security_code',$this->session->userdata('opnsearch'));
			$this->db->or_like('name',$this->session->userdata('opnsearch'));
			$this->db->or_like('cnic',$this->session->userdata('opnsearch'));
			$this->db->or_like('contact',$this->session->userdata('opnsearch'));
		}
		if($limit!=''){
			$this->db->limit($limit, $start);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}		
	}

	public function get_open_file($file_id)
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_open_file');
		$this->db->where('file_id',$file_id);
		$res = $this->db->get();
		return $res->row();
	}

	public function add_open_file($data)
	{
		$this->db->insert('emiratesvalley_open_file',$data);
		return $this->db->insert_id();
	}

	public function edit_open_file($file_id,$data)
	{
		$this->db->where('file_id',$file_id);
		$this->db->update('emiratesvalley_open_file',$data);
	}

	public function delete_open_file($file_id)
	{
		$this->db->where('file_id',base64_decode($file_id));
		$this->db->delete('emiratesvalley_open_file');
	}

	public function add_qrcode($data)
	{
		$this->db->insert('emiratesvalley_file_qrcode',$data);
		return $this->db->insert_id();
	}

	public function chk_qrcode_file($file_id)
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_file_qrcode');
		$this->db->where('file_id',$file_id);
		$res = $this->db->get();
		return $res->row();
	}

}