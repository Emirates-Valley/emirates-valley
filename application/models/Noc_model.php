<?php

class Noc_model extends CI_Model {

	public function noc_listing($limit='', $start='')
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_noc');
		if($this->session->userdata('nocsearch') != ''){
			$this->db->like('title',$this->session->userdata('nocsearch'));
			$this->db->or_like('noc_image',$this->session->userdata('nocsearch'));
		}
		if($limit!=''){
			$this->db->limit($limit, $start);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}		
	}

	public function get_noc($noc_id)
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_noc');
		$this->db->where('noc_id',$noc_id);
		$res = $this->db->get();
		return $res->row();
	}

	public function add_noc($data)
	{
		$this->db->insert('emiratesvalley_noc',$data);
		return $this->db->insert_id();
	}

	public function edit_noc($noc_id,$data)
	{
		$this->db->where('noc_id',$noc_id);
		$this->db->update('emiratesvalley_noc',$data);
	}

	public function delete_noc($noc_id)
	{
		$this->db->where('noc_id',base64_decode($noc_id));
		$this->db->delete('emiratesvalley_noc');
	}

}