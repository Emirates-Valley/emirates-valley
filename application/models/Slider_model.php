<?php

class Slider_model extends CI_Model {

	public function slider_listing($limit='', $start='')
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_slider');
		if($this->session->userdata('slidersearch') != ''){
			$this->db->like('title',$this->session->userdata('slidersearch'));
		}
		if($limit!=''){
			$this->db->limit($limit, $start);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}		
	}

	public function get_slider($slider_id)
	{
		$this->db->select('*');
		$this->db->from('emiratesvalley_slider');
		$this->db->where('slider_id',$slider_id);
		$res = $this->db->get();
		return $res->row();
	}

	public function add_slider($data)
	{
		$this->db->insert('emiratesvalley_slider',$data);
		return $this->db->insert_id();
	}

	public function edit_slider($slider_id,$data)
	{
		$this->db->where('slider_id',$slider_id);
		$this->db->update('emiratesvalley_slider',$data);
	}

	public function delete_slider($slider_id)
	{
		$this->db->where('slider_id',base64_decode($slider_id));
		$this->db->delete('emiratesvalley_slider');
	}

}