<?php

class Logo_model extends CI_Model {

	public function logo_listing($limit='', $start='')
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_logo');
		if($this->session->userdata('logosearch') != ''){
			$this->db->like('website_name',$this->session->userdata('logosearch'));
		}
		if($limit!=''){
			$this->db->limit($limit, $start);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}		
	}

	public function get_logo($logo_id)
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_logo');
		$this->db->where('logo_id',$logo_id);
		$res = $this->db->get();
		return $res->row();
	}

	public function add_logo($data)
	{
		$this->db->insert('emiratesvalley_logo',$data);
		return $this->db->insert_id();
	}

	public function edit_logo($logo_id,$data)
	{
		$this->db->where('logo_id',$logo_id);
		$this->db->update('emiratesvalley_logo',$data);
	}

	public function delete_logo($logo_id)
	{
		$this->db->where('logo_id',base64_decode($logo_id));
		$this->db->delete('emiratesvalley_logo');
	}

}